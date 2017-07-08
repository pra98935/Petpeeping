/**
 * Dmof Framework styles
 * Author Devkaran Patidar
 */

/**
 * File Upload Query
 */
jQuery(document).ready(function($) {

	/* Add Category Image */
	// jQuery('.dmof_upload_file_btn1').click(function() {
        
 //        var this_var = jQuery(this);

 //        wp.media.editor.send.attachment = function(props, attachment) {
 //            /**
 //             * If Image and video upload else upload other file
 //             */
 //            if (attachment.type == 'video' || attachment.type == 'image') {
 //            	// image uplaod
	//             if (attachment.type == 'image') {
	            	
	// 	           	if (attachment.sizes && attachment.sizes.medium) {
	// 	            	this_var.parents('.dmof_file_box_div').find('.dmof_show_image_url').attr("src",attachment.sizes.thumbnail.url); // Set Img src
	// 	            }else{
	// 	            	this_var.parents('.dmof_file_box_div').find('.dmof_show_image_url').attr("src",attachment.url); // Set Img src
	// 	            }
	// 	            this_var.parents('.dmof_file_box_div').find('.dmof_show_image_url').fadeIn(); // Show Image
	//             }
	//             // video upload
	//             if (attachment.type == 'video') {
	// 	            this_var.parents('.dmof_file_box_div').find('.dmof_show_video_url').val(attachment.url); // Set Video src
	// 	            this_var.parents('.dmof_file_box_div').find('.dmof_show_video_url').html(attachment.filename); // Video Name
	// 	            this_var.parents('.dmof_file_box_div').find('.dmof_show_video_url').fadeIn(); // Show Video
	//             }
 //            }else{ // other file upload
 //            	this_var.parents('.dmof_file_box_div').find('.dmof_show_other_file_upload').val(attachment.url); // Set Video src
	// 	        this_var.parents('.dmof_file_box_div').find('.dmof_show_other_file_upload').html(attachment.filename); // File Name
	// 	        this_var.parents('.dmof_file_box_div').find('.dmof_show_other_file_upload').fadeIn(); // Show File
 //            }
            
 //            this_var.parents('.dmof_file_box_div').find('.dmof_upload_file_val').val(attachment.id);// set input type value for image
 //            this_var.parents('.dmof_file_box_div').find('.dmof_upload_file_url').val(attachment.url);// set input type value for image url
 //            this_var.parents('.dmof_file_box_div').find('.dmof_remove_file_btn').fadeIn(); // show remove button
	//     }
	//     wp.media.editor.open(this);
	//     return false;
	// });

	

	/* Multi image upload */

	/* code js muliple image upload in wp */
	// jQuery('.dmof_add_multi_image_btn').click(function() {
	// 	$('.dmof_show_multi_image').show();
	// 	frame = wp.media({library: { type: 'image',},multiple: true });

	// 	frame.on('open',function() {
	// 		var selection = frame.state().get('selection');
	// 		ids = jQuery('.dmof_multiimage_value').val().split(',');
	// 		ids.forEach(function(id) {
	// 			attachment = wp.media.attachment(id);
	// 			attachment.fetch();
	// 			selection.add( attachment ? [ attachment ] : [] );
	// 		});
	// 	});


	// 	frame.on( 'select', function() {

	// 		var selection = frame.state().get('selection');
	// 		// Place IDs in custom field
	// 		var attachment_ids = selection.map( function( attachment ) {
	// 		attachment = attachment.toJSON();
	// 		return attachment.id;
	// 		}).join();
	// 		if( attachment_ids.charAt(0) === ',' ) { attachment_ids = attachment_ids.substring(1); }
	// 		$('.dmof_multiimage_value').val( attachment_ids );

	// 		var attachment_thumbs = selection.map( function( attachment ) {
	// 		attachment = attachment.toJSON();
	// 		if( attachment.id != '' ) { return '<img src="' + attachment.sizes.thumbnail.url + '" id="id-' + attachment.id + '" />'; }
	// 		}).join(' ');

	// 		$('#images-feedback').show();
	// 		$('#thumbs').html(attachment_thumbs);
	// 		$('.dmof_show_multi_image').hide();
	// 	});

	// 	frame.open();
	// 	// return false;

	// });

	


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
	            	this_var.parents('.dmof_multi_image').find('.dmof_multi_image_wrap ul.dmof_multi_images').append("<li class='dmof_images_li'><img src="+attachment.sizes.thumbnail.url+"><ul class='remove_actions'><li><a href='javascript:void(0)' data-id="+attachment.id+" class='remove_multi_image' title='Delete image'></a></li></ul></li>"); // Set Img src
	            }else{
	            	this_var.parents('.dmof_multi_image').find('.dmof_multi_image_wrap ul.dmof_multi_images').append("<li class='dmof_images_li'><img src="+attachment.url+"><ul class='remove_actions'><li><a href='javascript:void(0)' data-id="+attachment.id+" class='remove_multi_image' title='Delete image'></a></li></ul></li>"); // Set Img src
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

	/**
	 * Range SLider
	 */

	var rangeSlider = function(){
		var slider = $('.range-slider'),
		range = $('.range-slider__range'),
		value = $('.range-slider__value');

		slider.each(function(){

			value.each(function(){
				var value = $(this).prev().attr('value');
				$(this).html(value);
			});

			range.on('input', function(){
				$(this).next(value).html(this.value);
			});
		});
	};
	rangeSlider();

	/**
	 * Add more fields js
	 */
	 
	var maxField = 10; //Input fields increment limitation
	var addButton = jQuery('.dmof_add_button'); //Add button selector
	var wrapper = jQuery('.field_wrapper'); //Input field wrapper
	var x = 1; //Initial field counter is 1
	jQuery(addButton).click(function(){ //Once add button is clicked
		var name = jQuery(this).parent('.dmof_add_more_fields').find('input').attr('name');
		if(x < maxField){ //Check maximum number of input fields
			x++; //Increment field counter
			jQuery(wrapper).append( '<div class="dmof_add_more_fields"><input type="text" name="'+name+'" value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field"></a></div>' ); // Add field html
		}
	});
	jQuery(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
		e.preventDefault();
		jQuery(this).parent('div').slideUp("normal", function() {
			jQuery(this).remove();
		});
		//jQuery(this).parent('div').slideUp().remove(); //Remove field html
		x--; //Decrement field counter
	});
    

	/**
	 * Color Picker Jquery
	 */
	jQuery('.dmof_content .dmof_color_picker').each(function(){
	    jQuery(this).wpColorPicker();
	});

	/**
	 * Select 2 jquery
	 */

	jQuery(".dmof_select_options_example").select2({
	  	placeholder: "Select a state",
	  	allowClear: true,
	  	theme: "classic"
	});

	/**
	 * switch and checkbox value
	 */

	jQuery('.dmof_content .dmof_switch input[type=checkbox]').on('click',function(){
	 	
	 	var this_var = jQuery(this);

	 	var switch_val = this_var.prev('.dmof_switch_hidden').val();

	 	if (switch_val == 1) {
	 		this_var.prev('.dmof_switch_hidden').val('0');
	 	}else{
	 		this_var.prev('.dmof_switch_hidden').val('1');
	 	}

	});




/**
 * Theme Options Scripts
 */
 	/**
	 * submit theme options data
	 */

	jQuery('#dmof_theme_options_form').submit(function(event){
		event.preventDefault();
		
		jQuery('.dmof_options_content .dmof_save_option').append( '<img class="dmof_loder_img" src="'+dmof_ajax_object.site_url+'/wp-admin/images/spinner.gif" />' );
		jQuery('.dmof_options_content table.widefat').css("opacity","0.5");

		var this_var = jQuery(this);
		var options_values = this_var.serialize();

		jQuery.ajax({
			type : "POST",
			url  : dmof_ajax_object.ajax_url,
			data : {
				action : 'dmof_save_theme_options',
				options_values : options_values,
			},

			dataType: "json",
			
			success: function(data){
				if (data.type == 'sucess') {
					jQuery('.dmof_msg_notifi_sec').slideDown();
					jQuery('.dmof_save_options_msg').html(data.msg);
					jQuery('.dmof_options_content table.widefat').css("opacity","1");
					jQuery('.dmof_options_content .dmof_save_option .dmof_loder_img').remove();

					setTimeout(function(){ jQuery('.dmof_msg_notifi_sec').slideUp(); }, 3000);
				}
			}
		})
	});

	/**
	 * Reset Theme Options
	 */
	jQuery('#dmof_reset_all_options').on('click',function(){

		if (confirm('Reset All Theme options')) {
		
			jQuery('.dmof_options_content .dmof_save_option').append( '<img class="dmof_loder_img" src="'+dmof_ajax_object.site_url+'/wp-admin/images/spinner.gif" />' );
			jQuery('.dmof_options_content table.widefat').css("opacity","0.5");

			jQuery.ajax({
				type : "POST",
				url  : dmof_ajax_object.ajax_url,
				data : {
					action : 'dmof_reset_all_options',
				},

				dataType: "json",
				
				success: function(data){
					if (data.type == 'sucess') {
						jQuery('.dmof_msg_notifi_sec').slideDown();
						jQuery('.dmof_save_options_msg').html(data.msg);
						jQuery('.dmof_options_content .dmof_save_option .dmof_loder_img').remove();
						location.reload();
					}
				}
			})   
		}// end confirm box
	});



	/**
	 * Import data
	 */
	//jQuery('#dmof_import_old_btn').on('click',function(event){
	jQuery('form.import-data-form').submit(function(event){

		event.preventDefault();

		var import_data =  jQuery('#dmof_import_old_data').val();
			jQuery('#dmof_import_old_btn').next('span').show();
		if (import_data == '') {
			jQuery('#dmof_import_old_btn').next('span').html('Enter Valid Data');

		}else{

			jQuery('.dmof_options_content .dmof_save_option').append( '<img class="dmof_loder_img" src="'+dmof_ajax_object.site_url+'/wp-admin/images/spinner.gif" />' );
			jQuery('.dmof_options_content table.widefat').css("opacity","0.5");

			var this_var = jQuery(this);
			var import_data = this_var.serialize();
			
			jQuery.ajax({
				type : "POST",
				url  : dmof_ajax_object.ajax_url,
				data : {
					action : 'dmof_import_old_data',
					import_data : import_data,
				},
				//dataType: "json",
				
				success: function(data){
					
					//if (data.type == 'sucess') {
						jQuery('.dmof_msg_notifi_sec').slideDown();
						jQuery('.dmof_save_options_msg').html(data.msg);
						jQuery('.dmof_options_content .dmof_save_option .dmof_loder_img').remove();
						location.reload();
					//}
				}
			})
		}
	});

	// switch required scripts
	jQuery('.dmof_content .dmof_switch input').on('click',function(){

		var this_var_val = jQuery(this).prev().val();

		var self_id = jQuery(this).parents('tr.dmof_options_fields').data('id');

		if (this_var_val == 1) {
			jQuery('tr.dmof_options_fields').each(function() {
				var this_li = jQuery(this);
				var data_id = jQuery(this).data('parent');

				if (data_id == self_id) {
					//tr[data-id=dmof_meta_switch_test]
					this_li.show();
				}
			});
		}else{
			jQuery('tr.dmof_options_fields').each(function() {
				var this_li = jQuery(this);
				var data_id = jQuery(this).data('parent');

				if (data_id == self_id) {
					//tr[data-id=dmof_meta_switch_test]
					this_li.hide();
				}
			});
		}

	});

	/**
	 * Easy Responsive Tabs Plugin
	 */
	// Author: Samson.Onna <Email : samson3d@gmail.com> 
	(function ($) {
	    jQuery.fn.extend({
	        easyResponsiveTabs: function (options) {
	            //Set the default values, use comma to separate the settings, example:
	            var defaults = {
	                type: 'default', //default, vertical, accordion;
	                width: 'auto',
	                fit: true,
	                closed: false,
	                tabidentify: '',
	                activetab_bg: '#1abc9c',
	                inactive_bg: '#F5F5F5',
	                active_border_color: '#c1c1c1',
	                active_content_border_color: '#c1c1c1',
	                activate: function () {
	                }
	            }
	            //Variables
	            var options = $.extend(defaults, options);
	            var opt = options, jtype = opt.type, jfit = opt.fit, jwidth = opt.width, vtabs = 'vertical', accord = 'accordion';
	            var hash = window.location.hash;
	            var historyApi = !!(window.history && history.replaceState);

	            //Events
	            $(this).bind('tabactivate', function (e, currentTab) {
	                if (typeof options.activate === 'function') {
	                    options.activate.call(currentTab, e)
	                }
	            });

	            //Main function
	            this.each(function () {
	                var $respTabs = $(this);
	                var $respTabsList = $respTabs.find('ul.resp-tabs-list.' + options.tabidentify);
	                var respTabsId = $respTabs.attr('id');
	                $respTabs.find('ul.resp-tabs-list.' + options.tabidentify + ' li').addClass('resp-tab-item').addClass(options.tabidentify);
	                $respTabs.css({
	                    'display': 'block',
	                    'width': jwidth
	                });

	                if (options.type == 'vertical')
	                    $respTabsList.css('margin-top', '3px');

	                $respTabs.find('.resp-tabs-container.' + options.tabidentify).css('border-color', options.active_content_border_color);
	                $respTabs.find('.resp-tabs-container.' + options.tabidentify + ' > form div.dmof_content_sec,.resp-tabs-container.' + options.tabidentify + ' > div.dmof_content_sec').addClass('resp-tab-content').addClass(options.tabidentify);
	                jtab_options();
	                //Properties Function
	                function jtab_options() {
	                    if (jtype == vtabs) {
	                        $respTabs.addClass('resp-vtabs').addClass(options.tabidentify);
	                    }
	                    if (jfit == true) {
	                        $respTabs.css({ width: '100%', margin: '0px' });
	                    }
	                    if (jtype == accord) {
	                        $respTabs.addClass('resp-easy-accordion').addClass(options.tabidentify);
	                        $respTabs.find('.resp-tabs-list').css('display', 'none');
	                    }
	                }

	                //Assigning the h2 markup to accordion title
	                var $tabItemh2;
	                $respTabs.find('.resp-tab-content.' + options.tabidentify).before("<h2 class='resp-accordion " + options.tabidentify + "' role='tab'><span class='resp-arrow'></span></h2>");

	                $respTabs.find('.resp-tab-content.' + options.tabidentify).prev("h2").css({
	                    /*'background-color': options.inactive_bg,*/
	                    /*'border-color': options.active_border_color*/
	                });

	                var itemCount = 0;
	                $respTabs.find('.resp-accordion').each(function () {
	                    $tabItemh2 = $(this);
	                    var $tabItem = $respTabs.find('.resp-tab-item:eq(' + itemCount + ')');
	                    var $accItem = $respTabs.find('.resp-accordion:eq(' + itemCount + ')');
	                    $accItem.append($tabItem.html());
	                    $accItem.data($tabItem.data());
	                    $tabItemh2.attr('aria-controls', options.tabidentify + '_tab_item-' + (itemCount));
	                    itemCount++;
	                });

	                //Assigning the 'aria-controls' to Tab items
	                var count = 0,
	                    $tabContent;
	                $respTabs.find('.resp-tab-item').each(function () {
	                    $tabItem = $(this);
	                    $tabItem.attr('aria-controls', options.tabidentify + '_tab_item-' + (count));
	                    $tabItem.attr('role', 'tab');
	                    $tabItem.css({
	                        /*'background-color': options.inactive_bg,*/
	                        /*'border-color': 'none'*/
	                    });

	                    //Assigning the 'aria-labelledby' attr to tab-content
	                    var tabcount = 0;
	                    $respTabs.find('.resp-tab-content.' + options.tabidentify).each(function () {
	                        $tabContent = $(this);
	                        $tabContent.attr('aria-labelledby', options.tabidentify + '_tab_item-' + (tabcount)).css({
	                            /*'border-color': options.active_border_color*/
	                        });
	                        tabcount++;
	                    });
	                    count++;
	                });

	                // Show correct content area
	                var tabNum = 0;
	                if (hash != '') {
	                    var matches = hash.match(new RegExp(respTabsId + "([0-9]+)"));
	                    if (matches !== null && matches.length === 2) {
	                        tabNum = parseInt(matches[1], 10) - 1;
	                        if (tabNum > count) {
	                            tabNum = 0;
	                        }
	                    }
	                }

	                //Active correct tab
	                $($respTabs.find('.resp-tab-item.' + options.tabidentify)[tabNum]).addClass('resp-tab-active').css({
	                    /*'background-color': options.activetab_bg,*/
	                    /*'border-color': options.active_border_color*/
	                });

	                //keep closed if option = 'closed' or option is 'accordion' and the element is in accordion mode
	                if (options.closed !== true && !(options.closed === 'accordion' && !$respTabsList.is(':visible')) && !(options.closed === 'tabs' && $respTabsList.is(':visible'))) {
	                    $($respTabs.find('.resp-accordion.' + options.tabidentify)[tabNum]).addClass('resp-tab-active').css({
	                        /*'background-color': options.activetab_bg + ' !important',*/
	                        /*'border-color': options.active_border_color,*/
	                        /*'background': 'none'*/
	                    });

	                    $($respTabs.find('.resp-tab-content.' + options.tabidentify)[tabNum]).addClass('resp-tab-content-active').addClass(options.tabidentify).attr('style', 'display:block');
	                }
	                //assign proper classes for when tabs mode is activated before making a selection in accordion mode
	                else {
	                   // $($respTabs.find('.resp-tab-content.' + options.tabidentify)[tabNum]).addClass('resp-accordion-closed'); //removed resp-tab-content-active
	                }

	                //Tab Click action function
	                $respTabs.find("[role=tab]").each(function () {

	                    var $currentTab = $(this);
	                    $currentTab.click(function () {

	                        var $currentTab = $(this);
	                        var $tabAria = $currentTab.attr('aria-controls');

	                        if ($currentTab.hasClass('resp-accordion') && $currentTab.hasClass('resp-tab-active')) {
	                            $respTabs.find('.resp-tab-content-active.' + options.tabidentify).slideUp('', function () {
	                                $(this).addClass('resp-accordion-closed');
	                            });
	                            $currentTab.removeClass('resp-tab-active').css({
	                                /*'background-color': options.inactive_bg,*/
	                                /*'border-color': 'none'*/
	                            });
	                            return false;
	                        }
	                        if (!$currentTab.hasClass('resp-tab-active') && $currentTab.hasClass('resp-accordion')) {
	                            $respTabs.find('.resp-tab-active.' + options.tabidentify).removeClass('resp-tab-active').css({
	                                /*'background-color': options.inactive_bg,*/
	                                /*'border-color': 'none'*/
	                            });
	                            $respTabs.find('.resp-tab-content-active.' + options.tabidentify).slideUp().removeClass('resp-tab-content-active resp-accordion-closed');
	                            $respTabs.find("[aria-controls=" + $tabAria + "]").addClass('resp-tab-active').css({
	                                /*'background-color': options.activetab_bg,*/
	                                /*'border-color': options.active_border_color*/
	                            });

	                            $respTabs.find('.resp-tab-content[aria-labelledby = ' + $tabAria + '].' + options.tabidentify).slideDown().addClass('resp-tab-content-active');
	                        } else {
	                            console.log('here');
	                            $respTabs.find('.resp-tab-active.' + options.tabidentify).removeClass('resp-tab-active').css({
	                                /*'background-color': options.inactive_bg,*/
	                                /*'border-color': 'none'*/
	                            });

	                            $respTabs.find('.resp-tab-content-active.' + options.tabidentify).removeAttr('style').removeClass('resp-tab-content-active').removeClass('resp-accordion-closed');

	                            $respTabs.find("[aria-controls=" + $tabAria + "]").addClass('resp-tab-active').css({
	                                /*'background-color': options.activetab_bg,*/
	                                /*'border-color': options.active_border_color*/
	                            });

	                            $respTabs.find('.resp-tab-content[aria-labelledby = ' + $tabAria + '].' + options.tabidentify).addClass('resp-tab-content-active').attr('style', 'display:block');
	                        }
	                        //Trigger tab activation event
	                        $currentTab.trigger('tabactivate', $currentTab);

	                        //Update Browser History
	                        if (historyApi) {
	                            var currentHash = window.location.hash;
	                            var tabAriaParts = $tabAria.split('tab_item-');
	                            // var newHash = respTabsId + (parseInt($tabAria.substring(9), 10) + 1).toString();
	                            var newHash = respTabsId + (parseInt(tabAriaParts[1], 10) + 1).toString();
	                            if (currentHash != "") {
	                                var re = new RegExp(respTabsId + "[0-9]+");
	                                if (currentHash.match(re) != null) {
	                                    newHash = currentHash.replace(re, newHash);
	                                }
	                                else {
	                                    newHash = currentHash + "|" + newHash;
	                                }
	                            }
	                            else {
	                                newHash = '#' + newHash;
	                            }

	                            history.replaceState(null, null, newHash);
	                        }
	                    });

	                });

	                //Window resize function                   
	                jQuery(window).resize(function ($) {
	                    $respTabs.find('.resp-accordion-closed').removeAttr('style');
	                });
	            });
	        }
	    });
	})(jQuery);


	//Vertical Tab
	jQuery('#dmof_options_tabs').easyResponsiveTabs({
	    type: 'vertical', //Types: default, vertical, accordion
	    width: 'auto', //auto or any width like 600px
	    fit: true, // 100% fit in a container
	    closed: 'accordion', // Start closed if in accordion view
	    tabidentify: 'hor_1', // The tab groups identifier
	    activate: function(event) { // Callback function if tab is switched
	        var $tab = $(this);
	        var $info = $('#nested-tabInfo2');
	        var $name = $('span', $info);
	        $name.text($tab.text());
	        $info.show();
	    }
	});


	// Remove Hidden class from bottom save button
	setTimeout(function(){ jQuery('.dmof_save_option.dmof_ftr_save_option').removeClass('hidden'); }, 100);

	if (jQuery('#dmof_import_export_data').hasClass('resp-tab-content-active')) {
 		jQuery('.dmof_save_option.dmof_ftr_save_option').hide();
 	}else{
 		jQuery('.dmof_save_option.dmof_ftr_save_option').show();
 	}

	jQuery('li.suf_sidebar_tab').on('click',function(){
		
		if (jQuery('#dmof_import_export_data').hasClass('resp-tab-content-active')) {
	 		jQuery('.dmof_save_option.dmof_ftr_save_option').hide();
	 	}else{
	 		jQuery('.dmof_save_option.dmof_ftr_save_option').show();
	 	}

		// 	var on_this = jQuery(this);
		// jQuery('.dmof_options_sidebar ul li').removeClass('active');
		// on_this.addClass('active');
		// //var active_sec = jQuery('.dev_content').find('.active').attr('id');
		// jQuery('.dmof_options_content div').removeClass('active');
		// var id = on_this.data('id');
		// jQuery('#'+id).addClass('active');

		// // hide when import/export section is show
		// if (jQuery("#dmof_import_export_data").hasClass("active")) {
		// 	jQuery('.dmof_save_option.dmof_ftr_save_option').hide();
		// }else{
		// 	jQuery('.dmof_save_option.dmof_ftr_save_option').show();
		// }

	});
















	jQuery(".dmof_button_set_btn").click(function(e){
    	e.preventDefault();
        var this_var = jQuery(this);
        jQuery(".dmof_button_set_btn").addClass("active").not(this).removeClass("active");
        var data = this_var.attr('data-id');
        this_var.parents('.dmof_button_set_wrap').find('input.dmof_btn_set_val').val(data);
  	});


// Image Picker
// by Rodrigo Vera
//
// Version 0.3.1
// Full source at https://github.com/rvera/image-picker
// MIT License, https://github.com/rvera/image-picker/blob/master/LICENSE
// Image Picker
// by Rodrigo Vera
//
// Version 0.3.0
// Full source at https://github.com/rvera/image-picker
// MIT License, https://github.com/rvera/image-picker/blob/master/LICENSE
(function(){var t,e,i,s,l=function(t,e){return function(){return t.apply(e,arguments)}},n=[].indexOf||function(t){for(var e=0,i=this.length;i>e;e++)if(e in this&&this[e]===t)return e;return-1};jQuery.fn.extend({imagepicker:function(e){return null==e&&(e={}),this.each(function(){var i;return i=jQuery(this),i.data("picker")&&i.data("picker").destroy(),i.data("picker",new t(this,s(e))),null!=e.initialized?e.initialized.call(i.data("picker")):void 0})}}),s=function(t){var e;return e={hide_select:!0,show_label:!1,initialized:void 0,changed:void 0,clicked:void 0,selected:void 0,limit:void 0,limit_reached:void 0},jQuery.extend(e,t)},i=function(t,e){return 0===jQuery(t).not(e).length&&0===jQuery(e).not(t).length},t=function(){function t(t,e){this.opts=null!=e?e:{},this.sync_picker_with_select=l(this.sync_picker_with_select,this),this.select=jQuery(t),this.multiple="multiple"===this.select.attr("multiple"),null!=this.select.data("limit")&&(this.opts.limit=parseInt(this.select.data("limit"))),this.build_and_append_picker()}return t.prototype.destroy=function(){var t,e,i,s;for(s=this.picker_options,e=0,i=s.length;i>e;e++)t=s[e],t.destroy();return this.picker.remove(),this.select.unbind("change"),this.select.removeData("picker"),this.select.show()},t.prototype.build_and_append_picker=function(){var t=this;return this.opts.hide_select&&this.select.hide(),this.select.change(function(){return t.sync_picker_with_select()}),null!=this.picker&&this.picker.remove(),this.create_picker(),this.select.after(this.picker),this.sync_picker_with_select()},t.prototype.sync_picker_with_select=function(){var t,e,i,s,l;for(s=this.picker_options,l=[],e=0,i=s.length;i>e;e++)t=s[e],t.is_selected()?l.push(t.mark_as_selected()):l.push(t.unmark_as_selected());return l},t.prototype.create_picker=function(){return this.picker=jQuery("<ul class='thumbnails image_picker_selector'></ul>"),this.picker_options=[],this.recursively_parse_option_groups(this.select,this.picker),this.picker},t.prototype.recursively_parse_option_groups=function(t,i){var s,l,n,r,c,o,h,a,p,u;for(a=t.children("optgroup"),r=0,o=a.length;o>r;r++)n=a[r],n=jQuery(n),s=jQuery("<ul></ul>"),s.append(jQuery("<li class='group_title'>"+n.attr("label")+"</li>")),i.append(jQuery("<li>").append(s)),this.recursively_parse_option_groups(n,s);for(p=function(){var i,s,n,r;for(n=t.children("option"),r=[],i=0,s=n.length;s>i;i++)l=n[i],r.push(new e(l,this,this.opts));return r}.call(this),u=[],c=0,h=p.length;h>c;c++)l=p[c],this.picker_options.push(l),l.has_image()&&u.push(i.append(l.node));return u},t.prototype.has_implicit_blanks=function(){var t;return function(){var e,i,s,l;for(s=this.picker_options,l=[],e=0,i=s.length;i>e;e++)t=s[e],t.is_blank()&&!t.has_image()&&l.push(t);return l}.call(this).length>0},t.prototype.selected_values=function(){return this.multiple?this.select.val()||[]:[this.select.val()]},t.prototype.toggle=function(t){var e,s,l;return s=this.selected_values(),l=""+t.value(),this.multiple?n.call(this.selected_values(),l)>=0?(e=this.selected_values(),e.splice(jQuery.inArray(l,s),1),this.select.val([]),this.select.val(e)):null!=this.opts.limit&&this.selected_values().length>=this.opts.limit?null!=this.opts.limit_reached&&this.opts.limit_reached.call(this.select):this.select.val(this.selected_values().concat(l)):this.has_implicit_blanks()&&t.is_selected()?this.select.val(""):this.select.val(l),i(s,this.selected_values())||(this.select.change(),null==this.opts.changed)?void 0:this.opts.changed.call(this.select,s,this.selected_values())},t}(),e=function(){function t(t,e,i){this.picker=e,this.opts=null!=i?i:{},this.clicked=l(this.clicked,this),this.option=jQuery(t),this.create_node()}return t.prototype.destroy=function(){return this.node.find(".thumbnail").unbind()},t.prototype.has_image=function(){return null!=this.option.data("img-src")},t.prototype.is_blank=function(){return!(null!=this.value()&&""!==this.value())},t.prototype.is_selected=function(){var t;return t=this.picker.select.val(),this.picker.multiple?jQuery.inArray(this.value(),t)>=0:this.value()===t},t.prototype.mark_as_selected=function(){return this.node.find(".thumbnail").addClass("selected")},t.prototype.unmark_as_selected=function(){return this.node.find(".thumbnail").removeClass("selected")},t.prototype.value=function(){return this.option.val()},t.prototype.label=function(){return this.option.data("img-label")?this.option.data("img-label"):this.option.text()},t.prototype.clicked=function(){return this.picker.toggle(this),null!=this.opts.clicked&&this.opts.clicked.call(this.picker.select,this),null!=this.opts.selected&&this.is_selected()?this.opts.selected.call(this.picker.select,this):void 0},t.prototype.create_node=function(){var t,e;return this.node=jQuery("<li/>"),t=jQuery("<img class='image_picker_image'/>"),t.attr("src",this.option.data("img-src")),e=jQuery("<div class='thumbnail'>"),e.click({option:this},function(t){return t.data.option.clicked()}),e.append(t),this.opts.show_label&&e.append(jQuery("<p/>").html(this.label())),this.node.append(e),this.node},t}()}).call(this);

jQuery("select.dmof_image_select").imagepicker();












}); // ------------End Document ready
	

	/**
	 * Range SLider
	 */

	// var rangeSlider = function(){
	// 	var slider = jQuery('.range-slider'),
	// 	range = jQuery('.range-slider__range'),
	// 	value = jQuery('.range-slider__value');

	// 	slider.each(function(){

	// 		value.each(function(){
	// 			var value = jQuery(this).prev().attr('value');
	// 			jQuery(this).html(value);
	// 		});

	// 		range.on('input', function(){
	// 			jQuery(this).next(value).html(this.value);
	// 		});
	// 	});
	// };
	// rangeSlider();