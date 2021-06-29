<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Bridge\Lokalise;

use Psr\Log\LoggerInterface;
use Symfony\Component\Translation\Exception\ProviderException;
use Symfony\Component\Translation\Loader\LoaderInterface;
use Symfony\Component\Translation\MessageCatalogueInterface;
use Symfony\Component\Translation\Provider\ProviderInterface;
use Symfony\Component\Translation\TranslatorBag;
use Symfony\Component\Translation\TranslatorBagInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * @author Mathieu Santostefano <msantostefano@protonmail.com>
 *
 * In Lokalise:
 *  * Filenames refers to Symfony's translation domains;
 *  * Keys refers to Symfony's translation keys;
 *  * Translations refers to Symfony's translated messages
 *
 * @experimental in 5.3
 */
final class LokaliseProvider implements ProviderInterface
{
    private $client;
    private $loader;
    private $logger;
    private $defaultLocale;
    private $endpoint;

    public function __construct(HttpClientInterface $client, LoaderInterface $loader, LoggerInterface $logger, string $defaultLocale, string $endpoint)
    {
        $this->client = $client;
        $this->loader = $loader;
        $this->logger = $logger;
        $this->defaultLocale = $defaultLocale;
        $this->endpoint = $endpoint;
    }

    public function __toString(): string
    {
        return sprintf('lokalise://%s', $this->endpoint);
    }

    /**
     * {@inheritdoc}
     *
     * Lokalise API recommends sending payload in chunks of up to 500 keys per request.
     *
     * @see https://app.lokalise.com/api2docs/curl/#transition-create-keys-post
     */
    public function write(TranslatorBagInterface $translatorBag): void
    {
        $defaultCatalogue = $translatorBag->getCatalogue($this->defaultLocale);

        if (!$defaultCatalogue) {
            $defaultCatalogue = $translatorBag->getCatalogues()[0];
        }

        $this->ensureAllLocalesAreCreated($translatorBag);
        $existingKeysByDomain = [];

        foreach ($defaultCatalogue->getDomains() as $domain) {
            if (!\array_key_exists($domain, $existingKeysByDomain)) {
                $existingKeysByDomain[$domain] = [];
            }

            $existingKeysByDomain[$domain] += $this->getKeysIds(array_keys($defaultCatalogue->all($domain)), $domain);
        }

        $keysToCreate = $createdKeysByDomain = [];

        foreach ($existingKeysByDomain as $domain => $existingKeys) {
            $allKeysForDomain = array_keys($defaultCatalogue->all($domain));
            foreach (array_keys($existingKeys) as $keyName) {
                unset($allKeysForDomain[$keyName]);
            }
            $keysToCreate[$domain] = $allKeysForDomain;
        }

        foreach ($keysToCreate as $domain => $keys) {
            $createdKeysByDomain[$domain] = $this->createKeys($keys, $domain);
        }

        $this->updateTranslations(array_merge($createdKeysByDomain, $existingKeysByDomain), $translatorBag);
    }

    public function read(array $domains, array $locales): TranslatorBag
    {
        $translatorBag = new TranslatorBag();
        $translations = $this->exportFiles($locales, $domains);

        foreach ($translations as $locale => $files) {
            foreach ($files as $filename => $content) {
                $translatorBag->addCatalogue($this->loader->load($content['content'], $locale, str_replace('.xliff', '', $filename)));
            }
        }

        return $translatorBag;
    }

    public function delete(TranslatorBagInterface $translatorBag): void
    {
        $catalogue = $translatorBag->getCatalogue($this->defaultLocale);

        if (!$catalogue) {
            $catalogue = $translatorBag->getCatalogues()[0];
        }

        $keysIds = [];

        foreach ($catalogue->getDomains() as $domain) {
            $keysToDelete = [];
            foreach (array_keys($catalogue->all($domain)) as $key) {
                $keysToDelete[] = $key;
            }
            $keysIds += $this->getKeysIds($keysToDelete, $domain);
        }

        $response = $this->client->request('DELETE', 'keys', [
            'json' => ['keys' => array_values($keysIds)],
        ]);

        if (200 !== $response->getStatusCode()) {
            throw new ProviderException(sprintf('Unable to delete keys from Lokalise: "%s".', $response->getContent(false)), $response);
        }
    }

    /**
     * @see https://app.lokalise.com/api2docs/curl/#transition-download-files-post
     */
    private function exportFiles(array $locales, array $domains): array
    {
        $response = $this->client->request('POST', 'files/export', [
            'json' => [
                'format' => 'symfony_xliff',
                'original_filenames' => true,
                'directory_prefix' => '%LANG_ISO%',
                'filter_langs' => array_values($locales),
                'filter_filenames' => array_map([$this, 'getLokaliseFilenameFromDomain'], $domains),
            ],
        ]);

        $responseContent = $response->toArray(false);

        if (406 === $response->getStatusCode()
            && 'No keys found with specified filenames.' === $responseContent['error']['message']
        ) {
            return [];
        }

        if (200 !== $response->getStatusCode()) {
            throw new ProviderException(sprintf('Unable to export translations from Lokalise: "%s".', $response->getContent(false)), $response);
        }

        return $responseContent['files'];
    }

    private function createKeys(array $keys, string $domain): array
    {
        $keysToCreate = [];

        foreach ($keys as $key) {
            $keysToCreate[] = [
                'key_name' => $key,
                'platforms' => ['web'],
                'filenames' => [
                    'web' => $this->getLokaliseFilenameFromDomain($domain),
                    // There is a bug in Lokalise with "Per platform key names" option enabled,
                    // we need to provide a filename for all platforms.
                    'ios' => null,
                    'android' => null,
                    'other' => null,
                ],
            ];
        }

        $chunks = array_chunk($keysToCreate, 500);
        $responses = [];

        foreach ($chunks as $chunk) {
            $responses[] = $this->client->request('POST', 'keys', [
                'json' => ['keys' => $chunk],
            ]);
        }

        $createdKeys = [];

        foreach ($responses as $response) {
            if (200 !== $response->getStatusCode()) {
                $this->logger->error(sprintf('Unable to create keys to Lokalise: "%s".', $response->getContent(false)));

                continue;
            }

            $createdKeys = array_reduce($response->toArray(false)['keys'], function ($carry, array $keyItem) {
                $carry[$keyItem['key_name']['web']] = $keyItem['key_id'];

                return $carry;
            }, $createdKeys);
        }

        return $createdKeys;
    }

    /**
     * Translations will be created for keys without existing translations.
     * Translations will be updated for keys with existing translations.
     */
    private function updateTranslations(array $keysByDomain, TranslatorBagInterface $translatorBag)
    {
        $keysToUpdate = [];

        foreach ($keysByDomain as $domain => $keys) {
            foreach ($keys as $keyName => $keyId) {
                $keysToUpdate[] = [
                    'key_id' => $keyId,
                    'platforms' => ['web'],
                    'filenames' => [
                        'web' => $this->getLokaliseFilenameFromDomain($domain),
                        'ios' => null,
                        'android' => null,
                        'other' => null,
                    ],
                    'translations' => array_reduce($translatorBag->getCatalogues(), function ($carry, MessageCatalogueInterface $catalogue) use ($keyName, $domain) {
                        // Message could be not found because the catalogue is empty.
                        // We must not send the key in place of the message to avoid wrong message update on the provider.
                        if ($catalogue->get($keyName, $domain) !== $keyName) {
                            $carry[] = [
                                'language_iso' => $catalogue->getLocale(),
                                'translation' => $catalogue->get($keyName, $domain),
                            ];
                        }

                        return $carry;
                    }, []),
                ];
            }
        }

        $chunks = array_chunk($keysToUpdate, 500);
        $responses = [];

        foreach ($chunks as $chunk) {
            $responses[] = $this->client->request('PUT', 'keys', [
                'json' => ['keys' => $chunk],
            ]);
        }

        foreach ($responses as $response) {
            if (200 !== $response->getStatusCode()) {
                $this->logger->error(sprintf('Unable to create/update translations to Lokalise: "%s".', $response->getContent(false)));
            }
        }
    }

    private function getKeysIds(array $keys, string $domain): array
    {
        $response = $this->client->request('GET', 'keys', [
            'query' => [
                'filter_keys' => implode(',', $keys),
                'filter_filenames' => $this->getLokaliseFilenameFromDomain($domain),
            ],
        ]);

        if (200 !== $response->getStatusCode()) {
            $this->logger->error(sprintf('Unable to get keys ids from Lokalise: "%s".', $response->getContent(false)));
        }

        return array_reduce($response->toArray(false)['keys'], function ($carry, array $keyItem) {
            $carry[$keyItem['key_name']['web']] = $keyItem['key_id'];

            return $carry;
        }, []);
    }

    private function ensureAllLocalesAreCreated(TranslatorBagInterface $translatorBag)
    {
        $providerLanguages = $this->getLanguages();
        $missingLanguages = array_reduce($translatorBag->getCatalogues(), function ($carry, $catalogue) use ($providerLanguages) {
            if (!\in_array($catalogue->getLocale(), $providerLanguages)) {
                $carry[] = $catalogue->getLocale();
            }

            return $carry;
        }, []);

        if ($missingLanguages) {
            $this->createLanguages($missingLanguages);
        }
    }

    private function getLanguages(): array
    {
        $response = $this->client->request('GET', 'languages');

        if (200 !== $response->getStatusCode()) {
            $this->logger->error(sprintf('Unable to get languages from Lokalise: "%s".', $response->getContent(false)));

            return [];
        }

        $responseContent = $response->toArray(false);

        if (\array_key_exists('languages', $responseContent)) {
            return array_map(function ($language) {
                return $language['lang_iso'];
            }, $responseContent['languages']);
        }

        return [];
    }

    private function createLanguages(array $languages): void
    {
        $response = $this->client->request('POST', 'languages', [
            'json' => [
                'languages' => array_map(function ($language) {
                    return ['lang_iso' => $language];
                }, $languages),
            ],
        ]);

        if (200 !== $response->getStatusCode()) {
            $this->logger->error(sprintf('Unable to create languages on Lokalise: "%s".', $response->getContent(false)));
        }
    }

    private function getLokaliseFilenameFromDomain(string $domain): string
    {
        return sprintf('%s.xliff', $domain);
    }
}
