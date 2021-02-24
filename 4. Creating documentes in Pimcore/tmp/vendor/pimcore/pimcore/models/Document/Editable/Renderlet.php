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

use Pimcore\Document\Editable\EditableHandlerInterface;
use Pimcore\Logger;
use Pimcore\Model;
use Pimcore\Model\Asset;
use Pimcore\Model\DataObject;
use Pimcore\Model\Document;
use Pimcore\Model\Element;
use Pimcore\Targeting\Document\DocumentTargetingConfigurator;
use Pimcore\Tool;

/**
 * @method \Pimcore\Model\Document\Editable\Dao getDao()
 */
class Renderlet extends Model\Document\Editable
{
    /**
     * Contains the ID of the linked object
     *
     * @var int|null
     */
    public $id;

    /**
     * Contains the object
     *
     * @var Document|Asset|DataObject|null
     */
    public $o;

    /**
     * Contains the type
     *
     * @var string|null
     */
    public $type;

    /**
     * Contains the subtype
     *
     * @var string|null
     */
    public $subtype;

    /**
     * @see EditableInterface::getType
     *
     * @return string
     */
    public function getType()
    {
        return 'renderlet';
    }

    /**
     * @see EditableInterface::getData
     *
     * @return mixed
     */
    public function getData()
    {
        return [
            'id' => $this->id,
            'type' => $this->getObjectType(),
            'subtype' => $this->subtype,
        ];
    }

    /**
     * Converts the data so it's suitable for the editmode
     *
     * @return mixed
     */
    public function getDataEditmode()
    {
        if ($this->o instanceof Element\ElementInterface) {
            return [
                'id' => $this->id,
                'type' => $this->getObjectType(),
                'subtype' => $this->subtype,
            ];
        }

        return null;
    }

    /**
     * @see EditableInterface::frontend
     *
     * @return string
     */
    public function frontend()
    {
        // TODO inject services via DI when tags are built through container
        $container = \Pimcore::getContainer();
        $editableHandler = $container->get(EditableHandlerInterface::class);

        if (!$editableHandler->supports($this->view)) {
            return '';
        }

        if (!$this->config['controller'] && !$this->config['action']) {
            if (is_null($this->config)) {
                $this->config = [];
            }
            $this->config += Tool::getRoutingDefaults();
        }

        if (method_exists($this->o, 'isPublished')) {
            if (!$this->o->isPublished()) {
                return '';
            }
        }

        if ($this->o instanceof Element\ElementInterface) {
            // apply best matching target group (if any)
            if ($this->o instanceof Document\Targeting\TargetingDocumentInterface) {
                $targetingConfigurator = $container->get(DocumentTargetingConfigurator::class);
                $targetingConfigurator->configureTargetGroup($this->o);
            }

            $blockparams = ['action', 'controller', 'module', 'bundle', 'template'];

            $params = [
                'template' => isset($this->config['template']) ? $this->config['template'] : null,
                'id' => $this->id,
                'type' => $this->type,
                'subtype' => $this->subtype,
                'pimcore_request_source' => 'renderlet',
            ];

            foreach ($this->config as $key => $value) {
                if (!array_key_exists($key, $params) && !in_array($key, $blockparams)) {
                    $params[$key] = $value;
                }
            }

            $moduleOrBundle = null;

            if (isset($this->config['bundle'])) {
                $moduleOrBundle = $this->config['bundle'];
            } elseif (isset($this->config['module'])) {
                $moduleOrBundle = $this->config['module'];
            }

            return $editableHandler->renderAction(
                $this->view,
                $this->config['controller'],
                $this->config['action'],
                $moduleOrBundle,
                $params
            );
        }

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
        $data = \Pimcore\Tool\Serialize::unserialize($data);

        $this->id = $data['id'];
        $this->type = $data['type'];
        $this->subtype = $data['subtype'];

        $this->setElement();

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
        if (is_array($data) && isset($data['id'])) {
            $this->id = $data['id'];
            $this->type = $data['type'];
            $this->subtype = $data['subtype'];

            $this->setElement();
        }

        return $this;
    }

    /**
     * Sets the element by the data stored for the object
     *
     * @return $this
     */
    public function setElement()
    {
        $this->o = Element\Service::getElementById($this->type, $this->id);

        return $this;
    }

    /**
     * @return array
     */
    public function resolveDependencies()
    {
        $this->load();

        $dependencies = [];

        if ($this->o instanceof Element\ElementInterface) {
            $elementType = Element\Service::getElementType($this->o);
            $key = $elementType . '_' . $this->o->getId();

            $dependencies[$key] = [
                'id' => $this->o->getId(),
                'type' => $elementType,
            ];
        }

        return $dependencies;
    }

    /**
     * get correct type of object as string
     *
     * @param Element\ElementInterface|null $object
     *
     * @return string|null
     *
     * @internal param mixed $data
     */
    public function getObjectType($object = null)
    {
        $this->load();

        if (!$object) {
            $object = $this->o;
        }
        if ($object instanceof Element\ElementInterface) {
            return Element\Service::getType($object);
        }

        return null;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        $this->load();

        if ($this->o instanceof Element\ElementInterface) {
            return false;
        }

        return true;
    }

    /**
     * @param Model\Webservice\Data\Document\Element $wsElement
     * @param Model\Document\PageSnippet $document
     * @param array $params
     * @param Model\Webservice\IdMapperInterface|null $idMapper
     *
     * @throws \Exception
     */
    public function getFromWebserviceImport($wsElement, $document = null, $params = [], $idMapper = null)
    {
        $data = $this->sanitizeWebserviceData($wsElement->value);
        if ($data->id !== null) {
            $this->type = $data->type;
            $this->subtype = $data->subtype;
            if (is_numeric($data->id)) {
                $id = $data->id;
                if ($idMapper) {
                    $id = $idMapper->getMappedId($data->type, $data->id);
                }
                $this->id = $id;

                if ($this->type == 'asset') {
                    $this->o = Asset::getById($id);
                    if (!$this->o instanceof Asset) {
                        if ($idMapper && $idMapper->ignoreMappingFailures()) {
                            $idMapper->recordMappingFailure('document', $this->getDocumentId(), $this->type, $this->id);
                        } else {
                            throw new \Exception('cannot get values from web service import - referenced asset with id [ '.$this->id.' ] is unknown');
                        }
                    }
                } elseif ($this->type == 'document') {
                    $this->o = Document::getById($id);
                    if (!$this->o instanceof Document) {
                        if ($idMapper && $idMapper->ignoreMappingFailures()) {
                            $idMapper->recordMappingFailure('document', $this->getDocumentId(), $this->type, $this->id);
                        } else {
                            throw new \Exception('cannot get values from web service import - referenced document with id [ '.$this->id.' ] is unknown');
                        }
                    }
                } elseif ($this->type == 'object') {
                    $this->o = DataObject::getById($id);
                    if (!$this->o instanceof DataObject\AbstractObject) {
                        if ($idMapper && $idMapper->ignoreMappingFailures()) {
                            $idMapper->recordMappingFailure('document', $this->getDocumentId(), $this->type, $this->id);
                        } else {
                            throw new \Exception('cannot get values from web service import - referenced object with id [ '.$this->id.' ] is unknown');
                        }
                    }
                } else {
                    throw new \Exception('cannot get values from web service import - type is not valid');
                }
            } else {
                throw new \Exception('cannot get values from web service import - id is not valid');
            }
        }
    }

    /**
     * @return bool
     */
    public function checkValidity()
    {
        $sane = true;
        if ($this->id) {
            $el = Element\Service::getElementById($this->type, $this->id);
            if (!$el instanceof Element\ElementInterface) {
                $sane = false;
                Logger::notice('Detected insane relation, removing reference to non existent '.$this->type.' with id ['.$this->id.']');
                $this->id = null;
                $this->type = null;
                $this->o = null;
                $this->subtype = null;
            }
        }

        return $sane;
    }

    /**
     * @return array
     */
    public function __sleep()
    {
        $finalVars = [];
        $parentVars = parent::__sleep();
        $blockedVars = ['o'];
        foreach ($parentVars as $key) {
            if (!in_array($key, $blockedVars)) {
                $finalVars[] = $key;
            }
        }

        return $finalVars;
    }

    /**
     * this method is called by Document\Service::loadAllDocumentFields() to load all lazy loading fields
     */
    public function load()
    {
        if (!$this->o) {
            $this->setElement();
        }
    }

    /**
     * @param int $id
     *
     * @return Document\Editable\Renderlet
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return (int) $this->id;
    }

    /**
     * @param Asset|Document|Object $o
     *
     * @return Document\Editable\Renderlet
     */
    public function setO($o)
    {
        $this->o = $o;

        return $this;
    }

    /**
     * @return Asset|Document|Object|null
     */
    public function getO()
    {
        return $this->o;
    }

    /**
     * @param string $subtype
     *
     * @return Document\Editable\Renderlet
     */
    public function setSubtype($subtype)
    {
        $this->subtype = $subtype;

        return $this;
    }

    /**
     * @return string
     */
    public function getSubtype()
    {
        return $this->subtype;
    }

    /**
     * Rewrites id from source to target, $idMapping contains
     * array(
     *  "document" => array(
     *      SOURCE_ID => TARGET_ID,
     *      SOURCE_ID => TARGET_ID
     *  ),
     *  "object" => array(...),
     *  "asset" => array(...)
     * )
     *
     * @param array $idMapping
     */
    public function rewriteIds($idMapping)
    {
        $type = (string) $this->type;
        if ($type && array_key_exists($this->type, $idMapping) and array_key_exists($this->getId(), $idMapping[$this->type])) {
            $this->setId($idMapping[$this->type][$this->getId()]);
            $this->setO(null);
        }
    }
}

class_alias(Renderlet::class, 'Pimcore\Model\Document\Tag\Renderlet');
