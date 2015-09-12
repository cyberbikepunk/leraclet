<?php // Le Raclet SINGLE PAGE template : Opabinia75, opabinia@opabinia.de, v1 07/14 ?>

<?php get_header();  ?>

<?php if (have_posts()) { the_post(); } ?>
<?php $images = lr_get_images(get_the_ID(), LATEST, SINGLE); ?>

<article class="row">
	<div class="col-xs-12">
		<h1><?php the_title(); ?><h1>
	</div>
	<div class="col-sm-8 col-xs-12"> 
		<?php lr_one_image($images[LATEST], 'full', 'lr-column'); ?>
		<?php lr_more_images($images, 'full', 'hidden-xs lr-column', 2); ?>
	</div>
	<div class="col-sm-4" id="lr-side-text">
		<?php the_content(); ?>
	</div>	
	<div class="col-sm-8 lr-column"> 
		<?php lr_more_images($images, 'full', 'visible-xs lr-column', 2); ?>
	</div>
		
</article>
	
<?php get_footer(); ?>