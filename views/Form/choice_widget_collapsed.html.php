<?php

$class = (isset($attr['class'])) ? $attr['class'] : '';

$attr['class'] = trim($class) . ' ' . $view['form']->block($form, 'form_widget_class');

if ($required && null === $placeholder && $placeholder_in_choices === false && $multiple === false) {
    $required = false;
}

$attributes = $view['form']->block($form, 'widget_attributes', array(
    'required' => $required,
    'attr' => $attr
));


if ($multiple) {
    $multiple = "multiple='multiple'";
} else {
    $multiple = "";
}

$output = "<select {$class} {$attributes} {$multiple}>";

if (null !== $placeholder) {

    if ($required and empty($value) && '0' !== $value) {
        $selected = "selected='selected'";
    } else {
        $selected = "";
    }
    $output .= "<option value='' {$selected}>";
    $output .= '' != $placeholder ? $view->escape($view['translator']->trans($placeholder, array(), $translation_domain)) : '';
    $output .= "</option>";
}

if (count($preferred_choices) > 0) {
    $output .= $view['form']->block($form, 'choice_widget_options', array('choices' => $preferred_choices));
    if (count($choices) > 0 && null !== $separator) {
        $output .= "<option disabled='disabled'>{$separator}</option>";
    }
}
$output .= $view['form']->block($form, 'choice_widget_options', array('choices' => $choices));

$output .= "</select>";

echo $output;