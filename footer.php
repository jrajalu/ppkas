<?php
/**
 * @package PPKAS_UniMAP
 * @version 1.0
 * @author Jamaludin Rajalu
 */
?>
</div><!-- stickyfooter -->
<div class="footer">
  <div class="wrap column">
    <div class="col-5-12 footer-social-icon">
      <h3><?php _e( 'School Links', 'ppkas' ); ?></h3>
        <a href="<?php echo get_option('ppkas_facebook_group'); ?>" class="uk-icon-button uk-icon-facebook"></a>
        <a href="<?php echo get_option('ppkas_yahoo_group'); ?>" class="uk-icon-button uk-icon-yahoo"></a>
        <a href="<?php echo get_option('ppkas_student_blog'); ?>" class="uk-icon-button uk-icon-pagelines"></a>
        <a href="<?php echo get_option('ppkas_persatuan_alumni'); ?>" class="uk-icon-button uk-icon-group"></a>
        <a href="<?php echo get_option('ppkas_green_earth_team'); ?>" class="uk-icon-button uk-icon-globe"></a>
      
    </div>
    <div class="col-7-12 footer-social-icon">
      <h3><?php _e( 'External Links', 'ppkas' ); ?></h3>
      <a href="https://www.malaysia.gov.my" class=""><img src="<?php echo get_template_directory_uri() . '/img/ppkas-logo-jata.png'; ?>" width="70" ></a>
      <a href="http://www.moe.gov.my" class=""><img src="<?php echo get_template_directory_uri() . '/img/ppkas-logo-kpm.png'; ?>" width="70" ></a>
      <a href="http://www.bem.org.my" class=""><img src="<?php echo get_template_directory_uri() . '/img/ppkas-logo-ljm.png'; ?>" width="70" ></a>
      <a href="http://www.mosti.gov.my" class=""><img src="<?php echo get_template_directory_uri() . '/img/ppkas-logo-mosti.png'; ?>" width="70" ></a>
      <a href="http://www.mscmalaysia.my" class=""><img src="<?php echo get_template_directory_uri() . '/img/ppkas-logo-msc.png'; ?>" width="70" ></a>
      <a href="http://www.ptptn.gov.my" class=""><img src="<?php echo get_template_directory_uri() . '/img/ppkas-logo-ptptn.png'; ?>" width="70" ></a> 
    </div>
  </div>
  <div class="footer-copyright">
    <div class="wrap column">
      <div class="col-12-12">
        <p>School Of Environmental Engineering, Universiti Malaysa Perlis, Kompleks Pusat Pengajian Jejawi 3, 02600 Arau, Perlis, MALAYSIA</p>
        <p>Tel: +60 04 979 8626   Fax: +60 04 979 8636    Email: dean_environmental@unimap.edu.my</p>
        <p>Best viewed with Mozilla Firefox and Googe Chrome, 1280 x 768 resolution</p>
      </div>
    </div>
    <div class="wrap column">
      <div class="col-12-12">
        <p><?php _e( 'Copyright &copy;&nbsp;', 'ukmtheme' ); ?><?php echo date( 'Y' ); ?>&nbsp;<?php _e( 'UniMAP The School of Environmental Engineering. All Rights Reserved.', 'ukmtheme' ); ?></p>
      </div>
    </div>
  </div>
</div>
<?php wp_footer(); ?>
<?php echo '<!-- PPKAS v' . wp_get_theme()->get( 'Version' ) . ' -->'; ?>

</body>
</html>