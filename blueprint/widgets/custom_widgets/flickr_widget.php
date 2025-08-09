<?php
class Flickr_Widget extends WP_Widget {
  public function __construct(){
    parent::__construct('flickr_widget', __('Flickr Photos','village'),
      ['description'=>__('Displays Flickr photos (requires API settings)','village')]);
  }
  public function update($new,$old){
    $i = $old;
    $i['title'] = isset($new['title']) ? sanitize_text_field($new['title']) : '';
    $i['user']  = isset($new['user'])  ? sanitize_text_field($new['user'])  : '';
    $i['count'] = isset($new['count']) ? intval($new['count']) : 6;
    return $i;
  }
  public function form($inst){
    $inst = wp_parse_args((array)$inst, ['title'=>'Flickr','user'=>'','count'=>6]); ?>
    <p><label for="<?= esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title','village'); ?></label>
    <input class="widefat" id="<?= esc_attr($this->get_field_id('title')); ?>" name="<?= esc_attr($this->get_field_name('title')); ?>" value="<?= esc_attr($inst['title']); ?>"></p>
    <p><label for="<?= esc_attr($this->get_field_id('user')); ?>"><?php esc_html_e('Flickr User ID','village'); ?></label>
    <input class="widefat" id="<?= esc_attr($this->get_field_id('user')); ?>" name="<?= esc_attr($this->get_field_name('user')); ?>" value="<?= esc_attr($inst['user']); ?>"></p>
    <p><label for="<?= esc_attr($this->get_field_id('count')); ?>"><?php esc_html_e('Number of photos','village'); ?></label>
    <input class="widefat" type="number" min="1" step="1" id="<?= esc_attr($this->get_field_id('count')); ?>" name="<?= esc_attr($this->get_field_name('count')); ?>" value="<?= esc_attr($inst['count']); ?>"></p>
    <?php
  }
  public function widget($args,$inst){
    echo $args['before_widget'];
    if(!empty($inst['title'])) echo $args['before_title'].esc_html($inst['title']).$args['after_title'];

    // If the old JS embed still exists, enqueue it properly instead of echoing inline script.
    // Minimal safe fallback:
    echo '<p>'.esc_html__('Flickr feed not configured. Add your Flickr User ID in the widget settings.','village').'</p>';

    echo $args['after_widget'];
  }
}