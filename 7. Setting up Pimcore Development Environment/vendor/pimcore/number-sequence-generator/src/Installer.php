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
 *  @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 *  @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Bundle\NumberSequenceGeneratorBundle;

use Pimcore\Extension\Bundle\Installer\AbstractInstaller;

class Installer extends AbstractInstaller
{
    public function install()
    {
        $this->installDatabaseTable();

        return true;
    }

    public function uninstall()
    {
    }

    public function isInstalled()
    {
        $result1 = \Pimcore\Db::get()->fetchAll('SHOW TABLES LIKE "bundle_number_sequence_generator_register"');
        $result2 = \Pimcore\Db::get()->fetchAll('SHOW TABLES LIKE "' . RandomGenerator::TABLE_NAME . '"');

        return !empty($result1) && !empty($result2);
    }

    public function canBeInstalled()
    {
        return !$this->isInstalled();
    }

    public function installDatabaseTable()
    {
        $sqlPath = __DIR__ . '/Resources/install/';
        $sqlFileNames = ['install.sql'];

        foreach ($sqlFileNames as $fileName) {
            $statement = file_get_contents($sqlPath.$fileName);
            \Pimcore\Db::get()->query($statement);
        }
    }
}
