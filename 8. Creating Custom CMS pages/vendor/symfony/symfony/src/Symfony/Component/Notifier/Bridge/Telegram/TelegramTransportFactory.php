<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Notifier\Bridge\Telegram;

use Symfony\Component\Notifier\Exception\IncompleteDsnException;
use Symfony\Component\Notifier\Exception\UnsupportedSchemeException;
use Symfony\Component\Notifier\Transport\AbstractTransportFactory;
use Symfony\Component\Notifier\Transport\Dsn;
use Symfony\Component\Notifier\Transport\TransportInterface;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @experimental in 5.2
 */
final class TelegramTransportFactory extends AbstractTransportFactory
{
    /**
     * @return TelegramTransport
     */
    public function create(Dsn $dsn): TransportInterface
    {
        $scheme = $dsn->getScheme();

        if ('telegram' !== $scheme) {
            throw new UnsupportedSchemeException($dsn, 'telegram', $this->getSupportedSchemes());
        }

        $token = $this->getToken($dsn);
        $channel = $dsn->getOption('channel');
        $host = 'default' === $dsn->getHost() ? null : $dsn->getHost();
        $port = $dsn->getPort();

        return (new TelegramTransport($token, $channel, $this->client, $this->dispatcher))->setHost($host)->setPort($port);
    }

    protected function getSupportedSchemes(): array
    {
        return ['telegram'];
    }

    private function getToken(Dsn $dsn): string
    {
        if (null === $dsn->getUser() && null === $dsn->getPassword()) {
            throw new IncompleteDsnException('Missing token.', $dsn->getOriginalDsn());
        }

        if (null === $dsn->getPassword()) {
            throw new IncompleteDsnException('Malformed token.', $dsn->getOriginalDsn());
        }

        return sprintf('%s:%s', $dsn->getUser(), $dsn->getPassword());
    }
}
