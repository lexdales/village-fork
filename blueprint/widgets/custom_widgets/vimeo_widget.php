<?php
// Guard so it can't be declared twice
if ( ! class_exists( 'Vimeo_Widget' ) ) {

class Vimeo_Widget extends WP_Widget {

  public function __construct() {
    parent::__construct(
      'vimeo_widget',
      __( 'Vimeo Widget', 'village' ),
      array( 'description' => __( 'Displays a Vimeo profile/link (simple, no API).', 'village' ) )
    );
  }

  public function update( $new, $old ) {
    $inst = $old;
    $inst['title']  = isset( $new['title'] )  ? sanitize_text_field( $new['title'] )  : '';
    $inst['user']   = isset( $new['user'] )   ? sanitize_text_field( ltrim( $new['user'], '@' ) ) : '';
    $inst['embed']  = ! empty( $new['embed'] ) ? (bool) $new['embed'] : false;
    return $inst;
  }

  public function form( $inst ) {
    $inst = wp_parse_args( (array) $inst, array(
      'title' => 'Vimeo',
      'user'  => '',
      'embed' => false,
    ) ); ?>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Title','village'); ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>"
             name="<?php echo esc_attr( $this->get_field_name('title') ); ?>"
             type="text" value="<?php echo esc_attr( $inst['title'] ); ?>">
    </p>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id('user') ); ?>"><?php esc_html_e('Vimeo username (without @)','village'); ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('user') ); ?>"
             name="<?php echo esc_attr( $this->get_field_name('user') ); ?>"
             type="text" value="<?php echo esc_attr( $inst['user'] ); ?>">
    </p>
    <p>
      <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id('embed') ); ?>"
             name="<?php echo esc_attr( $this->get_field_name('embed') ); ?>" <?php checked( $inst['embed'] ); ?> />
      <label for="<?php echo esc_attr( $this->get_field_id('embed') ); ?>"><?php esc_html_e('Show simple profile link/embed','village'); ?></label>
    </p>
    <?php
  }

  public function widget( $args, $inst ) {
    echo $args['before_widget'];

    if ( ! empty( $inst['title'] ) ) {
      echo $args['before_title'] . esc_html( $inst['title'] ) . $args['after_title'];
    }

    $user = ! empty( $inst['user'] ) ? $inst['user'] : '';
    if ( $user ) {
      $url = 'https://vimeo.com/' . rawurlencode( $user );
      // Simple safe output; full API embed would require tokens.
      echo '<p><a href="' . esc_url( $url ) . '" target="_blank" rel="noopener noreferrer">'
           . esc_html__( 'Visit my Vimeo profile', 'village' ) . '</a></p>';
    } else {
      echo '<p>' . esc_html__( 'Configure a Vimeo username in this widget.', 'village' ) . '</p>';
    }

    echo $args['after_widget'];
  }
}

} // end guard