<?php
class LPWT_Widget extends WP_Widget {
  public function __construct() {
    parent::__construct(
      'lpwt_widget',
      __('Latest Portfolio Posts','village'),
      ['description'=>__('Shows latest portfolio items','village')]
    );
  }
  public function update($new,$old){
    $inst = $old;
    $inst['title']   = isset($new['title']) ? sanitize_text_field($new['title']) : '';
    $inst['limiter'] = isset($new['limiter']) ? intval($new['limiter']) : 6;
    return $inst;
  }
  public function form($inst){
    $inst = wp_parse_args((array)$inst, ['title'=>'Latest Work','limiter'=>6]); ?>
    <p><label for="<?= esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title','village'); ?></label>
    <input class="widefat" id="<?= esc_attr($this->get_field_id('title')); ?>" name="<?= esc_attr($this->get_field_name('title')); ?>" value="<?= esc_attr($inst['title']); ?>"></p>
    <p><label for="<?= esc_attr($this->get_field_id('limiter')); ?>"><?php esc_html_e('Number of items','village'); ?></label>
    <input class="widefat" type="number" min="1" step="1" id="<?= esc_attr($this->get_field_id('limiter')); ?>" name="<?= esc_attr($this->get_field_name('limiter')); ?>" value="<?= esc_attr($inst['limiter']); ?>"></p>
    <?php
  }
  public function widget($args,$inst){
    echo $args['before_widget'];
    if(!empty($inst['title'])) echo $args['before_title'].esc_html($inst['title']).$args['after_title'];
    $count = isset($inst['limiter']) ? intval($inst['limiter']) : 6;

    // adjust post_type/taxonomy to whatever “portfolio” is in this theme:
    $q = new WP_Query([
      'post_type' => 'portfolio',        // if your theme used a CPT; otherwise adjust
      'posts_per_page' => $count,
      'ignore_sticky_posts' => true,
    ]);
    if($q->have_posts()){
      echo '<div class="widget latest_portfolio">';
      while($q->have_posts()){ $q->the_post();
        $thumb = get_the_post_thumbnail_url(get_the_ID(),'sidebar_thumb');
        echo '<div class="posts_item">';
        if($thumb) echo '<a href="'.esc_url(get_permalink()).'"><img src="'.esc_url($thumb).'" alt=""></a>';
        echo '<a class="widget_posts_title" href="'.esc_url(get_permalink()).'">'.get_the_title().'</a>';
        echo '</div>';
      }
      echo '</div>';
    }
    wp_reset_postdata();
    echo $args['after_widget'];
  }
}