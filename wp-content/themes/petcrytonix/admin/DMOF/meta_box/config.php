<?php
/**
 * Config
 */

add_filter('dmof_add_meta_box','dmb_add_meta_boxes');

function dmb_add_meta_boxes( $meta_boxes ){

    $meta_boxes = '';
	
    $meta_boxes[] = array(
        'id'         	=> 'dmb_pet_extra_data',
        'title'      	=> __( 'Pets Extra Data', 'dmof' ),
        'post_types' 	=> 'pet_profiles',//array('post','page'),
        //'post_id'	 	=> '',
        'priority'	 	=> 'normal',
        'meta_fields'     => array(

            // Pet Color
            array(
                'id'            => 'dmb_pets_color',
                'name'          => __( 'Enter Pet Color', 'dmof' ),
                'type'          => 'text',
                'placeholder'   => esc_html__('White','dmof'),
            ),

            // Pet Breeds
            array(
                'id'            => 'dmb_pets_breed',
                'name'          => __( 'Enter Pet breed', 'dmof' ),
                'type'          => 'text',
                'placeholder'   => esc_html__('Pug','dmof'),
            ),

            // Pet Gender
            array(
                'id'            => 'dmb_pets_gender',
                'name'          => __( 'Male/Female', 'dmof' ),
                'type'          => 'text',
                'placeholder'   => esc_html__('Male/Female','dmof'),
            ),

            // Pet Age
            array(
                'id'            => 'dmb_pets_age',
                'name'          => __( 'Age', 'dmof' ),
                'type'          => 'text',
                'placeholder'   => esc_html__('2','dmof'),
            ),

            // Pet Heights
            array(
                'id'            => 'dmb_pets_height',
                'name'          => __( 'Enter Pet height', 'dmof' ),
                'type'          => 'text',
                'placeholder'   => esc_html__('54in','dmof'),
            ),

            // Pet Weight
            array(
                'id'            => 'dmb_pets_weight',
                'name'          => __( 'Enter Pet weight(kg)', 'dmof' ),
                'type'          => 'text',
                'placeholder'   => esc_html__('15kg','dmof'),
            ),

            // Medical Issues
            array(
                'id'            => 'dmb_pets_medical_issue',
                'name'          => __( 'Pet Medical Issues', 'dmof' ),
                'type'          => 'textarea',
                'placeholder'   => esc_html__('','dmof'),
            ),
        ),
    );

    // Pets Gallery
    $meta_boxes[] = array(
        'id'            => 'dmb_pet_extra_images',
        'title'         => __( 'Pets Images', 'dmof' ),
        'post_types'    => 'pet_profiles',//array('post','page'),
        //'post_id'     => '',
        'priority'      => 'side',
        'meta_fields'     => array(
            // Pet Cover Image
            array(
                'id'            => 'dmb_pets_cover_image',
                'name'          => __( 'Upload Pet cover Images', 'dmof' ),
                'type'          => 'file',
                'data_type'     => 'image',
            ),

            // Pet Gallery
            array(
                'id'            => 'dmb_pets_image_gallery',
                'name'          => __( 'Upload Pet Gallery', 'dmof' ),
                'type'          => 'file',
                'data_type'     => 'multiple_image',
            ),

        ),
    );

    // Home Page Meta Options
    $meta_boxes[] = array(
        'id'            => 'home_page_extra_data',
        'title'         => __( 'Extra Data', 'dmof' ),
        'post_types'    => 'page',//array('post','page'),
        'post_id'       => '29',
        'priority'      => 'normal',
        'meta_fields'   => array(

            // Banner Image
            array(
                'id'            => 'page_meta_banner_image',
                'name'          => __( 'Upload Banner Images', 'dmof' ),
                'type'          => 'file',
                'data_type'     => 'image',
            ),

            // Banner Text
            array(
                'id'            => 'page_meta_banner_content',
                'name'          => __( 'Enter Banner Content', 'dmof' ),
                'type'          => 'wp_editor',
            ),

            // Featured Text
            array(
                'id'            => 'page_meta_featured_content',
                'name'          => __( 'Featured Enter Tilte', 'dmof' ),
                'type'          => 'wp_editor',
            ),

            // Featured Image 1
            array(
                'id'            => 'page_meta_featured_image1',
                'name'          => __( 'upload Image 1', 'dmof' ),
                'type'          => 'file',
                'data_type'     => 'image',
            ),

            // Title 1
            array(
                'id'            => 'page_meta_featured_title1',
                'name'          => __( 'Enter Title 1', 'dmof' ),
                'type'          => 'text',
            ),

            // Content 1
            array(
                'id'            => 'page_meta_featured_content1',
                'name'          => __( 'Enter Content 1', 'dmof' ),
                'type'          => 'textarea',
            ),

            // Featured Image 2
            array(
                'id'            => 'page_meta_featured_image2',
                'name'          => __( 'upload Image 2', 'dmof' ),
                'type'          => 'file',
                'data_type'     => 'image',
            ),

            // Title 2
            array(
                'id'            => 'page_meta_featured_title2',
                'name'          => __( 'Enter Title 2', 'dmof' ),
                'type'          => 'text',
            ),

            // Content 2
            array(
                'id'            => 'page_meta_featured_content2',
                'name'          => __( 'Enter Content 2', 'dmof' ),
                'type'          => 'textarea',
            ),

            // Featured Image 3
            array(
                'id'            => 'page_meta_featured_image3',
                'name'          => __( 'upload Image 3', 'dmof' ),
                'type'          => 'file',
                'data_type'     => 'image',
            ),

            // Title 3
            array(
                'id'            => 'page_meta_featured_title3',
                'name'          => __( 'Enter Title 3', 'dmof' ),
                'type'          => 'text',
            ),

            // Content 3
            array(
                'id'            => 'page_meta_featured_content3',
                'name'          => __( 'Enter Content 3', 'dmof' ),
                'type'          => 'textarea',
            ),

            // Featured Image 4
            array(
                'id'            => 'page_meta_featured_image4',
                'name'          => __( 'upload Image 4', 'dmof' ),
                'type'          => 'file',
                'data_type'     => 'image',
            ),

            // Title 4
            array(
                'id'            => 'page_meta_featured_title4',
                'name'          => __( 'Enter Title 4', 'dmof' ),
                'type'          => 'text',
            ),

            // Content 1
            array(
                'id'            => 'page_meta_featured_content4',
                'name'          => __( 'Enter Content 4', 'dmof' ),
                'type'          => 'textarea',
            ),


            // Our category switch
            array(
                'id'            => 'page_meta_our_category_switch',
                'name'          => __( 'Our Category Switch', 'dmof' ),
                'type'          => 'switch',
            ),
            // Our category switch
            array(
                'id'            => 'page_meta_our_category_title',
                'name'          => __( 'Our Category Title', 'dmof' ),
                'type'          => 'text',
                'default'       => 'our category',
            ),

            // Populor Post switch
            array(
                'id'            => 'page_meta_populor_profile_switch',
                'name'          => __( 'Populor Profile Switch', 'dmof' ),
                'type'          => 'switch',
            ),
            // Populor Profile Text
            array(
                'id'            => 'page_meta_populor_profile_title',
                'name'          => __( 'Populor Profile Title', 'dmof' ),
                'type'          => 'text',
                'default'       => 'Populor Profile',
            ),

            // Recent Post switch
            array(
                'id'            => 'page_meta_recent_post_switch',
                'name'          => __( 'Recent Post Switch', 'dmof' ),
                'type'          => 'switch',
            ),
            // Recent Post Text
            array(
                'id'            => 'page_meta_recent_post_title',
                'name'          => __( 'Recent Post Title', 'dmof' ),
                'type'          => 'text',
                'default'       => 'Recent Post',
            ),

        ),
    );

	return $meta_boxes;
}