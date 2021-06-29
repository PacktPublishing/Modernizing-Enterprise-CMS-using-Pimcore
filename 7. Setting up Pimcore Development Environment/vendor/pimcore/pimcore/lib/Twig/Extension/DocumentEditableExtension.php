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

namespace Pimcore\Twig\Extension;

use Pimcore\Model\Document\Editable\BlockInterface;
use Pimcore\Model\Document\PageSnippet;
use Pimcore\Templating\Renderer\EditableRenderer;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * @internal
 */
class DocumentEditableExtension extends AbstractExtension
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
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('pimcore_*', [$this, 'renderEditable'], [
                'needs_context' => true,
                'is_safe' => ['html'],
            ]),
            new TwigFunction('pimcore_iterate_block', [$this, 'getBlockIterator']),
        ];

        // @phpstan-ignore-next-line those are just for auto-complete, not nice, but works ;-)
        new TwigFunction('pimcore_area');
        new TwigFunction('pimcore_areablock');
        new TwigFunction('pimcore_block');
        new TwigFunction('pimcore_checkbox');
        new TwigFunction('pimcore_date');
        new TwigFunction('pimcore_embed');
        new TwigFunction('pimcore_image');
        new TwigFunction('pimcore_input');
        new TwigFunction('pimcore_link');
        new TwigFunction('pimcore_multiselect');
        new TwigFunction('pimcore_numeric');
        new TwigFunction('pimcore_pdf');
        new TwigFunction('pimcore_relation');
        new TwigFunction('pimcore_relations');
        new TwigFunction('pimcore_renderlet');
        new TwigFunction('pimcore_scheduledblock');
        new TwigFunction('pimcore_select');
        new TwigFunction('pimcore_snippet');
        new TwigFunction('pimcore_textarea');
        new TwigFunction('pimcore_video');
        new TwigFunction('pimcore_wysiwyg');
    }

    /**
     * @internal
     *
     * @param array $context
     * @param string $type
     * @param string $name
     * @param array $options
     *
     * @return \Pimcore\Model\Document\Editable|string
     *
     * @throws \Exception
     */
    public function renderEditable(array $context, string $type, string $name, array $options = [])
    {
        $document = $context['document'];
        $editmode = $context['editmode'];
        if (!($document instanceof PageSnippet)) {
            return '';
        }

        return $this->editableRenderer->render($document, $type, $name, $options, $editmode);
    }

    /**
     * Returns an iterator which can be used instead of while($block->loop())
     *
     * @internal
     *
     * @param BlockInterface $block
     *
     * @return \Generator|int[]
     */
    public function getBlockIterator(BlockInterface $block): \Generator
    {
        return $block->getIterator();
    }
}
