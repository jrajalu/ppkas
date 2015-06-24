<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 * @author Jamaludin Rajalu
 *
 * Custom Post Type: Publication
 */

function title_publication_input ( $title ) {
  if ( get_post_type() == 'publication' ) {
    $title = __( 'Enter publication name here', 'ukmtheme' );
  }
  return $title;
} // End title_text_input()
add_filter( 'enter_title_here', 'title_publication_input' );

function ppkas_publication() {

  $labels = array(
    'name'                => _x( 'Publications', 'Post Type General Name', 'ukmtheme' ),
    'singular_name'       => _x( 'Publication', 'Post Type Singular Name', 'ukmtheme' ),
    'menu_name'           => __( 'Publication', 'ukmtheme' ),
    'parent_item_colon'   => __( 'Parent Publication:', 'ukmtheme' ),
    'all_items'           => __( 'All Publications', 'ukmtheme' ),
    'view_item'           => __( 'View Publication', 'ukmtheme' ),
    'add_new_item'        => __( 'Add New Publication', 'ukmtheme' ),
    'add_new'             => __( 'New Publication', 'ukmtheme' ),
    'edit_item'           => __( 'Edit Publication', 'ukmtheme' ),
    'update_item'         => __( 'Update Publication', 'ukmtheme' ),
    'search_items'        => __( 'Search Publications', 'ukmtheme' ),
    'not_found'           => __( 'No Publications found', 'ukmtheme' ),
    'not_found_in_trash'  => __( 'No Publications found in Trash', 'ukmtheme' ),
  );
  $args = array(
    'label'               => __( 'publication', 'ukmtheme' ),
    'description'         => __( 'Publication information pages', 'ukmtheme' ),
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
    'name'                       => _x( 'Publication Categories', 'Taxonomy General Name', 'ukmtheme' ),
    'singular_name'              => _x( 'Publication Category', 'Taxonomy Singular Name', 'ukmtheme' ),
    'menu_name'                  => __( 'Publication Category', 'ukmtheme' ),
    'all_items'                  => __( 'All Categories', 'ukmtheme' ),
    'parent_item'                => __( 'Parent Category', 'ukmtheme' ),
    'parent_item_colon'          => __( 'Parent Category:', 'ukmtheme' ),
    'new_item_name'              => __( 'New Category Name', 'ukmtheme' ),
    'add_new_item'               => __( 'Add New Category', 'ukmtheme' ),
    'edit_item'                  => __( 'Edit Category', 'ukmtheme' ),
    'update_item'                => __( 'Update Category', 'ukmtheme' ),
    'separate_items_with_commas' => __( 'Separate Categories with commas', 'ukmtheme' ),
    'search_items'               => __( 'Search Categories', 'ukmtheme' ),
    'add_or_remove_items'        => __( 'Add or remove Categories', 'ukmtheme' ),
    'choose_from_most_used'      => __( 'Choose from the most used Categories', 'ukmtheme' ),
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
    'ppkas_publication_cover'        => __( 'Cover', 'ukmtheme' ),
    'title'                       => __( 'Title', 'ukmtheme' ),
    'pubcat'                      => __( 'Category', 'ukmtheme' ),
    'ppkas_publication_author'       => __( 'Author', 'ukmtheme' ),
    'ppkas_publication_publisher'    => __( 'Publisher', 'ukmtheme' ),
    'ppkas_publication_year'         => __( 'Year', 'ukmtheme' )
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