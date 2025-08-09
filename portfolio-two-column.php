<?php

/*
Template Name: Portfolio - 2 Columns
*/

get_header();

?>

<!-- START #content -->

<div id="content">

	<div id="cross"><img src="<?php echo BP; ?>/images/cross.png" alt="" /></div>

	<h1 class="title"><?php the_title(); ?></h1>
	
	<div id="content_wrap">
			
	<?php 

	if (have_posts()) : while (have_posts()) : the_post();
	
	$portfolio_cat = get_post_meta($post->ID, 'blueprint_portfolio_select', 23231);
	
	endwhile; endif;
					
	query_posts("post_type=portfolio&portfolio-categories=$portfolio_cat&posts_per_page=99999");
	
	$column_count = 1;
	
	?>
	
	<div class="portfolio_wrap">
	
	<?php

	if (have_posts()) : while(have_posts()) : the_post();
	
	$image_id = get_post_thumbnail_id();  
	$image_url = wp_get_attachment_image_src($image_id, 'full');
	$image_url_thumb = wp_get_attachment_image_src($image_id, 'portfolio_two_column');
	$portfolio_media_type = get_post_meta($post->ID, 'p_portfolio_media_type', 12349);
	$portfolio_project_status = get_post_meta($post->ID, 'p_portfolio_status', 67645); 
	if (get_post_meta($post->ID, 'p_portfolio_excerpt', 67645) == "on") : $portfolio_excerpt_bool = "on"; else: $portfolio_excerpt_bool = "off"; endif;
	$portfolio_visit_link = get_post_meta($post->ID, 'p_portfolio_button_link', 67645); 

	?>
	
			<div class="portfolio_two_post <?php if ($column_count == 2) echo "column-last"; ?>">
				
				<a href="<?php the_permalink(); ?>">
				<?php
				
				the_title("<h5>", "</h5>");
				
				?>
				</a>
				
				<div class="portfolio_image">
				
				<?php if ($portfolio_media_type == "" || $portfolio_media_type == "normal") : ?>
			
				<a href="<?php echo $image_url[0]; ?>" rel="prettyPhoto[pp_gal]"><img src="<?php echo $image_url_thumb[0]; ?>" alt="<?php the_title(); ?>" /></a>
				
				<?php 
				
				endif; 
					
				if ($portfolio_media_type == "youtube") : 
				
				?>
								
				<iframe title="YouTube video player" allowfullscreen src="http://www.youtube.com/embed/<?php echo get_post_meta($post->ID, 'p_portfolio_youtube_id', 67645); ?>?hd=1&wmode=opaque" frameborder="0" height="260" width="325"></iframe>
				
				<?php
				
				endif; 
						
				if ($portfolio_media_type == "vimeo") : 
				
				?>
				
				<iframe src="http://player.vimeo.com/video/<?php echo get_post_meta($post->ID, 'p_portfolio_vimeo_id', 67645); ?>?title=0&amp;byline=0&amp;portrait=0" width="325" height="260" frameborder="0"></iframe>
				
				<?php
				
				endif; 
				
				?>
		
				<?php 
				
				if ($portfolio_media_type == "self_hosted_video") : 
				
				?>
		
				<a href="<?php echo get_post_meta($post->ID, 'p_portfolio_shv', 67647); ?>" style="display:block;width:325px;height:260px" id="<?php echo $post->post_name; ?>_unique"></a> 
			
				<script>
				flowplayer("<?php echo $post->post_name; ?>_unique", {src: "<?php bloginfo("template_url"); ?>/video/flowplayer-3.2.6.swf",wmode: 'transparent'}, { clip:  {
        autoPlay: false,
        autoBuffering: true,
    }});
				</script>
				
				<?php
				
				endif; 
				
				?>
				
				<?php 
				
				if ($portfolio_media_type == "audio") : 
				
				?>
				
				<div id="<?php echo $post->post_name; ?>_unique" style="display:block;width:325px;height:260px;"></div>
				
				<script>
				$f("<?php echo $post->post_name; ?>_unique", {src: "<?php bloginfo("template_url"); ?>/video/flowplayer-3.2.6.swf",wmode: 'transparent', autoPlay: true}, {
				
					clip: { 
					   url: '<?php echo get_post_meta($post->ID, 'p_portfolio_audio', 67647); ?>',
					   coverImage: { url: '<?php echo $image_url[0]; ?>', scaling: 'fit' },
					   autoPlay: false
					}
				
				});
				</script>				

				<?php
				
				endif; 
				
				?>	
				
				<?php 
				
				if ($portfolio_media_type == "link") : 
				
				?>
				
				<a target="_blank" href="<?php echo get_post_meta($post->ID, 'p_portfolio_external_link', 67605); ?>"><img src="<?php echo $image_url_thumb[0] ?>" alt="" /></a>			
									
				<?php
				
				endif; 
				
				?>	
		
				<?php if ($portfolio_media_type == "portfolio_slider") : ?>
				
				<a href="<?php the_permalink(); ?>"><img src="<?php echo $image_url_thumb[0]; ?>" alt="" /></a>
				
				<?php endif; ?>
							
				</div>
				
				<?php if ($portfolio_excerpt_bool == "on") : ?>
								
				<div class="portfolio_excerpt">
				
				<?php the_excerpt(); ?>
				
				</div>
				
				<?php endif; ?>
				
				<?php if ( of_get_option('show_portfolio_rm_buttons') == "yes" || of_get_option('show_portfolio_link_buttons') == "yes") : ?>
				
				<div class="portfolio_column_buttons">
		
					<ul>
					
					<?php if ($portfolio_project_status == "online") :  ?>
						
						<?php if (of_get_option('show_portfolio_link_buttons') == "yes") : ?>
						
						<li><a href="<?php echo $portfolio_visit_link; ?>"><?php _e("Visit Site", "village") ?></a></li>
						
						<?php endif; ?>
						
						<?php if (of_get_option('show_portfolio_rm_buttons') == "yes") : ?>						
						
						<li class="first-pbutton"><a href="<?php the_permalink(); ?>"><?php _e("Read More", "village") ?></a></li>
						
						<?php endif; ?>
						
					<?php else: ?>
					
						<?php if (of_get_option('show_portfolio_link_buttons') == "yes") : ?>
						
						<li class="offline"><?php _e("Project Offline", "village") ?></li>
						
						<?php endif; ?>
						
						<?php if (of_get_option('show_portfolio_rm_buttons') == "yes") : ?>						
						
						<li class="first-pbutton"><a href="<?php the_permalink(); ?>"><?php _e("Read More", "village") ?></a></li>
						
						<?php endif; ?>
						
					<?php endif; ?>					
				
					</ul>
				
				</div>
				
				<?php endif; ?>
				
			</div>
	
	<?php
	
	if ($column_count == 2) :  echo '<div class="clear"></div>'; $column_count = 0; endif;
	
	$column_count++;
			
	endwhile; endif;
	
	wp_reset_query();
	
	?>	
	
	<script type="text/javascript">
	
		$(".portfolio_two_post a[rel^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',slideshow: '6000'});
	
	</script>	
	
	<div class="clear"></div>
		
	</div>
	
	<?php
	
	if (comments_open()) comments_template();
	
	?>
				
	</div>

</div>

<!-- END #content -->

<?php 

get_footer(); 

?>