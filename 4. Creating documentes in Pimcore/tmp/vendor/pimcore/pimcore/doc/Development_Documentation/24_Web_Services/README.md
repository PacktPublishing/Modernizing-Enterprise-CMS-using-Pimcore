# REST Webservice API (deprecated)

> **Important**  
> The REST API is deprecated as of Pimcore 6.4 ([see why](https://github.com/pimcore/pimcore/pull/5517)) and will be removed in Pimcore 7. 
> If you're using this API, please consider migrating to the [Pimcore Datahub](https://github.com/pimcore/data-hub)

Pimcore provides a REST web service interface to many entities of the system, such as assets, documents, objects, class definitions, translations, etc. 
The webservices are not enabled by default, you have to do this in *Settings* > *System Settings* > *Web Service API*.

Once the web service API is enabled, there is an API key displayed in *Settings* > *Users* for each user. 
Please be aware that the API Key changes when the user changes his/her password.

The webservices also support session authentication, this means that it's not necessary to 
add the `X-API-Key` HTTP header or the `apikey` parameter to the request if you have a valid user session from the admin interface (eg. when testing in the browser). 

> **Important: API Key**  
> The recommended way of passing API Key for webservice is through HTTP header `X-API-Key` however you can still use query parameter method mentioned in the examples (which is logged as INFO level information in `var/logs`). [please see #4240](https://github.com/pimcore/pimcore/issues/4240)
    
  
> **Important: Import/export topics**  
> The webservice API is not always the preferred way for importing/syncing data out of or into Pimcore. Often it's much more efficient to use the PHP API in custom scripts (CLI) or in a custom service endpoint. 
> Please have a look at the following topics before your're seriously considering using the REST API: [External System Interaction](../05_Objects/05_External_System_Interaction.md), [Console CLI](../19_Development_Tools_and_Details/11_Console_CLI.md), [Working with the PHP API](../05_Objects/03_Working_with_PHP_API.md).
  
  
> **Important: Frontend Applications**  
> The Pimcore REST API is not intended to be used as a data provider for frontend applications (Vue.js, React, Angular, ...), 
> please use the [Pimcore Datahub](https://github.com/pimcore/data-hub) (GraphQL interface) or build your own actions for that purpose or use any existing bundles. 
  
[TOC]


## Permissions

Unrestricted access is only granted to admin users. For all other users the following restrictions are enforced:

* Classes permission for the following calls:
    * Classes list
    * Object bricks list
    * Field Collections list
    * Class Definition
    * Object Brick Definition
    * Field collection Definition
    * Key Value Definition
    * Object metadata
* Asset permission:
    * Asset List
    * Asset Count
    * Tags for Element (element of type Asset)
    * Elements for Tag (element of type Asset)
* Document permission
    * Document List
    * Document Count
    * Tags for Element (element of type Document)
    * Elements for Tag (element of type Document)
* Object permission
    * Object List
    * Object Count
    * Tags for Element (element of type Object)
    * Elements for Tag (element of type Object)
* Tags search permission
    * Tag List
    * Tags for Element
    * Elements for Tag
* System Settings Permission
    * Get Server Info
* Workspace View permission
    * Get Asset|Document|Object
* Workspace Delete permission
    * Delete Asset|Document|Object
* Workspace Create permission
    * Create Asset|Document|Object
* Workspace Save permission
    * Publish Asset|Document|Object  
    
## Available Calls
The following methods are available for web service calls:

### Get Object By ID
* **Method**: GET
* **URL**: `http://YOUR-DOMAIN/webservice/rest/object/id/1281?apikey=[API-KEY]&inheritance=0`\
Optional parameter `inheritance` decides whether to enable inheritance or not (disabled by default). See
 

* **Returns**: JSON-encoded object data.

### Delete Object By ID
* **Method**: DELETE
* **URL**: `http://YOUR-DOMAIN/webservice/rest/object/id/1281?apikey=[API-KEY]`
* **Returns**: JSON-encoded success value

### Create a new Object
* **Method**: PUT or POST
* **URL**: `http://YOUR-DOMAIN/webservice/rest/object?apikey=[API-KEY]`
* **Request body**: JSON-encoded object data in the same format as returned by get object by id for the data segment but 
with missing id field. Check the example below for the correct structure.
* **Returns**: JSON-encoded object id

**Example:**
```json
{
	"className": "Product",
	"parentId": <SOME_PARENT_ID>,     
	"key": "Grey t-shirt",
	"elements": [       
	    {         
	        "type": "input",         
	        "value": "Grey T-Shirt",         
	        "name": "name",         
	        "language": null
        },{
             "type": "multiselect",         
             "value": "grey",
             "name": "color",
             "language": null
        }     
    ],
	"notes": [
        {
            "type": "warning",
            "title": "API test",
            "description": "<b>Testing the api</b>",
            "data": []
        }
    ]
}
```

### Update existing Object
* **Method**: PUT or POST
* **URL**: `http://YOUR-DOMAIN/webservice/rest/object?apikey=[API-KEY]`
* **Request body**: JSON-encoded object data in the same format as returned by get object by id for the data segment but 
  with missing id field. Check the example below for the correct structure.
* **Returns**: JSON-encoded success value

**Example:**
```json
{
	"className": "Product",
	"parentId": <SOME_PARENT_ID>, 
	"id": 8812,    
	"key": "Grey t-shirt",
	"elements": [       
	    {         
	        "type": "input",         
	        "value": "Grey T-Shirt",         
	        "name": "name",         
	        "language": null
        },{
             "type": "multiselect",         
             "value": "grey",
             "name": "color",
             "language": null
        }     
    ],
	"notes": [
        {
            "type": "warning",
            "title": "API test",
            "description": "<b>Testing the api</b>",
            "data": []
        }
    ]
}
```

### Check Object exists
* **Method**: GET or POST
* **URL for GET**: `http://YOUR-DOMAIN/webservice/rest/object-inquire?apikey=[API-KEY]&ids=4500,4501,2,9999&condense=0`
    * **ids Parameter for GET**: comma-seperated list of object ids
* **URL for POST**: `http://YOUR-DOMAIN/webservice/rest/object-inquire?apikey=API-KEY&condense=0`
    * **Request body for POST**: comma-seperated list of object ids
* **Returns**: JSON-encoded success value and list of object ids and flag indicating whether object exists or not. If optional 
condense parameter is set to true then only non-existing object ids are returned.

**Example:**
```json
{
  "success": true,
  "data": {
    "4500": 1,
    "4501": 1,
    "2": 1,
    "9999": 0
  }
}
```


### Get Object Metadata
* **Method**: GET
* **URL**: `http://YOUR-DOMAIN/webservice/rest/object-meta/id/1281?apikey=[API-KEY]`

### Get List of Classes
* **Method**: GET
* **URL**: `http://YOUR-DOMAIN/webservice/rest/classes?apikey=[API-KEY]`
* **Returns**: The JSON-encoded list of classes

### Get Class By ID
* **Method**: GET
* **URL**: `http://YOUR-DOMAIN/webservice/rest/class/id/1281?apikey=[API-KEY]`
* **Returns**: The JSON-encoded class definition for the given class

### Get List of Field Collections
* **Method**: GET
* **URL**: `http://YOUR-DOMAIN/webservice/rest/field-collections?apikey=[API-KEY]`
* **Returns**: The JSON-encoded list of field collection configurations

### Get Field Collection Definition By Key
* **Method**: GET
* **URL**: `http://YOUR-DOMAIN/webservice/rest/field-collection/id/collectionA?apikey=[API-KEY]`
* **Returns**: The JSON-encoded field collection definition for the collection with the given key

### Get List of Field Object Bricks
* **Method**: GET
* **URL**: `http://YOUR-DOMAIN/webservice/rest/object-bricks?apikey=[API-KEY]`
* **Returns**: The JSON-encoded list of object brick configurations

### Get Object Brick Definition By Key
* **Method**: GET
* **URL**: `http://YOUR-DOMAIN/webservice/rest/object-brick/id/tirebrick?apikey=[API-KEY]`
* **Returns**: The JSON-encoded object brick definition for the object brick with the given key

### Get List of Image Thumbnail Configurations
* **Method**: GET
* **URL**: `http://YOUR-DOMAIN/webservice/rest/image-thumbnails?apikey=[API-KEY]`
* **Returns**: The JSON-encoded list of image thumbnail configurations

### Get Image Thumbnail Configuration By Key
* **Method**: GET
* **URL**: `http://YOUR-DOMAIN/webservice/rest/image-thumbnail/id/product_small?apikey=[API-KEY]`
* **Returns**: The JSON-encoded image thumbnail configuration with the given key

### Get Asset By ID
* **Method**: GET
* **URL**: `http://YOUR-DOMAIN/webservice/rest/asset/id/1281?apikey=[API-KEY]`
* **Optional Parameter**: light if set to true, the response will not contain the data (base64) of the asset. 
* **Returns**: JSON-encoded asset data.

### Delete Asset By ID
* **Method**: DELETE
* **URL**: `http://YOUR-DOMAIN/webservice/rest/asset/id/1281?apikey=[API-KEY]`
* **Returns**: JSON-encoded success value

### Create New Asset
* **Method**: PUT or POST
* **URL**: `http://YOUR-DOMAIN/webservice/rest/asset?apikey=[API-KEY]`
* **Request body**: JSON-encoded asset data in the same format as returned by get asset by id for the data segment but with missing id field or id set to 0
* **Returns**: JSON-encoded asset id

**Example:**
```json
{
	"data": "iVBORw0KGgoAAAANSUhEUgAAASwAAAEsBAMAAACLU5NGAAAAG1BMVEXMzMyWlpa...",
	"parentId": 7, 
	"type": "image",    
	"filename": "rest-uploaded-file.jpg",
}
```

### Update Existing Asset
* **Method**: PUT or POST
* **URL**: `http://YOUR-DOMAIN/webservice/rest/asset?apikey=[API-KEY]`
* **Request body**: Same as for create asset but with asset id
* **Returns**: JSON-encoded success value

### Check Asset exists
* **Method**: GET or POST
* **URL for GET**: `http://YOUR-DOMAIN/webservice/rest/asset-inquire?apikey=[API-KEY]&ids=4500,4501,2,9999&condense=0`
    * **ids Parameter for GET**: comma-seperated list of asset ids
* **URL for POST**:  `http://YOUR-DOMAIN/webservice/rest/asset-inquire?apikey=[API-KEY]&condense=0`
    * **Request body for POST**: comma-seperated list of asset ids
* **Returns**: JSON-encoded success value, list of asset ids and flag indicating whether asset exists or not. If optional condense parameter is set to true then only non-existing asset ids are returned.


### Get Document By ID
* **Method**: GET
* **URL**: `http://YOUR-DOMAIN/webservice/rest/document/id/1281?apikey=[API-KEY]`
* **Returns**: JSON-encoded document data.

### Delete Document By ID
* **Method**: DELETE
* **URL**: `http://YOUR-DOMAIN/webservice/rest/document/id/1281?apikey=[API-KEY]`
* **Returns**: JSON-encoded success value

### Create New Document
* **Method**: PUT or POST
* **URL**: `http://YOUR-DOMAIN/webservice/rest/document?apikey=[API-KEY]`
* **Request body**: JSON-encoded document data in the same format as returned by get document by id for the data segment but with missing id field or id set to 0
* **Returns**: JSON-encoded document id

### Update Existing Document
* **Method**: PUT or POST
* **URL**: `http://YOUR-DOMAIN/webservice/rest/document?apikey=[API-KEY]`
* **Request body**: Same as for create document but with object id
* **Returns**: JSON-encoded success value

### Check Document exists
* **Method**: GET or POST
* **URL for GET**: `http://YOUR-DOMAIN/webservice/rest/document-inquire?apikey=[API-KEY]&ids=4500,4501,2,9999&condense=0`
    * **ids Parameter for GET**: comma-seperated list of document ids
* **URL for POST**: `http://YOUR-DOMAIN/webservice/rest/document-inquire?apikey=[API-KEY]&condense=0`
    * **Request body for POST**: comma-seperated list of document ids
* **Returns**: JSON-encoded success value,  list of document ids and flag indicating whether document exists or not. If optional condense parameter is set to true then only non-existing documentids are returned.


### Search Assets
* **Method**: GET
* **URL**: `http://YOUR-DOMAIN/webservice/rest/asset-list?apikey=[API-KEY]&order=DESC&offset=3&orderKey=id&limit=2&q={"type":%20"folder"}
* **Returns**: A list of asset id/type pairs matching the given criteria.
* **Parameters**:
    * **q**: ["Query Filter](./01_Query_Filters.md)
    * **order**: sort order (if supplied then also the key must be provided)
    * **orderKey**: sort order key
    * **offset**: search offset
    * **limit**: result limit
    * **groupBy**: group by key


### Search Documents
* **Method**: GET
* **URL**: `http://YOUR-DOMAIN/webservice/rest/document-list?apikey=[API-KEY]&order=DESC&offset=3&orderKey=id&limit=2&q={"type":%20"folder"}
* **Returns**: A list of document id/type pairs matching the given criteria.
* **Parameters**:
    * **q**: ["Query Filter](./01_Query_Filters.md)
    * **order**: sort order (if supplied then also the key must be provided)
    * **orderKey**: sort order key
    * **offset**: search offset
    * **limit**: result  limit
    * **groupBy**: group by key


### Search Objects
* **Method**: GET
* **URL**: `http://YOUR-DOMAIN/webservice/rest/object-list?apikey=[API-KEY]&order=DESC&offset=3&orderKey=id&limit=2&objectClass=myClassname&q={"o_type":%20"folder"}
* **Returns**: A list of object id/type pairs matching the given criteria.
* **Parameters**:
    * **q**: ["Query Filter](./01_Query_Filters.md)
    * **order**: sort order (if supplied then also the key must be provided)
    * **orderKey**: sort order key
    * **offset**: search offset
    * **limit**: result limit
    * **groupBy**: group by key
    * **objectClass**: the name of the object class (without "DataObject\"). Note: If the class does not exist the filter criteria will be ignored!


### Get Asset Count
* **Method**: GET
* **URL**: `http://YOUR-DOMAIN/webservice/rest/asset-count?apikey=[API-KEY]&q={"type":%20"folder"}
* **Returns**: The total number of assets matching the given criteria.
* **Parameters**:
    * **q**: ["Query Filter](./01_Query_Filters.md)
    * **groupBy**: group by key


### Get Document Count
* **Method**: GET
* **URL**: `http://YOUR-DOMAIN/webservice/rest/document-count?apikey=[API-KEY]&q={"type":%20"folder"}
* **Returns**: The total number of documents matching the given criteria.
* **Parameters**:
    * **q**: ["Query Filter](./01_Query_Filters.md)
    * **groupBy**: group by key


### Get Object Count
* **Method**: GET
* **URL**: `http://YOUR-DOMAIN/webservice/rest/object-count?apikey=[API-KEY]&q={"type":%20"folder"}
* **Returns**: The total number of objects matching the given criteria.
* **Parameters**:
    * **q**: ["Query Filter](./01_Query_Filters.md)
    * **groupBy**: group by key
    * **objectClass**: the name of the object class (without "DataObject\"). Note: If the class does not exist the filter criteria will be ignored!


### Get List of Tags
* **Method**: GET
* **URL**: `http://[YOUR-DOMAIN]/webservice/rest/tag-list?apikey=[API-KEY]`
* **Returns**: The JSON-encoded list of tags.


### Get Tags for an Element
* **Method**: GET
* **URL**: `http://[YOUR-DOMAIN]/webservice/rest/tags-element-list?apikey=[API-KEY]&id=1281&type=object`
* **Returns**: The JSON-encoded list of tags ids for the element.
* **Parameters**:
    * **id**: element id
    * **type**: type of element (document | asset | object)


### Get Elements for a Tag
* **Method**: GET
* **URL**: `http://[YOUR-DOMAIN]/webservice/rest/elements-tag-list?apikey=[API-KEY]&id=12&type=object`
* **Returns**: The JSON-encoded list of elements id/type pairs matching the given tag.
* **Parameters**:
    * **id**: tag id
    * **type**: type of element (document | asset | object)


### Get User
* **Method**: GET
* **URL**: `http://YOUR-DOMAIN/webservice/rest/user?apikey=[API-KEY]`
* **Returns**: The JSON-encoded user data for the current user

### Get Server Info
* **Method**: GET
* **URL**: `http://YOUR-DOMAIN/webservice/rest/server-info?apikey=[API-KEY]`
* **Returns**: The JSON encoded server-info including Pimcore version, current time and extension data.


### Get Server Time
* **Method**: GET
* **URL**: `http://YOUR-DOMAIN/webservice/rest/system-clock?apikey=[API-KEY]`
* **Returns**: The JSON encoded system time.


### Translations
* **Method**: GET
* **URL**: `http://YOUR-DOMAIN/webservice/rest/translations?apikey=[API-KEY]&type=website`
* **Returns**: List of translations.
* **Parameters**:
    * **type**: "website" or "admin" (required)
    * **key**: tranlation key matches param
    * **creationDateFrom**: timestamp
    * **creationDateTill**: timstamp


### Get Classification Store Definition
* **Method**: GET
* **URL**: `http://YOUR-DOMAIN/webservice/rest/classificationstore-definition?apikey=[API-KEY]`
* **Returns**: The JSON-encoded classification store definition
* **Parameters**:
    * **q**: ["Query Filter](./01_Query_Filters.md)


### Get QuantityValue unit Definition
* **Method**: GET
* **URL**: `http://YOUR-DOMAIN/webservice/rest/quantity-value-unit-definition?apikey=[API-KEY]`
* **Returns**: The JSON-encoded list of QuantityValue unit definitions
* **Parameters**:
    * **q**: ["Query Filter](./01_Query_Filters.md)


## Override HTTP Method
The HTTP request method can be overwritten by providing a method parameter.
* **Method**: any
* **URL**: `http://YOUR-DOMAIN/webservice/rest/object/id/1281?apikey=[API-KEY]&method=PUT`
