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
 * based on @author ZF1 Zend_View_Helper_Placeholder_Container_Abstract
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
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */

namespace Pimcore\Twig\Extension\Templating\Placeholder;

class Container extends \ArrayObject
{
    /**
     * Whether or not to override all contents of placeholder
     *
     * @const string
     */
    const SET = 'SET';

    /**
     * Whether or not to append contents to placeholder
     *
     * @const string
     */
    const APPEND = 'APPEND';

    /**
     * Whether or not to prepend contents to placeholder
     *
     * @const string
     */
    const PREPEND = 'PREPEND';

    /**
     * What text to prefix the placeholder with when rendering
     *
     * @var string
     */
    protected $_prefix = '';

    /**
     * What text to append the placeholder with when rendering
     *
     * @var string
     */
    protected $_postfix = '';

    /**
     * What string to use between individual items in the placeholder when rendering
     *
     * @var string
     */
    protected $_separator = '';

    /**
     * What string to use as the indentation of output, this will typically be spaces. Eg: '    '
     *
     * @var string
     */
    protected $_indent = '';

    /**
     * Whether or not we're already capturing for this given container
     *
     * @var bool
     */
    protected $_captureLock = false;

    /**
     * What type of capture (overwrite (set), append, prepend) to use
     *
     * @var string
     */
    protected $_captureType;

    /**
     * Key to which to capture content
     *
     * @var string
     */
    protected $_captureKey;

    /**
     * Set a single value
     *
     * @param  mixed $value
     *
     * @return void
     */
    public function set($value)
    {
        $this->exchangeArray([$value]);
    }

    /**
     * Prepend a value to the top of the container
     *
     * @param  mixed $value
     *
     * @return void
     */
    public function prepend($value)
    {
        $values = $this->getArrayCopy();
        array_unshift($values, $value);
        $this->exchangeArray($values);
    }

    /**
     * Retrieve container value
     *
     * If single element registered, returns that element; otherwise,
     * serializes to array.
     *
     * @return mixed
     */
    public function getValue()
    {
        if (1 == count($this)) {
            $keys = $this->getKeys();
            $key = array_shift($keys);

            return $this[$key];
        }

        return $this->getArrayCopy();
    }

    /**
     * Set prefix for __toString() serialization
     *
     * @param  string $prefix
     *
     * @return Container
     */
    public function setPrefix($prefix)
    {
        $this->_prefix = (string) $prefix;

        return $this;
    }

    /**
     * Retrieve prefix
     *
     * @return string
     */
    public function getPrefix()
    {
        return $this->_prefix;
    }

    /**
     * Set postfix for __toString() serialization
     *
     * @param  string $postfix
     *
     * @return Container
     */
    public function setPostfix($postfix)
    {
        $this->_postfix = (string) $postfix;

        return $this;
    }

    /**
     * Retrieve postfix
     *
     * @return string
     */
    public function getPostfix()
    {
        return $this->_postfix;
    }

    /**
     * Set separator for __toString() serialization
     *
     * Used to implode elements in container
     *
     * @param  string $separator
     *
     * @return Container
     */
    public function setSeparator($separator)
    {
        $this->_separator = (string) $separator;

        return $this;
    }

    /**
     * Retrieve separator
     *
     * @return string
     */
    public function getSeparator()
    {
        return $this->_separator;
    }

    /**
     * Set the indentation string for __toString() serialization,
     * optionally, if a number is passed, it will be the number of spaces
     *
     * @param  string|int $indent
     *
     * @return Container
     */
    public function setIndent($indent)
    {
        $this->_indent = $this->getWhitespace($indent);

        return $this;
    }

    /**
     * Retrieve indentation
     *
     * @return string
     */
    public function getIndent()
    {
        return $this->_indent;
    }

    /**
     * Retrieve whitespace representation of $indent
     *
     * @param  int|string $indent
     *
     * @return string
     */
    public function getWhitespace($indent)
    {
        if (is_int($indent)) {
            $indent = str_repeat(' ', $indent);
        }

        return (string) $indent;
    }

    /**
     * Start capturing content to push into placeholder
     *
     * @param int|string $type How to capture content into placeholder; append, prepend, or set
     * @param mixed $key
     *
     * @throws Exception
     *
     * @return void
     */
    public function captureStart($type = self::APPEND, $key = null)
    {
        if ($this->_captureLock) {
            throw new Exception('Cannot nest placeholder captures for the same placeholder');
        }

        $this->_captureLock = true;
        $this->_captureType = $type;
        if ((null !== $key) && is_scalar($key)) {
            $this->_captureKey = (string) $key;
        }
        ob_start();
    }

    /**
     * End content capture
     *
     * @return void
     */
    public function captureEnd()
    {
        $data = ob_get_clean();
        $key = null;
        $this->_captureLock = false;
        if (null !== $this->_captureKey) {
            $key = $this->_captureKey;
        }
        switch ($this->_captureType) {
            case self::SET:
                if (null !== $key) {
                    $this[$key] = $data;
                } else {
                    $this->exchangeArray([$data]);
                }

                break;
            case self::PREPEND:
                if (null !== $key) {
                    $array = [$key => $data];
                    $values = $this->getArrayCopy();
                    $final = $array + $values;
                    $this->exchangeArray($final);
                } else {
                    $this->prepend($data);
                }

                break;
            case self::APPEND:
            default:
                if (null !== $key) {
                    if (empty($this[$key])) {
                        $this[$key] = $data;
                    } else {
                        $this[$key] .= $data;
                    }
                } else {
                    $this[$this->nextIndex()] = $data;
                }

                break;
        }
    }

    /**
     * Get keys
     *
     * @return array
     */
    public function getKeys()
    {
        $array = $this->getArrayCopy();

        return array_keys($array);
    }

    /**
     * Next Index
     *
     * as defined by the PHP manual
     *
     * @return int
     */
    public function nextIndex()
    {
        $keys = $this->getKeys();
        if (0 == count($keys)) {
            return 0;
        }

        return $nextIndex = max($keys) + 1;
    }

    /**
     * Render the placeholder
     *
     * @param int|string|null $indent
     *
     * @return string
     */
    public function toString($indent = null)
    {
        // Check items
        if (0 === $this->count()) {
            return '';
        }

        $indent = ($indent !== null)
            ? $this->getWhitespace($indent)
            : $this->getIndent();

        $items = $this->getArrayCopy();
        $return = $indent
            . $this->getPrefix()
            . implode($this->getSeparator(), $items)
            . $this->getPostfix();
        $return = preg_replace("/(\r\n?|\n)/", '$1' . $indent, $return);

        return $return;
    }

    /**
     * Serialize object to string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toString();
    }
}
