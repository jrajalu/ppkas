<?php
/**
 * @package ppkas
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
      'title'         => __( 'Gallery Detail', 'ppkas' ),
      'object_types'  => array( 'gallery', ),
      'context'       => 'normal',
      'priority'      => 'high',
      'show_names'    => true,
    ) );

    $gallery->add_field( array(
      'name'    => __( 'Gallery Cover Image', 'ppkas' ),
      'desc'    => __( 'Upload an image or enter a URL. dimensions of the image should be 300x300 pixels.', 'ppkas' ),
      'id'      => $prefix . 'gallery_cover',
      'type'    => 'file',
      'allow'   => array('url'),
    ) );

    $gallery->add_field( array(
      'name'    => __( 'Date', 'ppkas' ),
      'desc'    => __( 'Gallery Date', 'ppkas' ),
      'id'      => $prefix . 'gallery_date',
      'type'    => 'text_date',
    ) );

    $gallery->add_field( array(
      'name'    => __( 'Phographer', 'ppkas' ),
      'desc'    => __( 'Photo by', 'ppkas' ),
      'id'      => $prefix . 'gallery_photographer',
      'type'    => 'text',
    ) );

    $gallery->add_field( array(
      'name'         => __( 'Image', 'ppkas' ),
      'desc'         => __( 'Upload or add multiple images/attachments.', 'ppkas' ),
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
      'title'         => __( 'Slideshow Detail', 'ppkas' ),
      'object_types'  => array( 'slideshow' ),
      'context'       => 'normal',
      'priority'      => 'high',
      'show_names'    => true,
    ) );

    $slideshow->add_field( array(
      'name'    => __( 'Image', 'ppkas' ),
      'desc'    => __( 'Upload an image or enter a URL. dimensions of the image should be 2550x996 pixels.', 'ppkas' ),
      'id'      => $prefix . 'slideshow_image',
      'type'    => 'file',
      'allow'   => array('url'),
    ) );

    $slideshow->add_field( array(
      'name'    => __( 'Caption', 'ppkas' ),
      'desc'    => __( 'Some caption for the image.', 'ppkas' ),
      'id'      => $prefix . 'slideshow_caption',
      'type'    => 'textarea',
    ) );

    $slideshow->add_field( array(
      'name'    => __( 'Link', 'ppkas' ),
      'desc'    => __( 'links to posts, pages or external web.', 'ppkas' ),
      'id'      => $prefix . 'slideshow_link',
      'type'    => 'text',
    ) );

    $slideshow->add_field( array(
      'name'    => __( 'Hide Caption', 'ppkas' ),
      'desc'    => __( 'Hide slideshow caption', 'ppkas' ),
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
      'title'         => __( 'Publication Detail', 'ppkas' ),
      'object_types'  => array( 'publication', ),
      'context'       => 'normal',
      'priority'      => 'high',
      'show_names'    => true,
    ) );

    $publication->add_field( array(
      'name'    => __( 'Cover Image', 'ppkas' ),
      'desc'    => __( 'Upload an image or enter a URL. dimensions of the image should be 300x380 pixels.', 'ppkas' ),
      'id'      => $prefix . 'publication_cover',
      'type'    => 'file',
      'allow'   => array('url'),
    ) );

    $publication->add_field( array(
      'name'    => __( 'Author', 'ppkas' ),
      'desc'    => __( 'e.g. Jamaludin Rajalu', 'ppkas' ),
      'id'      => $prefix . 'publication_author',
      'type'    => 'text',
    ) );

    $publication->add_field( array(
      'name'    => __( 'Publisher', 'ppkas' ),
      'desc'    => __( 'e.g. Pusat Teknologi Maklumat', 'ppkas' ),
      'id'      => $prefix . 'publication_publisher',
      'type'    => 'text',
    ) );

    $publication->add_field( array(
      'name'    => __( 'Year', 'ppkas' ),
      'desc'    => __( 'e.g. 2014', 'ppkas' ),
      'id'      => $prefix . 'publication_year',
      'type'    => 'text',
    ) );

    $publication->add_field( array(
      'name'    => __( 'Number of Pages', 'ppkas' ),
      'desc'    => __( 'e.g. 199', 'ppkas' ),
      'id'      => $prefix . 'publication_pages',
      'type'    => 'text',
    ) );

    $publication->add_field( array(
      'name'    => __( 'Reference/Download', 'ppkas' ),
      'desc'    => __( 'e.g. http://www.ukm.my', 'ppkas' ),
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
      'title'         => __( 'Staff Detail', 'ppkas' ),
      'object_types'  => array( 'staff', ),
      'context'       => 'normal',
      'priority'      => 'high',
      'show_names'    => true,
    ) );

    $staff->add_field( array(
      'name'    => __( 'Staff Photo', 'ppkas' ),
      'desc'    => __( 'Upload an image or enter a URL. dimensions of the image should be 300x380 pixels.', 'ppkas' ),
      'id'      => $prefix . 'staff_photo',
      'type'    => 'file',
      'allow'   => array('url'),
    ) );

    $staff->add_field( array(
      'name'    => __( 'Phone No.', 'ppkas' ),
      'desc'    => __( 'e.g. 04-979-8636', 'ppkas' ),
      'id'      => $prefix . 'staff_phone',
      'type'    => 'text',
    ) );

    $staff->add_field( array(
      'name'    => __( 'Email', 'ppkas' ),
      'desc'    => __( 'e.g. user@unimap.edu.my', 'ppkas' ),
      'id'      => $prefix . 'staff_email',
      'type'    => 'text_email',
    ) );

    $staff->add_field( array(
      'name'    => __( 'Show Curriculum Vitae Link', 'ppkas' ),
      'desc'    => __( 'Show Curriculum Vitae Link', 'ppkas' ),
      'id'      => $prefix . 'staff_cv_link',
      'type'    => 'checkbox',
    ) );

    $staff->add_field( array(
      'name'    => __( 'Show Curriculum Vitae Details', 'ppkas' ),
      'desc'    => __( 'Show Curriculum Vitae Details', 'ppkas' ),
      'id'      => $prefix . 'staff_cv_details',
      'type'    => 'checkbox',
    ) );

    $staff->add_field( array(
      'name'    => __( 'Academic Qualifications', 'ppkas' ),
      'desc'    => __( 'Academic Qualifications Details', 'ppkas' ),
      'id'      => $prefix . 'staff_cv_academic_qualifications',
      'type'    => 'wysiwyg',
      'options' => array( 'textarea_rows' => 5, ),
    ) );

    $staff->add_field( array(
      'name'    => __( 'Current Professional Membership', 'ppkas' ),
      'desc'    => __( 'Current Professional Membership Details', 'ppkas' ),
      'id'      => $prefix . 'staff_cv_current_professional_membership',
      'type'    => 'wysiwyg',
      'options' => array( 'textarea_rows' => 5, ),
    ) );

    $staff->add_field( array(
      'name'    => __( 'Current Teaching and Administrative Responsibilities', 'ppkas' ),
      'desc'    => __( 'Current Teaching and Administrative Responsibilities Details', 'ppkas' ),
      'id'      => $prefix . 'staff_cv_current_teaching_and_administrative_responsibilities',
      'type'    => 'wysiwyg',
      'options' => array( 'textarea_rows' => 5, ),
    ) );

    $staff->add_field( array(
      'name'    => __( 'Previous Employment', 'ppkas' ),
      'desc'    => __( 'Previous Employment Details', 'ppkas' ),
      'id'      => $prefix . 'staff_cv_previous_employment',
      'type'    => 'wysiwyg',
      'options' => array( 'textarea_rows' => 5, ),
    ) );

    $staff->add_field( array(
      'name'    => __( 'Conferences and Training', 'ppkas' ),
      'desc'    => __( 'Conferences and Training Details', 'ppkas' ),
      'id'      => $prefix . 'staff_cv_conferences_and_training',
      'type'    => 'wysiwyg',
      'options' => array( 'textarea_rows' => 5, ),
    ) );

    $staff->add_field( array(
      'name'    => __( 'Research and Publications', 'ppkas' ),
      'desc'    => __( 'Research and Publications Details', 'ppkas' ),
      'id'      => $prefix . 'staff_cv_research_and_publications',
      'type'    => 'wysiwyg',
      'options' => array( 'textarea_rows' => 5, ),
    ) );

    $staff->add_field( array(
      'name'    => __( 'Consultancy', 'ppkas' ),
      'desc'    => __( 'Consultancy Details', 'ppkas' ),
      'id'      => $prefix . 'staff_cv_consultancy',
      'type'    => 'wysiwyg',
      'options' => array( 'textarea_rows' => 5, ),
    ) );

    $staff->add_field( array(
      'name'    => __( 'Community Service', 'ppkas' ),
      'desc'    => __( 'Community Service Details', 'ppkas' ),
      'id'      => $prefix . 'staff_cv_community_service',
      'type'    => 'wysiwyg',
      'options' => array( 'textarea_rows' => 5, ),
    ) );

    $staff->add_field( array(
      'name'    => __( 'Other Relevant Information', 'ppkas' ),
      'desc'    => __( 'Other Relevant Information Details', 'ppkas' ),
      'id'      => $prefix . 'staff_cv_other_relevant_information',
      'type'    => 'wysiwyg',
      'options' => array( 'textarea_rows' => 5, ),
    ) );

  }
