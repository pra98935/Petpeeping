<?php
/**
 * Core Functions
 * @author Devkaran Patidar
 * @package DMB
 */


/**
 * Add Custom Meta Boxes
 */

function dmof_adding_custom_meta_boxes( $post_type, $post ) {
	$post_id = $post->ID;
    $meta_array = apply_filters( 'dmof_add_meta_box' , 'metabox' );

    if (!empty($meta_array) && is_array($meta_array)) {
	    foreach ($meta_array as $key => $metabox) {
	    	if ( isset($metabox['post_id'])) {
	    		if( $post_id == $metabox['post_id'] ){
	    			add_meta_box( $metabox['id'],__( $metabox['title'] , 'dev' ),'dmof_meta_box_content',$metabox['post_types'],$metabox['priority'],'default');
	    		}
	    	}else{
		    	add_meta_box( $metabox['id'],__( $metabox['title'] , 'dev' ),'dmof_meta_box_content',$metabox['post_types'],$metabox['priority'],'default');
		    }
	    }
	}
}
add_action( 'add_meta_boxes', 'dmof_adding_custom_meta_boxes', 10, 2 );


/**
 * Callback custom metaboxes content
 */

function dmof_meta_box_content( $post, $metabox ){
	
	$post_id = $post->ID; // current post ID
	$current_post_type = $post->post_type; // current post type
	$crt_meta_id = $metabox['id'];

	// Add nonce for security and authentication.
    wp_nonce_field( 'dmof_meta_box_content_nonce_action', 'dmof_meta_box_content_nonce' );

	$meta_array = apply_filters( 'dmof_add_meta_box' , 'dev' ); // metaboxes data

	foreach ($meta_array as $key => $metabox) { // get metaboxes data

		$meta_post_type = (isset($metabox['post_types'])) ? $metabox['post_types'] : 'post';

		if (is_array($meta_post_type)) { $meta_post_type = $meta_post_type; }else{ $meta_post_type = array($meta_post_type); }

		if ( in_array( $current_post_type , $meta_post_type )  && $crt_meta_id == $metabox['id']) { // check current post type is equal meta post

			$meta_priority = (isset($metabox['priority'])) ? $metabox['priority'] : '';
			// main Div
			echo '<div class="dmof_meta_box_wrap dmof_'.$meta_priority.'_metabox_wrap">';

			echo '<table class="widefat striped">';
			echo '<tbody>';

			$meta_fields = $metabox['meta_fields']; // metaboxes meta_fields
			// remove duplicate id from array
			$storage = array();
			$res_meta_fields = array();
			foreach($meta_fields as $b){
			    if( !in_array( $b['id'], $storage ) ) {
			        $storage[] = $b['id'];
			        $res_meta_fields[] =  $b;
			    }
			}
			// get value from array
			foreach ($res_meta_fields as $key => $meta_field) { // get metaboxes meta_fields
				$id 			= (isset($meta_field['id'])) ? $meta_field['id'] : '';
				$name 			= (isset($meta_field['name'])) ? $meta_field['name'] : '';
				$type 			= (isset($meta_field['type'])) ? $meta_field['type'] : '';
				$desc 			= (isset($meta_field['desc'])) ? '<p class="meta-description">'.$meta_field['desc'].'</p>' : '';
				$placeholder 	= (isset($meta_field['placeholder'])) ? $meta_field['placeholder'] : '';
				$default 		= (isset($meta_field['default'])) ? $meta_field['default'] : '';
				$data_type 		= (isset($meta_field['data_type'])) ? $meta_field['data_type'] : '';
				$options 		= (isset($meta_field['options'])) ? $meta_field['options'] : '';
				$multiple 		= (isset($meta_field['multiple'])) ? $meta_field['multiple'] : '';

				$get_value 		= get_post_meta( $post_id, $id, true );

				// meta secondary div
				echo '<tr class="dmof_metabox_fields dmof_'.$type.'">';

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

						DMOF_Fields_Dimensions::dimensions( $id, $name, $desc, $placeholder, $get_value ,$default );

						break;
				    	

				} // end switch

				echo '</tr>'; // dmof_meta_content

			} // ----end meta fields

			echo '</tbody>'; // dmof_metabox_fields
		echo '</table>'; //dmof_meta_box_wrap

		echo '</div>';
		}
	}
}


/**
 * Save Custom meta box content.
 *
 * @param int $post_id Post ID
 */
function dmof_save_custom_meta_box( $post_id ) {

	// Add nonce for security and authentication.
    $nonce_name   = isset( $_POST['dmof_meta_box_content_nonce'] ) ? $_POST['dmof_meta_box_content_nonce'] : '';
    $nonce_action = 'dmof_meta_box_content_nonce_action';
    // Check if nonce is set.
    if ( ! isset( $nonce_name ) ) { return; }
    // Check if nonce is valid.
    if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) ) { return; }

    $meta_array = apply_filters( 'dmof_add_meta_box' , 'dev' ); // metaboxes data

    foreach ($meta_array as $key => $metabox) { // get metaboxes data
		$meta_fields = $metabox['meta_fields']; // metaboxes meta_fields
		foreach ($meta_fields as $key => $meta_field) { // get metaboxes meta_fields
			$id 	= $meta_field['id'];
			$meta_value = (isset($_POST[$id])) ? $_POST[$id] : '';
			update_post_meta($post_id, $id,$meta_value );
		}
	}

}
add_action( 'save_post', 'dmof_save_custom_meta_box' );