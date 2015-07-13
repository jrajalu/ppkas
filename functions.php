<?php
/**
 * @package PPKAS_UniMAP
 * @version 1.0
 * @author Jamaludin Rajalu
 */

/**
 * favicon.ico for all pages
 * wp-login, dashboard, frontpage
 */

function add_favicon() {
  $favicon_url = get_stylesheet_directory_uri() . '/favicon.ico';
  echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}

add_action( 'login_head', 'add_favicon' );
add_action( 'admin_head', 'add_favicon' );
add_action( 'wp_head', 'add_favicon' );

/**
 * Load admin scripts
 * Theme option for color picker
 */

add_action( 'admin_enqueue_scripts', 'ppkas_wp_admin_scripts' );
  function ppkas_wp_admin_scripts() {
    // Javascript
    wp_enqueue_script( 'thickbox' );
    wp_enqueue_script( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker-option', get_template_directory_uri() . '/js/admin.min.js', array('wp-color-picker'), '6.7', true );
    // Stylesheet
    wp_enqueue_style( 'thickbox' );
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_style( 'admin', get_template_directory_uri() . '/css/admin.css', false, '1.0' );

  }

/**
 * skrip untuk antaramuka web
 * menjalankan javascript dan stylesheet
 * gunakan cdn untuk capaian pantas
 * @link cdnjs.com
 */

add_action( 'wp_enqueue_scripts', 'ppkas_scripts' );
  function ppkas_scripts() {
    // javascripts
    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/lib/jquery/jquery.min.js', array(), '2.1.4', false );
    wp_enqueue_script( 'uikit', get_template_directory_uri() . '/lib/uikit/js/uikit.min.js', array(), '2.20.3', true );
    wp_enqueue_script( 'uikit-slider', get_template_directory_uri() . '/lib/uikit/js/components/slider.min.js', array(), '2.20.3', true );
    wp_enqueue_script( 'uikit-slideshow', get_template_directory_uri() . '/lib/uikit/js/components/slideshow.min.js', array(), '2.20.3', true );
    wp_enqueue_script( 'uikit-lightbox', get_template_directory_uri() . '/lib/uikit/js/components/lightbox.min.js', array(), '2.20.3', true );
    wp_enqueue_script( 'uikit-search', get_template_directory_uri() . '/lib/uikit/js/components/search.min.js', array(), '2.20.3', true );
    wp_enqueue_script( 'fitvidsjs', get_template_directory_uri() . '/lib/fitvids/jquery.fitvids.js', array(), '1.1.0', true );
    wp_enqueue_script( 'jqnewsticker', get_template_directory_uri() . '/lib/jqnewsticker/newsTicker.js', array(), '1.0.2', true );
    wp_enqueue_script( 'theme', get_template_directory_uri() . '/js/scripts.min.js', array(), '6.7', true );
    // stylesheet
    wp_enqueue_style( 'uikit', get_template_directory_uri() . '/lib/uikit/css/uikit.almost-flat.min.css', false, '2.20.3' );
    wp_enqueue_style( 'uikit-slider', get_template_directory_uri() . '/lib/uikit/css/components/slider.almost-flat.min.css', false, '2.20.3' );
    wp_enqueue_style( 'uikit-slideshow', get_template_directory_uri() . '/lib/uikit/css/components/slideshow.almost-flat.min.css', false, '2.20.3' );
    wp_enqueue_style( 'uikit-slidenav', get_template_directory_uri() . '/lib/uikit/css/components/slidenav.almost-flat.min.css', false, '2.20.3' );
    wp_enqueue_style( 'uikit-search', get_template_directory_uri() . '/lib/uikit/css/components/search.almost-flat.min.css', false, '2.20.3' );
    wp_enqueue_style( 'style', get_stylesheet_uri(), false, '8.0' );
  }

/**
 * Semakan versi theme terkini secara automatik
 * jangan tukar nama folder theme "ppkas-master"
 */

require( 'inc/theme-update-checker.php' );
  new ThemeUpdateChecker(
    'ppkas-master',
    'https://raw.githubusercontent.com/jrajalu/ppkas/master/version.json'
);

/**
 * Tetapan pada theme
 * html5 support, post format, post thumbnail, automatic-feed-links, css, javascript
 * paparan admin bar pada muka hadapan disorokkan
 * saiz logo mengikut saiz lebar theme sekarang ialah 960x100 piksel
 */

add_action( 'after_setup_theme', 'ppkas_setup' );
  function ppkas_setup() {

    add_theme_support( 'title-tag' );

    add_theme_support( 'html5', array( 'search-form' ) );
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 145, 145, true );

    // news thumbnail
    add_image_size( 'news_thumb', 300, 230, true );

    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );

    load_theme_textdomain( 'ppkas', get_template_directory() . '/lang' );

    register_nav_menus( array(
      'main'      => __( 'Main Navigation', 'ppkas' ),
    ) );

    add_theme_support( 'custom-header', array(
      'width'         => 960,
      'height'        => 100,
      'default-image' => get_template_directory_uri() . '/img/logo.png',
      'uploads'       => true,
      'header-text'   => false,
      )
    );

    add_filter( 'show_admin_bar', '__return_false' );

  }

/**
 * Fuction luaran dari folder /inc/
 * Post type, metabox, widgets dll.
 * Comment pautan yang tidak diperlukan sekiranya tidak perlu
 */

add_action( 'after_setup_theme', 'ppkas_module' );
  if (!function_exists('ppkas_module')) {
    function ppkas_module() {

      require( get_template_directory() . '/inc/post-type-faq.php');
      require( get_template_directory() . '/inc/post-type-gallery.php');
      require( get_template_directory() . '/inc/post-type-news.php');
      require( get_template_directory() . '/inc/post-type-page.php');
      require( get_template_directory() . '/inc/post-type-publication.php' );
      require( get_template_directory() . '/inc/post-type-staff.php');
      require( get_template_directory() . '/inc/post-type-slideshow.php');

      /**
       *
       * Theme configuration
       *
       * Appearance > Theme Options
       * Appearance > The Docs
       *
       */
      require( get_template_directory() . '/inc/theme-archive-links.php' );
      require( get_template_directory() . '/inc/theme-include-archive.php' );
      require( get_template_directory() . '/inc/theme-include-single.php' );
      require( get_template_directory() . '/inc/theme-include-taxonomy.php' );
      require( get_template_directory() . '/inc/theme-metabox.php' );
      require( get_template_directory() . '/inc/theme-walker-menu.php' );
      require( get_template_directory() . '/inc/theme-options.php' );
      require( get_template_directory() . '/inc/theme-login.php' );
      require( get_template_directory() . '/inc/theme-plugins.php' );
      require( get_template_directory() . '/inc/theme-sitemap.php' );

      /**
       * Widget items
       * Appearance > Widgets
       */
      require( get_template_directory() . '/inc/widget-news-list.php' );
      require( get_template_directory() . '/inc/widget-small-banner.php' );

    }
  }

/**
 * Excerpt
 * Replaces the excerpt "more" text by a link
 * Adjust excerpt lenght
 * @link http://codex.wordpress.org/Function_Reference/the_excerpt
 */

add_filter( 'excerpt_more', 'ppkas_excerpt_more' );
  function ppkas_excerpt_more($more) {
    global $post;
      return '<a href="'. get_permalink($post->ID) . '">'. __( ' Read More...', 'ppkas' ) . '</a>';
  }

add_filter( 'excerpt_length', 'ppkas_excerpt_length', 999 );
  function ppkas_excerpt_length( $length ) {
    return 25;
  }

/**
 * Add class to edit post link
 * @link http://codex.wordpress.org/Function_Reference/edit_post_link
 */

function ppkas_custom_edit_post_link($output) {
  $output = str_replace('class="post-edit-link"', 'class="post-edit-link"', $output);
    return $output;
}
add_filter( 'edit_post_link', 'ppkas_custom_edit_post_link' );

/**
 * Add extra mimetype
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/upload_mimes
 */

add_filter( 'upload_mimes','add_custom_mime_types' );
  function add_custom_mime_types($mimes){
    return array_merge($mimes,array (
      'ac3' => 'audio/ac3',
      'mpa' => 'audio/MPA',
      'flv' => 'video/x-flv',
      'svg' => 'image/svg+xml'
    ));
  }

/**
 * Filter Search
 * filter by post type
 */

function ppkas_filter_search($query) {
  if ($query->is_search) {
    $query->set('post_type', array( 'page', 'staff', 'gallery', 'publication', 'news', 'event', 'expertise', 'press', 'video' ));
  };

  return $query;
};
add_filter('pre_get_posts', 'ppkas_filter_search');

/**
 * Register Sidebar
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */

add_action( 'widgets_init', 'ppkas_widgets_init' );
if (!function_exists('ppkas_widgets_init')) {
  function ppkas_widgets_init() {

    register_sidebar( array(
      'name'            => __( 'Page Sidebar', 'ppkas' ),
      'id'              => 'sidebar-1',
      'description'     => __( 'Appears when using the optional page', 'ppkas' ),
      'before_widget'   => '<aside class="widgets pad-bottom">',
      'after_widget'    => '</aside>',
      'before_title'    => '<h3 class="widget-title">',
      'after_title'     => '</h3>',
    ) );

    register_sidebar( array(
      'name'            => __( 'Frontpage: Small Banner', 'ppkas' ),
      'id'              => 'sidebar-2',
      'description'     => __( 'Use only four widget item', 'ppkas' ),
      'before_widget'   => '<div class="col-3-12 pad-global">',
      'after_widget'    => '</div>',
      'before_title'    => '<h3 class="uk-hidden">',
      'after_title'     => '</h3>',
    ) );
    
    register_sidebar( array(
      'name'            => __( 'Frontpage: One Column', 'ppkas' ),
      'id'              => 'sidebar-3',
      'description'     => __( 'Use only one widget item', 'ppkas' ),
      'before_widget'   => '<div class="uk-width-medium-1-1" style="min-height: 100px;">',
      'after_widget'    => '</div>',
      'before_title'    => '<h3 class="widget-title">',
      'after_title'     => '</h3>',
    ) );
    
    register_sidebar( array(
      'name'            => __( 'Frontpage: Three Column', 'ppkas' ),
      'id'              => 'sidebar-4',
      'description'     => __( 'Use only three widget item', 'ppkas' ),
      'before_widget'   => '<div class="uk-width-medium-1-3" style="min-height: 100px;">',
      'after_widget'    => '</div>',
      'before_title'    => '<h3 class="widget-title">',
      'after_title'     => '</h3>',
    ) );
    
  }
}

/**
 * Searchform HTML5
 * @link http://codex.wordpress.org/Function_Reference/get_search_form
 */

function ppkas_search_form( $form ) {
  $form = '<form role="search" method="get" class="uk-form" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
  <input type="search" class="search-field" placeholder="' . esc_attr__( 'Search...','ppkas' ) . '" value="' . get_search_query() . '" name="s" id="s" />
  <button class="search-submit uk-button uk-button-primary" id="searchsubmit">'. esc_attr__( 'Search' ) .'</button>
  </form>';

  return $form;
}

add_filter( 'get_search_form', 'ppkas_search_form' );

/**
 * Custom Post Type Feed
 * @link http://www.wpbeginner.com/wp-tutorials/how-to-add-custom-post-types-to-your-main-wordpress-rss-feed/
 */

function ppkas_feed_request($qv) {
  if (isset($qv['feed']) && !isset($qv['post_type']))
    $qv['post_type'] = array( 'news', 'event' );
  return $qv;
}
add_filter( 'request', 'ppkas_feed_request' );

/**
 * Contact form 7
 * Add class "form"
 */

add_filter( 'wpcf7_form_class_attr', 'ppkas_custom_form_class_attr' );

function ppkas_custom_form_class_attr( $class ) {
  $class .= ' uk-form';
  return $class;
}

/**
 * Enabling HTML in your category & taxonomy descriptions
 * @link http://docs.appthemes.com/tutorials/allow-html-in-wordpress-category-taxonomy-descriptions/
 */

remove_filter( 'pre_term_description', 'wp_filter_kses' );
remove_filter( 'pre_link_description', 'wp_filter_kses' );
remove_filter( 'pre_link_notes', 'wp_filter_kses' );
remove_filter( 'term_description', 'wp_kses_data' );
