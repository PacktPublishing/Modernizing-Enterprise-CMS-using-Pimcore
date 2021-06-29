<?php

declare(strict_types=1);

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

namespace Pimcore\Bundle\CoreBundle\Command\Document;

use Pimcore\Console\AbstractCommand;
use Pimcore\Model\Document;
use Pimcore\Tool;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @internal
 */
class GeneratePagePreviews extends AbstractCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('pimcore:documents:generate-page-previews')
            ->setDescription('Generates the previews shown in the tree on hover')
            ->addOption(
                'urlPrefix',
                'u',
                InputOption::VALUE_OPTIONAL,
                'Prefix for the document path, eg. https://example.com, if not specified, Pimcore will try use the main domain from system settings.',
                null
            );
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $hostUrl = $input->getOption('urlPrefix');
        if (!$hostUrl) {
            $hostUrl = Tool::getHostUrl();
        }

        if (!$hostUrl) {
            $this->io->error('Unable to determine URL prefix, please use option -u or specify a main domain in system settings');

            return 1;
        }

        $docs = new \Pimcore\Model\Document\Listing();
        $docs->setCondition("type = 'page'");
        $docs->load();

        foreach ($docs as $doc) {
            /**
             * @var Document\Page $doc
             */
            try {
                $success = Document\Service::generatePagePreview($doc->getId(), null, $hostUrl);
            } catch (\Exception $e) {
                $this->io->error($e->getMessage());
            }
        }

        return 0;
    }
}
