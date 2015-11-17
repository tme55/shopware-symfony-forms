<?php

if (false !== $label) {

    $label_attr['class'] = isset($label_attr['class']) ? $label_attr['class'] : '';
    $label_attr['class'] = trim((isset($label_attr['class']) ? $label_attr['class'] : '') . ' control-label ' . $view['form']->block($form, 'form_label_class'));

    if ($required) {
        $label_attr['class'] = trim((isset($label_attr['class']) ? $label_attr['class'] : '') . ' required');
    }

    if (!$compound) {
        $label_attr['for'] = $id;
    }

    if (!$label) {
        $label = isset($label_format) ? strtr($label_format, array('%name%' => $name, '%id%' => $id)) : $view['form']->humanize($name);
    }

    foreach ($label_attr as $k => $v) {
        $attributes .= printf('%s="%s" ', $view->escape($k), $view->escape($v));
    }

    $output = "<label {$attributes}>";
    $output .= $view->escape(false !== $translation_domain ? $view['translator']->trans($label, array(), $translation_domain) : $label);
    $output .= "</label>";
} else {
    $output = "<div class='{$view['form']->block($form, 'form_label_class')}'></div>";
}

echo $output;