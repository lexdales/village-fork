<?php 

/*
Template Name: Slideshow - No Thumbs
*/

get_header();

$blueprint_slideshow_name = get_post_meta($post->ID, "blueprint_slider_select", 28899);

?>

<div style="display: none;">

<div id="thumbs">

	<div id="thumbs_hidden">

	<?php 
	
	query_posts("slider-categories=$blueprint_slideshow_name&order=ASC&orderby=meta_value_num&meta_key=p_slider_item_order&posts_per_page=6000");
	
	if (have_posts()) : while (have_posts()) : the_post();
	
	$image_id = get_post_thumbnail_id();  
	$image_url = wp_get_attachment_image_src($image_id, 'full');	
	
	?>
	
	<a href="<?php echo $image_url[0]; ?>" title=""><img src="<?php echo BP; ?>/timthumb.php?src=<?php echo $image_url[0]; ?>&amp;w=100&amp;h=60&amp;zc=1&amp;q=100" alt="" /></a>

	<?php 
	
	endwhile; endif;
	
	?>
	
	</div>
		
</div>

</div>

<?php 

get_footer();

?>