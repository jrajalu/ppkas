<?php
/**
 * @package PPKAS_UniMAP
 * @version 1.0
 * @author Jamaludin Rajalu
 * 
 * @link http://codex.wordpress.org/Creating_Options_Pages
 * @link http://themeshaper.com/2010/06/03/sample-theme-options/
 */

// create custom plugin settings menu
add_action('admin_menu', 'ppkas_create_menu');

function ppkas_create_menu() {
  // create theme option menu
  add_theme_page( __( 'Theme Options', 'ppkas' ), __( 'Theme Options', 'ppkas' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page', 'dashicons-admin-generic', 55 );

  // call register settings function
  add_action( 'admin_init', 'register_ppkas_settings' );
}

function register_ppkas_settings() {
  /**
   * Theme Option settings
   */

  // Social Media
  register_setting( 'ppkas-settings-group', 'ppkas_facebook_group' );
  register_setting( 'ppkas-settings-group', 'ppkas_yahoo_group' );
  register_setting( 'ppkas-settings-group', 'ppkas_student_blog' );
  register_setting( 'ppkas-settings-group', 'ppkas_persatuan_alumni' );
  register_setting( 'ppkas-settings-group', 'ppkas_green_earth_team' );

}

function theme_options_do_page() { ?>
<div class="wrap">
<h2><?php _e( 'Theme Options', 'ppkas' ); ?></h2>
<?php if( isset($_GET['settings-updated']) ) { ?>
  <div id="message" class="updated">
    <p><strong><?php _e('Settings saved.') ?></strong></p>
  </div>
<?php } ?>
<form method="post" action="options.php">
  <?php settings_fields( 'ppkas-settings-group' ); ?>
  <?php do_settings_sections( 'ppkas-settings-group' ); ?>
    <h3 class="title"><?php _e( 'School Links URL', 'ppkas' ); ?></h3>
    <hr>
    <table class="form-table">
      <tbody>
        <tr valign="top">
        <th scope="row">Facebook Group</th>
        <td><input type="text" name="ppkas_facebook_group" value="<?php echo get_option('ppkas_facebook_group'); ?>" class="regular-text" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Yahoo Group</th>
        <td><input type="text" name="ppkas_yahoo_group" value="<?php echo get_option('ppkas_yahoo_group'); ?>" class="regular-text"  /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Student Blog</th>
        <td><input type="text" name="ppkas_student_blog" value="<?php echo get_option('ppkas_student_blog'); ?>" class="regular-text" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Persatuan Alumni PPKAS</th>
        <td><input type="text" name="ppkas_persatuan_alumni" value="<?php echo get_option('ppkas_persatuan_alumni'); ?>" class="regular-text" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Green Earth Team</th>
        <td><input type="text" name="ppkas_green_earth_team" value="<?php echo get_option('ppkas_green_earth_team'); ?>" class="regular-text" /></td>
        </tr>
      </tbody>
    </table>

<?php submit_button(); ?>

</form>
</div>
<?php } ?>
