<?php

##################################################
#### VILLAGE
##################################################

$skin = "";

if (isset($_GET['skin'])) {
$skin = $_GET['skin'];
}

?>

<!DOCTYPE HTML>

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="imagetoolbar" content="no" />

<?php 

##################################################
#### INCLUDE SEO
##################################################

blueprint_seo(); 

##################################################
#### INCLUDE WP HEAD
##################################################

wp_enqueue_style('wallcss', BP . '/wall/source/style/wall/style.css');
wp_enqueue_style("stylesheet", BP . "/style.css");
if (of_get_option('setting_skin') == "dark_noise" || $skin == "dark_noise") :
wp_enqueue_style("skins-darknoise", BP . "/skins/dark_noise.css");
endif; 
if (of_get_option('setting_skin') == "stone" || $skin == "stone") :
wp_enqueue_style("skins-darknoise", BP . "/skins/stone.css");
endif;
if (of_get_option('setting_skin') == "dark_crosshair" || $skin == "dark_crosshair") :
wp_enqueue_style("skins-darkcrosshair", BP . "/skins/dark_crosshair.css");
endif;
if (of_get_option('setting_skin') == "light_fabric" || $skin == "light_fabric") :
wp_enqueue_style("skins-darkcrosshair", BP . "/skins/light_fabric.css");
endif;
wp_enqueue_style("prettyPhoto-styles", BP . "/wall/source/style/prettyPhoto.css");
wp_enqueue_style("fancybox-styles", BP . "/fancybox/jquery.fancybox-1.3.4.css");
wp_enqueue_style("colorbox-styles", BP . "/colorbox/colorbox.css");
if (is_page_template('slideshow_no_cropping.php')) : 
wp_enqueue_style("supersized-styles", BP . "/css/supersized.css");
wp_enqueue_style("supersized-styles", BP . "/supersized/supersized.shutter.css");
endif;

wp_enqueue_script("jquery");
wp_enqueue_script( 'comment-reply' );
wp_enqueue_script('village-swfobject', BP . '/jscript/swfobject.js');
wp_enqueue_script('walljs', BP . '/wall/source/js/wall.dev.js');
wp_enqueue_script('flowplayer', BP . '/jscript/flowplayer-3.2.6.min.js');
wp_enqueue_script('prettyPhoto', BP . '/wall/source/js/jquery.prettyPhoto.js');
wp_enqueue_script('slideshow-core', BP . '/jscript/jquery.effects.core.min.js');
wp_enqueue_script('slideshow-slide', BP . '/jscript/jquery.effects.slide.min.js');
wp_enqueue_script('slideshow-blind', BP . '/jscript/jquery.effects.blind.min.js');
wp_enqueue_script('slideshow-superbgimage', BP . '/jscript/jquery.superbgimage.js');
wp_enqueue_script('jquery-easing', BP . '/jscript/jquery.easing.1.3.js');
wp_enqueue_script('mousewheel-fancybox', BP . '/fancybox/jquery.mousewheel-3.0.4.pack.js');
wp_enqueue_script('fancybox', BP . '/fancybox/jquery.fancybox-1.3.4.pack.js');
wp_enqueue_script('colorbox-core', BP . '/jscript/jquery.colorbox-min.js');
wp_enqueue_script('galleria', BP . '/galleria/galleria-1.2.5.min.js');
wp_enqueue_script('masonry', BP . '/jscript/jquery.masonry.min.js');
if (is_page_template('slideshow_no_cropping.php')) : 
wp_enqueue_script('supersized-js', BP . '/jscript/supersized.3.2.4.min.js');
wp_enqueue_script('supersized-shutter', BP . '/supersized/supersized.shutter.min.js');
endif; 
wp_enqueue_script('jquery-custom', BP . '/jscript/jquery.custom.js');

?>

<title><?php blueprint_seo_title(); ?></title>

<link rel="shortcut icon" href="<?php echo of_get_option("favicon") ?>">

<!-- css imports -->

<link href="http://fonts.googleapis.com/css?family=<?php echo of_get_option("menu_font") ?>|<?php echo of_get_option("submenu_font")?>|<?php echo of_get_option("body_font") ?>|<?php echo of_get_option("heading_font") ?>" rel="stylesheet" type="text/css" >

<!-- javascript imports -->

<script type="text/javascript"> 

var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>/wp-admin/admin-ajax.php";
var cf_name = "<?php _e("Your Name","village") ?>";
var cf_email = "<?php _e("Your Email","village") ?>";
var cf_phone = "<?php _e("Your Phone","village") ?>";
var cf_website = "<?php _e("Your Message","village") ?>";

function getInternetExplorerVersion()
{
  var rv = -1; // Return value assumes failure.
  if (navigator.appName == 'Microsoft Internet Explorer')
  {
    var ua = navigator.userAgent;
    var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
    if (re.exec(ua) != null)
      rv = parseFloat( RegExp.$1 );
  }
  return rv;
}
function checkVersion()
{
  var msg = "You're not using Internet Explorer.";
  var ver = getInternetExplorerVersion();

  if ( ver > -1 )
  {
    if ( ver <= 8.0 ) return true;
  }
  
  return false;
  
}

</script>

<?php 

wp_head();

?>

<style type="text/css">

h1,h2,h3,h4,h5,h6 {
	font-family: "<?php echo str_replace("+", " ",of_get_option("heading_font")); ?>";
}

#menu ul li a {
	font-family: "<?php echo str_replace("+", " ",of_get_option("menu_font")); ?>";	
}
#menu ul li ul li a, #menu ul li ul li ul li a {
	font-family: "<?php echo str_replace("+", " ",of_get_option("submenu_font")); ?>";	
}

body, #content_wrap, #search input[type=text], #cart_n_stuff {
	font-family: "<?php echo str_replace("+", " ",of_get_option("body_font")); ?>";	
}

</style>

<!--[if IE]>
        <link rel="stylesheet" type="text/css" href="<?php echo BP; ?>/ie.css" />
<![endif]-->

<!--[if lt IE 9]>
        <link rel="stylesheet" type="text/css" href="<?php echo BP; ?>/ie8.css" />
<![endif]-->

<?php if (of_get_option('setting_skin') == "stone" || $skin == "stone") : ?>
<!--[if lt IE 9]>
        <link rel="stylesheet" type="text/css" href="<?php echo BP; ?>/skins/stone_ie.css" />
<![endif]-->
<?php endif; ?>
<?php if (of_get_option('setting_skin') == "dark_crosshair" || $skin == "dark_crosshair") : ?>
<!--[if lt IE 9]>
        <link rel="stylesheet" type="text/css" href="<?php echo BP; ?>/skins/dark_crosshair_ie.css" />
<![endif]-->
<?php endif; ?>
<?php if (of_get_option('setting_skin') == "light_fabric" || $skin == "light_fabric") : ?>
<!--[if lt IE 9]>
        <link rel="stylesheet" type="text/css" href="<?php echo BP; ?>/skins/light_fabric_ie.css" />
<![endif]-->
<?php endif; ?>

<?php if(!is_page_template('wall.php') || !is_page_template('wall_menu.php')) : ?>

<script type="text/javascript">

jQuery(function() {

	// Options for SuperBGImage
	jQuery.fn.superbgimage.options = {
	id: 'superbgimage', // id for the containter
	z_index: 0, // z-index for the container
	inlineMode: 0, // 0-resize to browser size, 1-do not resize to browser-size
	showimage: 1, // number of first image to display
	vertical_center: 1, // 0-align top, 1-center vertical
	transition: 1, // 0-none, 1-fade, 2-slide down, 3-slide left, 4-slide top, 5-slide right, 6-blind horizontal, 7-blind vertical, 90-slide right/left, 91-slide top/down
	transitionout: 1, // 0-no transition for previous image, 1-transition for previous image
	randomtransition: 0, // 0-none, 1-use random transition (0-7)
	showtitle: 0, // 0-none, 1-show title
	slideshow: ((jQuery("#thumbs a, #thumbs_hide a, #floating_slideshow_nav a").size() > 1) ? 1 : 0), // 0-none, 1-autostart slideshow
	slide_interval: 4000, // interval for the slideshow
	randomimage: 0, // 0-none, 1-random image
	speed: 'slow', // animation speed
	preload: 1, // 0-none, 1-preload images
	onShow: null, // function-callback show image
	onClick: null, // function-callback click image
	onHide: null, // function-callback hide image
	onMouseenter: null, // function-callback mouseenter
	onMouseleave: null, // function-callback mouseleave
	onMousemove: null // function-callback mousemove	
	};

	// initialize SuperBGImage
	
	<?php if (is_page_template('slideshow.php') || is_page_template('slideshow_floating.php') || is_page_template('slideshow_portrait.php') || is_page_template('slideshow_no_thumbs.php') || is_page_template('slideshow_floating_portrait.php')) : ?>
	
	jQuery('#thumb_mousemove, #thumb_vert_mousemove, #thumbs_hidden').superbgimage();
	
	<?php else: ?>
	
	jQuery('#thumbs_hide').superbgimage();	
	
	<?php endif; ?>

});

</script>

<?php endif; ?>

<?php if (of_get_option("right_click_protection") == "yes") : ?>

<script type="text/javascript">

var message="<?php _e("Right Click Is Disabled","village") ?>";

///////////////////////////////////
function clickIE4(){
if (event.button==2){
alert(message);
return false;
}
}

function clickNS4(e){
if (document.layers||document.getElementById&&!document.all){
if (e.which==2||e.which==3){
alert(message);
return false;
}
}
}

if (document.layers){
document.captureEvents(Event.MOUSEDOWN);
document.onmousedown=clickNS4;
}
else if (document.all&&!document.getElementById){
document.onmousedown=clickIE4;
}

document.oncontextmenu=new Function("alert(message);return false");

</script>

<?php endif ?>

</head>

<body>

<!-- START #header -->

<div id="header">

	<!-- START #logo -->

	<div id="logo">
	
		<a href="<?php bloginfo('url'); ?>"><img src="<?php echo of_get_option('logo') ?>" alt="" /></a>
			
	</div>

	<!-- END #logo -->
	
	<!-- START #menu -->
	
	<div id="menu">
	
	<?php wp_nav_menu(array('theme_location' => 'primary')); ?>
	
	</div>
	
	<!-- END #menu -->
	
	<!-- START #cart_n_stuff -->
	
	<div id="cart_n_stuff">
		
		<div id="search">
		
			<form method="get" action="<?php bloginfo('siteurl'); ?>">
			
				<input type="submit" value="" />
				<input type="text" name="s" value="<?php _e("Search…","village") ?>" class="search_input" onfocus="if (this.value == '<?php _e("Search...","village") ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e("Search...","village") ?>'}" /> 				
				
			
			</form>
		
		</div>	
	
		<?php 
					
		##################################################
		#### SOCIAL NETWORK ICON CONFIG
		##################################################
		
		$icon_link_new_window = of_get_option("icons_new_browser");
		
		($icon_link_new_window == "yes") ? $icon_link_new_window = "_blank" : $icon_link_new_window = "_self";
		
		?>
				
		<div id="social_icons">
	
			<ul>
			
				<?php  
				
				$social_icon_status_array = of_get_option("social_icons");
				$social_icons_array = array("facebook" => "Facebook", "twitter" => "Twitter", "flickr" => "Flickr", "behance" => "Behance", "email" => "Email", "youtube" => "Youtube", "vimeo" => "Vimeo", "addthis" => "Add This", "aim" => "Aim", "apple" => "Apple", "blogger" => "Blogger", "deviantart" => "Deviantart", "dribbble" => "Dribbble", "myspace" => "Myspace", "qik" => "Qik", "yahoo" => "Yahoo", "linkedin" => "LinkedIn", "skype" => "Skype");				
								
				foreach ($social_icons_array as $social_icon)
				{
				
					if ($social_icon_status_array[str_replace(" ","",strtolower($social_icon))] == 1) echo '<li><a href="' . of_get_option(str_replace(" ","",strtolower($social_icon))."_url") . '" target="' . $icon_link_new_window . '"><img src="' . BP . '/images/social_icons/' . str_replace(" ","",strtolower($social_icon)) . '_32.png" alt=""></a></li>';
				
				}
				
				?>
	
			</ul>
				
		<div class="clear"></div>
		
		</div>	
			
	<span style="margin-top: 5px; display: block;"><?php echo of_get_option("credits") ?></span>
	
	</div>

	<!-- END #cart_n_stuff -->
	
</div>

<!-- END #header -->

<?php if (!is_page_template('slideshow.php') && !is_page_template('slideshow_no_thumbs.php') && !is_page_template('slideshow_portrait.php')) : ?>

<div id="show_hide"><img src="<?php echo BP; ?>/images/toggle.png" alt="" /></div>

<?php endif; ?>
