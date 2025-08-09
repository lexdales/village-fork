<?php

$fw_sidebars_array = array (

	array ("name" => __("Default Sidebar","village")),

);

/*

We register our sidebars within the init hook

*/

add_action("init", "fw_register_sidebars");

function fw_register_sidebars ()
{

	global $fw_sidebars_array;

	// Load predefined sidebars
	if (is_array($fw_sidebars_array)) 
	{
	
		foreach ($fw_sidebars_array as $sidebar)
		{
			
			if ( !function_exists('register_sidebar') || !register_sidebar($sidebar) ) : endif;
		
		}
	
	}
	
	// Load custom sidebars
	$theme_sidebars = get_option(THEME_SN . "_theme_sidebars");

	if (is_array($theme_sidebars)) 
	{
	
		foreach ($theme_sidebars as $sidebar) 
		{
		
			if ( !function_exists('register_sidebar') || !register_sidebar($sidebar) ) : endif;
			
		}
	
	}

}

/*

We create a function to return all the sidebars.

*/

function fw_get_sidebars ()
{
	
	$sidebars = get_option(THEME_SN . "_theme_sidebars");
	
	$sidebar_array = array();
	
	array_push($sidebar_array, array("id" => "Default Sidebar", "name" => "Default"));
	
	if (is_array($sidebars))
	{
	
		foreach ($sidebars as $sidebar)
		{
		
			$sidebar_array[] = array (
			
				"id" => $sidebar["name"],
				"name" => $sidebar["name"]				
			
			);
		
		}
	
		return $sidebar_array;
	
	} else {
	
		return $sidebar_array;
	
	}
	
}

/*

We create our function to display sidebars

*/

function fw_sidebar ($post_id)
{

	global $post;
	
	if (is_page() || is_single())
	{
			
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(get_post_meta($post_id, "blueprint_sidebar", 12222)) ) : endif;	
	
	} else {
	
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Default Sidebar") ) : endif;			
	
	}
	
}

/*

We add unlimited sidebars functionality to our framework

*/

add_action("admin_menu", "fw_add_sidebar_theme_page");

/*

We add the css styles & jscripts to the sidebar panel

*/

if ($pagenow == "themes.php") 
{

	wp_enqueue_style("sidebar_page_styles", get_template_directory_uri() . "/admin/css/admin-style.css");
	
	wp_enqueue_script("jquery-ui-sortable");
	
}


/*

Add Ajax WordPress hook to save sidebar data

*/

if (is_admin()) 
{

	add_action("wp_ajax_save_theme_sidebars", "fw_save_theme_sidebars");
	add_action("wp_ajax_no_priv_save_theme_sidebars", "fw_save_theme_sidebars");

}

/*

Add Ajax WordPress function to save sidebar data

*/

function fw_save_theme_sidebars ()
{

	// Collect data from ajax
	$sidebars_data = $_POST["data"];
	
	// Build an array from that data
	$sidebars_data = explode("_:|:|:_", $sidebars_data);
	
	// New array
	$new_sidebars_array = array();
	
	// If one or more sidebars build new array
	if (is_array($sidebars_data) && $sidebars_data[0] != "")
	{
	
		foreach ($sidebars_data as $sidebar)
		{
		
			$new_sidebars_array[] = array ("name" => $sidebar);
		
		}
		
		// save sidebars array to the database
		update_option(THEME_SN . "_theme_sidebars", $new_sidebars_array);
		
	} else {
	
		// save sidebars array to the database
		update_option(THEME_SN . "_theme_sidebars", "");		
	
	}
		
	die();

}

/*

We add the sidebar page to the theme

*/

function fw_add_sidebar_theme_page () 
{

	add_theme_page('Sidebars', 'Sidebars', 'manage_options', 'theme_sidebars.php', 'fw_sidebar_theme_page');
	
}

/*

We add the output for our sidebar page to the theme

*/

function fw_sidebar_theme_page ()
{

$theme_sidebars = get_option(THEME_SN . "_theme_sidebars");

?>

<div class="wrap">
<?php screen_icon( 'themes' ); ?>
<h2 class="nav-tab-wrapper" style="padding-bottom: 10px;">
Sidebars
</h2>

<div class="metabox-holder">

<div id="sidebar_alert_processing" style="display: none;">Processing...</div>

<div id="sidebar_alert_success" style="display: none;">Sidebars have been saved successfully!</div>

<div id="optionsframework" class="postbox">
<form action="themes.php?page=theme_sidebars.php" method="post">


<div style="padding: 15px;">

	<div id="sidebar_upload_form">
	
		<div id="sidebar_upload_button">
		
			<a href="#" class="button">Add Sidebar</a>
		
		</div>
	
		<div id="sidebar_upload_input">
		
			<input type="text" id="sidebar_upload_input_field" />
		
		</div>
		
		<br class="clear" />
	
	</div>
	
	<div id="sidebar_matrix">
	
		<?php if (is_array($theme_sidebars)) : foreach ($theme_sidebars as $sidebar) : ?>
	
		<div class="sidebar">
		
			<a href="#" class="sidebar_remove">Remove Sidebar</a>
		
			<p><?php echo $sidebar['name']; ?></p>
			
			<br class="clear" />
		
		</div>
		
		<?php endforeach; endif; ?>
	
	</div>

</div>

<div id="optionsframework-submit" style="text-align: center;">
<input type="submit" class="button-primary submit_sidebar_data" name="update" value="<?php esc_attr_e( 'Save Sidebars' ); ?>" style="float: none; padding: 6px 8px;" />
<div class="clear"></div>
</div>
</form>
</div> <!-- / #container -->
</div>
</div> <!-- / .wrap -->

<script type="text/javascript">

jQuery(function () 
{

	var ajax_processing = false;
	
	jQuery("#sidebar_matrix").sortable();
	
	if (jQuery("#sidebar_matrix .sidebar").size() == 0)
	{
	
		jQuery("#sidebar_matrix").text("No sidebars created");
	
	}

	jQuery(".submit_sidebar_data").click(function () {

		jQuery("#sidebar_alert_processing").fadeIn();
			
		if (ajax_processing == false) 
		{
		
			ajax_processing = true;
		
			jQuery(".options_saving").fadeIn(400);
			jQuery(".submit_options").fadeTo(400, 0.3);
			
			function newValues() 
			{
			
				var serializedValues = "";
				
				jQuery("#sidebar_matrix .sidebar").each(function (i) {
					
					var total_sidebars = jQuery("#sidebar_matrix .sidebar").size();
					
					serializedValues += jQuery(this).find("p").text();					

					if ((i + 1) != total_sidebars) serializedValues += "_:|:|:_";
										
				});
								
				return serializedValues;
			
			}
			
			var serializedReturn = newValues();
					
			var ajax_url = '<?php echo admin_url("admin-ajax.php"); ?>';
		
			var data = {
				action: 'save_theme_sidebars',
				data: serializedReturn
			};
									
			jQuery.post(ajax_url, data, function(response) 
			{
								
				jQuery("#sidebar_alert_success").fadeIn().delay(3000).fadeOut(400, function () {
					ajax_processing = false;					
				});

				jQuery("#sidebar_alert_processing").fadeOut(0);
				
			});
		
		}
	    		
		return false;
	
	});
	
	jQuery("#sidebar_matrix .sidebar a.sidebar_remove").click(function () 
	{
	
		jQuery(this).parent().slideUp(400, function () 
		{
		
			jQuery(this).remove();
			
			if (jQuery("#sidebar_matrix .sidebar").size() == 0)
			{
			
				jQuery("#sidebar_matrix").text("No sidebars created");
			
			}
		
		});
		
		return false;
	
	});
	
	jQuery("#sidebar_upload_button a").click(function () 
	{
	
		if (jQuery("#sidebar_upload_input_field").val() == "") return false;
	
		if (jQuery("#sidebar_matrix .sidebar").size() == 0) jQuery("#sidebar_matrix").html("");

		var sidebar_clone = jQuery('<div class="sidebar"><a href="#" class="sidebar_remove">Remove Sidebar</a><p>' + jQuery("#sidebar_upload_input_field").val() + '</p><br class="clear" /></div>');
		
		sidebar_clone = sidebar_clone.clone();
		
		jQuery("#sidebar_matrix").append(sidebar_clone);
		
		jQuery(".submit_sidebar_data").click(function () {

			jQuery("#sidebar_alert_processing").fadeIn();
	
			if (ajax_processing == false) 
			{
			
				ajax_processing = true;
			
				jQuery(".options_saving").fadeIn(400);
				jQuery(".submit_options").fadeTo(400, 0.3);
				
				function newValues() 
				{
				
					var serializedValues = "";
					
					jQuery("#sidebar_matrix .sidebar").each(function (i) {
						
						var total_sidebars = jQuery("#sidebar_matrix .sidebar").size();
						
						if (i == total_sidebars - 1) serializedValues += "_:|:|:_";
	
						serializedValues += jQuery(this).find("p").text();					
	
					});
									
					return serializedValues;
				
				}
				
				var serializedReturn = newValues();
						
				var ajax_url = '<?php echo admin_url("admin-ajax.php"); ?>';
			
				var data = {
					action: 'save_theme_sidebars',
					data: serializedReturn
				};
										
				jQuery.post(ajax_url, data, function(response) 
				{
										
					jQuery("#sidebar_alert_success").fadeIn().delay(3000).fadeOut(400, function () {
						ajax_processing = false;					
					});
	
					jQuery("#sidebar_alert_processing").fadeOut(0);
				
				});
			
			}
			
			return false;
		    				
		});
		
		jQuery(sidebar_clone).find("a.sidebar_remove").click(function () 
		{
		
			jQuery(this).parent().slideUp(400, function () 
			{
			
				jQuery(this).remove();
				
				if (jQuery("#sidebar_matrix .sidebar").size() == 0)
				{
				
					jQuery("#sidebar_matrix").text("No sidebars created");
				
				}
			
			});
			
			return false;
		
		});
		
		jQuery("#sidebar_upload_input_field").val("");
		
		return false;
					
	});

});

</script>

<?php
}

#####################################################
##### BLUEPRINT - DISPLAY SIDEBAR PICKER 
#####################################################

add_action('save_post', 'blueprint_save_sidebars_settings');
add_action('add_meta_boxes', 'blueprint_add_sidebars_box');

function blueprint_add_sidebars_box () {

add_meta_box('blueprint_sidebars_settings', "Village Sidebar Settings", 'blueprint_init_sidebar_settings_box', 'page', 'normal', 'high');
add_meta_box('blueprint_sidebars_settings', "Village Sidebar Settings", 'blueprint_init_sidebar_settings_box', 'post', 'normal', 'high');
add_meta_box('blueprint_sidebars_settings', "Village Sidebar Settings", 'blueprint_init_sidebar_settings_box', 'wpsc-product', 'normal', 'high');

}

function blueprint_init_sidebar_settings_box () {

?>

<div style="padding: 5px 4px 0px 3px;">

<div class="blueprint_setting_section">

<div class="title">Choose a sidebar</div>

<select name="blueprint_sidebar" style="width: 99%"> 
 <option value="Default Sidebar">Default Sidebar</option> 
 <?php 
  $sidebars = get_option(THEME_SN . "_theme_sidebars");
  foreach ($sidebars as $sidebar) {
	if ($sidebar != "") echo '<option value="' . $sidebar["name"] . '"';
	if ($sidebar["name"] == get_post_meta($_GET['post'], 'blueprint_sidebar', 12222)) echo "selected";
	echo '>' . $sidebar["name"] . '</option>';
  }
 ?>
</select>

<div class="desc">Choose the widget area that will appear on the right sidebar.</div>

</div>

</div>

<?php

}

function blueprint_save_sidebars_settings ($post_id) {

  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
    return $post_id;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
      return $post_id;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
      return $post_id;
  } 
      
  update_post_meta($post_id, "blueprint_sidebar", $_POST['blueprint_sidebar']);  
  
}

?>