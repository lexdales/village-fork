<?php
class PPWT_Widget extends WP_Widget {

  public function __construct() {
    parent::__construct(
      'ppwt_widget',                                   // ID
      __('Popular Posts Widget', 'village'),           // Name
      array('description' => __('Displays popular posts', 'village'))
    );
  }

  public function update($new, $old) {
    $instance = $old;
    $instance['title']   = isset($new['title'])   ? sanitize_text_field($new['title'])   : '';
    $instance['limiter'] = isset($new['limiter']) ? intval($new['limiter'])              : 3;
    return $instance;
  }

  public function form($instance) {
    $defaults  = array('title' => 'Popular Posts', 'limiter' => 3);
    $instance  = wp_parse_args((array)$instance, $defaults);
    ?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
        <?php esc_html_e('Title', 'village'); ?>
      </label>
      <input class="widefat"
             id="<?php echo esc_attr($this->get_field_id('title')); ?>"
             name="<?php echo esc_attr($this->get_field_name('title')); ?>"
             type="text"
             value="<?php echo esc_attr($instance['title']); ?>">
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('limiter')); ?>">
        <?php esc_html_e('Number of posts', 'village'); ?>
      </label>
      <input class="widefat"
             id="<?php echo esc_attr($this->get_field_id('limiter')); ?>"
             name="<?php echo esc_attr($this->get_field_name('limiter')); ?>"
             type="number" min="1" step="1"
             value="<?php echo esc_attr($instance['limiter']); ?>">
    </p>
    <?php
  }

  public function widget($args, $instance) {
    echo $args['before_widget'];

    $title = ! empty($instance['title']) ? $instance['title'] : '';
    if ($title) {
      echo $args['before_title'] . esc_html($title) . $args['after_title'];
    }

    $count = isset($instance['limiter']) ? intval($instance['limiter']) : 3;

    // Example "popular" query by comment count (adjust if your theme used a different metric)
    $q = new WP_Query(array(
      'posts_per_page' => $count,
      'orderby'        => 'comment_count',
      'ignore_sticky_posts' => true,
    ));

    if ($q->have_posts()):
      echo '<div class="widget popular_posts">';
      while ($q->have_posts()): $q->the_post();
        $thumb = get_the_post_thumbnail_url(get_the_ID(), 'sidebar_thumb');
        ?>
        <div class="posts_item">
          <?php if ($thumb): ?>
            <a href="<?php the_permalink(); ?>">
              <img src="<?php echo esc_url($thumb); ?>" alt="">
            </a>
          <?php endif; ?>
          <a class="widget_posts_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          <span class="widget_posts_info_meta">
            <ul>
              <li class="widget_posts_date"><?php the_time('M j, Y'); ?></li>
              <li><?php comments_popup_link(__('No Comments','village'), __('One Comment','village'), '% ' . __('Comments','village')); ?></li>
            </ul>
          </span>
        </div>
        <?php
      endwhile;
      echo '</div>';
    endif;

    wp_reset_postdata();
    echo $args['after_widget'];
  }
}