<?php
if (!$valid) {
    echo ($form_error_class) ? $form_error_class : $view['form']->block($form,'form_error_class');
}
?>