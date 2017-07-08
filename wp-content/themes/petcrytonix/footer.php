<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */



if (is_front_page() || is_singular('pet_profiles')) { ?>
	
<?php }else{ ?>
	</div>
		</div>
			</div>
<?php  } ?>
		
</div> <!-- page inner -->
	</div> <!-- page outer -->	

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="inr footer-inner container">	
			<div class="row">
				<div class="col-md-12">	
					<div class="text-center logo-ftr"><img src="<?php echo dmof_get_options_data('opt_footer_logo','url'); ?>" /></div>
					<?php dynamic_sidebar('footer-sidebar'); ?>

					<!-- Footer Copyright -->

					<div class="footer-copy"><?php echo dmof_get_options_data('opt_footer_copyright_text'); ?></div>
				</div>	
			</div><!-- .wrap -->
		</div>	
	</footer><!-- #colophon -->

	
	<script>
		jQuery('documemt').ready(function(){
			jQuery(".close-menu").click(function(){
				jQuery(this).parent(".navigation-box").removeClass("mobile-menu");
				jQuery(this).parent(".navigation-box").addClass("mobile-menu-hide");
			});

			jQuery(".hamburger-menu").click(function(){
				jQuery(this).closest("#masthead").find(".navigation-box").removeClass("mobile-menu-hide");
				jQuery(this).closest("#masthead").find(".navigation-box").addClass("mobile-menu");
			});

			// Add Place Holder 
			//if(!jQuery('#es_txt_email').val()) { 
			    jQuery('#es_txt_email').attr("placeholder", "Email");
			//}
		});
	</script>

	<style type="text/css">

		.es_button .es_textbox_button.es_submit_button {
		  border:1px solid #fff;
		  color: white;
		  padding: 10px 0;
		  width: 100%;
		  background-color: #4A4A4A;
		}
		.es_button .es_textbox_button.es_submit_button:hover {
		  background-color: #6c412e;
		  border: 1px solid #ccc;
		  cursor: pointer;
		}

		.es_textbox .es_textbox_class {
		  background-color: #fff;
		  padding: 10px 5px;
		  width: 100%;
		}
		.es_caption {
		  color: #ccc;
		  font-size: 14px;
		}
		footer .es_button {
		  padding-top: 0;
		}
		footer .widget .es_lablebox {
		  display: none;
		}
		#recent-posts-3 li {
		  padding: 4px 2px 4px 2px;
		}
		footer .widget .recent_post-img {
		  float: left;
		}
		footer .widget .recent_post-content {
		  padding-left: 60px;
		}
		#recent-posts-3 .date{
		    color: #ccc;
		    font-size: 14px;
		}
		footer .recent_post-content > a {
		  font-size: 16px !important;
		}
		#recent-posts-3 {
		  padding-right: 5px;
		}


	</style>

<?php wp_footer(); ?>

</div>	

</body>
</html>