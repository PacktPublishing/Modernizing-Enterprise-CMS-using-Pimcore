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
 * @package    Element
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Model\DataObject\Traits;

use Pimcore\Model\AbstractModel;
use Pimcore\Model\DataObject\OwnerAwareFieldInterface;

trait ObjectVarTrait
{
    /**
     * returns object values without the dao
     *
     * @return array
     */
    public function getObjectVars()
    {
        $data = get_object_vars($this);

        if ($this instanceof AbstractModel && isset($data['dao'])) {
            unset($data['dao']);
        }

        if ($this instanceof OwnerAwareFieldInterface && isset($data['_owner'])) {
            unset($data['_owner']);
        }

        return $data;
    }

    /**
     * @param string $var
     *
     * @return mixed
     */
    public function getObjectVar($var)
    {
        if (!property_exists($this, $var)) {
            return null;
        }

        return $this->{$var};
    }

    /**
     * @param string $var
     * @param mixed $value
     * @param bool $silent
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setObjectVar($var, $value, bool $silent = false)
    {
        if (!property_exists($this, $var)) {
            if ($silent) {
                return $this;
            }

            throw new \Exception('property ' . $var . ' does not exist');
        }
        $this->$var = $value;

        return $this;
    }
}
