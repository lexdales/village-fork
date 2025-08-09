<?php

#####################################################
##### SEO PAGE/POST SETTINGS
#####################################################

add_action('save_post', 'blueprint_save_seo_settings');
add_action('add_meta_boxes', 'blueprint_add_seo_settings_box');

function blueprint_add_seo_settings_box () {

add_meta_box('blueprint_seo_settings', "Village SEO Settings", 'blueprint_init_seo_settings_box', 'page', 'normal', 'high');
add_meta_box('blueprint_seo_settings', "Village SEO Settings", 'blueprint_init_seo_settings_box', 'post', 'normal', 'high');
add_meta_box('blueprint_seo_settings', "Village SEO Settings", 'blueprint_init_seo_settings_box', 'portfolio', 'normal', 'high');

}

function blueprint_init_seo_settings_box () {

?>

<div style="padding: 5px 4px 0px 3px;">

<div class="blueprint_help_setting">

<?php if (of_get_option('seo') == "yes") : ?>

Here are the seo settings for this post/page.

<?php else: ?>

You currently have the seo plugin disabled for this theme. Click <a href="<?php echo get_bloginfo('url')."/wp-admin/admin.php?page=option_tree#option_seo_settings"; ?>">here</a> to go to the SEO section for more info...

<?php endif; ?>

</div>

<?php if (of_get_option('seo') == "yes") : ?>

<div class="blueprint_setting_sep"></div>

<div class="blueprint_setting_section">

<div class="title">Page/Post Title</div>

<input type="text" class="input" name="blueprint_seo_title" value="<?php echo get_post_meta($_GET['post'], 'blueprint_seo_title', 10); ?>" />

<div class="desc">This will appear at the top of the browser. If you leave this blank the default WordPress title will be used for this page.</div>

</div>

<div class="blueprint_setting_sep"></div>

<div class="blueprint_setting_section">

<div class="title">Page/Post Meta Keywords</div>

<input type="text" class="input" name="blueprint_seo_keywords" value="<?php echo get_post_meta($_GET['post'], 'blueprint_seo_keywords', 11); ?>" />

<div class="desc">Type the keywords you want for this page/post.</div>

</div>

<div class="blueprint_setting_sep"></div>

<div class="blueprint_setting_section">

<div class="title">Page/Post Meta Description</div>

<input type="text" class="input" name="blueprint_seo_description" value="<?php echo get_post_meta($_GET['post'], 'blueprint_seo_description', 12); ?>" />

<div class="desc">Type the description you want for this page/post.</div>

</div>

<?php endif; ?>

</div>

<?php

}

function blueprint_save_seo_settings ($post_id) {


  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
    return $post_id;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
      return $post_id;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
      return $post_id;
  } 
    
  update_post_meta($post_id, "blueprint_seo_title", $_POST['blueprint_seo_title']);
  update_post_meta($post_id, "blueprint_seo_keywords", $_POST['blueprint_seo_keywords']);
  update_post_meta($post_id, "blueprint_seo_description", $_POST['blueprint_seo_description']);
  
}

#####################################################
##### SEO MAIN FUNCTIONS
#####################################################

function blueprint_seo () {

	global $post;

	$blueprint_seo_keywords = get_post_meta($post->ID, "blueprint_seo_keywords", 11);
	$blueprint_seo_description = get_post_meta($post->ID, "blueprint_seo_description", 12);
	
	if (of_get_option('seo') == "yes") {
	
	if ($blueprint_seo_keywords != "") echo '<meta name="keywords" content="'.$blueprint_seo_keywords.'" />';
	if ($blueprint_seo_description != "") echo '<meta name="description" content="'.$blueprint_seo_description.'" />';
	
	}

}

function blueprint_seo_title () {

	global $post;
		
	if (is_home() || is_front_page()) {
	
		if (of_get_option('seo') == "yes") {
		
			if (get_post_meta($post->ID, "blueprint_seo_title", 10) == "") { 
			
				bloginfo("name"); if (!is_home() || !is_front_page()) wp_title("-");
			
			} else {
			
				echo get_post_meta($post->ID, "blueprint_seo_title", 10);
			
			}		
		
		} else {
		
			bloginfo("name"); if (!is_home() || !is_front_page()) wp_title("-");			
		
		}
		
	} else {

		if (of_get_option('seo') == "yes") {
		
			if (get_post_meta($post->ID, "blueprint_seo_title", 10) == "") { 
			
				bloginfo("name"); if (!is_home() || !is_front_page()) wp_title("-");
			
			} else {
			
				echo get_post_meta($post->ID, "blueprint_seo_title", 10);
			
			}		
		
		} else {
		
			bloginfo("name"); if (!is_home() || !is_front_page()) wp_title("-");			
		
		}
	
	}

}

?>