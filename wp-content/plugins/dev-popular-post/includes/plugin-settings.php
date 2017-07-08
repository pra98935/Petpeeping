<?php 
/**
 * Plugin Settings functions
 */


/**
 * Add Setting For Plugin
 */
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'dev_add_action_links' );

function dev_add_action_links ( $links ) {
	$mylinks = array('<a href="' . admin_url( 'options-general.php?page=dev_popular_post_setting' ) . '">Settings</a>',);
return array_merge( $links, $mylinks );
}

/*
 * Add Setting Submenu under Setting Menu
 */
add_action( 'admin_menu', 'dev_plugin_setting_submenu' );
function dev_plugin_setting_submenu() {
	add_options_page( 'Popular Post Setting','Popular Post Settings','manage_options','dev_popular_post_setting','dev_plugin_setting_page');
}

function dev_plugin_setting_page(){

	// Process of Save data in options table

	$get_post_array = $reseted_plugin_data = '';
	if (isset($_POST['dev_submit_btn']) && $_POST['dev_submit_btn'] ) {

		foreach (dev_get_post_types() as $post_types) {
			$get_post_array[] = array(
				'dev_post_type_'.$post_types => (isset($_POST['dev_post_type_'.$post_types])) ? $_POST['dev_post_type_'.$post_types] : '',
			);
		}
		$get_post_select_data = call_user_func_array('array_merge', $get_post_array);
		// Plugin Options data
		$plugin_options = array(
			'dev_hide_dashboard_widget' => (isset($_POST['dev_hide_dashboard_widget'])) ? $_POST['dev_hide_dashboard_widget'] : '',
			'dev_post_count_title' 		=> isset($_POST['dev_post_count_title']) ? $_POST['dev_post_count_title'] : '',
			'dev_post_visits_option'	=> isset($_POST['dev_post_visits_option']) ? $_POST['dev_post_visits_option'] : '',
		);

		$plugin_options_data = array_merge($get_post_select_data,$plugin_options);
		// Update Theme Options
		update_option( 'dev_plugin_options', $plugin_options_data, '', 'yes' );

		$reseted_plugin_data = '<p>Data Saved!</p>';

	} // End process of save data

	/**
	 * Reset All Plugin Data
	 */
	
	if (isset($_POST['dev_reset_options']) && $_POST['dev_reset_options'] ) {
		delete_post_meta_by_key( 'dev_post_visits_count_meta' );
		delete_option('dev_plugin_options');

		$reseted_plugin_data = '<p>Restored Defaults Data</p>';

	}
	
	?>
		<div class="wrap">
			<h1>Settings</h1>

			<div class="widefat">
				<?php if ($reseted_plugin_data) { ?>
					<!-- Update Notificatiion -->
					<div id="message" class="updated notice notice-success is-dismissible">
						<?php echo $reseted_plugin_data; ?>
						<button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
					</div>
				<?php } ?>

				<form class="dev_setting_form" method="post" action="">

					<?php settings_fields( 'dev_plugin_options_group' ); ?>
					<?php do_settings_sections( 'dev_plugin_options_group' ); ?>

					<table class="widefat striped">
						<tbody>
							<tr><td class="row-title">Exclude Post Types</td></tr>
							
							<?php
								foreach (dev_get_post_types() as $post_type) {

									global $wp_post_types;
									$obj = $wp_post_types[$post_type];
									$post_name = $obj->labels->singular_name; 

									if(dev_get_theme_options('dev_post_type_'.$post_type) == 'on') :
										?>
									<tr>
										<th scope="row"><label><?php echo $post_name; ?></label></th>
										<td><input type="checkbox" class="regular-text" name="dev_post_type_<?php echo $post_type; ?>" checked></td>
									</tr>
									<?php else : ?>
									<tr>
										<th scope="row"><label><?php echo $post_name; ?></label></th>
										<td><input type="checkbox" class="regular-text" name="dev_post_type_<?php echo $post_type; ?>"></td>
									</tr>
									<?php endif;
								}
							?>
							
							<tr><td class="row-title">Others Options</td></tr>

							<tr>
								<th scope="row"><label>Count Options</label></th>
								<?php 
									$visits_option =  dev_get_theme_options('dev_post_visits_option');
									$only_visitor_count = ($visits_option == 'only_visitor_count') ? 'selected': '';
									$all_visits_count = ($visits_option == 'all_visits_count') ? 'selected': '';
								?>
								<td>
									<select name="dev_post_visits_option">
										<option value="only_visitor_count" <?php echo $only_visitor_count; ?>>Only Single Visitor Count</option>
										<option value="all_visits_count" <?php echo $all_visits_count; ?>>All Visits Count</option>
									</select>
								</td>
							</tr>

							<tr>
								<th scope="row"><label>Hide Dashboard Widgets</label></th>
								<td>
									<?php if (dev_get_theme_options('dev_hide_dashboard_widget') == 'on') { ?>
										<input type="checkbox" name="dev_hide_dashboard_widget" checked>
									<?php }else{ ?>
										<input type="checkbox" name="dev_hide_dashboard_widget">
									<?php } ?>
								</td>
							</tr>

							<tr>
								<th scope="row"><label>Change Title</label></th>
								<?php $count_title =  (dev_get_theme_options('dev_post_count_title')) ? dev_get_theme_options('dev_post_count_title'): 'Hits';?>
								<td><input type="text" name="dev_post_count_title" value="<?php echo $count_title; ?>"></td>
							</tr>

							<tr class="submit">
								<td>
									<input type="submit" name="dev_submit_btn" id="submit" class="button button-primary" value="Save Changes" />
									<input type="submit" name="dev_reset_options" class="dev_popular_post_reset_btn button button-primary" value="Reset Plugin Data" />
								</td>
							</tr>

						</tbody>

					</table>

				</form>
			</div>

		</div>


	<?php

	if ( is_admin() ){ // admin actions
		add_action( 'admin_init', 'register_dev_settings' );
	}
	function register_dev_settings() { // whitelist options
		register_setting( 'dev_plugin_options_group', 'dev_plugin_options' );
	}
		
} // End dev_plugin_setting_page() functions