<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 * @author Jamaludin Rajalu
 *
 * Post Type: Gallery
 */

// portfolio gallery

function ukmtheme_lightbox_gallery( $file_list_meta_key, $img_size = 'medium' ) {

    $files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );
    
    echo '<div class="gallery">';
    
    foreach ( (array) $files as $attachment_id => $attachment_url ) {
      echo '<a class="gallery-image" href="'. wp_get_attachment_url( $attachment_id ) .'" data-uk-lightbox="&#123;group:&#39;group-'. get_the_ID() .'&#39;&#125;" title="'. get_the_title( $attachment_id ) .'">';
      echo wp_get_attachment_image( $attachment_id, $img_size );
      echo '</a>';
    }
    echo '</div>';
}

function ppkas_gallery() {

  $labels = array(
    'name'                => _x( 'Gallery', 'Post Type General Name', 'ukmtheme' ),
    'singular_name'       => _x( 'Gallery', 'Post Type Singular Name', 'ukmtheme' ),
    'menu_name'           => __( 'Gallery', 'ukmtheme' ),
    'parent_item_colon'   => __( 'Parent Gallery:', 'ukmtheme' ),
    'all_items'           => __( 'All Gallery', 'ukmtheme' ),
    'view_item'           => __( 'View Gallery', 'ukmtheme' ),
    'add_new_item'        => __( 'Add New Gallery', 'ukmtheme' ),
    'add_new'             => __( 'New Gallery', 'ukmtheme' ),
    'edit_item'           => __( 'Edit Gallery', 'ukmtheme' ),
    'update_item'         => __( 'Update Gallery', 'ukmtheme' ),
    'search_items'        => __( 'Search Gallery', 'ukmtheme' ),
    'not_found'           => __( 'No Gallery found', 'ukmtheme' ),
    'not_found_in_trash'  => __( 'No Gallery found in Trash', 'ukmtheme' ),
  );
  $args = array(
    'label'               => __( 'Gallery', 'ukmtheme' ),
    'description'         => __( 'Gallery manager for UKM', 'ukmtheme' ),
    'labels'              => $labels,
    'supports'            => array( 'title' ),
    //'taxonomies'          => array( 'category', 'post_tag' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => false,
    'show_in_admin_bar'   => false,
    //'menu_position'       => 20,
    'menu_icon'           => get_template_directory_uri() . '/img/icon-gallery.svg',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'gallery', $args );

}

// Hook into the 'init' action
add_action( 'init', 'ppkas_gallery', 0 );


function ukmtheme_gallery_category_taxonomy() {

  $labels = array(
    'name'                       => _x( 'Gallery Categories', 'Taxonomy General Name', 'ukmtheme' ),
    'singular_name'              => _x( 'Gallery Category', 'Taxonomy Singular Name', 'ukmtheme' ),
    'menu_name'                  => __( 'Gallery Category', 'ukmtheme' ),
    'all_items'                  => __( 'All Items', 'ukmtheme' ),
    'parent_item'                => __( 'Parent Gallery Category', 'ukmtheme' ),
    'parent_item_colon'          => __( 'Parent Gallery Category:', 'ukmtheme' ),
    'new_item_name'              => __( 'New Gallery Category Name', 'ukmtheme' ),
    'add_new_item'               => __( 'Add New Gallery Category', 'ukmtheme' ),
    'edit_item'                  => __( 'Edit Gallery Category', 'ukmtheme' ),
    'update_item'                => __( 'Update Gallery Category', 'ukmtheme' ),
    'separate_items_with_commas' => __( 'Separate Gallery Categories with commas', 'ukmtheme' ),
    'search_items'               => __( 'Search Gallery Categories', 'ukmtheme' ),
    'add_or_remove_items'        => __( 'Add or remove Gallery Categories', 'ukmtheme' ),
    'choose_from_most_used'      => __( 'Choose from the most used Gallery Categories', 'ukmtheme' ),
    'not_found'                  => __( 'Not Found', 'ukmtheme' ),
  );
  $rewrite = array(
    'slug'                       => 'gallery-category',
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
    'query_var'                  => 'galcat',
    'rewrite'                    => $rewrite,
  );
  register_taxonomy( 'galcat', array( 'gallery' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'ukmtheme_gallery_category_taxonomy', 0 );