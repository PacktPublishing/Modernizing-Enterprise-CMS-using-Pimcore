<?php

namespace AppBundle\Command;

use Pimcore\Console\AbstractCommand;
use Pimcore\Console\Dumper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ImportCommand extends AbstractCommand
{

    const IMPORT_FOLDER = PIMCORE_PROJECT_ROOT."/var/imports";

    protected function configure()
    {
        $this->setName('import-file')
            ->setDescription('Import a file in background');

        $this->addOption("filename", null, InputOption::VALUE_REQUIRED, "The name of the file to import");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->dump("The excecution is starting!",  Dumper::NEWLINE_AFTER);

        $filename = $input->getOption("filename");
        $fileContent = file_get_contents(self::IMPORT_FOLDER."/".$filename);

        //Add business logic here
        $this->writeError('Please implement this command with business logic...');
    }
}
