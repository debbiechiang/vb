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
    wp_enqueue_script('vb-scripts', get_template_directory_uri().'/js/scripts.js', array('scrollTrigger', 'jquery'), '1.0.0', true);


    $ajaxurl = '';
    if( in_array('sitepress-multilingual-cms/sitepress.php', get_option('active_plugins')) ){
      $ajaxurl .= admin_url( 'admin-ajax.php?lang=' . ICL_LANGUAGE_CODE );
    } else{
      $ajaxurl .= admin_url( 'admin-ajax.php');
    }

    wp_localize_script( 'vb-scripts', 'screenReaderText', array(
      'expand'   => __( 'expand child menu', 'vivekbedi' ),
      'collapse' => __( 'collapse child menu', 'vivekbedi' ),
      'ajaxurl'  => $ajaxurl,
      'noposts'  => esc_html__('No older posts found.', 'vivekbedi'),
      'loadmore' => esc_html__('Load more', 'vivekbedi'),
      'loading'  => esc_html__('Loading...', 'vivekbedi')
    ) );

  }
  add_action( 'wp_enqueue_scripts', 'wp_startscripts' );

  // LOAD MORE BUTTON
  add_action('wp_ajax_nopriv_mytheme_more_post_ajax', 'mytheme_more_post_ajax');
  add_action('wp_ajax_mytheme_more_post_ajax', 'mytheme_more_post_ajax');
  
  function renderCategories() {
    $category_out = array();
    $categories = get_the_category();
    foreach ($categories as $category_one) {
      $category_out[] ='<a href="'.esc_url( get_category_link( $category_one->term_id ) ).'" class="'.strtolower($category_one->name).'">' .$category_one->name.'</a>';
    }
    $category_out = implode(', ', $category_out);
    
    $cat_out = (!empty($categories)) ? '<span class="cat-links"><span class="screen-reader-text">'.'</span>'.$category_out.'</span>' : '';

    return $cat_out;
  }

  function renderTags() {
    $tag_out = array();
    $tags = get_the_tags();
    foreach($tags as $tag_one) {
      $tag_out[] = '<li class="tile__tag"><a href="' . esc_url( get_category_link( $tag_one->term_id ) ) . '" class="tile__tag-link down-1">' .$tag_one->name.'</a></li>';
    }

    $tag_out = implode(' ', $tag_out);
    
    $tag_out = (!empty($tags)) ? '<span class="cat-links"><span class="screen-reader-text">'.'</span>'.$tag_out.'</span>' : '';

    return $tag_out;
  }

  if (!function_exists('mytheme_more_post_ajax')) {
    function mytheme_more_post_ajax(){
   
        $ppp     = (isset($_POST['ppp'])) ? $_POST['ppp'] : 3;
        $perrow  = (isset($_POST['perrow'])) ? $_POST['perrow'] : 3; 
        $offset  = (isset($_POST['offset'])) ? $_POST['offset'] : 0;
        $posttype = (isset($_POST['post_type'])) ? $_POST['post_type'] : array('post', 'speaking-engagement');
        $queryName = (isset($_POST['queryname'])) ? $_POST['queryname'] : null;
        $queryValue = (isset($_POST['queryvalue'])) ? $_POST['queryvalue'] : null;

        $args = array(
            'posts_per_page' => $ppp,
            'offset'          => $offset,
            'post_type'     => $posttype
        );

        if ($queryName && $queryValue) {
          $args[$queryName] = $queryValue;
        };
   
        $loop = new WP_Query($args);
    
        $out = '';  

        if ($loop -> have_posts()) :
          $postitem = 0; 
          while ($loop -> have_posts()) :
            $loop -> the_post();

            if(has_post_thumbnail($post->ID)) {
              $bgimg = wp_get_attachment_image_url( get_post_thumbnail_id($post->ID), 'medium_large' ); 
            };

            $categoryList = renderCategories();
            $tagList = renderTags();

            if($perrow == '3') {
              if($postitem%3 == 0): 
                $out .= '<div class="row">'; 
              endif; 

              $out .= '<article class="tile tile__1x tile--';

              if($postitem%2 == 1): 
                $out .= 'dark-bg" style="background-image: url('. $bgimg .');';
              else:
                $out .= 'grey-bg';
              endif; 

              $out .= '"><div class="tile__meta"><div class="tile__category down-1">'.  $categoryList . '</div><div class="tile__date down-1">' . get_the_date() .'</div></div>
                <h3 class="tile__title"><a href="'. get_the_permalink() .'">'. get_the_title().'</a></h3><div class="tile__tags"><ul>' . $tagList . '</ul></div>'; 


              $out .= '</article>';

              if($postitem%3 == 2):
                $out .= '</div>'; 
              endif;
            } else if ($perrow === '2') {
              if($postitem%2 == 0): 
                $out .= '<div class="row">'; 
              endif; 

              $out .= '<article class="tile tile__1x tile--dark-bg" 
                style="background-image: url('. $bgimg .');"><div class="tile__meta"><div class="tile__category down-1">' . $categoryList . '</div><div class="tile__date down-1">' . get_the_date() . '</div></div><h3 class="tile__title"><a href="' . get_the_permalink() . '">' . get_the_title().'</a></h3><div class="tile__tags"><ul>' . $tagList . '</ul></div>';

              $out .= '</article>';

              if($postitem%2 == 1):
                $out .= '</div>'; 
              endif;
            }
            $postitem++;
          endwhile; 
        endif;

        wp_reset_postdata();

        wp_die($out);
      }
    }
?>