<?php if (count($errors) > 0): ?>
<?php if (isset($form['parent']) && $form['parent']) { ?><span class="help-block"><?php } else { ?><div class="alert alert-danger"><?php } ?>
	<ul class="list-unstyled">

		<?php foreach ($errors as $error): ?>
			<li><span class="glyphicon glyphicon-exclamation-sign"></span> <?php echo $error->getMessage() ?></li>
		<?php endforeach; ?>
	</ul>
<?php if (isset($form['parent']) && $form['parent']) { ?></span><?php } else { ?></div><?php } ?>
<?php endif ?>