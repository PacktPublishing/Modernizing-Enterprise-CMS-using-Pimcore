<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Bridge\Crowdin;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpClient\ScopingHttpClient;
use Symfony\Component\Translation\Dumper\XliffFileDumper;
use Symfony\Component\Translation\Exception\UnsupportedSchemeException;
use Symfony\Component\Translation\Loader\LoaderInterface;
use Symfony\Component\Translation\Provider\AbstractProviderFactory;
use Symfony\Component\Translation\Provider\Dsn;
use Symfony\Component\Translation\Provider\ProviderInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * @author Andrii Bodnar <andrii.bodnar@crowdin.com>
 *
 * @experimental in 5.3
 */
final class CrowdinProviderFactory extends AbstractProviderFactory
{
    private const HOST = 'api.crowdin.com';

    /** @var LoaderInterface */
    private $loader;

    /** @var HttpClientInterface */
    private $client;

    /** @var LoggerInterface */
    private $logger;

    /** @var string */
    private $defaultLocale;

    /** @var XliffFileDumper */
    private $xliffFileDumper;

    public function __construct(HttpClientInterface $client, LoggerInterface $logger, string $defaultLocale, LoaderInterface $loader, XliffFileDumper $xliffFileDumper)
    {
        $this->client = $client;
        $this->logger = $logger;
        $this->defaultLocale = $defaultLocale;
        $this->loader = $loader;
        $this->xliffFileDumper = $xliffFileDumper;
    }

    /**
     * @return CrowdinProvider
     */
    public function create(Dsn $dsn): ProviderInterface
    {
        if ('crowdin' !== $dsn->getScheme()) {
            throw new UnsupportedSchemeException($dsn, 'crowdin', $this->getSupportedSchemes());
        }

        $endpoint = preg_replace('/(^|\.)default$/', '\1'.self::HOST, $dsn->getHost());
        $endpoint .= $dsn->getPort() ? ':'.$dsn->getPort() : '';

        $client = ScopingHttpClient::forBaseUri($this->client, sprintf('https://%s/api/v2/projects/%d/', $endpoint, $this->getUser($dsn)), [
            'auth_bearer' => $this->getPassword($dsn),
        ], preg_quote('https://'.$endpoint.'/api/v2/'));

        return new CrowdinProvider($client, $this->loader, $this->logger, $this->xliffFileDumper, $this->defaultLocale, $endpoint);
    }

    protected function getSupportedSchemes(): array
    {
        return ['crowdin'];
    }
}
