<?php


if (isset($label_attr['class']) && strpos($label_attr['class'], '-inline') !== false) {
    $output = "<div class='control-group'>";
} else {
    $output = "<div {$view['form']->block($form, 'widget_container_attributes')}>";
}

foreach ($form as $child) {
    $output .= $view['form']->widget($child, array('parent_label_class' => (isset($label_attr['class']) ? $label_attr['class'] : ''), 'translation_domain' => $choice_translation_domain));
}

$output .= "</div>";

echo $output;