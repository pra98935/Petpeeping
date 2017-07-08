<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

	




<div class="row container-section">
	<div class="col-md-8">
		

		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->
		<?php endif; ?>


		<?php
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>
				<div class="blog-box">
					<div class="blog-img">
						<?php the_post_thumbnail('medium'); ?>
					</div>
					<div class="">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="blog-meta">Posted By : <?php echo get_the_author(); ?></div>
						<div class="blog-short-desc">
							<?php 
								$get_content = get_the_content(); 
								echo substr($get_content, '0', '250');
							?>
						</div>
						<div class="readmore"><a href="<?php the_permalink(); ?>">Read More</a></div>
					</div>
					
				</div>	

			<?php endwhile;

			the_posts_pagination( array(
				'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
			) );

		else :
			echo 'No Post Found';
		endif;
		?>
	</div>

	<div class="col-md-4">
		<?php dynamic_sidebar('blog-sidebar'); ?>
	</div>
</div><!-- .wrap -->

<?php get_footer();
