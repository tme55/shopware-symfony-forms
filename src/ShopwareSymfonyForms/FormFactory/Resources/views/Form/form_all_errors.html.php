<?php if (count($errors) > 0): ?>
<?php $includeContainer = (!isset($include_container) || $include_container === true); ?>
<?php $list_item_icon = (isset($list_item_icon) ? $list_item_icon : 'glyphicon glyphicon-exclamation-sign'); ?>
<?php $list_class = (isset($list_class) ? $list_class : 'list-unstyled');	?>

<?php if($includeContainer) {
		if (isset($form['parent']) && $form['parent']) { ?><span class="help-block"><?php} else { ?><div class="alert alert-danger"><?php}
	} ?>
	<ul class="<?= $list_class ?>">

		<?php foreach ($errors as $fieldName => $errorMsg): ?>
			<li><?php if($list_item_icon !== false) { ?><span class="<?= $list_item_icon ?>"></span> <?php} ?><?php echo $fieldName ?> - <?php echo $errorMsg ?></li>
		<?php endforeach; ?>
	</ul>
<?php if($includeContainer) {
		if (isset($form['parent']) && $form['parent']) { ?></span><?php} else { ?></div><?php}
	} ?>
<?php endif ?>