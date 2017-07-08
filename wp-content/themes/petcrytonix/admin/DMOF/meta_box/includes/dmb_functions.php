<?php
/**
 * Custom Functions
 */


/**
 * Get DMB Post meta values
 * @param $meta_id -> Enter the post meta id *required
 * @param $post_id -> Enter the post id // optional
 */

function dmb_get_post_meta( $meta_id , $post_id = ''){

	if ($post_id == '') {
		$post_id = get_the_ID();
	}

	return get_post_meta( $post_id , $meta_id , true );
}


/**
 * Get DMB Post meta Attachment
 * @param $meta_id -> Enter the post meta id *required
 * @param $post_id -> Enter the post id // optional
 * @param $output -> Enter the post meta other parameter such as 'image','image_src','video','file'
 * @param $size -> Enter the post meta size it's work only for 'image'
 */

function dmb_get_attachment_data( $meta_id , $post_id = null , $output = 'id' , $size = 'full'){

	if (empty($post_id)) { $post_id = get_the_ID(); }

	$post_meta_val = get_post_meta( $post_id , $meta_id , true );
	if (is_array($post_meta_val)) {
		$post_meta_id = $post_meta_val['id'];
	}else{
		$post_meta_id = $post_meta_val;
	}

	// get other parameter
	if ($output == 'img') { return wp_get_attachment_image( $post_meta_id, $size ); }
	if ($output == 'url') { return wp_get_attachment_url( $post_meta_id , $size ); }
	if ($output == 'id') { return $post_meta_val; }
	
}



/**
 * Get DMB Post meta Multiple Images
 * @param $meta_id -> Enter the post meta id *required
 * @param $post_id -> Enter the post id // optional
 * @param $size -> Enter the post meta size it's work only for 'image'
 * @param $output -> Enter the post meta output value such as 'img','url','id'
 */
function dmb_get_multiple_images($meta_id , $post_id = null , $size = 'full' , $output = 'img') {
	
	$dmb_get_img_id = dmb_get_post_meta($meta_id,$post_id);
	$dmb_output_img = '';
	$dmb_get_img_ids = explode(",",$dmb_get_img_id);
	foreach ($dmb_get_img_ids as $dmb_img_id) {
		if ($dmb_img_id) {
			$img_tags = wp_get_attachment_image( $dmb_img_id, $size );
			$img_src = wp_get_attachment_image_url( $dmb_img_id, $size );
			if ($output == 'img') {
				$dmb_output_img[] = $img_tags;
			}
			if ($output == 'url') {
				$dmb_output_img[] = $img_src;
			}
			if ($output == 'id') {
				$dmb_output_img[] = $dmb_img_id;
			}
		}
	}
	return $dmb_output_img;
}
