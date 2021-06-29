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

namespace Pimcore\Event;

final class DocumentEvents
{
    /**
     * @Event("Pimcore\Event\Model\DocumentEvent")
     *
     * @var string
     */
    const PRE_ADD = 'pimcore.document.preAdd';

    /**
     * @Event("Pimcore\Event\Model\DocumentEvent")
     *
     * @var string
     */
    const POST_ADD = 'pimcore.document.postAdd';

    /**
     * Arguments:
     *  - exception | exception object
     *
     * @Event("Pimcore\Event\Model\DocumentEvent")
     *
     * @var string
     */
    const POST_ADD_FAILURE = 'pimcore.document.postAddFailure';

    /**
     * Arguments:
     *  - saveVersionOnly | is set if method saveVersion() was called instead of save()
     *
     * @Event("Pimcore\Event\Model\DocumentEvent")
     *
     * @var string
     */
    const PRE_UPDATE = 'pimcore.document.preUpdate';

    /**
     * Arguments:
     *  - saveVersionOnly | is set if method saveVersion() was called instead of save()
     *  - oldPath | the old full path in case the path has changed
     *
     * @Event("Pimcore\Event\Model\DocumentEvent")
     *
     * @var string
     */
    const POST_UPDATE = 'pimcore.document.postUpdate';

    /**
     * Arguments:
     *  - saveVersionOnly | is set if method saveVersion() was called instead of save()
     *  - exception | exception object
     *
     * @Event("Pimcore\Event\Model\DocumentEvent")
     *
     * @var string
     */
    const POST_UPDATE_FAILURE = 'pimcore.document.postUpdateFailure';

    /**
     * @Event("Pimcore\Event\Model\DocumentDeleteInfoEvent")
     *
     * @var string
     */
    const DELETE_INFO = 'pimcore.document.deleteInfo';

    /**
     * @Event("Pimcore\Event\Model\DocumentEvent")
     *
     * @var string
     */
    const PRE_DELETE = 'pimcore.document.preDelete';

    /**
     * @Event("Pimcore\Event\Model\DocumentEvent")
     *
     * @var string
     */
    const POST_DELETE = 'pimcore.document.postDelete';

    /**
     * Arguments:
     *  - exception | exception object
     *
     * @Event("Pimcore\Event\Model\DocumentEvent")
     *
     * @var string
     */
    const POST_DELETE_FAILURE = 'pimcore.document.postDeleteFailure';

    /**
     * Processor contains the processor object used to generate the PDF
     *
     * Arguments:
     *  - processor | instance of the PDF processor Pimcore\Web2Print\Processor\{ProcessorName}
     *
     * @Event("Pimcore\Event\Model\DocumentEvent")
     *
     * @var string
     */
    const PRINT_PRE_PDF_GENERATION = 'pimcore.document.print.prePdfGeneration';

    /**
     * Filename contains the filename of the generated pdf on filesystem, pdf contains generated pdf as string
     *
     * Arguments:
     *  - filename | contains the path of the generated pdf on filesystem
     *  - pdf | contains generated pdf as string
     *
     * @Event("Pimcore\Event\Model\DocumentEvent")
     *
     * @var string
     */
    const PRINT_POST_PDF_GENERATION = 'pimcore.document.print.postPdfGeneration';

    /**
     * Modify the processing options (displayed in the Pimcore admin interface)
     *
     * Arguments:
     *  - options | array for configuration settings
     *
     * @Event("Pimcore\Event\Model\PrintConfigEvent")
     *
     * @var string
     */
    const PRINT_MODIFY_PROCESSING_OPTIONS = 'pimcore.document.print.processor.modifyProcessingOptions';

    /**
     * Modify the configuration for the processor (when the pdf gets created)
     *
     * Arguments:
     * WkHtmlToPdfAdapter:
     *  - wkhtmltopdfBin | path to wkhtmltopdf binary
     *  - options | configuration options
     *  - srcUrl | path tho source html file
     *  - dstFile | path to the output pdf file
     *  - config | configuration which is passed from the pimcore admin interface
     *
     * PDFReactor:
     *  - config | configuration which is passed from the pimcore admin interface
     *  - reactorConfig | configuration which is passed to PDFReactor
     *  - document | Pimcore document that is converted
     *
     * @Event("Pimcore\Event\Model\PrintConfigEvent")
     *
     * @var string
     */
    const PRINT_MODIFY_PROCESSING_CONFIG = 'pimcore.document.print.processor.modifyConfig';

    /**
     * Arguments:
     *  - base_element | Pimcore\Model\Document | contains the base document used in copying process
     *
     * @Event("Pimcore\Event\Model\DocumentEvent")
     *
     * @var string
     */
    const POST_COPY = 'pimcore.document.postCopy';

    /**
     * The EDITABLE_NAME event is triggered when a document editable name is built.
     *
     * @Event("Pimcore\Event\Model\Document\EditableNameEvent")
     *
     */
    const EDITABLE_NAME = 'pimcore.document.editable.name';

    /**
     * The RENDERER_PRE_RENDER event is triggered before the DocumentRenderer renders a document
     *
     * @Event("Pimcore\Event\Model\DocumentEvent")
     *
     * @var string
     */
    const RENDERER_PRE_RENDER = 'pimcore.document.renderer.pre_render';

    /**
     * The RENDERER_POST_RENDER event is triggered after the DocumentRenderer rendered a document
     *
     * @Event("Pimcore\Event\Model\DocumentEvent")
     *
     * @var string
     */
    const RENDERER_POST_RENDER = 'pimcore.document.renderer.post_render';

    /**
     * Arguments:
     *  - mail | \Pimcore\Mail | the pimcore mail instance
     *  - document | \Pimcore\Model\Document\Newsletter | the newsletter document
     *  - sendingContainer | \Pimcore\Document\Newsletter | sending param container of newsletter helper
     *  - mailer | \Pimcore\Mail\Mailer|null | newsletter specific mailer if enabled in system settings
     *
     * @Event("Symfony\Component\EventDispatcher\GenericEvent")
     *
     * @var string
     */
    const NEWSLETTER_PRE_SEND = 'pimcore.document.newsletter.pre_send';

    /**
     * Arguments:
     *  - mail | \Pimcore\Mail | the pimcore mail instance
     *  - document | \Pimcore\Model\Document\Newsletter | the newsletter document
     *  - sendingContainer | \Pimcore\Document\Newsletter | sending param container of newsletter helper
     *  - mailer | \Pimcore\Mail\Mailer|null | newsletter specific swift mailer if enabled in system settings
     *
     * @Event("Symfony\Component\EventDispatcher\GenericEvent")
     *
     * @var string
     */
    const NEWSLETTER_POST_SEND = 'pimcore.document.newsletter.post_send';
}
