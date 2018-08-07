<?php 
  /**
   * Like get_template_part() put lets you pass args to the template file
   * Args are available in the template as $template_args array
   * @param string filepart
   * @param mixed wp_args style argument list
   */
  function hm_get_template_part( $file, $template_args = array(), $cache_args = array() ) {
    $template_args = wp_parse_args( $template_args );
    $cache_args = wp_parse_args( $cache_args );
    if ( $cache_args ) {
      foreach ( $template_args as $key => $value ) {
        if ( is_scalar( $value ) || is_array( $value ) ) {
          $cache_args[$key] = $value;
        } else if ( is_object( $value ) && method_exists( $value, 'get_id' ) ) {
          $cache_args[$key] = call_user_method( 'get_id', $value );
        }
      }
      if ( ( $cache = wp_cache_get( $file, serialize( $cache_args ) ) ) !== false ) {
        if ( ! empty( $template_args['return'] ) )
          return $cache;
        echo $cache;
        return;
      }
    }
    $file_handle = $file;
    do_action( 'start_operation', 'hm_template_part::' . $file_handle );
    if ( file_exists( get_stylesheet_directory() . '/' . $file . '.php' ) )
      $file = get_stylesheet_directory() . '/' . $file . '.php';
    elseif ( file_exists( get_template_directory() . '/' . $file . '.php' ) )
      $file = get_template_directory() . '/' . $file . '.php';
    ob_start();
    $return = require( $file );
    $data = ob_get_clean();
    do_action( 'end_operation', 'hm_template_part::' . $file_handle );
    if ( $cache_args ) {
      wp_cache_set( $file, $data, serialize( $cache_args ), 3600 );
    }
    if ( ! empty( $template_args['return'] ) )
      if ( $return === false )
        return false;
      else
        return $data;
    echo $data;
  }

  // WordPress Titles
  add_theme_support( 'title-tag' );

  // Custom Header Images
  $args = array(
    'width'         => 980,
    'height'        => 60,
    'flex-width'    => true,
    'flex-height'   => true,
    'default-image' => get_template_directory_uri() . '/images/header.jpg',
    'uploads'       => true,
  );
  add_theme_support( 'custom-header', $args );

  // Support Featured Images
  add_theme_support( 'post-thumbnails', array('post', 'page', 'speaking-engagement') );


  // Custom Post Type -- Speaking Engagements
  function create_speaking_engagements() {
    register_post_type('speaking-engagement', 
      array(
        'labels' => array(
          'name' => __('Speaking Engagements'),
          'singular_name' => __('Speaking Engagement'),
        ),
        'public' => true,
        'has-archive' => true,
        'supports' => array(
          'title',
          'editor',
          'excerpt',
          'thumbnail',
          'post-thumbnails'
        )
      )
    );

    register_taxonomy_for_object_type('post_tag', 'speaking-engagement');
    register_taxonomy_for_object_type('category', 'speaking-engagement');

  }

  add_action('init', 'create_speaking_engagements');

  add_filter('pre_get_posts', 'query_post_type');
  function query_post_type($query) {
    if( is_category() ) {
      $post_type = get_query_var('post_type');
      if($post_type)
          $post_type = $post_type;
      else
          $post_type = array('nav_menu_item', 'post', 'speaking-engagement');
      $query->set('post_type',$post_type);
      return $query;
  }}

  function tag_filter($query) {
    if ( !is_admin() && $query->is_main_query() ) {
      if ($query->is_tag) {
        $query->set('post_type', array( 'speaking-engagement', 'post', 'nav_menu_item' ));
      }
    }
  }
  add_action('pre_get_posts','tag_filter');

  // Enqueue Scripts.
  function wp_startscripts() {
    wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Merriweather+Sans:300,400,600', false ); 
    wp_enqueue_style('vb-styles', get_template_directory_uri().'/css/main.css');
    wp_register_script('scrollTrigger', get_template_directory_uri().'/js/scrollTrigger.js', array(), '1.0.0', true);
    wp_enqueue_script('vb-scripts', get_template_directory_uri().'/js/scripts.js', array('scrollTrigger'), '1.0.0', true);
  }
  add_action( 'wp_enqueue_scripts', 'wp_startscripts' );
?>