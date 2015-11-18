# Usage - Registering the component as service

To register the form factory as a service for convenient usage please subscribe to the `Enlight_Controller_Front_DispatchLoopStartup` event and register the service in the defined `onStartDispatch` method:

```php
//engine/Shopware/Plugins/Scope/Module/YourPluginName/Bootstrap.php

public function install(){
    //...
    $this->subscribeEvent('Enlight_Controller_Front_DispatchLoopStartup', 'onStartDispatch');
    //...
}

/**
 * onStartDispatch method to Register to Enlight_Controller_Front_DispatchLoopStartup event
 */
public function onStartDispatch(Enlight_Event_EventArgs $arguments)
{
    Shopware()->Container()->set('sw.form.factory', new \ShopwareSymfonyForms\FormFactory\FormFactory(Shopware()->Container()));
}

```

After registering the form factory as a service you are able to access the factory via the specified keyword `sw.form.factory`:

```php
$formFactory = Shopware()->Container()->get('sw.form.factory');
```