<?php if (false !== $label) { ?>
    <?php
    $label_attr['class'] = isset($label_attr['class']) ? $label_attr['class'] : '';
    $label_attr['class'] = trim(
        (isset($label_attr['class']) ? $label_attr['class'] : '') .
        ' control-label ' .
        $view['form']->block($form, 'form_label_class')
    );
    ?>
    <?php if ($required) { $label_attr['class'] = trim((isset($label_attr['class']) ? $label_attr['class'] : '').' required'); } ?>
    <?php if (!$compound) { $label_attr['for'] = $id; } ?>
    <?php if (!$label) { $label = isset($label_format)
        ? strtr($label_format, array('%name%' => $name, '%id%' => $id))
        : $view['form']->humanize($name); } ?>
    <label <?php foreach ($label_attr as $k => $v) { printf('%s="%s" ', $view->escape($k), $view->escape($v)); } ?>><?php echo $view->escape(false !== $translation_domain ? $view['translator']->trans($label, array(), $translation_domain) : $label) ?></label>
<?php } else { ?>
    <div class="<?= $view['form']->block($form, 'form_label_class') ?>"></div>
<?php } ?>