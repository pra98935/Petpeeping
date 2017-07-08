/**
 * Plugins jQuery
 *
 */

jQuery(document).ready(function(){
 	jQuery("input.dev_popular_post_reset_btn").click(function(e){
        if(!confirm('Are you sure?')){
            e.preventDefault();
            return false;
        }
        return true;
    });



});//-> End Main Document Ready function