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
 * @package    Document
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Model\Document\Editable;

use Pimcore\Document\Editable\Block\BlockName;
use Pimcore\Model;
use Pimcore\Tool\HtmlUtils;

/**
 * @method \Pimcore\Model\Document\Editable\Dao getDao()
 */
class Block extends Model\Document\Editable implements BlockInterface
{
    /**
     * Contains an array of indices, which represent the order of the elements in the block
     *
     * @var array
     */
    protected $indices = [];

    /**
     * Current step of the block while iteration
     *
     * @var int
     */
    protected $current = 0;

    /**
     * @see EditableInterface::getType
     *
     * @return string
     */
    public function getType()
    {
        return 'block';
    }

    /**
     * @see EditableInterface::getData
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->indices;
    }

    /**
     * @see EditableInterface::admin
     */
    public function admin()
    {
        // nothing to do
        return '';
    }

    /**
     * @see EditableInterface::frontend
     */
    public function frontend()
    {
        // nothing to do
        return '';
    }

    /**
     * @see EditableInterface::setDataFromResource
     *
     * @param mixed $data
     *
     * @return $this
     */
    public function setDataFromResource($data)
    {
        $this->indices = \Pimcore\Tool\Serialize::unserialize($data);

        return $this;
    }

    /**
     * @see EditableInterface::setDataFromEditmode
     *
     * @param mixed $data
     *
     * @return $this
     */
    public function setDataFromEditmode($data)
    {
        $this->indices = $data;

        return $this;
    }

    /**
     * @return $this
     */
    public function setDefault()
    {
        if (empty($this->indices) && isset($this->config['default']) && $this->config['default']) {
            for ($i = 0; $i < (int)$this->config['default']; $i++) {
                $this->indices[$i] = $i + 1;
            }
        }

        return $this;
    }

    /**
     * @return \Generator
     */
    public function getIterator()
    {
        while ($this->loop()) {
            yield $this->getCurrentIndex();
        }

        if ($this->getEditmode()) {

            // yeah, I know the following is f******* crazy :D
            $this->current = 0;
            $indicesBackup = $this->indices;
            $this->indices[0] = 1000000;
            $this->getBlockState()->pushBlock(BlockName::createFromEditable($this));
            $this->blockConstruct();
            $blockStartHtml = $this->blockStart(true, true);
            ob_start();

            $editableDefCollector = $this->getEditableDefinitionCollector();
            $editableDefCollector->stashPush();

            yield $this->getCurrentIndex() + 1;

            $blockEndHtml = $this->blockEnd(true);
            $this->blockDestruct();
            $this->getBlockState()->popBlock();

            $templateEditableDefinitions = $editableDefCollector->getDefinitions();
            $editableDefCollector->stashPull();

            $this->config['template'] = [
                'html' => $blockStartHtml . ob_get_clean() . $blockEndHtml,
                'editables' => $templateEditableDefinitions,
            ];

            $editableDefCollector->add($this);

            $this->indices = $indicesBackup;
        }
    }

    /**
     * Loops through the block
     *
     * @return bool
     */
    public function loop()
    {
        $manual = false;
        if (($this->config['manual'] ?? false) == true) {
            $manual = true;
        }

        $this->setDefault();

        if ($this->current > 0) {
            if (!$manual) {
                $this->blockDestruct();
                $this->blockEnd();
            }
        } else {
            if (!$manual) {
                $this->start();
            }
        }

        if ($this->current < count($this->indices) && $this->current < $this->config['limit']) {
            if (!$manual) {
                $this->blockConstruct();
                $this->blockStart();
            }

            return true;
        } else {
            if (!$manual) {
                $this->end();
            }

            return false;
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function getEditmodeElementAttributes(): array
    {
        $attributes = parent::getEditmodeElementAttributes();

        $attributes = array_merge($attributes, [
            'name' => $this->getName(),
            'type' => $this->getType(),
        ]);

        return $attributes;
    }

    /**
     * Is executed at the beginning of the loop and setup some general settings
     *
     * @return $this
     */
    public function start()
    {
        // set name suffix for the whole block element, this will be added to all child elements of the block
        $this->getBlockState()->pushBlock(BlockName::createFromEditable($this));

        $attributes = $this->getEditmodeElementAttributes();
        $attributeString = HtmlUtils::assembleAttributeString($attributes);

        $this->outputEditmode('<div ' . $attributeString . '>');

        return $this;
    }

    /**
     * Is executed at the end of the loop and removes the settings set in start()
     */
    public function end()
    {
        $this->current = 0;

        // remove the current block which was set by $this->start()
        $this->getBlockState()->popBlock();

        $this->outputEditmode('</div>');
    }

    /**
     * Called before the block is rendered
     */
    public function blockConstruct()
    {
        // set the current block suffix for the child elements (0, 1, 3, ...)
        // this will be removed in blockDestruct
        $this->getBlockState()->pushIndex($this->indices[$this->current] ?? 0);
    }

    /**
     * Called when the block was rendered
     */
    public function blockDestruct()
    {
        $this->getBlockState()->popIndex();
    }

    /**
     * Is called evertime a new iteration starts (new entry of the block while looping)
     *
     * @param bool $showControls
     * @param bool $return
     */
    public function blockStart($showControls = true, $return = false)
    {
        $attr = $this->getBlockAttributes();

        $outerAttributes = [
            'key' => $this->indices[$this->current] ?? null,
        ];
        $oAttr = HtmlUtils::assembleAttributeString($outerAttributes);

        $html = '<div class="pimcore_block_entry" ' . $oAttr . ' ' . $attr . '>';

        if ($showControls) {
            $html .= $this->blockControls(true);
        }

        if ($return) {
            return $html;
        }

        $this->outputEditmode($html);
    }

    /**
     * Custom position of button controls between blockStart -> blockEnd
     *
     * @param bool $return
     */
    public function blockControls($return = false)
    {
        $attr = $this->getBlockAttributes();

        $html = <<<EOT
<div class="pimcore_block_buttons" $attr>
    <div class="pimcore_block_amount" $attr></div>
    <div class="pimcore_block_plus" $attr></div>
    <div class="pimcore_block_minus" $attr></div>
    <div class="pimcore_block_up" $attr></div>
    <div class="pimcore_block_down" $attr></div>
    <div class="pimcore_block_clear" $attr></div>
</div>
EOT;

        $this->current++;

        if ($return) {
            return $html;
        }

        $this->outputEditmode($html);
    }

    /**
     * Is called evertime a new iteration ends (new entry of the block while looping)
     *
     * @param bool $return
     */
    public function blockEnd($return = false)
    {
        // close outer element
        $html = '</div>';

        if ($return) {
            return $html;
        }

        $this->outputEditmode($html);
    }

    /**
     * @param array $config
     *
     * @return $this
     */
    public function setConfig($config)
    {
        if (empty($config['limit'])) {
            $config['limit'] = 1000000;
        }

        $this->config = $config;

        if (($this->config['manual'] ?? false) === true) {
            $this->config['reload'] = true;
        }

        return $this;
    }

    /**
     * Return the amount of block elements
     *
     * @return int
     */
    public function getCount()
    {
        return count($this->indices);
    }

    /**
     * Return current iteration step
     *
     * @return int
     */
    public function getCurrent()
    {
        return $this->current - 1;
    }

    /**
     * Return current index
     *
     * @return int
     */
    public function getCurrentIndex()
    {
        return $this->indices[$this->getCurrent()] ?? 0;
    }

    /**
     * @return array
     */
    public function getIndices()
    {
        return $this->indices;
    }

    /**
     * If object was serialized, set the counter back to 0
     */
    public function __wakeup()
    {
        $this->current = 0;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return !(bool) count($this->indices);
    }

    /**
     * @return Block\Item[]
     */
    public function getElements()
    {
        $document = $this->getDocument();

        // https://github.com/pimcore/pimcore/issues/6629
        if (!$document instanceof Model\Document\PageSnippet) {
            return [];
        }

        $parentBlockNames = $this->getParentBlockNames();
        $parentBlockNames[] = $this->getName();

        $list = [];
        foreach ($this->getData() as $index) {
            $list[] = new Block\Item($document, $parentBlockNames, (int)$index);
        }

        return $list;
    }

    /**
     * @return string
     */
    private function getBlockAttributes(): string
    {
        $attributes = [
            'data-name' => $this->getName(),
            'data-real-name' => $this->getRealName(),
        ];

        return HtmlUtils::assembleAttributeString($attributes);
    }
}
