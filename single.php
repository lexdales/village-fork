<?php

get_header();

if (have_posts()) : while (have_posts()) : the_post();

?>

<!-- START #content -->

<div id="content">

	<div id="cross"><img src="<?php echo BP; ?>/images/cross.png" alt="" /></div>

	<h1 class="post_title"><?php the_title(); ?></h1>
	
	<div id="content_wrap">
	
		<div id="content_right">
		
			<div id="sidebar">
			
				<?php fw_sidebar($post->ID); ?>
			
			</div>
		
		</div>
		
		<div id="content_left">		
		
			<?php 
			
			if (has_post_thumbnail()) : 
			
			$image_id = get_post_thumbnail_id();  
			$image_url = wp_get_attachment_image_src($image_id, 'paged_thumb');
			
			?>
		
			<div id="post_thumbnail">
			
				<a title="" href="<?php echo $image_url[0]; ?>" rel="prettyPhoto"><img src="<?php echo $image_url[0]; ?>" alt="" /></a>
				
			</div>
			
			<?php endif; ?>
			
			<div class="blog_post_meta">
			
				<ul>
				
					<li class="date"><?php the_time('F j, Y'); ?></li>
					<li class="author"><?php the_author_posts_link(); ?></li>
					<li class="category"><?php the_category(", "); ?></li>
					<?php if(has_tag()) : ?><li class="tag"><?php the_tags("",", ",""); ?></li><?php endif; ?>
					<li class="comments"><?php comments_popup_link(__("No Comments","village"), __("One Comment","village"), '% ' . __("Comments","village"), '', __("Comments Closed","village")); ?></li>
				
				</ul>
			
			</div>
		
			<?php 
			
			the_content(); 
			
			if (comments_open()) comments_template();
			
			?>
		
		</div>
		
		<div class="clear"></div>
	
	</div>

</div>

<!-- END #content -->

<?php 

endwhile; endif;

get_footer(); 

?>