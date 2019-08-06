<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<meta name="description" content="<?php bloginfo( 'description '); ?>" />
	<meta name="author" content="<?php bloginfo( 'name' ); ?>" />
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

	<script defer src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="social-bar" class="pr-sm-5">
		<?php
		$start_date = carbon_get_theme_option( 'crb_event_start' );
		if($start_date): ?>
			<div class="float-left d-none d-sm-block ml-sm-3 ml-md-5" style="color: white;"><?php echo date("l, F jS, Y", strtotime($start_date)); ?></div>
		<?php endif; ?>

		<?php 
		$fb_url = carbon_get_theme_option( 'crb_social_url_facebook' );
		$ig_url = carbon_get_theme_option( 'crb_social_url_instagram' );
		$tw_url = carbon_get_theme_option( 'crb_social_url_twitter' );
		$info_email = carbon_get_theme_option( 'crb_info_email' );

		if(!empty($fb_url)) { echo '<a href="' . $fb_url . '" target="_blank"><i class="fab fa-facebook-square"></i></a>'; }
		if(!empty($ig_url)) { echo '<a href="' . $ig_url . '" target="_blank"><i class="fab fa-instagram"></i></a>'; }
		if(!empty($tw_url)) { echo '<a href="' . $tw_url . '" target="_blank"><i class="fab fa-twitter-square"></i></a>'; }
		if(!empty($info_email)) { echo '<a href="mailto:' . $info_email . '"><i class="far fa-envelope"></i></a>'; }
		?>
	</div>

	<div id="registration-bar">
		<a href="/registration/attendee" style="color: white; font-weight: bold;" class="btn btn-link col">
			Click here to Register Now!
		</a>
	</div>

	<header class="sticky-top bottom-shadow">
		<nav class="navbar navbar-expand-md bg-light navbar-light">
			<a class="navbar-brand ml-md-5" href="<?php echo home_url(); ?>"><img src="<?php echo bloginfo('template_url') . '/assets/img/logo.png'; ?>" /></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
				<?php
				wp_nav_menu( array(
					'theme_location'  => 'kc-header-menu',
					'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
					'container'       => 'div',
					'container_class' => 'collapse navbar-collapse',
					'container_id'    => 'navbarCollapse',
					'menu_class'      => 'navbar-nav mr-4 ml-auto',
					'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
					'walker'          => new WP_Bootstrap_Navwalker(),
				) );
				?>
		</nav>
	</header>

	<main role="main">