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

namespace Pimcore\Model\DataObject\ClassDefinition\Data\Extension;

use Pimcore\Model;

trait Text
{
    /**
     * {@inheritdoc}
     */
    public function checkValidity($data, $omitMandatoryCheck = false, $params = [])
    {
        if (!$omitMandatoryCheck && $this->getMandatory() && $this->isEmpty($data)) {
            throw new Model\Element\ValidationException('Empty mandatory field [ ' . $this->getName() . ' ]');
        }
    }

    /**
     * @param string|null $data
     *
     * @return bool
     */
    public function isEmpty($data)
    {
        return strlen($data) < 1;
    }

    /**
     * {@inheritdoc}
     */
    public function isDiffChangeAllowed($object, $params = [])
    {
        return true;
    }

    /**
     * @see Data::getVersionPreview
     *
     * @param string $data
     * @param null|Model\DataObject\AbstractObject $object
     * @param array $params
     *
     * @return string
     */
    public function getVersionPreview($data, $object = null, $params = [])
    {
        // remove all <script> tags, to prevent XSS in the version preview
        // this should normally be filtered in the project specific controllers/action (/website folder) but just to be sure
        $data = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $data);

        return $data;
    }
}
