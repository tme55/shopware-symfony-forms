<?php $parent_label_class = isset($parent_label_class) ? $parent_label_class : '' ?>
<?php $parent = '<input type="radio"' .
    $view['form']->block($form, 'widget_attributes') .
    ' value="' . $view->escape($value) . '" ' .
    ($checked ? ' checked="checked"' : '') . ' />';	?>
<?php if(strpos($parent_label_class, 'radio-inline') !== false) {		?>
    <?= $view['form']->block($form, 'radio_label', ['widget' => $parent])	?>
<?php } else {	?>
    <div class="radio">
        <?= $view['form']->block($form, 'radio_label', ['widget' => $parent])	?>
    </div>
<?php }	?>