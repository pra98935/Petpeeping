<?php 
/**
 * DMB Meta Box all functions in details
 */


/**
 * Get DMB Post meta values
 * @param $meta_id -> Enter the post meta id *required
 * @param $post_id -> Enter the post id // optional
 * @param $param -> Enter the post meta other parameter such as 'image','image_src','video','file'
 * @param $size -> Enter the size of the image, size will work only for 'image' and 'image_src'
 */

dmb_get_post_meta( $meta_id , $post_id = null , $param = null , $size = null);

