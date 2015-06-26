<?php
/**
 * @package ppkas
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 * @author Jamaludin Rajalu
 *
 * @link http://www.ukm.my/template
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
  register_setting( 'ppkas-settings-group', 'ppkas_facebook' );
  register_setting( 'ppkas-settings-group', 'ppkas_twitter' );
  register_setting( 'ppkas-settings-group', 'ppkas_youtube' );
  register_setting( 'ppkas-settings-group', 'ppkas_instagram' );
  register_setting( 'ppkas-settings-group', 'ppkas_facebook_hide' );
  register_setting( 'ppkas-settings-group', 'ppkas_twitter_hide' );
  register_setting( 'ppkas-settings-group', 'ppkas_youtube_hide' );
  register_setting( 'ppkas-settings-group', 'ppkas_instagram_hide' );
  register_setting( 'ppkas-settings-group', 'ppkas_rss_hide' );
  // Colour
  register_setting( 'ppkas-settings-group', 'ppkas_color_option_1' );
  register_setting( 'ppkas-settings-group', 'ppkas_color_option_2' );
  register_setting( 'ppkas-settings-group', 'ppkas_color_option_3' );
  register_setting( 'ppkas-settings-group', 'ppkas_bg' );
  // Translation
  register_setting( 'ppkas-settings-group', 'ppkas_languages' );
  register_setting( 'ppkas-settings-group', 'ppkas_google_trans' );
  // Visitor Counter
  register_setting( 'ppkas-settings-group', 'ppkas_visitor_counter' );
  register_setting( 'ppkas-settings-group', 'ppkas_visitor_id' );
  // Frontpage Widget
  register_setting( 'ppkas-settings-group', 'ppkas_widget_one' );
  register_setting( 'ppkas-settings-group', 'ppkas_widget_three' );
  register_setting( 'ppkas-settings-group', 'ppkas_widget_four' );
  register_setting( 'ppkas-settings-group', 'ppkas_widget_latest_news' );
  register_setting( 'ppkas-settings-group', 'ppkas_widget_custom' );
  register_setting( 'ppkas-settings-group', 'ppkas_widget_facebook' );
  register_setting( 'ppkas-settings-group', 'ppkas_widget_event' );
  register_setting( 'ppkas-settings-group', 'ppkas_widget_tabber' );
  register_setting( 'ppkas-settings-group', 'ppkas_widget_slideset' );
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
  <h3 class="title"><?php _e( 'General', 'ppkas' ); ?></h3>
  <hr>
  <p>Masukkan perincian di bawah mengikut keperluan.</p>
    <table class="form-table">
      <tbody>
        <tr valign="top">
          <th scope="row">
          <?php _e( 'Frontpage Layout', 'ppkas' ); ?><br/>
          </th>

          <td>
            <?php
              $widget_one_box       = get_option('ppkas_widget_one');
              $widget_three_box     = get_option('ppkas_widget_three');
              $widget_four_box      = get_option('ppkas_widget_four');
              $widget_latest_news   = get_option('ppkas_widget_latest_news');
              $widget_facebook      = get_option('ppkas_widget_facebook');
              $widget_event         = get_option('ppkas_widget_event');
              $widget_tabber        = get_option('ppkas_widget_tabber');
              $widget_slideset      = get_option('ppkas_widget_slideset');
            ?>
            <p class="description"><?php _e( 'Tandakan yang perlu sahaja. Untuk Facebook Like Box, masukkan url Facebook di ruangan Social Link.'); ?></p><br>
            <input id='checkbox' name='ppkas_widget_latest_news' type='checkbox' value="latest-news" <?php echo ( 'latest-news' == $widget_latest_news ) ? 'checked="checked"' : ''; ?> />
            <label class="description" for="ppkas_widget_latest_news"><?php _e( 'Latest News with Sidebar', 'ppkas' ); ?></label><br/>
            <input id='checkbox' name='ppkas_widget_one' type='checkbox' value="box-one-column" <?php echo ( 'box-one-column' == $widget_one_box ) ? 'checked="checked"' : ''; ?> />
            <label class="description" for="ppkas_widget_one"><?php _e( 'One Column Box', 'ppkas' ); ?></label><br/>
            <input id='checkbox' name='ppkas_widget_three' type='checkbox' value="box-three-column" <?php echo ( 'box-three-column' == $widget_three_box ) ? 'checked="checked"' : ''; ?> />
            <label class="description" for="ppkas_widget_three"><?php _e( 'Three Column Box', 'ppkas' ); ?></label><br/>
            <input id='checkbox' name='ppkas_widget_four' type='checkbox' value="box-four-column" <?php echo ( 'box-four-column' == $widget_four_box ) ? 'checked="checked"' : ''; ?> />
            <label class="description" for="ppkas_widget_four"><?php _e( 'Four Column Box', 'ppkas' ); ?></label><br/>
            <input id='checkbox' name='ppkas_widget_event' type='checkbox' value="event-slider" <?php echo ( 'event-slider' == $widget_event ) ? 'checked="checked"' : ''; ?> />
            <label class="description" for="ppkas_widget_event"><?php _e( 'Event Slider', 'ppkas' ); ?></label><br/>
            <input id='checkbox' name='ppkas_widget_tabber' type='checkbox' value="tabber" <?php echo ( 'tabber' == $widget_tabber ) ? 'checked="checked"' : ''; ?> />
            <label class="description" for="ppkas_widget_tabber"><?php _e( 'Tabber', 'ppkas' ); ?></label><br/>
            <input id='checkbox' name='ppkas_widget_facebook' type='checkbox' value="facebook" <?php echo ( 'facebook' == $widget_facebook ) ? 'checked="checked"' : ''; ?> />
            <label class="description" for="ppkas_widget_facebook"><?php _e( 'Facebook Like Box', 'ppkas' ); ?></label><br/>
            <input id='checkbox' name='ppkas_widget_slideset' type='checkbox' value="slideset" <?php echo ( 'slideset' == $widget_slideset ) ? 'checked="checked"' : ''; ?> />
            <label class="description" for="ppkas_widget_slideset"><?php _e( 'Slideset', 'ppkas' ); ?></label><br/>
          </td>
        </tr>
        <!-- Language Switcher -->
        <tr valign="top">
        <th scope="row"><?php _e('Language Switcher','ppkas'); ?></th>
        <td>
          <?php
            $widget_polylang          = get_option('ppkas_languages');
            $widget_google_translate  = get_option('ppkas_google_trans');
          ?>
          <input id='checkbox' name='ppkas_google_trans' type='checkbox' value="google-translate" <?php echo ( 'google-translate' == $widget_google_translate ) ? 'checked="checked"' : ''; ?> />
          <label class="description" for="ppkas_google_trans"><?php _e( 'Google Translator', 'ppkas' ); ?></label><br/>
          <input id='checkbox' name='ppkas_languages' type='checkbox' value="polylang" <?php echo ( 'polylang' == $widget_polylang ) ? 'checked="checked"' : ''; ?> />
          <label class="description" for="ppkas_languages"><?php _e( 'Polylang Language Switcher', 'ppkas' ); ?></label><br/>
          <p class="description"><?php _e( 'Enable language menu. Do not enable this feature if the "Polylang" and "Google Translator" plugin is not activated.', 'ppkas' ); ?></p>
        </td>
        </tr>
        <!-- Visitor Counter -->
        <tr valign="top">
        <th scope="row"><?php _e('Visitor Counter','ppkas'); ?></th>
        <td>
        <?php
          $visitor_counter  = get_option('ppkas_visitor_counter');
        ?>
        <input id='checkbox' name='ppkas_visitor_counter' type='checkbox' value="counter" <?php echo ( 'counter' == $visitor_counter ) ? 'checked="checked"' : ''; ?> />
        <label class="description" for="ppkas_visitor_counter"><?php _e( 'Papar jumlah pengunjung di bahagian Footer' ); ?></label><br/>
        <p class="description"><?php _e( 'Masukkan id yang telah dijana. Rujuk link yang disediakan', 'ppkas' ); ?></p>
        <input type="text" name="ppkas_visitor_id" value="<?php echo get_option('ppkas_visitor_id'); ?>" class="regular-text" placeholder="768059" />
        <p class="description"><a class="thickbox" href="<?php echo get_template_directory_uri(); ?>/img/site_counter_sample.png"><?php _e( 'View sample', 'ppkas' ); ?></a>
        &nbsp;|&nbsp;<?php _e( 'Generate your id', 'ppkas' ); ?>&nbsp;<a href="http://www.supercounters.com/hitcounter?tab=plugin-information&amp;plugin=simple-comment-editing&amp;TB_iframe=true&amp;width=830&amp;height=565" class="thickbox" title="www.supercounter.com">here</a></p>
        </td>
        </tr>
      </tbody>
    </table>
    <h3 class="title"><?php _e( 'Social Links', 'ppkas' ); ?></h3>
    <hr>
    <p><?php _e( 'Pautan capaian ke laman Facebook, Twitter dan Youtube rasmi UKM atau PTJ. Masukkan url lengkap seperti keterangan di bawah.', 'ppkas' ); ?></p>
    <table class="form-table">
      <tbody>
        <tr valign="top">
        <th scope="row">Facebook</th>
        <td><input type="text" name="ppkas_facebook" value="<?php echo get_option('ppkas_facebook'); ?>" class="regular-text" placeholder="https://www.facebook.com/ptmukm" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Twitter</th>
        <td><input type="text" name="ppkas_twitter" value="<?php echo get_option('ppkas_twitter'); ?>" class="regular-text" placeholder="https://www.twitter.com/ptmukm" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Youtube</th>
        <td>
          <input type="text" name="ppkas_youtube" value="<?php echo get_option('ppkas_youtube'); ?>" class="regular-text" placeholder="http://www.youtube.com/user/ptmukm" />
        </td>
        </tr>

        <tr valign="top">
        <th scope="row">Instagram</th>
        <td>
          <input type="text" name="ppkas_instagram" value="<?php echo get_option('ppkas_instagram'); ?>" class="regular-text" placeholder="http://instagram.com/jrajalu" />
          <p class="description"><?php _e( 'Enter full url e.g: https://www.twitter.com/ukmnewsportal', 'ppkas' ); ?></p>
        </td>
        </tr>
        <!-- hide social media icon on footer -->
        <tr valign="top">
        <th scope="row"><?php _e( 'Hide Social Media Icon','ppkas' ); ?></th>
        <td>
          <?php
            $hide_facebook    = get_option('ppkas_facebook_hide');
            $hide_twitter     = get_option('ppkas_twitter_hide');
            $hide_youtube     = get_option('ppkas_youtube_hide');
            $hide_instagram   = get_option('ppkas_instagram_hide');
            $hide_rss         = get_option('ppkas_rss_hide');
          ?>
          <p class="description"><?php _e( 'Sorok ikon social media di bahagian footer'); ?></p><br>
          <input id='checkbox' name='ppkas_facebook_hide' type='checkbox' value="hidden" <?php echo ( 'hidden' == $hide_facebook ) ? 'checked="checked"' : ''; ?> />
          <label class="description" for="ppkas_facebook_hide"><?php _e( 'Facebook', 'ppkas' ); ?></label><br/>

          <input id='checkbox' name='ppkas_twitter_hide' type='checkbox' value="hidden" <?php echo ( 'hidden' == $hide_twitter ) ? 'checked="checked"' : ''; ?> />
          <label class="description" for="ppkas_twitter_hide"><?php _e( 'Twitter', 'ppkas' ); ?></label><br/>

          <input id='checkbox' name='ppkas_youtube_hide' type='checkbox' value="hidden" <?php echo ( 'hidden' == $hide_youtube ) ? 'checked="checked"' : ''; ?> />
          <label class="description" for="ppkas_youtube_hide"><?php _e( 'YouTube', 'ppkas' ); ?></label><br/>

          <input id='checkbox' name='ppkas_instagram_hide' type='checkbox' value="hidden" <?php echo ( 'hidden' == $hide_instagram ) ? 'checked="checked"' : ''; ?> />
          <label class="description" for="ppkas_instagram_hide"><?php _e( 'Instagram', 'ppkas' ); ?></label><br/>

          <input id='checkbox' name='ppkas_rss_hide' type='checkbox' value="hidden" <?php echo ( 'hidden' == $hide_rss ) ? 'checked="checked"' : ''; ?> />
          <label class="description" for="ppkas_rss_hide"><?php _e( 'RSS', 'ppkas' ); ?></label><br/>
        </td>
        </tr>
      </tbody>
    </table>
    <h3 class="title"><?php _e( 'Colour Options', 'ppkas' ); ?></h3>
    <hr>
    <p><?php _e( 'Colour option for style switcher.', 'ppkas' ); ?></p>
    <table class="form-table">
      <tbody>

      <?php $theme_one    = get_option('ppkas_color_option_1'); ?>
      <?php $theme_two    = get_option('ppkas_color_option_2'); ?>
      <?php $theme_three  = get_option('ppkas_color_option_3'); ?>

        <tr valign="top">
        <th scope="row"><?php _e('Option 1','ppkas'); ?></th>
        <td>
          <input type="text" name="ppkas_color_option_1" value="<?php if ( isset( $theme_one ) ) echo $theme_one; ?>" class="theme-one" data-default-color="#d10000" />
        </td>
        </tr>
        <tr valign="top">
        <th scope="row"><?php _e('Option 2','ppkas'); ?></th>
        <td>
          <input type="text" name="ppkas_color_option_2" value="<?php if ( isset( $theme_two ) ) echo $theme_two; ?>" class="theme-two" data-default-color="#0095d9" />
        </td>
        </tr>
        <tr valign="top">
        <th scope="row"><?php _e('Option 3','ppkas'); ?></th>
        <td>
          <input type="text" name="ppkas_color_option_3" value="<?php if ( isset( $theme_three ) ) echo $theme_three; ?>" class="theme-three" data-default-color="#494949" />
        </td>
        </tr>
      </tbody>
    </table>

<?php submit_button(); ?>

</form>
</div>
<?php } ?>
