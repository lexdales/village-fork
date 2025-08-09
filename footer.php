<?php

##################################################
#### INCLUDE WP FOOTER
##################################################

wp_footer();

##################################################
#### BACKGROUND OPTIONS
##################################################

wp_reset_query();

if (!is_page_template('slideshow_floating.php') && !is_page_template('slideshow_floating_portrait.php') && !is_page_template('slideshow_portrait.php') && !is_page_template('slideshow_no_thumbs.php') && !is_page_template('slideshow.php') && !is_page_template('wall.php') && !is_page_template('wall_menu.php')) :

	if (is_page() || is_single() || is_home() || is_front_page()) :		
	
		$blueprint_bg_select = get_post_meta($post->ID, "blueprint_background_select", 28899);
		
			if ($blueprint_bg_select != "") :
			
			query_posts("post_type=background&name=$blueprint_bg_select");
			
			if (have_posts()) : while (have_posts()) : the_post();
			
			$image_id = get_post_thumbnail_id($post->ID);  
			$image_url = wp_get_attachment_image_src($image_id, 'full');	
			
			$blueprint_bg_slideshow = get_post_meta($post->ID, "blueprint_slider_background_select", 32138);
			$blueprint_bg_youtube = get_post_meta($post->ID, "blueprint_background_youtube", true);
			$blueprint_bg_vimeo = get_post_meta($post->ID, "blueprint_background_vimeo", true);
			$blueprint_bg_type = get_post_meta($post->ID, "blueprint_background_type", true);
			$blueprint_bg_gmap_long = get_post_meta($post->ID, "blueprint_background_gmap_long", true);
			$blueprint_bg_gmap_lat = get_post_meta($post->ID, "blueprint_background_gmap_lat", true);
			$blueprint_bg_gmap_zoom = get_post_meta($post->ID, "blueprint_background_gmap_zoom", true);
			$blueprint_bg_gmap_map = get_post_meta($post->ID, "blueprint_background_gmap_map", true);
			
			endwhile; endif;
			
			wp_reset_query();
			
			if ($blueprint_bg_type == "image") :
			
			?>
			
			<div id="thumbs_hide"><a href="<?php echo $image_url[0]; ?>"></a></div>
			
			<?php
			
			endif;
			
			if ($blueprint_bg_type == "vimeo") :
			
			?>
	
			<iframe id="vimeo_background" src="http://player.vimeo.com/video/<?php echo $blueprint_bg_vimeo; ?>?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=1" width="680" height="400" frameborder="0"></iframe>
			
			<?php
			
			endif;
			
			if ($blueprint_bg_type == "youtube") :
			
			?>
				
			<iframe title="YouTube video player" id="youtube_background" allowfullscreen src="http://www.youtube.com/embed/<?php echo $blueprint_bg_youtube; ?>?hd=1&wmode=opaque&autoplay=1" frameborder="0"></iframe>
			
			<?php
			
			endif;
			
			if ($blueprint_bg_type == "slideshow") :
			
			echo '<div id="thumbs_hide">';
			
			query_posts("post_type=slider&slider-categories=$blueprint_bg_slideshow&order=ASC&orderby=meta_value_num&meta_key=p_slider_item_order&posts_per_page=6000");
			
			if (have_posts()) : while (have_posts()) : the_post();
			
			$image_id = get_post_thumbnail_id($post->ID);  
			$image_url = wp_get_attachment_image_src($image_id, 'full');	
			
			?>
			
			<a href="<?php echo $image_url[0]; ?>"></a>
			
			<?php 
			
			endwhile; endif;
			
			wp_reset_query();

			echo '</div>';
				
			endif;

			if ($blueprint_bg_type == "googlemap") :
			
			?>
	
			<script type="text/javascript"
			    src="http://maps.googleapis.com/maps/api/js?sensor=true">
			</script>
			<script type="text/javascript">
			  function initialize() {
			    var latlng = new google.maps.LatLng(<?php echo $blueprint_bg_gmap_long; ?>, <?php echo $blueprint_bg_gmap_lat; ?>);
			    var myOptions = {
			      zoom: <?php echo $blueprint_bg_gmap_zoom; ?>,
			      center: latlng,
			      mapTypeId: google.maps.MapTypeId.<?php echo $blueprint_bg_gmap_map; ?>
			    };
			    var map = new google.maps.Map(document.getElementById("map_canvas"),
			        myOptions);
			  }
			
			</script>
	
			<div style="position: fixed; top: 0px; left: 0px; width:100%; height:100%;"><div id="map_canvas" style="width:100%; height:100%; position: absolute; top: 0px; left: 0px; overflow: hidden"></div></div>
			<script type="text/javascript">jQuery(window).load(function () {initialize();});</script>

			<?php
			
			endif;
		
		endif;
	
	endif;
	
	if (is_author() || is_category() || is_tag() || is_archive()) : 
	
		$archive_bg_select = of_get_option('archive_background');

		query_posts("post_type=background&p=$archive_bg_select");
				
		if (have_posts()) : while (have_posts()) : the_post();
		
		$image_id = get_post_thumbnail_id($post->ID);  
		$image_url = wp_get_attachment_image_src($image_id, 'full');	
		
		$blueprint_bg_slideshow = get_post_meta($post->ID, "blueprint_slider_background_select", 32138);
		$blueprint_bg_youtube = get_post_meta($post->ID, "blueprint_background_youtube", true);
		$blueprint_bg_vimeo = get_post_meta($post->ID, "blueprint_background_vimeo", true);
		$blueprint_bg_type = get_post_meta($post->ID, "blueprint_background_type", true);
		
		endwhile; endif;
		
		wp_reset_query();
		
		if ($blueprint_bg_type == "image") :
		
		?>
		
		<div id="thumbs_hide"><a href="<?php echo $image_url[0]; ?>"></a></div>
		
		<?php
		
		endif;
		
		if ($blueprint_bg_type == "vimeo") :
		
		?>
	
		<iframe id="vimeo_background" src="http://player.vimeo.com/video/<?php echo $blueprint_bg_vimeo; ?>?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=1" width="680" height="400" frameborder="0"></iframe>
		
		<?php
		
		endif;
		
		if ($blueprint_bg_type == "youtube") :
		
		?>
			
		<iframe title="YouTube video player" id="youtube_background" allowfullscreen src="http://www.youtube.com/embed/<?php echo $blueprint_bg_youtube; ?>?hd=1&wmode=opaque&autoplay=1" frameborder="0"></iframe>
		
		<?php
		
		endif;
		
		if ($blueprint_bg_type == "slideshow") :
		
		echo '<div id="thumbs_hide">';
		
		query_posts("post_type=slider&slider-categories=$blueprint_bg_slideshow&order=ASC&orderby=meta_value_num&meta_key=p_slider_item_order&posts_per_page=6000");
		
		if (have_posts()) : while (have_posts()) : the_post();
		
		$image_id = get_post_thumbnail_id($post->ID);  
		$image_url = wp_get_attachment_image_src($image_id, 'full');	
		
		?>
		
		<a href="<?php echo $image_url[0]; ?>"></a>
		
		<?php 
		
		endwhile; endif;
		
		wp_reset_query();
	
		echo '</div>';
			
		endif;		

		if ($blueprint_bg_type == "googlemap") :
		
		?>

		<script type="text/javascript"
		    src="http://maps.googleapis.com/maps/api/js?sensor=true">
		</script>
		<script type="text/javascript">
		  function initialize() {
		    var latlng = new google.maps.LatLng(<?php echo $blueprint_bg_gmap_long; ?>, <?php echo $blueprint_bg_gmap_lat; ?>);
		    var myOptions = {
		      zoom: <?php echo $blueprint_bg_gmap_zoom; ?>,
		      center: latlng,
		      mapTypeId: google.maps.MapTypeId.<?php echo $blueprint_bg_gmap_map; ?>
		    };
		    var map = new google.maps.Map(document.getElementById("map_canvas"),
		        myOptions);
		  }
		
		</script>

		<div style="position: fixed; top: 0px; left: 0px; width:100%; height:100%;"><div id="map_canvas" style="width:100%; height:100%; position: absolute; top: 0px; left: 0px; overflow: hidden"></div></div>
		<script type="text/javascript">jQuery(window).load(function () {initialize();});</script>

		<?php
		
		endif;
				
	endif;
	
	if (is_search()) :
	
		$search_bg_select = of_get_option('search_background');

		query_posts("post_type=background&p=$search_bg_select");
				
		if (have_posts()) : while (have_posts()) : the_post();
		
		$image_id = get_post_thumbnail_id($post->ID);  
		$image_url = wp_get_attachment_image_src($image_id, 'full');	
		
		$blueprint_bg_slideshow = get_post_meta($post->ID, "blueprint_slider_background_select", 32138);
		$blueprint_bg_youtube = get_post_meta($post->ID, "blueprint_background_youtube", true);
		$blueprint_bg_vimeo = get_post_meta($post->ID, "blueprint_background_vimeo", true);
		$blueprint_bg_type = get_post_meta($post->ID, "blueprint_background_type", true);
		
		endwhile; endif;
		
		wp_reset_query();
		
		if ($blueprint_bg_type == "image") :
		
		?>
		
		<div id="thumbs_hide"><a href="<?php echo $image_url[0]; ?>"></a></div>
		
		<?php
		
		endif;
		
		if ($blueprint_bg_type == "vimeo") :
		
		?>
	
		<iframe id="vimeo_background" src="http://player.vimeo.com/video/<?php echo $blueprint_bg_vimeo; ?>?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=1" width="680" height="400" frameborder="0"></iframe>
		
		<?php
		
		endif;
		
		if ($blueprint_bg_type == "youtube") :
		
		?>
			
		<iframe title="YouTube video player" id="youtube_background" allowfullscreen src="http://www.youtube.com/embed/<?php echo $blueprint_bg_youtube; ?>?hd=1&wmode=opaque&autoplay=1" frameborder="0"></iframe>
		
		<?php
		
		endif;
		
		if ($blueprint_bg_type == "slideshow") :
		
		echo '<div id="thumbs_hide">';
		
		query_posts("post_type=slider&slider-categories=$blueprint_bg_slideshow&order=ASC&orderby=meta_value_num&meta_key=p_slider_item_order&posts_per_page=6000");
		
		if (have_posts()) : while (have_posts()) : the_post();
		
		$image_id = get_post_thumbnail_id($post->ID);  
		$image_url = wp_get_attachment_image_src($image_id, 'full');	
		
		?>
		
		<a href="<?php echo $image_url[0]; ?>"></a>
		
		<?php 
		
		endwhile; endif;
		
		wp_reset_query();
	
		echo '</div>';
			
		endif;		
		
		if ($blueprint_bg_type == "googlemap") :
		
		?>

		<script type="text/javascript"
		    src="http://maps.googleapis.com/maps/api/js?sensor=true">
		</script>
		<script type="text/javascript">
		  function initialize() {
		    var latlng = new google.maps.LatLng(<?php echo $blueprint_bg_gmap_long; ?>, <?php echo $blueprint_bg_gmap_lat; ?>);
		    var myOptions = {
		      zoom: <?php echo $blueprint_bg_gmap_zoom; ?>,
		      center: latlng,
		      mapTypeId: google.maps.MapTypeId.<?php echo $blueprint_bg_gmap_map; ?>
		    };
		    var map = new google.maps.Map(document.getElementById("map_canvas"),
		        myOptions);
		  }
		
		</script>

		<div style="position: fixed; top: 0px; left: 0px; width:100%; height:100%;"><div id="map_canvas" style="width:100%; height:100%; position: absolute; top: 0px; left: 0px; overflow: hidden"></div></div>
		<script type="text/javascript">jQuery(window).load(function () {initialize();});</script>

		<?php
		
		endif;
	
	endif;

	if (is_404()) :
	
		$search_bg_select = of_get_option('404_background');

		query_posts("post_type=background&p=$search_bg_select");
				
		if (have_posts()) : while (have_posts()) : the_post();
		
		$image_id = get_post_thumbnail_id($post->ID);  
		$image_url = wp_get_attachment_image_src($image_id, 'full');	
		
		$blueprint_bg_slideshow = get_post_meta($post->ID, "blueprint_slider_background_select", 32138);
		$blueprint_bg_youtube = get_post_meta($post->ID, "blueprint_background_youtube", true);
		$blueprint_bg_vimeo = get_post_meta($post->ID, "blueprint_background_vimeo", true);
		$blueprint_bg_type = get_post_meta($post->ID, "blueprint_background_type", true);
		
		endwhile; endif;
		
		wp_reset_query();
		
		if ($blueprint_bg_type == "image") :
		
		?>
		
		<div id="thumbs_hide"><a href="<?php echo $image_url[0]; ?>"></a></div>
		
		<?php
		
		endif;
		
		if ($blueprint_bg_type == "vimeo") :
		
		?>
	
		<iframe id="vimeo_background" src="http://player.vimeo.com/video/<?php echo $blueprint_bg_vimeo; ?>?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=1" width="680" height="400" frameborder="0"></iframe>
		
		<?php
		
		endif;
		
		if ($blueprint_bg_type == "youtube") :
		
		?>
			
		<iframe title="YouTube video player" id="youtube_background" allowfullscreen src="http://www.youtube.com/embed/<?php echo $blueprint_bg_youtube; ?>?hd=1&wmode=opaque&autoplay=1" frameborder="0"></iframe>
		
		<?php
		
		endif;
		
		if ($blueprint_bg_type == "slideshow") :
		
		echo '<div id="thumbs_hide">';
		
		query_posts("post_type=slider&slider-categories=$blueprint_bg_slideshow&order=ASC&orderby=meta_value_num&meta_key=p_slider_item_order&posts_per_page=6000");
		
		if (have_posts()) : while (have_posts()) : the_post();
		
		$image_id = get_post_thumbnail_id($post->ID);  
		$image_url = wp_get_attachment_image_src($image_id, 'full');	
		
		?>
		
		<a href="<?php echo $image_url[0]; ?>"></a>
		
		<?php 
		
		endwhile; endif;
		
		wp_reset_query();
	
		echo '</div>';
			
		endif;			
	
		if ($blueprint_bg_type == "googlemap") :
		
		?>

		<script type="text/javascript"
		    src="http://maps.googleapis.com/maps/api/js?sensor=true">
		</script>
		<script type="text/javascript">
		  function initialize() {
		    var latlng = new google.maps.LatLng(<?php echo $blueprint_bg_gmap_long; ?>, <?php echo $blueprint_bg_gmap_lat; ?>);
		    var myOptions = {
		      zoom: <?php echo $blueprint_bg_gmap_zoom; ?>,
		      center: latlng,
		      mapTypeId: google.maps.MapTypeId.<?php echo $blueprint_bg_gmap_map; ?>
		    };
		    var map = new google.maps.Map(document.getElementById("map_canvas"),
		        myOptions);
		  }
		
		</script>

		<div style="position: fixed; top: 0px; left: 0px; width:100%; height:100%;"><div id="map_canvas" style="width:100%; height:100%; position: absolute; top: 0px; left: 0px; overflow: hidden"></div></div>
		<script type="text/javascript">jQuery(window).load(function () {initialize();});</script>

		<?php
		
		endif;	
	
	endif;

endif;

?>

<script type="text/javascript">

jQuery("a[rel^='prettyPhoto']").prettyPhoto();

</script>

</body>

</html>