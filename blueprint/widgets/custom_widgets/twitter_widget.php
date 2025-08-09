<?php
class Twitter_Widget extends WP_Widget {
  public function __construct(){
    parent::__construct('twitter_widget', __('Twitter Feed','village'),
      ['description'=>__('Displays tweets via embed; configure handle.','village')]);
  }
  public function update($new,$old){
    $i = $old;
    $i['title']  = isset($new['title']) ? sanitize_text_field($new['title']) : '';
    $i['handle'] = isset($new['handle']) ? sanitize_text_field(ltrim($new['handle'],'@')) : '';
    return $i;
  }
  public function form($inst){
    $inst = wp_parse_args((array)$inst, ['title'=>'Twitter','handle'=>'']); ?>
    <p><label for="<?= esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title','village'); ?></label>
    <input class="widefat" id="<?= esc_attr($this->get_field_id('title')); ?>" name="<?= esc_attr($this->get_field_name('title')); ?>" value="<?= esc_attr($inst['title']); ?>"></p>
    <p><label for="<?= esc_attr($this->get_field_id('handle')); ?>"><?php esc_html_e('Twitter handle (without @)','village'); ?></label>
    <input class="widefat" id="<?= esc_attr($this->get_field_id('handle')); ?>" name="<?= esc_attr($this->get_field_name('handle')); ?>" value="<?= esc_attr($inst['handle']); ?>"></p>
    <?php
  }
  public function widget($args,$inst){
    echo $args['before_widget'];
    if(!empty($inst['title'])) echo $args['before_title'].esc_html($inst['title']).$args['after_title'];
    $handle = !empty($inst['handle']) ? $inst['handle'] : '';
    if($handle){
      // Use Twitter embed:
      echo '<a class="twitter-timeline" href="https://twitter.com/'.esc_attr($handle).'"></a>';
      // enqueue script properly in theme, or inline as last resort:
      echo '<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>';
    } else {
      echo '<p>'.esc_html__('Set a Twitter handle in this widget to display tweets.','village').'</p>';
    }
    echo $args['after_widget'];
  }
}