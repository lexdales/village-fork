<?php 

class FLK_Widget extends WP_Widget {

function FLK_Widget() {

	$widget_ops = array ('description' => 'Display a flickr feed.');
	$control_ops = array( 'width' => 300, 'height' => 400);
	
	parent::WP_Widget(false, 'Village - Flickr Widget', $widget_ops, $control_ops);
	
}

function form($instance) {

$defaults = array( 'title' => 'Flickr Widget' );
                       
$instance = wp_parse_args( (array) $instance, $defaults ); 

?>

<div style="padding-bottom: 15px;">

<h3>Title</h3>

<input type="text" style="width: 100%;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title'] ?>" />

<h3>Amount Of Photos</h3>

<input type="text" style="width: 100%;" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" value="<?php echo $instance['count']; ?>" />

<h3>Flickr ID - <a target="_blank" href="http://idgettr.com/">Use This</a></h3>

<input type="text" style="width: 100%;" id="<?php echo $this->get_field_id('flickr_id'); ?>" name="<?php echo $this->get_field_name('flickr_id'); ?>" value="<?php echo $instance['flickr_id']; ?>" />

<h3>Flickr User Or Group</h3>

<select style="width: 100%;" id="<?php echo $this->get_field_id('flickr_type'); ?>" name="<?php echo $this->get_field_name('flickr_type'); ?>">

<option value="user" <?php if ($instance['flickr_type'] == "user") echo "selected";?>>User</option>
<option value="group" <?php if ($instance['flickr_type'] == "group") echo "selected";?>>Group</option>

</select>

<h3>Random Or Latest Photos</h3>

<select style="width: 100%;" id="<?php echo $this->get_field_id('flickr_display'); ?>" name="<?php echo $this->get_field_name('flickr_display'); ?>">

<option value="latest" <?php if ($instance['flickr_display'] == "latest") echo "selected";?>>Latest</option>
<option value="random" <?php if ($instance['flickr_display'] == "random") echo "selected";?>>Random</option>

</select>

</div>

<?php
		
}

function update($new_instance, $old_instance) {
		
	$instance = $old_instance;

	$instance['title'] =  $new_instance['title'];
	$instance['count'] =  $new_instance['count'];
	$instance['flickr_id'] =  $new_instance['flickr_id'];
	$instance['flickr_type'] =  $new_instance['flickr_type'];
	$instance['flickr_display'] =  $new_instance['flickr_display'];
	
	return $instance;

}
	
function widget($args, $instance) {

extract($args);

?>

<div class="widget flickr">

<h2><?php echo $instance['title']; ?></h2>

	<div id="flickr_badge_wrapper">
	
		<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $instance['count']; ?>&amp;display=<?php echo $instance['flickr_display']; ?>&amp;size=s&amp;layout=x&amp;source=<?php echo $instance['flickr_type']; ?>&amp;<?php echo $instance['flickr_type']; ?>=<?php echo $instance['flickr_id']; ?>"></script>
		
		<div class="clear"></div>
		
	</div>


</div>


<?php

	}
}

register_widget('FLK_Widget');

?>