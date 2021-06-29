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

namespace Pimcore\Console;

use Pimcore\Event\System\ConsoleEvent;
use Pimcore\Event\SystemEvents;
use Symfony\Component\Console\Command\Command;

trait ConsoleCommandPluginTrait
{
    /**
     * Handle system.console.init event and register console commands to the console application
     */
    public function initConsoleCommands()
    {
        if (static::isCli()) {
            \Pimcore::getEventDispatcher()->addListener(SystemEvents::CONSOLE_INIT, [$this, 'handleSystemConsoleInitEvent']);
        }
    }

    /**
     * @param ConsoleEvent $e
     */
    public function handleSystemConsoleInitEvent(ConsoleEvent $e)
    {
        $application = $e->getApplication();
        $application->addCommands($this->getConsoleCommands());
    }

    /**
     * @return bool
     */
    public static function isCli()
    {
        return php_sapi_name() === 'cli';
    }

    /**
     * Returns an array of commands to be added to the application.
     * To be implemented by plugin classes providing console commands.
     *
     * @return Command[]
     */
    abstract public function getConsoleCommands();
}
