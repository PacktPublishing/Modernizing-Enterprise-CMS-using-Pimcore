<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Notifier\Bridge\Esendex;

use Symfony\Component\Notifier\Exception\IncompleteDsnException;
use Symfony\Component\Notifier\Exception\UnsupportedSchemeException;
use Symfony\Component\Notifier\Transport\AbstractTransportFactory;
use Symfony\Component\Notifier\Transport\Dsn;
use Symfony\Component\Notifier\Transport\TransportInterface;

/**
 * @experimental in 5.2
 */
final class EsendexTransportFactory extends AbstractTransportFactory
{
    /**
     * @return EsendexTransport
     */
    public function create(Dsn $dsn): TransportInterface
    {
        $scheme = $dsn->getScheme();

        if ('esendex' !== $scheme) {
            throw new UnsupportedSchemeException($dsn, 'esendex', $this->getSupportedSchemes());
        }

        $token = $this->getUser($dsn).':'.$this->getPassword($dsn);
        $accountReference = $dsn->getOption('accountreference');

        if (!$accountReference) {
            throw new IncompleteDsnException('Missing accountreference.', $dsn->getOriginalDsn());
        }

        $from = $dsn->getOption('from');

        if (!$from) {
            throw new IncompleteDsnException('Missing from.', $dsn->getOriginalDsn());
        }

        $host = 'default' === $dsn->getHost() ? null : $dsn->getHost();
        $port = $dsn->getPort();

        return (new EsendexTransport($token, $accountReference, $from, $this->client, $this->dispatcher))->setHost($host)->setPort($port);
    }

    protected function getSupportedSchemes(): array
    {
        return ['esendex'];
    }
}
