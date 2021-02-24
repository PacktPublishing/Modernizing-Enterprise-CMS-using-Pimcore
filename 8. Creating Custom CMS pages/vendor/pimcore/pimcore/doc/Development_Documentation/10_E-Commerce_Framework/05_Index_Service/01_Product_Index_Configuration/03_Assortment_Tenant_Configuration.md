# Assortment Tenant Configuration

The E-Commerce Framework provides a two level Assortment Tenant system for the Product Index: 

   1. **Assortment Tenant**: The first level of tenants are heavy-weight tenants. They allow multiple shop instances within one 
   system. The shop instances are completely independent from each other and can contain complete different products, 
   index attributes and even use different product index implementations.

   2. **Assortment Subtenant**: The second level of tenants are light-weight tenants, which exist within a shop instance. 
   Light-weight tenants use the same Product Index with the same attributes as their parent shop, but can contain a subset 
   of the products. So they are meant to be used for implementing different product assortments within one shop. 

One system can have multiple tenants (heavy- and light-weight). But too many tenants can have bad effects on the performance 
of saving products, since all *Product Indices* need to be updated on every save. 

By default the system always uses one heavy-weight tenant (= `DefaultMysql`), but the default tenant can be disabled. 


## Assortment Tenants
For setting up an Assortment Tenant, following steps are necessary: 

- **Implementation of a Tenant Config:**
The Tenant Config class is the central configuration of an assortment tenant, defines which products are available for 
the tenant and provides the connection to the used *Product Index* implementation. It needs to implement 
[`Pimcore\Bundle\EcommerceFrameworkBundle\IndexService\Config\ConfigInterface`](https://github.com/pimcore/pimcore/blob/master/bundles/EcommerceFrameworkBundle/IndexService/Config/ConfigInterface.php). 
For detailed information see in-source documentation of the interface. Following implementations are provided by the framework 
and may be extended:
   - `Pimcore\Bundle\EcommerceFrameworkBundle\IndexService\Config\DefaultMysql`: Provides a simple mysql implementation of 
   the product index.
  - `Pimcore\Bundle\EcommerceFrameworkBundle\IndexService\ConfigOptimizedMysql`: Provides an optimized mysql implementation 
  of the product index.
  - `Pimcore\Bundle\EcommerceFrameworkBundle\IndexService\Config\ElasticSearch`: Provides a default [elastic search](https://www.elastic.co/) 
  implementation of the product index.
  - `Pimcore\Bundle\EcommerceFrameworkBundle\IndexService\Config\DefaultFactFinder`: Provides a default [fact finder](http://www.fact-finder.de/) 
  implementation of the product index. (Deprecated since version 6.7.0 and will be removed in 7.)
  - `Pimcore\Bundle\EcommerceFrameworkBundle\IndexService\Config\DefaultFindologic`: Provides a default [findologic](https://www.findologic.com/) 
  implementation of the product index.

- **Configuring Assortment Tenants within configuration:**
Each tenant has to be configured within the `index_service` configuration by defining the tenant config class and index 
attributes. Depending on the *Product Index* implementation, additional configuration may be necessary. 

- **Declare the service:**
You need to declare the service as well so the class can be used. On your service configuration or for instance at the top of the ecommerce configuration file:
```
services:
    MyBundle\Service\MySubtenantConfig:
        calls:
            - [setAttributeFactory, ['@Pimcore\Bundle\EcommerceFrameworkBundle\IndexService\Config\AttributeFactory']]
```


### Setting current Assortment Tenant for Frontend
The [E-Commerce Framework Environment](https://github.com/pimcore/pimcore/blob/master/bundles/EcommerceFrameworkBundle/EnvironmentInterface.php#L22-L22) 
provides following methods to set the current Assortment Tenant when working with *Product Lists* in Code: 
```php
<?php
    /**
     * sets current assortment tenant which is used for indexing and product lists
     *
     * @param string $tenant
     * @return mixed
     */
    public function setCurrentAssortmentTenant($tenant);

    /**
     * gets current assortment tenant which is used for indexing and product lists
     *
     * @return string
     */
    public function getCurrentAssortmentTenant();

    /**
     * sets current assortment sub tenant which is used for indexing and product lists
     *
     * @param string $subTenant
     * @return mixed
     */
    public function setCurrentAssortmentSubTenant($subTenant);

    /**
     * gets current assortment sub tenant which is used for indexing and product lists
     *
     * @return string
     */
    public function getCurrentAssortmentSubTenant();
```

The current Assortment Tenant has to be set in the application controllers, e.g. after the login of a specific customer. 
The Index Service provides the corresponding Product List implementation based on the current tenant.


##### Example:
```php
<?php
  
  $factory = \Pimcore\Bundle\EcommerceFrameworkBundle\Factory::getInstance();
  
  //setting assortment tenant
  $environment = $factory->getEnvironment();
  $environment->setCurrentAssortmentTenant("elasticsearch");
  
  //getting suitable product list
  $productlist = $factory->getIndexService()->getProductListForCurrentTenant();
  //doing stuff with product list
```

## Assortment Subtenants
Subtenants are light-weight tenants, which share the same Product Index with the same attributes as their parent 
assortment tenant.

### Implementing an Assortment Subtenant for MySQL
The mapping which product is assigned to with subtenant is done with an additional mapping table. The necessary 
joins and conditions are implemented within additional methods within 
[`Pimcore\Bundle\EcommerceFrameworkBundle\IndexService\Config\MysqlConfigInterface`](https://github.com/pimcore/pimcore/blob/master/bundles/EcommerceFrameworkBundle/IndexService/Config/MysqlConfigInterface.php): 
 
```php
    /**
     * return table name of product index tenant relations for subtenants
     *
     * @return string
     */
    public function getTenantRelationTablename();

    /**
     * return join statement in case of subtenants
     *
     * @return string
     */
    public function getJoins();

    /**
     * returns additional condition in case of subtenants
     *
     * @return string
     */
    public function getCondition();
``` 

In order to populate the additional mapping data, also following methods have to be implemented: 

```php
    /**
     * in case of subtenants returns a data structure containing all sub tenants
     *
     * @param IndexableInterface $object
     * @param int|null $subObjectId
     *
     * @return mixed $subTenantData
     */
    public function prepareSubTenantEntries(IIndexable $object, $subObjectId = null);

    /**
     * populates index for tenant relations based on given data
     *
     * @param mixed $objectId
     * @param mixed $subTenantData
     * @param mixed $subObjectId
     *
     * @return void
     */
    public function updateSubTenantEntries($objectId, $subTenantData, $subObjectId = null);
```

For an complete example have a look at the [sample implementation](https://github.com/pimcore/pimcore/blob/master/bundles/EcommerceFrameworkBundle/IndexService/Config/DefaultMysqlSubTenantConfig.php).


### Implementing an Assortment Subtenant for Elastic Search

In order to populate the additional mapping data, the following method has to be implemented: 

```php
    /**
     * in case of subtenants returns a data structure containing all sub tenants
     *
     * @param IndexableInterface $object
     * @param int|null $subObjectId
     *
     * @return array $subTenantData
     */
    public function prepareSubTenantEntries(IIndexable $object, $subObjectId = null);

```

For an complete example have a look at the [sample implementation](https://github.com/pimcore/pimcore/blob/master/bundles/EcommerceFrameworkBundle/IndexService/Config/DefaultElasticSearchSubTenantConfig.php).

---

> Note: This is currently only implemented for MySQL and Elastic Search based product index implementations. 
