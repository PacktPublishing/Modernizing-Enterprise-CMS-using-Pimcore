<?php

declare(strict_types=1);

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

namespace Pimcore\Bundle\AdminBundle\Controller\GDPR;

use Pimcore\Bundle\AdminBundle\GDPR\DataProvider\Manager;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends \Pimcore\Bundle\AdminBundle\Controller\AdminController
{
    /**
     * @Route("/get-data-providers", name="pimcore_admin_gdpr_admin_getdataproviders", methods={"GET"})
     */
    public function getDataProvidersAction(Manager $manager)
    {
        $response = [];
        foreach ($manager->getServices() as $service) {
            $response[] = [
                'name' => $service->getName(),
                'jsClass' => $service->getJsClassName(),
            ];
        }

        return $this->adminJson($response);
    }

    public function onKernelController(FilterControllerEvent $event)
    {
        if (!$event->isMasterRequest()) {
            return;
        }

        $this->checkActionPermission($event, 'gdpr_data_extractor');
    }
}
