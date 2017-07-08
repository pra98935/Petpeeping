<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap homepage">
	<div id="primary" class="content-area 123">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

			<div class="box1 features homebox ">
				<div class="inr container">
					<div class="row">
						<div class="box-heading"><?php echo dmb_get_post_meta('page_meta_featured_content'); ?></div>
						<div class="col-md-3 text-center">
							<div class="feature-image"><?php echo dmb_get_attachment_data('page_meta_featured_image1','','img','thumbnail'); ?></div>
							<div class="feature-title"><?php echo dmb_get_post_meta('page_meta_featured_title1'); ?></div>
							<div class="feature-text"><?php echo dmb_get_post_meta('page_meta_featured_content1'); ?></div>
						</div>
						<div class="col-md-3 text-center">
							<div class="feature-image"><?php echo dmb_get_attachment_data('page_meta_featured_image2','','img','thumbnail'); ?></div>
							<div class="feature-title"><?php echo dmb_get_post_meta('page_meta_featured_title2'); ?></div>
							<div class="feature-text"><?php echo dmb_get_post_meta('page_meta_featured_content2'); ?></div>
						</div>
						<div class="col-md-3 text-center">
							<div class="feature-image"><?php echo dmb_get_attachment_data('page_meta_featured_image3','','img','thumbnail'); ?></div>
							<div class="feature-title"><?php echo dmb_get_post_meta('page_meta_featured_title3'); ?></div>
							<div class="feature-text"><?php echo dmb_get_post_meta('page_meta_featured_content3'); ?></div>
						</div>
						<div class="col-md-3 text-center">
							<div class="feature-image"><?php echo dmb_get_attachment_data('page_meta_featured_image4','','img','thumbnail'); ?></div>
							<div class="feature-title"><?php echo dmb_get_post_meta('page_meta_featured_title4'); ?></div>
							<div class="feature-text"><?php echo dmb_get_post_meta('page_meta_featured_content4'); ?></div>
						</div>

					</div>
				</div>
			</div>

		<?php endwhile; ?>

		<?php 

			$categories = get_terms( 'pet_profiles_cat', array(
			    'hide_empty' => 0
			) );
			
			if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) :
			
		?>
			<div class="box2 features homebox ">
				<div class="inr container">
					<div class="row">
						<div class="box-heading"><h2>our category</h2></div>
							
						<?php foreach ( $categories as $term ) : ?>
							
							<div class="col-md-4 text-center">
								<div class="cat-image-box">
									<?php $cat_image = DCI_get_category_images($term->term_id, 'url', 'large'); ?>
									<?php if(!empty($cat_image)) : ?>
										<img src="<?php echo $cat_image; ?>" width="360" height="274">
									<?php endif; ?>
									<div class="cat-title-desc">	
										<a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><div class="cat-title"><?php echo $term->name; ?></div></a>
										<div class="cat-desc">
											<?php
											$content = $term->description;
											$length = strlen($content);
											if ($length > 100) {
												$content = substr($content, 1, 100) . '...';
											}
											echo $content;
											?>
										</div>
									</div>
								</div>
							</div>

						<?php endforeach; ?>

					</div>
				</div>
			</div>

		<?php endif; ?>

		<?php 
		$post_args = array( 
			'post_type' 	 	=>'pet_profiles',
			'posts_per_page' 	=> 3,
			'meta_key'			=> 'dev_post_visits_count_meta',
			'orderby'			=> 'meta_value_num',	
			'date_query'    	=> array(
			 	'column'  => 'post_date',
			 	'after'   => '- 30 days'
			)
		);

		$the_query = new WP_Query( $post_args );
		if ( $the_query->have_posts() ) :
		
			?>

			<div class="box3 profile-home homebox ">
				<div class="inr container">
					<div class="row">
						<div class="box-heading"><h2>popular profile</h2></div>
						
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

							<div class="col-md-4">
								<div class="img"><img src="<?php the_post_thumbnail_url(); ?>" width="360" height="239"></div>
								<div class="title"><?php the_title(); ?></div>
								<div class="date"><?php echo get_the_date(); ?><!-- 22 apr 2017 --></div>
								<div class="content">
									<?php
									$content = get_the_content();
									$length = strlen($content);
									if ($length > 125) {
										$content = substr($content, 1, 125) . '...';
									}
									echo $content;
									?>
								</div>
								<div class="readmore"><a href="<?php the_permalink(); ?>"><img src="<?php echo bloginfo('template_directory')?>/assets/images/redmore.png"></a></div>
							</div>
						
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>

					</div>
				</div>
			</div>

		<?php endif; ?>

		<?php 
			$post_args = array( 
				'post_type' 	 =>'post',
				'posts_per_page' => 4, 
			);

			$the_query = new WP_Query( $post_args );
			if ( $the_query->have_posts() ) :
				?>
				<div class="box4 latest-post homebox ">
					<div class="inr container">
						<div class="row">
							<div class="box-heading"><h2>recent post</h2></div>
							
								<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

									<div class="col-md-3">
										<div class="img"><img src="<?php the_post_thumbnail_url(); ?>" width="262" height="219"></div>
										<div class="content">
											<div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>	
											<?php 
											$content = get_the_content();
											$length = strlen($content);
											if ($length > 100) {
												$content = substr($content, 1, 100) . '...';
											}
											echo $content;
											?>
										</div>
										<div class="below-sec">
											<?php $user_email = get_the_author_meta('email'); ?>
											<div class="below-sec-img"><img src="<?php echo get_avatar_url($user_email); ?>" width="46px" height="46px"></div>
											<div class="below-sec-content">	
												<div class="title"><?php echo get_the_author(); ?></div>
												<div class="date"><?php echo get_the_date(); ?></div>
											</div>							
										</div>
									</div>

								<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
						</div>
					</div>
				</div>	

			<?php endif; ?>

			<div class="testimonial-box">
				<div class="inr container">
					<div class="row">	
						<div class="col-md-12">	
							<h2 class="text-center">Testimonial</h2>
							<?php echo do_shortcode('[tpsscode themes="theme1"]'); ?>
						</div>	
					</div>	
				</div>
			</div>

			
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
