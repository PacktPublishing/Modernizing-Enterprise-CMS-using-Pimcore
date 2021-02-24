<?php 

namespace Pimcore\Model\DataObject\MyObject;

use Pimcore\Model\DataObject;

/**
 * @method DataObject\MyObject current()
 * @method DataObject\MyObject[] load()
 */

class Listing extends DataObject\Listing\Concrete {

protected $classId = "1";
protected $className = "MyObject";


/**
* Filter by Title (Title)
* @param string|int|float|float|array $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByTitle ($data, $operator = '=') {
	$this->getClass()->getFieldDefinition("Title")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Desctiption (Desctiption)
* @param string|int|float|float|array $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByDesctiption ($data, $operator = '=') {
	$this->getClass()->getFieldDefinition("Desctiption")->addListingFilter($this, $data, $operator);
	return $this;
}



}
