<?php 

class LP_Widget extends WP_Widget {

function LP_Widget() {
	
	$widget_ops = array ('description' => 'Display latest portfolio items with thumbnails');
	$control_ops = array( 'width' => 300, 'height' => 400);
	
	parent::WP_Widget(false, 'Village - Recent Portfolio Items', $widget_ops, $control_ops);
	
}

function update($new_instance, $old_instance) {
		
	$instance = $old_instance;

	$instance['title'] =  $new_instance['title'];
	$instance['limiter'] =  $new_instance['limiter'];
	
	return $instance;

}

function form($instance) {

$defaults = array( 'title' => 'Recent Portfolio Items', 'limiter' => '3');
                       
$instance = wp_parse_args( (array) $instance, $defaults ); 

?>

<div style="padding-bottom: 15px;">

<h3>Title</h3>

<input type="text" style="width: 100%;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title'] ?>" />

<h3>Number of Items</h3>

<input type="text" style="width: 100%;" id="<?php echo $this->get_field_id('limiter'); ?>" name="<?php echo $this->get_field_name('limiter'); ?>" value="<?php echo $instance['limiter']; ?>" />

</div>

<?php
		
}
	
function widget($args, $instance) {

extract($args);

?>

<div class="widget latest_posts">

<h2><?php echo $instance['title']; ?></h2>

<?php 

$post_count = $instance['limiter'];

query_posts("posts_per_page=$post_count&post_type=portfolio");

if (have_posts()) : while (have_posts()) : the_post();

$image_id = get_post_thumbnail_id();  
$image_url = wp_get_attachment_image_src($image_id, 'sidebar_thumb');

?>

<div class="posts_item">

<div class="widget_posts_item_image">

<?php 

if (has_post_thumbnail()) {

?>

<a href="<?php the_permalink(); ?>"><img src="<?php echo $image_url[0]; ?>" alt="" /></a>

<?php

} 

?>

</div>

<div class="widget_posts_info">

<a class="widget_posts_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

<span class="widget_posts_info_meta">

<ul>

<li class="widget_posts_date"><?php the_time('M j, Y'); ?></li>
<li><?php comments_popup_link(__("No Comments","village"), __("One Comment","village"), '% ' . __("Comments","village"), '', __("Comments Closed","village")) ?></li>

</ul>

</span>

</div>

<div class="clear"></div>

</div>

<?php

endwhile; endif;

wp_reset_query();

?>

</div>

<?php

	}
}

register_widget('LP_Widget');

?>