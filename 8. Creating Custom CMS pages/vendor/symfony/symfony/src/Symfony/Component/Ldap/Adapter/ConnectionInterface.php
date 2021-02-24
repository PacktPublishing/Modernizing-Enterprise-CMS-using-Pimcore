<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Ldap\Adapter;

use Symfony\Component\Ldap\Exception\AlreadyExistsException;
use Symfony\Component\Ldap\Exception\ConnectionTimeoutException;
use Symfony\Component\Ldap\Exception\InvalidCredentialsException;

/**
 * @author Charles Sarrazin <charles@sarraz.in>
 */
interface ConnectionInterface
{
    /**
     * Checks whether the connection was already bound or not.
     *
     * @return bool
     */
    public function isBound();

    /**
     * Binds the connection against a DN and password.
     *
     * @param string $dn       The user's DN
     * @param string $password The associated password
     *
     * @throws AlreadyExistsException      When the connection can't be created because of an LDAP_ALREADY_EXISTS error
     * @throws ConnectionTimeoutException  When the connection can't be created because of an LDAP_TIMEOUT error
     * @throws InvalidCredentialsException When the connection can't be created because of an LDAP_INVALID_CREDENTIALS error
     */
    public function bind($dn = null, $password = null);
}
