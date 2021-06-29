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

/**
 * ----------------------------------------------------------------------------------
 * based on @author ZF1 Zend_Navigation_Container
 * ----------------------------------------------------------------------------------
 */

/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 */

namespace Pimcore\Navigation;

class Container implements \RecursiveIterator, \Countable
{
    /**
     * Contains sub pages
     *
     * @var Page[]
     */
    protected $_pages = [];

    /**
     * An index that contains the order in which to iterate pages
     *
     * @var array
     */
    protected $_index = [];

    /**
     * Whether index is dirty and needs to be re-arranged
     *
     * @var bool
     */
    protected $_dirtyIndex = false;

    // Internal methods:

    /**
     * Sorts the page index according to page order
     *
     * @return void
     */
    protected function _sort()
    {
        if ($this->_dirtyIndex) {
            $newIndex = [];
            $index = 0;

            foreach ($this->_pages as $hash => $page) {
                $order = $page->getOrder();
                if ($order === null) {
                    $newIndex[$hash] = $index;
                    $index++;
                } else {
                    $newIndex[$hash] = $order;
                }
            }

            asort($newIndex);
            $this->_index = $newIndex;
            $this->_dirtyIndex = false;
        }
    }

    // Public methods:

    /**
     * Notifies container that the order of pages are updated
     *
     * @return void
     */
    public function notifyOrderUpdated()
    {
        $this->_dirtyIndex = true;
    }

    /**
     * Adds a page to the container
     *
     * This method will inject the container as the given page's parent by
     * calling {@link Page::setParent()}.
     *
     * @param  Page|array $page  page to add
     *
     * @return Container fluent interface, returns self
     *
     * @throws \Exception if page is invalid
     */
    public function addPage($page)
    {
        if ($page === $this) {
            throw new \Exception('A page cannot have itself as a parent');
        }

        if (is_array($page)) {
            $page = Page::factory($page);
        } elseif (!$page instanceof Page) {
            throw new \Exception('Invalid argument: $page must be an instance of \Pimcore\Navigation\Page or an array');
        }

        $hash = $page->hashCode();

        if (array_key_exists($hash, $this->_index)) {
            // page is already in container
            return $this;
        }

        // adds page to container and sets dirty flag
        $this->_pages[$hash] = $page;
        $this->_index[$hash] = $page->getOrder();
        $this->_dirtyIndex = true;

        // inject self as page parent
        $page->setParent($this);

        return $this;
    }

    /**
     * Adds several pages at once
     *
     * @param  Page[]|Container  $pages  pages to add
     *
     * @return Container fluent interface, returns self
     *
     * @throws \Exception if $pages is not array or Container
     */
    public function addPages($pages)
    {
        if ($pages instanceof self) {
            $pages = iterator_to_array($pages);
        }

        if (!is_array($pages)) {
            throw new \Exception('Invalid argument: $pages must be an array  or an instance of Container');
        }

        foreach ($pages as $page) {
            $this->addPage($page);
        }

        return $this;
    }

    /**
     * Sets pages this container should have, removing existing pages
     *
     * @param  Page[] $pages pages to set
     *
     * @return Container  fluent interface, returns self
     */
    public function setPages(array $pages)
    {
        $this->removePages();

        return $this->addPages($pages);
    }

    /**
     * Returns pages in the container
     *
     * @return Page[]
     */
    public function getPages()
    {
        return $this->_pages;
    }

    /**
     * Removes the given page from the container
     *
     * @param  Page|int $page page to remove, either a page instance or a specific page order
     * @param  bool $recursive [optional] whether to remove recursively
     *
     * @return bool whether the removal was successful
     */
    public function removePage($page, $recursive = false)
    {
        if ($page instanceof Page) {
            $hash = $page->hashCode();
        } elseif (is_int($page)) {
            $this->_sort();
            if (!$hash = array_search($page, $this->_index)) {
                return false;
            }
        } else {
            return false;
        }

        if (isset($this->_pages[$hash])) {
            unset($this->_pages[$hash]);
            unset($this->_index[$hash]);
            $this->_dirtyIndex = true;

            return true;
        }

        if ($recursive) {
            foreach ($this->_pages as $childPage) {
                if ($childPage->hasPage($page, true)) {
                    $childPage->removePage($page, true);

                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Removes all pages in container
     *
     * @return Container  fluent interface, returns self
     */
    public function removePages()
    {
        $this->_pages = [];
        $this->_index = [];

        return $this;
    }

    /**
     * Checks if the container has the given page
     *
     * @param  Page $page  page to look for
     * @param  bool $recursive  [optional] whether to search recursively. Default is false.
     *
     * @return bool whether page is in container
     */
    public function hasPage(Page $page, $recursive = false)
    {
        if (array_key_exists($page->hashCode(), $this->_index)) {
            return true;
        } elseif ($recursive) {
            foreach ($this->_pages as $childPage) {
                if ($childPage->hasPage($page, true)) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Returns true if container contains any pages
     *
     * @return bool  whether container has any pages
     */
    public function hasPages()
    {
        return count($this->_index) > 0;
    }

    /**
     * Returns true if container contains any visible page
     *
     * @return bool whether container has any visible page
     */
    public function hasVisiblePages()
    {
        if ($this->hasPages()) {
            foreach ($this->getPages() as $page) {
                if ($page->isVisible()) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Returns a child page matching $property == $value or
     * preg_match($value, $property), or null if not found
     *
     * @param  string  $property          name of property to match against
     * @param  mixed   $value             value to match property against
     * @param  bool    $useRegex          [optional] if true PHP's preg_match
     *                                    is used. Default is false.
     *
     * @return Page|null  matching page or null
     */
    public function findOneBy($property, $value, $useRegex = false)
    {
        $iterator = new \RecursiveIteratorIterator($this, \RecursiveIteratorIterator::SELF_FIRST);

        foreach ($iterator as $page) {
            $pageProperty = $page->get($property);

            // Rel and rev
            if (is_array($pageProperty)) {
                foreach ($pageProperty as $item) {
                    if (is_array($item)) {
                        // Use regex?
                        if (true === $useRegex) {
                            foreach ($item as $item2) {
                                if (0 !== preg_match($value, $item2)) {
                                    return $page;
                                }
                            }
                        } else {
                            if (in_array($value, $item)) {
                                return $page;
                            }
                        }
                    } else {
                        // Use regex?
                        if (true === $useRegex) {
                            if (0 !== preg_match($value, $item)) {
                                return $page;
                            }
                        } else {
                            if ($item == $value) {
                                return $page;
                            }
                        }
                    }
                }

                continue;
            }

            // Use regex?
            if (true === $useRegex) {
                if (preg_match($value, $pageProperty)) {
                    return $page;
                }
            } else {
                if ($pageProperty == $value) {
                    return $page;
                }
            }
        }

        return null;
    }

    /**
     * Returns all child pages matching $property == $value or
     * preg_match($value, $property), or an empty array if no pages are found
     *
     * @param  string $property  name of property to match against
     * @param  mixed  $value     value to match property against
     * @param  bool   $useRegex  [optional] if true PHP's preg_match is used.
     *                           Default is false.
     *
     * @return Page[] array containing only Page instances
     */
    public function findAllBy($property, $value, $useRegex = false)
    {
        $found = [];

        $iterator = new \RecursiveIteratorIterator($this, \RecursiveIteratorIterator::SELF_FIRST);

        foreach ($iterator as $page) {
            $pageProperty = $page->get($property);

            // Rel and rev
            if (is_array($pageProperty)) {
                foreach ($pageProperty as $item) {
                    if (is_array($item)) {
                        // Use regex?
                        if (true === $useRegex) {
                            foreach ($item as $item2) {
                                if (0 !== preg_match($value, $item2)) {
                                    $found[] = $page;
                                }
                            }
                        } else {
                            if (in_array($value, $item)) {
                                $found[] = $page;
                            }
                        }
                    } else {
                        // Use regex?
                        if (true === $useRegex) {
                            if (0 !== preg_match($value, $item)) {
                                $found[] = $page;
                            }
                        } else {
                            if ($item == $value) {
                                $found[] = $page;
                            }
                        }
                    }
                }

                continue;
            }

            // Use regex?
            if (true === $useRegex) {
                if (0 !== preg_match($value, $pageProperty)) {
                    $found[] = $page;
                }
            } else {
                if ($pageProperty == $value) {
                    $found[] = $page;
                }
            }
        }

        return $found;
    }

    /**
     * Returns page(s) matching $property == $value or
     * preg_match($value, $property)
     *
     * @param  string $property  name of property to match against
     * @param  mixed  $value     value to match property against
     * @param  bool   $all       [optional] whether an array of all matching
     *                           pages should be returned, or only the first.
     *                           If true, an array will be returned, even if not
     *                           matching pages are found. If false, null will
     *                           be returned if no matching page is found.
     *                           Default is false.
     * @param  bool   $useRegex  [optional] if true PHP's preg_match is used.
     *                           Default is false.
     *
     * @return Page|array<Page>|null  matching page or null
     */
    public function findBy($property, $value, $all = false, $useRegex = false)
    {
        if ($all) {
            return $this->findAllBy($property, $value, $useRegex);
        }

        return $this->findOneBy($property, $value, $useRegex);
    }

    /**
     * Magic overload: Proxy calls to finder methods
     *
     * Examples of finder calls:
     * <code>
     * // METHOD                         // SAME AS
     * $nav->findByLabel('foo');         // $nav->findOneBy('label', 'foo');
     * $nav->findByLabel('/foo/', true); // $nav->findBy('label', '/foo/', true);
     * $nav->findOneByLabel('foo');      // $nav->findOneBy('label', 'foo');
     * $nav->findAllByClass('foo');      // $nav->findAllBy('class', 'foo');
     * </code>
     *
     * @param  string $method                       method name
     * @param  array  $arguments                    method arguments
     *
     * @return mixed  Pimcore\Navigation|array|null    matching page, array of pages
     *                                              or null
     *
     * @throws \Exception            if method does not exist
     */
    public function __call($method, $arguments)
    {
        if (@preg_match('/(find(?:One|All)?By)(.+)/', $method, $match)) {
            return $this->{$match[1]}($match[2], $arguments[0], !empty($arguments[1]));
        }

        throw new \Exception(sprintf('Bad method call: Unknown method %s::%s', get_class($this), $method));
    }

    /**
     * Returns an array representation of all pages in container
     *
     * @return array
     */
    public function toArray(): array
    {
        $pages = [];

        $this->_dirtyIndex = true;
        $this->_sort();
        $indexes = array_keys($this->_index);
        foreach ($indexes as $hash) {
            $pages[] = $this->_pages[$hash]->toArray();
        }

        return $pages;
    }

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        $this->_sort();
        $hash = key($this->_index);

        if (isset($this->_pages[$hash])) {
            return $this->_pages[$hash];
        }

        throw new \Exception('Corruption detected in container; invalid key found in internal iterator');
    }

    /**
     * {@inheritdoc}
     */
    public function key()
    {
        $this->_sort();

        return key($this->_index);
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        $this->_sort();
        next($this->_index);
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        $this->_sort();
        reset($this->_index);
    }

    /**
     * {@inheritdoc}
     */
    public function valid()
    {
        $this->_sort();

        return current($this->_index) !== false;
    }

    /**
     * {@inheritdoc}
     */
    public function hasChildren()
    {
        return $this->hasPages();
    }

    /**
     * @return Page|\RecursiveIterator|null
     */
    public function getChildren()
    {
        $hash = key($this->_index);

        if (isset($this->_pages[$hash])) {
            return $this->_pages[$hash];
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return count($this->_index);
    }
}
