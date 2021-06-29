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

namespace Pimcore\Bundle\CoreBundle\Command;

use Pimcore\Console\AbstractCommand;
use Pimcore\Model\Tool\Email;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @internal
 */
class EmailLogsCleanupCommand extends AbstractCommand
{
    protected function configure()
    {
        $this
            ->setName('pimcore:email:cleanup')
            ->setAliases(['email:cleanup'])
            ->setDescription('Cleanup email logs')
            ->addOption(
                'older-than-days',
                'days',
                InputOption::VALUE_REQUIRED,
                'Older than X Days to delete email logs'
            );
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $daysAgo = $input->getOption('older-than-days');

        if (!isset($daysAgo)) {
            throw new \Exception('Missing option "--older-than-days"');
        } elseif (!is_numeric($daysAgo)) {
            throw new \Exception('The "--older-than-days" option value should be numeric');
        }

        $date = new \DateTime("-{$daysAgo} days");
        $dateTimestamp = $date->getTimestamp();
        $emailLogs = new Email\Log\Listing();
        $emailLogs->setCondition("sentDate < $dateTimestamp");

        foreach ($emailLogs->load() as $ekey => $emailLog) {
            $emailLog->delete();
        }

        $this->output->writeln('Email logs cleanup done!');

        return 0;
    }
}
