<?php
/**
 * Suffix main functions files
 */

class DMOF_Options{

	// initialize hooks
	//public function __construct( ) {}

	public function dmof_include_files(){
		require_once DMOF_OPTIONS_DIR . '/includes/core_functions.php';
	}

	// init() start
	public function init(){

		// Add menu for options
		add_action('admin_menu', array( $this ,'dmof_add_menu_page_func') );
		// register theme options setting
		add_action( 'admin_init', array( $this , 'dmof_register_settings' ) );
		// Import option data
		add_action( 'admin_init', array( $this , 'dmof_import_options_data' ) );
		// Add admin bar menu
		add_action( 'admin_bar_menu', array( $this , 'dmof_admin_bar_options_menu' ), 999 );
		
		// included files
		$this->dmof_include_files();

	}// end init function


	/**
	 * Add Menu For dmof options
	 */
	public function dmof_add_menu_page_func() {
		$opt_settings = apply_filters('add_dmof_options','settings');
		$opt_settings = (isset($opt_settings['settings'])) ? $opt_settings['settings'] : '';

		$page_title 	= (isset($opt_settings['page_title'])) ? $opt_settings['page_title'] : 'Theme Options';
		$menu_title 	= (isset($opt_settings['menu_title'])) ? $opt_settings['menu_title'] : 'Theme Options';
		$page_slug 		= (isset($opt_settings['page_slug'])) ? $opt_settings['page_slug'] : 'dmof_options_page';
		$menu_type 		= (isset($opt_settings['menu_type'])) ? $opt_settings['menu_type'] : 'submenu';
		$page_parent 	= (isset($opt_settings['page_parent'])) ? $opt_settings['page_parent'] : 'themes.php';
		$menu_icon 		= (isset($opt_settings['menu_icon'])) ? $opt_settings['menu_icon'] : '';
		
		if ($menu_type == 'menu') {
			add_menu_page(__( $page_title, 'dmof' ),__( $menu_title,'dmof' ),'manage_options', $page_slug, array( $this , 'dmof_theme_options_page_callback'),$menu_icon);
		}else{
			add_submenu_page( $page_parent, $page_title, $menu_title, 'manage_options', $page_slug, array( $this , 'dmof_theme_options_page_callback') );
		}

	}

	/**
	 * Disply callback for the options page.
	 */
	public function dmof_theme_options_page_callback() {

		DMOF_Options_Fields_data:: options_fields();

	}

	/**
	 * Register theme options settings
	 */
	public function dmof_register_settings() { // whitelist options
		register_setting( 'dmof_theme_options_group', 'dmof_theme_options' );
	}


	/**
	 * Import All Options data
	 */
	public function dmof_import_options_data() { // whitelist options
			
		if (isset($_POST['dmof_import_submit'])) {
			$import_data = ( isset($_POST['dmof_save_data']) ) ? $_POST['dmof_save_data'] : '';

			$import_data = str_replace("\'", "'",$import_data);
			$import_data = str_replace('\"', '"',$import_data);

			$import_data = json_decode( $import_data , true );

			update_option( 'dmof_theme_options', $import_data, '', 'yes' );
		}
	}

	/**
	 * Admin Bar options menu
	 */
	function dmof_admin_bar_options_menu( $wp_admin_bar ) {
		if (is_user_logged_in() && current_user_can('administrator')) {
		
			$opt_settings = apply_filters('add_dmof_options','settings');
			$opt_settings = (isset($opt_settings['settings'])) ? $opt_settings['settings'] : '';

			$page_title = (isset($opt_settings['admin_bar_menu'])) ? $opt_settings['admin_bar_menu'] : true;
			if ($page_title == true) {
				$args = array(
					'id'    => 'dmof_admin_bar_menu',
					'title' => '<span class="ab-icon dashicons-portfolio"></span>Theme Options',
					'href'  => admin_url('themes.php?page=dmof_theme_options_page'),
					'meta'  => array( 'class' => 'dmof_toolbar_page' )
				);
				$wp_admin_bar->add_node( $args );
			}
		}
	}
}


/**
 * Theme options ajax functions
 * Save Theme Options
 */

add_action( 'wp_ajax_dmof_save_theme_options', 'dmof_save_theme_options_func' );
add_action( 'wp_ajax_nopriv_dmof_save_theme_options', 'dmof_save_theme_options_func' );

function dmof_save_theme_options_func(){

    if(isset($_POST['options_values'])){
        
        parse_str($_POST['options_values'] , $params);
        // unset unused array
	    unset($params['option_page']);
	    unset($params['action']);
	    unset($params['_wpnonce']);
	    unset($params['_wp_http_referer']);

	    $params = stripslashes_deep( $params );

		update_option( 'dmof_theme_options', $params, '', 'yes' );

		echo json_encode(array('type' => 'sucess' , 'msg' => '<span class="dmof-option-save-msg">Data Saved</span>'));

    }
    exit;
}

/**
 * Reset all theme options
 */

add_action( 'wp_ajax_dmof_reset_all_options', 'dmof_save_dmof_reset_all_options_func' );
add_action( 'wp_ajax_nopriv_dmof_reset_all_options', 'dmof_save_dmof_reset_all_options_func' );

function dmof_save_dmof_reset_all_options_func(){

	update_option( 'dmof_theme_options', '', '', 'yes' );

	echo json_encode(array('type' => 'sucess' , 'msg' => '<span class="dmof-option-save-msg">Reset Data</span>'));

    exit;
}


/**
 * Import all theme options
 */

add_action( 'wp_ajax_dmof_import_old_data', 'dmof_save_dmof_import_old_data_func' );
add_action( 'wp_ajax_nopriv_dmof_import_old_data', 'dmof_save_dmof_import_old_data_func' );

function dmof_save_dmof_import_old_data_func(){

	  if(isset($_POST['import_data'])){
        
        parse_str($_POST['import_data'] , $import_data);

        $import_data = $import_data['dmof_save_data'];
        
        $new_data = unserialize(base64_decode($import_data));

        update_option( 'dmof_theme_options', $new_data, 'yes' );

		echo json_encode(array('type' => 'sucess' , 'msg' => '<span class="dmof-option-save-msg">Reset Data</span>'));
    
    }
    exit;
}