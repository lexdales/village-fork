<?php 

/*
Template Name: Slideshow - Floating Portrait Thumbs 
*/

get_header();

$blueprint_slideshow_name = get_post_meta($post->ID, "blueprint_slider_select", 28899);

?>

<div id="floating_slideshow_nav_portrait"></div>

<div id="floating_slideshow_nav">

	<div id="floating_slideshow_nav_controls">
	
		<ul>
		
			<li class="backward_button"></li>
			<li class="play_stop_button"></li>
			<li class="forward_button"></li>
		
		</ul>
		
		<div class="clear"></div>
			
	</div>
	
	<div id="thumb_wrapper">
	
	<div id="thumb_mousemove">
		
	<?php 
	
	query_posts("slider-categories=$blueprint_slideshow_name&order=ASC&orderby=meta_value_num&meta_key=p_slider_item_order&posts_per_page=6000");
	
	if (have_posts()) : while (have_posts()) : the_post();
	
	$image_id = get_post_thumbnail_id();  
	$image_url = wp_get_attachment_image_src($image_id, 'full');	
	$image_url_thumb = wp_get_attachment_image_src($image_id, 'slideshow_floating_portrait_thumb_alt');	

	?>
	
	<a href="<?php echo $image_url[0]; ?>" title=""><img src="<?php echo $image_url_thumb[0]; ?>" alt="" /></a>

	<?php 
	
	endwhile; endif;
	
	wp_reset_query();
	
	?>
		
	</div>
	
	</div>
		
</div>

<?php 

get_footer();

?>