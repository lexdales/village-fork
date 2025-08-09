<?php 

class PTW_Widget extends WP_Widget {

function PTW_Widget() {
	
	$widget_ops = array ('description' => 'Display a twitter feed.');
	$control_ops = array( 'width' => 300, 'height' => 400);
	
	parent::WP_Widget(false, 'Village - Twitter Widget', $widget_ops, $control_ops);
	
}

function update($new_instance, $old_instance) {
		
	$instance = $old_instance;

	$instance['title'] =  $new_instance['title'];
	$instance['username'] =  $new_instance['username'];
	$instance['tweets'] =  $new_instance['tweets'];
	
	return $instance;

}

function form($instance) {

$defaults = array( 'title' => 'Twitter Widget', 'username' => 'dabluephoenix', 'tweets' => '3');
                       
$instance = wp_parse_args( (array) $instance, $defaults ); 

?>

<div style="padding-bottom: 15px;">

<h3>Title</h3>

<input type="text" style="width: 100%;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title'] ?>" />

<h3>Twitter Username</h3>

<input type="text" style="width: 100%;" id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>" value="<?php echo $instance['username']; ?>" />

<h3>Number Of Tweets</h3>

<input type="text" style="width: 100%;" id="<?php echo $this->get_field_id('tweets'); ?>" name="<?php echo $this->get_field_name('tweets'); ?>" value="<?php echo $instance['tweets']; ?>" />

</div>

<?php
		
}
	
function widget($args, $instance) {

extract($args);

?>

<div class="widget twitter">

<h2><?php echo $instance['title']; ?></h2>

<ul id="twitter_update_list"><li>Twitter feed loading</li></ul>

<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/<?php echo $instance["username"]; ?>.json?callback=twitterCallback2&count=<?php echo $instance["tweets"]; ?>"></script>

</div>

<?php

}

}

register_widget('PTW_Widget');

?>