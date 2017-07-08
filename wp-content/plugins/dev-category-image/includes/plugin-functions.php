<?php /* Plugin Custom Functions */

/*
 * @param $ID put the plugins options id and get single id data
*/

// get category image
// DCI_get_category_images($term_id, $image_attr='img', $img_size = false){

function DCI_get_category_images($term_id, $image_attr='image', $img_size = false){

	$category_image_id =  get_term_meta($term_id,'DCI_category_image', true);

	if ($image_attr == 'image') { // images
		
		$category_image = wp_get_attachment_image_src( $category_image_id ,$img_size);
		if ( $category_image ) :
	    	return '<img src="'.$category_image[0].'" width="'.$category_image[1].'" height="'.$category_image[2].'" />';
		endif;

	}elseif ($image_attr == 'id') { // attachment id
		
		return $category_image_id;
	
	}elseif ($image_attr == 'url') { // attachment src
	
		$get_category_image = wp_get_attachment_image_src( $category_image_id ,$img_size);
		return $get_category_image[0];
	}
}


// Plugin Options function
function DCI_get_theme_options($id=''){

	$get_DCI_plugin_options = get_option('DCI_plugin_options');
	if ($get_DCI_plugin_options && $id) {
		return $get_DCI_plugin_options[$id];
	}else{
		return $get_DCI_plugin_options;
	}
}

/*
 * Get all Post Types of site
 * @param $exclude_data
 * if you want to only folter data from post type put exclude param in functions
 */

function DCI_get_post_types( $exclude_data = '' ){

	$get_all_taxonomies = get_taxonomies( array('public'=>true) );
	
	unset($get_all_taxonomies['post_format']); // Remove post format from array

	// if exclude param is available
	if ($exclude_data) {
		foreach ( $get_all_taxonomies  as $taxonomies ) {
			if( DCI_get_theme_options('DCI_post_type_'.$taxonomies) == 'on'){
				unset($post_types[$taxonomies]);
				return $get_all_taxonomies;
			}
		}
	}
	return $get_all_taxonomies;
}



/*==================================================================
|| Add image options for All Taxonomy  ||
===================================================================*/

function DCI_custom_taxonomy_image(){

    $taxonomies = get_taxonomies( array('public'=>true) );
    
    if ( $taxonomies ) {
        foreach ( $taxonomies  as $taxonomy ) {
            // Add Form
            add_action( $taxonomy.'_add_form_fields', 'DCI_add_category_image_field', 10, 2 );
            // Edit Form
            add_action( $taxonomy.'_edit_form_fields', 'cat_edit_meta_field', 10, 2 );
            // Save Created Category
            add_action( 'create_'.$taxonomy, 'save_category_custom_meta', 10, 2 );
            // Save Edited Category
            add_action( 'edited_'.$taxonomy, 'save_category_custom_meta', 10, 2 );

            // add image column
            add_filter('manage_edit-'.$taxonomy.'_columns', 'DCI_category_img_columns',1);
  			add_filter('manage_'.$taxonomy.'_custom_column', 'DCI_category_img_column_content',1,3);
        }
    }
}
add_action('admin_init','DCI_custom_taxonomy_image');

// Add Category Form Image
function DCI_add_category_image_field() {
    ?>
    <div class="form-field" id="cat-img">
        <label for="category_banner_image"><?php _e( 'Category Image', 'DCI' ); ?></label>
        <img class="DCI_show_category_img" src="<?php echo DCI_PLUGIN_PLACEHOLDER_IMG; ?>" width="100" height="100" />
        <input type="hidden" name="DCI_category_image" class="DCI_add_category_img_val" value="" />
        <input class="button DCI_add_category_img_btn" type="button" value="Upload Image" />
        <input type="button" class="button DCI_remove_show_category_img_btn" value="Remove Image">
    </div>
<?php
}


// Edit Category Form Image
function cat_edit_meta_field($term) {
    ?>
    <tr class="form-field">
    	<!-- Label Name -->
        <th scope="row" valign="top"><label for="_brand_image"><?php _e( 'Image', 'DCI' ); ?></label></th>
        <td>
        	<?php $category_image = DCI_get_category_images($term->term_id,'url');
        	if($category_image) : // category image ?>
            	<img class="DCI_edit_show_category_img" src="<?php echo $category_image; ?>" width="150" height="100" />
            <?php else : ?>
            	<img class="DCI_edit_show_category_img" src="<?php echo DCI_PLUGIN_PLACEHOLDER_IMG; ?>" width="150" height="100" />
        	<?php endif; ?>
       		
            <?php /* Category image attachment ID */ ?>
            	<input type="hidden" name="DCI_category_image" class="DCI_edit_show_category_img_val" value="<?php echo $get_category_image; ?>">
            <?php // Upload Button ?>
            	<input class="DCI_edit_category_img_btn button" type="button" value="Select/Upload Image" />
            <?php // Remove Button ?>
            	<input class="DCI_remove_edit_category_img_btn button" type="button" value="Remove Image" />
        </td>
    </tr>  
<?php
}
// Save  Image fields callback function.
function save_category_custom_meta( $term_id ) {
    if ( isset( $_POST['DCI_category_image'] ) ) {
        update_term_meta($term_id,'DCI_category_image', $_POST['DCI_category_image']);
    }
}


// Add Image in column

function DCI_category_img_columns($columns){
    $columns['DCI_cat_image'] = 'Image';
    return $columns;
}

function DCI_category_img_column_content( $column, $columns, $term_id){
 	
	switch ($columns) {
	    case "DCI_cat_image":
	    	$cat_img = DCI_get_category_images($term_id, 'url', 'thumbnail');
	    	if ($cat_img) {
	    		return '<img src="'.$cat_img.'" width="50" height="50" />';	
	    	}else{
	    		return '<img src="'.DCI_PLUGIN_PLACEHOLDER_IMG.'" width="50" height="50" />';	
	    	}
	    break;
	}
	return $column;
}