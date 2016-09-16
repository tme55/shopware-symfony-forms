<?php
    $attr['class'] = trim($attr['class'] . ' ' . $view['form']->block($form, 'form_widget_class') . ' ' . $view['form']->block($form, 'form_error'));
?>
<textarea <?php echo $view['form']->block($form, 'widget_attributes', ['attr' => $attr]) ?>><?php echo $view->escape($value) ?></textarea>
