<?php
/**
 * @package ppkas
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 * @author Jamaludin Rajalu
 *
 * Post Type: News
 */

// Register Custom Post Type
function ppkas_latest_news() {

  $labels = array(
    'name'                => _x( 'News', 'Post Type General Name', 'ppkas' ),
    'singular_name'       => _x( 'News', 'Post Type Singular Name', 'ppkas' ),
    'menu_name'           => __( 'News', 'ppkas' ),
    'parent_item_colon'   => __( 'Parent News:', 'ppkas' ),
    'all_items'           => __( 'All News', 'ppkas' ),
    'view_item'           => __( 'View News', 'ppkas' ),
    'add_new_item'        => __( 'Add New News', 'ppkas' ),
    'add_new'             => __( 'Add New', 'ppkas' ),
    'edit_item'           => __( 'Edit News', 'ppkas' ),
    'update_item'         => __( 'Update News', 'ppkas' ),
    'search_items'        => __( 'Search News', 'ppkas' ),
    'not_found'           => __( 'Not found', 'ppkas' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'ppkas' ),
  );
  $rewrite = array(
    'slug'                => 'news',
    'with_front'          => true,
    'pages'               => true,
    'feeds'               => true,
  );
  $args = array(
    'label'               => __( 'ukmnews', 'ppkas' ),
    'description'         => __( 'Latest News', 'ppkas' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', ),
    'hierarchical'        => true,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => false,
    'show_in_admin_bar'   => false,
    //'menu_position'       => 20,
    'menu_icon'           => get_template_directory_uri() . '/img/icon-news.svg',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'query_var'           => 'news',
    'rewrite'             => $rewrite,
    'capability_type'     => 'post',
  );
  register_post_type( 'news', $args );

}

// Hook into the 'init' action
add_action( 'init', 'ppkas_latest_news', 0 );

/**
 * Custom Taxonomy: News Category
 */

function ppkas_news_category_taxonomy() {

  $labels = array(
    'name'                       => _x( 'News Categories', 'Taxonomy General Name', 'ppkas' ),
    'singular_name'              => _x( 'News Category', 'Taxonomy Singular Name', 'ppkas' ),
    'menu_name'                  => __( 'News Category', 'ppkas' ),
    'all_items'                  => __( 'All Items', 'ppkas' ),
    'parent_item'                => __( 'Parent News Category', 'ppkas' ),
    'parent_item_colon'          => __( 'Parent News Category:', 'ppkas' ),
    'new_item_name'              => __( 'New News Category Name', 'ppkas' ),
    'add_new_item'               => __( 'Add New News Category', 'ppkas' ),
    'edit_item'                  => __( 'Edit News Category', 'ppkas' ),
    'update_item'                => __( 'Update News Category', 'ppkas' ),
    'separate_items_with_commas' => __( 'Separate News Categories with commas', 'ppkas' ),
    'search_items'               => __( 'Search News Categories', 'ppkas' ),
    'add_or_remove_items'        => __( 'Add or remove News Categories', 'ppkas' ),
    'choose_from_most_used'      => __( 'Choose from the most used News Categories', 'ppkas' ),
    'not_found'                  => __( 'Not Found', 'ppkas' ),
  );
  $rewrite = array(
    'slug'                       => 'news-category',
    'with_front'                 => true,
    'hierarchical'               => false,
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => false,
    'query_var'                  => 'newscat',
    'rewrite'                    => $rewrite,
  );
  register_taxonomy( 'newscat', array( 'news' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'ppkas_news_category_taxonomy', 0 );
