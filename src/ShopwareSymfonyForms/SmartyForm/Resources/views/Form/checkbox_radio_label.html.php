<?php

# Hide the label if widget is not defined in order to prevent double label rendering
if (isset($widget)) {

    if ($required) {
        $label_attr['class'] = trim((isset($label_attr['class']) ? $label_attr['class'] : '') . ' required');
    }

    if (isset($parent_label_class)) {
        $label_attr['class'] = trim((isset($label_attr['class']) ? $label_attr['class'] : '') . ' ' . $parent_label_class);
    }

    if ($label !== false && !$label) {
        $label = $view['form']->humanize($name);
    }

    $output = "<label";
    foreach ($label_attr as $item => $value) {
        $output .= " " . $view->escape($attrname) . "='" . $view->escape($attrvalue) . "'";
    }
    $output .= ">";
    $output .= "{$widget}";
    $value = ($label !== false) ? ($translation_domain === false) ? $label : $view['translator']->trans($label, array(), $translation_domain) : '';
    $output .= "{$value}";
    $output .= "</label>";

    echo $output;
}