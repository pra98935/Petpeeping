<?php
/**
 * Popular post
 */

function dpc_popular_post_shortcode_func( $atts ) {
	$atts = shortcode_atts( array(
		'posts_per_page' => 'no foo',
		'order' 		=> 'DESC',
		'class' 		=> ''
	), $atts, 'dpc_popular_post_shortcode' );

	$post_counts = get_post_meta( '', 'dev_post_visits_count_meta', true );

	$args = array(
		'post_type' 		=> dev_get_post_types('exclude'),
		'posts_per_page' 	=> $atts['posts_per_page'],
		'meta_key'			=> 'dev_post_visits_count_meta',
		'orderby'			=> 'meta_value_num',
		'order'				=> 'DESC'
	);
	
	$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ) {
		?><ul class="<?php echo $atts['class']; ?>"><?php
			while ( $the_query->have_posts() ) : $the_query->the_post();
				?>
				<li class="list_item clearfix">
					<div class="list_img_left"><img src="<?php the_post_thumbnail_url('thumbnail'); ?>" class="img-responsive"></div>
					<div class="list_content">
						<p class="post_date"><?php echo get_the_date(); ?></p>
						<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
					</div>
				</li>
				<?php
			endwhile;
		?></ul><?php
	} // end if
}
// [dpc_popular_post_shortcode posts_per_page=10 order=DESC class=classname]
add_shortcode( 'dpc_popular_post_shortcode', 'dpc_popular_post_shortcode_func' );


// get all popular post data

function dpc_get_popular_post_data( $posts_per_page='10' , $order='DESC' ){

	$args = array(
		'post_type' 		=> dev_get_post_types('exclude'),
		'posts_per_page' 	=> $posts_per_page,
		'meta_key'			=> 'dev_post_visits_count_meta',
		'orderby'			=> 'meta_value_num',
		'order'				=> $order
	);
	
	$the_query = new WP_Query( $args );
	return $the_query;
}