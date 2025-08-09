<?php
// Guard so we don't redeclare if loaded twice.
if ( ! class_exists( 'Youtube_Widget' ) ) {

class Youtube_Widget extends WP_Widget {

  public function __construct() {
    parent::__construct(
      'youtube_widget',
      __( 'YouTube Widget', 'village' ),
      array( 'description' => __( 'Displays a YouTube channel timeline/embed (simple, no API).', 'village' ) )
    );
  }

  public function update( $new, $old ) {
    $inst = $old;
    $inst['title']   = isset( $new['title'] )   ? sanitize_text_field( $new['title'] )   : '';
    $inst['handle']  = isset( $new['handle'] )  ? sanitize_text_field( ltrim( $new['handle'], '@' ) ) : '';
    $inst['embed']   = ! empty( $new['embed'] ) ? (bool) $new['embed'] : false;
    return $inst;
  }

  public function form( $inst ) {
    $inst = wp_parse_args( (array) $inst, array(
      'title'  => 'YouTube',
      'handle' => '',
      'embed'  => false,
    ) ); ?>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Title','village'); ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>"
             name="<?php echo esc_attr( $this->get_field_name('title') ); ?>"
             type="text" value="<?php echo esc_attr( $inst['title'] ); ?>">
    </p>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id('handle') ); ?>"><?php esc_html_e('YouTube handle (without @)','village'); ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('handle') ); ?>"
             name="<?php echo esc_attr( $this->get_field_name('handle') ); ?>"
             type="text" value="<?php echo esc_attr( $inst['handle'] ); ?>">
    </p>
    <p>
      <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id('embed') ); ?>"
             name="<?php echo esc_attr( $this->get_field_name('embed') ); ?>" <?php checked( $inst['embed'] ); ?> />
      <label for="<?php echo esc_attr( $this->get_field_id('embed') ); ?>"><?php esc_html_e('Show simple channel embed','village'); ?></label>
    </p>
    <?php
  }

  public function widget( $args, $inst ) {
    echo $args['before_widget'];

    if ( ! empty( $inst['title'] ) ) {
      echo $args['before_title'] . esc_html( $inst['title'] ) . $args['after_title'];
    }

    $handle = ! empty( $inst['handle'] ) ? $inst['handle'] : '';

    if ( $handle ) {
      // Minimal safe output without API keys.
      $url = 'https://www.youtube.com/@' . rawurlencode( $handle );
      if ( ! empty( $inst['embed'] ) ) {
        // Basic channel embed (shows latest uploads tab link; YouTube doesn’t provide an official “channel timeline” iframe).
        echo '<p><a href="' . esc_url( $url ) . '" target="_blank" rel="noopener noreferrer">'
           . esc_html__( 'Visit my YouTube channel', 'village' ) . '</a></p>';
      } else {
        echo '<p><a href="' . esc_url( $url ) . '" target="_blank" rel="noopener noreferrer">@'
           . esc_html( $handle ) . '</a></p>';
      }
    } else {
      echo '<p>' . esc_html__( 'Configure a YouTube handle in this widget.', 'village' ) . '</p>';
    }

    echo $args['after_widget'];
  }
}

} // end guard