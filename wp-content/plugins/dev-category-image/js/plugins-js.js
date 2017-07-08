/**
 * Plugins jquery
 */
jQuery(document).ready(function($) {

	//alert('Hello');

	/* Add Category Image */
	jQuery('.DCI_remove_show_category_img_btn').hide();
    jQuery('.DCI_add_category_img_btn').click(function() {
        var this_var = jQuery(this);
        wp.media.editor.send.attachment = function(props, attachment) {
            this_var.parent().find('.DCI_show_category_img').attr("src",attachment.url); // Set Img src
            this_var.parent().find('.DCI_add_category_img_val').val(attachment.id);// set input type value for image
            this_var.next('.DCI_remove_show_category_img_btn').fadeIn(); // show remove button
            this_var.parent().find('.DCI_show_category_img').fadeIn(); // show img tag
	    }
	    wp.media.editor.open(this);
	    return false;
	});

	// remove image
	jQuery('.DCI_remove_show_category_img_btn').click(function(){
	    var this_var = jQuery(this);
	    this_var.parent().find('.DCI_add_category_img_val').val(''); // remove input type value
	    this_var.parent().find('.DCI_show_category_img').fadeOut(); // hide category image
	    this_var.fadeOut(); // hide remove button
	});


	/* Edit Category  */

	jQuery('.DCI_edit_category_img_btn').click(function() {
        var this_var = jQuery(this);
        wp.media.editor.send.attachment = function(props, attachment) {
            this_var.parent().find('.DCI_edit_show_category_img').attr("src",attachment.url); // Set img src
            //this_var.parent().find('.DCI_edit_show_category_img_val_url').val(attachment.url); // set input type value
            this_var.parent().find('.DCI_edit_show_category_img_val').val(attachment.id); // set input type value

            this_var.parent().find('.DCI_edit_show_category_img').fadeIn(); // show category image 
            this_var.next('.DCI_remove_edit_category_img_btn').fadeIn(); // show remove button
        }
        wp.media.editor.open(this);
        return false;
    });
    // remove image
    jQuery('.DCI_remove_edit_category_img_btn').click(function(){
        var this_var = jQuery(this);
        this_var.parent().find('.DCI_edit_show_category_img').fadeOut(); // hide category image
        this_var.parent().find('.DCI_edit_show_category_img_val').val(''); // remove input type value
        this_var.fadeOut();
    });



});