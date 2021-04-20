<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Notifier\Bridge\LinkedIn;

use Symfony\Component\Notifier\Bridge\LinkedIn\Share\AuthorShare;
use Symfony\Component\Notifier\Exception\LogicException;
use Symfony\Component\Notifier\Exception\TransportException;
use Symfony\Component\Notifier\Message\ChatMessage;
use Symfony\Component\Notifier\Message\MessageInterface;
use Symfony\Component\Notifier\Message\SentMessage;
use Symfony\Component\Notifier\Transport\AbstractTransport;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * @author Smaïne Milianni <smaine.milianni@gmail.com>
 *
 * @experimental in 5.2
 *
 * @see https://docs.microsoft.com/en-us/linkedin/marketing/integrations/community-management/shares/ugc-post-api#sharecontent
 */
final class LinkedInTransport extends AbstractTransport
{
    protected const PROTOCOL_VERSION = '2.0.0';
    protected const PROTOCOL_HEADER = 'X-Restli-Protocol-Version';
    protected const HOST = 'api.linkedin.com';

    private $authToken;
    private $accountId;

    public function __construct(string $authToken, string $accountId, HttpClientInterface $client = null, EventDispatcherInterface $dispatcher = null)
    {
        $this->authToken = $authToken;
        $this->accountId = $accountId;

        parent::__construct($client, $dispatcher);
    }

    public function __toString(): string
    {
        return sprintf('linkedin://%s', $this->getEndpoint());
    }

    public function supports(MessageInterface $message): bool
    {
        return $message instanceof ChatMessage && (null === $message->getOptions() || $message->getOptions() instanceof LinkedInOptions);
    }

    /**
     * @see https://docs.microsoft.com/en-us/linkedin/marketing/integrations/community-management/shares/ugc-post-api
     */
    protected function doSend(MessageInterface $message): SentMessage
    {
        if (!$message instanceof ChatMessage) {
            throw new LogicException(sprintf('The "%s" transport only supports instances of "%s" (instance of "%s" given).', __CLASS__, ChatMessage::class, \get_class($message)));
        }

        if ($message->getOptions() && !$message->getOptions() instanceof LinkedInOptions) {
            throw new LogicException(sprintf('The "%s" transport only supports instances of "%s" for options.', __CLASS__, LinkedInOptions::class));
        }

        if (!($opts = $message->getOptions()) && $notification = $message->getNotification()) {
            $opts = LinkedInOptions::fromNotification($notification);
            $opts->author(new AuthorShare($this->accountId));
        }

        $endpoint = sprintf('https://%s/v2/ugcPosts', $this->getEndpoint());

        $response = $this->client->request('POST', $endpoint, [
            'auth_bearer' => $this->authToken,
            'headers' => [self::PROTOCOL_HEADER => self::PROTOCOL_VERSION],
            'json' => array_filter($opts ? $opts->toArray() : $this->bodyFromMessageWithNoOption($message)),
        ]);

        if (201 !== $response->getStatusCode()) {
            throw new TransportException(sprintf('Unable to post the Linkedin message: "%s".', $response->getContent(false)), $response);
        }

        $result = $response->toArray(false);

        if (!$result['id']) {
            throw new TransportException(sprintf('Unable to post the Linkedin message: "%s".', $result['error']), $response);
        }

        $sentMessage = new SentMessage($message, (string) $this);
        $sentMessage->setMessageId($result['id']);

        return $sentMessage;
    }

    private function bodyFromMessageWithNoOption(MessageInterface $message): array
    {
        return [
            'specificContent' => [
                'com.linkedin.ugc.ShareContent' => [
                    'shareCommentary' => [
                        'attributes' => [],
                        'text' => $message->getSubject(),
                    ],
                    'shareMediaCategory' => 'NONE',
                ],
            ],
            'visibility' => [
                'com.linkedin.ugc.MemberNetworkVisibility' => 'PUBLIC',
            ],
            'lifecycleState' => 'PUBLISHED',
            'author' => sprintf('urn:li:person:%s', $this->accountId),
        ];
    }
}
