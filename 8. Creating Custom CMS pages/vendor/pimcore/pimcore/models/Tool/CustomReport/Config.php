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
 * @category   Pimcore
 * @package    Tool
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Model\Tool\CustomReport;

use Pimcore\Model;

/**
 * @method \Pimcore\Model\Tool\CustomReport\Config\Dao getDao()
 * @method void delete()
 * @method void save()
 */
class Config extends Model\AbstractModel implements \JsonSerializable
{
    /**
     * @var string
     */
    public $name = '';

    /**
     * @var string
     */
    public $sql = '';

    /**
     * @var array
     */
    public $dataSourceConfig = [];

    /**
     * @var array
     */
    public $columnConfiguration = [];

    /**
     * @var string
     */
    public $niceName = '';

    /**
     * @var string
     */
    public $group = '';

    /**
     * @var string
     */
    public $groupIconClass = '';

    /**
     * @var string
     */
    public $iconClass = '';

    /**
     * @var bool
     */
    public $menuShortcut;

    /**
     * @var string
     */
    public $reportClass;

    /**
     * @var string
     */
    public $chartType;

    /**
     * @var string
     */
    public $pieColumn;

    /**
     * @var string
     */
    public $pieLabelColumn;

    /**
     * @var string
     */
    public $xAxis;

    /**
     * @var string|array
     */
    public $yAxis;

    /**
     * @var int
     */
    public $modificationDate;

    /**
     * @var int
     */
    public $creationDate;

    /**
     * @var bool
     */
    public $shareGlobally;

    /**
     * @var string[]
     */
    public $sharedUserNames;

    /**
     * @var string[]
     */
    public $sharedRoleNames;

    /**
     * @param string $name
     *
     * @return null|Config
     */
    public static function getByName($name)
    {
        try {
            $report = new self();
            $report->getDao()->getByName($name);

            return $report;
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * @param Model\User|null $user
     *
     * @return array
     */
    public static function getReportsList(Model\User $user = null)
    {
        $reports = [];

        $list = new Config\Listing();
        if ($user) {
            $items = $list->getDao()->loadForGivenUser($user);
        } else {
            $items = $list->getDao()->load();
        }

        foreach ($items as $item) {
            $reports[] = [
                'id' => $item->getName(),
                'text' => $item->getName(),
            ];
        }

        return $reports;
    }

    /**
     * @param \stdClass $configuration
     * @param Config|null $fullConfig
     *
     * @deprecated Use ServiceLocator with id 'pimcore.custom_report.adapter.factories' to determine the factory for the adapter instead
     *
     * @return Model\Tool\CustomReport\Adapter\CustomReportAdapterInterface
     */
    public static function getAdapter($configuration, $fullConfig = null)
    {
        $type = $configuration->type ? $configuration->type : 'sql';
        $serviceLocator = \Pimcore::getContainer()->get('pimcore.custom_report.adapter.factories');

        if (!$serviceLocator->has($type)) {
            throw new \RuntimeException(sprintf('Could not find Custom Report Adapter with type %s', $type));
        }

        /** @var Model\Tool\CustomReport\Adapter\CustomReportAdapterFactoryInterface $factory */
        $factory = $serviceLocator->get($type);

        return $factory->create($configuration, $fullConfig);
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $sql
     */
    public function setSql($sql)
    {
        $this->sql = $sql;
    }

    /**
     * @return string
     */
    public function getSql()
    {
        return $this->sql;
    }

    /**
     * @param array $columnConfiguration
     */
    public function setColumnConfiguration($columnConfiguration)
    {
        $this->columnConfiguration = $columnConfiguration;
    }

    /**
     * @return array
     */
    public function getColumnConfiguration()
    {
        return $this->columnConfiguration;
    }

    /**
     * @param string $group
     */
    public function setGroup($group)
    {
        $this->group = $group;
    }

    /**
     * @return string
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param string $groupIconClass
     */
    public function setGroupIconClass($groupIconClass)
    {
        $this->groupIconClass = $groupIconClass;
    }

    /**
     * @return string
     */
    public function getGroupIconClass()
    {
        return $this->groupIconClass;
    }

    /**
     * @param string $iconClass
     */
    public function setIconClass($iconClass)
    {
        $this->iconClass = $iconClass;
    }

    /**
     * @return string
     */
    public function getIconClass()
    {
        return $this->iconClass;
    }

    /**
     * @param string $niceName
     */
    public function setNiceName($niceName)
    {
        $this->niceName = $niceName;
    }

    /**
     * @return string
     */
    public function getNiceName()
    {
        return $this->niceName;
    }

    /**
     * @param bool $menuShortcut
     */
    public function setMenuShortcut($menuShortcut)
    {
        $this->menuShortcut = (bool) $menuShortcut;
    }

    /**
     * @return bool
     */
    public function getMenuShortcut()
    {
        return $this->menuShortcut;
    }

    /**
     * @param array $dataSourceConfig
     */
    public function setDataSourceConfig($dataSourceConfig)
    {
        $this->dataSourceConfig = $dataSourceConfig;
    }

    /**
     * @return \stdClass|null
     */
    public function getDataSourceConfig()
    {
        if (is_array($this->dataSourceConfig) && isset($this->dataSourceConfig[0])) {
            $dataSourceConfig = new \stdClass();
            $dataSourceConfigArray = $this->dataSourceConfig[0];

            foreach ($dataSourceConfigArray as $key => $value) {
                $dataSourceConfig->$key = $value;
            }

            return $dataSourceConfig;
        }

        return null;
    }

    /**
     * @param string $chartType
     */
    public function setChartType($chartType)
    {
        $this->chartType = $chartType;
    }

    /**
     * @return string
     */
    public function getChartType()
    {
        return $this->chartType;
    }

    /**
     * @param string $pieColumn
     */
    public function setPieColumn($pieColumn)
    {
        $this->pieColumn = $pieColumn;
    }

    /**
     * @return string
     */
    public function getPieColumn()
    {
        return $this->pieColumn;
    }

    /**
     * @param string $xAxis
     */
    public function setXAxis($xAxis)
    {
        $this->xAxis = $xAxis;
    }

    /**
     * @return string
     */
    public function getXAxis()
    {
        return $this->xAxis;
    }

    /**
     * @param array|string $yAxis
     */
    public function setYAxis($yAxis)
    {
        $this->yAxis = $yAxis;
    }

    /**
     * @return array|string
     */
    public function getYAxis()
    {
        return $this->yAxis;
    }

    /**
     * @param string $pieLabelColumn
     */
    public function setPieLabelColumn($pieLabelColumn)
    {
        $this->pieLabelColumn = $pieLabelColumn;
    }

    /**
     * @return string
     */
    public function getPieLabelColumn()
    {
        return $this->pieLabelColumn;
    }

    /**
     * @return int
     */
    public function getModificationDate()
    {
        return $this->modificationDate;
    }

    /**
     * @param int $modificationDate
     */
    public function setModificationDate($modificationDate)
    {
        $this->modificationDate = $modificationDate;
    }

    /**
     * @return int
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param int $creationDate
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @return string
     */
    public function getReportClass()
    {
        return $this->reportClass;
    }

    /**
     * @param string $reportClass
     */
    public function setReportClass($reportClass)
    {
        $this->reportClass = $reportClass;
    }

    /**
     * @return bool
     */
    public function getShareGlobally()
    {
        return $this->shareGlobally;
    }

    /**
     * @param bool $shareGlobally
     */
    public function setShareGlobally($shareGlobally): void
    {
        $this->shareGlobally = $shareGlobally;
    }

    /**
     * @return int[]
     */
    public function getSharedUserIds()
    {
        $sharedUserIds = [];
        if ($this->sharedUserNames) {
            foreach ($this->sharedUserNames as $username) {
                $user = Model\User::getByName($username);
                if ($user) {
                    $sharedUserIds[] = $user->getId();
                }
            }
        }

        return $sharedUserIds;
    }

    /**
     * @param int[] $sharedUserIds
     */
    public function setSharedUserIds($sharedUserIds): void
    {
        $userNames = [];
        if ($sharedUserIds) {
            foreach ($sharedUserIds as $id) {
                $user = Model\User::getById($id);
                if ($user) {
                    $userNames[] = $user->getName();
                }
            }
        }
        $this->sharedUserNames = $userNames;
    }

    /**
     * @return int[]
     */
    public function getSharedRoleIds()
    {
        $sharedRoleIds = [];
        if ($this->sharedRoleNames) {
            foreach ($this->sharedRoleNames as $name) {
                $role = Model\User\Role::getByName($name);
                if ($role) {
                    $sharedRoleIds[] = $role->getId();
                }
            }
        }

        return $sharedRoleIds;
    }

    /**
     * @param int[] $sharedRoleIds
     */
    public function setSharedRoleIds($sharedRoleIds): void
    {
        $roleNames = [];
        if ($sharedRoleIds) {
            foreach ($sharedRoleIds as $id) {
                $role = Model\User\Role::getById($id);
                if ($role) {
                    $roleNames[] = $role->getName();
                }
            }
        }
        $this->sharedRoleNames = $roleNames;
    }

    /**
     * @return string[]
     */
    public function getSharedUserNames()
    {
        return $this->sharedUserNames;
    }

    /**
     * @param string[] $sharedUserNames
     */
    public function setSharedUserNames($sharedUserNames): void
    {
        $this->sharedUserNames = $sharedUserNames;
    }

    /**
     * @return string[]
     */
    public function getSharedRoleNames()
    {
        return $this->sharedRoleNames;
    }

    /**
     * @param string[] $sharedRoleNames
     */
    public function setSharedRoleNames($sharedRoleNames): void
    {
        $this->sharedRoleNames = $sharedRoleNames;
    }

    public function jsonSerialize()
    {
        $data = $this->getObjectVars();
        $data['sharedUserIds'] = $this->getSharedUserIds();
        $data['sharedRoleIds'] = $this->getSharedRoleIds();

        return $data;
    }
}
