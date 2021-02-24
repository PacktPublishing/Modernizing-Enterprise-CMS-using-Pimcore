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

namespace Pimcore\Controller;

use Pimcore\Controller\Traits\TemplateControllerTrait;
use Pimcore\Http\Request\Resolver\DocumentResolver;
use Pimcore\Http\Request\Resolver\EditmodeResolver;
use Pimcore\Http\Request\Resolver\ResponseHeaderResolver;
use Pimcore\Http\Request\Resolver\ViewModelResolver;
use Pimcore\Model\Document;
use Pimcore\Templating\Model\ViewModel;
use Pimcore\Templating\Renderer\EditableRenderer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

/**
 * @property ViewModel $view
 * @property Document|Document\PageSnippet $document
 * @property bool $editmode
 */
abstract class FrontendController extends Controller implements EventedControllerInterface, TemplateControllerInterface
{
    use TemplateControllerTrait;

    /**
     * Expose view, document and editmode as properties and proxy them to request attributes through
     * their resolvers.
     *
     * @inheritDoc
     */
    public function __get($name)
    {
        if ('view' === $name) {
            return $this->get(ViewModelResolver::class)->getViewModel();
        }

        if ('document' === $name) {
            return $this->get(DocumentResolver::class)->getDocument();
        }

        if ('editmode' === $name) {
            return $this->get(EditmodeResolver::class)->isEditmode();
        }

        throw new \RuntimeException(sprintf('Trying to read undefined property "%s"', $name));
    }

    /**
     * @inheritDoc
     */
    public function __set($name, $value)
    {
        $requestAttributes = ['view', 'document', 'editmode'];
        if (in_array($name, $requestAttributes)) {
            throw new \RuntimeException(sprintf(
                'Property "%s" is a request attribute and can\'t be set on the controller instance',
                $name
            ));
        }

        throw new \RuntimeException(sprintf('Trying to set unknown property "%s"', $name));
    }

    /**
     * @inheritDoc
     */
    public function onKernelController(FilterControllerEvent $event)
    {
        // enable view auto-rendering
        $this->setViewAutoRender($event->getRequest(), true, 'php');
    }

    /**
     * @inheritDoc
     */
    public function onKernelResponse(FilterResponseEvent $event)
    {
    }

    /**
     * Enable view autorendering for the current request
     *
     * @param Request $request
     * @param string $engine
     *
     * @deprecated
     */
    protected function enableViewAutoRender(Request $request = null, $engine = 'php')
    {
        if (null === $request) {
            $request = $this->get('request_stack')->getCurrentRequest();
        }

        $this->setViewAutoRender($request, true, $engine);
    }

    /**
     * Disable view autorendering for the current request
     *
     * @param Request $request
     *
     * @deprecated
     */
    protected function disableViewAutoRender(Request $request = null)
    {
        if (null === $request) {
            $request = $this->get('request_stack')->getCurrentRequest();
        }

        $this->setViewAutoRender($request, false);
    }

    /**
     * We don't have a response object at this point, but we can add headers here which will be
     * set by the ResponseHeaderListener which reads and adds this headers in the kernel.response event.
     *
     * @param string $key
     * @param array|string $values
     * @param bool $replace
     * @param Request|null $request
     */
    protected function addResponseHeader(string $key, $values, bool $replace = false, Request $request = null)
    {
        if (null === $request) {
            $request = $this->get('request_stack')->getCurrentRequest();
        }

        $this->get(ResponseHeaderResolver::class)->addResponseHeader($request, $key, $values, $replace);
    }

    /**
     * Loads a document editable
     *
     * e.g. `$this->getDocumentTag('input', 'foobar')`
     *
     * @param string $type
     * @param string $inputName
     * @param array $options
     * @param Document\PageSnippet|null $document
     *
     * @return null|Document\Tag
     *
     * @deprecated since v6.8 and will be removed in 7. Use getDocumentEditable() instead.
     */
    public function getDocumentTag($type, $inputName, array $options = [], Document\PageSnippet $document = null)
    {
        return $this->getDocumentEditable($type, $inputName, $options, $document);
    }

    /**
     * Loads a document editable
     *
     * e.g. `$this->getDocumentEditable('input', 'foobar')`
     *
     * @param string $type
     * @param string $inputName
     * @param array $options
     * @param Document\PageSnippet|null $document
     *
     * @return null|Document\Tag
     */
    public function getDocumentEditable($type, $inputName, array $options = [], Document\PageSnippet $document = null)
    {
        if (null === $document) {
            $document = $this->document;
        }

        $editableRenderer = $this->container->get(EditableRenderer::class);

        return $editableRenderer->getEditable($document, $type, $inputName, $options);
    }

    /**
     * @param string $view
     * @param array $parameters
     * @param Response|null $response
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function renderTemplate($view, array $parameters = [], Response $response = null)
    {
        $viewModel = $this->get(ViewModelResolver::class)->getViewModel();
        $parameters = array_merge($viewModel->getAllParameters(), $parameters);

        return $this->render($view, $parameters, $response);
    }
}
