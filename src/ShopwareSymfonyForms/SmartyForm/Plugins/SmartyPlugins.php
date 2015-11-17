<?php

namespace ShopwareSymfonyForms\Plugins;

use Smarty;
use Smarty_Internal_Template;
use Symfony\Bundle\FrameworkBundle\Templating\Helper\FormHelper;


/**
 * Class SmartyPlugins
 * @author Martin Schindler
 * @package ShopwareSymfonyForms\Plugins
 */
class SmartyPlugins
{
    /**
     * @var null|FormHelper
     */
    protected $formHelper = null;

    /**
     * SmartyPlugins constructor.
     * @param FormHelper $formHelper
     * @param Smarty $smarty
     */
    public function __construct(FormHelper $formHelper, Smarty $smarty)
    {
        $this->formHelper = $formHelper;

        # registering all necessary smarty plugins
        $this->register($smarty);
    }

    /**
     * @param array $params
     * @param Smarty_Internal_Template $smartyTemplate
     * @author Martin Schindler
     * @return mixed
     */
    public function formStart(array $params, Smarty_Internal_Template $smartyTemplate)
    {
        return $this->formCall('start', $params, $smartyTemplate);
    }

    /**
     * @param array $params
     * @param Smarty_Internal_Template $smartyTemplate
     * @author Martin Schindler
     * @return mixed
     */
    public function formEnd(array $params, Smarty_Internal_Template $smartyTemplate)
    {
        return $this->formCall('end', $params, $smartyTemplate);
    }

    /**
     * @param array $params
     * @param Smarty_Internal_Template $smartyTemplate
     * @author Martin Schindler
     * @return mixed
     */
    public function formRest(array $params, Smarty_Internal_Template $smartyTemplate)
    {
        return $this->formCall('rest', $params, $smartyTemplate);

    }

    /**
     * @param array $params
     * @param Smarty_Internal_Template $smartyTemplate
     * @author Martin Schindler
     * @return string
     */
    public function formLabel(array $params, Smarty_Internal_Template $smartyTemplate)
    {
        $form = $params['form'];
        unset($params['form']);

        $label = null;
        if (array_key_exists('label', $params)) {
            $label = $params['label'];
            unset($params['label']);
        }

        return $this->formHelper->label($form, $label, $params);
    }

    /**
     * @param array $params
     * @param Smarty_Internal_Template $smartyTemplate
     * @author Martin Schindler
     * @return mixed
     */
    public function formWidget(array $params, Smarty_Internal_Template $smartyTemplate)
    {
        return $this->formCall('widget', $params, $smartyTemplate);
    }

    /**
     * @param array $params
     * @param Smarty_Internal_Template $smartyTemplate
     * @author Martin Schindler
     * @return mixed
     */
    public function formRow(array $params, Smarty_Internal_Template $smartyTemplate)
    {
        return $this->formCall('row', $params, $smartyTemplate);
    }

    /**
     * @param array $params
     * @param Smarty_Internal_Template $smartyTemplate
     * @author Martin Schindler
     * @return string
     */
    public function formErrors(array $params, Smarty_Internal_Template $smartyTemplate)
    {
        return $this->formHelper->errors($params['form']);
    }

    /**
     * @param $fnName
     * @param array $params
     * @param Smarty_Internal_Template $smartyTemplate
     * @author Martin Schindler
     * @return mixed
     */
    public function formCall($fnName, array $params, Smarty_Internal_Template $smartyTemplate)
    {
        $form = $params['form'];
        unset($params['form']);

        return call_user_func([$this->formHelper, $fnName], $form, $params);
    }

    /**
     * @param Smarty $smarty
     * @author Martin Schindler
     */
    public function register(Smarty $smarty)
    {
        $smarty->registerPlugin('function', 'form_start', array($this, 'formStart'));
        $smarty->registerPlugin('function', 'form_errors', array($this, 'formErrors'));
        $smarty->registerPlugin('function', 'form_row', array($this, 'formRow'));
        $smarty->registerPlugin('function', 'form_label', array($this, 'formLabel'));
        $smarty->registerPlugin('function', 'form_widget', array($this, 'formWidget'));
        $smarty->registerPlugin('function', 'form_rest', array($this, 'formRest'));
        $smarty->registerPlugin('function', 'form_end', array($this, 'formEnd'));
    }
}