<?php

$attr['class'] = trim((isset($attr['class']) ? $attr['class'] : '') . ' form-horizontal');
$method = strtoupper($method);
$form_method = strtolower($method === 'GET' || $method === 'POST' ? $method : 'POST');

foreach ($attr as $k => $v) {
    $attributes .= printf(' %s="%s"', $view->escape($k), $view->escape($v));
}

if ($multipart) {
    $multipart = "enctype=multipart/form-data";
} else {
    $multipart = "";
}

$output = "<form name='{$name}' method='{$form_method}' action='{$action}' {$attributes} {$multipart}>";

if ($form_method !== $method) {
    $output .= "<input type='hidden' name='_method' value='{$method}'/>";
}

echo $output;