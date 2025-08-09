<?php

/*
Template Name: Gallery
*/

get_header();

$blueprint_page_gallery_type = get_post_meta($post->ID, 'blueprint_gallery_type', true);
$blueprint_page_gallery = get_post_meta($post->ID, 'blueprint_gallery_select', 893);
$blueprint_gallery_thumb_orientation = get_post_meta($post->ID, 'blueprint_gallery_orientation', true);

?>

<!-- START #content -->

<div id="content">

	<div id="cross"><img src="<?php echo BP; ?>/images/cross.png" alt="" /></div>

	<h1 class="title"><?php the_title(); ?></h1>
	
	<div id="content_wrap">
	
	<?php
	    		
	$column_count = 1; 
	
	switch ($blueprint_page_gallery_type) :
	
		case "prettyphoto4" :
		
			?>
			
			<div class="gallery_wrap">
			
			<?php

			if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; wp_reset_query();
			
			if ( !post_password_required() ) :

			query_posts("post_type=gallery&p=$blueprint_page_gallery");

			if (have_posts()) : while (have_posts()) : the_post();
			
			$attachments = get_children(array('post_parent' => $post->ID,
			'post_status' => 'inherit',
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			'order' => 'DESC',
			'orderby' => 'menu_order ID'));
			
			foreach ($attachments as $att_id => $attachment) :
						
			$image_src = wp_get_attachment_image_src($attachment->ID, "full");
			$image_src_thumb = wp_get_attachment_image_src($attachment->ID, "column_gallery_4");
			$image_src_thumb_portrait = wp_get_attachment_image_src($attachment->ID, "column_gallery_4_portrait");

			$gallery_item_title = $attachment->post_title;
			if ($blueprint_gallery_thumb_orientation == "landscape")
			{
				$gallery_item_thumb = $image_src_thumb[0];
			} else {
				$gallery_item_thumb = $image_src_thumb_portrait[0];
			
			}
			$gallery_item_image = $image_src[0];
			$gallery_item_lightbox = get_post_meta($attachment->ID, "fw_lightbox_link", true);
			$gallery_item_link = get_post_meta($attachment->ID, "fw_external_link", true);
			
			if ($gallery_item_lightbox == "") : $gallery_item_lightbox = $gallery_item_image; endif;
			if ($gallery_item_link != "") $gallery_item_lightbox = $gallery_item_link;
			
			?>
			
			<div class="gallery_four_post <?php if ($column_count == 4) echo "column-last"; ?>">
			
			<a href="<?php echo $gallery_item_lightbox; ?>" <?php if ($gallery_item_link == "") : ?> rel="prettyPhoto[pp_gal]" <?php endif; ?>><img src="<?php echo $gallery_item_thumb; ?>" alt="<?php echo $gallery_item_title; ?>" /></a>
			
			<div class="gallery_item_info"><?php echo $gallery_item_title; ?></div>

			<div class="clear"></div>
					
			</div>
			
			<?php
			
			$column_count++;
			
			if ($column_count == 5) {
				$column_count = 1;
				echo '<div class="clear"></div>';
			}
			
			endforeach;
			
			endwhile; endif; wp_reset_query();
			
			?>

			<script type="text/javascript">
			
			jQuery(".gallery_four_post a[rel^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',slideshow: '6000'});
			<?php
			
			if ($blueprint_gallery_thumb_orientation == "landscape")
			{
				echo 'jQuery(".gallery_four_post").css("height", "130px");';
			} else {
				echo 'jQuery(".gallery_four_post").css("height", "200px");';
			
			}
			
			?>
			
			</script>
					
			</div>
			
			<?php
			
			endif;
		
		break;

		case "prettyphoto3" :

			?>
			
			<div class="gallery_wrap">
			
			<?php

			if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; wp_reset_query();

			if ( !post_password_required() ) :

			query_posts("post_type=gallery&p=$blueprint_page_gallery");

			if (have_posts()) : while (have_posts()) : the_post();
			
			$attachments = get_children(array('post_parent' => $post->ID,
			'post_status' => 'inherit',
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			'order' => 'DESC',
			'orderby' => 'menu_order ID'));
			
			foreach ($attachments as $att_id => $attachment) :
						
			$image_src = wp_get_attachment_image_src($attachment->ID, "full");
			$image_src_thumb = wp_get_attachment_image_src($attachment->ID, "column_gallery_3");
			$image_src_thumb_portrait = wp_get_attachment_image_src($attachment->ID, "column_gallery_3_portrait");

			$gallery_item_title = $attachment->post_title;
			if ($blueprint_gallery_thumb_orientation == "landscape")
			{
				$gallery_item_thumb = $image_src_thumb[0];
			} else {
				$gallery_item_thumb = $image_src_thumb_portrait[0];
			
			}
			$gallery_item_image = $image_src[0];
			$gallery_item_lightbox = get_post_meta($attachment->ID, "fw_lightbox_link", true);
			$gallery_item_link = get_post_meta($attachment->ID, "fw_external_link", true);
			
			if ($gallery_item_lightbox == "") : $gallery_item_lightbox = $gallery_item_image; endif;
			if ($gallery_item_link != "") $gallery_item_lightbox = $gallery_item_link;
			
			?>
			
			<div class="gallery_three_post <?php if ($column_count == 3) echo "column-last"; ?>">
			
			<a href="<?php echo $gallery_item_lightbox; ?>" <?php if ($gallery_item_link == "") : ?> rel="prettyPhoto[pp_gal]" <?php endif; ?>><img src="<?php echo $gallery_item_thumb; ?>" alt="<?php echo $gallery_item_title; ?>" /></a>
			
			<div class="gallery_item_info"><?php echo $gallery_item_title; ?></div>

			<div class="clear"></div>
					
			</div>
			
			<?php
			
			$column_count++;
			
			if ($column_count == 4) {
				$column_count = 1;
				echo '<div class="clear"></div>';
			}
			
			endforeach;
			
			endwhile; endif; wp_reset_query();
			
			?>

			<script type="text/javascript">
			
			jQuery(".gallery_three_post a[rel^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',slideshow: '6000'});
			<?php
			
			if ($blueprint_gallery_thumb_orientation == "landscape")
			{
				echo 'jQuery(".gallery_three_post").css("height", "195px");';
			} else {
				echo 'jQuery(".gallery_three_post").css("height", "300px");';
			
			}
			
			?>			

			</script>
					
			</div>
				
			<?php
			
			endif;
		
		break;

		case "prettyphoto2" :

			?>
			
			<div class="gallery_wrap">
			
			<?php

			if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; wp_reset_query();

			if ( !post_password_required() ) :
			
			query_posts("post_type=gallery&p=$blueprint_page_gallery");

			if (have_posts()) : while (have_posts()) : the_post();
			
			$attachments = get_children(array('post_parent' => $post->ID,
			'post_status' => 'inherit',
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			'order' => 'DESC',
			'orderby' => 'menu_order ID'));
			
			foreach ($attachments as $att_id => $attachment) :
						
			$image_src = wp_get_attachment_image_src($attachment->ID, "full");
			$image_src_thumb = wp_get_attachment_image_src($attachment->ID, "column_gallery_2");
			$image_src_thumb_portrait = wp_get_attachment_image_src($attachment->ID, "column_gallery_2_portrait");

			$gallery_item_title = $attachment->post_title;
			if ($blueprint_gallery_thumb_orientation == "landscape")
			{
				$gallery_item_thumb = $image_src_thumb[0];
			} else {
				$gallery_item_thumb = $image_src_thumb_portrait[0];
			
			}
			$gallery_item_image = $image_src[0];
			$gallery_item_lightbox = get_post_meta($attachment->ID, "fw_lightbox_link", true);
			$gallery_item_link = get_post_meta($attachment->ID, "fw_external_link", true);
			
			if ($gallery_item_lightbox == "") : $gallery_item_lightbox = $gallery_item_image; endif;
			if ($gallery_item_link != "") $gallery_item_lightbox = $gallery_item_link;
			
			?>
			
			<div class="gallery_two_post <?php if ($column_count == 2) echo "column-last"; ?>">
			
			<a href="<?php echo $gallery_item_lightbox; ?>" <?php if ($gallery_item_link == "") : ?> rel="prettyPhoto[pp_gal]" <?php endif; ?>><img src="<?php echo $gallery_item_thumb; ?>" alt="<?php echo $gallery_item_title; ?>" /></a>
			
			<div class="gallery_item_info"><?php echo $gallery_item_title; ?></div>

			<div class="clear"></div>
					
			</div>
			
			<?php
			
			$column_count++;
			
			if ($column_count == 3) {
				$column_count = 1;
				echo '<div class="clear"></div>';
			}
			
			endforeach;
			
			endwhile; endif; wp_reset_query();
			
			?>

			<script type="text/javascript">
			
			jQuery(".gallery_two_post a[rel^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',slideshow: '6000'});
			<?php
			
			if ($blueprint_gallery_thumb_orientation == "landscape")
			{
				echo 'jQuery(".gallery_two_post").css("height", "275px");';
			} else {
				echo 'jQuery(".gallery_two_post").css("height", "480px");';
			
			}
			
			?>			
			
			</script>
					
			</div>
				
			<?php
			
			endif;
					
		break;

		case "prettyphoto1" :
		
			?>

			<div class="gallery_wrap">
			
			<?php

			if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; wp_reset_query();

			if ( !post_password_required() ) :
						
			query_posts("post_type=gallery&p=$blueprint_page_gallery");

			if (have_posts()) : while (have_posts()) : the_post();
			
			$attachments = get_children(array('post_parent' => $post->ID,
			'post_status' => 'inherit',
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			'order' => 'DESC',
			'orderby' => 'menu_order ID'));
			
			foreach ($attachments as $att_id => $attachment) :
						
			$image_src = wp_get_attachment_image_src($attachment->ID, "full");
			$image_src_thumb = wp_get_attachment_image_src($attachment->ID, "column_gallery_1");
			$image_src_thumb_portrait = wp_get_attachment_image_src($attachment->ID, "column_gallery_1_portrait");

			$gallery_item_title = $attachment->post_title;
			if ($blueprint_gallery_thumb_orientation == "landscape")
			{
				$gallery_item_thumb = $image_src_thumb[0];
			} else {
				$gallery_item_thumb = $image_src_thumb_portrait[0];
			
			}
			$gallery_item_image = $image_src[0];
			$gallery_item_lightbox = get_post_meta($attachment->ID, "fw_lightbox_link", true);
			$gallery_item_link = get_post_meta($attachment->ID, "fw_external_link", true);
			
			if ($gallery_item_lightbox == "") : $gallery_item_lightbox = $gallery_item_image; endif;
			if ($gallery_item_link != "") $gallery_item_lightbox = $gallery_item_link;
			
			?>
			
			<div class="gallery_one_post <?php if ($column_count == 1) echo "column-last"; ?>">
			
			<a href="<?php echo $gallery_item_lightbox; ?>" <?php if ($gallery_item_link == "") : ?> rel="prettyPhoto[pp_gal]" <?php endif; ?>><img src="<?php echo $gallery_item_thumb; ?>" alt="<?php echo $gallery_item_title; ?>" /></a>
			
			<div class="gallery_item_info"><?php echo $gallery_item_title; ?></div>

			<div class="clear"></div>
					
			</div>
			
			<?php
			
			$column_count++;
			
			if ($column_count == 1) {
				$column_count = 1;
				echo '<div class="clear"></div>';
			}
			
			endforeach;
			
			endwhile; endif; wp_reset_query();
			
			?>

			<script type="text/javascript">
			
			jQuery(".gallery_one_post a[rel^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',slideshow: '6000'});
			<?php
			
			if ($blueprint_gallery_thumb_orientation == "landscape")
			{
				echo 'jQuery(".gallery_one_post").css("height", "450px");';
			} else {
				echo 'jQuery(".gallery_one_post").css("height", "800px");';
			
			}
			
			?>			

			</script>
					
			</div>
				
			<?php
			
			endif;
			
		break;

		case "fancybox4" :

			?>
			
			<div class="gallery_wrap">
			
			<?php

			if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; wp_reset_query();

			if ( !post_password_required() ) :
			
			query_posts("post_type=gallery&p=$blueprint_page_gallery");

			if (have_posts()) : while (have_posts()) : the_post();
			
			$attachments = get_children(array('post_parent' => $post->ID,
			'post_status' => 'inherit',
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			'order' => 'DESC',
			'orderby' => 'menu_order ID'));
			
			foreach ($attachments as $att_id => $attachment) :
						
			$image_src = wp_get_attachment_image_src($attachment->ID, "full");
			$image_src_thumb = wp_get_attachment_image_src($attachment->ID, "column_gallery_4");
			$image_src_thumb_portrait = wp_get_attachment_image_src($attachment->ID, "column_gallery_4_portrait");

			$gallery_item_title = $attachment->post_title;
			if ($blueprint_gallery_thumb_orientation == "landscape")
			{
				$gallery_item_thumb = $image_src_thumb[0];
			} else {
				$gallery_item_thumb = $image_src_thumb_portrait[0];
			
			}
			$gallery_item_image = $image_src[0];
			$gallery_item_lightbox = get_post_meta($attachment->ID, "fw_lightbox_link", true);
			$gallery_item_link = get_post_meta($attachment->ID, "fw_external_link", true);
			
			if ($gallery_item_lightbox == "") : $gallery_item_lightbox = $gallery_item_image; endif;
			if ($gallery_item_link != "") $gallery_item_lightbox = $gallery_item_link;
			
			?>
			
			<div class="gallery_four_post <?php if ($column_count == 4) echo "column-last"; ?>">
			
			<a title="<?php echo $gallery_item_title; ?>" href="<?php echo $gallery_item_lightbox; ?>" <?php if ($gallery_item_link == "") : ?> rel="example_group" <?php endif; ?>><img src="<?php echo $gallery_item_thumb; ?>" /></a>
			
			<div class="gallery_item_info"><?php echo $gallery_item_title; ?></div>

			<div class="clear"></div>
					
			</div>
			
			<?php
			
			$column_count++;
			
			if ($column_count == 5) {
				$column_count = 1;
				echo '<div class="clear"></div>';
			}
			
			endforeach;
			
			endwhile; endif; wp_reset_query();
			
			?>

			<script type="text/javascript">
			
			jQuery("a[rel=example_group]").fancybox({
					'transitionIn'		: 'none',
					'transitionOut'		: 'none',
					'titleShow: false' 	: 'over',
					''       : function(title, currentArray, currentIndex, currentOpts) {
					    return '<span id="fancybox-title-over">Image ' +  (currentIndex + 1) + ' / ' + currentArray.length + ' - ' + title + '</span>';
					}
				});			

			<?php
			
			if ($blueprint_gallery_thumb_orientation == "landscape")
			{
				echo 'jQuery(".gallery_four_post").css("height", "130px");';
			} else {
				echo 'jQuery(".gallery_four_post").css("height", "200px");';
			
			}
			
			?>
			
			</script>
					
			</div>
			
			<?php

			endif;
					
		break;

		case "fancybox3" :

			?>
			
			<div class="gallery_wrap">
			
			<?php

			if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; wp_reset_query();

			if ( !post_password_required() ) :
		
			query_posts("post_type=gallery&p=$blueprint_page_gallery");

			if (have_posts()) : while (have_posts()) : the_post();
			
			$attachments = get_children(array('post_parent' => $post->ID,
			'post_status' => 'inherit',
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			'order' => 'DESC',
			'orderby' => 'menu_order ID'));
			
			foreach ($attachments as $att_id => $attachment) :
						
			$image_src = wp_get_attachment_image_src($attachment->ID, "full");
			$image_src_thumb = wp_get_attachment_image_src($attachment->ID, "column_gallery_3");
			$image_src_thumb_portrait = wp_get_attachment_image_src($attachment->ID, "column_gallery_3_portrait");

			$gallery_item_title = $attachment->post_title;
			if ($blueprint_gallery_thumb_orientation == "landscape")
			{
				$gallery_item_thumb = $image_src_thumb[0];
			} else {
				$gallery_item_thumb = $image_src_thumb_portrait[0];
			
			}
			$gallery_item_image = $image_src[0];
			$gallery_item_lightbox = get_post_meta($attachment->ID, "fw_lightbox_link", true);
			$gallery_item_link = get_post_meta($attachment->ID, "fw_external_link", true);
			
			if ($gallery_item_lightbox == "") : $gallery_item_lightbox = $gallery_item_image; endif;
			if ($gallery_item_link != "") $gallery_item_lightbox = $gallery_item_link;
			
			?>
			
			<div class="gallery_three_post <?php if ($column_count == 3) echo "column-last"; ?>">
			
			<a title="<?php echo $gallery_item_title; ?>" href="<?php echo $gallery_item_lightbox; ?>" <?php if ($gallery_item_link == "") : ?> rel="example_group" <?php endif; ?>><img src="<?php echo $gallery_item_thumb; ?>" /></a>
			
			<div class="gallery_item_info"><?php echo $gallery_item_title; ?></div>

			<div class="clear"></div>
					
			</div>
			
			<?php
			
			$column_count++;
			
			if ($column_count == 4) {
				$column_count = 1;
				echo '<div class="clear"></div>';
			}
			
			endforeach;
			
			endwhile; endif; wp_reset_query();
			
			?>

			<script type="text/javascript">
			
			jQuery("a[rel=example_group]").fancybox({
					'transitionIn'		: 'none',
					'transitionOut'		: 'none',
					'titleShow: false' 	: 'over',
					''       : function(title, currentArray, currentIndex, currentOpts) {
					    return '<span id="fancybox-title-over">Image ' +  (currentIndex + 1) + ' / ' + currentArray.length + ' - ' + title + '</span>';
					}
				});			

			<?php
			
			if ($blueprint_gallery_thumb_orientation == "landscape")
			{
				echo 'jQuery(".gallery_three_post").css("height", "195px");';
			} else {
				echo 'jQuery(".gallery_three_post").css("height", "300px");';
			
			}
			
			?>			
			
			</script>
					
			</div>
						
			<?php

			endif;
					
		break;

		case "fancybox2" :

			?>
			
			<div class="gallery_wrap">
			
			<?php

			if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; wp_reset_query();

			if ( !post_password_required() ) :
			
			query_posts("post_type=gallery&p=$blueprint_page_gallery");

			if (have_posts()) : while (have_posts()) : the_post();
			
			$attachments = get_children(array('post_parent' => $post->ID,
			'post_status' => 'inherit',
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			'order' => 'DESC',
			'orderby' => 'menu_order ID'));
			
			foreach ($attachments as $att_id => $attachment) :
						
			$image_src = wp_get_attachment_image_src($attachment->ID, "full");
			$image_src_thumb = wp_get_attachment_image_src($attachment->ID, "column_gallery_2");
			$image_src_thumb_portrait = wp_get_attachment_image_src($attachment->ID, "column_gallery_2_portrait");

			$gallery_item_title = $attachment->post_title;
			if ($blueprint_gallery_thumb_orientation == "landscape")
			{
				$gallery_item_thumb = $image_src_thumb[0];
			} else {
				$gallery_item_thumb = $image_src_thumb_portrait[0];
			
			}
			$gallery_item_image = $image_src[0];
			$gallery_item_lightbox = get_post_meta($attachment->ID, "fw_lightbox_link", true);
			$gallery_item_link = get_post_meta($attachment->ID, "fw_external_link", true);
			
			if ($gallery_item_lightbox == "") : $gallery_item_lightbox = $gallery_item_image; endif;
			if ($gallery_item_link != "") $gallery_item_lightbox = $gallery_item_link;
			
			?>
			
			<div class="gallery_two_post <?php if ($column_count == 2) echo "column-last"; ?>">
			
			<a title="<?php echo $gallery_item_title; ?>" href="<?php echo $gallery_item_lightbox; ?>" <?php if ($gallery_item_link == "") : ?> rel="example_group" <?php endif; ?>><img src="<?php echo $gallery_item_thumb; ?>" /></a>
			
			<div class="gallery_item_info"><?php echo $gallery_item_title; ?></div>

			<div class="clear"></div>
					
			</div>
			
			<?php
			
			$column_count++;
			
			if ($column_count == 3) {
				$column_count = 1;
				echo '<div class="clear"></div>';
			}
			
			endforeach;
			
			endwhile; endif; wp_reset_query();
			
			?>

			<script type="text/javascript">
			
			jQuery("a[rel=example_group]").fancybox({
					'transitionIn'		: 'none',
					'transitionOut'		: 'none',
					'' 	: 'over',
					'titleShow: false'       : function(title, currentArray, currentIndex, currentOpts) {
					    return '<span id="fancybox-title-over">Image ' +  (currentIndex + 1) + ' / ' + currentArray.length + ' - ' + title + '</span>';
					}
				});			

			<?php
			
			if ($blueprint_gallery_thumb_orientation == "landscape")
			{
				echo 'jQuery(".gallery_two_post").css("height", "275px");';
			} else {
				echo 'jQuery(".gallery_two_post").css("height", "480px");';
			
			}
			
			?>			
			
			</script>
					
			</div>
						
			<?php
			
			endif;
		
		break;

		case "fancybox1" :

			?>
			
			<div class="gallery_wrap">
			
			<?php

			if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; wp_reset_query();

			if ( !post_password_required() ) :
			
			query_posts("post_type=gallery&p=$blueprint_page_gallery");

			if (have_posts()) : while (have_posts()) : the_post();
			
			$attachments = get_children(array('post_parent' => $post->ID,
			'post_status' => 'inherit',
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			'order' => 'DESC',
			'orderby' => 'menu_order ID'));
			
			foreach ($attachments as $att_id => $attachment) :
						
			$image_src = wp_get_attachment_image_src($attachment->ID, "full");
			$image_src_thumb = wp_get_attachment_image_src($attachment->ID, "column_gallery_1");
			$image_src_thumb_portrait = wp_get_attachment_image_src($attachment->ID, "column_gallery_1_portrait");

			$gallery_item_title = $attachment->post_title;
			if ($blueprint_gallery_thumb_orientation == "landscape")
			{
				$gallery_item_thumb = $image_src_thumb[0];
			} else {
				$gallery_item_thumb = $image_src_thumb_portrait[0];
			
			}
			$gallery_item_image = $image_src[0];
			$gallery_item_lightbox = get_post_meta($attachment->ID, "fw_lightbox_link", true);
			$gallery_item_link = get_post_meta($attachment->ID, "fw_external_link", true);
			
			if ($gallery_item_lightbox == "") : $gallery_item_lightbox = $gallery_item_image; endif;
			if ($gallery_item_link != "") $gallery_item_lightbox = $gallery_item_link;
			
			?>
			
			<div class="gallery_one_post <?php if ($column_count == 1) echo "column-last"; ?>">
			
			<a title="<?php echo $gallery_item_title; ?>" href="<?php echo $gallery_item_lightbox; ?>" <?php if ($gallery_item_link == "") : ?> rel="example_group" <?php endif; ?>><img src="<?php echo $gallery_item_thumb; ?>" /></a>
			
			<div class="gallery_item_info"><?php echo $gallery_item_title; ?></div>

			<div class="clear"></div>
					
			</div>
			
			<?php
			
			$column_count++;
			
			if ($column_count == 1) {
				$column_count = 1;
				echo '<div class="clear"></div>';
			}
			
			endforeach;
			
			endwhile; endif; wp_reset_query();
			
			?>

			<script type="text/javascript">
			
			jQuery("a[rel=example_group]").fancybox({
					'transitionIn'		: 'none',
					'transitionOut'		: 'none',
					'titleShow: false' 	: 'over',
					''       : function(title, currentArray, currentIndex, currentOpts) {
					    return '<span id="fancybox-title-over">Image ' +  (currentIndex + 1) + ' / ' + currentArray.length + ' - ' + title + '</span>';
					}
				});			

			<?php
			
			if ($blueprint_gallery_thumb_orientation == "landscape")
			{
				echo 'jQuery(".gallery_one_post").css("height", "450px");';
			} else {
				echo 'jQuery(".gallery_one_post").css("height", "800px");';
			
			}
			
			?>			
			
			</script>
					
			</div>
			
			<?php

			endif;
					
		break;

		case "colorbox4" :
		
			?>
			
			<div class="gallery_wrap">
			
			<?php

			if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; wp_reset_query();

			if ( !post_password_required() ) :
			
			query_posts("post_type=gallery&p=$blueprint_page_gallery");

			if (have_posts()) : while (have_posts()) : the_post();
			
			$attachments = get_children(array('post_parent' => $post->ID,
			'post_status' => 'inherit',
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			'order' => 'DESC',
			'orderby' => 'menu_order ID'));
			
			foreach ($attachments as $att_id => $attachment) :
						
			$image_src = wp_get_attachment_image_src($attachment->ID, "full");
			$image_src_thumb = wp_get_attachment_image_src($attachment->ID, "column_gallery_4");
			$image_src_thumb_portrait = wp_get_attachment_image_src($attachment->ID, "column_gallery_4_portrait");

			$gallery_item_title = $attachment->post_title;
			if ($blueprint_gallery_thumb_orientation == "landscape")
			{
				$gallery_item_thumb = $image_src_thumb[0];
			} else {
				$gallery_item_thumb = $image_src_thumb_portrait[0];
			
			}
			$gallery_item_image = $image_src[0];
			$gallery_item_lightbox = get_post_meta($attachment->ID, "fw_lightbox_link", true);
			$gallery_item_link = get_post_meta($attachment->ID, "fw_external_link", true);
			
			if ($gallery_item_lightbox == "") : $gallery_item_lightbox = $gallery_item_image; endif;
			if ($gallery_item_link != "") $gallery_item_lightbox = $gallery_item_link;

			?>
			
			<div class="gallery_four_post <?php if ($column_count == 4) echo "column-last"; ?>">
			
			<a href="<?php echo $gallery_item_lightbox; ?>" <?php if ($gallery_item_link == "") : ?> rel="example" <?php endif; ?>><img src="<?php echo $gallery_item_thumb; ?>" alt="<?php echo $gallery_item_title; ?>" /></a>
			
			<div class="gallery_item_info"><?php echo $gallery_item_title; ?></div>

			<div class="clear"></div>
					
			</div>
			
			<?php
			
			$column_count++;
			
			if ($column_count == 5) {
				$column_count = 1;
				echo '<div class="clear"></div>';
			}
			
			endforeach;
			
			endwhile; endif; wp_reset_query();
			
			?>

			<script type="text/javascript">
			
			jQuery("a[rel='example']").colorbox({transition:"fade",height:"80%"});	
			<?php
			
			if ($blueprint_gallery_thumb_orientation == "landscape")
			{
				echo 'jQuery(".gallery_four_post").css("height", "130px");';
			} else {
				echo 'jQuery(".gallery_four_post").css("height", "200px");';
			
			}
			
			?>
						
			</script>
					
			</div>
			
			<?php

			endif;
					
		break;

		case "colorbox3" :

			?>
			
			<div class="gallery_wrap">
			
			<?php

			if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; wp_reset_query();

			if ( !post_password_required() ) :
			
			query_posts("post_type=gallery&p=$blueprint_page_gallery");

			if (have_posts()) : while (have_posts()) : the_post();
			
			$attachments = get_children(array('post_parent' => $post->ID,
			'post_status' => 'inherit',
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			'order' => 'DESC',
			'orderby' => 'menu_order ID'));
			
			foreach ($attachments as $att_id => $attachment) :
						
			$image_src = wp_get_attachment_image_src($attachment->ID, "full");
			$image_src_thumb = wp_get_attachment_image_src($attachment->ID, "column_gallery_3");
			$image_src_thumb_portrait = wp_get_attachment_image_src($attachment->ID, "column_gallery_3_portrait");

			$gallery_item_title = $attachment->post_title;
			if ($blueprint_gallery_thumb_orientation == "landscape")
			{
				$gallery_item_thumb = $image_src_thumb[0];
			} else {
				$gallery_item_thumb = $image_src_thumb_portrait[0];
			
			}
			$gallery_item_image = $image_src[0];
			$gallery_item_lightbox = get_post_meta($attachment->ID, "fw_lightbox_link", true);
			$gallery_item_link = get_post_meta($attachment->ID, "fw_external_link", true);
			
			if ($gallery_item_lightbox == "") : $gallery_item_lightbox = $gallery_item_image; endif;
			if ($gallery_item_link != "") $gallery_item_lightbox = $gallery_item_link;
			
			?>
			
			<div class="gallery_three_post <?php if ($column_count == 3) echo "column-last"; ?>">
			
			<a href="<?php echo $gallery_item_lightbox; ?>" <?php if ($gallery_item_link == "") : ?> rel="example" <?php endif; ?>><img src="<?php echo $gallery_item_thumb; ?>" alt="<?php echo $gallery_item_title; ?>" /></a>
			
			<div class="gallery_item_info"><?php echo $gallery_item_title; ?></div>

			<div class="clear"></div>
					
			</div>
			
			<?php
			
			$column_count++;
			
			if ($column_count == 4) {
				$column_count = 1;
				echo '<div class="clear"></div>';
			}
			
			endforeach;
			
			endwhile; endif; wp_reset_query();
			
			?>

			<script type="text/javascript">
			
			jQuery("a[rel='example']").colorbox({transition:"fade",height:"80%"});	
			<?php
			
			if ($blueprint_gallery_thumb_orientation == "landscape")
			{
				echo 'jQuery(".gallery_three_post").css("height", "195px");';
			} else {
				echo 'jQuery(".gallery_three_post").css("height", "300px");';
			
			}
			
			?>			
			
			</script>
					
			</div>
			
			<?php
			
			endif;
				
		break;

		case "colorbox2" :

			?>
			
			<div class="gallery_wrap">
			
			<?php

			if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; wp_reset_query();

			if ( !post_password_required() ) :
			
			query_posts("post_type=gallery&p=$blueprint_page_gallery");

			if (have_posts()) : while (have_posts()) : the_post();
			
			$attachments = get_children(array('post_parent' => $post->ID,
			'post_status' => 'inherit',
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			'order' => 'DESC',
			'orderby' => 'menu_order ID'));
			
			foreach ($attachments as $att_id => $attachment) :
						
			$image_src = wp_get_attachment_image_src($attachment->ID, "full");
			$image_src_thumb = wp_get_attachment_image_src($attachment->ID, "column_gallery_2");
			$image_src_thumb_portrait = wp_get_attachment_image_src($attachment->ID, "column_gallery_2_portrait");

			$gallery_item_title = $attachment->post_title;
			if ($blueprint_gallery_thumb_orientation == "landscape")
			{
				$gallery_item_thumb = $image_src_thumb[0];
			} else {
				$gallery_item_thumb = $image_src_thumb_portrait[0];
			
			}
			$gallery_item_image = $image_src[0];
			$gallery_item_lightbox = get_post_meta($attachment->ID, "fw_lightbox_link", true);
			$gallery_item_link = get_post_meta($attachment->ID, "fw_external_link", true);
			
			if ($gallery_item_lightbox == "") : $gallery_item_lightbox = $gallery_item_image; endif;
			if ($gallery_item_link != "") $gallery_item_lightbox = $gallery_item_link;
			
			?>
			
			<div class="gallery_two_post <?php if ($column_count == 2) echo "column-last"; ?>">
			
			<a href="<?php echo $gallery_item_lightbox; ?>" <?php if ($gallery_item_link == "") : ?> rel="example" <?php endif; ?>><img src="<?php echo $gallery_item_thumb; ?>" alt="<?php echo $gallery_item_title; ?>" /></a>
			
			<div class="gallery_item_info"><?php echo $gallery_item_title; ?></div>

			<div class="clear"></div>
					
			</div>
			
			<?php
			
			$column_count++;
			
			if ($column_count == 3) {
				$column_count = 1;
				echo '<div class="clear"></div>';
			}
			
			endforeach;
			
			endwhile; endif; wp_reset_query();
			
			?>

			<script type="text/javascript">
			
			jQuery("a[rel='example']").colorbox({transition:"fade",height:"80%"});	
			<?php
			
			if ($blueprint_gallery_thumb_orientation == "landscape")
			{
				echo 'jQuery(".gallery_two_post").css("height", "275px");';
			} else {
				echo 'jQuery(".gallery_two_post").css("height", "480px");';
			
			}
			
			?>			
			
			</script>
					
			</div>
			
			<?php
			
			endif;
			
		break;

		case "colorbox1" :

			?>
			
			<div class="gallery_wrap">
			
			<?php

			if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; wp_reset_query();

			if ( !post_password_required() ) :
			
			query_posts("post_type=gallery&p=$blueprint_page_gallery");

			if (have_posts()) : while (have_posts()) : the_post();
			
			$attachments = get_children(array('post_parent' => $post->ID,
			'post_status' => 'inherit',
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			'order' => 'DESC',
			'orderby' => 'menu_order ID'));
			
			foreach ($attachments as $att_id => $attachment) :
						
			$image_src = wp_get_attachment_image_src($attachment->ID, "full");
			$image_src_thumb = wp_get_attachment_image_src($attachment->ID, "column_gallery_1");
			$image_src_thumb_portrait = wp_get_attachment_image_src($attachment->ID, "column_gallery_1_portrait");

			$gallery_item_title = $attachment->post_title;
			if ($blueprint_gallery_thumb_orientation == "landscape")
			{
				$gallery_item_thumb = $image_src_thumb[0];
			} else {
				$gallery_item_thumb = $image_src_thumb_portrait[0];
			
			}
			$gallery_item_image = $image_src[0];
			$gallery_item_lightbox = get_post_meta($attachment->ID, "fw_lightbox_link", true);
			$gallery_item_link = get_post_meta($attachment->ID, "fw_external_link", true);
			
			if ($gallery_item_lightbox == "") : $gallery_item_lightbox = $gallery_item_image; endif;
			if ($gallery_item_link != "") $gallery_item_lightbox = $gallery_item_link;
			
			?>
			
			<div class="gallery_one_post <?php if ($column_count == 1) echo "column-last"; ?>">
			
			<a href="<?php echo $gallery_item_lightbox; ?>" <?php if ($gallery_item_link == "") : ?> rel="example" <?php endif; ?>><img src="<?php echo $gallery_item_thumb; ?>" alt="<?php echo $gallery_item_title; ?>" /></a>
			
			<div class="gallery_item_info"><?php echo $gallery_item_title; ?></div>

			<div class="clear"></div>
					
			</div>
			
			<?php
			
			$column_count++;
			
			if ($column_count == 1) {
				$column_count = 1;
				echo '<div class="clear"></div>';
			}
			
			endforeach;
			
			endwhile; endif; wp_reset_query();
			
			?>

			<script type="text/javascript">
			
			jQuery("a[rel='example']").colorbox({transition:"fade",height:"80%"});	
			<?php
			
			if ($blueprint_gallery_thumb_orientation == "landscape")
			{
				echo 'jQuery(".gallery_one_post").css("height", "450px");';
			} else {
				echo 'jQuery(".gallery_one_post").css("height", "800px");';
			
			}
			
			?>			
			
			</script>
					
			</div>
			
			<?php

			endif;
				
		break;
		
		case "galleria" :
		
			?>
			
			<div id="galleria_gallery">
			
			<?php

			if ( !post_password_required() ) :
		
			query_posts("post_type=gallery&p=$blueprint_page_gallery");

			if (have_posts()) : while (have_posts()) : the_post();
			
			$attachments = get_children(array('post_parent' => $post->ID,
			'post_status' => 'inherit',
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			'order' => 'DESC',
			'orderby' => 'menu_order ID'));
			
			foreach ($attachments as $att_id => $attachment) :
						
			$image_src = wp_get_attachment_image_src($attachment->ID, "full");
			
			echo '<img src="' . $image_src[0] . '" alt=""/>';
			
			endforeach;	
			
			?>
			
			</div>

	    	<script>
	            Galleria.loadTheme('<?php echo BP; ?>/galleria/themes/classic/galleria.classic.min.js');
	            jQuery("#galleria_gallery").galleria({
	                width: 680,
	                height: 500
	            });
	        </script>		
        	
        	<div style="margin-top: 20px;">
        	
        	<?php
        	
        	endwhile; endif; wp_reset_query();

 			endif;
        	
			if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; wp_reset_query();
        	
        	?>
        	
        	</div>
        	
        	<?php
        	
		break;
				
	endswitch;
	
	echo '<div class="clear"></div>';
		
	if (comments_open()) comments_template();
				
	?>		
		
	</div>

</div>

<!-- END #content -->

<?php 

get_footer(); 

?>