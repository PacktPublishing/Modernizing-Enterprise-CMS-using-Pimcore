<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mailer\Bridge\Amazon\Transport;

use Psr\Log\LoggerInterface;
use Symfony\Component\Mailer\Exception\HttpTransportException;
use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mailer\Transport\AbstractHttpTransport;
use Symfony\Component\Mime\Message;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

trigger_deprecation('symfony/amazon-mailer', '5.1', 'The "%s" class is deprecated, use "%s" instead. The Amazon transport now requires "AsyncAws". Run "composer require async-aws/ses".', SesHttpTransport::class, SesHttpAsyncAwsTransport::class);

/**
 * @author Kevin Verschaeve
 */
class SesHttpTransport extends AbstractHttpTransport
{
    private const HOST = 'email.%region%.amazonaws.com';

    private $accessKey;
    private $secretKey;
    private $region;

    /**
     * @param string|null $region Amazon SES region
     */
    public function __construct(string $accessKey, string $secretKey, string $region = null, HttpClientInterface $client = null, EventDispatcherInterface $dispatcher = null, LoggerInterface $logger = null)
    {
        $this->accessKey = $accessKey;
        $this->secretKey = $secretKey;
        $this->region = $region ?: 'eu-west-1';

        parent::__construct($client, $dispatcher, $logger);
    }

    public function __toString(): string
    {
        return sprintf('ses+https://%s@%s', $this->accessKey, $this->getEndpoint());
    }

    protected function doSendHttp(SentMessage $message): ResponseInterface
    {
        $date = gmdate('D, d M Y H:i:s e');
        $auth = sprintf('AWS3-HTTPS AWSAccessKeyId=%s,Algorithm=HmacSHA256,Signature=%s', $this->accessKey, $this->getSignature($date));

        $request = [
            'headers' => [
                'X-Amzn-Authorization' => $auth,
                'Date' => $date,
            ],
            'body' => [
                'Action' => 'SendRawEmail',
                'RawMessage.Data' => base64_encode($message->toString()),
            ],
        ];

        $index = 1;
        foreach ($message->getEnvelope()->getRecipients() as $recipient) {
            $request['body']['Destinations.member.'.$index++] = $recipient->getAddress();
        }

        if ($message->getOriginalMessage() instanceof Message
            && $configurationSetHeader = $message->getOriginalMessage()->getHeaders()->get('X-SES-CONFIGURATION-SET')
        ) {
            $request['body']['ConfigurationSetName'] = $configurationSetHeader->getBodyAsString();
        }

        $response = $this->client->request('POST', 'https://'.$this->getEndpoint(), $request);

        $result = new \SimpleXMLElement($response->getContent(false));
        if (200 !== $response->getStatusCode()) {
            throw new HttpTransportException('Unable to send an email: '.$result->Error->Message.sprintf(' (code %d).', $result->Error->Code), $response);
        }

        $message->setMessageId($result->SendRawEmailResult->MessageId);

        return $response;
    }

    private function getEndpoint(): ?string
    {
        return ($this->host ?: str_replace('%region%', $this->region, self::HOST)).($this->port ? ':'.$this->port : '');
    }

    private function getSignature(string $string): string
    {
        return base64_encode(hash_hmac('sha256', $string, $this->secretKey, true));
    }
}
