<?php

get_header();

?>

<!-- START #content -->

<div id="content">

	<div id="cross"><img src="<?php echo BP; ?>/images/cross.png" alt="" /></div>

	<h1 class="title"><?php _e("404 Error", "village") ?></h1>
	
	<div id="content_wrap">
	
		<div id="content_right">
		
			<div id="sidebar">
			
				<?php fw_sidebar($post->ID) ?>
			
			</div>
		
		</div>
		
		<div id="content_left">
		
		<?php 
		
		_e("This page cannot be found or it is temporarily unavailable.", "village");
		
		?>
		
		</div>
		
		<div class="clear"></div>		
	
	</div>

</div>

<!-- END #content -->

<?php 

get_footer(); 

?>