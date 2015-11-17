<?php

if (!isset($parent_label_class)) {
    $parent_label_class = '';
}

if (strlen($value) > 0) {
    $value = 'value="' . $view->escape($value) . '"';
} else {
    $value = "";
}

if ($checked) {
    $checkStatus = 'checked="checked"';
} else {
    $checkStatus = "";
}

$parent = "<input type='checkbox' {$view['form']->block($form, 'widget_attributes')} {$value} {$checkStatus}/>";

if (strpos($parent_label_class, 'checkbox-inline') !== false) {
    $output = $view['form']->block($form, 'checkbox_label', ['widget' => $parent]);
} else {
    $output = "<div class='checkbox'>";
    $output .= $view['form']->block($form, 'checkbox_label', ['widget' => $parent]);
    $output .= "</div>";
}

echo $output;