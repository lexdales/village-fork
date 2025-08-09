<?php

/*
Template Name: Contact
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();

?>

<!-- START #content -->

<div id="content">

	<div id="cross"><img src="<?php echo BP; ?>/images/cross.png" alt="" /></div>

	<h1 class="title"><?php the_title(); ?></h1>
	
	<div id="content_wrap">
	
		<div id="content_right">
		
			<div id="sidebar">
			
				<?php fw_sidebar($post->ID) ?>
			
			</div>
		
		</div>
		
		<div id="content_left">
		
			<?php 
			
			the_content(); 
			
			?>
			
			<form id="contact_form" action="<?php bloginfo('site_url'); ?>" method="post">
			
			<div id="result_box">
			
			<?php _e("Processing…","village") ?>
						
			</div>
			
				<fieldset>
				
					<input type="text" class="" name="name" id="name" value="<?php _e("Your Name", "village") ?>" onfocus="if (this.value == '<?php _e("Your Name", "village") ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e("Your Name", "village") ?>'}" />
					
					<input type="text" class="" name="email" id="email" value="<?php _e("Your Email", "village") ?>" onfocus="if (this.value == '<?php _e("Your Email", "village") ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e("Your Email", "village") ?>'}" />
					
					<input type="text" name="phone" id="phone" value="<?php _e("Your Phone", "village") ?>" onfocus="if (this.value == '<?php _e("Your Phone", "village") ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e("Your Phone", "village") ?>'}" />
					
					<input type="text" name="website" id="website" value="<?php _e("Your Website", "village") ?>" onfocus="if (this.value == '<?php _e("Your Website", "village") ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e("Your Website", "village") ?>'}" />
					
					<textarea rows="7" id="message" name="message"></textarea>
					
					<input type="submit" name="submit" value="<?php _e("Submit Message", "village") ?>" />
					
					<input type="hidden" name="action" value="blueprint_contact_form_post_action" />
				
				</fieldset>
			
			</form>
		
		</div>
		
		<div class="clear"></div>		
	
	</div>

</div>

<!-- END #content -->

<?php 

endwhile; endif;

get_footer(); 

?>