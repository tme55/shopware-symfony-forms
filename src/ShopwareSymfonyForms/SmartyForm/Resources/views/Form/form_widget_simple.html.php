<?php
$class = (isset($class)) ? $class : '';
if (!isset($type) || 'file' != $type) {
    $attr['class'] = trim($class . ' ' . $view['form']->block($form, 'form_widget_class'));
}
$inputType = isset($type) ? $view->escape($type) : 'text';
if (!empty($value) || is_numeric($value)) {
    $value = "value='{$view->escape($value)}'";
} else {
    $value = "";
}
$output = "<input type='{$inputType}' {$view['form']->block($form, 'widget_attributes', ['attr' => $attr])} {$value}/>";

if (isset($help)) {
    $output .= "<span class='help-block'>{$view->escape($help)}</span>";
}