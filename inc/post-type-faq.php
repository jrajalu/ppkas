<?php
/**
 * @package ppkas
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 * @author Jamaludin Rajalu
 *
 * Post Type: Frequently Asked Questions
 */

function ppkas_faq() {

  $labels = array(
    'name'                => _x( 'FAQs', 'Post Type General Name', 'ppkas' ),
    'singular_name'       => _x( 'FAQ', 'Post Type Singular Name', 'ppkas' ),
    'menu_name'           => __( 'FAQ', 'ppkas' ),
    'parent_item_colon'   => __( 'Parent FAQ:', 'ppkas' ),
    'all_items'           => __( 'All FAQs', 'ppkas' ),
    'view_item'           => __( 'View FAQ', 'ppkas' ),
    'add_new_item'        => __( 'Add New FAQ', 'ppkas' ),
    'add_new'             => __( 'New FAQ', 'ppkas' ),
    'edit_item'           => __( 'Edit FAQ', 'ppkas' ),
    'update_item'         => __( 'Update FAQ', 'ppkas' ),
    'search_items'        => __( 'Search FAQs', 'ppkas' ),
    'not_found'           => __( 'No FAQs found', 'ppkas' ),
    'not_found_in_trash'  => __( 'No FAQs found in Trash', 'ppkas' ),
  );
  $args = array(
    'label'               => __( 'faq', 'ppkas' ),
    'description'         => __( 'FAQ manager for UKM', 'ppkas' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'revisions', ),
    'taxonomies'          => array( 'faqcat' ),
    'hierarchical'        => true,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => false,
    'show_in_admin_bar'   => false,
    //'menu_position'       => 20,
    'menu_icon'           => get_template_directory_uri() . '/img/icon-faq.svg',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'faq', $args );

}

// Hook into the 'init' action
add_action( 'init', 'ppkas_faq', 0 );

// Register Custom Taxonomy
function ppkas_faq_category()  {

  $labels = array(
    'name'                       => _x( 'FAQ Categories', 'Taxonomy General Name', 'ppkas' ),
    'singular_name'              => _x( 'FAQ Category', 'Taxonomy Singular Name', 'ppkas' ),
    'menu_name'                  => __( 'FAQ Category', 'ppkas' ),
    'all_items'                  => __( 'All Categories', 'ppkas' ),
    'parent_item'                => __( 'Parent Category', 'ppkas' ),
    'parent_item_colon'          => __( 'Parent Category:', 'ppkas' ),
    'new_item_name'              => __( 'New Category Name', 'ppkas' ),
    'add_new_item'               => __( 'Add New Category', 'ppkas' ),
    'edit_item'                  => __( 'Edit Category', 'ppkas' ),
    'update_item'                => __( 'Update Category', 'ppkas' ),
    'separate_items_with_commas' => __( 'Separate Categories with commas', 'ppkas' ),
    'search_items'               => __( 'Search Categories', 'ppkas' ),
    'add_or_remove_items'        => __( 'Add or remove Categories', 'ppkas' ),
    'choose_from_most_used'      => __( 'Choose from the most used Categories', 'ppkas' ),
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  );
  register_taxonomy( 'faqcat', 'faq', $args );

}

// Hook into the 'init' action
add_action( 'init', 'ppkas_faq_category', 0 );

// Custom Column Adjustment
// @link http://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column

add_action('manage_faq_posts_custom_column', 'ppkas_faq_custom_columns');
add_filter('manage_edit-faq_columns', 'ppkas_add_new_faq_columns');

function ppkas_add_new_faq_columns( $columns ){
  $columns = array(
    'cb'                          => '<input type="checkbox">',
    'title'                       => __( 'Question', 'ppkas' ),
    'faqcat'                      => __( 'Category', 'ppkas' ),
  );
  return $columns;
}

function ppkas_faq_custom_columns( $column ){
  global $post;

  switch ($column) {
    case 'faqcat' : echo get_the_term_list( $post->ID, 'faqcat', '', ', ',''); break;
  }
}

?>
