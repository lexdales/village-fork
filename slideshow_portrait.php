<?php 

/*
Template Name: Slideshow - Right Portrait Thumbs
*/

get_header();

$blueprint_slideshow_name = get_post_meta($post->ID, "blueprint_slider_select", 28899);

?>

<div id="slideshow_nav_portrait"></div>

<div id="thumbs">

	<div id="thumb_wrapper">
	
	<div id="thumb_vert_mousemove">

	<?php 
	
	query_posts("slider-categories=$blueprint_slideshow_name&order=ASC&orderby=meta_value_num&meta_key=p_slider_item_order&posts_per_page=6000");
	
	if (have_posts()) : while (have_posts()) : the_post();
	
	$image_id = get_post_thumbnail_id();  
	$image_url = wp_get_attachment_image_src($image_id, 'full');	
	$image_url_thumb = wp_get_attachment_image_src($image_id, 'slideshow_right_portrait_thumb');	
	
	?>
	
	<a href="<?php echo $image_url[0]; ?>" title=""><img src="<?php echo $image_url_thumb[0]; ?>" alt="" /></a>

	<?php 
	
	endwhile; endif;
	
	?>
	
	</div>
	
	</div>
		
	<div id="slideshow_nav_controls">
	
		<ul>
		
			<li class="backward_button"></li>
			<li class="play_stop_button"></li>
			<li class="forward_button"></li>
		
		</ul>
		
		<div class="clear"></div>
			
	</div>
</div>

<?php 

get_footer();

?>