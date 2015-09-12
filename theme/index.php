<?php // Le Raclet HOMEPAGE template : Opabinia75, opabinia@opabinia.de, v1 07/14 ?>

<?php get_header(); ?>

<?php if (!have_posts()) : lr_backup_query(); endif; ?>

<section class="row">
	<div class="col-xs-12">
		<h1><?php pll_e('Latest News'); ?></h1>
	</div>

	<div id="lr-carousel" class="col-xs-12 carousel slide" data-ride="carousel">
		<section class="carousel-inner">
			<?php if ( have_posts() ) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<article class="item <?php lr_toggle($wp_query->current_post); ?>">
						<a href="<?php lr_category_link($id) ?>">
							<?php $images = lr_get_images($id, LATEST, SINGLE); ?>
							<?php lr_one_image($images[LATEST], 'full', VISIBLE); ?>
						</a>
						<div class="carousel-caption lr-overlay-stripe hidden-xs">
							<h2><?php the_title(); ?></h2>
						</div>
					</article>
				<?php endwhile; ?>
			<?php endif; ?>
		</section>
		<?php lr_carousel_parts($posts); ?>
	</div>
</section>

<nav class="row ">
	<?php lr_thumbnail_menu(); ?>
</nav>

<?php get_footer(); ?>