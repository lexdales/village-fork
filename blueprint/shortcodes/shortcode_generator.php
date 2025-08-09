<?php 

add_action('admin_init', 'enqueue_sg_script');

function enqueue_sg_script () {

wp_enqueue_script("sg_config", get_bloginfo('template_url')."/blueprint/shortcodes/shortcode_generator_config.js");

}

add_action('save_post', 'p_save_shortcode_generator');
add_action('add_meta_boxes', 'p_add_shortcode_generator_box');

function p_add_shortcode_generator_box () {

add_meta_box('p_shortcode_generator_plugin', "Shortcode Generator", 'p_add_shortcode_generator', 'page', 'side', 'high');
add_meta_box('p_shortcode_generator_plugin', "Shortcode Generator", 'p_add_shortcode_generator', 'post', 'side', 'high');
add_meta_box('p_shortcode_generator_plugin', "Shortcode Generator", 'p_add_shortcode_generator', 'portfolio', 'side', 'high');

}

function p_add_shortcode_generator () {

wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );

?>

<div style="padding: 4px 4px 4px 4px;">

<select name="p_shortcode_generator_list" class="target" style="width:99%;">
<option value="" disabled="true">Select a shortcode...</option>
<option value="" disabled="true">--------------------------</option>
<option value="" disabled="true">Column Shortcodes</option>
<option value="" disabled="true">--------------------------</option>
<option value="two_column">Two Columns</option>
<option value="three_column">Three Columns</option>
<option value="four_column">Four Column</option>
<option value="five_column">Five Column</option>
<option value="col_two_third_left">Two Third Column Left</option>
<option value="col_two_third_right">Two Third Column Right</option>
<option value="" disabled="true">--------------------------</option>
<option value="" disabled="true">Button Shortcodes</option>
<option value="" disabled="true">--------------------------</option>
<option value="scbutton">Button</option>
<option value="" disabled="true">--------------------------</option>
<option value="" disabled="true">Image Shortcodes</option>
<option value="" disabled="true">--------------------------</option>
<option value="scimageleft">Image Left</option>
<option value="scimageright">Image Right</option>
<option value="" disabled="true">--------------------------</option>
<option value="" disabled="true">Text Shortcodes</option>
<option value="" disabled="true">--------------------------</option>
<option value="text_bold">Bold Text</option>
<option value="text_italic">Italic Text</option>
<option value="text_color">Colored Text</option>
<option value="text_highlight">Highlight Text</option>
<option value="" disabled="true">--------------------------</option>
<option value="" disabled="true">Lightbox Shortcodes</option>
<option value="" disabled="true">--------------------------</option>
<option value="single_lightbox">Lightbox</option>
<option value="" disabled="true">--------------------------</option>
<option value="" disabled="true">Message Shortcodes</option>
<option value="" disabled="true">--------------------------</option>
<option value="success_message">Success Box</option>
<option value="alert_message">Alert Box</option>
<option value="error_message">Error Box</option>
<option value="download_message">Download Box</option>
<option value="" disabled="true">--------------------------</option>
<option value="" disabled="true">Video Shortcodes</option>
<option value="" disabled="true">--------------------------</option>
<option value="single_youtube">Youtube</option>
<option value="single_vimeo">Vimeo</option>
<option value="single_shv">Self Hosted Video</option>
<option value="" disabled="true">--------------------------</option>
<option value="" disabled="true">List Shortcodes</option>
<option value="" disabled="true">--------------------------</option>
<option value="circle_list">Circle List</option>
<option value="square_list">Square List</option>
<option value="numbered_list">Numbered List</option>
<option value="" disabled="true">--------------------------</option>
<option value="" disabled="true">Dropcap Shortcodes</option>
<option value="" disabled="true">--------------------------</option>
<option value="dropcap">Dropcap</option>
<option value="" disabled="true">--------------------------</option>
<option value="" disabled="true">Pullquote Shortcodes</option>
<option value="" disabled="true">--------------------------</option>
<option value="pullquote_left">Pullquote Left</option>
<option value="pullquote_right">Pullquote Right</option>
</select>

<!-- SHORTCODE PANELS -->

<div class="sg_panels">

<div class="columns">


</div>

<div class="scbutton" style="display: none;">

<h4>Button Color (RGB eg. #ff0000)</h4>

<input type="text" id="scbutton_link" class="scbutton_link" style="width: 99%" />

<h4>Button Background Color (RGB eg. #ff0000)</h4>

<input type="text" id="scbutton_text_color" class="scbutton_text_color" style="width: 99%" />

<h4>Button Text Color (RGB eg. #ff0000)</h4>

<input type="text" id="scbutton_bg_color" class="scbutton_bg_color" style="width: 99%" />

</div>

<div class="scimage" style="display: none;">

<h4>Image URL</h4>

<input type="text" id="scimage_url" class="scimage_url" style="width: 99%" />

</div>

<div class="text_color" style="margin-top: 20px; display: none;">

<h4>Text Color (RGB eg. #ff0000)</h4>

<input type="text" id="text_color_value" class="text_color_value" style="width: 99%" />

</div>

<div class="text_highlight" style="display: none;">

<h4>Text Color (RGB eg. #ff0000)</h4>

<input type="text" id="text_highlight_color" class="text_highlight_color" style="width: 99%" />

<h4>Highlight Color (RGB eg. #ff0000)</h4>

<input type="text" id="text_highlight_bg_color" class="text_highlight_bg_color" style="width: 99%" />

</div>

<div class="single_lightbox" style="display: none;">

<h4>Lightbox URL</h4>

<input type="text" id="single_lightbox_url" class="single_lightbox_url" style="width: 99%" />

<h4>Image URL</h4>

<input type="text" id="single_lightbox_image_url" class="single_lightbox_image_url" style="width: 99%" />

<h4>Image Width</h4>

<input type="text" id="single_lightbox_width" class="single_lightbox_width" style="width: 99%" />

<h4>Image Height</h4>

<input type="text" id="single_lightbox_height" class="single_lightbox_height" style="width: 99%" />

<h4>Title</h4>

<input type="text" id="single_lightbox_title" class="single_lightbox_title" style="width: 99%" />

</div>

<div class="single_youtube" style="display: none;">

<h4>Youtube Video ID</h4>

<input type="text" id="single_youtube_id" class="single_youtube_id" style="width: 99%" />

<h4>Video Width</h4>

<input type="text" id="single_youtube_width" class="single_youtube_width" style="width: 99%" />

<h4>Video Height</h4>

<input type="text" id="single_youtube_height" class="single_youtube_height" style="width: 99%" />

</div>

<div class="single_vimeo" style="display: none;">

<h4>Vimeo Video ID</h4>

<input type="text" id="single_vimeo_id" class="single_vimeo_id" style="width: 99%" />

<h4>Video Width</h4>

<input type="text" id="single_vimeo_width" class="single_vimeo_width" style="width: 99%" />

<h4>Video Height</h4>

<input type="text" id="single_vimeo_height" class="single_vimeo_height" style="width: 99%" />

</div>

<div class="single_shv" style="display: none;">

<h4>Video URL</h4>

<input type="text" id="single_shv_id" class="single_shv_id" style="width: 99%" />

<h4>Video Width</h4>

<input type="text" id="single_shv_width" class="single_shv_width" style="width: 99%" />

<h4>Video Height</h4>

<input type="text" id="single_shv_height" class="single_shv_height" style="width: 99%" />

</div>

<div class="lists" style="display: none;">

<h4>Number Of List Items</h4>

<input type="text" id="no_of_list_items" class="no_of_list_items" style="width: 99%" />

</div>

<div class="dropcap" style="display: none;">

<h4>Text Color (RGB eg. #ff0000)</h4>

<input type="text" id="dropcap_text_color" class="dropcap_text_color" style="width: 99%" />

<h4>Background Color (RGB eg. #ff0000)</h4>

<input type="text" id="dropcap_bg_color" class="dropcap_bg_color" style="width: 99%" />

</div>

<span class="button generate" style="display: block; width: 130px; padding: 10px; margin-top: 20px; text-align: center;">

Generate Shortcode

</span>

</div>

</div>

<?php

}

function p_save_shortcode_generator ($post_id) {

 if ( !wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename(__FILE__) )) {
    return $post_id;
  }

  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
    return $post_id;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
      return $post_id;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
      return $post_id;
  }
      
}


?>