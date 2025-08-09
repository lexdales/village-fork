<?php 

class PVimeo_Widget extends WP_Widget {

function PVimeo_Widget() {

	$widget_ops = array ('description' => 'Display a vimeo video.');
	$control_ops = array( 'width' => 300, 'height' => 400);
	
	parent::WP_Widget(false, 'Village - Vimeo Video Widget', $widget_ops, $control_ops);
	
}

function form($instance) {

$defaults = array( 'title' => 'Vimeo Widget', 'vimeo_id' => '', 'vimeo_width' => '230', 'vimeo_height' => '170');
                       
$instance = wp_parse_args( (array) $instance, $defaults ); 

?>

<div style="padding-bottom: 15px;">

<h3>Title</h3>

<input type="text" style="width: 100%;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title'] ?>" />

<h3>Vimeo Video ID</h3>

<input type="text" style="width: 100%;" id="<?php echo $this->get_field_id('vimeo_id'); ?>" name="<?php echo $this->get_field_name('vimeo_id'); ?>" value="<?php echo $instance['vimeo_id']; ?>" />

<h3>Vimeo Video Width</h3>

<input type="text" style="width: 100%;" id="<?php echo $this->get_field_id('vimeo_width'); ?>" name="<?php echo $this->get_field_name('vimeo_width'); ?>" value="<?php echo $instance['vimeo_width']; ?>" />

<h3>Vimeo Video Height</h3>

<input type="text" style="width: 100%;" id="<?php echo $this->get_field_id('vimeo_height'); ?>" name="<?php echo $this->get_field_name('vimeo_height'); ?>" value="<?php echo $instance['vimeo_height']; ?>" />

<h3>Description (Optional)</h3>

<input type="text" style="width: 100%;" id="<?php echo $this->get_field_id('vimeo_desc'); ?>" name="<?php echo $this->get_field_name('vimeo_desc'); ?>" value="<?php echo $instance['vimeo_desc']; ?>" />

</div>

<?php
		
}

function update($new_instance, $old_instance) {
		
	$instance = $old_instance;

	$instance['title'] =  $new_instance['title'];
	$instance['vimeo_id'] =  $new_instance['vimeo_id'];
	$instance['vimeo_width'] =  $new_instance['vimeo_width'];
	$instance['vimeo_height'] =  $new_instance['vimeo_height'];
	$instance['vimeo_desc'] =  $new_instance['vimeo_desc'];
	
	return $instance;

}
	
function widget($args, $instance) {

extract($args);

?>

<div class="widget vimeo">

<h2><?php echo $instance['title']; ?></h2>

<iframe src="http://player.vimeo.com/video/<?php echo $instance['vimeo_id']; ?>?title=0&amp;byline=0&amp;portrait=0" width="<?php echo $instance['vimeo_width']; ?>" height="<?php echo $instance['vimeo_height']; ?>" frameborder="0"></iframe>

<?php if ($instance['vimeo_desc'] != "") : ?>

<div class="classic_desc">

<?php echo $instance['vimeo_desc']; ?>

</div>

<?php endif; ?>

</div>


<?php

	}
}

register_widget('PVimeo_Widget');

?>