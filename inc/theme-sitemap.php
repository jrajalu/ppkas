<?php
/**
 * @package ppkas
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 * @author Jamaludin Rajalu
 *
 * Sitemaps
 */

function ppkas_html_sitemap() {
$ppkas_sitemap = '';
$published_posts = wp_count_posts('post');

$pages_args = array(
    'exclude'     => '',
    'post_type'   => 'page',
    'post_status' => 'publish'
);

$ppkas_sitemap .= _e( '<h3>Pages</h3>','ppkas' );
$ppkas_sitemap .= '<ul>';
$pages = get_pages($pages_args);
foreach ( $pages as $page ) :
$ppkas_sitemap .= '<li class="pages-list"><a href="'.get_page_link( $page->ID ).'" rel="bookmark">'.$page->post_title.'</a></li>';
endforeach;
$ppkas_sitemap .= '<ul>';

return $ppkas_sitemap;
}

add_shortcode( 'ppkas-sitemap', 'ppkas_html_sitemap' ); // [spp-sitemap]
?>
