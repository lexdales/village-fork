<?php

/*

Load Gallery Scripts

*/
	
function fw_gallery_scripts () 
{

	wp_enqueue_script('thickbox');
	wp_register_script('gallery-upload', FW_URI . '/blueprint/gallery/js/jquery.upload.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('gallery-upload');
	wp_enqueue_script('media-upload');

}

/*

Load Gallery Styles

*/

if (is_admin()) 
{

	wp_enqueue_style('gallery-css', FW_URI . '/blueprint/gallery/css/gallery.css');
	wp_enqueue_style('wall-css', FW_URI . '/blueprint/wall/css/wall_manager.css');

}

function fw_gallery_styles () 
{

	wp_enqueue_style('thickbox');

}

/*

Hook Gallery Scripts & Styles

*/

// Remove warnings and notices by php
if (isset($_GET['post'])) 
{
	
	if (get_post_type($_GET['post']) == "gallery" || get_post_type($_GET['post']) == "wall") 
	{

		add_action('admin_print_scripts', 'fw_gallery_scripts');
		add_action('admin_print_styles', 'fw_gallery_styles');	
			
	}		

	
} 

if (isset($_GET['post_type'])) {

	if ($_GET['post_type'] == "gallery" || $_GET['post_type'] == "wall") 
	{
		
		add_action('admin_print_scripts', 'fw_gallery_scripts');
		add_action('admin_print_styles', 'fw_gallery_styles');	
	
	}		

}

/*

Edit Media Upload Tabs

*/

function fw_edit_gallery_media_upload_tabs ($tabs)
{

	unset($tabs["type_url"]);
	unset($tabs["library"]);
	
	return $tabs;
	
}

/*

Detect Media Upload only for gallery/portfolio post type

*/

if (isset( $_REQUEST['post_id'] ) && get_post_type($_REQUEST['post_id']) == "gallery")
{

	/*
	
	Hook Gallery Scripts & Styles
	
	*/	
	
	add_action('admin_print_scripts', 'fw_gallery_scripts');
	add_action('admin_print_styles', 'fw_gallery_styles');	
	
	add_filter("media_upload_tabs", "fw_edit_gallery_media_upload_tabs");

}


?>