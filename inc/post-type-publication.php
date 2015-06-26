<?php
/**
 * @package ppkas
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 * @author Jamaludin Rajalu
 *
 * Custom Post Type: Publication
 */

function title_publication_input ( $title ) {
  if ( get_post_type() == 'publication' ) {
    $title = __( 'Enter publication name here', 'ppkas' );
  }
  return $title;
} // End title_text_input()
add_filter( 'enter_title_here', 'title_publication_input' );

function ppkas_publication() {

  $labels = array(
    'name'                => _x( 'Publications', 'Post Type General Name', 'ppkas' ),
    'singular_name'       => _x( 'Publication', 'Post Type Singular Name', 'ppkas' ),
    'menu_name'           => __( 'Publication', 'ppkas' ),
    'parent_item_colon'   => __( 'Parent Publication:', 'ppkas' ),
    'all_items'           => __( 'All Publications', 'ppkas' ),
    'view_item'           => __( 'View Publication', 'ppkas' ),
    'add_new_item'        => __( 'Add New Publication', 'ppkas' ),
    'add_new'             => __( 'New Publication', 'ppkas' ),
    'edit_item'           => __( 'Edit Publication', 'ppkas' ),
    'update_item'         => __( 'Update Publication', 'ppkas' ),
    'search_items'        => __( 'Search Publications', 'ppkas' ),
    'not_found'           => __( 'No Publications found', 'ppkas' ),
    'not_found_in_trash'  => __( 'No Publications found in Trash', 'ppkas' ),
  );
  $args = array(
    'label'               => __( 'publication', 'ppkas' ),
    'description'         => __( 'Publication information pages', 'ppkas' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', ),
    'taxonomies'          => array( 'pubcat' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => false,
    'show_in_admin_bar'   => false,
    //'menu_position'       => 20,
    'menu_icon'           => get_template_directory_uri() . '/img/icon-publication.svg',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'publication', $args );

}

// Hook into the 'init' action
add_action( 'init', 'ppkas_publication', 0 );

// Register Custom Taxonomy
function ppkas_publication_category()  {

  $labels = array(
    'name'                       => _x( 'Publication Categories', 'Taxonomy General Name', 'ppkas' ),
    'singular_name'              => _x( 'Publication Category', 'Taxonomy Singular Name', 'ppkas' ),
    'menu_name'                  => __( 'Publication Category', 'ppkas' ),
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
  register_taxonomy( 'pubcat', 'publication', $args );

}

// Hook into the 'init' action
add_action( 'init', 'ppkas_publication_category', 0 );

// Custom Column Adjustment
// @link http://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column

add_action('manage_publication_posts_custom_column', 'ppkas_publication_custom_columns');
add_filter('manage_edit-publication_columns', 'ppkas_add_new_publication_columns');

function ppkas_add_new_publication_columns( $columns ){
  $columns = array(
    'cb'                          => '<input type="checkbox">',
    'ppkas_publication_cover'        => __( 'Cover', 'ppkas' ),
    'title'                       => __( 'Title', 'ppkas' ),
    'pubcat'                      => __( 'Category', 'ppkas' ),
    'ppkas_publication_author'       => __( 'Author', 'ppkas' ),
    'ppkas_publication_publisher'    => __( 'Publisher', 'ppkas' ),
    'ppkas_publication_year'         => __( 'Year', 'ppkas' )
  );
  return $columns;
}

function ppkas_publication_custom_columns( $column ){
  global $post;

  switch ($column) {
    case 'ppkas_publication_cover' :
      $pub_cover = get_post_meta($post->ID,'ppkas_publication_cover',true);
      if ( $pub_cover ) { ?>
      <img src="<?php echo $pub_cover; ?>" alt="" width="50">
      <?php }
      else { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/img/placeholder_publication.svg" width="50">
    <?php } break;
    case 'pubcat' : echo get_the_term_list( $post->ID, 'pubcat', '', ', ',''); break;
    case 'ppkas_publication_author' : echo get_post_meta($post->ID,'ppkas_publication_author',true); break;
    case 'ppkas_publication_publisher' : echo get_post_meta($post->ID,'ppkas_publication_publisher',true); break;
    case 'ppkas_publication_year' : echo get_post_meta($post->ID,'ppkas_publication_year',true);
  }
}
?>
