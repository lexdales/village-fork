<?php

/*
Template Name: Full Width 
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();

?>

<!-- START #content -->

<div id="content">

	<div id="cross"><img src="<?php echo BP; ?>/images/cross.png" alt="" /></div>

	<h1 class="title"><?php the_title(); ?></h1>
	
	<div id="content_wrap">
			
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