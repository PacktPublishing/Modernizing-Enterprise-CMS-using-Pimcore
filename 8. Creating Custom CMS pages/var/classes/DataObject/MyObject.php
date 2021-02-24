<?php 

/** 
* Inheritance: no
* Variants: no


Fields Summary: 
- Title [input]
- Desctiption [wysiwyg]
*/ 

namespace Pimcore\Model\DataObject;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

/**
* @method static \Pimcore\Model\DataObject\MyObject\Listing|\Pimcore\Model\DataObject\MyObject getByTitle ($value, $limit = 0, $offset = 0) 
* @method static \Pimcore\Model\DataObject\MyObject\Listing|\Pimcore\Model\DataObject\MyObject getByDesctiption ($value, $limit = 0, $offset = 0) 
*/

class MyObject extends Concrete {

protected $o_classId = "1";
protected $o_className = "MyObject";
protected $Title;
protected $Desctiption;


/**
* @param array $values
* @return \Pimcore\Model\DataObject\MyObject
*/
public static function create($values = array()) {
	$object = new static();
	$object->setValues($values);
	return $object;
}

/**
* Get Title - Title
* @return string|null
*/
public function getTitle () {
	if($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) { 
		$preValue = $this->preGetValue("Title"); 
		if($preValue !== null) { 
			return $preValue;
		}
	} 

	$data = $this->Title;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		    return $data->getPlain();
	}

	return $data;
}

/**
* Set Title - Title
* @param string|null $Title
* @return \Pimcore\Model\DataObject\MyObject
*/
public function setTitle ($Title) {
	$fd = $this->getClass()->getFieldDefinition("Title");
	$this->Title = $Title;
	return $this;
}

/**
* Get Desctiption - Desctiption
* @return string|null
*/
public function getDesctiption () {
	if($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) { 
		$preValue = $this->preGetValue("Desctiption"); 
		if($preValue !== null) { 
			return $preValue;
		}
	} 

	$data = $this->getClass()->getFieldDefinition("Desctiption")->preGetData($this);

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		    return $data->getPlain();
	}

	return $data;
}

/**
* Set Desctiption - Desctiption
* @param string|null $Desctiption
* @return \Pimcore\Model\DataObject\MyObject
*/
public function setDesctiption ($Desctiption) {
	$fd = $this->getClass()->getFieldDefinition("Desctiption");
	$this->Desctiption = $Desctiption;
	return $this;
}

}

