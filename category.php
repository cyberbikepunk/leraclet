<?php // Le Raclet theme CATEGORY template : Opabinia75, opabinia@opabinia.de, v1 07/14 ?>

<?php get_header();?>

<section class="row ">
	<div class="col-xs-12">
		<h1><?php pll_e('Portfolio'); ?></h1>
	</div>

	<div id="lr-carousel" class="col-xs-12 carousel slide" data-ride="carousel">
		<?php get_template_part('single'); ?>
	</div>

	<div id="lr-caption" class="col-xs-12">
		<?php the_content(); ?>
	</div>

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div id="lr-thumbnails" class="col-md-4 col-xs-6">
				<a class="lr-overlay-frame lr-thumbnail" rel="<?php the_ID(); ?>" href="<?php the_permalink(); ?>">
					<?php $images = lr_get_images(get_the_ID(), LATEST, SINGLE); ?>
					<?php lr_one_image($images[LATEST], 'thumbnail', 'lr-column'); ?>
				</a>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
</section>

<?php get_footer(); ?>