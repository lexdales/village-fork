<?php 

require "shortcode_generator.php";

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

return '<a title="" class="single_lightbox" href="' . esc_attr($url) . '" rel="prettyPhotoSingle"><img alt="' . esc_attr($title) . '" src="' . get_bloginfo('template_url') . '/timthumb.php?src=' . esc_attr($image_url) . '&amp;w=' . esc_attr($image_width) . '&amp;h=' . esc_attr($image_height) . '&amp;zc=1" width="' . esc_attr($image_width) . '" height="' . esc_attr($image_height) . '" /></a>';

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

## NUMBERED COLUMN TYPES

function p_two_column_numbered( $atts, $content = null) {

extract(shortcode_atts( array ('number' => '0', 'title' => 'Enter your title'), $atts));

return '<div class="col_2_numbered"><span class="number">' . esc_attr($number) . '</span> <h2>' . esc_attr($title) . '</h2><div class="numbered_column_content">' . do_shortcode($content) . '</div></div>';

}

function p_two_column_numbered_last( $atts, $content = null) {

extract(shortcode_atts( array ('number' => '0', 'title' => 'Enter your title'), $atts));

return '<div id="last" class="col_2_numbered"><span class="number">' . esc_attr($number) . '</span> <h2>' . esc_attr($title) . '</h2><div class="numbered_column_content">' . do_shortcode($content) . '</div></div><div class="clear"></div>';

}

add_shortcode('two_column_numbered', 'p_two_column_numbered');
add_shortcode('two_column_numbered_last', 'p_two_column_numbered_last');

function p_three_column_numbered( $atts, $content = null) {

extract(shortcode_atts( array ('number' => '0', 'title' => 'Enter your title'), $atts));

return '<div class="col_3_numbered"><span class="number">' . esc_attr($number) . '</span> <h2>' . esc_attr($title) . '</h2><div class="numbered_column_content">' . do_shortcode($content) . '</div></div>';

}

function p_three_column_numbered_last( $atts, $content = null) {

extract(shortcode_atts( array ('number' => '0', 'title' => 'Enter your title'), $atts));

return '<div class="col_3_numbered last"><span class="number">' . esc_attr($number) . '</span> <h2>' . esc_attr($title) . '</h2><div class="numbered_column_content">' . do_shortcode($content) . '</div></div><div class="clear"></div>';

}

add_shortcode('three_column_numbered', 'p_three_column_numbered');
add_shortcode('three_column_numbered_last', 'p_three_column_numbered_last');

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

extract(shortcode_atts( array ('color' => '999', 'background_color' => 'ccc'), $atts));

return '<span class="dropcap" style="background: #' . esc_attr($background_color) . '; color: ' . esc_attr($color) . '">' . do_shortcode($content) . '</span>';

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