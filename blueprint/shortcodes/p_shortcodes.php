<?php 

/*
Code from WordPress.org Codex & Licensed under GPLv3
*/

function myplugin_addbuttons() {

   // Don't bother doing this stuff if the current user lacks permissions
   if (! current_user_can('edit_posts') && ! current_user_can('edit_pages'))
     return;
 
   // Add only in Rich Editor mode
   if ( get_user_option('rich_editing') == 'true') {
     add_filter("mce_external_plugins", "add_myplugin_tinymce_plugin");
     add_filter('mce_buttons', 'register_myplugin_button');
   }
}
 
function register_myplugin_button($buttons) {
   array_push($buttons, "separator", "myplugin");
   return $buttons;
}
 
// Load the TinyMCE plugin : editor_plugin.js (wp2.5)
function add_myplugin_tinymce_plugin($plugin_array) {
   $plugin_array['myplugin'] = get_template_directory_uri() . '/blueprint/shortcodes/tinymce/editor_plugin.js';
   return $plugin_array;
}
 
// init process for button control
add_action('init', 'myplugin_addbuttons');

/*

We store our shortcodes in an array ready for processing

*/

$fw_shortcodes = array (

	array ("id" => "pull_quote_left",
	"name" => __("Pullquote Left", "village"),
	"shortcode_name" => "pull_quote_left",
	"attributes" => "",
	"content_required" => true,
	"custom_output" => null
	),

	array ("id" => "pull_quote_right",
	"name" => __("Pullquote Right", "village"),
	"shortcode_name" => "pull_quote_right",
	"attributes" => "",
	"content_required" => true,
	"custom_output" => null
	),

	array ("id" => "two_column",
	"name" => __("Two Columns", "village"),
	"shortcode_name" => "two_column",
	"attributes" => "",
	"content_required" => true,
	"custom_output" => "[two_column]First Column[/two_column] [two_column_last]Second Column[/two_column_last]"
	),

	array ("id" => "three_column",
	"name" => __("Three Columns", "village"),
	"shortcode_name" => "three_column",
	"attributes" => "",
	"content_required" => true,
	"custom_output" => "[three_column]First Column[/three_column] [three_column]Second Column[/three_column] [three_column_last]Third Column[/three_column_last]"
	),

	array ("id" => "four_column",
	"name" => __("Four Columns", "village"),
	"shortcode_name" => "four_column",
	"attributes" => "",
	"content_required" => true,
	"custom_output" => "[four_column]First Column[/four_column] [four_column]Second Column[/four_column] [four_column]Third Column[/four_column] [four_column_last]Fourth Column[/four_column_last]"
	),

	array ("id" => "five_column",
	"name" => __("Five Columns", "village"),
	"shortcode_name" => "five_column",
	"attributes" => "",
	"content_required" => true,
	"custom_output" => "[five_column]First Column[/five_column] [five_column]Second Column[/five_column] [five_column]Third Column[/five_column] [five_column]Fourth Column[/five_column] [five_column_last]Fifth Column[/five_column_last]"
	),

	array ("id" => "two_third_column_left",
	"name" => __("Two Third Column Left", "village"),
	"shortcode_name" => "two_third_column_left",
	"attributes" => "",
	"content_required" => true,
	"custom_output" => "[two_third_column_left]First Column[/two_third_column_left] [two_third_column_left_last]First Column[/two_third_column_left_last]"
	),

	array ("id" => "two_third_column_right",
	"name" => __("Two Third Column Right", "village"),
	"shortcode_name" => "two_third_column_right",
	"attributes" => "",
	"content_required" => true,
	"custom_output" => "[two_third_column_right]First Column[/two_third_column_right] [two_third_column_right_last]Last Column[/two_third_column_right_last]"
	),

	array ("id" => "dropcap",
	"name" => __("Dropcap", "village"),
	"shortcode_name" => "dropcap",
	"attributes" => array (
		array ("id" => "color",
		"name" => "Color",
		"desc" => "The text color of the dropcap."
		),
		array ("id" => "background_color",
		"name" => "Background Color",
		"desc" => "The background color of the dropcap."
		),
	),
	"content_required" => true,
	"custom_output" => null
	),

	array ("id" => "single_lightbox",
	"name" => __("Lightbox", "village"),
	"shortcode_name" => "single_lightbox",
	"attributes" => array (
		array ("id" => "url",
		"name" => "URL",
		"desc" => "The lightbox url."
		),
		array ("id" => "image_url",
		"name" => "Thumbnail Image URL",
		"desc" => "The thumbnail image url."
		),		
		array ("id" => "image_width",
		"name" => "Thumbnail Image Width",
		"desc" => "The width of the thumbnail image."
		),
		array ("id" => "image_height",
		"name" => "Thumbnail Image Height",
		"desc" => "The height of the thumbnail image."
		),
		array ("id" => "title",
		"name" => "Title",
		"desc" => "The title of the lightbox image."
		),
	),
	"content_required" => false,
	"custom_output" => null
	),

	array ("id" => "highlight",
	"name" => __("Highlight", "village"),
	"shortcode_name" => "highlight",
	"attributes" => array (
	
		array ("id" => "text_color",
		"name" => "Text Color",
		"desc" => "The text color of the highlighted text."
		),

		array ("id" => "background_color",
		"name" => "Background Color",
		"desc" => "The background color of the highlighted text."
		),
		
	),
	"content_required" => true,
	"custom_output" => null
	),

	array ("id" => "alert_box",
	"name" => __("Alert Box", "village"),
	"shortcode_name" => "box_alert",
	"attributes" => "",
	"content_required" => true,
	"custom_output" => null
	),

	array ("id" => "download_box",
	"name" => __("Download Box", "village"),
	"shortcode_name" => "download_box",
	"attributes" => "",
	"content_required" => true,
	"custom_output" => null
	),

	array ("id" => "success_box",
	"name" => __("Success Box", "village"),
	"shortcode_name" => "box_download",
	"attributes" => "",
	"content_required" => true,
	"custom_output" => null
	),

	array ("id" => "error_box",
	"name" => __("Error Box", "village"),
	"shortcode_name" => "box_error",
	"attributes" => "",
	"content_required" => true,
	"custom_output" => null
	),

	array ("id" => "textbold",
	"name" => __("Bold Text", "village"),
	"shortcode_name" => "textbold",
	"attributes" => "",
	"content_required" => true,
	"custom_output" => null
	),

	array ("id" => "textitalic",
	"name" => __("Italic Text", "village"),
	"shortcode_name" => "textitalic",
	"attributes" => "",
	"content_required" => true,
	"custom_output" => null
	),

	array ("id" => "textcolor",
	"name" => __("Colored Text", "village"),
	"shortcode_name" => "textitalic",
	"attributes" => array(
		array ("id" => "color",
		"name" => "Text Color",
		"desc" => "The color of the text."
		),
	),
	"content_required" => true,
	"custom_output" => null
	),

	array ("id" => "button",
	"name" => __("Button", "village"),
	"shortcode_name" => "button",
	"attributes" => array (
	
		array ("id" => "link",
		"name" => "Button Link",
		"desc" => "The button's link."
		),

		array ("id" => "color",
		"name" => "Button Color",
		"desc" => "The background color."
		),

		array ("id" => "text_color",
		"name" => "Button Text Color",
		"desc" => "The text color."
		),
	
	),
	"content_required" => true,
	"custom_output" => null
	),	

	array ("id" => "single_vimeo",
	"name" => __("Vimeo Video", "village"),
	"shortcode_name" => "single_vimeo",
	"attributes" => array (
	
		array ("id" => "video_id",
		"name" => "Vimeo Video ID",
		"desc" => "Paste the id of the vimeo video here. Not the full url."
		),

		array ("id" => "video_width",
		"name" => "Vimeo Video Width",
		"desc" => "The width of the vimeo video."
		),

		array ("id" => "video_height",
		"name" => "Vimeo Video Height",
		"desc" => "The height of the vimeo video."
		),
	
	),
	"content_required" => false,
	"custom_output" => null
	),	

	array ("id" => "single_youtube",
	"name" => __("Youtube Video", "village"),
	"shortcode_name" => "single_youtube",
	"attributes" => array (
	
		array ("id" => "video_id",
		"name" => "Youtube Video ID",
		"desc" => "Paste the id of the youtube video here. Not the full url."
		),

		array ("id" => "video_width",
		"name" => "Youtube Video Width",
		"desc" => "The width of the youtube video."
		),

		array ("id" => "video_height",
		"name" => "Youtube Video Height",
		"desc" => "The height of the youtube video."
		),
	
	),
	"content_required" => false,
	"custom_output" => null
	),	

	array ("id" => "single_shv",
	"name" => __("Self Hosted Video", "village"),
	"shortcode_name" => "single_shv",
	"attributes" => array (

		array ("id" => "video_url",
		"name" => "Video URL",
		"desc" => "The video url of the self hosted video.",
		),

		array ("id" => "video_width",
		"name" => "Video Width",
		"desc" => "The width of the video."
		),

		array ("id" => "video_height",
		"name" => "Video Height",
		"desc" => "The height of the video."
		),
	
	),
	"content_required" => false,
	"custom_output" => null
	),		
		
);

## THEME'S SHORTCODES

add_filter('widget_text', 'do_shortcode');

### VIMEO SC

function p_single_vimeo( $atts, $content = null) {
   extract( shortcode_atts( array(
      'video_id' => '',
      'video_width' => '',
      'video_height' => '',
      ), $atts ) );
            
   return '<iframe src="http://player.vimeo.com/video/' . esc_attr($video_id). '?title=0&amp;byline=0&amp;portrait=0" width="' . esc_attr($video_width). '" height="' . esc_attr($video_height). '" frameborder="0"></iframe>';
   
}

add_shortcode('single_vimeo', 'p_single_vimeo');

### YOUTUBE SC

function p_single_youtube( $atts, $content = null) {
   extract( shortcode_atts( array(
      'video_id' => '',
      'video_width' => '',
      'video_height' => '',
      ), $atts ) );
            
   return '	<iframe title="YouTube video player" allowfullscreen src="http://www.youtube.com/embed/' . esc_attr($video_id) . '?hd=1&wmode=opaque" frameborder="0" height="' . esc_attr($video_height) . '" width="' . esc_attr($video_width) . '"></iframe>';
   
}

add_shortcode('single_youtube', 'p_single_youtube');

### SELF HOSTED VIDEO SC 

function p_single_shv( $atts, $content = null) {
   extract( shortcode_atts( array(
      'video_url' => '',
      'video_width' => '',
      'video_height' => '',
      ), $atts ) );
      
      $rand_id = rand()."uniq";
            
	return '<a href="' . esc_attr($video_url) . '" style="display:block;width:' . esc_attr($video_width) . 'px;height:' . esc_attr($video_height) . 'px" id="' . $rand_id . '"></a> 
			
	<script>
	flowplayer("' . $rand_id . '", {src: "' . BP . '/video/flowplayer-3.2.6.swf",wmode: "transparent"}, { clip:  {
        autoPlay: false,
        autoBuffering: true,
    }});
	
	</script>			

';
	   
}

add_shortcode('single_shv', 'p_single_shv');

## LAYOUT SHORTCODES

function p_two_column( $atts, $content = null) {

return '<div class="col_2">' . do_shortcode($content) . '</div>';

}

function p_two_column_last( $atts, $content = null) {

return '<div class="col_2 last">' . do_shortcode($content) . '</div><div class="clear"></div>';

}

add_shortcode('two_column', 'p_two_column');
add_shortcode('two_column_last', 'p_two_column_last');

function p_third_column( $atts, $content = null) {

return '<div class="col_3">' . do_shortcode($content) . '</div>';

}

function p_third_column_last( $atts, $content = null) {

return '<div class="col_3 last">' . do_shortcode($content) . '</div><div class="clear"></div>';

}

add_shortcode('three_column', 'p_third_column');
add_shortcode('three_column_last', 'p_third_column_last');

function p_fourth_column( $atts, $content = null) {

return '<div class="col_4">' . do_shortcode($content) . '</div>';

}

function p_fourth_column_last( $atts, $content = null) {

return '<div class="col_4 last">' . do_shortcode($content) . '</div><div class="clear"></div>';

}

add_shortcode('four_column', 'p_fourth_column');
add_shortcode('four_column_last', 'p_fourth_column_last');

function p_two_third_left_column( $atts, $content = null) {

return '<div class="col_two_third_left">' . do_shortcode($content) . '</div>';

}

function p_two_third_left_column_last( $atts, $content = null) {

return '<div class="col_two_third_left last">' . do_shortcode($content) . '</div><div class="clear"></div>';

}

add_shortcode('two_third_column_left', 'p_two_third_left_column');
add_shortcode('two_third_column_left_last', 'p_two_third_left_column_last');

function p_two_third_right_column( $atts, $content = null) {

return '<div class="col_two_third_right">' . do_shortcode($content) . '</div>';

}

function p_two_third_right_column_last( $atts, $content = null) {

return '<div class="col_two_third_right last">' . do_shortcode($content) . '</div><div class="clear"></div>';

}

add_shortcode('two_third_column_right', 'p_two_third_right_column');
add_shortcode('two_third_column_right_last', 'p_two_third_right_column_last');

### TEXT SHORTCODES

function ms_color_aid($atts, $content = null) {

extract(shortcode_atts( array ('color' => ''), $atts));

return '<span style="color: ' . $color . ';">' . do_shortcode($content) . '</span>';

}

add_shortcode('textcolor', 'ms_color_aid');

function ms_bold_aid($atts, $content = null) {

return '<strong>' . do_shortcode($content) . '</strong>';

}

add_shortcode('textbold', 'ms_bold_aid');

function ms_italic_aid($atts, $content = null) {

return '<i>' . do_shortcode($content) . '</i>';

}

add_shortcode('textitalic', 'ms_italic_aid');

## LIGHTBOX SINGLE SHORTCODE 

function p_single_lightbox($atts, $content = null) {

extract(shortcode_atts( array ('url' => '', 'image_url' => '', 'image_width' => '', 'image_height' => '', 'title' => ''), $atts));

return '<a title="" class="single_lightbox" href="' . esc_attr($url) . '" rel="prettyPhotoSingle"><img alt="' . esc_attr($title) . '" src="' . esc_attr($image_url) . '" height="' . esc_attr($image_height) . '" /></a>';

}

add_shortcode('single_lightbox', 'p_single_lightbox');

## ALERT BOXES 

function p_success_box($atts, $content = null) {

return '<div class="success_box">' . do_shortcode($content) . '</div>';

}

add_shortcode('success_box', 'p_success_box');

function p_alert_box($atts, $content = null) {

return '<div class="alert_box">' . do_shortcode($content) . '</div>';

}

add_shortcode('alert_box', 'p_alert_box');

function p_error_box($atts, $content = null) {

return '<div class="error_box">' . do_shortcode($content) . '</div>';

}

add_shortcode('error_box', 'p_error_box');

function p_download_box($atts, $content = null) {

return '<div class="download_box">' . do_shortcode($content) . '</div>';

}

add_shortcode('download_box', 'p_download_box');

## BUTTON

function p_button( $atts, $content = null) {

extract(shortcode_atts( array ('color' => '#fffff', 'link' => 'Enter your link...', 'text_color' => '#fff'), $atts));

return '<a class="button" style="background:' . esc_attr($color) . '; color: ' . esc_attr($text_color) . ';" href="' . esc_attr($link) . '">' . do_shortcode($content) . '</a>';

}

add_shortcode('button', 'p_button');

## IMAGE SHORTCODES

function p_image_left( $atts, $content = null) {

extract(shortcode_atts( array ('image_url' => ''), $atts));

return '<div class="img_left"><img src="' . esc_attr($image_url) . '" alt="" /></div>';

}

add_shortcode('image_left', 'p_image_left');

function p_image_right( $atts, $content = null) {

extract(shortcode_atts( array ('image_url' => ''), $atts));

return '<div class="img_right"><img src="' . esc_attr($image_url) . '" alt="" /></div>';

}

add_shortcode('image_right', 'p_image_right');

## LIST SHORTCODES

function p_pointer_list( $atts, $content = null) {

return '<ul class="square">' . do_shortcode($content) . '</ul>';

}

add_shortcode('list_square', 'p_pointer_list');

function p_circle_list( $atts, $content = null) {

return '<ul class="circle">' . do_shortcode($content) . '</ul>';

}

add_shortcode('list_circle', 'p_circle_list');

function p_numbered_list( $atts, $content = null) {

return '<ul class="numbered">' . do_shortcode($content) . '</ul>';

}

add_shortcode('list_numbered', 'p_numbered_list');

## DROPCAPS 

function p_dropcap( $atts, $content = null) {

extract(shortcode_atts( array ('color' => '#999', 'background_color' => '#ccc'), $atts));

return '<span class="dropcap" style="background: ' . esc_attr($background_color) . '; color: ' . esc_attr($color) . '">' . do_shortcode($content) . '</span>';

}

add_shortcode('dropcap', 'p_dropcap');

## HIGHLIGHT 

function p_highlight( $atts, $content = null) {

extract(shortcode_atts( array ('color' => '#999', 'background_color' => '#000'), $atts));

return '<span class="highlight" style="background: ' . esc_attr($background_color) . '; color: ' . esc_attr($color) . ';">' . do_shortcode($content) . '</span>';

}

add_shortcode('highlight', 'p_highlight');

## PULL QUOTES

function p_pullquote( $atts, $content = null) {

return '<span class="pullquote">' . do_shortcode($content) . '</span>';

}

add_shortcode('pull_quote_left', 'p_pullquote');

function p_pullquote_right( $atts, $content = null) {

return '<span class="pullquote_right">' . do_shortcode($content) . '</span>';

}

add_shortcode('pull_quote_right', 'p_pullquote_right');

?>