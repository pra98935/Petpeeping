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

get_header();

$queried_object = get_queried_object();

$term_id = $queried_object->term_id;
$cat_image = DCI_get_category_images($term_id, 'url', '');

?>

<div class="row container-section box-profile">
	<div class="col-md-12">
		<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="taxonomy-description">', '</div>' );
		?>
	</div>


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


</div><!-- .wrap -->

<?php get_footer();
