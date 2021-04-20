<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Notifier\Bridge\RocketChat;

use Symfony\Component\Notifier\Exception\LogicException;
use Symfony\Component\Notifier\Exception\TransportException;
use Symfony\Component\Notifier\Message\ChatMessage;
use Symfony\Component\Notifier\Message\MessageInterface;
use Symfony\Component\Notifier\Message\SentMessage;
use Symfony\Component\Notifier\Transport\AbstractTransport;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * @author Jeroen Spee <https://github.com/Jeroeny>
 *
 * @experimental in 5.2
 */
final class RocketChatTransport extends AbstractTransport
{
    protected const HOST = 'rocketchat.com';

    private $accessToken;
    private $chatChannel;

    public function __construct(string $accessToken, string $chatChannel = null, HttpClientInterface $client = null, EventDispatcherInterface $dispatcher = null)
    {
        $this->accessToken = $accessToken;
        $this->chatChannel = $chatChannel;
        $this->client = $client;

        parent::__construct($client, $dispatcher);
    }

    public function __toString(): string
    {
        if (null === $this->chatChannel) {
            return sprintf('rocketchat://%s', $this->getEndpoint());
        }

        return sprintf('rocketchat://%s?channel=%s', $this->getEndpoint(), $this->chatChannel);
    }

    public function supports(MessageInterface $message): bool
    {
        return $message instanceof ChatMessage && (null === $message->getOptions() || $message->getOptions() instanceof RocketChatOptions);
    }

    /**
     * @see https://rocket.chat/docs/administrator-guides/integrations
     */
    protected function doSend(MessageInterface $message): SentMessage
    {
        if (!$message instanceof ChatMessage) {
            throw new LogicException(sprintf('The "%s" transport only supports instances of "%s" (instance of "%s" given).', __CLASS__, ChatMessage::class, get_debug_type($message)));
        }
        if ($message->getOptions() && !$message->getOptions() instanceof RocketChatOptions) {
            throw new LogicException(sprintf('The "%s" transport only supports instances of "%s" for options.', __CLASS__, RocketChatOptions::class));
        }

        $options = ($opts = $message->getOptions()) ? $opts->toArray() : [];
        if (!isset($options['channel'])) {
            $options['channel'] = $message->getRecipientId() ?: $this->chatChannel;
        }
        $options['text'] = $message->getSubject();

        $response = $this->client->request(
            'POST',
            sprintf('https://%s/hooks/%s', $this->getEndpoint(), $this->accessToken),
            [
                'json' => array_filter($options),
            ]
        );

        if (200 !== $response->getStatusCode()) {
            throw new TransportException(sprintf('Unable to post the RocketChat message: %s.', $response->getContent(false)), $response);
        }

        $result = $response->toArray(false);
        if (!$result['success']) {
            throw new TransportException(sprintf('Unable to post the RocketChat message: %s.', $result['error']), $response);
        }

        $success = $response->toArray(false);

        $sentMessage = new SentMessage($message, (string) $this);
        $sentMessage->setMessageId($success['message']['_id']);

        return $sentMessage;
    }
}
