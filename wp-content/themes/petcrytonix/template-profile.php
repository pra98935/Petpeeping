<?php
/**
 * Template Name:portfolio
 */

get_header(); ?>

<div class="wrap pet-profile">
	<div id="primary" class="content-area 123">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

			<div class="pet-profile-banner">
				<div class="banner-image" style="">
				</div>
			</div>

			<div class="white-strip">
				<div class="inr container">
					<div class="row">
						
						<div class="col-md-6 ws-left">
							<div class="img">
								<img src="<?php echo bloginfo('template_directory'); ?>/assets/images/cat.png" width="150" height="150">
								<div class="view">
									<span></span><span>1023</span>
								</div>
							</div>
							<div class="short-info">
								<h1>Eris</h1>
								<div class="bread">germen</div>
								<div class="gen-age"><span>Age:3</span> <span>Gender:F</span></div>
							</div>
						</div>
						<div class="col-md-6 ws-right">
							<div class="owner-info">
								<div class="owner-info-left">
									<div class="top"><span class="name">Briana hansen</span>  <span>( Owner )</span></div>
									<div class="bottom"><span>Member Since</span> : <span>5/18/2017</span></div>
								</div>
								
								<div class="owner-info-right">
									<div><img src="<?php echo bloginfo('template_directory'); ?>/assets/images/dog.png" width="75" height="75"></div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

			<div class="profile-box-container">
				<div class="inr container">
					<div class="row">
						<div class="left-side">
							<div class="about-pet">
								<h2>About</h2>
								<ul>
									<li><span>color</span> <span>black</span></li>
									<li><span>breed</span> <span>german</span></li>
									<li><span>weight</span> <span>german</span></li>
									<li><span>height</span> <span>german</span></li>
									<li><span>medical issue</span> <span>no</span></li>
								</ul>
							</div>

							<div class="about-pet-photo">
								<h2>Photo</h2>
								<ul>
									<li><a href="#"><img src="<?php echo bloginfo('template_directory') ?>/assets/images/dog.png" width="143" height="143"></a></li>
									<li><a href="#"><img src="<?php echo bloginfo('template_directory') ?>/assets/images/dog.png" width="143" height="143"></a></li>
									<li><a href="#"><img src="<?php echo bloginfo('template_directory') ?>/assets/images/dog.png" width="143" height="143"></a></li>
									<li><a href="#"><img src="<?php echo bloginfo('template_directory') ?>/assets/images/dog.png" width="143" height="143"></a></li>
								</ul>
							</div>
						</div>
						<div class="right-side">
							<div class="comment-post">
								<div class="top">
									<img src="<?php echo bloginfo('template_directory'); ?>/assets/images/dog.png" width="50" height="50">
									<div class="info">
										<div class="name">admin</div>
										<div class="date">22 Apr 2017</div>
									</div>
								</div>
								<div class="bottom">
									<div class="content"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p></div>
									<div class="media">
										<img src="<?php echo bloginfo('template_directory'); ?>/assets/images/cute-pet-dog.jpg" width="700" width="350">
									</div>
								</div>
							</div>
							
							<div class="comment-post">
								<div class="top">
									<img src="<?php echo bloginfo('template_directory'); ?>/assets/images/dog.png" width="50" height="50">
									<div class="info">
										<div class="name">admin</div>
										<div class="date">22 Apr 2017</div>
									</div>
								</div>
								<div class="bottom">
									<div class="content"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p></div>
									<div class="media">
										<img src="<?php echo bloginfo('template_directory'); ?>/assets/images/cute-pet-dog.jpg" width="700" width="350">
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>
			</div>

			<?php endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
