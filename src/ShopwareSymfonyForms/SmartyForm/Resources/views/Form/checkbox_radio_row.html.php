<?php

$validClass = (!$valid) ? ' has-error' : '';
$output = "<div class='form-group {$validClass}'>";

$output .= "<div class='{$view['form']->block($form, 'form_label_class')}'></div>";
$output .= "<div class='{$view['form']->block($form, 'form_group_class')}'>";
$output .= $view['form']->widget($form);
$output .= $view['form']->errors($form);
$output .= "</div>";
$output .= "</div>";

echo $output;