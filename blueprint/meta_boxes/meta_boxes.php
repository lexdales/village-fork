<?php 

#####################################################
##### BLUEPRINT - META BOXES
#####################################################

add_action('save_post', 'p_save_slider_settings');

function blueprint_add_slide_meta () {

add_meta_box('p_slider_settings', "Slider Item Settings", 'p_slider_settings_meta_box', 'slider', 'normal', 'high');

}

function p_slider_settings_meta_box () {

wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );

?>

<div style="padding: 5px 4px 0px 3px;">

<div class="blueprint_help_setting">

The slide image is the Featured Image. This is located in the bottom right of this page.

</div>

<div class="blueprint_setting_section">

<div class="title">Slide Order</div>

<input type="text" class="input" name="p_slider_item_order" value="<?php echo get_post_meta($_GET['post'], 'p_slider_item_order', 12351); ?>" /> 

<div class="desc">This is the position of your slide in the slider.</div>

</div>

</div>

<?php

}

function p_save_slider_settings ($post_id) {

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

  update_post_meta($post_id, 'p_slider_item_type', $_POST['p_slider_item_type']);
  update_post_meta($post_id, 'p_slider_item_link', $_POST['p_slider_item_link']);
  update_post_meta($post_id, 'p_slider_item_link_target', $_POST['p_slider_item_link_target']);
  update_post_meta($post_id, 'p_slider_item_lightbox', $_POST['p_slider_item_lightbox']);
  update_post_meta($post_id, 'p_slider_item_order', $_POST['p_slider_item_order']);
  update_post_meta($post_id, 'p_slider_item_description', $_POST['p_slider_item_description']);
  update_post_meta($post_id, 'p_slider_item_subtitle', $_POST['p_slider_item_subtitle']);
  update_post_meta($post_id, 'p_slider_item_video_link', $_POST['p_slider_item_video_link']);
  update_post_meta($post_id, 'p_slider_item_video_autoplay', $_POST['p_slider_item_video_autoplay']);
  update_post_meta($post_id, 'p_slider_item_video_loop', $_POST['p_slider_item_video_loop']);
  update_post_meta($post_id, 'p_slider_item_audio', $_POST['p_slider_item_audio']);
  update_post_meta($post_id, 'p_slider_item_audio_autoplay', $_POST['p_slider_item_audio_autoplay']);
  update_post_meta($post_id, 'p_slider_item_audio_bg_color', $_POST['p_slider_item_audio_bg_color']);
  update_post_meta($post_id, 'p_slider_item_audio_spectrum_color', $_POST['p_slider_item_audio_spectrum_color']);

}

#####################################################
##### PAGE SETTINGS
#####################################################

add_action('save_post', 'blueprint_save_page_settings');
add_action('add_meta_boxes', 'blueprint_add_page_settings_box');

function blueprint_add_page_settings_box () {

add_meta_box('blueprint_page_slider_settings', "Village Page Settings", 'blueprint_init_page_settings_box', 'page', 'normal', 'high');

}

function blueprint_init_page_settings_box () {

wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );

$wall_check = get_post_meta($_GET['post'], "blueprint_wall_select", 28389);
$slider_check = get_post_meta($_GET['post'], "blueprint_slider_select", 28899);
$bg_check = get_post_meta($_GET['post'], "blueprint_background_select", 28899);
$gallery_check = get_post_meta($_GET['post'], 'blueprint_gallery_select', 23231);
$gallery_orientation_check = get_post_meta($_GET['post'], 'blueprint_gallery_orientation', true);
$portfolio_check = get_post_meta($_GET['post'], 'blueprint_portfolio_select', 23231);
$custom_fields = get_post_custom_values('_wp_page_template', $_GET['post']);
$page_template = $custom_fields[0];

?>

<div style="padding: 5px 4px 0px 3px;">

<div class="blueprint_help_setting">

OPTIONS WILL APPEAR HERE WHEN YOU SELECT A PARTICULAR PAGE TEMPLATE.

</div>


<div class="blueprint_setting_section">

<div class="title">Select a Background</div>

<select name="blueprint_background_select" style="width: 99%"> 
 <option value="">Select a background...</option> 
 <?php 
  $backgrounds = get_posts('post_type=background&numberposts=99999'); 
  foreach ($backgrounds as $bg) {
  	$option = '<option value="' . $bg->post_name . '"';
	if ($bg->post_name == $bg_check) $option .= "selected";
	$option .= ">";
	$option .= $bg->post_title;
	$option .= '</option>';
	echo $option;
  }
 ?>
</select>

<div class="desc">Create backgrounds by going to Backgrounds > Add New. This setting does not apply to slideshow templates.</div>

</div>

<div id="wall_settings">

<div class="blueprint_setting_section">


<div class="title">Select a wall to display...</div>

<select name="blueprint_wall_select" style="width: 99%"> 
 <option value="">Select a wall...</option> 
 <?php 
  $categories = get_categories('taxonomy=wall-categories'); 
  foreach ($categories as $category) {
  	$option = '<option value="' . $category->category_nicename . '"';
	if ($category->category_nicename == $wall_check) $option .= "selected";
	$option .= ">";
	$option .= $category->cat_name;
	$option .= '</option>';
	echo $option;
  }
 ?>
</select>

<div class="desc">Select a wall to display.</div>

</div>

<div class="blueprint_setting_sep"></div>

<div class="blueprint_setting_section">

<div class="title">Number Of Thumbs Per Row</div>

<input type="text" class="input" id="blueprint_wall_thumbs_per_row" name="blueprint_wall_thumbs_per_row" value="<?php echo get_post_meta($_GET['post'], 'blueprint_wall_thumbs_per_row', 23235); ?>" /> 

<div class="desc">The number of thumbs per row in the wall.</div>

</div>

<div class="blueprint_setting_sep"></div>

<div class="blueprint_setting_section">

<div class="title">Wall Thumb Width (In Pixels)</div>

<input type="text" class="input" id="blueprint_wall_thumb_width" name="blueprint_wall_thumb_width" value="<?php echo get_post_meta($_GET['post'], 'blueprint_wall_thumb_width', 12121); ?>" /> 

<div class="desc">The width of each thumb in pixels.</div>

</div>

<div class="blueprint_setting_sep"></div>

<div class="blueprint_setting_section">

<div class="title">Wall Thumb Height (In Pixels)</div>

<input type="text" class="input" id="blueprint_wall_thumb_height" name="blueprint_wall_thumb_height" value="<?php echo get_post_meta($_GET['post'], 'blueprint_wall_thumb_height', 25252); ?>" /> 

<div class="desc">The height of each thumb in pixels.</div>

</div>

<div class="blueprint_setting_sep"></div>

<div class="blueprint_setting_section">

<div class="title">Wall Padding (In Pixels)</div>

<input type="text" class="input" id="blueprint_wall_thumbs_padding" name="blueprint_wall_thumbs_padding" value="<?php echo get_post_meta($_GET['post'], 'blueprint_wall_thumbs_padding', 91242); ?>" /> 

<div class="desc">The amount of padding around the wall in pixels.</div>

</div>

<div class="blueprint_setting_sep"></div>

<div class="blueprint_setting_section">

<div class="title">Wall Thumb Space (In Pixels)</div>

<input type="text" class="input" id="blueprint_wall_thumbs_space" name="blueprint_wall_thumbs_space" value="<?php echo get_post_meta($_GET['post'], 'blueprint_wall_thumbs_space', 82838); ?>" /> 

<div class="desc">The space between each thumb in pixels.</div>

</div>

</div>

<div id="slideshow_settings">

<div class="blueprint_setting_section">

<div class="title">Select a slideshow to display...</div>

<select name="blueprint_slider_select" style="width: 99%"> 
 <option value="">Select a slideshow...</option> 
 <?php 
  $categories = get_categories('taxonomy=slider-categories'); 
  foreach ($categories as $category) {
  	$option = '<option value="' . $category->category_nicename . '"';
	if ($category->category_nicename == $slider_check) $option .= "selected";
	$option .= ">";
	$option .= $category->cat_name;
	$option .= '</option>';
	echo $option;
  }
 ?>
</select>

<div class="desc">Select a slideshow to display.</div>

</div>

</div>

<div id="gallery_settings">

<div class="blueprint_setting_sep"></div>

<div class="blueprint_setting_section">

<div class="title">Select a gallery to display...</div>

<select name="blueprint_gallery_select" style="width: 99%"> 
 <option value="">Select a gallery...</option> 
 <?php 

 query_posts("post_type=gallery&posts_per_page=99999");
 
 global $post;
 
 if (have_posts()) : while (have_posts()) : the_post();
 
 ?>
 
 <option value="<?php echo $post->ID; ?>" <?php if ($gallery_check == $post->ID) echo "selected"; ?>><?php echo $post->post_title; ?></option>
 
 <?php
 
 endwhile; endif;
 
 wp_reset_query();

 ?>
</select>

<div class="desc">Select a gallery to display.</div>

</div>

<div class="blueprint_setting_sep"></div>

<div class="blueprint_setting_section">

<div class="title">Gallery Type</div>

<?php

$gallery_type_check = get_post_meta($_GET['post'], 'blueprint_gallery_type', true);

?>

<select name="blueprint_gallery_type"  style="width: 99%">
<option>Select one...</option>
<option disabled="true">prettyPhoto</option>
<option value="prettyphoto4" <?php if ($gallery_type_check == "prettyphoto4") echo "selected"; ?>>prettyPhoto - 4 Columns</option>
<option value="prettyphoto3" <?php if ($gallery_type_check == "prettyphoto3") echo "selected"; ?>>prettyPhoto - 3 Columns</option>
<option value="prettyphoto2" <?php if ($gallery_type_check == "prettyphoto2") echo "selected"; ?>>prettyPhoto - 2 Columns</option>
<option value="prettyphoto1" <?php if ($gallery_type_check == "prettyphoto1") echo "selected"; ?>>prettyPhoto - 1 Column</option>
<option disabled="true">ColorBox</option>
<option value="colorbox4" <?php if ($gallery_type_check == "colorbox4") echo "selected"; ?>>ColorBox - 4 Columns</option>
<option value="colorbox3" <?php if ($gallery_type_check == "colorbox3") echo "selected"; ?>>ColorBox - 3 Columns</option>
<option value="colorbox2" <?php if ($gallery_type_check == "colorbox2") echo "selected"; ?>>ColorBox - 2 Columns</option>
<option value="colorbox1" <?php if ($gallery_type_check == "colorbox1") echo "selected"; ?>>ColorBox - 1 Column</option>
<option disabled="true">FancyBox</option>
<option value="fancybox4" <?php if ($gallery_type_check == "fancybox4") echo "selected"; ?>>FancyBox - 4 Columns</option>
<option value="fancybox3" <?php if ($gallery_type_check == "fancybox3") echo "selected"; ?>>FancyBox - 3 Columns</option>
<option value="fancybox2" <?php if ($gallery_type_check == "fancybox2") echo "selected"; ?>>FancyBox - 2 Columns</option>
<option value="fancybox1" <?php if ($gallery_type_check == "fancybox1") echo "selected"; ?>>FancyBox - 1 Column</option>
<option disabled="true">Galleria</option>
<option value="galleria" <?php if ($gallery_type_check == "galleria") echo "selected"; ?>>Galleria Gallery</option>
</select>

<div class="desc">The type of gallery you want to display.</div>

</div>

<div class="blueprint_setting_sep"></div>

<div class="blueprint_setting_section">

<div class="title">Gallery Thumb Orientation</div>

<select name="blueprint_gallery_orientation"  style="width: 99%">
<option value="landscape" <?php if ($gallery_orientation_check == "landscape") echo "selected"; ?>>Landscape</option>
<option value="portrait" <?php if ($gallery_orientation_check == "portrait") echo "selected"; ?>>Portrait</option>
</select>

<div class="desc">The orientation of the gallery thumbnails.</div>

</div>

</div>

<div id="portfolio_settings">

<div class="blueprint_setting_section">

<div class="title">Select a portfolio to display...</div>

<select name="blueprint_portfolio_select" style="width: 99%"> 
 <option value="">Select a portfolio...</option> 
 <?php 
  $categories = get_categories('taxonomy=portfolio-categories'); 
  foreach ($categories as $category) {
  	$option = '<option value="' . $category->category_nicename . '"';
	if ($category->category_nicename == $portfolio_check) $option .= "selected";
	$option .= ">";
	$option .= $category->cat_name;
	$option .= '</option>';
	echo $option;
  }
 ?>
</select>

<div class="desc">Select a portfolio to display on this page.</div>

</div>

</div>

</div>

<?php

}

function blueprint_save_page_settings ($post_id) {

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
  
  update_post_meta($post_id, 'blueprint_wall_select', $_POST['blueprint_wall_select']);
  update_post_meta($post_id, "blueprint_wall_thumbs_per_row", $_POST['blueprint_wall_thumbs_per_row']);
  update_post_meta($post_id, "blueprint_wall_thumb_width", $_POST['blueprint_wall_thumb_width']);
  update_post_meta($post_id, "blueprint_wall_thumb_height", $_POST['blueprint_wall_thumb_height']);
  update_post_meta($post_id, "blueprint_wall_thumbs_space", $_POST['blueprint_wall_thumbs_space']);
  update_post_meta($post_id, "blueprint_wall_thumbs_padding", $_POST['blueprint_wall_thumbs_padding']);

  update_post_meta($post_id, 'blueprint_slider_select', $_POST['blueprint_slider_select']);

  update_post_meta($post_id, "blueprint_background_select", $_POST['blueprint_background_select']);

  update_post_meta($post_id, "blueprint_gallery_select", $_POST['blueprint_gallery_select']);
  update_post_meta($post_id, "blueprint_gallery_type", $_POST['blueprint_gallery_type']);
  update_post_meta($post_id, "blueprint_gallery_orientation", $_POST['blueprint_gallery_orientation']);

  update_post_meta($post_id, "blueprint_portfolio_select", $_POST['blueprint_portfolio_select']);
  
}

add_action('save_post', 'blueprint_save_post_settings');
add_action('add_meta_boxes', 'blueprint_add_post_settings_box');

function blueprint_add_post_settings_box () {

add_meta_box('blueprint_post_slider_settings', "Village Post Settings", 'blueprint_init_post_settings_box', 'post', 'normal', 'high');

}

function blueprint_init_post_settings_box () {

wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );

$bg_check = get_post_meta($_GET['post'], "blueprint_background_select", 28899);

?>

<div style="padding: 5px 4px 0px 3px;">

<div class="blueprint_help_setting">

Here are the main settings for the post. There is an explanation of each option underneath itself.

</div>

<div class="blueprint_setting_sep"></div>

<div class="blueprint_setting_section">

<div class="title">Select a Background</div>

<select name="blueprint_background_select" style="width: 99%"> 
 <option value="">Select a background...</option> 
 <?php 
  $backgrounds = get_posts('post_type=background&numberposts=99999'); 
  foreach ($backgrounds as $bg) {
  	$option = '<option value="' . $bg->post_name . '"';
	if ($bg->post_name == $bg_check) $option .= "selected";
	$option .= ">";
	$option .= $bg->post_title;
	$option .= '</option>';
	echo $option;
  }
 ?>
</select>

<div class="desc">Select a background. You create backgrounds by going to Backgrounds > Add New</div>

</div>

</div>

<?php

}

function blueprint_save_post_settings ($post_id) {

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
  
  update_post_meta($post_id, "blueprint_background_select", $_POST['blueprint_background_select']);
  
}

add_action('save_post', 'blueprint_save_wall_settings');

function blueprint_add_wall_meta () {

add_meta_box('blueprint_wall_item_settings', "Wall Item Settings", 'blueprint_init_wall_settings_box', 'wall', 'normal', 'high');

}

function blueprint_init_wall_settings_box () {

wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );

$wall_check = get_post_meta($_GET['post'], "blueprint_wall_item_type", 32138);

?>

<div style="padding: 5px 4px 0px 3px;">

<div class="blueprint_setting_section">

<div class="title">Choose A Wall Item To Display...</div>

<select name="blueprint_wall_item_type" onchange="javascript:document.post.submit()" class="select_wrapper"> 
<option value="normal" <?php if ($wall_check == "normal") echo "selected"; ?> >Normal</option>
<option value="link" <?php if ($wall_check == "link") echo "selected"; ?> >Link</option>
<option value="lightbox" <?php if ($wall_check == "lightbox") echo "selected"; ?> >Lightbox</option>
<option value="vimeo" <?php if ($wall_check == "vimeo") echo "selected"; ?> >Vimeo</option>
<option value="youtube" <?php if ($wall_check == "youtube") echo "selected"; ?> >Youtube</option>
<option value="self_hosted_video" <?php if ($wall_check == "self_hosted_video") echo "selected"; ?> >Self Hosted Video</option>
</select>

<div class="desc">The wall item type. Normal, Lightbox, Vimeo & Youtube.</div>

</div>

<?php if ($wall_check == "lightbox") : ?>

<div class="blueprint_setting_sep"></div>

<div class="blueprint_setting_section">

<div class="title">Lightbox Link</div>

<input type="text" class="input" name="blueprint_wall_item_lightbox" value="<?php echo get_post_meta($_GET['post'], "blueprint_wall_item_lightbox", 11123); ?>" />

<div class="desc">The lightbox link. If you leave it blank to image will appear in lightbox.</div>

</div>

<div class="blueprint_setting_sep"></div>

<div class="blueprint_setting_section">

<div class="title">Description</div>

<input type="text" class="input" name="blueprint_wall_item_description" value="<?php echo get_post_meta($_GET['post'], "blueprint_wall_item_description", 23243); ?>" />

<div class="desc">The description of the wall item.</div>

</div>

<?php endif; ?>

<?php if ($wall_check == "vimeo") : ?>

<div class="blueprint_setting_sep"></div>

<div class="blueprint_setting_section">

<div class="title">Vimeo Video ID</div>

<input type="text" class="input" name="blueprint_wall_item_vimeo" value="<?php echo get_post_meta($_GET['post'], "blueprint_wall_item_vimeo", 33232); ?>" />

<div class="desc">The id of the vimeo video.</div>

</div>

<?php endif; ?>

<?php if ($wall_check == "youtube") : ?>

<div class="blueprint_setting_sep"></div>

<div class="blueprint_setting_section">

<div class="title">Youtube Video ID</div>

<input type="text" class="input" name="blueprint_wall_item_youtube" value="<?php echo get_post_meta($_GET['post'], "blueprint_wall_item_youtube", 33232); ?>" />

<div class="desc">The id of the youtube video.</div>

</div>

<?php endif; ?>

<?php if ($wall_check == "link") : ?>

<div class="blueprint_setting_sep"></div>

<div class="blueprint_setting_section">

<div class="title">Item Link</div>

<input type="text" class="input" name="blueprint_wall_item_link" value="<?php echo get_post_meta($_GET['post'], "blueprint_wall_item_link", 40000); ?>" />

<div class="desc">The id of the youtube video.</div>

</div>

<div class="blueprint_setting_sep"></div>

<div class="blueprint_setting_section">

<div class="title">Description</div>

<input type="text" class="input" name="blueprint_wall_item_description" value="<?php echo get_post_meta($_GET['post'], "blueprint_wall_item_description", 23243); ?>" />

<div class="desc">The description of the wall item.</div>

</div>

<?php endif; ?>

<?php if ($wall_check == "self_hosted_video") : ?>

<div class="blueprint_setting_sep"></div>

<div class="blueprint_setting_section">

<div class="title">Video URL</div>

<input type="text" class="input" name="blueprint_wall_item_video_url" value="<?php echo get_post_meta($_GET['post'], "blueprint_wall_item_video_url", 23243); ?>" />

<div class="desc">The description of the wall item.</div>

</div>

<?php endif; ?>

</div>

<?php

}

function blueprint_save_wall_settings ($post_id) {

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
  
  update_post_meta($post_id, "blueprint_wall_item_type", $_POST['blueprint_wall_item_type']);
  update_post_meta($post_id, "blueprint_wall_item_description", $_POST['blueprint_wall_item_description']);
  update_post_meta($post_id, "blueprint_wall_item_lightbox", $_POST['blueprint_wall_item_lightbox']);
  update_post_meta($post_id, "blueprint_wall_item_vimeo", $_POST['blueprint_wall_item_vimeo']);
  update_post_meta($post_id, "blueprint_wall_item_youtube", $_POST['blueprint_wall_item_youtube']);
  update_post_meta($post_id, "blueprint_wall_item_link", $_POST['blueprint_wall_item_link']);
  update_post_meta($post_id, "blueprint_wall_item_video_url", $_POST['blueprint_wall_item_video_url']);
    
}

#####################################################
##### BACKGROUND SETTINGS
#####################################################

add_action('save_post', 'blueprint_save_background_settings');

function blueprint_add_background_meta () {

add_meta_box('blueprint_background_item_settings', "Background Item Settings", 'blueprint_init_background_settings_box', 'background', 'normal', 'high');

}

function blueprint_init_background_settings_box () {

wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );

$slider_check = get_post_meta($_GET['post'], "blueprint_slider_background_select", 32138);
$background_type_check = get_post_meta($_GET['post'], "blueprint_background_type", true);

?>

<div style="padding: 5px 4px 0px 3px;">

<div class="blueprint_help_setting">

The background image is set by the Featured Image.

</div>

<div class="blueprint_setting_section">

<div class="title">Background Type</div>

<select name="blueprint_background_type" id="bg_toggle" style="width: 99%"> 
<option value="image" <?php if ($background_type_check == "image") echo "selected"; ?>>Featured Image</option> 
<option value="slideshow" <?php if ($background_type_check == "slideshow") echo "selected"; ?>>Slideshow</option> 
<option value="vimeo" <?php if ($background_type_check == "vimeo") echo "selected"; ?>>Vimeo</option> 
<option value="youtube" <?php if ($background_type_check == "youtube") echo "selected"; ?>>Youtube</option> 
<option value="googlemap" <?php if ($background_type_check == "googlemap") echo "selected"; ?>>Google Maps</option> 
</select>

<div class="desc">Choose the background type for the background.</div>

</div>

<div id="slideshow_toggle" style="display: <?php if ($background_type_check == "slideshow") : echo 'block'; else: echo 'none'; endif; ?>">

<div class="blueprint_setting_sep"></div>

<div class="blueprint_setting_section slideshow_toggle">

<div class="title">Background Slideshow</div>

<select name="blueprint_slider_background_select" style="width: 99%"> 
 <option value="">Select a slideshow...</option> 
 <?php 
  $categories = get_categories('taxonomy=slider-categories'); 
  foreach ($categories as $category) {
  	$option = '<option value="' . $category->category_nicename . '"';
	if ($category->category_nicename == $slider_check) $option .= "selected";
	$option .= ">";
	$option .= $category->cat_name;
	$option .= '</option>';
	echo $option;
  }
 ?>
</select>

<div class="desc">Select a slideshow for the background. If you selected "Slideshow" from the top dropdown this option will be activated.</div>

</div>

</div>

<div id="youtube_toggle" style="display: <?php if ($background_type_check == "youtube") : echo 'block'; else: echo 'none'; endif; ?>">

<div class="blueprint_setting_sep"></div>

<div class="blueprint_setting_section youtube_toggle">

<div class="title">Youtube Video ID</div>

<input type="text" class="input" style="width: 99%" name="blueprint_background_youtube" value="<?php echo get_post_meta($_GET['post'], "blueprint_background_youtube", true); ?>" />

<div class="desc">Type the id of the youtube video and not the full url. If you selected "Youtube" from the top dropdown this option will be activated.</div>

</div>

</div>

<div id="vimeo_toggle" style="display: <?php if ($background_type_check == "vimeo") : echo 'block'; else: echo 'none'; endif; ?>">

<div class="blueprint_setting_sep"></div>

<div class="blueprint_setting_section vimeo_toggle">

<div class="title">Vimeo Video ID</div>

<input type="text" class="input" style="width: 99%" name="blueprint_background_vimeo" value="<?php echo get_post_meta($_GET['post'], "blueprint_background_vimeo", true); ?>" />

<div class="desc">Type the id of the vimeo video and not the full url. If you selected "Vimeo" from the top dropdown this option will be activated.</div>

</div>

</div>

<div id="gmap_toggle" style="display: <?php if ($background_type_check == "googlemap") : echo 'block'; else: echo 'none'; endif; ?>">

<div class="blueprint_setting_sep"></div>

<div class="blueprint_setting_section gmap_toggle">

<div class="title">Latitude</div>

<input type="text" class="input" style="width: 99%" name="blueprint_background_gmap_lat" value="<?php echo get_post_meta($_GET['post'], "blueprint_background_gmap_lat", true); ?>" />

<div class="desc">Enter the Latitude of the location.</div>

</div>

<div class="blueprint_setting_sep"></div>

<div class="blueprint_setting_section gmap_toggle">

<div class="title">Longitude</div>

<input type="text" class="input" style="width: 99%" name="blueprint_background_gmap_long" value="<?php echo get_post_meta($_GET['post'], "blueprint_background_gmap_long", true); ?>" />

<div class="desc">Enter the Longitude of the location.</div>

</div>

<div class="blueprint_setting_sep"></div>

<div class="blueprint_setting_section gmap_toggle">

<div class="title">Zoom (Enter Between 1 - 18)</div>

<input type="text" class="input" style="width: 99%" name="blueprint_background_gmap_zoom" value="<?php echo get_post_meta($_GET['post'], "blueprint_background_gmap_zoom", true); ?>" />

<div class="desc">The amount of zoom you want on the location.</div>

</div>

<div class="blueprint_setting_sep"></div>

<div class="blueprint_setting_section gmap_toggle">

<div class="title">Map Type</div>

<select name="blueprint_background_gmap_map">
	<option value="ROADMAP" <?php if (get_post_meta($_GET['post'], "blueprint_background_gmap_map", true) == "ROADMAP") echo "selected"; ?>>Roadmap</option>
	<option value="SATELLITE" <?php if (get_post_meta($_GET['post'], "blueprint_background_gmap_map", true) == "SATELLITE") echo "selected"; ?>>Satellite</option>
	<option value="HYBRID" <?php if (get_post_meta($_GET['post'], "blueprint_background_gmap_map", true) == "HYBRID") echo "selected"; ?>>Hybrid</option>
</select>

<div class="desc">The type of map you to display.</div>

</div>

</div>

<script type="text/javascript">

	(function ($) {
	
		jQuery("#bg_toggle").change(function () {
			
			jQuery("#vimeo_toggle, #slideshow_toggle, #youtube_toggle, #gmap_toggle").hide();
			
			if (jQuery(this).val() == "slideshow") {
				jQuery("#slideshow_toggle").show();
			} else if (jQuery(this).val() == "youtube") {
				jQuery("#youtube_toggle").show();			
			} else if (jQuery(this).val() == "vimeo") {
				jQuery("#vimeo_toggle").show();						
			} else if (jQuery(this).val() == "googlemap") {
				jQuery("#gmap_toggle").show();									
			}
		
		});
	
	})(jQuery);

</script>

<?php

}

function blueprint_save_background_settings ($post_id) {

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
  
  update_post_meta($post_id, "blueprint_slider_background_select", $_POST['blueprint_slider_background_select']);
  update_post_meta($post_id, "blueprint_background_type", $_POST['blueprint_background_type']);
  update_post_meta($post_id, "blueprint_background_youtube", $_POST['blueprint_background_youtube']);
  update_post_meta($post_id, "blueprint_background_vimeo", $_POST['blueprint_background_vimeo']);
  update_post_meta($post_id, "blueprint_background_gmap_long", $_POST['blueprint_background_gmap_long']);
  update_post_meta($post_id, "blueprint_background_gmap_lat", $_POST['blueprint_background_gmap_lat']);
  update_post_meta($post_id, "blueprint_background_gmap_zoom", $_POST['blueprint_background_gmap_zoom']);
  update_post_meta($post_id, "blueprint_background_gmap_map", $_POST['blueprint_background_gmap_map']);
    
}

#####################################################
##### PORTFOLIO SETTINGS
#####################################################

add_action('admin_print_scripts', 'p_video_preview');

function p_video_preview () {

wp_enqueue_script('p_preview_shv', get_bloginfo('template_url')."/jscript/flowplayer-3.2.6.min.js");

}


add_action('save_post', 'p_save_portfolio_item_options');

function blueprint_add_portfolio_meta () {

add_meta_box('p_portfolio_item_options', "Portfolio Item Options", 'p_portfolio_item_options_box', 'portfolio', 'normal', 'high');

}

function p_portfolio_item_options_box () {

wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );

$media_type_check = get_post_meta($_GET['post'], 'p_portfolio_media_type', 12349);
$bg_check = get_post_meta($_GET['post'], "blueprint_background_select", 28899);

?>

<div class="blueprint_setting_section">

<div class="title">Select a Background</div>

<select name="blueprint_background_select" style="width: 99%"> 
 <option value="">Select a background...</option> 
 <?php 
  $backgrounds = get_posts('post_type=background&numberposts=99999'); 
  foreach ($backgrounds as $bg) {
  	$option = '<option value="' . $bg->post_name . '"';
	if ($bg->post_name == $bg_check) $option .= "selected";
	$option .= ">";
	$option .= $bg->post_title;
	$option .= '</option>';
	echo $option;
  }
 ?>
</select>

<div class="desc">Create backgrounds by going to Backgrounds > Add New. This setting does not apply to slideshow templates.</div>

</div>

<div style="padding: 0px 20px 20px 20px;">

<h2>Show Excerpt - The description under each item defined by the post excerpt...</h2>

<input type="checkbox" <?php if (get_post_meta($_GET['post'], 'p_portfolio_excerpt', 67645) == "on") echo "checked"; ?> name="p_portfolio_excerpt" />

<h2>Project Status - Will disable the link button on the portfolio item if set to offline...</h2>

<select name="p_portfolio_status" style="width: 100%;">

<option value="online" <?php if (get_post_meta($_GET['post'], 'p_portfolio_status', 67615) == "online") echo "selected"; ?>>Online</option>
<option value="offline" <?php if (get_post_meta($_GET['post'], 'p_portfolio_status', 67615) == "offline") echo "selected"; ?>>Offline</option>

</select>

<h2>Visit Site Link - The link to the portfolio item.</h2>

<input type="text" style="width: 100%" name="p_portfolio_button_link" value="<?php echo get_post_meta($_GET['post'], 'p_portfolio_button_link', 62645); ?>" />

<h2>Portfolio Media Type</h2>

<select name="p_portfolio_media_type" style="width: 100%" onchange="javascript:document.post.submit()"> 
 <option value="">Select the type of portfolio you want...</option> 
 <?php 
  $categories = array('normal', 'youtube', 'vimeo', 'self_hosted_video', 'audio', 'link'); 
  foreach ($categories as $category) {
  	$option = '<option value="' . $category . '"';
	if ($category == $media_type_check) $option .= "selected";
	$option .= ">";
	$label = ucfirst($category);
	$option .= str_replace("_", " ", $label);
	$option .= '</option>';
	echo $option;
  }
 ?>
</select>

<?php

if ($media_type_check == "youtube") :

?>

<h2>Youtube Video ID</h2>

<input type="text" style="width: 100%;" name="p_portfolio_youtube_id" value="<?php echo get_post_meta($_GET['post'], 'p_portfolio_youtube_id', 67645); ?>" /> 

<?php if (get_post_meta($_GET['post'], 'p_portfolio_youtube_id', 67645) != "") : ?>

<h2>Live Preview</h2>

<object width="400" height="300"><param name="movie" value="http://www.youtube.com/v/a6GCy_lKYo8?fs=1&amp;hl=en_US"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/<?php echo get_post_meta($_GET['post'], 'p_portfolio_youtube_id', 67645); ?>?fs=1&amp;hl=en_US" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="400" height="300"></embed></object>

<?php 

endif; 

endif;

?>

<?php

if ($media_type_check == "vimeo") :

?>

<h2>Vimeo Video ID</h2>

<input type="text" style="width: 100%;" name="p_portfolio_vimeo_id" value="<?php echo get_post_meta($_GET['post'], 'p_portfolio_vimeo_id', 67647); ?>" /> 

<?php if (get_post_meta($_GET['post'], 'p_portfolio_vimeo_id', 67645) != "") : ?>

<h2>Live Preview</h2>

<iframe src="http://player.vimeo.com/video/<?php echo get_post_meta($_GET['post'], 'p_portfolio_vimeo_id', 67645); ?>?title=0&amp;byline=0&amp;portrait=0" width="400" height="300" frameborder="0"></iframe>

<?php 

endif; 

endif;

?>

<?php

if ($media_type_check == "self_hosted_video") :

?>

<h2>Video URL</h2>

<input type="text" style="width: 100%;" name="p_portfolio_shv" value="<?php echo get_post_meta($_GET['post'], 'p_portfolio_shv', 67647); ?>" /> 

<?php if (get_post_meta($_GET['post'], 'p_portfolio_shv', 67645) != "") : ?>

<h2>Live Preview</h2>

<a href="<?php echo get_post_meta($_GET['post'], 'p_portfolio_shv', 67647); ?>" style="display:block;width:700px;height:450px" id="player"></a> 

<script>
flowplayer("player", "<?php bloginfo("template_url"); ?>/video/flowplayer-3.2.6.swf", {
	clip:  {
autoPlay: false,
autoBuffering: true
}
});
</script>

<?php 

endif; 

endif;

if ($media_type_check == "audio") :

$image_id = get_post_thumbnail_id();  
$image_url = wp_get_attachment_image_src($image_id, 'full');

?>

<h2>Audio URL</h2>

<input type="text" style="width: 100%;" name="p_portfolio_audio" value="<?php echo get_post_meta($_GET['post'], 'p_portfolio_audio', 67611); ?>" /> 

<?php if (get_post_meta($_GET['post'], 'p_portfolio_audio', 67645) != "") : ?>

<h2>Live Preview</h2>

<div id="player" style="display:block;width:600px;height:453px;"></div>

<script>
$f("player", {src: "<?php bloginfo("template_url"); ?>/video/flowplayer-3.2.6.swf",wmode: 'transparent'}, {

	clip: { 
	   url: '<?php echo get_post_meta($_GET['post'], 'p_portfolio_audio', 67647); ?>',
	   
	   coverImage: { url: '<?php echo $image_url[0]; ?>', scaling: 'orig' },
	   autoPlay: false
	}

});
</script>

<?php 

endif; 

endif;

?>

<?php

if ($media_type_check == "link") :

?>

<h2>External Link</h2>

<input type="text" style="width: 100%;" name="p_portfolio_external_link" value="<?php echo get_post_meta($_GET['post'], 'p_portfolio_external_link', 67611); ?>" /> 

<?php

endif;

?>

</div>

<?php

}

function p_save_portfolio_item_options ($post_id) {

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

  update_post_meta($post_id, 'p_portfolio_media_type', $_POST['p_portfolio_media_type']);
  update_post_meta($post_id, 'p_portfolio_youtube_id', $_POST['p_portfolio_youtube_id']);
  update_post_meta($post_id, 'p_portfolio_vimeo_id', $_POST['p_portfolio_vimeo_id']);
  update_post_meta($post_id, 'p_portfolio_shv', $_POST['p_portfolio_shv']);
  update_post_meta($post_id, 'p_portfolio_audio', $_POST['p_portfolio_audio']);
  update_post_meta($post_id, 'p_portfolio_link', $_POST['p_portfolio_link']);
  update_post_meta($post_id, 'p_portfolio_excerpt', $_POST['p_portfolio_excerpt']);   
  update_post_meta($post_id, 'p_portfolio_status', $_POST['p_portfolio_status']);   
  update_post_meta($post_id, 'p_portfolio_button_link', $_POST['p_portfolio_button_link']);
  update_post_meta($post_id, 'p_portfolio_external_link', $_POST['p_portfolio_external_link']);
  update_post_meta($post_id, "blueprint_background_select", $_POST['blueprint_background_select']);

}
		

add_action('add_meta_boxes', 'blueprint_add_gallery_manager');

function blueprint_add_gallery_manager () {

add_meta_box('blueprint_gallery', "Gallery Manager", 'fw_gallery_box', 'gallery', 'normal', 'high');

}

function fw_gallery_box () {

	global $post;

			$gallery_item_count = 0;
			
			$string = "";

			$attachments = get_children(array('post_parent' => $post->ID,
									'post_status' => 'inherit',
									'post_type' => 'attachment',
									'post_mime_type' => 'image',
									'order' => 'ASC',
									'orderby' => 'menu_order ID'));
			
			foreach($attachments as $att_id => $attachment) {
				$gallery_item_count++;
			}
			
			if ($gallery_item_count > 0)
			{
				$upload_label = __("Edit Gallery", "village");
			} else {
				$upload_label = __("Upload", "village");			
			}
			
			$post_id = (isset($_GET['post']) != "") ? $_GET['post'] : "dunno";
			
			if (isset($_GET['post'])) 
			{
						
			$string .= '<script type="text/javascript">jQuery(document).ready(function() {

			jQuery("#upload_button").click(function() {
		
				tb_show( "", "media-upload.php?';
				
				if ($post_id != "") $string .= 'post_id=' . $post_id . '&';
				
				$string .= 'TB_iframe=1" );	
			
				 return false;
		
			});
						
			});</script>

			<div id="gallery_manager">
			
			<a id="upload_button" class="button" href="#" style="font-size: 16px;">' . $upload_label . '</a>
			
			';
				
			} else {
			
				$string .= '<div id="gallery_manager"><h2>' . __("Give the gallery a title and click Publish to start uploading.", "village") . '</h2>';
			
			}
			
						
			if ($gallery_item_count > 0)
			{		
			
				$string .= '<h2>' . __("Live Preview", "village") . '</h2><ul>';
			
				$attachments = get_children(array('post_parent' => $post->ID,
									'post_status' => 'inherit',
									'post_type' => 'attachment',
									'post_mime_type' => 'image',
									'order' => 'DESC',
									'orderby' => 'menu_order ID'));
			
				foreach($attachments as $att_id => $attachment) {
						$full_img_url = wp_get_attachment_url($attachment->ID);
				        $split_pos = strpos($full_img_url, 'wp-content');
				        $split_len = (strlen($full_img_url) - $split_pos);
				        $abs_img_url = substr($full_img_url, $split_pos, $split_len);
				        $full_info = @getimagesize(ABSPATH.$abs_img_url);
				        $string .= '<li>' . wp_get_attachment_image($attachment->ID, "portfolio_preview_thumb") . '</li>';
				}
				
				$string .= '<br class="clear" /></ul>';
			
			} 
						
			$string .= '</div>';

		echo $string;

}

add_action("admin_head", "fw_meta_box_toggle");

function fw_meta_box_toggle () 
{

	?>
	
	<script type="text/javascript">
	
	jQuery(function () 
	{
	
		var divs = jQuery("#wall_settings, #portfolio_settings, #gallery_settings, #slideshow_settings");

		jQuery("#wall_settings").addClass("wall");
		jQuery("#wall_settings").addClass("wall_menu");
		jQuery("#gallery_settings").addClass("gallery_template");
		jQuery("#slideshow_settings").addClass("slideshow_floating_portrait");
		jQuery("#slideshow_settings").addClass("slideshow_floating");
		jQuery("#slideshow_settings").addClass("slideshow_no_cropping");
		jQuery("#slideshow_settings").addClass("slideshow_no_thumbs");
		jQuery("#slideshow_settings").addClass("slideshow");
		jQuery("#slideshow_settings").addClass("slideshow_portrait");
		jQuery("#portfolio_settings").addClass("portfolio-one-column");
		jQuery("#portfolio_settings").addClass("portfolio-two-column");
		jQuery("#portfolio_settings").addClass("portfolio-three-column");
		jQuery("#portfolio_settings").addClass("portfolio-paged");
		
				
		jQuery("#page_template").change(function (i) 
		{
		
			var selected = jQuery(this).val().replace(".php","");
			
			divs.each(function () 
			{
				
				if (jQuery(this).hasClass(selected))
				{
				
					jQuery(this).show();
				
				} else {
				
					jQuery(this).hide();
				
				}
				
			
			})
		
		}).change();
	
	});
		
	</script>
	
	<?php	

}

?>