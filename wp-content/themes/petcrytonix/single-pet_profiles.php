<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap pet-profile">
	<div id="primary" class="content-area 123">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
			<?php global $post; $post_slug = $post->post_name; ?>

			<div class="pet-profile-banner">
				<div class="banner-image" style="background-image: url(<?php echo dmb_get_attachment_data('dmb_pets_cover_image','','url','full'); ?>);">
				</div>
			</div>

			<div class="white-strip">
				<div class="inr container">
					<div class="row">
						
						<div class="col-md-6 ws-left">
							<div class="img">
								
								<a class="example-image-link" href="<?php the_post_thumbnail_url('full') ?>" data-lightbox="<?php echo $post_slug; ?>"><img class="example-image" src="<?php the_post_thumbnail_url('','thumbnail'); ?>" width="150" height="150" alt="<?php the_title(); ?>" /></a>

								<div class="view">
									<span></span><span><?php echo dmb_get_post_meta('dev_post_visits_count_meta'); ?></span>
								</div>
							</div>
							<div class="short-info">
								<h1><?php the_title(); ?></h1>
								<div class="bread"><?php echo dmb_get_post_meta('dmb_pets_breed'); ?></div>
								<div class="gen-age"><span>Age: <?php echo dmb_get_post_meta('dmb_pets_age'); ?></span> <span> Gender: <?php echo dmb_get_post_meta('dmb_pets_gender'); ?></span></div>
							</div>
						</div>
						<div class="col-md-6 ws-right">
							<div class="owner-info">
								<div class="owner-info-left">
									<?php $user_email = get_the_author_meta('email'); ?>
									<div class="top"><span class="name"><?php echo get_the_author(); ?></span>  <span>( Owner )</span></div>
									<div class="bottom"><span>Member Since</span> : <span><?php echo date('d/m/Y',strtotime(get_the_author_meta('user_registered'))); ?></span></div>
								</div>
								
								<div class="owner-info-right">
									<div><img src="<?php echo get_avatar_url($user_email); ?>" width="75" height="75"></div>
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
									<li><span>color</span> <span><?php echo dmb_get_post_meta('dmb_pets_color'); ?></span></li>
									<li><span>breed</span> <span><?php echo dmb_get_post_meta('dmb_pets_breed'); ?></span></li>
									<li><span>weight</span> <span><?php echo dmb_get_post_meta('dmb_pets_weight'); ?></span></li>
									<li><span>height</span> <span><?php echo dmb_get_post_meta('dmb_pets_height'); ?></span></li>
									<li><span>medical issue</span> <span><?php echo dmb_get_post_meta('dmb_pets_medical_issue'); ?></span></li>
								</ul>
							</div>

							<div class="about-pet-photo">
								<h2>Photo</h2>
								<ul>
									<?php 
									$galleries = dmb_get_multiple_images('dmb_pets_image_gallery','','full','url');
									if ($galleries) {
										foreach ($galleries as $key => $gallery) {
											?><li><a class="example-image-link" href="<?php echo $gallery; ?>" data-lightbox="<?php echo $post_slug; ?>"><img class="example-image" src="<?php echo $gallery; ?>" width="143" height="143" alt="<?php the_title(); ?>" /></a></li><?php
										}
									}
									?>
								</ul>
							</div>
						</div>
						<div class="right-side">
							
							<?php // If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;
 							?>

							<!-- <div class="comment-post">
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
						</div>	 -->
					</div>
				</div>
			</div>

			<?php endwhile; // End of the loop.

			// // If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// 	comments_template();
			// endif;

			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();