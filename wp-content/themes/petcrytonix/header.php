<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
 <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">

<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/new-style.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/responsive-style.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/lightbox.min.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="page-main">

	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyseventeen' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<?php
			if(wp_is_mobile()){ ?>
				<div class="navigation-box mobile-menu-hide">
					<img src="https://cdn2.iconfinder.com/data/icons/playstation-controller-buttons-3/64/playstation-flat-icon-cross-128.png" class="close-menu" width="35" height="35">
					<div class="navigation-top">
						
						<?php if ( has_nav_menu( 'top' ) ) : ?>
							
								
									<div class="wrap">
										<?php wp_nav_menu( array(
											'theme_location' => 'top',
											'menu_id'        => 'top-menu',
										) ); ?>
									</div><!-- .wrap -->
								
								
						<?php endif; ?>
					</div><!-- .navigation-top -->
				</div>
			<?php } 
		?>
		
		<!--<div class="topbar">
			<div class="inr container">
				<div class="row">
					<div class="col-md-6 top-left-link">
						<ul>
							<?php if(!is_user_logged_in()) : ?>
								<li><a href="<?php echo site_url('/login/'); ?>">Login</a></li>
								<li><a href="<?php echo site_url('register'); ?>">Register</a></li>
							
							<?php else: ?>
								<li><a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a></li>
								<li><a href="<?php echo bp_loggedin_user_domain(); ?>">Profile</a></li>
							<?php endif; ?>
						</ul>
					</div>
					<div class="col-md-6 top-right-search">
						<?php echo get_search_form(); ?>
					</div>
				</div>
			</div>	
		</div>	-->

		<div class="nav-outer">
			<div class="inr head-inner container">
				<div class="row">
					<div class="col-md-3 logo">
						<a href="<?php echo site_url(); ?>"><img src="<?php echo dmof_get_options_data('opt_main_logo','url'); ?>"></a>
					</div>

					<?php
						if(wp_is_mobile()){ ?>
							<div class="col-md-12 text-center">
								<img src="https://cdn4.iconfinder.com/data/icons/tupix-1/30/list-256.png" width="45" height="45" class="hamburger-menu">
							</div>	
						<?php }
					?>

					<div class="col-md-9 navigation-box desktop-menu">	
						<?php if ( has_nav_menu( 'top' ) ) : ?>
							<div class="navigation-top">
								<div class="wrap">
									<?php wp_nav_menu( array(
										'theme_location' => 'top',
										'menu_id'        => 'top-menu',
									) ); ?>
								</div><!-- .wrap -->
							</div><!-- .navigation-top -->
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>	
	</header><!-- #masthead -->

	<?php if (is_front_page()) : ?>

		<div class="home-banner 123">
			<div class="banner-image" style="background-image: url(<?php echo dmb_get_attachment_data('page_meta_banner_image','','url','full'); ?>);">
				<div class="inr container">
					<div class="row">
						<div class="col-md-4"><?php echo dmb_get_post_meta('page_meta_banner_content'); ?>
							<!-- <div class="line1">welcome to</div>
							<div class="line2">pets fan</div>
							<div class="line3">this is a large social network for pet lovers</div>
							<div class="line4"><a href="#"><img src="<?php bloginfo('template_directory') ?>/assets/images/joinnow-.png"></a></div> -->
						</div>
					</div>
				</div>
			</div>
		</div>

	<?php endif; ?>

	<div class="page-outer">
		<div class="page-inner">


			<?php 

			if (is_front_page() || is_singular('pet_profiles')) {
				?>
				
				<?php
			}else{ ?>
				<div class="container inr">
					<div class="row">
						<div class="col-md-12">
			<?php }

			 ?>