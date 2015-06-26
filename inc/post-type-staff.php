<?php
/**
 * @package ppkas
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 * @author Jamaludin Rajalu
 *
 * Post Type: Staff Directory
 */

// Edit title field term
function title_staff_input ( $title ) {

  if ( get_post_type() == 'staff' ) {
    $title = __( 'Enter staff name here', 'ppkas' );
  }
  return $title;
}

add_filter( 'enter_title_here', 'title_staff_input' );

// Post Type: Staff
// Register Custom Post Type
function ppkas_staff_directory() {

  $labels = array(
    'name'                => _x( 'Staffs', 'Post Type General Name', 'ppkas' ),
    'singular_name'       => _x( 'Staff', 'Post Type Singular Name', 'ppkas' ),
    'menu_name'           => __( 'Staff Directory', 'ppkas' ),
    'parent_item_colon'   => __( 'Parent Staff:', 'ppkas' ),
    'all_items'           => __( 'All Staffs', 'ppkas' ),
    'view_item'           => __( 'View Staff', 'ppkas' ),
    'add_new_item'        => __( 'Add New Staff', 'ppkas' ),
    'add_new'             => __( 'Add New', 'ppkas' ),
    'edit_item'           => __( 'Edit Staff', 'ppkas' ),
    'update_item'         => __( 'Update Staff', 'ppkas' ),
    'search_items'        => __( 'Search Staffs', 'ppkas' ),
    'not_found'           => __( 'Not found', 'ppkas' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'ppkas' ),
  );
  $rewrite = array(
    'slug'                => 'staff-directory',
    'with_front'          => true,
    'pages'               => true,
    'feeds'               => true,
  );
  $args = array(
    'label'               => __( 'staff', 'ppkas' ),
    'description'         => __( 'Latest Staffs', 'ppkas' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'revisions', ),
    'taxonomies'          => array( 'department', 'position' ),
    'hierarchical'        => true,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => false,
    'show_in_admin_bar'   => false,
    //'menu_position'       => 20,
    'menu_icon'           => get_template_directory_uri() . '/img/icon-staff.svg',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'query_var'           => 'staff',
    'rewrite'             => $rewrite,
    'capability_type'     => 'post',
  );
  register_post_type( 'staff', $args );

}

// Hook into the 'init' action
add_action( 'init', 'ppkas_staff_directory', 0 );

// Staff Position
// Register Custom Taxonomy
function ppkas_staff_position_taxonomy() {

  $labels = array(
    'name'                       => _x( 'Positions', 'Taxonomy General Name', 'ppkas' ),
    'singular_name'              => _x( 'Position', 'Taxonomy Singular Name', 'ppkas' ),
    'menu_name'                  => __( 'Position', 'ppkas' ),
    'all_items'                  => __( 'All Items', 'ppkas' ),
    'parent_item'                => __( 'Parent Position', 'ppkas' ),
    'parent_item_colon'          => __( 'Parent Position:', 'ppkas' ),
    'new_item_name'              => __( 'New Position Name', 'ppkas' ),
    'add_new_item'               => __( 'Add New Position', 'ppkas' ),
    'edit_item'                  => __( 'Edit Position', 'ppkas' ),
    'update_item'                => __( 'Update Position', 'ppkas' ),
    'separate_items_with_commas' => __( 'Separate Positions with commas', 'ppkas' ),
    'search_items'               => __( 'Search Positions', 'ppkas' ),
    'add_or_remove_items'        => __( 'Add or remove Positions', 'ppkas' ),
    'choose_from_most_used'      => __( 'Choose from the most used Positions', 'ppkas' ),
    'not_found'                  => __( 'Not Found', 'ppkas' ),
  );
  $rewrite = array(
    'slug'                       => 'staff-position',
    'with_front'                 => true,
    'hierarchical'               => false,
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => false,
    'show_tagcloud'              => false,
    'query_var'                  => 'position',
    'rewrite'                    => $rewrite,
  );
  register_taxonomy( 'position', array( 'staff' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'ppkas_staff_position_taxonomy', 0 );

// Staff Department
// Register Custom Taxonomy
function ppkas_staff_department_taxonomy() {

  $labels = array(
    'name'                       => _x( 'Departments', 'Taxonomy General Name', 'ppkas' ),
    'singular_name'              => _x( 'Department', 'Taxonomy Singular Name', 'ppkas' ),
    'menu_name'                  => __( 'Department', 'ppkas' ),
    'all_items'                  => __( 'All Departments', 'ppkas' ),
    'parent_item'                => __( 'Parent Department', 'ppkas' ),
    'parent_item_colon'          => __( 'Parent Department:', 'ppkas' ),
    'new_item_name'              => __( 'New Department Name', 'ppkas' ),
    'add_new_item'               => __( 'Add New Department', 'ppkas' ),
    'edit_item'                  => __( 'Edit Department', 'ppkas' ),
    'update_item'                => __( 'Update Department', 'ppkas' ),
    'separate_items_with_commas' => __( 'Separate departments with commas', 'ppkas' ),
    'search_items'               => __( 'Search Departments', 'ppkas' ),
    'add_or_remove_items'        => __( 'Add or remove departments', 'ppkas' ),
    'choose_from_most_used'      => __( 'Choose from the most used departments', 'ppkas' ),
    'not_found'                  => __( 'Not Found', 'ppkas' ),
  );
  $rewrite = array(
    'slug'                       => 'staff-department',
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
    'query_var'                  => 'department',
    'rewrite'                    => $rewrite,
  );
  register_taxonomy( 'department', array( 'staff' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'ppkas_staff_department_taxonomy', 0 );

// FILTER BY CATEGORY: POSITION/DEPARTMENT

add_action('restrict_manage_posts','restrict_listings_by_department');
function restrict_listings_by_department() {
    global $typenow;
    global $wp_query;
    if ($typenow=='staff') {
    $taxonomy = 'department';
    $term = isset($wp_query->query['department']) ? $wp_query->query['department'] :'';
    $department_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
            'show_option_all' =>  __( 'All Department', 'ppkas' ),
            'taxonomy'        =>  $taxonomy,
            'name'            =>  'department',
            'orderby'         =>  'name',
            'selected'        =>  $term,
            'hierarchical'    =>  true,
            'depth'           =>  3,
            'show_count'      =>  true, // Show # listings in parens
            'hide_empty'      =>  true, // Don't show departmentes w/o listings
        ));
    }
}
add_filter('parse_query','convert_department_id_to_taxonomy_term_in_query');
function convert_department_id_to_taxonomy_term_in_query($query) {
    global $pagenow;
    $qv = &$query->query_vars;
    if ($pagenow=='edit.php' && isset($qv['department']) && is_numeric($qv['department'])) {
        $term = get_term_by('id',$qv['department'],'department');
        $qv['department'] = ($term ? $term->slug : '');
    }
}

add_action('restrict_manage_posts','restrict_listings_by_position');
function restrict_listings_by_position() {
    global $typenow;
    global $wp_query;
    if ($typenow=='staff') {
    $taxonomy = 'position';
    $term = isset($wp_query->query['position']) ? $wp_query->query['position'] :'';
    $position_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
            'show_option_all' =>  __( 'All Position', 'ppkas' ),
            'taxonomy'        =>  $taxonomy,
            'name'            =>  'position',
            'orderby'         =>  'name',
            'selected'        =>  $term,
            'hierarchical'    =>  true,
            'depth'           =>  3,
            'show_count'      =>  true, // Show # listings in parens
            'hide_empty'      =>  true, // Don't show positiones w/o listings
        ));
    }
}
add_filter('parse_query','convert_position_id_to_taxonomy_term_in_query');
function convert_position_id_to_taxonomy_term_in_query($query) {
    global $pagenow;
    $qv = &$query->query_vars;
    if ($pagenow=='edit.php' && isset($qv['position']) && is_numeric($qv['position'])) {
        $term = get_term_by('id',$qv['position'],'position');
        $qv['position'] = ($term ? $term->slug : '');
    }
}

/**
 * Custom Column Adjustment
 * @link http://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/manage_edit-post_type_columns
 * @link http://codex.wordpress.org/Plugin_API/Action_Reference/manage_$post_type_posts_custom_column
 */


add_action('manage_staff_posts_custom_column', 'ppkas_staff_custom_columns');
add_filter('manage_edit-staff_columns', 'ppkas_add_new_staff_columns');

function ppkas_add_new_staff_columns( $columns ){
  $columns = array(
    'cb'                  => '<input type="checkbox">',
    'ppkas_staff_photo'      => __( 'Photo', 'ppkas' ),
    'title'               => __( 'Name', 'ppkas' ),
    'ppkas_staff_position'   => __( 'Position', 'ppkas' ),
    'ppkas_staff_department' => __( 'Department', 'ppkas' )
  );
  return $columns;
}

function ppkas_staff_custom_columns( $column ){
  global $post;

  switch ($column) {
    case 'ppkas_staff_photo' :
      $staff_photo = get_post_meta($post->ID,'ppkas_staff_photo',true);
      if ( $staff_photo ) { ?>
        <img src="<?php echo get_post_meta($post->ID,'ppkas_staff_photo',true); ?>" width="50" alt="">
      <?php }

      else { ?>
        <img src="<?php echo get_template_directory_uri(); ?>/img/placeholder_staff.svg" width="50">
      <?php } break;
    case 'ppkas_staff_position' : echo get_the_term_list( $post->ID, 'position', '', ', ',''); break;
    case 'ppkas_staff_department' : echo get_the_term_list( $post->ID, 'department', '', ', ',''); break;
  }
}

?>
