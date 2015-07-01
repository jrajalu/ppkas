<?php
/**
 * @package PPKAS_UniMAP
 * @version 1.0
 * @author Jamaludin Rajalu
 */
?>
</div><!-- stickyfooter -->
<div class="footer">
  <div class="wrap">
    <div class="uk-grid uk-grid-divider" data-uk-grid-match="">
      <?php if (dynamic_sidebar( 'sidebar-5' )) : else : ?><?php endif; ?>
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