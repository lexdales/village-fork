<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_theme_data(STYLESHEETPATH . '/style.css');
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
	
	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {

	$skin_array = array("dark_noise" => __("Dark Noise","village"), "dark_fabric" => __("Dark Fabric","village"), "dark_crosshair" => __("Dark Crosshair","village"), "stone" => __("Stone","village"), "light_fabric" => __("Light Fabric","village"));
	
	// Multicheck Array
	$multicheck_array = array("facebook" => "Facebook", "flickr" => "Flickr", "myspace" => "Myspace", "twitter" => "Twitter", "youtube" => "Youtube");
	
	// Multicheck Defaults
	$multicheck_defaults = array("facebook" => "Facebook", "flickr" => "Flickr", "myspace" => "Myspace", "twitter" => "Twitter", "youtube" => "Youtube");
	
	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}

	$options_posts = array();  
	$options_posts_obj = get_posts("post_type=portfolio&numberposts=99999");
	$options_posts[''] = 'Select a project:';
	foreach ($options_posts_obj as $postss) {
    	$options_posts[$postss->ID] = $postss->post_title;
	}

	$background_array = array();  
	$background_array_obj = get_posts("post_type=background&numberposts=99999");
	$background_array[''] = 'Select a background:';
	foreach ($background_array_obj as $postss) {
    	$background_array[$postss->ID] = $postss->post_title;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_stylesheet_directory_uri() . '/images/';
		
	$options = array();
		
	$options[] = array( "name" => __("General", "village"),
						"type" => "heading");

	$options[] = array( "name" => __("Skin", "village"),
						"desc" => __("Select the look of your site. Light or Dark", "village"),
						"id" => "setting_skin",
						"std" => "light",
						"type" => "select",
						"options" => $skin_array);

	$options[] = array( "name" => __("Logo", "village"),
						"desc" => __("Upload your logo. Click Use This Image on the image you want as your logo.", "village"),
						"id" => "logo",
						"std" => FW_URI . "/images/logo.png",
						"type" => "upload");

	$options[] = array( "name" => __("Favicon", "village"),
						"desc" => __("Upload your favicon. Click Use This Image on the image you want as your favicon.", "village"),
						"id" => "favicon",
						"std" => FW_URI . "/images/wpmini-blue.png",
						"type" => "upload");

	$options[] = array( "name" => "Right Click Protection",
						"desc" => "Prevent users from downloading your images by disabling right click.",
						"id" => "right_click_protection",
						"std" => "yes",
						"type" => "radio",
						"options" => array("yes" => "Yes", "no" => "No"));

	$options[] = array( "name" => __("Social Icons", "village"),
						"type" => "heading");

	$options[] = array( "name" => __("Social Icons", "village"),
						"desc" => __("Check the social icons you want to display.", "village"),
						"id" => "social_icons",
						"std" => array("facebook" => "Facebook", "twitter" => "Twitter", "flickr" => "Flickr", "behance" => "Behance"),
						"type" => "multicheck",
						"options" => array("facebook" => "Facebook", "twitter" => "Twitter", "flickr" => "Flickr", "behance" => "Behance", "email" => "Email", "vimeo" => "Vimeo", "youtube" => "Youtube", "addthis" => "Add This", "aim" => "Aim", "apple" => "Apple", "blogger" => "Blogger", "deviantart" => "Deviantart", "dribbble" => "Dribbble", "myspace" => "Myspace", "qik" => "Qik", "yahoo" => "Yahoo", "linkedin" => "LinkedIn", "skype" => "Skype"));

	$options[] = array( "name" => "Open links in a new browser?",
						"desc" => "Links will open in a new browser.",
						"id" => "icons_new_browser",
						"std" => "no",
						"type" => "radio",
						"options" => array("yes" => "Yes", "no" => "No"));

	$options[] = array( "name" => __("Facebook URL", "village"),
						"desc" => "",
						"id" => "facebook_url",
						"std" => '#',
						"type" => "text");

	$options[] = array( "name" => __("Twitter URL", "village"),
						"desc" => "",
						"id" => "twitter_url",
						"std" => '#',
						"type" => "text");

	$options[] = array( "name" => __("Flickr URL", "village"),
						"desc" => "",
						"id" => "flickr_url",
						"std" => '#',
						"type" => "text");

	$options[] = array( "name" => __("Behance URL", "village"),
						"desc" => "",
						"id" => "behance_url",
						"std" => '#',
						"type" => "text");

	$options[] = array( "name" => __("Email URL", "village"),
						"desc" => "",
						"id" => "email_url",
						"std" => '#',
						"type" => "text");

	$options[] = array( "name" => __("Vimeo URL", "village"),
						"desc" => "",
						"id" => "vimeo_url",
						"std" => '#',
						"type" => "text");

	$options[] = array( "name" => __("Youtube URL", "village"),
						"desc" => "",
						"id" => "youtube_url",
						"std" => '#',
						"type" => "text");

	$options[] = array( "name" => __("AddThis URL", "village"),
						"desc" => "",
						"id" => "addthis_url",
						"std" => '#',
						"type" => "text");

	$options[] = array( "name" => __("Aim URL", "village"),
						"desc" => "",
						"id" => "aim_url",
						"std" => '#',
						"type" => "text");

	$options[] = array( "name" => __("Apple URL", "village"),
						"desc" => "",
						"id" => "apple_url",
						"std" => '#',
						"type" => "text");

	$options[] = array( "name" => __("Blogger URL", "village"),
						"desc" => "",
						"id" => "blogger_url",
						"std" => '#',
						"type" => "text");

	$options[] = array( "name" => __("DeviantArt URL", "village"),
						"desc" => "",
						"id" => "deviantart_url",
						"std" => '#',
						"type" => "text");

	$options[] = array( "name" => __("Dribbble URL", "village"),
						"desc" => "",
						"id" => "dribbble_url",
						"std" => '#',
						"type" => "text");

	$options[] = array( "name" => __("Myspace URL", "village"),
						"desc" => "",
						"id" => "myspace_url",
						"std" => '#',
						"type" => "text");

	$options[] = array( "name" => __("Qik URL", "village"),
						"desc" => "",
						"id" => "qik_url",
						"std" => '#',
						"type" => "text");

	$options[] = array( "name" => __("Yahoo URL", "village"),
						"desc" => "",
						"id" => "yahoo_url",
						"std" => '#',
						"type" => "text");

	$options[] = array( "name" => __("LinkedIn URL", "village"),
						"desc" => "",
						"id" => "linkedin_url",
						"std" => '#',
						"type" => "text");

	$options[] = array( "name" => __("Skype URL", "village"),
						"desc" => "",
						"id" => "skype_url",
						"std" => '#',
						"type" => "text");

	$options[] = array( "name" => __("Portfolio", "village"),
						"type" => "heading");

	$options[] = array( "name" => "Show portfolio visit link portfolio buttons?",
						"desc" => "Show/Hide portfolio link buttons.",
						"id" => "show_portfolio_link_buttons",
						"std" => "yes",
						"type" => "radio",
						"options" => array("yes" => "Yes", "no" => "No"));

	$options[] = array( "name" => "Show portfolio read more portfolio buttons?",
						"desc" => "Show portfolio online/offline buttons.",
						"id" => "show_portfolio_rm_buttons",
						"std" => "yes",
						"type" => "radio",
						"options" => array("yes" => "Yes", "no" => "No"));

	$options[] = array( "name" => __("Backgrounds", "village"),
						"type" => "heading");

	$options[] = array( "name" => "404 Background",
						"desc" => "",
						"id" => "404_background",
						"std" => "",
						"type" => "select",
						"options" => $background_array);

	$options[] = array( "name" => "Archive Background",
						"desc" => "",
						"id" => "archive_background",
						"std" => "",
						"type" => "select",
						"options" => $background_array);

	$options[] = array( "name" => "Search Background",
						"desc" => "",
						"id" => "search_background",
						"std" => "",
						"type" => "select",
						"options" => $background_array);
							
	$options[] = array( "name" => __("Contact", "village"),
						"type" => "heading");

	$options[] = array( "name" => __("Admin Email", "village"),
						"desc" => __("The email that messages from the contact form are sent too.", "village"),
						"id" => "admin_email",
						"std" => "admin@burntfeathers.com",
						"type" => "text");
						
	$options[] = array( "name" => __("Footer", "village"),
						"type" => "heading");

	$options[] = array( "name" => __("Credits", "village"),
						"desc" => __("The text that appears in the footer.", "village"),
						"id" => "credits",
						"std" => "&copy; COPYRIGHT 2012. MADE BY THEMEPROVINCE",
						"type" => "text");

	$options[] = array( "name" => __("Fonts", "village"),
						"type" => "heading");

	$options[] = array( "name" => "Google Fonts",
						"desc" => 'Here you can enter the names of the entire Google Font library. <br><br>
If a font has a space for example Droid Sans you need to replace the space with a plus sign "+". Like so: Droid+Sans"',
						"type" => "info");

	$options[] = array( "name" => __("Menu Font", "village"),
						"desc" => "",
						"id" => "menu_font",
						"std" => "Lato",
						"type" => "text");

	$options[] = array( "name" => __("Submenu Font", "village"),
						"desc" => "",
						"id" => "submenu_font",
						"std" => "Kreon",
						"type" => "text");

	$options[] = array( "name" => __("Main Body Font", "village"),
						"desc" => "",
						"id" => "body_font",
						"std" => "Droid+Sans",
						"type" => "text");

	$options[] = array( "name" => __("Heading Font", "village"),
						"desc" => "",
						"id" => "heading_font",
						"std" => "Kreon",
						"type" => "text");

	$options[] = array( "name" => __("SEO", "village"),
						"type" => "heading");

	$options[] = array( "name" => __("Enable SEO", "village"),
						"desc" => "This theme has built in SEO. It is turned off by default to avoid clashes with plugins you may have installed.",
						"id" => "seo",
						"std" => "no",
						"type" => "select",
						"options" => array("yes" => "Yes", "no" => "No"));
											
	$options[] = array( "name" => __("Help", "adventure"),
						"type" => "heading");

	$options[] = array( "name" => __("Documentation","adventure"),
						"desc" => __("The documentation for this theme is located in the documentation folder you receive from Themeforest. It will help you if you are stuck so please take a look at it before you post in the support forum.","adventure"),
						"type" => "info");

	$options[] = array( "name" => __("Support Forum","adventure"),
						"desc" => __('If you are having any problems, have a question or need to report a bug with this theme then please post in our support forum. 
						It will increase the quality of support you receive from us. You will need to post your support requests on our support forum from now on. <b>Note that all discussions are hidden until you login.</b> Sign up is quick and easy.
						<br><br>
						To access the forum you will need your Item Purchase Code. Need help finding your item purchase code? <br><br>

						<a target="_blank" href="http://cl.ly/451W2o2h1M0V2n290U0p/">Click to see where you find your purchase code.</a>

						<br><br><b>The support forum is located here: <a href="http://support.themeprovince.com/">http://support.themeprovince.com/</a></b>',"adventure"),
						"type" => "info");

	$options[] = array( "name" => __("Video Tutorials","adventure"),
						"desc" => __('We believe the best way to learn is by video tutorials, each of our themes will eventually have these. <br><br><b><a href="http://vimeo.com/ThemeProvince" target="_blank">Click here to visit our Vimeo channel!</a></b>',"adventure"),
						"type" => "info");


/*
						
	$options[] = array( "name" => "Input Select Small",
						"desc" => "Small Select Box.",
						"id" => "example_select",
						"std" => "three",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => $test_array);			 
						
	$options[] = array( "name" => "Input Select Wide",
						"desc" => "A wider select box.",
						"id" => "example_select_wide",
						"std" => "two",
						"type" => "select",
						"options" => $test_array);
						
	$options[] = array( "name" => "Select a Category",
						"desc" => "Passed an array of categories with cat_ID and cat_name",
						"id" => "example_select_categories",
						"type" => "select",
						"options" => $options_categories);
							
	$options[] = array( "name" => "Select a Page",
						"desc" => "Passed an pages with ID and post_title",
						"id" => "example_select_pages",
						"type" => "select",
						"options" => $options_pages);
						
	$options[] = array( "name" => "Input Radio (one)",
						"desc" => "Radio select with default options 'one'.",
						"id" => "example_radio",
						"std" => "one",
						"type" => "radio",
						"options" => $test_array);
							
	$options[] = array( "name" => "Example Info",
						"desc" => "This is just some example information you can put in the panel.",
						"type" => "info");
											
	$options[] = array( "name" => "Input Checkbox",
						"desc" => "Example checkbox, defaults to true.",
						"id" => "example_checkbox",
						"std" => "1",
						"type" => "checkbox");
*/
						
	return $options;
}