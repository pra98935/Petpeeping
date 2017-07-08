<?php
/**
 * Theme options content
 */

class DMOF_Options_Fields_data{

	public $demo_array = array();

	public static function options_fields(){

		// get all the options array()
		$dmof_filter = apply_filters('add_dmof_options','options_data');

		$dmof_filter = (isset($dmof_filter['options'])) ? $dmof_filter['options'] : '';
		
		if (!is_array($dmof_filter)) return false;

		/**
		 * Include fields files
		 */

		$dir = DMOF_OPTIONS_DIR . '/inc/fields';
		$files = glob($dir . '/*.php');
		foreach ($files as $file) {
			require($file);   
		}

		/**
		 * Save theme options values
		 */

		if (isset($_POST['dmof_submit_options']) && $_POST['dmof_submit_options'] ) {
			
			foreach ($dmof_filter as $key => $value) {
				$fields = (isset($value['fields'])) ? $value['fields'] : '';
				foreach ($fields as $key => $value) {
					$id = (isset($value['id'])) ? $value['id'] : '';

					$demo_array[$id] = $_POST[$id];
				}
			}

	    	// Update Theme Options
			update_option( 'dmof_theme_options', $demo_array, '', 'yes' );

		} // End process of save data
		?>

		<!--  Content Start  -->

		<div class="wrap dmof_options_container">

			<?php $options_title = (isset($dmof_filter['settings']['page_title'])) ? $dmof_filter['settings']['page_title'] : 'Theme Options'; ?>
			
			<h1 class="wp-heading-inline"><?php _e( $options_title, 'dmof'); ?></h1>
			
			<div class="dmof_options_wrap">

				<div class="dmof_options_header">

				</div>


				<div id="dmof_options_tabs">

				<!-- Suffix Sidebar -->
				<div class="dmof_options_sidebar">
					<ul class="resp-tabs-list hor_1">
						<?php
						$i = 1;
						if (is_array($dmof_filter)) :
							foreach ($dmof_filter as $key => $value) {
								$id = (isset($value['id'])) ? $value['id'] : '';
								$title = (isset($value['title'])) ? $value['title'] : '';
								$icon = (isset($value['icon'])) ? $value['icon'] : 'dashicons-admin-generic';
								// if ($i == 1) {
								// 	//echo '<li class="">'.__( 'Theme Options','dmof').'</li>';	
								// 	echo '<li class="suf_sidebar_tab active" data-id="'.$id.'"><span class="dashicons '.$icon.'"></span>'.__($title,'dmof').'</li>';
								// }else{
									echo '<li class="suf_sidebar_tab" data-id="'.$id.'"><span class="dashicons '.$icon.'"></span>'.__($title,'dmof').'</li>';
								//}
								$i++;
							}
					  		// Import/export Section
							echo '<li class="suf_sidebar_tab" data-id="dmof_import_export_data"><span class="dashicons dashicons-controls-repeat"></span>'.__( 'Import/Export' ,'dmof').'</li>';
					  	endif; // is_array
					  	?>
					  </ul>
					</div>

					<!-- Suffix Content -->
					<div class="dmof_options_content">
						
						<div class="resp-tabs-container hor_1">

						<form id="dmof_theme_options_form" class="dwc_setting_form" method="post" action="">
							<?php settings_fields( 'dmof_theme_options_group' ); ?>
							<?php do_settings_sections( 'dmof_theme_options_group' ); ?>

							<!-- Save Options -->
							<div class="dmof_save_option">
								<input type="button" id="dmof_reset_all_options" class="button"value="Reset All" />
								<input type="submit" class="button" name="dmof_submit_options" value="Save Changes" />
							</div>

							<!-- Data Saved Message -->
							<div class="dmof_msg_notifi_sec" style="display:none;"><span class="dmof_save_options_msg"></span></div>


							<?php 
							if (is_array($dmof_filter)) {
								$i = 1;
								foreach ($dmof_filter as $key => $value) {
									$id 	= (isset($value['id'])) ? $value['id'] : '';
									$title 	= (isset($value['title'])) ? $value['title'] : '';
									$fields = (isset($value['fields'])) ? $value['fields'] : '';
									
									//if ($i == 1) { $class = 'active'; }else{ $class = ''; } ?>
									<div id="<?php echo $id; ?>" class="dmof_content_sec <?php //echo $class; ?>">
										<h4 class="dmof_sec_title"><?php _e( $title , 'dmof' ); ?></h4>
										
										<table class="widefat striped form-table">
											<tbody>	
												<?php foreach ($fields as $key => $field) {
													$id 			= (isset($field['id'])) ? $field['id'] : '';
													$name 			= (isset($field['title'])) ? $field['title'] : '';
													$type 			= (isset($field['type'])) ? $field['type'] : '';
													$subtitle 		= (isset($field['subtitle'])) ? $field['subtitle'] : '';
													$desc 			= (isset($field['desc'])) ? '<p class="options-description">'.$field['desc'].'</p>' : '';
													$placeholder 	= (isset($field['placeholder'])) ? $field['placeholder'] : '';
													$options 		= (isset($field['options'])) ? $field['options'] : '';
													$data_type 		= (isset($field['data_type'])) ? $field['data_type'] : '';
													$default 		= (isset($field['default'])) ? $field['default'] : '';
													$position 		= (isset($field['position'])) ? $field['position'] : '';
													$required 		= (isset($field['required'])) ? $field['required'] : '';
													$multiple 		= (isset($field['multiple'])) ? $field['multiple'] : '';
													
													$get_value = dmof_get_options_data( $id );

													$style_attr = $required_attr = '';

													if ($required) {
														if (is_array($required)) {
															
															// $req_id 		= ( isset($required[0]) ) ? $required[0] : '';
															// $condition 	= ( isset($required[1]) ) ? $required[1] : '';
															// $value 		= ( isset($required[2]) ) ? $required[2] : '';
															
															// $required_attr 	= (isset($field['required'])) ? "data-parent=".$req_id : '';
															// $required_val = dmof_get_options_data( $req_id );
															// if ($required_val == $value) {
															// 	$style_attr = 'style="display:none;"';
															// }

														}else{
															$required_attr 	= (isset($field['required'])) ? "data-parent=".$field['required'] : '';
															$required_val = dmof_get_options_data( $required );
															if ($required_val == 0) {
																$style_attr = 'style="display:none;"';
															}
														}
													}
													
													if ( $type != 'section' || $type != 'accordion') {
														echo '<tr id="dmof_options-'.$id.'" class="dmof_options_fields dmof_field_'.$type.'" data-id="'.$id.'" '.$required_attr.' '.$style_attr.'>';
													}

													switch ($type) {

														case "text":

														DMOF_Fields_Text::get_textbox( $id, $name, $desc, $placeholder, $default, $get_value);

														break;

														case "wp_editor":

														DMOF_Fields_WPEditor::wp_editor( $id, $name , $desc, $options, $default, $get_value);

														break;

														case "switch":

														DMOF_Fields_Switch::dmof_switch( $id, $name , $desc, $default, $get_value);

														break;


														case "checkbox":

														DMOF_Fields_Checkbox::get_checkbox( $id, $name, $desc, $options, $data_type, $default, $get_value);

														break;

														case "select":		

														DMOF_Fields_Select::get_select( $id, $name, $desc, $options, $data_type, $multiple, $default, $get_value );

														break;

														case "radio":

														DMOF_Fields_Radio::get_radio_btn( $id, $name, $options, $desc, $default, $get_value );

														break;

														case "textarea":

														DMOF_Fields_Textarea::get_textarea( $id, $name, $placeholder, $desc, $options, $get_value );

														break;

														case "email":

														DMOF_Fields_Email::get_email( $id, $name, $desc, $placeholder, $get_value);

														break;

														case "password":

														DMOF_Fields_Password::password_fields( $id, $name, $desc, $placeholder, $get_value );

														break;

														case "hidden":

														DMOF_Fields_Hidden::hidden_fields( $id, $get_value);

														break;

														case "color" :

														DMOF_Fields_Color::get_color_picker( $id, $name ,$desc, $default, $get_value);

														break;

														case "file":

														DMOF_Fields_Files::file_fields( $id, $name, $desc, $data_type, $get_value );

														break;

														case "datepicker" :

														DMOF_Fields_Datepicker::get_datepicker( $id, $name, $desc, $options, $get_value);
														
														break;

														case "range" :

														DMOF_Fields_Range::range_fields( $id, $name, $desc, $options, $default, $get_value );

														break;

														case "multi_text" :

														DMOF_Fields_Multitext::multitext_fields( $id, $name, $desc, $placeholder,$get_value );

														break;

														case "spacing" :

														DMOF_Fields_Spacing::fields_spacing( $id, $name, $desc, $placeholder, $get_value ,$default );

														break;

														case "dimensions" :

														DMOF_Fields_Dimensions::dimensions( $id, $name, $desc, $placeholder, $get_value, $default );

														break;

														case "section" :

														DMOF_Fields_Section::section( $id, $name, $subtitle, $desc, $position );

														break;

														case "accordion" :

														DMOF_Fields_Accordion::accordion( $id, $name, $subtitle, $desc, $position );

														break;

														case "button_set" :

														DMOF_Fields_Button_Set::get_button_set( $id, $name, $options, $desc, $default, $get_value );

														break;

														case "image_select" :

														DMOF_Fields_Image_Select::get_image_select( $id, $name, $desc, $options, $default, $get_value );

														break;


													} // end switch

													if ( $type != 'section' || $type != 'accordion') {
														echo '</tr>';
													}

												} ?>
											</div>
										</tbody>
									</table>

									<?php
									$sec_position = ''; 
									foreach ($fields as $key => $field) {
										$position 	= (isset($field['position'])) ? $field['position'] : '';
										if ($position) {
											$sec_position = $position;
										}
									}
									if ($sec_position == 'start') {
										echo '<span class="dmof_open_sec_warning update-nag">You are started section but not end yet. Please end Section</span>';
										echo '</div>';
									}
									?>

								</div>
								<?php
								$i++;
							}
							}// END CUSTOM options
							?>

							<!-- Save Options -->
							<div class="dmof_save_option dmof_ftr_save_option hidden">
								<input type="button" id="dmof_reset_all_options" class="button"value="Reset All" />
								<input type="submit" class="button" name="dmof_submit_options" value="Save Changes" />
							</div>

						</form><!-- Form end -->

						<!-- Import/Export start -->
						
						<div id="dmof_import_export_data" class="dmof_content_sec dmof_import_export">
							<h4><?php _e( 'Import/Export' , 'dmof' ); ?></h4>
							
							<table class="widefat striped form-table">
								<tbody>
									<tr class="dmof_options_fields">
										<th class="dmof_title">Import/Export</th>
										<td class="dmof_content">
											<div class="dmof_import_wrap">
												<p>Import Theme Options</p>
												
												<form method="post" class="import-data-form" action="" enctype="multipart/form-data">
													<textarea id ="dmof_import_old_data" name="dmof_save_data" placeholder="Paste your options export data"></textarea>
													<input class="button button-primary" id="dmof_import_old_btn" type="submit" name="dmof_import_submit" value="Import">
													<span class="import-error" style="display:none;color:red;"></span>
												</form>

											</div>

											<div class="dmof_export_wrap">
												<p>Export Theme Options</p>
												<textarea><?php echo $json_data = base64_encode(serialize(dmof_get_options_data())); ?></textarea>
											</div>

										</td>
									</tr>
								</tbody>
							</table>

						</div>

						</div><!-- New Tabs -->

					</div>

					</div>
				</div>
			</div>
			<?php
		}
}// ------end siffix option fields