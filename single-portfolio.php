<?php

get_header();

if (have_posts()) : while (have_posts()) : the_post();
	
$image_id = get_post_thumbnail_id();  
$image_url = wp_get_attachment_image_src($image_id, 'full');
$portfolio_media_type = get_post_meta($post->ID, 'p_portfolio_media_type', 12349);
$portfolio_project_status = get_post_meta($post->ID, 'p_portfolio_status', 67645); 
if (get_post_meta($post->ID, 'p_portfolio_excerpt', 67645) == "on") : $portfolio_excerpt_bool = "on"; else: $portfolio_excerpt_bool = "off"; endif;
$portfolio_visit_link = get_post_meta($post->ID, 'p_portfolio_button_link', 67645); 

?>

<!-- START #content -->

<div id="content">

	<div id="cross"><img src="<?php echo BP; ?>/images/cross.png" alt="" /></div>

	<h1 class="post_title"><?php the_title(); ?></h1>
	
	<div id="content_wrap">
				
	<?php 
			
	$image_id = get_post_thumbnail_id();  
	$image_url = wp_get_attachment_image_src($image_id, 'full');
	$image_url_thumb = wp_get_attachment_image_src($image_id, 'portfolio_one_column');
	
	?>

	<div id="post_thumbnail">
	
	<div class="portfolio_image">
	
	<?php if ($portfolio_media_type == "" || $portfolio_media_type == "normal") : ?>

	<a title="" href="<?php echo $image_url[0]; ?>" rel="prettyPhoto"><img src="<?php echo $image_url_thumb[0]; ?>" alt="<?php the_title(); ?>" /></a>
	
	<?php 
	
	endif; 
		
	if ($portfolio_media_type == "youtube") : 
	
	?>
					
	<iframe title="YouTube video player" allowfullscreen src="http://www.youtube.com/embed/<?php echo get_post_meta($post->ID, 'p_portfolio_youtube_id', 67645); ?>?hd=1&wmode=opaque" frameborder="0" height="400" width="680"></iframe>
	
	<?php
	
	endif; 
			
	if ($portfolio_media_type == "vimeo") : 

	?>
	
	<iframe src="http://player.vimeo.com/video/<?php echo get_post_meta($post->ID, 'p_portfolio_vimeo_id', 67645); ?>?title=0&amp;byline=0&amp;portrait=0" width="680" height="400" frameborder="0"></iframe>
	
	<?php
	
	endif; 
	
	?>

	<?php 
	
	if ($portfolio_media_type == "self_hosted_video") : 
	
	?>
	
	<a href="<?php echo get_post_meta($post->ID, 'p_portfolio_shv', 67647); ?>" style="display:block;width:680px;height:400px" id="player"></a> 
			
	<script>
	flowplayer("player", {src: "<?php echo BP; ?>/video/flowplayer-3.2.6.swf",wmode: 'transparent'}, { clip:  {
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
	
	<div id="<?php echo $post->post_name; ?>" style="display:block;width:680px;height:400px;"></div>
	
	<script>
	$f("<?php echo $post->post_name; ?>", {src: "<?php bloginfo("template_url"); ?>/video/flowplayer-3.2.6.swf",wmode: 'transparent', autoPlay: true}, {
	
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
	
	<a href="<?php echo get_post_meta($post->ID, 'p_portfolio_link', 67605); ?>"><img src="<?php echo $image_url_thumb[0]; ?>" alt="" /></a>			
						
	<?php
	
	endif; 
	
	?>					

	<?php if ($portfolio_media_type == "portfolio_slider") : ?>
	
	<a href="<?php the_permalink(); ?>"><img src="<?php echo $image_url_thumb[0]; ?>" alt="" /></a>
	
	<?php endif; ?>
				
	</div>

	</div>
		
	<div class="blog_post_meta">
	
		<ul>
		
			<li class="date"><?php the_time('F j, Y'); ?></li>
			<li class="author"><?php the_author_posts_link(); ?></li>
			<?php if (has_taxonomy_terms("portfolio-categories")) : ?><li class="category"><?php the_taxonomy("portfolio-categories"); ?></li><?php endif; ?>
			<?php if (has_tag()) : ?><li class="tag"><?php the_tags("",", ",""); ?></li><?php endif; ?>
			<li class="comments"><?php comments_popup_link(__("No Comments","village"), __("One Comment","village"), '% ' . __("Comments","village"), '', __("Comments Closed","village")); ?></li>
		
		</ul>
	
	</div>

	<?php 
	
	the_content(); 
	
	if (comments_open()) comments_template();
	
	?>
			
	</div>

</div>

<!-- END #content -->

<?php 

endwhile; endif;

get_footer(); 

?>