<?php

$parent_label_class = isset($parent_label_class) ? $parent_label_class : '';
$parent = '<input type="radio"' . $view['form']->block($form, 'widget_attributes') . ' value="' . $view->escape($value) . '" ' . ($checked ? ' checked="checked"' : '') . ' />';

if (strpos($parent_label_class, 'radio-inline') !== false) {
    $output = $view['form']->block($form, 'radio_label', ['widget' => $parent]);
} else {
    $output = "<div class='radio'>{$view['form']->block($form, 'radio_label', ['widget' => $parent])}</div>";
}