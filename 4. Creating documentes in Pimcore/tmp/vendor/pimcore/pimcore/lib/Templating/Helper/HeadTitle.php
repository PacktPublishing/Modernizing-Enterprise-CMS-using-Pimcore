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

/**
 * ----------------------------------------------------------------------------------
 * based on @author ZF1 Zend_View_Helper_HeadTitle
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

namespace Pimcore\Templating\Helper;

use Pimcore\Templating\Helper\Placeholder\AbstractHelper;
use Pimcore\Templating\Helper\Placeholder\Container;

/**
 * @deprecated
 */
class HeadTitle extends AbstractHelper
{
    /**
     * Registry key for placeholder
     *
     * @var string
     */
    protected $_regKey = 'HeadTitle';

    /**
     * Default title rendering order (i.e. order in which each title attached)
     *
     * @var string
     */
    protected $_defaultAttachOrder = null;

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return 'headTitle';
    }

    /**
     * @param string|null $title
     * @param string|null $setType
     *
     * @return $this
     */
    public function __invoke($title = null, $setType = null)
    {
        if (null === $setType) {
            $setType = (null === $this->getDefaultAttachOrder())
                ? Container::APPEND
                : $this->getDefaultAttachOrder();
        }

        $title = (string) $title;

        if ($title !== '') {
            if ($setType == Container::SET) {
                $this->set($title);
            } elseif ($setType == Container::PREPEND) {
                $this->prepend($title);
            } else {
                $this->append($title);
            }
        }

        return $this;
    }

    /**
     * Set a default order to add titles
     *
     * @param string $setType
     *
     * @return $this
     */
    public function setDefaultAttachOrder($setType)
    {
        if (!in_array($setType, [
            Container::APPEND,
            Container::SET,
            Container::PREPEND,
        ])) {
            throw new Exception("You must use a valid attach order: 'PREPEND', 'APPEND' or 'SET'");
        }

        $this->_defaultAttachOrder = $setType;

        return $this;
    }

    /**
     * Get the default attach order, if any.
     *
     * @return mixed
     */
    public function getDefaultAttachOrder()
    {
        return $this->_defaultAttachOrder;
    }

    /**
     * Turn helper into string
     *
     * @param  string|null $indent
     * @param  string|null $locale
     *
     * @return string
     */
    public function toString($indent = null, $locale = null)
    {
        $indent = (null !== $indent)
            ? $this->getWhitespace($indent)
            : $this->getIndent();

        $output = '';
        if (($prefix = $this->getPrefix())) {
            $output .= $prefix;
        }

        $output .= $this->getRawContent();

        if (($postfix = $this->getPostfix())) {
            $output .= $postfix;
        }

        $output = ($this->_autoEscape) ? $this->_escape($output) : $output;

        return $indent . '<title>' . $output . '</title>';
    }

    /**
     * Get container content without indentation, prefix or postfix
     *
     * @return string
     */
    public function getRawContent()
    {
        return implode(
            $this->getContainer()->getSeparator(),
            $this->getContainer()->getArrayCopy()
        );
    }
}
