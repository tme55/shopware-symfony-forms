<?php
if(isset($widget)) {
	if($required) {
		$label_attr['class'] = trim((isset($label_attr['class']) ? $label_attr['class'] : '') . ' required');
	}
	if (isset($parent_label_class)) {
		$label_attr['class'] = trim((isset($label_attr['class']) ? $label_attr['class'] : '') . ' ' . $parent_label_class);
	}

	$label_attr['class'] .= ' ' . $view['form']->block($form, 'form_error');

	if($label !== false && !$label) {
		$label = $view['form']->humanize($name);
	}
?>
<label<?php foreach($label_attr as $attrname => $attrvalue) { ?> <?= $view->escape($attrname) ?>="<?= $view->escape($attrvalue) ?>"<?php } ?>>
<?= $widget ?> <?= $view->escape(($label !== false ? ($translation_domain === false ? $label : $view['translator']->trans($label, array(), $translation_domain)) : '')) ?>
</label>
<?php } ?>