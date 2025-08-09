<?php

get_header();

$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));

?>

<!-- START #content -->

<div id="content">

	<div id="cross"><img src="<?php echo BP; ?>/images/cross.png" alt="" /></div>

	<h1 class="title"><?php echo __("Author", "village").": ".$curauth->nickname; ?></h1>
	
	<div id="content_wrap">
	
		<div id="content_right">
		
			<div id="sidebar">
			
				<?php fw_sidebar($post->ID) ?>
			
			</div>
		
		</div>
		
		<div id="content_left">
		
			<?php 
			
			global $more; $more = 0;
			
			if (is_home() || is_front_page()) :
			
			$paged = get_query_var('page');
			
			endif;
			
			//query_posts("cat_name=###&paged=$paged");
			
			require "loop.php";
			
			?>
			
	 		<div id="post_links">
	 		
	 			<div id="post_links_right">
	 			
	 				<?php 
	 				
	 				if (get_next_posts_link()) {
	 				
	 				next_posts_link(__("Newer Posts", "village"));  
	 				
	 				} else {
	 				
	 				echo '<span class="no_post">' . __("No Newer Posts", "village") . '</span>';
	 				
	 				}
	 				
	 				?>
	 			
	 			</div>
	
	 			<div id="post_links_left">
	 			
	 				<?php 
	 				
	 				if (get_previous_posts_link()) {
	 				
	 				previous_posts_link(__("Older Posts", "village"));  
	 				
	 				} else {
	 				
	 				echo '<span class="no_post">' . __("No Older Posts", "village") . '</span>';
	 				
	 				}
	 				
	 				?> 		
	 					
	 			</div>
	 		
	 		<div class="clear"></div>
	 				
	 		</div>
	 		
			<?php
			
			wp_reset_query();
					
			?>		
		
		</div>
		
		<div class="clear"></div>		
	
	</div>

</div>

<!-- END #content -->

<?php 

get_footer(); 

?>