<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 * @author Jamaludin Rajalu
 */
 ?>
<a href="#main-tools" class="main-nav-menu-icon" data-uk-offcanvas ><i class="uk-icon-cog"></i></a>
<div id="main-tools" class="uk-offcanvas">
  <div class="uk-offcanvas-bar offcanvas-tools">
    <div class="column">
      <h4><?php _e( 'Theme', 'ukmtheme' ); ?></h4>
       <ul class="theme-switcher">
         <li><a href="#" style="background:<?php echo get_option('ukmtheme_color_option_1'); ?>;" class="button-reset-color"></a></li>
         <li><a href="#" style="background:<?php echo get_option('ukmtheme_color_option_2'); ?>;" class="button-option-2"></a></li>
         <li><a href="#" style="background:<?php echo get_option('ukmtheme_color_option_3'); ?>;" class="button-option-3"></a></li>
       </ul>
    </div>
    <?php
      $widget_google_translate = get_option( 'ukmtheme_google_trans' );
      $widget_polylang = get_option( 'ukmtheme_languages' );
      get_template_part( 'templates/widget', $widget_polylang );
      get_template_part( 'templates/widget', $widget_google_translate );
    ?>
  </div>
</div>