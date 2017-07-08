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

<div class="row container-section">
	<div class="col-md-8">

		<?php while ( have_posts() ) : the_post(); ?>
			
				<div class="title">
					<h1><?php the_title(); ?></h1>
					<div class="single-post-meta"><span>Posted By : <?php echo get_the_author(); ?></span> | <span>Date : <?php echo get_the_date(); ?></span></div>	
				</div>	
				<div class="img"><img src="<?php the_post_thumbnail_url(); ?>"></div>
				<div class="content">
					<?php the_content(); ?>
				</div>
				<div class="below-sec">
					<?php $user_email = get_the_author_meta('email'); ?>
					<!-- <div class="below-sec-img"><img src="<?php echo get_avatar_url($user_email); ?>" width="46px" height="46px"></div>
					<div class="below-sec-content">	
						<div class="title"><?php echo get_the_author(); ?></div>
						<div class="date"><?php echo get_the_date(); ?></div>
					</div>	 -->						
				</div>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				// the_post_navigation( array(
				// 	'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'twentyseventeen' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
				// 	'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'twentyseventeen' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
				// ) );

			endwhile; // End of the loop.
			?>
	</div>

	<div class="col-md-4">
		<?php dynamic_sidebar( 'single-post-sidebar' ); ?>
	</div>
</div><!-- .wrap -->

<?php get_footer();
