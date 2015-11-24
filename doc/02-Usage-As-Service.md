# Usage - Registering the component as service

To register the form factory as a service for convenient usage please subscribe to the `Enlight_Bootstrap_InitResource_...` event and return an instance in the callback method.

```php
//engine/Shopware/Plugins/Scope/Module/YourPluginName/Bootstrap.php

public function install()
{
    //...
    $this->subscribeEvent('Enlight_Bootstrap_InitResource_sw.form.factory', 'onInitResource');
    //...
}

/**
 * OnInit method to Register service in container
 */
public function onInitResource(Enlight_Event_EventArgs $arguments)
{
    return new \ShopwareSymfonyForms\FormFactory\FormFactory(Shopware()->Container()));
}

```

After registering the form factory as a service you are able to access the factory via the specified keyword `sw.form.factory`:

```php
$formFactory = Shopware()->Container()->get('sw.form.factory');
```
