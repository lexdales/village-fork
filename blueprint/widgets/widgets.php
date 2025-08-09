<?php
/**
 * Blueprint – Custom Widgets loader
 * Location: /blueprint/widgets/widgets.php
 */

 // Always load widget files only once, using absolute paths.
 $widgets_dir = __DIR__ . '/custom_widgets/';

 require_once $widgets_dir . 'recent_posts_widget.php';
 require_once $widgets_dir . 'popular_posts_widget.php';
 require_once $widgets_dir . 'latest_portfolio_posts.php';
 require_once $widgets_dir . 'popular_portfolio_posts.php';
 require_once $widgets_dir . 'youtube_widget.php';
 require_once $widgets_dir . 'vimeo_widget.php';
 require_once $widgets_dir . 'twitter_widget.php';
 require_once $widgets_dir . 'flickr_widget.php';

 // Register widgets safely (won’t fatal if a class/file is missing).
 add_action('widgets_init', function () {

     if ( class_exists('RPWT_Widget') ) {
         register_widget('RPWT_Widget');           // Recent Posts
     }

     if ( class_exists('PPWT_Widget') ) {
         register_widget('PPWT_Widget');           // Popular Posts
     }

     if ( class_exists('LPWT_Widget') ) {
         register_widget('LPWT_Widget');           // Latest Portfolio
     }

     if ( class_exists('PPPORT_Widget') ) {
         register_widget('PPPORT_Widget');         // Popular Portfolio
     }

     if ( class_exists('Youtube_Widget') ) {
         register_widget('Youtube_Widget');        // YouTube
     }

     if ( class_exists('Vimeo_Widget') ) {
         register_widget('Vimeo_Widget');          // Vimeo
     }

     if ( class_exists('Twitter_Widget') ) {
         register_widget('Twitter_Widget');        // Twitter
     }

     if ( class_exists('Flickr_Widget') ) {
         register_widget('Flickr_Widget');         // Flickr
     }
 });