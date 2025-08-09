<?php

/*
Template Name: Slideshow - No Cropping
*/ 

get_header();

$slideshow_id = get_post_meta($post->ID, 'blueprint_slider_select', true);

?>

<div id="no_cropping"></div>

<script type="text/javascript"> 
			
			jQuery(function($){
				
				$.supersized({
				
					// Functionality
					fit_always: 1,
					slide_interval          :   6000,		// Length between transitions
					transition              :   1, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
					transition_speed		:	700,		// Speed of transition
															   
					// Components							
					slide_links				:	false,	// Individual links for each slide (Options: false, 'number', 'name', 'blank')
					slides 					:  	[			// Slideshow Images 
														<?php query_posts('post_type=slider&slider-categories=' . $slideshow_id . '&order=ASC&orderby=meta_value_num&meta_key=p_slider_item_order&posts_per_page=6000'); $current_post = 1; $number_of_posts = (have_posts()) ? sizeof($wp_query->posts) : 0; if (have_posts()) : while (have_posts()) : the_post(); $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id, 'full'); ?>
														
														<?php if ($current_post != $number_of_posts) : ?>
														{image : '<?php echo $image_url[0]; ?>'},
														<?php else: ?>
														{image : '<?php echo $image_url[0]; ?>'}														
														<?php endif; ?>
														
														<?php $current_post++; endwhile; endif; ?>
												]
					
				});
		    });
		    
		</script> 
		

<?php 

get_footer(); 

?>