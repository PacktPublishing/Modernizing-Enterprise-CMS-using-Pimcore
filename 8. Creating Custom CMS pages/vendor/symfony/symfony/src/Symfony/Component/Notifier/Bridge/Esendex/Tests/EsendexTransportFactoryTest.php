<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Notifier\Bridge\Esendex\Tests;

use Symfony\Component\Notifier\Bridge\Esendex\EsendexTransportFactory;
use Symfony\Component\Notifier\Tests\TransportFactoryTestCase;
use Symfony\Component\Notifier\Transport\TransportFactoryInterface;

final class EsendexTransportFactoryTest extends TransportFactoryTestCase
{
    /**
     * @return EsendexTransportFactory
     */
    public function createFactory(): TransportFactoryInterface
    {
        return new EsendexTransportFactory();
    }

    public function createProvider(): iterable
    {
        yield [
            'esendex://host.test?accountreference=ACCOUNTREFERENCE&from=FROM',
            'esendex://email:password@host.test?accountreference=ACCOUNTREFERENCE&from=FROM',
        ];
    }

    public function supportsProvider(): iterable
    {
        yield [true, 'esendex://email:password@host?accountreference=ACCOUNTREFERENCE&from=FROM'];
        yield [false, 'somethingElse://email:password@default'];
    }

    public function incompleteDsnProvider(): iterable
    {
        yield 'missing option: from' => ['esendex://email:password@host?accountreference=ACCOUNTREFERENCE'];
        yield 'missing option: accountreference' => ['esendex://email:password@host?from=FROM'];
    }

    public function unsupportedSchemeProvider(): iterable
    {
        yield ['somethingElse://email:password@default?accountreference=ACCOUNTREFERENCE&from=FROM'];
        yield ['somethingElse://email:password@host?accountreference=ACCOUNTREFERENCE']; // missing "from" option
    }
}
