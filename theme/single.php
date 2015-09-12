<?php // Le Raclet SINGLE POST template : Opabinia75, opabinia@opabinia.de, v1 07/14 	?>

<?php if (!have_posts()) : lr_backup_query(); endif; the_post(); ?>

	<?php $images = lr_get_images(get_the_ID(), LATEST, ALL); ?>

	<?php if ($images) : ?>
		<article class="carousel-inner">
			<?php foreach ( $images as $n => $image ) : ?>
				<div class="item <?php lr_toggle($n); ?>">
					<?php lr_one_image($image, 'full', ADD_NO_CSS); ?>
				</div>
			<?php endforeach; ?>
		</article>
		<?php lr_carousel_parts($images); ?>
	<?php endif; ?>

<?php rewind_posts(); ?>