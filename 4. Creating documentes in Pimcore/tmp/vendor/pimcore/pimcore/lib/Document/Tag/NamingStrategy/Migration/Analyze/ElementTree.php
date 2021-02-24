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

namespace Pimcore\Document\Tag\NamingStrategy\Migration\Analyze;

use Pimcore\Document\Tag\NamingStrategy\Migration\Analyze\Element\AbstractBlock;
use Pimcore\Document\Tag\NamingStrategy\Migration\Analyze\Element\AbstractElement;
use Pimcore\Document\Tag\NamingStrategy\Migration\Analyze\Element\Areablock;
use Pimcore\Document\Tag\NamingStrategy\Migration\Analyze\Element\Block;
use Pimcore\Document\Tag\NamingStrategy\Migration\Analyze\Element\Editable;
use Pimcore\Document\Tag\NamingStrategy\Migration\Analyze\Exception\BuildEditableException;
use Pimcore\Document\Tag\NamingStrategy\Migration\Analyze\Exception\LogicException;
use Pimcore\Model\Document;

/**
 * @deprecated
 */
final class ElementTree
{
    /**
     * @var Document\PageSnippet
     */
    private $document;

    /**
     * @var ConflictResolverInterface
     */
    private $conflictResolver;

    /**
     * Map of elements by name => type
     *
     * @var array
     */
    private $map = [];

    /**
     * Element data indexed by name
     *
     * @var array
     */
    private $data = [];

    /**
     * @var array
     */
    private $inheritedElements = [];

    /**
     * @var AbstractElement[]
     */
    private $elements = [];

    /**
     * @var BuildEditableException[]
     */
    private $ignoredElements = [];

    /**
     * @var bool
     */
    private $processed = false;

    /**
     * @var array
     */
    private $blockTypes = [
        'block' => Block::class,
        'areablock' => Areablock::class,
    ];

    /**
     * @param Document\PageSnippet $document
     * @param ConflictResolverInterface $conflictResolver
     */
    public function __construct(
        Document\PageSnippet $document,
        ConflictResolverInterface $conflictResolver
    ) {
        $this->document = $document;
        $this->conflictResolver = $conflictResolver;
    }

    /**
     * Add an element mapping
     *
     * @param string $name
     * @param string $type
     * @param mixed $data
     * @param bool $inherited
     */
    public function add(string $name, string $type, $data, bool $inherited = false)
    {
        // do not overwrite document elements with inherited ones
        if ($inherited && isset($this->map[$name])) {
            return;
        }

        $this->map[$name] = $type;
        $this->data[$name] = $data;

        if ($inherited && !in_array($name, $this->inheritedElements)) {
            $this->inheritedElements[] = $name;
        }

        $this->reset();
    }

    /**
     * @return AbstractElement[]
     */
    public function getElements(): array
    {
        $this->process();

        return $this->elements;
    }

    /**
     * @param string $name
     *
     * @return AbstractElement
     */
    public function getElement(string $name): AbstractElement
    {
        $this->process();

        if (!isset($this->elements[$name])) {
            throw new \InvalidArgumentException(sprintf('Element with name "%s" does not exist', $name));
        }

        return $this->elements[$name];
    }

    /**
     * @return BuildEditableException[]
     */
    public function getIgnoredElements(): array
    {
        return $this->ignoredElements;
    }

    private function reset()
    {
        $this->processed = false;
        $this->elements = [];
        $this->ignoredElements = [];
    }

    private function process()
    {
        if ($this->processed) {
            return;
        }

        ksort($this->map);

        $this->inheritedElements = array_unique($this->inheritedElements);
        sort($this->inheritedElements);

        $blockNames = $this->getBlockNames();
        $blockParentCandidates = $this->findBlockParentCandidates($blockNames);
        $blocks = $this->buildBlocks($blockNames, $blockParentCandidates);
        $editables = $this->buildEditables($this->getBlocksSortedByLevel($blocks));

        // just add not inherited elements to elements array
        $this->elements = [];
        foreach (array_merge($blocks, $editables) as $name => $element) {
            if (in_array($name, $this->inheritedElements)) {
                continue;
            }

            $this->elements[$name] = $element;
        }

        $this->processed = true;
    }

    /**
     * @param AbstractBlock[] $blocks
     *
     * @return array
     */
    private function buildEditables(array $blocks): array
    {
        $editables = [];
        foreach ($this->map as $name => $type) {
            if ($this->isBlock($type)) {
                continue;
            }

            try {
                $editables[$name] = $this->buildEditable($name, $blocks);
            } catch (BuildEditableException $e) {
                // do not throw exception is ignoreElement is not set
                if ($e->getIgnoreElement()) {
                    $this->ignoredElements[] = $e;
                } else {
                    throw $e;
                }
            }
        }

        return $editables;
    }

    /**
     * @param string $name
     * @param AbstractBlock[] $blocks
     *
     * @return Editable
     */
    private function buildEditable(string $name, array $blocks): Editable
    {
        $parentBlocks = [];
        foreach ($blocks as $block) {
            $pattern = self::buildNameMatchingPattern($block->getEditableMatchString());

            if (preg_match($pattern, $name, $matches)) {
                $parentBlocks[] = $block;
            }
        }

        // no parent blocks -> root element without parent
        if (count($parentBlocks) === 0) {
            return new Editable($name, $this->map[$name], $this->data[$name]);
        }

        /** @var Editable[] $editables */
        $editables = [];

        $errors = [];
        foreach ($parentBlocks as $parentBlock) {
            try {
                $editables[] = new Editable($name, $this->map[$name], $this->data[$name], $parentBlock);
            } catch (LogicException $e) {
                // noop - failed to build editable (e.g. because indexes do not match)
                $errors[] = $e;
            }
        }

        if (count($editables) === 1) {
            return $editables[0];
        }

        $exception = BuildEditableException::create(
            $name,
            $this->map[$name],
            sprintf(
                'Failed to resolve editable hierarchy for element "%s". Element can\'t be migrated.',
                $name
            ),
            $errors,
            $this->data[$name]
        );

        if (count($editables) === 0) {
            throw $this->conflictResolver->resolveBuildFailed(
                $this->document,
                $exception
            );
        }

        return $this->conflictResolver->resolveEditableConflict(
            $this->document,
            $exception,
            $editables
        );
    }

    private function buildBlocks(array $blockNames, array $parentCandidates): array
    {
        $blocks = [];

        // build blocks at lowest hierarchy first
        foreach ($blockNames as $blockName) {
            if (!isset($parentCandidates[$blockName])) {
                $blocks[$blockName] = $this->buildBlock($blockName);
            }
        }

        $blocks = $this->buildBlockHierarchy($blockNames, $parentCandidates, $blocks);

        foreach ($blockNames as $blockName) {
            if (!isset($blocks[$blockName])) {
                throw new \RuntimeException(sprintf('Block "%s" could not be built', $blockName));
            }
        }

        return $blocks;
    }

    private function buildBlockHierarchy(array $blockNames, array $parentCandidates, array $blocks): array
    {
        $changed = false;

        foreach ($blockNames as $blockName) {
            // block was already built
            if (isset($blocks[$blockName])) {
                continue;
            }

            // block has no parents
            if (!isset($parentCandidates[$blockName])) {
                continue;
            }

            // block has a single parent
            if (count($parentCandidates[$blockName]) === 1) {
                try {
                    // try to add single parent as parent - will fail if index structure does not match
                    $blocks[$blockName] = $this->buildBlock($blockName, $blocks[$parentCandidates[$blockName][0]]);
                    $changed = true;
                } catch (LogicException $e) {
                    throw BuildEditableException::create(
                        $blockName,
                        $this->map[$blockName],
                        sprintf(
                            'Failed to build block "%s" with parent "%s"',
                            $blockName,
                            $parentCandidates[$blockName][0]
                        ),
                        [$e->getMessage()],
                        $this->data[$blockName]
                    );
                }
            }

            // fetch all parent blocks
            $candidateBlocks = [];
            foreach ($parentCandidates[$blockName] as $parentCandidate) {
                if (!isset($blocks[$parentCandidate])) {
                    continue 2; // parent candidates were not built yet -> continue
                }

                $candidateBlocks[] = $blocks[$parentCandidate];
            }

            // check if all parent candidates could be resolved
            if (count($candidateBlocks) !== count($parentCandidates[$blockName])) {
                throw BuildEditableException::create(
                    $blockName,
                    $this->map[$blockName],
                    sprintf(
                        'Failed to resolve %d parent candidates for block "%s"',
                        count($parentCandidates[$blockName]),
                        $blockName
                    ),
                    [],
                    $this->data[$blockName]
                );
            }

            $resolvedBlocks = [];
            $errors = [];

            // try to build a candidate block - set parent check will fail if parent indexes can not match
            foreach ($candidateBlocks as $candidateBlock) {
                try {
                    $resolvedBlocks[] = $this->buildBlock($blockName, $candidateBlock);
                } catch (LogicException $e) {
                    $errors[] = $e;
                }
            }

            if (count($resolvedBlocks) === 1) {
                // single parent -> add to list
                $blocks[$blockName] = $resolvedBlocks[0];
                $changed = true;
            } elseif (count($resolvedBlocks) > 1) {
                // resolve multiple available blocks
                $exception = BuildEditableException::create(
                    $blockName,
                    $this->map[$blockName],
                    sprintf(
                        'Failed to resolve block hierarchy for block "%s". Block can\'t be migrated.',
                        $blockName
                    ),
                    $errors,
                    $this->data[$blockName]
                );

                $blocks[$blockName] = $this->conflictResolver->resolveBlockConflict(
                    $this->document,
                    $exception,
                    $resolvedBlocks
                );

                $changed = true;
            }
        }

        // if anything was changed, iterate the list again
        if ($changed) {
            return $this->buildBlockHierarchy($blockNames, $parentCandidates, $blocks);
        }

        return $blocks;
    }

    /**
     * Tries to find a list of blocks which could be a block's parent. Example:
     *
     *      name:     AB-B-ABAB_AB-BAB33_1
     *      parents:  [
     *          AB,
     *          AB-B
     *      ]
     *
     * We need to catch the AB-B parent, not its ancestor AB, so we first try to find
     * all candidates, then resolve in resolveBlockParents until only one candidate
     * is left in the list. As soon as we know AB is AB-B's parent, we can safely
     * remove AB from the list of candidates for AB-B-ABAB_AB-BAB33_1
     *
     * @param array $blockNames
     *
     * @return array
     */
    private function findBlockParentCandidates(array $blockNames): array
    {
        $parentCandidates = [];
        foreach ($blockNames as $blockName) {
            $pattern = self::buildNameMatchingPattern($blockName);
            $tmpBlock = $this->buildBlock($blockName);

            foreach ($blockNames as $matchingBlockName) {
                if ($blockName === $matchingBlockName) {
                    continue;
                }

                if (preg_match($pattern, $matchingBlockName, $match)) {
                    if (isset($match['indexes']) && !empty($match['indexes'])) {
                        $indexes = explode('_', $match['indexes']);
                        $index = (int)array_pop($indexes);

                        if ($tmpBlock->hasChildIndex($index)) {
                            $parentCandidates[$matchingBlockName][] = $blockName;
                        }
                    }
                }
            }
        }

        $parentCandidates = $this->reduceBlockParentCandidates($parentCandidates);

        return $parentCandidates;
    }

    /**
     * Reduces block parent candidates by excluding parent candidates which are the parent
     * of another parent candidate
     *
     * @param array $parentCandidates
     *
     * @return array
     */
    private function reduceBlockParentCandidates(array $parentCandidates): array
    {
        $changed = false;
        $directParents = $this->buildDirectParents($parentCandidates);

        foreach ($parentCandidates as $name => $candidates) {
            if (count($candidates) === 1) {
                continue;
            }

            $indexesToRemove = [];
            foreach ($candidates as $candidate) {
                // check if the parent of the candidate is in our candidates list
                // if found (array_keys has a result), remove the parent from our candidates list
                if (isset($directParents[$candidate])) {
                    $parent = $directParents[$candidate];
                    $indexesToRemove = array_merge($indexesToRemove, array_keys($candidates, $parent));
                }
            }

            // remove all parent candidates we found
            if (count($indexesToRemove) > 0) {
                foreach ($indexesToRemove as $indexToRemove) {
                    unset($candidates[$indexToRemove]);
                }

                $parentCandidates[$name] = array_values($candidates);
                $directParents = $this->buildDirectParents($parentCandidates);
                $changed = true;
            }
        }

        if ($changed) {
            return $this->reduceBlockParentCandidates($parentCandidates);
        }

        return $parentCandidates;
    }

    /**
     * Builds a list of direct block parent candidates if only one match exists
     *
     * @param array $parentCandidates
     *
     * @return array
     */
    private function buildDirectParents(array $parentCandidates): array
    {
        $parents = [];
        foreach ($parentCandidates as $name => $candidates) {
            if (count($candidates) === 1) {
                $parents[$name] = $candidates[0];
            }
        }

        return $parents;
    }

    /**
     * Builds a block instance
     *
     * @param string $blockName
     * @param AbstractBlock|null $parent
     *
     * @return AbstractBlock
     */
    private function buildBlock(string $blockName, AbstractBlock $parent = null): AbstractBlock
    {
        $blockType = $this->map[$blockName];
        if (!isset($this->blockTypes[$blockType])) {
            throw new \InvalidArgumentException(sprintf('Invalid block type "%s"', $blockType));
        }

        $blockClass = $this->blockTypes[$blockType];

        return new $blockClass(
            $blockName,
            $this->map[$blockName],
            $this->data[$blockName],
            $parent
        );
    }

    /**
     * Builds a list of names for all block elements
     *
     * @return array
     */
    private function getBlockNames(): array
    {
        $blockNames = [];
        foreach ($this->map as $name => $type) {
            if ($this->isBlock($type)) {
                $blockNames[] = $name;
            }
        }

        return $blockNames;
    }

    /**
     * Get blocks sorted by deepest level first. If they are on the same level,
     * prefer those which have a number at the end (mitigates errors when
     * having blocks named something like "content" and "content1" simultaneously
     *
     * @param AbstractBlock[] $blocks
     *
     * @return AbstractBlock[]
     */
    private function getBlocksSortedByLevel(array $blocks): array
    {
        $compareByTrailingNumber = function (string $a, string $b): int {
            $numberPattern = '/(?<number>\d+)$/';

            $matchesA = (bool)preg_match($numberPattern, $a, $aMatches);
            $matchesB = (bool)preg_match($numberPattern, $b, $bMatches);

            if ($matchesA && !$matchesB) {
                return -1;
            }

            if (!$matchesA && $matchesB) {
                return 1;
            }

            if ($matchesA && $matchesB) {
                $aLen = strlen((string)$aMatches['number']);
                $bLen = strlen((string)$bMatches['number']);

                if ($aLen === $bLen) {
                    return 0;
                }

                return $aLen > $bLen ? -1 : 1;
            }

            return 0;
        };

        uasort($blocks, function (AbstractBlock $a, AbstractBlock $b) use ($compareByTrailingNumber) {
            if ($a->getLevel() === $b->getLevel()) {
                return $compareByTrailingNumber($a->getRealName(), $b->getRealName());
            }

            return $a->getLevel() < $b->getLevel() ? 1 : -1;
        });

        return $blocks;
    }

    private function isBlock(string $type): bool
    {
        return in_array($type, array_keys($this->blockTypes));
    }

    public static function buildNameMatchingPattern(string $identifier): string
    {
        return '/^(?<realName>.+)' . self::escapeRegexString($identifier) . '(?<indexes>[\d_]*)$/';
    }

    public static function escapeRegexString(string $string): string
    {
        $string = str_replace('.', '\\.', $string);
        $string = str_replace('-', '\\-', $string);

        return $string;
    }
}
