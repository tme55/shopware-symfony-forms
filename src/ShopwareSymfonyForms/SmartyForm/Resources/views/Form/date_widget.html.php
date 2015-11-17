<?php

if ($widget == "single_text") {
    $output = $view['form']->block($form, 'form_widget_simple');
} else {
    $class = (isset($attr['class']) ? $attr['class'] : '') . ' form-inline';
    $attr['class'] = trim($class);

    if (!isset($datetime) || $datetime === false) {
        $output = "<div {$view['form']->block($form, 'widget_container_attributes', ['attr' => $attr])}>";
    }

    $output .= str_replace(array('{{ year }}', '{{ month }}', '{{ day }}'), array(
        $view['form']->widget($form['year'], ['attr' => $attr]),
        $view['form']->widget($form['month'], ['attr' => $attr]),
        $view['form']->widget($form['day'], ['attr' => $attr]),
    ), $date_pattern);

    if (!isset($datetime) || $datetime === false) {
        $output .= "</div>";
    }
}

echo $output;
