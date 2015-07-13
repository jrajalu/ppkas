<?php
/**
 * @package PPKAS_UniMAP
 * @version 1.0
 * @author Jamaludin Rajalu
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="page-wrap">
<header class="header-wrap theme-color">
  <div class="header">
    <div class="wrap column">
      <div class="col-12-12 sm-hidden">
        <a href="<?php echo bloginfo( 'url' ); ?>">
          <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
        </a>
      </div>
  </div>

  <div class="main-nav">
    <div class="wrap column">
      <div class="col-11-12">
        <?php
          wp_nav_menu(array(
            'theme_location'    => 'main',
            'menu'              => 'Main Navigation',
            'container_id'      => 'cssmenu',
            'fallback_cb'       => false,
            'walker'            => new CSS_Menu_Maker_Walker()
          ));
        ?>
      </div>
      <div class="col-1-12 sm-hidden">
      <?php get_template_part( 'templates/off', 'canvas-search' );?>
      </div>
    </div>
  </div>
</header>

<?php if ( is_home() ) { get_template_part( 'templates/slideshow', 'uikit' ); } else {/** Frontpage Slideshow */} ?>