<?php // Le Raclet FOOTER template : Opabinia75, opabinia@opabinia.de, v1 07/14 ?>

		<?php if (!is_page(CONTACT) && !is_page(KONTAKT)) : ?>
		
		<footer class="row lr-small" id="contact">
			<div class="col-xs-6 col-sm-4 lr-overlay-frame">
				<img class="img-responsive hidden-xs" src="<?php echo content_url() . '/uploads/footer_left_sq.png'; ?>" alt="...">
				<div class="lr-overlay-info">
					<?php echo lr_get_content(FOOTER_LEFT); ?>
				</div>
			</div>
			<nav class="col-xs-6 col-sm-4 hidden-xs">
				<img class="img-responsive " src="<?php echo content_url() . '/uploads/footer_center_sq.png'; ?>" alt="...">
				<div class="lr-overlay-info" id="lr-footer-menu">
					<ul class="nav nav-stacked">
						<?php lr_main_menu(); ?>
					</ul>
				</div>
			</nav>
			<div class="col-xs-6 col-sm-4">
				<img class="img-responsive hidden-xs" src="<?php echo content_url() . '/uploads/footer_right_sq.png'; ?>" alt="...">
				<div class="lr-overlay-info">
					<?php echo lr_get_content(FOOTER_RIGHT); ?>
				</div>
			</div>
			<div class="clearfix visible-xs-block"></div>
		</footer>

		<?php endif; ?>
		
	</body>

	<?php wp_footer(); ?>
	
</html>
