<?php  if (count($checkerrors) > 0) : ?>
	<div class="error">
		<?php foreach ($checkerrors as $error) : ?>
			<p><?php echo $error ?></p>
		<?php endforeach ?>
	</div>
<?php  endif ?>