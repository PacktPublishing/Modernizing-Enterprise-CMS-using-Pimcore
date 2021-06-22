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

namespace Pimcore\Bundle\AdminBundle\Controller\GDPR;

use Pimcore\Bundle\AdminBundle\GDPR\DataProvider\Assets;
use Pimcore\Bundle\AdminBundle\HttpFoundation\JsonResponse;
use Pimcore\Controller\KernelControllerEventInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AssetController
 *
 * @Route("/asset")
 *
 * @package GDPRDataExtractorBundle\Controller
 *
 * @internal
 */
final class AssetController extends \Pimcore\Bundle\AdminBundle\Controller\AdminController implements KernelControllerEventInterface
{
    /**
     * {@inheritdoc}
     */
    public function onKernelControllerEvent(ControllerEvent $event)
    {
        $isMasterRequest = $event->isMasterRequest();
        if (!$isMasterRequest) {
            return;
        }

        $this->checkActionPermission($event, 'gdpr_data_extractor');
    }

    /**
     * @Route("/search-assets", name="pimcore_admin_gdpr_asset_searchasset", methods={"GET"})
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function searchAssetAction(Request $request, Assets $service)
    {
        $allParams = array_merge($request->request->all(), $request->query->all());

        $result = $service->searchData(
            (int)$allParams['id'],
            strip_tags($allParams['firstname']),
            strip_tags($allParams['lastname']),
            strip_tags($allParams['email']),
            (int)$allParams['start'],
            (int)$allParams['limit'],
            $allParams['sort'] ?? null
        );

        return $this->adminJson($result);
    }

    /**
     * @Route("/export", name="pimcore_admin_gdpr_asset_exportassets", methods={"GET"})
     *
     * @param Request $request
     * @param Assets $service
     *
     * @return Response
     *
     * @throws \Exception
     */
    public function exportAssetsAction(Request $request, Assets $service)
    {
        $asset = \Pimcore\Model\Asset::getById($request->get('id'));
        if (!$asset->isAllowed('view')) {
            throw new \Exception('export denied');
        }
        $exportResult = $service->doExportData($asset);

        return $exportResult;
    }
}
