<?php

if ($widget == 'single_text') {
    $output = $view['form']->block($form, 'form_widget_simple');
} else {
    $vars = $widget == 'text' ? array('attr' => array('size' => 1)) : array();
    $attr['class'] = trim((isset($attr['class']) ? $attr['class'] : '') . ' form-inline');
    if (!isset($datetime) || $datetime === false) {
        $output .= " <div {$view['form']->block($form, 'widget_container_attributes', ['attr' => $attr])}>";
    }
    $output .= $view['form']->widget($form['hour'], $vars);

    if ($with_minutes) {
        $output .= ':';
        $output .= $view['form']->widget($form['minute'], $vars);
    }

    if ($with_seconds) {
        $output .= ':';
        $output .= $view['form']->widget($form['second'], $vars);
    }

    if (!isset($datetime) || $datetime === false) {
        $output .= "</div>";
    }
}