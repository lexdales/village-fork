<?php 

add_action("admin_head", "blueprint_load_assets");

function blueprint_load_assets () {

?>

<link  href="http://fonts.googleapis.com/css?family=Cantarell:regular,italic,bold,bolditalic" rel="stylesheet" type="text/css" >
<link  href="http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold" rel="stylesheet" type="text/css" >

<style>

.blueprint_setting_section {

padding: 10px;
background: #f9f9f9;
border: 1px solid #f1f1f1;
border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
margin-bottom: 9px;

}

.blueprint_setting_section .title {

font-family: 'Helvetica Neue', Arial, serif;
font-weight: bold;
font-size: 12px;
margin-top: 7px;
margin-bottom: 7px;
color: #444;

}

.blueprint_setting_section .input {

width: 500px;
margin-top: 7px;
margin-bottom: 7px;
font-family: 'Droid Sans', serif;
color: #555;
font-size: 11px;
margin-left: 0px;

}

.blueprint_setting_section .input_side {

width: 100%;
margin-top: 7px;
margin-bottom: 7px;
font-family: 'Droid Sans', serif;
color: #555;
font-size: 11px;
margin-left: 0px;

}

.blueprint_setting_section .desc {

font-style: italic;
font-size: 11px;
font-family: 'Droid Sans', serif;
color: #666;
background: url(<?php bloginfo("template_url"); ?>/blueprint/images/question-white.png) no-repeat 0px 6px;
padding: 10px;
padding-left: 20px;

}

.blueprint_setting_section select {

margin-top: 7px;
margin-bottom: 7px;
width: 500px;
background-color: #fff; 
background-image: none;
border: 1px solid #ccc;

}

#blueprint_page_slider_settings h4 {
  font-family: 'Droid Sans', serif;
  font-size: 14px;
  font-style: normal;
  font-weight: 700;
  text-shadow: none;
  text-decoration: none;
  text-transform: none;
  letter-spacing: 0em;
  word-spacing: 0em;
  line-height: 1.2;
  margin: 0px;
  margin-top: 20px;
  margin-bottom: 10px;
}

.blueprint_setting_sep {

height: 1px;
border-bottom: 1px dashed #ddd;
margin-bottom: 9px;
margin-top: 5px;

}

.blueprint_help_setting {

padding: 10px;
background: #f7fbff;
border: 1px solid #d4d7da;
border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
margin-bottom: 9px;
background: url(<?php bloginfo("template_url"); ?>/blueprint/images/lifebuoy.png) no-repeat 9px 8px;
padding-left: 40px;
padding-top: 12px;
font-family: 'Droid Sans', serif;
font-size: 9px;
text-transform: uppercase;
letter-spacing: 0.121em;

}

/*
COLORPICKER
*/

.colorpicker {
	width: 356px;
	height: 176px;
	overflow: hidden;
	position: absolute;
	background: url(<?php bloginfo("template_url"); ?>/blueprint/images/colorpicker/colorpicker_background.png);
	font-family: Arial, Helvetica, sans-serif;
	display: none;
}
.colorpicker_color {
	width: 150px;
	height: 150px;
	left: 14px;
	top: 13px;
	position: absolute;
	background: #f00;
	overflow: hidden;
	cursor: crosshair;
}
.colorpicker_color div {
	position: absolute;
	top: 0;
	left: 0;
	width: 150px;
	height: 150px;
	background: url(<?php bloginfo("template_url"); ?>/blueprint/images/colorpicker/colorpicker_overlay.png);
}
.colorpicker_color div div {
	position: absolute;
	top: 0;
	left: 0;
	width: 11px;
	height: 11px;
	overflow: hidden;
	background: url(<?php bloginfo("template_url"); ?>/blueprint/images/colorpicker/colorpicker_select.gif);
	margin: -5px 0 0 -5px;
}
.colorpicker_hue {
	position: absolute;
	top: 13px;
	left: 171px;
	width: 35px;
	height: 150px;
	cursor: n-resize;
}
.colorpicker_hue div {
	position: absolute;
	width: 35px;
	height: 9px;
	overflow: hidden;
	background: url(<?php bloginfo("template_url"); ?>/blueprint/images/colorpicker/colorpicker_indic.gif) left top;
	margin: -4px 0 0 0;
	left: 0px;
}
.colorpicker_new_color {
	position: absolute;
	width: 60px;
	height: 30px;
	left: 213px;
	top: 13px;
	background: #f00;
}
.colorpicker_current_color {
	position: absolute;
	width: 60px;
	height: 30px;
	left: 283px;
	top: 13px;
	background: #f00;
}
.colorpicker input {
	background-color: transparent;
	border: 1px solid transparent;
	position: absolute;
	font-size: 10px;
	font-family: Arial, Helvetica, sans-serif;
	color: #898989;
	top: 4px;
	right: 11px;
	text-align: right;
	margin: 0;
	padding: 0;
	height: 11px;
}
.colorpicker_hex {
	position: absolute;
	width: 72px;
	height: 22px;
	background: url(<?php bloginfo("template_url"); ?>/blueprint/images/colorpicker/colorpicker_hex.png) top;
	left: 212px;
	top: 142px;
}
.colorpicker_hex input {
	right: 6px;
}
.colorpicker_field {
	height: 22px;
	width: 62px;
	background-position: top;
	position: absolute;
}
.colorpicker_field span {
	position: absolute;
	width: 12px;
	height: 22px;
	overflow: hidden;
	top: 0;
	right: 0;
	cursor: n-resize;
}
.colorpicker_rgb_r {
	background-image: url(<?php bloginfo("template_url"); ?>/blueprint/images/colorpicker/colorpicker_rgb_r.png);
	top: 52px;
	left: 212px;
}
.colorpicker_rgb_g {
	background-image: url(<?php bloginfo("template_url"); ?>/blueprint/images/colorpicker/colorpicker_rgb_g.png);
	top: 82px;
	left: 212px;
}
.colorpicker_rgb_b {
	background-image: url(<?php bloginfo("template_url"); ?>/blueprint/images/colorpicker/colorpicker_rgb_b.png);
	top: 112px;
	left: 212px;
}
.colorpicker_hsb_h {
	background-image: url(<?php bloginfo("template_url"); ?>/blueprint/images/colorpicker/colorpicker_hsb_h.png);
	top: 52px;
	left: 282px;
}
.colorpicker_hsb_s {
	background-image: url(<?php bloginfo("template_url"); ?>/blueprint/images/colorpicker/colorpicker_hsb_s.png);
	top: 82px;
	left: 282px;
}
.colorpicker_hsb_b {
	background-image: url(<?php bloginfo("template_url"); ?>/blueprint/images/colorpicker/colorpicker_hsb_b.png);
	top: 112px;
	left: 282px;
}
.colorpicker_submit {
	position: absolute;
	width: 22px;
	height: 22px;
	background: url(<?php bloginfo("template_url"); ?>/blueprint/images/colorpicker/colorpicker_submit.png) top;
	left: 322px;
	top: 142px;
	overflow: hidden;
}
.colorpicker_focus {
	background-position: center;
}
.colorpicker_hex.colorpicker_focus {
	background-position: bottom;
}
.colorpicker_submit.colorpicker_focus {
	background-position: bottom;
}
.colorpicker_slider {
	background-position: bottom;
}

.bp_icons ul li.icon_remove a {

background: url(<?php bloginfo('template_url') ?>/p_framework/p_blueprint/close_16.png);
display: inline-block;
width: 16px;
height: 16px;

}

.bp_icons ul li.icon_edit a {

background: url(<?php bloginfo('template_url') ?>/p_framework/p_blueprint/tools_16.png);
display: inline-block;
width: 16px;
height: 16px;

}

.p_image_controls ul li.icon_remove a {

background: url(<?php bloginfo('template_url') ?>/blueprint/images/close_16.png);
display: inline-block;
width: 16px;
height: 16px;

}

.p_image_controls ul li.icon_edit a {

background: url(<?php bloginfo('template_url') ?>/blueprint/images/tools_16.png);
display: inline-block;
width: 16px;
height: 16px;

}

</style>

<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/blueprint/jscript/colorpicker.js"></script>

<script type="text/javascript">

jQuery(document).ready(function($) {  
  $('#p_slider_item_audio_bg_color').ColorPicker({
    onSubmit: function(hsb, hex, rgb) {
    	$('#p_slider_item_audio_bg_color').val('#'+hex);
    },
    onBeforeShow: function () {
    	$(this).ColorPickerSetColor(this.value);
    	return false;
    },
    onChange: function (hsb, hex, rgb) {
    	$('#p_slider_item_audio_bg_color').val('#'+hex);
    }
  })	
  .bind('keyup', function(){
    $(this).ColorPickerSetColor(this.value);
  });

  $('#p_slider_item_audio_spectrum_color').ColorPicker({
    onSubmit: function(hsb, hex, rgb) {
    	$('#p_slider_item_audio_spectrum_color').val('#'+hex);
    },
    onBeforeShow: function () {
    	$(this).ColorPickerSetColor(this.value);
    	return false;
    },
    onChange: function (hsb, hex, rgb) {
    	$('#p_slider_item_audio_spectrum_color').val('#'+hex);
    }
  })	
  .bind('keyup', function(){
    $(this).ColorPickerSetColor(this.value);
  });

  $('#blueprint_gallery_preview_bg_color').ColorPicker({
    onSubmit: function(hsb, hex, rgb) {
    	$('#blueprint_gallery_preview_bg_color').val('#'+hex);
    },
    onBeforeShow: function () {
    	$(this).ColorPickerSetColor(this.value);
    	return false;
    },
    onChange: function (hsb, hex, rgb) {
    	$('#blueprint_gallery_preview_bg_color').val('#'+hex);
    }
  })	
  .bind('keyup', function(){
    $(this).ColorPickerSetColor(this.value);
  });

  $('#blueprint_product_preview_bg_color').ColorPicker({
    onSubmit: function(hsb, hex, rgb) {
    	$('#blueprint_product_preview_bg_color').val('#'+hex);
    },
    onBeforeShow: function () {
    	$(this).ColorPickerSetColor(this.value);
    	return false;
    },
    onChange: function (hsb, hex, rgb) {
    	$('#blueprint_product_preview_bg_color').val('#'+hex);
    }
  })	
  .bind('keyup', function(){
    $(this).ColorPickerSetColor(this.value);
  });

  $('#blueprint_works_preview_bg_color').ColorPicker({
    onSubmit: function(hsb, hex, rgb) {
    	$('#blueprint_works_preview_bg_color').val('#'+hex);
    },
    onBeforeShow: function () {
    	$(this).ColorPickerSetColor(this.value);
    	return false;
    },
    onChange: function (hsb, hex, rgb) {
    	$('#blueprint_works_preview_bg_color').val('#'+hex);
    }
  })	
  .bind('keyup', function(){
    $(this).ColorPickerSetColor(this.value);
  });
  
});

</script>

<?php	

}

?>