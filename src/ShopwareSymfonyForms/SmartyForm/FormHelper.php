<?php
/**
 * @author Martin Schindler
 * @copyright dasistweb GmbH (http://www.dasistweb.de)
 * Date: 17.11.15
 * Time: 12:24
 */

namespace ShopwareSymfonyForms\SmartyForm;


use Symfony\Component\Form\Extension\Validator\ValidatorExtension;
use Symfony\Component\Form\Forms;
use Symfony\Component\Validator\Validation;

class FormHelper
{

    protected $formFactoryBuilder;

    protected $formFactory;

    public function __construct()
    {
        $validator = Validation::createValidator();
        $this->formFactoryBuilder = Forms::createFormFactoryBuilder();

        $this->formFactory = $this->formFactoryBuilder
            ->addExtension(new ValidatorExtension($validator))
            ->getFormFactory();
    }

    public function getFormFactoryBuilder()
    {
        return $this->formFactoryBuilder;
    }

    public function getFormFactory()
    {
        return $this->formFactory;
    }
}