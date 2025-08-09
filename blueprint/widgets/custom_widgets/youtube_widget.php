<?php 

class PYoutube_Widget extends WP_Widget {

function PYoutube_Widget() {

	$widget_ops = array ('description' => 'Display a youtube video.');
	$control_ops = array( 'width' => 300, 'height' => 400);
	
	parent::WP_Widget(false, 'Village - Youtube Video Widget', $widget_ops, $control_ops);
	
}

function form($instance) {

$defaults = array( 'title' => 'Youtube Widget', 'youtube_id' => '', 'youtube_width' => '230', 'youtube_height' => '170', 'youtube_desc' => '');
                       
$instance = wp_parse_args( (array) $instance, $defaults ); 

?>

<div style="padding-bottom: 15px;">

<h3>Title</h3>

<input type="text" style="width: 100%;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title'] ?>" />

<h3>Youtube Video ID</h3>

<input type="text" style="width: 100%;" id="<?php echo $this->get_field_id('youtube_id'); ?>" name="<?php echo $this->get_field_name('youtube_id'); ?>" value="<?php echo $instance['youtube_id']; ?>" />

<h3>Youtube Video Width</h3>

<input type="text" style="width: 100%;" id="<?php echo $this->get_field_id('youtube_width'); ?>" name="<?php echo $this->get_field_name('youtube_width'); ?>" value="<?php echo $instance['youtube_width']; ?>" />

<h3>Youtube Video Height</h3>

<input type="text" style="width: 100%;" id="<?php echo $this->get_field_id('youtube_height'); ?>" name="<?php echo $this->get_field_name('youtube_height'); ?>" value="<?php echo $instance['youtube_height']; ?>" />

<h3>Description (Optional)</h3>

<input type="text" style="width: 100%;" id="<?php echo $this->get_field_id('youtube_desc'); ?>" name="<?php echo $this->get_field_name('youtube_desc'); ?>" value="<?php echo $instance['youtube_desc']; ?>" />

</div>

<?php
		
}

function update($new_instance, $old_instance) {
		
	$instance = $old_instance;

	$instance['title'] =  $new_instance['title'];
	$instance['youtube_id'] =  $new_instance['youtube_id'];
	$instance['youtube_width'] =  $new_instance['youtube_width'];
	$instance['youtube_height'] =  $new_instance['youtube_height'];
	$instance['youtube_desc'] =  $new_instance['youtube_desc'];
	
	return $instance;

}
	
function widget($args, $instance) {

extract($args);

?>

<div class="widget youtube">

<h2><?php echo $instance['title']; ?></h2>

<object width="<?php echo $instance['youtube_width']; ?>" height="<?php echo $instance['youtube_height']; ?>"><param name="movie" value="http://www.youtube.com/v/a6GCy_lKYo8?fs=1&amp;hl=en_US"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/<?php echo $instance['youtube_id']; ?>?fs=1&amp;hl=en_US" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="<?php echo $instance['youtube_width']; ?>" height="<?php echo $instance['youtube_height']; ?>"></embed></object>

<?php if ($instance['youtube_desc'] != "") : ?>

<div class="classic_desc">

<?php echo $instance['youtube_desc']; ?>

</div>

<?php endif; ?>

</div>

<?php

	}
}

register_widget('PYoutube_Widget');

?>