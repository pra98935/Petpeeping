<?php
/**
 * Template Name: Login Page
 *
 */

get_header(); ?>

<div class="login-form-container">
	
	
	
	<form id="login-form" action="" method="post">
		<div class="login-form-error"><?php echo dcrf_get_error_messages('login_user'); ?></div>
		<div class="form-group">
			<input type="text" name="user_name" class="form-control" placeholder="Username" required>
		</div>
		<div class="form-group">
			<input type="password" name="user_pass" class="form-control" placeholder="Password" required>
		</div>
		<!-- <div class="form-group text-center">
			<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
			<label for="remember"> Remember Me</label>
		</div> -->
		<div class="form-group">
			<div class="row">
				<div class="col-sm-12">
					<input type="submit" name="login_submit" class="form-control btn btn-login" value="Log In">
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-lg-12">
					<div class="">
						<a href="<?php echo site_url('wp-login.php?action=lostpassword'); ?>" tabindex="5" class="forgot-password">Forgot Password?</a>
					</div>
				</div>
			</div>
		</div>
	</form>

	 <?php do_action( 'wordpress_social_login' ); ?>


</div><!-- .wrap -->

<?php get_footer();
