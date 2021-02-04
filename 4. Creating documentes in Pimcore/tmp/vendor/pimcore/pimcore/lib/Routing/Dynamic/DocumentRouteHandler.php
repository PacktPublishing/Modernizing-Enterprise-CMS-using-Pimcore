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

namespace Pimcore\Routing\Dynamic;

use Pimcore\Config;
use Pimcore\Controller\Config\ConfigNormalizer;
use Pimcore\Http\Request\Resolver\SiteResolver;
use Pimcore\Http\RequestHelper;
use Pimcore\Model\Document;
use Pimcore\Routing\DocumentRoute;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Symfony\Component\Routing\RouteCollection;

class DocumentRouteHandler implements DynamicRouteHandlerInterface
{
    /**
     * @var Document\Service
     */
    private $documentService;

    /**
     * @var SiteResolver
     */
    private $siteResolver;

    /**
     * @var RequestHelper
     */
    private $requestHelper;

    /**
     * @var ConfigNormalizer
     */
    private $configNormalizer;

    /**
     * Determines if unpublished documents should be matched, even when not in admin mode. This
     * is mainly needed for maintencance jobs/scripts.
     *
     * @var bool
     */
    private $forceHandleUnpublishedDocuments = false;

    /**
     * @var array
     */
    private $directRouteDocumentTypes = ['page', 'snippet', 'email', 'newsletter', 'printpage', 'printcontainer'];

    /**
     * @var Config
     */
    private $config;

    /**
     * @param Document\Service $documentService
     * @param SiteResolver $siteResolver
     * @param RequestHelper $requestHelper
     * @param ConfigNormalizer $configNormalizer
     * @param Config $config
     */
    public function __construct(
        Document\Service $documentService,
        SiteResolver $siteResolver,
        RequestHelper $requestHelper,
        ConfigNormalizer $configNormalizer,
        Config $config
    ) {
        $this->documentService = $documentService;
        $this->siteResolver = $siteResolver;
        $this->requestHelper = $requestHelper;
        $this->configNormalizer = $configNormalizer;
        $this->config = $config;
    }

    public function setForceHandleUnpublishedDocuments(bool $handle)
    {
        $this->forceHandleUnpublishedDocuments = $handle;
    }

    /**
     * @return array
     */
    public function getDirectRouteDocumentTypes()
    {
        return $this->directRouteDocumentTypes;
    }

    /**
     * @param string $type
     */
    public function addDirectRouteDocumentType($type)
    {
        if (!in_array($type, $this->directRouteDocumentTypes)) {
            $this->directRouteDocumentTypes[] = $type;
        }
    }

    /**
     * @inheritDoc
     */
    public function getRouteByName(string $name)
    {
        if (preg_match('/^document_(\d+)$/', $name, $match)) {
            $document = Document::getById($match[1]);

            if ($this->isDirectRouteDocument($document)) {
                return $this->buildRouteForDocument($document);
            }
        }

        throw new RouteNotFoundException(sprintf("Route for name '%s' was not found", $name));
    }

    /**
     * @inheritDoc
     */
    public function matchRequest(RouteCollection $collection, DynamicRequestContext $context)
    {
        $document = Document::getByPath($context->getPath());

        // check for a pretty url inside a site
        if (!$document && $this->siteResolver->isSiteRequest($context->getRequest())) {
            $site = $this->siteResolver->getSite($context->getRequest());

            $sitePrettyDocId = $this->documentService->getDao()->getDocumentIdByPrettyUrlInSite($site, $context->getOriginalPath());
            if ($sitePrettyDocId) {
                if ($sitePrettyDoc = Document::getById($sitePrettyDocId)) {
                    $document = $sitePrettyDoc;

                    // TODO set pretty path via siteResolver?
                    // undo the modification of the path by the site detection (prefixing with site root path)
                    // this is not necessary when using pretty-urls and will cause problems when validating the
                    // prettyUrl later (redirecting to the prettyUrl in the case the page was called by the real path)
                    $context->setPath($context->getOriginalPath());
                }
            }
        }

        // check for a parent hardlink with children
        if (!$document instanceof Document) {
            $hardlinkedParentDocument = $this->documentService->getNearestDocumentByPath($context->getPath(), true);
            if ($hardlinkedParentDocument instanceof Document\Hardlink) {
                if ($hardLinkedDocument = Document\Hardlink\Service::getChildByPath($hardlinkedParentDocument, $context->getPath())) {
                    $document = $hardLinkedDocument;
                }
            }
        }

        if ($document && $document instanceof Document) {
            if ($route = $this->buildRouteForDocument($document, $context)) {
                $collection->add($route->getRouteKey(), $route);
            }
        }
    }

    /**
     * Build a route for a document. Context is only set from match mode, not when generating URLs.
     *
     * @param Document $document
     * @param DynamicRequestContext|null $context
     *
     * @return DocumentRoute|null
     */
    public function buildRouteForDocument(Document $document, DynamicRequestContext $context = null)
    {
        // check for direct hardlink
        if ($document instanceof Document\Hardlink) {
            $document = Document\Hardlink\Service::wrap($document);

            if (!$document) {
                return null;
            }
        }

        $route = new DocumentRoute($document->getFullPath());
        $route->setOption('utf8', true);

        // coming from matching -> set route path the currently matched one
        if (null !== $context) {
            $route->setPath($context->getOriginalPath());
        }

        $route->setDefault('_locale', $document->getProperty('language'));
        $route->setDocument($document);

        if ($this->isDirectRouteDocument($document)) {
            /** @var Document\PageSnippet $document */
            $route = $this->handleDirectRouteDocument($document, $route, $context);
        } elseif ($document->getType() === 'link') {
            /** @var Document\Link $document */
            $route = $this->handleLinkDocument($document, $route);
        }

        return $route;
    }

    /**
     * Handle route params for link document
     *
     * @param Document\Link $document
     * @param DocumentRoute $route
     *
     * @return DocumentRoute
     */
    private function handleLinkDocument(Document\Link $document, DocumentRoute $route)
    {
        $route->setDefault('_controller', 'Symfony\Bundle\FrameworkBundle\Controller\RedirectController::urlRedirectAction');
        $route->setDefault('path', $document->getHref());
        $route->setDefault('permanent', true);

        return $route;
    }

    /**
     * Handle direct route documents (not link)
     *
     * @param Document\PageSnippet $document
     * @param DocumentRoute $route
     * @param DynamicRequestContext|null $context
     *
     * @return DocumentRoute|null
     */
    private function handleDirectRouteDocument(
        Document\PageSnippet $document,
        DocumentRoute $route,
        DynamicRequestContext $context = null
    ) {
        // if we have a request we're currently in match mode (not generating URLs) -> only match when frontend request by admin
        try {
            $request = null;
            if ($context) {
                $request = $context->getRequest();
            }
            $isAdminRequest = $this->requestHelper->isFrontendRequestByAdmin($request);
        } catch (\LogicException $e) {
            // catch logic exception here - when the exception fires, it is no admin request
            $isAdminRequest = false;
        }

        // abort if document is not published and the request is no admin request
        // and matching unpublished documents was not forced
        if (!$document->isPublished()) {
            if (!($isAdminRequest || $this->forceHandleUnpublishedDocuments)) {
                return null;
            }
        }

        if (!$isAdminRequest && null !== $context) {
            // check for redirects (pretty URL, SEO) when not in admin mode and while matching (not generating route)
            if ($redirectRoute = $this->handleDirectRouteRedirect($document, $route, $context)) {
                return $redirectRoute;
            }
        }

        return $this->buildRouteForPageSnippetDocument($document, $route);
    }

    /**
     * Handle document redirects (pretty url, SEO without trailing slash)
     *
     * @param Document\PageSnippet $document
     * @param DocumentRoute $route
     * @param DynamicRequestContext|null $context
     *
     * @return DocumentRoute|null
     */
    private function handleDirectRouteRedirect(
        Document\PageSnippet $document,
        DocumentRoute $route,
        DynamicRequestContext $context = null
    ) {
        $redirectTargetUrl = $context->getOriginalPath();

        // check for a pretty url, and if the document is called by that, otherwise redirect to pretty url
        if ($document instanceof Document\Page && !$document instanceof Document\Hardlink\Wrapper\WrapperInterface) {
            if ($prettyUrl = $document->getPrettyUrl()) {
                if (rtrim(strtolower($prettyUrl), ' /') !== rtrim(strtolower($context->getOriginalPath()), '/')) {
                    $redirectTargetUrl = $prettyUrl;
                }
            }
        }

        // check for a trailing slash in path, if exists, redirect to this page without the slash
        // the only reason for this is: SEO, Analytics, ... there is no system specific reason, pimcore would work also with a trailing slash without problems
        // use $originalPath because of the sites
        // only do redirecting with GET requests
        if ($context->getRequest()->getMethod() === 'GET') {
            if (($this->config['documents']['allow_trailing_slash'] ?? null) === 'no') {
                if ($redirectTargetUrl !== '/' && substr($redirectTargetUrl, -1) === '/') {
                    $redirectTargetUrl = rtrim($redirectTargetUrl, '/');
                }
            }

            // only allow the original key of a document to be the URL (lowercase/uppercase)
            if ($redirectTargetUrl !== '/' && rtrim($redirectTargetUrl, '/') !== rawurldecode($document->getFullPath())) {
                $redirectTargetUrl = $document->getFullPath();
            }
        }

        if (null !== $redirectTargetUrl && $redirectTargetUrl !== $context->getOriginalPath()) {
            $route->setDefault('_controller', 'Symfony\Bundle\FrameworkBundle\Controller\RedirectController::urlRedirectAction');
            $route->setDefault('path', $redirectTargetUrl);
            $route->setDefault('permanent', true);

            return $route;
        }

        return null;
    }

    /**
     * Handle page snippet route (controller, action, view)
     *
     * @param Document\PageSnippet $document
     * @param DocumentRoute $route
     *
     * @return DocumentRoute
     */
    private function buildRouteForPageSnippetDocument(Document\PageSnippet $document, DocumentRoute $route)
    {
        $controller = $this->configNormalizer->formatControllerReference(
            $document->getModule(),
            $document->getController(),
            $document->getAction()
        );

        $route->setDefault('_controller', $controller);

        if ($document->getTemplate()) {
            $template = $this->configNormalizer->normalizeTemplateName($document->getTemplate());
            $route->setDefault('_template', $template);
        }

        return $route;
    }

    /**
     * Check if document is can be used to generate a route
     *
     * @param Document\PageSnippet $document
     *
     * @return bool
     */
    private function isDirectRouteDocument($document)
    {
        if ($document instanceof Document\PageSnippet) {
            if (in_array($document->getType(), $this->getDirectRouteDocumentTypes())) {
                return true;
            }
        }

        return false;
    }
}
