<?php

namespace Scheb\TwoFactorBundle\Security\TwoFactor\Provider\Google;

use Scheb\TwoFactorBundle\Model\Google\TwoFactorInterface;
use Sonata\GoogleAuthenticator\GoogleAuthenticatorInterface as SonataGoogleAuthenticatorInterface;

class GoogleAuthenticator implements GoogleAuthenticatorInterface
{
    /**
     * @var string
     */
    private $server;

    /**
     * @var SonataGoogleAuthenticatorInterface
     */
    private $authenticator;

    /**
     * @var string
     */
    private $issuer;

    public function __construct(SonataGoogleAuthenticatorInterface $authenticator, $server, $issuer)
    {
        $this->authenticator = $authenticator;
        $this->server = $server;
        $this->issuer = $issuer;
    }

    public function checkCode(TwoFactorInterface $user, string $code): bool
    {
        // Strip any user added spaces
        $code = str_replace(' ', '', $code);

        return $this->authenticator->checkCode($user->getGoogleAuthenticatorSecret(), $code);
    }

    public function getUrl(TwoFactorInterface $user): string
    {
        $encoder = 'https://chart.googleapis.com/chart?chs=200x200&chld=M|0&cht=qr&chl=';

        return $encoder.urlencode($this->getQRContent($user));
    }

    public function getQRContent(TwoFactorInterface $user): string
    {
        $userAndHost = rawurlencode($user->getGoogleAuthenticatorUsername()).($this->server ? '@'.rawurlencode($this->server) : '');
        if ($this->issuer) {
            $qrContent = sprintf(
                'otpauth://totp/%s:%s?secret=%s&issuer=%s',
                rawurlencode($this->issuer),
                $userAndHost,
                $user->getGoogleAuthenticatorSecret(),
                rawurlencode($this->issuer)
            );
        } else {
            $qrContent = sprintf(
                'otpauth://totp/%s?secret=%s',
                $userAndHost,
                $user->getGoogleAuthenticatorSecret()
            );
        }

        return $qrContent;
    }

    public function generateSecret(): string
    {
        return $this->authenticator->generateSecret();
    }
}
