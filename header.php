<?php // Le Raclet HEADER template : Opabinia75, opabinia@opabinia.de, v1 07/14 ?>

<!DOCTYPE html>
<html>

	<head>
		<title><?php bloginfo('name'); wp_title('|'); ?></title>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php lr_blog_title(); ?>">
		<meta name="author" content="Opabinia75">

		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">
		<link rel="shortcut icon" href="<?php echo FAVICON; ?>" />
	
		<?php wp_head(); ?>
	</head>
	
	<body class="container">
	
		<nav class="row navbar navbar-reverse" role="navigation">
			<div class="col-xs-12">
				<a id="lr-logo" class="hidden-xs" href="<?php echo get_home_url(); ?>">
					<img src="<?php echo LOGO; ?>" alt="<?php echo lr_blog_title(); ?>" title="<?php lr_blog_title(); ?>">
				</a>						

				<div class="navbar-header">
					<button type="button" class="navbar-toggle lr-left" data-toggle="collapse" data-target="#lr-header-menu">
						<a href="<?php echo get_home_url(); ?>"><?php bloginfo('name'); ?></a>
						<span class="caret"></span>
					</button>
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#lr-language-menu">
						<span>Lang</span>
						<span class="caret"></span>
					</button>			
				</div>

				<div class="collapse navbar-collapse navbar-left" id="lr-header-menu">
					<ul class="nav nav-stacked">
						<?php lr_main_menu(); ?>
					</ul>
				</div>

				<div class="collapse navbar-collapse navbar-right" id="lr-language-menu">
					<ul class="nav nav-pills nav-justified">
						<?php lr_language_menu(); ?>
					</ul>
				</div>
			</div>
		</nav>