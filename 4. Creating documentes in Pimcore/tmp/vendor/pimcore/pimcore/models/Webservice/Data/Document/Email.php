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
 * @package    Webservice
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Model\Webservice\Data\Document;

use Pimcore\Model;

/**
 * @deprecated
 */
class Email extends Model\Webservice\Data\Document\Snippet
{
    /**
     * Static type of the document
     *
     * @var string
     */
    public $type = 'email';

    /**
     * Contains the email subject
     *
     * @var string
     */
    public $subject = '';

    /**
     * Contains the from email address
     *
     * @var string
     */
    public $from = '';

    /**
     * Contains the email addresses of the recipients
     *
     * @var string
     */
    public $to = '';

    /**
     * Contains the carbon copy recipients
     *
     * @var string
     */
    public $cc = '';

    /**
     * Contains the blind carbon copy recipients
     *
     * @var string
     */
    public $bcc = '';
}
