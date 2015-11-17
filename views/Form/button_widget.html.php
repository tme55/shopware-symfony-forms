<?php

if (!isset($class)) {
    $class = "";
}

if (!isset($type) || 'file' != $type) {
    $attr['class'] = trim($class . ' btn');
}

if (!$label) {
    if (isset($label_format)) {
        $label = strtr($label_format, array('%name%' => $name, '%id%' => $id));
    } else {
        $label = $view['form']->humanize($name);
    }
}

if (isset($type)) {
    $type = $view->escape($type);
} else {
    $type = 'button';
}

$attributes = $view['form']->block($form, 'button_attributes', ['attr' => $attr]);
$value = $view->escape($view['translator']->trans($label, array(), $translation_domain));
$output = "<button type='{$type}' {$attributes}>{$value}</button>";

echo $output;