<?php // Le Raclet WORKSHOP CATEGORY template : Opabinia75, opabinia@opabinia.de, v1 07/14 ?>

<?php get_header(); ?>

<?php if (!have_posts()) : lr_backup_query(); endif; the_post(); ?>
<?php $images = lr_get_images(get_the_ID(), LATEST, SINGLE); ?>

<div class="row">
	<h1 class="col-xs-12">
		<?php single_cat_title(); ?>
	</h1>
	<div class="col-sm-8 col-xs-12">
		<?php lr_one_image($images[LATEST], 'full', 'lr-column'); ?>
		<?php lr_one_image(get_post(WORKSHOP1), 'full', 'hidden-xs lr-column'); ?>
		<?php lr_one_image(get_post(WORKSHOP2), 'full', 'hidden-xs lr-column'); ?>
	</div>
	<div class="col-sm-4 col-xs-12 lr-column" id="lr-side-text">
		<?php the_content(); ?>
	</div>
	<div class="col-xs-12">
		<?php lr_one_image(get_post(WORKSHOP1), 'full', 'visible-xs lr-column'); ?>
		<?php lr_one_image(get_post(WORKSHOP2), 'full', 'visible-xs lr-column'); ?>
	</div>
</div>

<?php get_footer(); ?>