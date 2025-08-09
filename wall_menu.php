<?php

/*
Template Name: jQuery Wall Portfolio w/ Menu
*/

get_header();

#####################################################
##### GET WALL OPTIONS
#####################################################

$wall_thumbs_per_row = get_post_meta($post->ID, "blueprint_wall_thumbs_per_row", 23235);
$wall_thumbs_width = get_post_meta($post->ID, "blueprint_wall_thumb_width", 12121);
$wall_thumbs_height = get_post_meta($post->ID, "blueprint_wall_thumb_height", 25252);
$wall_thumbs_space = get_post_meta($post->ID, "blueprint_wall_thumbs_space", 82838);
$wall_thumbs_padding = get_post_meta($post->ID, "blueprint_wall_thumbs_padding", 91242);

?>

<div class="preloader"></div> 

<span id="wall_menu"></span>
 
<div id="wall" style="margin-left: 254px; width: 80%; height: 100%;">

<?php

$wall = get_post_meta($post->ID, "blueprint_wall_select", 28389);

query_posts("post_type=wall&wall-categories=$wall&posts_per_page=99999");

if (have_posts()) : while (have_posts()) : the_post();

global $post;

if (get_post_meta($post->ID, "blueprint_wall_item_type", 32138) == "normal") :

$image_id = get_post_thumbnail_id();  
$image_url = wp_get_attachment_image_src($image_id, 'full');

?>

<img title="<?php echo get_post_meta($post->ID, "blueprint_wall_item_description", 23243); ?>" src="<?php echo $image_url[0]; ?>" alt="" />

<?php 

endif; 

if (get_post_meta($post->ID, "blueprint_wall_item_type", 32138) == "lightbox") :

$image_id = get_post_thumbnail_id();  
$image_url = wp_get_attachment_image_src($image_id, 'full');
$lightbox_link = "";

if (get_post_meta($post->ID, "blueprint_wall_item_lightbox", 11123) == "") : $lightbox_link = $image_url[0]; else: $lightbox_link = get_post_meta($post->ID, "blueprint_wall_item_lightbox", 11123); endif;

?>

<a href="<?php echo $lightbox_link; ?>" title="<?php echo get_post_meta($post->ID, "blueprint_wall_item_description", 23243); ?>" rel="prettyPhoto[pp_gal]"><img src="<?php echo $image_url[0]; ?>" alt="<?php the_title(); ?>" /></a>

<?php

endif;

if (get_post_meta($post->ID, "blueprint_wall_item_type", 32138) == "vimeo") :

?>

<div id="vimeo" title="" alt="">

<iframe src="http://player.vimeo.com/video/<?php echo get_post_meta($post->ID, 'blueprint_wall_item_vimeo', 67645); ?>?title=0&amp;byline=0&amp;portrait=0" width="<?php echo $wall_thumbs_width; ?>" height="<?php echo $wall_thumbs_height; ?>" frameborder="0"></iframe>

</div>

<?php

endif;

if (get_post_meta($post->ID, "blueprint_wall_item_type", 32138) == "youtube") :

?>

<div id="youtube" title="" alt="">
		<div id="<?php echo $post->post_name; ?>">
		<p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash Player" /></a></p>
		</div>					<script type="text/javascript">

								var so = new SWFObject("http://www.youtube.com/v/<?php echo get_post_meta($post->ID, "blueprint_wall_item_youtube", 33232); ?>&amp;hl=en_US&amp;fs=1&amp;?rel=1", "movie", "<?php echo $wall_thumbs_width; ?>", "<?php echo $wall_thumbs_height; ?>", "9", "#000000");
								so.addParam("id", "movie");
								so.addParam("allowFullscreen", "true");
								so.addParam("wmode", "transparent");
								so.write("<?php echo $post->post_name; ?>");
							
							</script>
</div>
							
<?php

endif;

if (get_post_meta($post->ID, "blueprint_wall_item_type", 32138) == "link") :

$image_id = get_post_thumbnail_id();  
$image_url = wp_get_attachment_image_src($image_id, 'full');

?>

<a href="<?php echo get_post_meta($post->ID, "blueprint_wall_item_link", 40000); ?>" title="<?php echo get_post_meta($post->ID, "blueprint_wall_item_description", 34983); ?>"><img src="<?php echo $image_url[0]; ?>"/></a>

<?php

endif;

if (get_post_meta($post->ID, "blueprint_wall_item_type", 32138) == "self_hosted_video") :

?>

		<a title="" href="<?php echo get_post_meta($post->ID, 'blueprint_wall_item_video_url', 67647); ?>" style="display:block;width:<?php echo $wall_thumbs_width; ?>px;height:<?php echo $wall_thumbs_height; ?>px" id="<?php echo $post->post_name; ?>"></a> 
			
				<script>
				flowplayer("<?php echo $post->post_name; ?>", {src: "<?php echo BP ?>/video/flowplayer-3.2.6.swf",wmode: 'transparent'}, { clip:  {
        autoPlay: false,
        autoBuffering: true,
    }});
				</script>

<?php

endif;

endwhile; endif;

wp_reset_query();

?>

</div>

<script type="text/javascript">// <![CDATA[
  jQuery(window).load(function(){  jQuery('#wall').wall({  settings_thumbs_per_row:<?php echo $wall_thumbs_per_row; ?>, 	settings_width:0, settings_height:0, 	thumb_width:<?php echo $wall_thumbs_width; ?>, thumb_height:<?php echo $wall_thumbs_height; ?>, thumb_space:<?php echo $wall_thumbs_space; ?>, settings_padding:<?php echo $wall_thumbs_padding; ?>, description_height:30  }) }); jQuery("a[rel^='prettyPhoto']").prettyPhoto({slideshow: '6000'});
// ]]&gt;</script>

<?php 

get_footer(); 

?>