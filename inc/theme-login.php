<?php
/**
 * @package ppkas
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 * @author Jamaludin Rajalu
 *
 * @link http://codex.wordpress.org/Customizing_the_Login_Form
 */
function ppkas_login_logo() { ?>
  <style type="text/css">
  body.login div#login h1 a {
    background-image: none, url("<?php echo get_stylesheet_directory_uri(); ?>/img/logo-login.png");
    background-size: 320px 80px;
    background-position: center top;
    background-repeat: no-repeat;
    color: #999;
    height: 80px;
    font-size: 20px;
    font-weight: 400;
    line-height: 1.3em;
    margin: 0 auto 25px;
    padding: 0;
    text-decoration: none;
    width: 320px;
    text-indent: -9999px;
    outline: 0 none;
    overflow: hidden;
    display: block;
  }
  body.login {
    background: #5F6076;
  }
  .login form {
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
  }
  </style>
<?php }
add_action( 'login_enqueue_scripts', 'ppkas_login_logo' );

function ppkas_login_logo_url() {
  return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'ppkas_login_logo_url' );

function ppkas_login_logo_url_title() {
  return get_bloginfo( 'name' );
}
add_filter( 'login_headertitle', 'ppkas_login_logo_url_title' );
