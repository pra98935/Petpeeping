<?php
/**
 * Template Name: Create Pet Profile
 *
 */
get_header();

if (is_user_logged_in()) :

    $profile_update = $created_profile = '';

    echo '<h1>Pet Profile</h1>';
    
    $post_id = (isset($_REQUEST['edit_profiles'])) ? $_REQUEST['edit_profiles'] : '';
    $post_id = base64_decode($post_id);

    if (isset($_POST['submit_btn'])) {
        
        $pet_title      = (isset($_POST['title'])) ? $_POST['title'] : '';
        $image          = (isset($_POST['image'])) ? $_POST['image']['id'] : '';
        $cover_image    = (isset($_POST['cover_image'])) ? $_POST['cover_image'] : '';
        $gallery        = (isset($_POST['gallery'])) ? $_POST['gallery'] : '';
        $color          = (isset($_POST['color'])) ? $_POST['color'] : '';
        $breed          = (isset($_POST['breed'])) ? $_POST['breed'] : '';
        $age            = (isset($_POST['age'])) ? $_POST['age'] : '';
        $gender         = (isset($_POST['gender'])) ? $_POST['gender'] : '';
        $height         = (isset($_POST['height'])) ? $_POST['height'] : '';
        $weight         = (isset($_POST['weight'])) ? $_POST['weight'] : '';
        $medical_issue  = (isset($_POST['medical_issue'])) ? $_POST['medical_issue'] : '';
        $categories     = (isset($_POST['categories'])) ? $_POST['categories'] : '';

        if ($pet_title) {

            if ($post_id) {
                // Update post 
                $update_post = array(
                    'ID'           => $post_id,
                    'post_title'   => $pet_title,
                    //'post_content' => '',
                );
                // Update the post into the database
                $post_id = wp_update_post( $update_post );
                // Set featured Image
                set_post_thumbnail( $post_id, $image );
                
                if (is_wp_error($post_id)) {
                    $errors = $post_id->get_error_messages();
                    foreach ($errors as $error) {
                        echo $error;
                    }
                } // wp_error

                $profile_update = 'Profile Sucessfully Updated';

            }else{
                // Insert Data In Job Post

                $job_post = array(
                    'post_title'    => $pet_title,
                    //'post_content'  => '',
                    'post_type'     => 'pet_profiles',
                    'post_status'   => 'publish',
                );
                $post_id = wp_insert_post( $job_post, true ); // Insert the post into the database.
                // Set Featured Image
                set_post_thumbnail( $post_id, $image );

                $created_profile = 'Profile Sucessfully Created';
            }
            
            // Post Types
            wp_set_post_terms($post_id,$categories,'pet_profiles_cat');
           
            // Update Post meta
          
            // Apply with website value
            update_post_meta( $post_id, 'dmb_pets_cover_image', $cover_image );
            update_post_meta( $post_id, 'dmb_pets_image_gallery', $gallery );

            update_post_meta( $post_id, 'dmb_pets_color', $color );
            update_post_meta( $post_id, 'dmb_pets_breed', $breed );
            update_post_meta( $post_id, 'dmb_pets_age', $age );
            update_post_meta( $post_id, 'dmb_pets_gender', $gender );
            update_post_meta( $post_id, 'dmb_pets_height', $height );
            update_post_meta( $post_id, 'dmb_pets_weight', $weight );
            update_post_meta( $post_id, 'dmb_pets_medical_issue', $medical_issue );
            
            //wp_redirect( site_url(),301 ); exit;

    	}else{
            echo 'Please fill all required fields';
        }


    }

/**
 * Edit Pet Profiles
 * Edit only admin/ Author
 */

if (isset($_REQUEST['edit_profiles'])) :

    $post_id =  $_REQUEST['edit_profiles'];
    $post_id = base64_decode($post_id);
    $post_info = get_post($post_id);
    $author_id = (isset($post_info->post_author)) ? $post_info->post_author : '';
    $cur_user_id = get_current_user_id();

    if (!empty($post_id) && $author_id == $cur_user_id ) : ?>

        <?php if(!empty($profile_update)) : ?>
            <div class="alert alert-success text-center">
              <strong>Success!</strong> <?php echo $profile_update; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="" class="my_pet_profiles create-profile-form">
            <!-- Title -->
            <div class="form-group col-md-12">
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" value="<?php echo get_the_title($post_id); ?>" required>
            </div>

            <!-- Color -->
            <div class="form-group col-md-12">
                <input type="text" name="color" class="form-control" id="color" placeholder="Enter color" value="<?php echo dmb_get_post_meta('dmb_pets_color',$post_id); ?>" required>
            </div>
            <!-- Breed -->
            <div class="form-group col-md-12">
                <input type="text" name="breed" class="form-control" id="breed" placeholder="Enter Breed" value="<?php echo dmb_get_post_meta('dmb_pets_breed',$post_id); ?>" required>
            </div>
            <!-- Age -->
            <div class="form-group col-md-12">
                <input type="text" name="age" class="form-control" id="age" placeholder="Enter Age" value="<?php echo dmb_get_post_meta('dmb_pets_age',$post_id); ?>" required>
            </div>
            <!-- Gender -->
            <div class="form-group col-md-12">
                <input type="text" name="gender" class="form-control" id="gender" placeholder="M/F" value="<?php echo dmb_get_post_meta('dmb_pets_gender',$post_id); ?>" required>
            </div>
            <!-- Height -->
            <div class="form-group col-md-12">
                <input type="text" name="height" class="form-control" id="height" placeholder="Enter Height" value="<?php echo dmb_get_post_meta('dmb_pets_height',$post_id); ?>" >
            </div>
            <!-- Weight -->
            <div class="form-group col-md-12">
                <input type="text" name="weight" class="form-control" id="weight" placeholder="Enter Weight" value="<?php echo dmb_get_post_meta('dmb_pets_weight',$post_id); ?>">
            </div>
            <!-- Medical Issues -->
            <div class="form-group col-md-12">
                <!-- <textarea name="medical_issue" class="form-control" id="medical-issues" rows="3">Enter Medical Issues</textarea> -->
                <input type="text" name="medical_issue" class="form-control" id="weight" placeholder="Medical Issue" id="medical-issues" value="<?php echo dmb_get_post_meta('dmb_pets_medical_issue',$post_id); ?>">
            </div>

            <?php $terms = get_terms( array('taxonomy' => 'pet_profiles_cat','hide_empty' => false) ); ?>
            <div class="form-group col-md-12">
                <label for="pet-categories">Categories</label>
                <?php $assig_cats = array();
                $assig_cat = get_the_terms($post_id,'pet_profiles_cat');
                foreach ( $assig_cat as $term ) {
                    $assig_cats[] = $term->term_id;
                }
                ?>
                <div class="checkbox">
                    <?php
                    foreach ($terms as $term) : 
                        $term_id = $term->term_id;
                        if (in_array($term_id, $assig_cats)) {
                            ?><label><input type="checkbox" name="categories[]" value="<?php echo $term->term_id; ?>" checked><span class="label-text"><?php echo $term->name; ?></span></label><?php
                        }else{
                            ?><label><input type="checkbox" name="categories[]" value="<?php echo $term->term_id; ?>"><span class="label-text"><?php echo $term->name; ?></span></label><?php
                        }
                        ?>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Pet Image -->
            <div class="form-group pet-image">
                <label for="pet-image">Pet Image</label>
                <div class="dmof_file_box_div pet-image-inr">
                    <div class="dmof_show_image_div">
                        <?php if (has_post_thumbnail($post_id)) { ?>
                            <img class="dmof_show_image_url" src="<?php echo get_the_post_thumbnail_url($post_id,'medium'); ?>" width="150" height="150" />
                        <?php }else{ ?>
                            <img class="dmof_show_image_url" src="#" style="display:none;" width="150" height="150" />
                        <?php } ?>
                    </div>
                       
                    <!-- Get Upload File Value -->
                    <input type="hidden" name="image[id]" class="dmof_upload_file_val" value="<?php echo get_post_thumbnail_id($post_id); ?>" />
                    <!-- Get Upload File Url -->
                    <input type="hidden" name="image[url]" class="dmof_upload_file_url" value="<?php echo get_the_post_thumbnail_url(); ?>" />
                    <!-- Upload Buton -->
                    <input class="button dmof_upload_file_btn" data-id="image" type="button" value="Upload" />
                    
                    <?php if(has_post_thumbnail($post_id)) { ?>
                        <input type="button" class="button dmof_remove_file_btn" value="Remove">
                    <?php }else{ ?>
                        <input type="button" style="display:none;" class="button dmof_remove_file_btn" value="Remove">
                    <?php } ?>
                
                </div>
            </div>
            
            <!-- Pet Cove Image -->
            <div class="form-group cover-image">
                <label for="cover-image">Pet Cover Image</label>
                <div class="dmof_file_box_div">
                    <div class="dmof_show_image_div">
                
                    <?php
                    $cover_img_id   = dmb_get_post_meta('dmb_pets_cover_image',$post_id);
                    $cover_img_url  = (!empty($cover_img_id)) ? $cover_img_id['url'] : '';
                    $cover_img_id   = (!empty($cover_img_id)) ? $cover_img_id['id'] : '';
                        
                    if ($cover_img_url) {
                        echo '<img class="dmof_show_image_url" src="'.$cover_img_url.'" width="150" height="150"/>';    
                    }else{
                        echo '<img class="dmof_show_image_url" src="#" style="display:none;" width="150" height="150"/>';
                    }
                    echo '</div>';
                       
                    /*<!-- Get Upload File Value -->*/
                    echo '<input type="hidden" name="cover_image[id]" class="dmof_upload_file_val" value="'.$cover_img_id.'" />';
                    /*<!-- Get Upload File Url -->*/
                    echo '<input type="hidden" name="cover_image[url]" class="dmof_upload_file_url" value="'.$cover_img_url.'" />';
                    
                    echo '<input class="button dmof_upload_file_btn" data-id="image" type="button" value="Upload" />';
                    
                    if ($cover_img_id) {
                        echo '<input type="button" class="button dmof_remove_file_btn" value="Remove">';
                    }else{
                        echo '<input type="button" style="display:none;" class="button dmof_remove_file_btn" value="Remove">';
                    }
                
                ?>
                </div>
            </div>

            <!-- Pet Gallery -->
            <div class="form-group gallery-pet">
                <label for="gallery">Gallery</label>
                <div class="dmof_multi_image"><div class="dmof_multi_image_wrap">
                    <ul class="dmof_multi_images">
                <?php
                $gallery_ids = dmb_get_post_meta('dmb_pets_image_gallery',$post_id);
                if($gallery_ids) {
                    $get_values = explode(",",$gallery_ids);
                    foreach ($get_values as $multi_image_id) {
                        if ($multi_image_id) {
                            echo '<li class="dmof_images_li"><img src="'.wp_get_attachment_image_url( $multi_image_id, 'thumbnail' ).'"><ul class="remove_actions"><li><a href="javascript:void(0)" data-id="'.$multi_image_id.'" class="remove_multi_image" title="Delete image">X</a></li></ul></li>';
                        }
                    }
                }
                echo '</ul>';
                echo '<input name="gallery" value="'.$gallery_ids.'" type="hidden">';
                echo '</div>';
                echo '<p class="dmof_add_multi_image"><a href="javascript:void(0)">Add images</a></p>';
                echo '</div>';
            ?>
            </div>

            <div class="form-group btn-profile">
              <button type="submit" name="submit_btn" class="btn btn-default create-profile-btn">Submit</button>
            </div>
        </form>

    <?php else: ?>
        <?php echo 'You Don\'t have permission to access this page'; ?>
    <?php endif; ?>

<?php else: ?>

    <?php if(!empty($created_profile)) : ?>
        <div class="alert alert-success text-center">
          <strong>Success!</strong> <?php echo $created_profile; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="" class="my_pet_profiles create-profile-form">
        <!-- Title -->
        <div class="form-group col-md-12">
            <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" required>
        </div>

        <!-- Color -->
        <div class="form-group col-md-12">
            <input type="text" name="color" class="form-control" id="color" placeholder="Enter color" required>
        </div>
        <!-- Breed -->
        <div class="form-group col-md-12">
            <input type="text" name="breed" class="form-control" id="breed" placeholder="Enter Breed" required>
        </div>
        <!-- Age -->
        <div class="form-group col-md-12">
            <input type="text" name="age" class="form-control" id="age" placeholder="Enter Age" required>
        </div>
        <!-- Gender -->
        <div class="form-group col-md-12">
            <input type="text" name="gender" class="form-control" id="gender" placeholder="M/F">
        </div>
        <!-- Height -->
        <div class="form-group col-md-12">
            <input type="text" name="height" class="form-control" id="height" placeholder="Enter Height">
        </div>
        <!-- Weight -->
        <div class="form-group col-md-12">
            <input type="text" name="weight" class="form-control" id="weight" placeholder="Enter Weight">
        </div>
        <!-- Medical Issues -->
        <div class="form-group col-md-12">
            <!-- <textarea name="medical_issue" class="form-control" id="medical-issues" rows="3">Enter Medical Issues</textarea> -->
            <input type="text" name="medical_issue" class="form-control" id="weight" placeholder="Medical Issue" id="medical-issues">
        </div>

        <?php $terms = get_terms( array('taxonomy' => 'pet_profiles_cat','hide_empty' => false) ); ?>
        <div class="form-group col-md-12">
            <label for="pet-categories">Categories</label>
            <div class="checkbox">
                <?php foreach ($terms as $term) : ?>
                    <label><input type="checkbox" name="categories[]" value="<?php echo $term->term_id; ?>"><span class="label-text"><?php echo $term->name; ?></span></label>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Pet Image -->
        <div class="form-group pet-image">
            <label for="pet-image">Pet Image</label>
            <!-- <input type="file" name="image" class="form-control" id="pet_image"> -->
        
        
            <?php 
                /**
                 *  File type Image
                 */
                echo '<div class="dmof_file_box_div pet-image-inr">';
                    
                $get_value_id = '';
                $dmof_get_image_url = wp_get_attachment_image_url( $get_value_id, 'thumbnail' );
                echo '<div class="dmof_show_image_div">';
                    if ($dmof_get_image_url) {
                        echo '<img class="dmof_show_image_url" src="'.$dmof_get_image_url.'"/>';    
                    }else{
                        echo '<img class="dmof_show_image_url" src="#" style="display:none;" />';
                    }
                echo '</div>';
                   
                /*<!-- Get Upload File Value -->*/
                echo '<input type="hidden" name="image[id]" class="dmof_upload_file_val" value="'.$get_value_id.'" />';
                /*<!-- Get Upload File Url -->*/
                echo '<input type="hidden" name="image[url]" class="dmof_upload_file_url" value="'.$get_value_url.'" />';
                
                echo '<input class="button dmof_upload_file_btn" data-id="image" type="button" value="Upload" />';
                
                if ($get_value_id) {
                    echo '<input type="button" class="button dmof_remove_file_btn" value="Remove">';
                }else{
                    echo '<input type="button" style="display:none;" class="button dmof_remove_file_btn" value="Remove">';
                }
            
            echo '</div>';
        ?>
        </div>
        
        <!-- Pet Cove Image -->
        <div class="form-group cover-image">
            <label for="cover-image">Pet Cover Image</label>
            <!-- <input type="file" name="cover-image" class="form-control" id="cover-image"> -->
            <?php 
            echo '<div class="dmof_file_box_div">';
                    
                $get_value_id = '';
                $dmof_get_image_url = wp_get_attachment_image_url( $get_value_id, 'thumbnail' );
                echo '<div class="dmof_show_image_div">';
                    if ($dmof_get_image_url) {
                        echo '<img class="dmof_show_image_url" src="'.$dmof_get_image_url.'"/>';    
                    }else{
                        echo '<img class="dmof_show_image_url" src="#" style="display:none;" />';
                    }
                echo '</div>';
                   
                /*<!-- Get Upload File Value -->*/
                echo '<input type="hidden" name="cover_image[id]" class="dmof_upload_file_val" value="'.$get_value_id.'" />';
                /*<!-- Get Upload File Url -->*/
                echo '<input type="hidden" name="cover_image[url]" class="dmof_upload_file_url" value="'.$get_value_url.'" />';
                
                echo '<input class="button dmof_upload_file_btn" data-id="image" type="button" value="Upload" />';
                
                if ($get_value_id) {
                    echo '<input type="button" class="button dmof_remove_file_btn" value="Remove">';
                }else{
                    echo '<input type="button" style="display:none;" class="button dmof_remove_file_btn" value="Remove">';
                }
            
            echo '</div>';
            ?>
        </div>

        <!-- Pet Gallery -->
        <div class="form-group gallery-pet">
            <label for="gallery">Gallery</label>
            <!-- <input type="file" name="gallery" class="form-control" id="gallery"> -->
        
        <?php
            echo '<div class="dmof_multi_image"><div class="dmof_multi_image_wrap">';
            echo '<ul class="dmof_multi_images">';
            if ($get_value) {
                $get_values = explode(",",$get_value);
                foreach ($get_values as $multi_image_id) {
                    if ($multi_image_id) {
                        echo '<li class="dmof_images_li"><img src="'.wp_get_attachment_image_url( $multi_image_id, 'thumbnail' ).'"><ul class="remove_actions"><li><a href="javascript:void(0)" data-id="'.$multi_image_id.'" class="remove_multi_image" title="Delete image">X</a></li></ul></li>';
                    }
                }
            }
            echo '</ul>';
            echo '<input name="gallery" value="'.$get_value.'" type="hidden">';
            echo '</div>';
            echo '<p class="dmof_add_multi_image"><a href="javascript:void(0)">Add images</a></p>';
            echo '</div>';
        ?>
        </div>

        <div class="form-group btn-profile">
          <button type="submit" name="submit_btn" class="btn btn-default create-profile-btn">Submit</button>
        </div>
    </form>

<?php endif; ?>


    <script type="text/javascript">
        /* Only Image Upload */
        jQuery('.dmof_upload_file_btn').click(function() {
            
            var this_var = jQuery(this);

            data_type = this_var.attr('data-id');
            
            frame = wp.media({library: { type: data_type,},multiple: false });
            // Show selected Images
            frame.on('open',function() {
                ids = jQuery('.dmof_upload_file_val').val().split(',');
                ids.forEach(function(id) {
                    attachment = wp.media.attachment(id);
                    attachment.fetch();
                    frame.state().get('selection').add( attachment ? [ attachment ] : [] );
                });
            });
            // Select New Images
            frame.on( 'select', function() {
                frame.state().get('selection').map( function( attachment ) {
                    attachment = attachment.toJSON();
                    // Data Type Images
                    if (data_type == 'image') {
                        if (attachment.sizes && attachment.sizes.medium) {
                            this_var.parents('.dmof_file_box_div').find('.dmof_show_image_url').attr("src",attachment.sizes.thumbnail.url); // Set Img src
                        }else{
                            this_var.parents('.dmof_file_box_div').find('.dmof_show_image_url').attr("src",attachment.url); // Set Img src
                        }
                        this_var.parents('.dmof_file_box_div').find('.dmof_show_image_url').fadeIn(); // Show Image
                    }else if (data_type == 'video') {// video upload
                            this_var.parents('.dmof_file_box_div').find('.dmof_show_video_url').val(attachment.url); // Set Video src
                            this_var.parents('.dmof_file_box_div').find('.dmof_show_video_url').html(attachment.filename); // Video Name
                            this_var.parents('.dmof_file_box_div').find('.dmof_show_video_url').fadeIn(); // Show Video
                    }else{ // other file upload
                        this_var.parents('.dmof_file_box_div').find('.dmof_show_other_file_upload').val(attachment.url); // Set Video src
                        this_var.parents('.dmof_file_box_div').find('.dmof_show_other_file_upload').html(attachment.filename); // File Name
                        this_var.parents('.dmof_file_box_div').find('.dmof_show_other_file_upload').fadeIn(); // Show File
                    }

                    this_var.parents('.dmof_file_box_div').find('.dmof_upload_file_val').val(attachment.id);// set input type value for image
                    this_var.parents('.dmof_file_box_div').find('.dmof_upload_file_url').val(attachment.url);// set input type value for image url
                    this_var.parents('.dmof_file_box_div').find('.dmof_remove_file_btn').fadeIn(); // show remove button

                }).join();
            });

            frame.open();
            // return false;
        });

        // remove image
        jQuery('.dmof_remove_file_btn').click(function(){
            var this_var = jQuery(this);
            
            this_var.parents('.dmof_file_box_div').find('.dmof_show_image_url').fadeOut(''); // remove Image
            this_var.parents('.dmof_file_box_div').find('.dmof_show_video_url').fadeOut(''); // remove Image
            this_var.parents('.dmof_file_box_div').find('.dmof_show_other_file_upload').fadeOut(''); // remove Image

            this_var.parents('.dmof_file_box_div').find('.dmof_upload_file_val').val(''); // remove File value
            this_var.parents('.dmof_file_box_div').find('.dmof_upload_file_url').val(''); // remove File url
            
            this_var.fadeOut(); // hide remove button
        });


        /**
         * Add Multiple Images
         */
        
        jQuery('.dmof_add_multi_image').click(function() {
            
            var this_var = jQuery(this);

            wp.media.editor.send.attachment = function(props, attachment) {
                
                // image uplaod
                if (attachment.type == 'image') {
                    
                    if (attachment.sizes && attachment.sizes.medium) {
                        this_var.parents('.dmof_multi_image').find('.dmof_multi_image_wrap ul.dmof_multi_images').append("<li class='dmof_images_li'><img src="+attachment.sizes.thumbnail.url+"><ul class='remove_actions'><li><a href='javascript:void(0)' data-id="+attachment.id+" class='remove_multi_image' title='Delete image'>X</a></li></ul></li>"); // Set Img src
                    }else{
                        this_var.parents('.dmof_multi_image').find('.dmof_multi_image_wrap ul.dmof_multi_images').append("<li class='dmof_images_li'><img src="+attachment.url+"><ul class='remove_actions'><li><a href='javascript:void(0)' data-id="+attachment.id+" class='remove_multi_image' title='Delete image'>X</a></li></ul></li>"); // Set Img src
                    }
                    this_var.parents('.dmof_multi_image').find('.dmof_show_image_url').fadeIn(); // Show Image
                }
                
                var input_val = this_var.parents('.dmof_multi_image').find('.dmof_multi_image_wrap input');
                if (input_val.val() == '' ) {
                    input_val.val(attachment.id); // set input type value for if no value
                }else{
                    input_val.val(input_val.val()+","+attachment.id); // set input type value for image
                }
                this_var.parents('.dmof_multi_image').find('.dmof_remove_file_btn').fadeIn(); // show remove button
            }
            wp.media.editor.open(this);
            return false;
        });
        
        // Remove upload image

        jQuery('.dmof_multi_image').on('click', '.remove_multi_image', function(){
            
            var this_elem = jQuery(this);
            var data_id = this_elem.data('id');
            var input_val = jQuery('.dmof_multi_image .dmof_multi_image_wrap > input').val();

            if(input_val.indexOf(data_id+",") != -1){
                var rplce_val =  input_val.replace(data_id+",", "");
            }else{
                var rplce_val =  input_val.replace(data_id, "");
            }
            
            //var rplce_val =  input_val.replace(data_id, "");
            jQuery('.dmof_multi_image .dmof_multi_image_wrap > input').val(rplce_val);

            this_elem.parents('li.dmof_images_li').fadeOut( function() { jQuery(this).remove(); });//remove();

        });
    </script>



<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.validate.min.js"></script>

<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery(".my_pet_profiles").validate();
      // rules: {
      //   // simple rule, converted to {required:true}
      //   name: "required",
      //   // compound rule
      //   email: {
      //     required: true,
      //     email: true
      //   }
      // }
    //});
});
</script>

<?php else: ?>
    <?php require get_404_template(); ?>
<?php endif; //-> End is_user_logged_in() ?>
<?php get_footer(); ?>