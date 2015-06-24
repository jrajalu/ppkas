<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 * @author Jamaludin Rajalu
 *
 * Custom Metabox for Post Type
 */


if ( file_exists(  get_template_directory() . '/lib/cmb2/init.php' ) ) {
  require_once  get_template_directory() . '/lib/cmb2/init.php';
} elseif ( file_exists(  get_template_directory()  . '/lib/CMB2/init.php' ) ) {
  require_once  get_template_directory()  . '/lib/CMB2/init.php';
}

// Post Type: Gallery

add_action( 'cmb2_init', 'ppkas_gallery_metaboxes' );

  function ppkas_gallery_metaboxes() {

    $prefix = 'ppkas_';

    $gallery = new_cmb2_box( array(
      'id'            => 'gallery_metabox',
      'title'         => __( 'Gallery Detail', 'ukmtheme' ),
      'object_types'  => array( 'gallery', ),
      'context'       => 'normal',
      'priority'      => 'high',
      'show_names'    => true,
    ) );

    $gallery->add_field( array(
      'name'    => __( 'Gallery Cover Image', 'ukmtheme' ),
      'desc'    => __( 'Upload an image or enter a URL. dimensions of the image should be 300x300 pixels.', 'ukmtheme' ),
      'id'      => $prefix . 'gallery_cover',
      'type'    => 'file',
      'allow'   => array('url'),
    ) );

    $gallery->add_field( array(
      'name'    => __( 'Date', 'ukmtheme' ),
      'desc'    => __( 'Gallery Date', 'ukmtheme' ),
      'id'      => $prefix . 'gallery_date',
      'type'    => 'text_date',
    ) );

    $gallery->add_field( array(
      'name'    => __( 'Phographer', 'ukmtheme' ),
      'desc'    => __( 'Photo by', 'ukmtheme' ),
      'id'      => $prefix . 'gallery_photographer',
      'type'    => 'text',
    ) );

    $gallery->add_field( array(
      'name'         => __( 'Image', 'ukmtheme' ),
      'desc'         => __( 'Upload or add multiple images/attachments.', 'ukmtheme' ),
      'id'           => $prefix . 'gallery_image',
      'type'         => 'file_list',
      'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
    ) );
  }

// Post Type: Slideshow

add_action( 'cmb2_init', 'ppkas_slideshow_metaboxes' );

  function ppkas_slideshow_metaboxes() {

    $prefix = 'ppkas_';

    $slideshow = new_cmb2_box( array(
      'id'            => 'slideshow_metabox',
      'title'         => __( 'Slideshow Detail', 'ukmtheme' ),
      'object_types'  => array( 'slideshow' ),
      'context'       => 'normal',
      'priority'      => 'high',
      'show_names'    => true,
    ) );

    $slideshow->add_field( array(
      'name'    => __( 'Image', 'ukmtheme' ),
      'desc'    => __( 'Upload an image or enter a URL. dimensions of the image should be 2550x996 pixels.', 'ukmtheme' ),
      'id'      => $prefix . 'slideshow_image',
      'type'    => 'file',
      'allow'   => array('url'),
    ) );

    $slideshow->add_field( array(
      'name'    => __( 'Caption', 'ukmtheme' ),
      'desc'    => __( 'Some caption for the image.', 'ukmtheme' ),
      'id'      => $prefix . 'slideshow_caption',
      'type'    => 'textarea',
    ) );

    $slideshow->add_field( array(
      'name'    => __( 'Link', 'ukmtheme' ),
      'desc'    => __( 'links to posts, pages or external web.', 'ukmtheme' ),
      'id'      => $prefix . 'slideshow_link',
      'type'    => 'text',
    ) );
    
    $slideshow->add_field( array(
      'name'    => __( 'Hide Caption', 'ukmtheme' ),
      'desc'    => __( 'Hide slideshow caption', 'ukmtheme' ),
      'id'      => $prefix . 'slideshow_caption_hide',
      'type'    => 'checkbox'
    ) );
  }

// Post Type: Publication

add_action( 'cmb2_init', 'ppkas_publication_metaboxes' );

  function ppkas_publication_metaboxes() {

    $prefix = 'ppkas_';

    $publication = new_cmb2_box(  array(
      'id'            => 'publication_metabox',
      'title'         => __( 'Publication Detail', 'ukmtheme' ),
      'object_types'  => array( 'publication', ),
      'context'       => 'normal',
      'priority'      => 'high',
      'show_names'    => true,
    ) );

    $publication->add_field( array(
      'name'    => __( 'Cover Image', 'ukmtheme' ),
      'desc'    => __( 'Upload an image or enter a URL. dimensions of the image should be 300x380 pixels.', 'ukmtheme' ),
      'id'      => $prefix . 'publication_cover',
      'type'    => 'file',
      'allow'   => array('url'),
    ) );

    $publication->add_field( array(
      'name'    => __( 'Author', 'ukmtheme' ),
      'desc'    => __( 'e.g. Jamaludin Rajalu', 'ukmtheme' ),
      'id'      => $prefix . 'publication_author',
      'type'    => 'text',
    ) );

    $publication->add_field( array(
      'name'    => __( 'Publisher', 'ukmtheme' ),
      'desc'    => __( 'e.g. Pusat Teknologi Maklumat', 'ukmtheme' ),
      'id'      => $prefix . 'publication_publisher',
      'type'    => 'text',
    ) );

    $publication->add_field( array(
      'name'    => __( 'Year', 'ukmtheme' ),
      'desc'    => __( 'e.g. 2014', 'ukmtheme' ),
      'id'      => $prefix . 'publication_year',
      'type'    => 'text',
    ) );

    $publication->add_field( array(
      'name'    => __( 'Number of Pages', 'ukmtheme' ),
      'desc'    => __( 'e.g. 199', 'ukmtheme' ),
      'id'      => $prefix . 'publication_pages',
      'type'    => 'text',
    ) );

    $publication->add_field( array(
      'name'    => __( 'Reference/Download', 'ukmtheme' ),
      'desc'    => __( 'e.g. http://www.ukm.my', 'ukmtheme' ),
      'id'      => $prefix . 'publication_reference',
      'type'    => 'text_url',
    ) );
  }

// Post Type: Staff Directory

add_action( 'cmb2_init', 'ppkas_staff_metaboxes' );

  function ppkas_staff_metaboxes() {

    $prefix = 'ppkas_';

    $staff = new_cmb2_box(  array(
      'id'            => 'staff_metabox',
      'title'         => __( 'Staff Detail', 'ukmtheme' ),
      'object_types'  => array( 'staff', ),
      'context'       => 'normal',
      'priority'      => 'high',
      'show_names'    => true,
    ) );

    $staff->add_field( array(
      'name'    => __( 'Staff Photo', 'ukmtheme' ),
      'desc'    => __( 'Upload an image or enter a URL. dimensions of the image should be 300x380 pixels.', 'ukmtheme' ),
      'id'      => $prefix . 'staff_photo',
      'type'    => 'file',
      'allow'   => array('url'),
    ) );

    $staff->add_field( array(
      'name'    => __( 'Phone No.', 'ukmtheme' ),
      'desc'    => __( 'e.g. 03-8921-7070', 'ukmtheme' ),
      'id'      => $prefix . 'staff_phone',
      'type'    => 'text',
    ) );

    $staff->add_field( array(
      'name'    => __( 'Email', 'ukmtheme' ),
      'desc'    => __( 'e.g. user@ukm.edu.my', 'ukmtheme' ),
      'id'      => $prefix . 'staff_email',
      'type'    => 'text_email',
    ) );

    $staff->add_field( array(
      'name'    => __( 'Display Job Scope', 'ukmtheme' ),
      'desc'    => __( 'Please check if want to display Scope of Work', 'ukmtheme' ),
      'id'      => $prefix . 'staff_work_scope',
      'type'    => 'checkbox',
    ) );

    $staff->add_field( array(
      'name'    => __( 'Hide Title', 'ukmtheme' ),
      'desc'    => __( 'Please check if want to hide Scope of Work title "Scope of Work"', 'ukmtheme' ),
      'id'      => $prefix . 'staff_work_scope_title',
      'type'    => 'checkbox',
    ) );

    $staff->add_field( array(
      'name'    => __( 'New Title', 'ukmtheme' ),
      'desc'    => __( 'e.g. "Expertise". Please leave it blank if do not want to display', 'ukmtheme' ),
      'id'      => $prefix . 'staff_work_scope_title_custom',
      'type'    => 'text',
    ) );

    $staff->add_field( array(
      'name'    => __( 'Job Scope Detail', 'ukmtheme' ),
      'desc'    => __( 'e.g. Do Multimedia Work', 'ukmtheme' ),
      'id'      => $prefix . 'staff_work_scope_desc',
      'type'    => 'wysiwyg',
      'options' => array( 'textarea_rows' => 5, ),
    ) );
  }