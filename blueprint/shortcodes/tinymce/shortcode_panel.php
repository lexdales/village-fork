<?php

/*

First we load in WordPress

*/

$wp_include = "../wp-load.php";
$i = 0;

while (!file_exists($wp_include) && $i++ < 20) 
{

	$wp_include = "../$wp_include";

}

require $wp_include;

/*

Then we check permissions

*/

if (!current_user_can('edit_pages') && !current_user_can('edit_posts')) wp_die(__("You are not allowed to be here"));

global $wpdb;

?>

<!DOCTYPE HTML>

<html>
	
	<!-- START head -->
	<head>
	
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		
		<title></title>
		
		<link href='http://fonts.googleapis.com/css?family=Merriweather:400,900' rel='stylesheet' type='text/css'>
		
		<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl'); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
		<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl'); ?>/wp-includes/js/tinymce/utils/mctabs.js"></script>
		<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl'); ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
		
		<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/blueprint/shortcodes/tinymce/styles.css" />
		
		<?php /*load jQuery*/ wp_enqueue_script("jquery"); wp_head(); ?>
		
		<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/blueprint/shortcodes/tinymce/scm.js"></script>
	
	</head>
	<!-- END head -->
	
	<!-- START body -->
	<body>
	
		<h3>Select a shortcode from the dropdown box...</h3>
		
		<!-- START select -->
		<select name="shortcode_dropdown">
		
		<?php global $fw_shortcodes; foreach ($fw_shortcodes as $fw_shortcode) : ?>
		
		<option <?php if (is_array($fw_shortcode['attributes'])) : ?> data-div="sc_<?php echo $fw_shortcode['id']; ?>" <?php else: ?> data-div="none"<?php endif; ?> data-custom="<?php if ($fw_shortcode["custom_output"] != null) : echo $fw_shortcode["custom_output"]; else: echo "false"; endif; ?>" data-content="<?php if ($fw_shortcode["content_required"] == true) : echo "true"; else: echo "false"; endif; ?>" value="<?php echo $fw_shortcode['id']; ?>"><?php echo $fw_shortcode['name']; ?></option>
		
		<?php endforeach; ?>
		
		</select>
		<!-- END select -->

		<!-- START #shortcode_atts_panels -->		
		<div id="shortcode_atts_panels">
		
			<?php foreach ($fw_shortcodes as $fw_shortcode) : if (is_array($fw_shortcode['attributes'])) : ?>
			
			<!-- START .shortcode_atts_panel -->
			<div class="shortcode_atts_panel" id="sc_<?php echo $fw_shortcode['id']; ?>" style="display: none;">
			
				<?php foreach ($fw_shortcode['attributes'] as $attribute) : ?>

				<!-- START .shortcode_att -->				
				<div class="shortcode_att">
		
					<h4 class="shortcode_att_title"><?php echo $attribute['name']; ?></h4>
					
					<input type="text" id="sc_att_<?php echo $attribute['id']; ?>" class="shortcode_att_input" value="" />
					
					<div class="shortcode_att_desc"><?php echo $attribute['desc']; ?></div>
		
				</div>
				<!-- END .shortcode_att -->
				
				<?php endforeach; ?>
			
			</div>
			<!-- END .shortcode_atts_panel -->
			
			<?php endif; endforeach; ?>
		
		</div>
		<!-- END #shortcode_atts_panels -->		
		
		<a id="submit" href="#">Generate</a>
	
	</body>
	<!-- END head -->

</html>