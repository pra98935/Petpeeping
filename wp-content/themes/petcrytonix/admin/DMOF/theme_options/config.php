<?php
/**
 * Theme option configration file
 */


add_filter( 'add_dmof_options', 'add_dmof_options_callback',10 );

function add_dmof_options_callback() {

	/**
	 * Page Setting Options
	 */
	$settings = array(
		
		//-> Page Title
		'page_title'		=> 'Theme Options',
		//-> Menu Title
		'menu_title'		=> 'Theme Options',
		//-> Page Slug
		'page_slug'			=> 'dmof_theme_options_page',
		//-> Menu Type ( Accepted menu and submenu )
		'menu_type'  		=> 'submenu',
		//-> Page Parent ( Which page you want to your theme options example themes.php.plugins.php etc )
		'page_parent' 		=> 'themes.php',
		//-> Menu Icon ( Wordpress dashboard left theme options icon will work only menu_type=>menu )
		'menu_icon'			=> 'developer',
		//-> Admin bar menu ( Show theme options in admin bar )
		'admin_bar_menu'	=> true,
	);

	/**
	 * Add New content fields
	 */
	// Header Section
	$options = '';
	
	$options[] = array(
		'id'		=> 'section-general-start',
		'title'		=> 'General Settings',
		'icon'		=> 'dashicons-dashboard',
		'fields'	=> array(
			
			array(
				'id'			=> 'opt_main_logo',
				'type'			=> 'file',
				'data_type'   	=> 'image',
				'title'			=> __('Header Logo','dmof'),
				'subtitle'		=> __('Upload your header logo here','dmof'),
			),
		),
	);

	// Footer Section
	$options[] = array(
		'id'		=> 'section-footer-start',
		'title'		=> 'Footer Settings',
		'fields'	=> array(
			
			array(
				'id'			=> 'opt_footer_logo',
				'type'			=> 'file',
				'data_type'   	=> 'image',
				'title'			=> __('Footer Logo','dmof'),
				'subtitle'		=> __('Upload your footer logo here','dmof'),
			),

			array(
				'id'			=> 'opt_footer_copyright_text',
				'type'			=> 'textarea',
				'title'			=> __('Footer Copyright Text','dmof'),
				'subtitle'		=> __('Enter your footer copyright text','dmof'),
			),

			// // social title
			// array(
			// 	'id'			=> 'opt_footer_social_title',
			// 	'type'			=> 'text',
			// 	'title'			=> __('Footer Social Title','dmof'),
			// 	'subtitle'		=> __('Enter the footer social title','dmof'),
			// 	'placeholder'	=> 'placeholder',
			// 	'default'		=> 'default value 1',
			// ),

			// // social Facebook
			// array(
			// 	'id'			=> 'opt_footer_social_facebook',
			// 	'type'			=> 'text',
			// 	'title'			=> __('Footer Social facebook Link','dmof'),
			// 	'subtitle'		=> __('Enter the Footer Social facebook Link','dmof'),
			// 	'placeholder'	=> 'placeholder',
			// 	'default'		=> 'default value 1',
			// ),

			// // social Twiiter
			// array(
			// 	'id'			=> 'opt_footer_social_twitter',
			// 	'type'			=> 'text',
			// 	'title'			=> __('Footer Social twitter Link','dmof'),
			// 	'subtitle'		=> __('Enter the Footer Social twitter Link','dmof'),
			// 	'placeholder'	=> 'placeholder',
			// 	'default'		=> 'default value 1',
			// ),

			// // social Linkedin
			// array(
			// 	'id'			=> 'opt_footer_social_linkedin',
			// 	'type'			=> 'text',
			// 	'title'			=> __('Footer Social Linkedin Link','dmof'),
			// 	'subtitle'		=> __('Enter the Footer Social linkedin Link','dmof'),
			// 	'placeholder'	=> 'placeholder',
			// 	'default'		=> 'default value 1',
			// ),

			// // social Pinterest
			// array(
			// 	'id'			=> 'opt_footer_social_pinterest',
			// 	'type'			=> 'text',
			// 	'title'			=> __('Footer Social Pinterest Link','dmof'),
			// 	'subtitle'		=> __('Enter the Footer Social pinterest Link','dmof'),
			// 	'placeholder'	=> 'placeholder',
			// 	'default'		=> 'default value 1',
			// ),

			// // Second Popular Post section
			// array(
			// 	'id'			=> 'opt-sectio-popular-post-start',
			// 	'type'			=> 'section',
			// 	'title'			=> __('Footer Second Section','dmof'),
			// 	//'subtitle'		=> __('Upload your footer logo here','dmof'),
			// 	'position'		=> 'start',
			// ),

			// 	// Popular Post title
			// 	array(
			// 		'id'			=> 'opt_footer_popular_title',
			// 		'type'			=> 'text',
			// 		'title'			=> __('Popular Post Title','dmof'),
			// 		'subtitle'		=> __('Enter the Popular Post Title','dmof'),
			// 		'placeholder'	=> 'POPULAR POSTS',
			// 		'default'		=> 'POPULAR POSTS',
			// 	),

			// 	// Popular Post Shortcode
			// 	array(
			// 		'id'			=> 'opt_footer_popular_shortcode',
			// 		'type'			=> 'text',
			// 		'title'			=> __('Popular Post Shortcode','dmof'),
			// 		'subtitle'		=> __('Enter the Popular Post Shortcode','dmof'),
			// 		'placeholder'	=> '[dpc_popular_post_shortcode posts_per_page=5]',
			// 		'desc'			=> __('Here is full shortcode attr [dpc_popular_post_shortcode posts_per_page=10 order=DESC class=classname]','dmof'),
			// 		'default'		=> '[dpc_popular_post_shortcode posts_per_page=10]',
			// 	),

			// // Third section
			// array(
			// 	'id'			=> 'opt-sectio-popular-post-end',
			// 	'type'			=> 'section',
			// 	'position'		=> 'end',
			// ),

			// // Surf listing title
			// // Second Popular Post section
			// array(
			// 	'id'			=> 'opt-section-surfing-post-start',
			// 	'type'			=> 'section',
			// 	'title'			=> __('Footer Third Section','dmof'),
			// 	'subtitle'		=> __('Upload your footer logo here','dmof'),
			// 	'position'		=> 'start',
			// ),

			// 	array(
			// 		'id'			=> 'opt_footer_surf_listing_title',
			// 		'type'			=> 'text',
			// 		'title'			=> __('Surf Listing Title','dmof'),
			// 		'subtitle'		=> __('Enter the surf listing Title','dmof'),
			// 		'placeholder'	=> 'SURF LISTINGS',
			// 		'default'		=> 'SURF LISTINGS',
			// 	),

			// 	// Surf lisating menu
			// 	array(
			// 		'id'			=> 'opt_footer_surf_listing_menus',
			// 		'type'			=> 'select',
			// 		'data_type'		=> 'menus',
			// 		'title'			=> __('Surf Listing Menu','dmof'),
			// 		'subtitle'		=> __('Select the surf listing title','dmof'),
			// 	),

			// array(
			// 	'id'			=> 'opt-section-surfing-post-end',
			// 	'type'			=> 'section',
			// 	'position'		=> 'end',
			// ),

		),
	);

	// Custom Css/js Section
	// $options[] = array(
	// 	'id'		=> 'section-custom-css-start',
	// 	'title'		=> 'Custom Css/Js',
	// 	'fields'	=> array(
			
	// 		array(
	// 			'id'			=> 'opt_theme_options_custom_css',
	// 			'type'			=> 'textarea',
	// 			'title'			=> __('Enter Custom Css Here','dmof'),
	// 			'subtitle'		=> __('Enter your custom css here','dmof'),
	// 			'desc'			=> __('Css Will Included in header section. Enter css Example :- body {background-color: #fff;}','dmof'),
	// 		),

	// 		array(
	// 			'id'			=> 'opt_theme_options_custom_jquery',
	// 			'type'			=> 'textarea',
	// 			'title'			=> __('Custom Jquery','dmof'),
	// 			'subtitle'		=> __('Enter your custom jquery here','dmof'),
	// 			'desc'			=> 'Example:- jQuery(document).ready(function($){ $("p").click(function(){$(this).hide();});});',
	// 			'default'		=> 'jQuery(document).ready(function($){$("p").click(function(){$(this).hide();});});',
	// 		),

	// 	),
	// );

	


/**
 * DMOF Framework theme options all type
 * with the all parameter
 * with tha all options
 * please do not remove this section
 * this section only created for demo
 */

	$options[] = array(
		'id'		=> 'section-demo-start',
		'title'		=> 'All Demo Section',
		'fields'	=> array(

			/**
			* Input type file
			* Included Image,video,file,multiimage
			*/
				// Image
				array(
					'id'			=> 'opt_demo_type_image',
					'type'			=> 'file',
					'data_type'   	=> 'image',
					'title'			=> __('Demo Image','dmof'),
					'subtitle'		=> __('Upload your Image here','dmof'),
				),
				// Video
				array(
					'id'			=> 'opt_demo_type_video',
					'type'			=> 'file',
					'data_type'   	=> 'video',
					'title'			=> __('Demo Video','dmof'),
					'subtitle'		=> __('Upload your Video here','dmof'),
				),
				// File
				array(
					'id'			=> 'opt_demo_type_file',
					'type'			=> 'file',
					//'data_type'   	=> 'image',
					'title'			=> __('Demo File','dmof'),
					'subtitle'		=> __('Upload your File here','dmof'),
				),
				// Multi Images
				array(
					'id'			=> 'opt_demo_type_multiple_image',
					'type'			=> 'file',
					'data_type'   	=> 'multiple_image',
					'title'			=> __('Demo Multi Images','dmof'),
					'subtitle'		=> __('Upload your Multiple Images here','dmof'),
				),

			
			/**
			 * Input type text
			 */
				array(
					'id'			=> 'opt_demo_type_text',
					'type'			=> 'text',
					'title'			=> __('Demo Text','dmof'),
					'subtitle'		=> __('Demo Sub Title','dmof'),
					'desc'			=> __('Demo Description','dmof'),
					'placeholder'	=> __('placeholder','dmof'),
					'default'		=> 'Demo default value',
					//'required' 		=> 'dmof_meta_switch_test'
				),

			/**
			 * Input type textarea
			 */
				array(
					'id'			=> 'opt_demo_type_textarea',
					'type'			=> 'textarea',
					'title'			=> __('Demo Textarea','dmof'),
					'subtitle'		=> __('Demo Sub Title','dmof'),
					'desc'			=> __('Demo Description','dmof'),
					'placeholder'	=> __('placeholder','dmof'),
					'default'		=> 'Demo default value',
					//'required' 		=> 'dmof_meta_switch_test'
				),

			/**
			 * Input type Select
			 * Included options array( 'select'=>'select', )
			 * Included data types post,pages,taxonomy,terms,sidebar,menu,menu_location,users,post_types
			 */
				// Custom Select Options
				array(
	                'id'           => 'opt_demo_type_select',
	                'type'         => 'select',
	                'title'        => __( 'Select Options', 'dmof' ),
	                'desc'         => __('This is demo description text','dmof'),
	                'multiple'		=> true,
	                'options'       => array(
	                	'select1'  => 'Select 1',
	                	'select2'  => 'Select 2',
	                	'select3'  => 'Select 3',
	                	'select4'  => 'Select 4',
	                ), // wordpress options will work also
	            ),
				// page
	            array(
	                'id'           => 'opt_demo_type_select_page',
	                'type'         => 'select',
	                'title'        => __( 'Select Pages', 'dmof' ),
	                'desc'         => __('This is demo description text for the pages','dmof'),
	                'data_type'    => 'pages',
	            ),
				
			/**
			 * Input type switch
			 */
				array(
	                'id'           	=> 'opt_demo_type_switch',
	                'title'         => __( 'Switch', 'dmof' ),
	                'type'         	=> 'switch',
	                'desc'         	=> __('This is demo description text for Switch','dmof'),
	                'default'      	=> 1,
	            ),

            /**
             * Input type WP_EDITOR
             * included 
             */

            	array(
					'id'		=> 'opt_demo_type_wp_editor',
					'type'		=> 'wp_editor',
					'title'		=> __('Wp Editor','dmof'),
					'subtitle'	=> __('WP editor Section','dmof'),
					'desc'		=> __('WP editor Description','dmof'),
					'options'	=> array(
						// 'wpautop'       => true,
	                    // 'media_buttons' => false,
	                    // 'textarea_rows' => '10',
	                    // 'editor_height' => 'none',
	                    // 'quicktags'     => true,
	                    // 'drag_drop_upload'=> false,
						'row'		=> '8',
						'col'		=> '50', // work all wordpress options
					),
					'default'	=> 'default value for WP editor',
					'required' 		=> array( 'opt_demo_type_switch' ,'=', '1' ),
				),

			/**
             * Input type Checkbox
             * included data_type pages,post,taxonomies,terms
             * included custom options array('select_1','select 1')
             */

            	array(
	                'id'           => 'opt_demo_type_checkbox',
	                'title'         => __( 'Demo checkbox', 'dmof' ),
	                'type'         => 'checkbox',
	                'data_type'    => 'terms',
	                'desc'         => __('This is demo description text','dmof'),
	                'options'      => array(
	                    'taxonomy'      => 'category',
	                    'hide_empty'    => 'hide',
	                ), // option will work with wordpress args
	                'default'      => array( 'taxonomy','hide_empty'),
	            ),

	        /**
	         * Input type radio
	         * Included custom functions
	         */
		        array(
	                'id'           => 'opt_demo_type_radio',
	                'title'        => __( 'Demo Radio', 'dmof' ),
	                'type'         => 'radio',
	                'desc'         => __('This is demo description text for radio','dmof'),
	                'options'      => array(
	                    'male' 		=> 'Male',
	                    'female' 	=> 'Female',
	                ),
	                'default'       => 'female',
	            ),

	        /**
	         * Input type Color
	         */

	        	array(
	                'id'           => 'opt_demo_type_color',
	                'title'        => __( 'Demo Color Picker', 'dmof' ),
	                'type'         => 'color',
	                'desc'         => __('This is demo description text for the color','dmof'),
	                'default'      => '#1de5d8',
	            ),

	        /**
	         * Input type multi_text
	         */

		        array(
	                'id'           => 'opt_demo_type_multi_text',
	                'title'         => __( 'Demo Multiple Text', 'dmof' ),
	                'type'         => 'multi_text',
	                'desc'         => __('This is demo description text','dmof'),
	                'placeholder'  => __( 'Enter Multiple Text Place holder text', 'dmof' ),
	            ),

	        /**
	         * Input type range
	         */

		        array(
	                'id'           => 'opt_demo_type_range',
	                'title'        => __( 'Demo Range', 'dmof' ),
	                'type'         => 'range',
	                'desc'         => __('This is demo description text for range','dmof'),
	                'options'      => array(
	                    'min'  => '10',
	                    'max'  => '250',
	                ),
	                'default'       => '100',
	            ),

	        /**
	         * Input type Datepicker
	         *
	         */

		        array(
	                'id'           => 'opt_demo_type_datepicker',
	                'title'        => __( 'Demo Datepicker', 'dmof' ),
	                'type'         => 'datepicker',
	                'desc'         => __('This is demo description text','dmof'),
	                'options'	   => array(
	                	'dateFormat'	=> 'DD, d MM, yy', //"mm/dd/yy","yy-mm-dd","d M, y","d MM, y","DD, d MM, yy"
					    'changeMonth' 	=> '',
					    'changeYear' 	=> '',
						'minDate' 		=> '',
					    'maxDate' 		=> '',
	                    'minDateByOpt'  => 'meta_box_date_picker1',// enter opt id which you want set min value
	                    //'maxDateByOpt'  => '',// enter opt id which you want set max value ( working on this point )
	                ),
	            ),

	        /**
	         * Input type Spacing
	         */

		        array(
	                'id'           => 'opt_demo_type_spacing',
	                'title'        => __( 'Demo spacing', 'dmof' ),
	                'type'         => 'spacing',
	                'desc'         => __('This is demo description for spacing','dmof'),
	                'default'	   => array(
	                	'top'		=> '10',
	                	'right'		=> '10',
	                	'bottom'	=> '10',
	                	'left'		=> '10',
	                ),
	            ),

	        /**
	         * Input type Dimensions
	         *
	         */

		        array(
	                'id'           => 'opt_demo_type_dimensions',
	                'title'        => __( 'Dimensions', 'dmof' ),
	                'type'         => 'dimensions',
	                'desc'         => __('This is demo description for spacing','dmof'),
	                'default'	   => array(
	                	'top'		=> '10',
	                	'right'		=> '10',
	                	'bottom'	=> '10',
	                	'left'		=> '10',
	                ),
	            ),


	        /**
	         * Input type Section
	         */

		        array(
					'id'			=> 'opt_demo_type_section_start',
					'type'			=> 'section',
					'title'			=> __('Demo Section','dmof'),
					'subtitle'		=> __('Enter your section subtitle here','dmof'),
					'position'		=> 'start',
				),

					array(
						'id'			=> 'demo_text_section',
						'type'			=> 'text',
						'title'			=> __('Demo text Section','dmof'),
					),

				array(
					'id'			=> 'opt_demo_type_section_end',
					'type'			=> 'section',
					'position'		=> 'end',
				),






				array(
					'id'			=> 'opt_demo_type_section_start1',
					'type'			=> 'section',
					'title'			=> __('Demo Section','dmof'),
					'subtitle'		=> __('Enter your section subtitle here','dmof'),
					'position'		=> 'start',
				),

					array(
						'id'			=> 'demo_text_section1',
						'type'			=> 'text',
						'title'			=> __('Demo text Section','dmof'),
					),

				array(
					'id'			=> 'opt_demo_type_section_end1',
					'type'			=> 'section',
					'position'		=> 'end',
				),


			/**
			 * Input type accordion
			 */

				array(
					'id'			=> 'opt_demo_type_accordian_start',
					'type'			=> 'accordion',
					'title'			=> __('Demo Accordion','dmof'),
					'subtitle'		=> __('Enter your accordion subtitle here','dmof'),
					'position'		=> 'start',
				),

					array(
						'id'			=> 'demo_text_accordion',
						'type'			=> 'text',
						'title'			=> __('Demo text accordion','dmof'),
					),
					
				array(
					'id'			=> 'opt_demo_type_accordian_start',
					'type'			=> 'accordion',
					'position'		=> 'end',
				),

				array(
					'id'			=> 'opt_demo_type_accordian_start1',
					'type'			=> 'accordion',
					'title'			=> __('Demo Accordion','dmof'),
					'subtitle'		=> __('Enter your accordion subtitle here','dmof'),
					'position'		=> 'start',
				),

					array(
						'id'			=> 'demo_text_accordion1',
						'type'			=> 'text',
						'title'			=> __('Demo text accordion','dmof'),
					),

					array(
						'id'			=> 'demo_text_button_set',
						'type'			=> 'button_set',
						'title'			=> __('Demo Button Set','dmof'),
						'options'		=> array(
							'button_set1'	=> 'Button Set 1',
							'button_set2'	=> 'Button Set 2',
							'button_set3'	=> 'Button Set 3',
						),
					),

					array(
						'id'			=> 'demo_text_image_select',
						'type'			=> 'image_select',
						'title'			=> __('Demo Image Select','dmof'),
						'options'		=> array(
							'button_set1'	=> DMOF_IMG_FOLDER_PATH . 'select_first.jpg',
							'button_set2'	=> DMOF_IMG_FOLDER_PATH . 'select_first.jpg',
							'button_set3'	=> DMOF_IMG_FOLDER_PATH . 'select_first.jpg',
						),
					),
					
				array(
					'id'			=> 'opt_demo_type_accordian_start1',
					'type'			=> 'accordion',
					'position'		=> 'end',
				),


		),
	);


	$options_data['settings'] 	= $settings;
	$options_data['options'] 	= $options;

	return $options_data;
}// End options




// Omit closing PHP tag to avoid "Headers already sent" issues.