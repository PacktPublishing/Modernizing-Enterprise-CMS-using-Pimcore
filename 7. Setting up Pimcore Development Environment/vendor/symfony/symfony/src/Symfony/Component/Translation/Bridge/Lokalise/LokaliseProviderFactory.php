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
use Symfony\Component\Translation\Exception\UnsupportedSchemeException;
use Symfony\Component\Translation\Loader\LoaderInterface;
use Symfony\Component\Translation\Provider\AbstractProviderFactory;
use Symfony\Component\Translation\Provider\Dsn;
use Symfony\Component\Translation\Provider\ProviderInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * @author Mathieu Santostefano <msantostefano@protonmail.com>
 *
 * @experimental in 5.3
 */
final class LokaliseProviderFactory extends AbstractProviderFactory
{
    private const HOST = 'api.lokalise.com';

    private $client;
    private $logger;
    private $defaultLocale;
    private $loader;

    public function __construct(HttpClientInterface $client, LoggerInterface $logger, string $defaultLocale, LoaderInterface $loader)
    {
        $this->client = $client;
        $this->logger = $logger;
        $this->defaultLocale = $defaultLocale;
        $this->loader = $loader;
    }

    /**
     * @return LokaliseProvider
     */
    public function create(Dsn $dsn): ProviderInterface
    {
        if ('lokalise' !== $dsn->getScheme()) {
            throw new UnsupportedSchemeException($dsn, 'lokalise', $this->getSupportedSchemes());
        }

        $endpoint = 'default' === $dsn->getHost() ? self::HOST : $dsn->getHost();
        $endpoint .= $dsn->getPort() ? ':'.$dsn->getPort() : '';

        $client = $this->client->withOptions([
            'base_uri' => 'https://'.$endpoint.'/projects/'.$this->getUser($dsn).'/api2/',
            'headers' => [
                'X-Api-Token' => $this->getPassword($dsn),
            ],
        ]);

        return new LokaliseProvider($client, $this->loader, $this->logger, $this->defaultLocale, $endpoint);
    }

    protected function getSupportedSchemes(): array
    {
        return ['lokalise'];
    }
}
