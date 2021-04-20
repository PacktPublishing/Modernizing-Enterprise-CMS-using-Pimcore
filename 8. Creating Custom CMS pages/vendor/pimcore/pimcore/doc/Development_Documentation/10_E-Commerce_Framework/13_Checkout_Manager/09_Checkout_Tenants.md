# Checkout Tenants for Checkout
The E-Commerce Framework has the concept of Checkout Tenants which allow different cart manager and checkout manager 
configurations based on a currently active checkout tenant.
 
The current checkout tenant is set in the framework environment as follows. Once set, the checkout manager uses all 
specific settings of the currently active checkout tenant. 

So different checkout steps, different payment providers etc. can be implemented within one shop. 

```php
<?php
$environment = Factory::getInstance()->getEnvironment();
$environment->setCurrentCheckoutTenant('default');
$environment->save();

$environment->setCurrentCheckoutTenant('noShipping');
$environment->save();
```

> When using server-by-server payment confirmation communication, make sure that the correct tenant is set during the 
> response handling! 
