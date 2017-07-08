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


<div class="row container-section box-profile">
	<div class="col-md-12"><h1>All Pet Profile</h1></div>
		
	<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		
		<div class="col-md-4 text-center">
			<div class="cat-image-box">
				
				<img src="<?php the_post_thumbnail_url(); ?>" width="360" height="274">
				
				<div class="cat-title-desc">	
					<a href="<?php the_permalink(); ?>">
						<div class="cat-title">
							<?php the_title(); ?>
						</div>
					</a>
					
					<div class="cat-desc">
						<?php
						$content = get_the_content();
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

	<?php endwhile; ?>
	<?php endif; ?>

</div>


<?php get_footer();