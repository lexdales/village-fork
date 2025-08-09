<?php 

/*

Custom Form Fields For Portfolio Manager

*/

function fb_attachment_fields_edit($form_fields, $post) 
{

	$form_fields['fw_lightbox_link']['label'] = __( 'Lightbox Link (For gallery use only)', "village" );
	$form_fields['fw_lightbox_link']['value'] = get_post_meta($post->ID, 'fw_lightbox_link', true);
	$form_fields['fw_lightbox_link']['helps'] = __( 'Enter a external link for this gallery item. Leave blank if not needed.', "village" );
	$form_fields['fw_external_link']['label'] = __( 'External Link (For gallery use only)', "village" );
	$form_fields['fw_external_link']['value'] = get_post_meta($post->ID, 'fw_external_link', true);
	$form_fields['fw_external_link']['helps'] = __( 'Enter a lightbox link for this gallery item. Leave blank if not needed.', "village" );
	return $form_fields;
}

// save custom field to post_meta
function fb_attachment_fields_save($post, $attachment) 
{

	if ( isset($attachment['fw_lightbox_link']) )
		update_post_meta($post['ID'], 'fw_lightbox_link', $attachment['fw_lightbox_link']);
	if ( isset($attachment['fw_external_link']) )
		update_post_meta($post['ID'], 'fw_external_link', $attachment['fw_external_link']);

	return $post;

}

add_filter('attachment_fields_to_edit', 'fb_attachment_fields_edit', 10, 2);
add_filter('attachment_fields_to_save', 'fb_attachment_fields_save', 10, 2);

define("THEME_SN", "village");
define("FW_URI", get_template_directory_uri());

add_image_size("portfolio_preview_thumb", 200, 180, true);
add_image_size("portfolio_three_column", 214, 180, true);
add_image_size("portfolio_two_column", 325, 260, true);
add_image_size("portfolio_one_column", 680, 400, true);
add_image_size("paged_thumb", 420, 99999, false);
add_image_size("column_gallery_4", 155, 130, true);
add_image_size("column_gallery_4_portrait", 155, 200, true);
add_image_size("column_gallery_3", 212, 195, true);
add_image_size("column_gallery_3_portrait", 212, 300, true);
add_image_size("column_gallery_2", 330, 275, true);
add_image_size("column_gallery_2_portrait", 330, 480, true);
add_image_size("column_gallery_1", 680, 450, false);
add_image_size("column_gallery_1_portrait", 680, 800, true);
add_image_size("slideshow_right_portrait_thumb", 100, 100, true);
add_image_size("slideshow_floating_portrait_thumb", 100, 60, true);
add_image_size("slideshow_floating_portrait_thumb_alt", 80, 60, true);
add_image_size("sidebar_thumb", 60, 50, true);

#####################################################
##### BLUEPRINT - CREATE FRAMEWORK
#####################################################

define("BPVersion", "1.0.0");
define("BPAssets", TEMPLATEPATH . '/blueprint/assets/assets.php');
define("BPSidebars", TEMPLATEPATH . '/blueprint/sidebars/sidebars.php');
define("BPDocs", TEMPLATEPATH . '/blueprint/docs/docs.php');
define("BPMenus", TEMPLATEPATH . '/blueprint/menus/menus.php');
define("BPPostTypes", TEMPLATEPATH . '/blueprint/post_types/post_types.php');
define("BPMetaBoxes", TEMPLATEPATH . '/blueprint/meta_boxes/meta_boxes.php');
define("BPGallery", TEMPLATEPATH . '/blueprint/gallery/fw.gallery.php');
define("BPSEO", TEMPLATEPATH . '/blueprint/seo/seo.php');
define("BPWidgets", TEMPLATEPATH . '/blueprint/comments/comments.php');
define("BPComments", TEMPLATEPATH . '/blueprint/widgets/widgets.php');
define("BPPortfolio", TEMPLATEPATH . '/blueprint/portfolio/portfolio.php');
define("BPShortcodes", TEMPLATEPATH . '/blueprint/shortcodes/p_shortcodes.php');
define("BPContact", TEMPLATEPATH . '/blueprint/contact/contact.php');
define("BP", get_template_directory_uri());
define("BPDevMode", "true");

/*

Theme Options Config

*/

if (!function_exists( 'optionsframework_init')) 
{

	/* Set the file path based on whether the Options Framework Theme is a parent theme or child theme */
	
	if ( STYLESHEETPATH == TEMPLATEPATH ) {
		define('OPTIONS_FRAMEWORK_URL', TEMPLATEPATH . '/admin/');
		define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/');
	} else {
		define('OPTIONS_FRAMEWORK_URL', STYLESHEETPATH . '/admin/');
		define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/');
	}
	
	require_once (OPTIONS_FRAMEWORK_URL . 'options-framework.php');

}

/* 
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts () 
{ ?>

	<script type="text/javascript">
	jQuery(document).ready(function() 
	{
	
		jQuery('#example_showhidden').click(function () 
		{
	  	
	  		jQuery('#section-example_text_hidden').fadeToggle(400);
		
		});
		
		if (jQuery('#example_showhidden:checked').val() !== undefined) 
		{
		
			jQuery('#section-example_text_hidden').show();
		
		}
		
	});
	</script>

<?php
}

/* 
 * Turns off the default options panel from Twenty Eleven
 */
 
add_action('after_setup_theme','remove_twentyeleven_options', 100);

function remove_twentyeleven_options () 
{
	remove_action( 'admin_menu', 'twentyeleven_theme_options_add_page' );
}

#####################################################
##### BLUEPRINT - UNIQUE THEME FUNCTIONS
#####################################################

function searchPosts($query) {
        if ($query->is_search) {
        $query->set('post_type', 'post');
                                }
        return $query;
}
add_filter('pre_get_posts','searchPosts');

#####################################################
##### BLUEPRINT - POST THUMBNAILS
#####################################################

add_theme_support('post-thumbnails');

#####################################################
##### BLUEPRINT - ASSETS
#####################################################

require BPAssets;

#####################################################
##### BLUEPRINT - SIDEBARS
#####################################################

require BPSidebars;

#####################################################
##### BLUEPRINT - DOCUMENTATION
#####################################################

require BPDocs;

#####################################################
##### BLUEPRINT - GALLERY
#####################################################

require BPGallery;

#####################################################
##### BLUEPRINT - MENUS
#####################################################

$blueprint_menu_array = array(

array ("menu_name" => "Main Navigation", "menu_location" => "primary")

);

require BPMenus;

#####################################################
##### BLUEPRINT - POST TYPES
#####################################################

$blueprint_post_type_array = array(

array ("post_type_name" => "slider",
	   "post_type_label_name" => "Slide",
	   "post_type_plural_label_name" => "Slides",
	   "post_type_icon" => BP . '/blueprint/images/slides.png',
	   "supports_array" => array ('title', 'revisions', 'thumbnail'),
	   "meta_box_function" => "blueprint_add_slide_meta",
	   "use_taxonomy" => true,
	   "taxonomy_name" => "slider-categories",
	   "taxonomy_label_name" => "Slideshow",
	   "taxonomy_plural_label_name" => "Slideshows"	   
	   ),

array ("post_type_name" => "portfolio",
	   "post_type_label_name" => "Portfolio Item",
	   "post_type_plural_label_name" => "Portfolio Items",
	   "post_type_icon" => BP . '/blueprint/images/portfolio.png',
	   "supports_array" => array ('title', 'editor', 'author', 'comments', 'revisions', 'thumbnail', 'excerpt'),
	   "meta_box_function" => "blueprint_add_portfolio_meta",
	   "use_taxonomy" => true,
	   "taxonomy_name" => "portfolio-categories",
	   "taxonomy_label_name" => "Portfolio",
	   "taxonomy_plural_label_name" => "Portfolios"	   
	   ),
	   
array ("post_type_name" => "wall",
	   "post_type_label_name" => "Wall Item",
	   "post_type_plural_label_name" => "Wall Items",
	   "post_type_icon" => BP . '/blueprint/images/puzzle.png',
	   "supports_array" => array ('title', 'revisions', 'thumbnail'),
	   "meta_box_function" => "blueprint_add_wall_meta",
	   "use_taxonomy" => true,
	   "taxonomy_name" => "wall-categories",
	   "taxonomy_label_name" => "Wall",
	   "taxonomy_plural_label_name" => "Walls"	   
	   ),
	   
array ("post_type_name" => "background",
	   "post_type_label_name" => "Background",
	   "post_type_plural_label_name" => "Backgrounds",
	   "post_type_icon" => BP . '/blueprint/images/e-book-reader.png',
	   "supports_array" => array ('title', 'thumbnail'),
	   "meta_box_function" => "blueprint_add_background_meta",
	   "use_taxonomy" => false,
	   "taxonomy_name" => "",
	   "taxonomy_label_name" => "",
	   "taxonomy_plural_label_name" => ""	   
	   ),
	   
array ("post_type_name" => "gallery",
	   "post_type_label_name" => "Gallery",
	   "post_type_plural_label_name" => "Galleries",
	   "post_type_icon" => BP . '/blueprint/images/camera-lens.png',
	   "supports_array" => array ('title'),
	   "use_taxonomy" => false,
	   "taxonomy_name" => "",
	   "taxonomy_label_name" => "",
	   "taxonomy_plural_label_name" => ""	   
	   )	   	   	   	   

);

require BPPostTypes;

#####################################################
##### BLUEPRINT - META BOXES
#####################################################

require BPMetaBoxes;

#####################################################
##### BLUEPRINT - SEO
#####################################################

require BPSEO;

#####################################################
##### BLUEPRINT - WIDGETS
#####################################################

require BPWidgets;

#####################################################
##### BLUEPRINT - COMMENTS
#####################################################

require BPComments;

#####################################################
##### BLUEPRINT - PORTFOLIO
#####################################################

require BPPortfolio;

#####################################################
##### BLUEPRINT - SHORTCODES
#####################################################

require BPShortcodes;

#####################################################
##### BLUEPRINT - SHORTCODES
#####################################################

require BPContact;

?>