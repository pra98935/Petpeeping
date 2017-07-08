<?php
/**
 * Fields Type file
 */

class DMOF_Fields_Files{

	public static function file_fields( $id, $name, $desc, $data_type, $get_value ){

		echo '<th class="dmof_title">'.$name.'</th>';

    	echo '<td class="dmof_content">';

    		/**
    		 * Multiple Image Upload
    		 */
    		if($data_type == 'multiple_image'){

    			echo '<div class="dmof_multi_image"><div class="dmof_multi_image_wrap">';
    			echo '<ul class="dmof_multi_images">';
    			if ($get_value) {
					$get_values = explode(",",$get_value);
					foreach ($get_values as $multi_image_id) {
						if ($multi_image_id) {
							echo '<li class="dmof_images_li"><img src="'.wp_get_attachment_image_url( $multi_image_id, 'thumbnail' ).'"><ul class="remove_actions"><li><a href="javascript:void(0)" data-id="'.$multi_image_id.'" class="remove_multi_image" title="Delete image"></a></li></ul></li>';
						}
					}
				}
				echo '</ul>';
				echo '<input name="'.$id.'" value="'.$get_value.'" type="hidden">';
				echo '</div>';
				echo '<p class="dmof_add_multi_image"><a href="javascript:void(0)">Add images</a></p>';
				echo '</div>';

    		}else{

    			$get_value_id = (isset($get_value['id'])) ? $get_value['id'] : '';
    			$get_value_url = (isset($get_value['url'])) ? $get_value['url'] : '';

    			/**
    			 *  File type Image
    			 */
    			echo '<div class="dmof_file_box_div">';
				    
				    // File type Image/Video
    				if($data_type == 'image' || $data_type == 'video'){
					    // File Type Image
					    if($data_type == 'image'){
						    $dmof_get_image_url = wp_get_attachment_image_url( $get_value_id, 'thumbnail' );
						    echo '<div class="dmof_show_image_div">';
						    	if ($dmof_get_image_url) {
						    		echo '<img class="dmof_show_image_url" src="'.$dmof_get_image_url.'"/>';	
						    	}else{
						    		echo '<img class="dmof_show_image_url" src="" style="display:none;" />';
						    	}
						    echo '</div>';
					    }
					    // Video Upload
					    if($data_type == 'video') {
					    	$filename_only = basename( get_attached_file( $get_value_id ) ); // Just the file name
						    if($filename_only){ $filenames_only = '<i class="dashicons-before dashicons-format-video"></i>  '.$filename_only; }else{ $filenames_only = ''; }
						    echo '<p class="dmof_show_video_url">  '.$filenames_only.'</p>';
						}
					}else{ // File Upload
						$filename_only = basename( get_attached_file( $get_value_id ) ); // Just the file name
						if($filename_only){ $filenames_only = '<i class="dashicons-before dashicons-category"></i>  '.$filename_only; }else{ $filenames_only = ''; }
						echo '<div class="dmof_show_other_file_upload">  '.$filenames_only.'</div>';
					}
					
				    /*<!-- Get Upload File Value -->*/
				    echo '<input type="hidden" name="'.$id.'[id]" class="dmof_upload_file_val" value="'.$get_value_id.'" />';
				    /*<!-- Get Upload File Url -->*/
				    echo '<input type="hidden" name="'.$id.'[url]" class="dmof_upload_file_url" value="'.$get_value_url.'" />';
				    
				    echo '<input class="button dmof_upload_file_btn" data-id="'.$data_type.'" type="button" value="Upload" />';
				    
				    if ($get_value_id) {
				    	echo '<input type="button" class="button dmof_remove_file_btn" value="Remove">';
				    }else{
				    	echo '<input type="button" style="display:none;" class="button dmof_remove_file_btn" value="Remove">';
				    }
				
				echo '</div>';

    		echo $desc;

	    	}

	    	echo '</td>';


	}

}