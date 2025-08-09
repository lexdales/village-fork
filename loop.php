
			<?php 
			
			if (have_posts()) : while(have_posts()) : the_post();
			
			global $post;
			
			$p_post_type = get_post_type($post->ID);
			
			echo '<div class="blog_post">';
			
			echo '<a href="' . get_permalink() . '">'.the_title("<h5>", "</h5>",false).'</a>';
			
			if (has_post_thumbnail()) : 
			
			$image_id = get_post_thumbnail_id();  
			$image_url = wp_get_attachment_image_src($image_id, 'full');
			$image_url_thumb = wp_get_attachment_image_src($image_id, 'paged_thumb');
			
			?>
		
			<div id="post_thumbnail">
			
				<a title="" href="<?php the_permalink(); ?>"><img src="<?php echo $image_url_thumb[0] ?>" alt="" /></a>
				
			</div>
			
			<?php endif; ?>
			
			<div class="blog_post_meta">
			
				<ul>
				
					<li class="date"><?php the_time('F j, Y'); ?></li>
					<li class="author"><?php the_author_posts_link(); ?></li>
					<?php if ($p_post_type == "post") : ?>
					<li class="category"><?php the_category(", "); ?></li>
					<?php else: ?>
					<?php if (has_taxonomy_terms("portfolio-categories")) : ?><li class="category"><?php the_taxonomy("portfolio-categories"); ?></li><?php endif; ?>					
					<?php endif; ?>
					<?php if(has_tag()) : ?><li class="tag"><?php the_tags("",", ",""); ?></li><?php endif; ?>
					<li class="comments"><?php comments_popup_link(__("No Comments","village"), __("One Comment","village"), '% ' . __("Comments","village"), '', __("Comments Closed","village")); ?></li>
				
				</ul>
			
			</div>
		
			<?php 
			
			the_content(); 

			echo '</div>';			
			
			endwhile; endif;
			
			?>
