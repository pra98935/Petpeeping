<?php 
/**
 * Template Name: My Pet Profiles
 */
get_header();

if(is_user_logged_in()) :

	?>
	<h1 class="text-center">My Pet Profiles</h1>

		<?php 
			$post_args = array( 
				'post_type' 	 	=>'pet_profiles',
				'posts_per_page' 	=> -1,
				'author'			=> get_current_user_id()
			);

			$the_query = new WP_Query( $post_args );
			if ( $the_query->have_posts() ) :
			
				?>

				<div class="box3 profile-home homebox ">
					<div class="inr container">
						<div class="row">
							
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<?php global $post; $post_id = $post->ID; ?>

								<div id="pet_id_<?php echo $post_id; ?>"class="col-md-4">
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

									<a href="<?php echo esc_url( add_query_arg( 'edit_profiles', base64_encode($post_id), site_url('/create-pet-profile/') ) ); ?>" class="btn btn-default">Edit</a>
	                                <a href="javascript:void(0)" data-post-id="<?php echo $post_id; ?>" class="delete_a_pet_profile btn btn-default">Delete</a>
								</div>
							
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						</div>
					</div>
				</div>

			<?php else: ?>
				<div class="alert alert-warning">
					You still do not created any pet profile.
				</div>
			<?php endif; ?>







	<script type="text/javascript">
		/* delete Post process */
	jQuery(document).ready(function(){
	    jQuery('.delete_a_pet_profile').on('click', function(){

	        var delete_post_id = jQuery(this).attr('data-post-id');
	        var retVal = confirm("Do you want to DELETE this profile ?");
	        if( retVal == false ){
	            return false;
	        }
	        jQuery.ajax({
	            type : "POST",
	            url  : pet_ajax_object.ajax_url,
	            data : {
	                action : 'delete_my_pet_profiles_process',
	                delete_post_id : delete_post_id,
	            },
	            dataType: "json",
	            success: function(data){
	                if (data.type == 'delete_sucess') {
	                    jQuery('.reg_form_message').html(data.msg);
	                    jQuery('#pet_id_'+delete_post_id).fadeOut();
	                }
	            }
	        })
	    });
	});
	</script>




<?php else: ?>
	<?php require get_404_template(); ?>
<?php endif; ?>

<?php get_footer(); ?>