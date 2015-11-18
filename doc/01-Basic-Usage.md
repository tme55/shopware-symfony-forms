# Usage - The Basics

Forms in general can be small and simple or event giant monsters that become quite complex to code and maintain.

This package solves this issue by giving you an easy to use way of integrating the Symfony2 forms component into your Shopware project.

##Using the Form Factory
To use the form factory component in your Shopware plugin you only have to instantiate it. To create your form just do like 

```php
$formFactory = new \ShopwareSymfonyForms\FormFactory\FormFactory(Shopware()->Container());

```


##Creating a simple form
To use the form factory component in your Shopware plugin you only have to instantiate it. To create your form just do like defined in the official symfony form documentation.

```php
$form = $this->formFactory->createBuilder()
    ->add('company', 'text', array(
        'required' => true,
        'constraints' => array(
            new \Symfony\Component\Validator\Constraints\NotBlank(),
            new \Symfony\Component\Validator\Constraints\Length(array('min' => 3))
        )
    ))
    ->add('street', 'text')
    ->add('city', 'text')
    ->add('zipcode', 'text')
    ->add('country', 'entity', array(
        'class' => 'Shopware\Models\Country\Country',
        'property' => 'name'
    ))
    ->add('go', 'submit')
    ->getForm();

```

##Handling the request and assignment to view
After the form has been built it is necessary to handle the request. Otherwise no form data would be submitted. 

By checking if the form has been submitted and is valid you are able to do any success stuff like redirecting to another controller action for example.

By assigning the form to the template the form view created via `$form->createView()` will be available in the frontend template by accessing it via Smarty syntax `{$form}`. 

```php
$form->handleRequest();

if ($form->isSubmitted() AND $form->isValid()) {
    //@todo: redirect on success
}

$this->View()->assign(array(
        'form' => $form->createView()
    )
);

```

##Building the form in smarty
This package provides the possibility to build the php created form in your frontend template via smarty functions.

```html
<div class="container">
    {* novalidate turns off html5 validation, so symfony forms solely has to handle it *}
    {form_start form=$form attr=['novalidate' => 'novalidate']}
    {form_widget form=$form}
    {form_end form=$form}
</div>
```