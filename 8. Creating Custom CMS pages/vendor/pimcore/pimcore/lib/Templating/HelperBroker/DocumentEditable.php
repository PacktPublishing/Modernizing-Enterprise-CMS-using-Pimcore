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

namespace Pimcore\Templating\HelperBroker;

use Pimcore\Templating\PhpEngine;
use Pimcore\Templating\Renderer\EditableRenderer;

/**
 * @deprecated
 */
class DocumentEditable implements HelperBrokerInterface
{
    /**
     * @var EditableRenderer
     */
    protected $editableRenderer;

    /**
     * @param EditableRenderer $editableRenderer
     */
    public function __construct(EditableRenderer $editableRenderer)
    {
        $this->editableRenderer = $editableRenderer;
    }

    /**
     * @inheritDoc
     */
    public function supports(PhpEngine $engine, $method)
    {
        if ($this->editableRenderer->editableExists($method)) {
            return true;
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    public function helper(PhpEngine $engine, $method, array $arguments)
    {
        $document = $engine->getViewParameter('document');

        // if editmode is set as parameter override the editmode resolver value
        $editmode = $engine->getViewParameter('editmode');
        if (null !== $editmode) {
            $editmode = (bool)$editmode;
        }

        if (null === $document) {
            throw new \RuntimeException(sprintf('Trying to render the tag "%s", but no document was found', $method));
        }

        if (!isset($arguments[0])) {
            throw new \Exception('You have to set a name for the called tag (editable): ' . $method);
        }

        // set default if there is no editable configuration provided
        if (!isset($arguments[1])) {
            $arguments[1] = [];
        }

        return $this->editableRenderer->render($document, $method, $arguments[0], $arguments[1], $editmode);
    }
}

class_alias(DocumentEditable::class, 'Pimcore\Templating\HelperBroker\DocumentTag');
