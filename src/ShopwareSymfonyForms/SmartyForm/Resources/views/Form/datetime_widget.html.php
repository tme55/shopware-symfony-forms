<?php

if ($widget == 'single_text') {
    $output = $view['form']->block($form, 'form_widget_simple');
} else {
    $class = (isset($attr['class']) ? $attr['class'] : '') . ' form-inline';
    $attr['class'] = trim($class);

    $output = "<div {$view['form']->block($form, 'widget_container_attributes', ['attr' => $attr])}>";
    $output .= $view['form']->errors($form['date']) . ' ' . $view['form']->errors($form['time']);
    $output .= $view['form']->widget($form['date'], ['datetime' => true]) . ' ' . $view['form']->widget($form['time'], ['datetime' => true]);
    $output .= "</div>";
}

echo $output;