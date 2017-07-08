<?php
/**
 * Plugin Dashboard functions
 */

// If Hide from plugin options
if (dev_get_theme_options('dev_hide_dashboard_widget') == 'on' )
return false;

if ( dev_get_theme_options('dev_post_type_post') != 'on' || dev_get_theme_options('dev_post_type_page') != 'on' ) {

    function dev_add_dashboard_widgets() {
        wp_add_dashboard_widget('dev_admin_statistics','Post View Count Statistics','dev_top_pages_viewed');
    }
    add_action( 'wp_dashboard_setup', 'dev_add_dashboard_widgets' );
     
    // display pages data
    function dev_top_pages_viewed(){

        /**
         * Top Blogs Count
         */

    	if (dev_get_theme_options('dev_post_type_post') != 'on') { // if off blog from plugin theme options
            $top_pages_args = array('post_type' => 'post','post_status' => 'publish','posts_per_page'=> '10','meta_key' => 'dev_post_visits_count_meta','orderby' => array('meta_value_num' => 'DESC'));
            $top_pages_query = new WP_Query( $top_pages_args );
            ?>
            <div class="dev_top_blogs_section post_list_section">
                <h3>Top Blogs Visits</h3>
                <?php $i = 1;
                while ( $top_pages_query->have_posts() ) : $top_pages_query->the_post();
                    global $post; $post_id = $post->ID;
                    echo '<div class="dev_post_list">';
                        echo $i.'.'.'<a href="'.get_the_permalink().'">'.get_the_title().'</a>';

                        $post_counts = get_post_meta( $post_id, 'dev_post_visits_count_meta', true );
                        $post_counts = ($post_counts) ? $post_counts : '0';

                        if ($post_counts > 9999 && $post_counts <= 999999) {
                            $result = $post_counts / 10000 . 'K';
                        } elseif ($post_counts > 999999) {
                            $result = ($post_counts / 1000000) . ' M';
                        } else {
                            $result = $post_counts;
                        }
                        echo '<span class="top-post-count">Visits : '.$result.'</span>';
                    
                    echo '</div>';
                    $i++;
                endwhile;
                wp_reset_query();
                ?>
            </div>

            <?php    
        }

    	/**
         * Top Pages Visits 
         */
        if (dev_get_theme_options('dev_post_type_page') != 'on') { // if off Page from plugin theme options
            $top_pages_args = array('post_type' => 'page','post_status' => 'publish','posts_per_page'=> '10','meta_key' => 'dev_post_visits_count_meta','orderby' => array('meta_value_num' => 'DESC'));
            $top_pages_query = new WP_Query( $top_pages_args );

            if($top_pages_query->have_posts()) :

                ?>
                <div class="dev_top_pages_section post_list_section">
                    <h3>Top Pages Visits</h3>
                    <?php $i = 1;
                    while ( $top_pages_query->have_posts() ) : $top_pages_query->the_post();
                        global $post; $post_id = $post->ID;
                        echo '<div class="dev_post_list">';
                            echo $i.'.'.'<a href="'.get_the_permalink().'">'.get_the_title().'</a>';

                            $post_counts = get_post_meta( $post_id, 'dev_post_visits_count_meta', true );
                            $post_counts = ($post_counts) ? $post_counts : '0';

                            if ($post_counts > 9999 && $post_counts <= 999999) {
                                $result = $post_counts / 10000 . 'K';
                            } elseif ($post_counts > 999999) {
                                $result = ($post_counts / 1000000) . ' M';
                            } else {
                                $result = $post_counts;
                            }
                            echo '<span class="top-post-count">Visits : '.$result.'</span>';
                        echo '</div>';
                        $i++;
                    endwhile;
                    wp_reset_query();
                    ?>
                </div>

           <?php
           endif; // End $top_pages_query
        }
    }
}