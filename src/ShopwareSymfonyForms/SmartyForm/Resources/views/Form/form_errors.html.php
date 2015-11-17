<?php
if (count($errors) > 0) {
    if (isset($form['parent']) && $form['parent']) {
        $output = "<span class='help-block'>";
    } else {
        $output = "<div class='alert alert-danger'>";
    }

    $output .= "<ul class='list-unstyled'>";
    foreach ($errors as $error) {
        $output .= "<li><span class='glyphicon glyphicon-exclamation-sign'></span>{$error->getMessage()}</li>";
    }
    $output .= "</ul>";

    if (isset($form['parent']) && $form['parent']) {
        $output .= "</span>";
    } else {
        $output .= "</div>";
    }

    echo $output;
}