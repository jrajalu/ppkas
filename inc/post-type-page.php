<?php
/**
 * @package ppkas
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 * @author Jamaludin Rajalu
 *
 * Post Type: Page
 */

add_action( 'init', 'ukmtheme_page_taxonomy', 0 );

  function ukmtheme_page_taxonomy() {

    $labels = array(
      'name'                       => _x( 'Page Categories', 'Taxonomy General Name', 'ukmtheme' ),
      'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'ukmtheme' ),
      'menu_name'                  => __( 'Category', 'ukmtheme' ),
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
      'not_found'                  => __( 'Not Found', 'ukmtheme' ),
    );
    $rewrite = array(
      'slug'                       => 'group',
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
      'query_var'                  => 'pagecat',
      'rewrite'                    => $rewrite,
    );

    register_taxonomy( 'pagecat', array( 'page' ), $args );
  }

// FILTER BY CATEGORY

add_action('restrict_manage_posts','restrict_listings_by_page');
  function restrict_listings_by_page() {
    global $typenow;
    global $wp_query;
    if ($typenow=='page') {
    $taxonomy = 'pagecat';
    $term = isset($wp_query->query['pagecat']) ? $wp_query->query['pagecat'] :'';
    $Category_taxonomy = get_taxonomy($taxonomy);
      wp_dropdown_categories(array(
        'show_option_all' =>  __( 'All Category', 'ukmtheme' ),
        'taxonomy'        =>  $taxonomy,
        'name'            =>  'pagecat',
        'orderby'         =>  'name',
        'selected'        =>  $term,
        'hierarchical'    =>  true,
        'depth'           =>  3,
        'show_count'      =>  true, // Show # listings in parens
        'hide_empty'      =>  true, // Don't show Categoryes w/o listings
      ));
    }
  }

add_filter('parse_query','convert_pagecat_id_to_taxonomy_term_in_query');
  function convert_pagecat_id_to_taxonomy_term_in_query($query) {
    global $pagenow;
    $qv = &$query->query_vars;
    if ($pagenow=='edit.php' && isset($qv['pagecat']) && is_numeric($qv['pagecat'])) {
      $term = get_term_by('id',$qv['pagecat'],'pagecat');
      $qv['pagecat'] = ($term ? $term->slug : '');
    }
  }
