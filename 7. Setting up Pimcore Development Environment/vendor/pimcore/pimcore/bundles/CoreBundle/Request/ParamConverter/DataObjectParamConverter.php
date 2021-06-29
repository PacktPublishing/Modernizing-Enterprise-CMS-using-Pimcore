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

namespace Pimcore\Bundle\CoreBundle\Request\ParamConverter;

use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Tool;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @internal
 */
class DataObjectParamConverter implements ParamConverterInterface
{
    /**
     * {@inheritdoc}
     *
     * @throws NotFoundHttpException When invalid data object ID given
     */
    public function apply(Request $request, ParamConverter $configuration)
    {
        $param = $configuration->getName();

        if (!$request->attributes->has($param)) {
            return false;
        }

        $value = $request->attributes->get($param);

        if (!$value && $configuration->isOptional()) {
            $request->attributes->set($param, null);

            return true;
        }

        $class = $configuration->getClass();

        /** @var Concrete|null $object */
        $object = $class::getById($value);
        if (!$object) {
            throw new NotFoundHttpException(sprintf('Invalid data object ID given for parameter "%s".', $param));
        } elseif (!$object->isPublished() && !Tool::isElementRequestByAdmin($request, $object)) {
            throw new NotFoundHttpException(sprintf('Data object for parameter "%s" is not published.', $param));
        }

        $request->attributes->set($param, $object);

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function supports(ParamConverter $configuration)
    {
        if (null === $configuration->getClass()) {
            return false;
        }

        return is_subclass_of($configuration->getClass(), AbstractObject::class);
    }
}
