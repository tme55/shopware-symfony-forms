<div class="form-group<?= ((!$compound || (isset($force_error) && $force_error)) && !$valid) ? ' '.$view['form']->block($form, 'form_error_class') : '' ?>">
    <?php echo $view['form']->label($form) ?>
    <div class="<?php echo $view['form']->block($form, 'form_group_class') ?>">
        <?php echo $view['form']->widget($form) ?>
        <?php echo $view['form']->errors($form) ?>
    </div>
</div>

