<div class="input-group">
    <?php $prepend = substr($money_pattern, 0, 2) == '{{'; ?>
    <?php if (!$prepend) { ?>
        <span class="input-group-addon"><?= $view->escape(str_replace('{{ widget }}', '', $money_pattern)) ?></span>
    <?php } ?>
    <?php echo $view['form']->block($form, 'form_widget_simple') ?>
    <?php if ($prepend) { ?>
        <span class="input-group-addon"><?= str_replace('{{ widget }}', '', $money_pattern) ?></span>
    <?php } ?>
</div>
