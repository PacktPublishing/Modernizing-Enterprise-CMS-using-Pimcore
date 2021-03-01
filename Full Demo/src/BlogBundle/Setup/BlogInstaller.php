<?php

namespace BlogBundle\Setup;

use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\Console\Output\Output;
use Symfony\Component\Console\Output\OutputInterface;
use  Pimcore\Extension\Bundle\Installer\AbstractInstaller;
use Doctrine\DBAL\Migrations\AbortMigrationException;
use Doctrine\DBAL\Migrations\Version;
use Doctrine\DBAL\Schema\Schema;
use Pimcore\Db\ConnectionInterface;
use Pimcore\Extension\Bundle\Installer\MigrationInstaller;
use Pimcore\Migrations\MigrationManager;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\DataObject\ClassDefinition\Service;
use Pimcore\Model\DataObject\Fieldcollection;
use Pimcore\Model\DataObject\Objectbrick;
use Symfony\Component\Finder\Finder;
use Pimcore\Log\ApplicationLogger;

class BlogInstaller  extends AbstractInstaller
{

    const INSTALL_PATH= '/../Resources/install';

    private $logger;

    public function setLogger($logger)
    {
        
        $this->logger=$logger;
    }

    public function install()
    {       

        $this->logger->debug('Blog is installing');

        $files = $this->getClassesToInstall();

        $this->logger->debug('Classes to be installed'. implode($files));

        foreach ($files as $file) {
            $data = file_get_contents($file);
            $json= json_decode($data);
            $name= $json->id;
            $this->logger->debug("importing $name");
            $class = ClassDefinition::getById($name);
            if($class)
            {
                $this->logger->debug("class already exists");
                continue;
            }

            $class = new ClassDefinition();
            $class->setName($json->id);
            $class->setId($json->id);

            $success = Service::importClassDefinitionFromJson($class, $data, false, true);
            
            $this->logger->debug("imported with result $success");

        }
    }
  
    protected function getClassesToInstall(): array
    {        
        $realpath = realpath(__DIR__."/../Resources/install/class_sources/");      
        $files=glob($realpath.'/*.json');     
        $this->logger->debug(print_r( $files, true));        
       
        return $files;
    }    

    public function uninstall()
    {
        //$logger = \Pimcore::getContainer()->get(ApplicationLogger::class);
        $this->logger->debug('Blog is uninstalled');
    }
    

    public function canBeUninstalled()
    {
        return false; // this can be customized
    }

    public function canBeInstalled()
    {
        return true; // this can be customized
    }



    
}