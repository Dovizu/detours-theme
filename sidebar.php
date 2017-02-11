<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Reyl Pro
 */

$blog_sidebar = get_theme_mod( 'reyl_pro_blog_sidebar', '1' );

if ( ! is_active_sidebar( 'sidebar-1' ) || '1' == $blog_sidebar && ! isset( $_GET[ 'show_sidebar' ] ) ) {
	return;
}
?>
<aside id="sidebar" class="col-md-4 col-md-offset-1 widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #sidebar -->
