<div class="input-group">
<?php
$prepend = substr($money_pattern, 0, 2) == '{{';

if (!$prepend) {
    $output = "<span class='input-group-addon'>{$view->escape(str_replace('{{ widget }}', '', $money_pattern))}</span>";
}

$output .= $view['form']->block($form, 'form_widget_simple');
if ($prepend) {
    $moneyPattern = str_replace('{{ widget }}', '', $money_pattern);
    $output .= "<span class='input-group-addon'>{$moneyPattern}</span>";
}

$output .= "</div>";
echo $output;


