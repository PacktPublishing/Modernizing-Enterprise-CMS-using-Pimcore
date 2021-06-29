<?php

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Commercial License (PCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 *  @license    http://www.pimcore.org/license     GPLv3 and PCL
 */

namespace Pimcore\Security\Encoder\Factory;

use Pimcore\Security\Encoder\UserAwarePasswordEncoderInterface;
use Pimcore\Security\Exception\ConfigurationException;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @internal
 *
 * Encoder factory keeping a dedicated encoder instance per user object. This is needed as Pimcore Users and user
 * objects containing Password field definitions handle their encoding logic by themself. The user aware encoder
 * delegates encoding and verification to the user object.
 *
 * Example DI configuration for a factory building PasswordFieldEncoder instances which get 'password' as argument:
 *
 *      website_demo.security.password_encoder_factory:
 *          class: Pimcore\Security\Encoder\Factory\UserAwareEncoderFactory
 *          arguments:
 *              - Pimcore\Security\Encoder\PasswordFieldEncoder
 *              - ['password']
 */
class UserAwareEncoderFactory extends AbstractEncoderFactory
{
    /**
     * @var PasswordEncoderInterface[]
     */
    private $encoders = [];

    /**
     * {@inheritdoc}
     */
    public function getEncoder($user)
    {
        if (!$user instanceof UserInterface) {
            throw new \RuntimeException(sprintf(
                'Need an instance of UserInterface to build an encoder, "%s" given',
                is_object($user) ? get_class($user) : gettype($user)
            ));
        }

        $username = null;
        if (method_exists($user, 'getUserIdentifier')) {
            $username = $user->getUserIdentifier();
        } elseif (method_exists($user, 'getUsername')) {
            $username =  $user->getUsername();
        } else {
            throw new \RuntimeException('User class must implement either getUserIdentifier() or getUsername()');
        }

        if (isset($this->encoders[$username])) {
            return $this->encoders[$username];
        }

        $reflector = $this->getReflector();
        if (!$reflector->implementsInterface(UserAwarePasswordEncoderInterface::class)) {
            throw new ConfigurationException('An encoder built by the UserAwareEncoderFactory must implement UserAwareEncoderInterface');
        }

        $encoder = $this->buildEncoder($reflector);

        if ($encoder instanceof UserAwarePasswordEncoderInterface) {
            $encoder->setUser($user);
        }

        $this->encoders[$username] = $encoder;

        return $encoder;
    }
}
