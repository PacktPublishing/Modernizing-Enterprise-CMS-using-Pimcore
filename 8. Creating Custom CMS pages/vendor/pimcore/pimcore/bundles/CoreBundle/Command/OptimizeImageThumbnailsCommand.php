<?php
/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Bundle\CoreBundle\Command;

use League\Flysystem\StorageAttributes;
use Pimcore\Console\AbstractCommand;
use Pimcore\Image\ImageOptimizerInterface;
use Pimcore\Tool\Storage;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @internal
 */
class OptimizeImageThumbnailsCommand extends AbstractCommand
{
    /**
     * @var ImageOptimizerInterface
     */
    private $optimizer;

    /**
     * @param ImageOptimizerInterface $optimizer
     */
    public function __construct(ImageOptimizerInterface $optimizer)
    {
        parent::__construct();

        $this->optimizer = $optimizer;
    }

    protected function configure()
    {
        $this
            ->setName('pimcore:thumbnails:optimize-images')
            ->setAliases(['thumbnails:optimize-images'])
            ->setDescription('Optimize filesize of all thumbnails');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $storage = Storage::get('thumbnail');
        $savedBytesTotal = 0;

        /** @var StorageAttributes $item */
        foreach ($storage->listContents('/', true) as $item) {
            if ($item->isFile()) {
                $originalFilesize = $storage->fileSize($item->path());

                $this->optimizer->optimizeImage($item->path());

                clearstatcache();

                $savedBytes = ($originalFilesize - $storage->fileSize($item->path()));
                $savedBytesTotal += $savedBytes;

                $this->output->writeln('Optimized image: ' . $item->path() . ' saved ' . formatBytes($savedBytes));
            }
        }

        $this->output->writeln('Finished!');
        $this->output->writeln('Saved ' . formatBytes($savedBytesTotal) . ' in total');

        return 0;
    }
}
