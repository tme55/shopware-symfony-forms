<?php

$class = isset($class) ? $class : '';

if (!isset($type) || 'file' != $type) {
    $attr['class'] = trim($class . ' ' . $view['form']->block($form, 'form_widget_class'));
}

$output = "<textarea {$view['form']->block($form, 'widget_attributes', ['attr' => $attr])}>{$view->escape($value)}</textarea>";

echo $output;
