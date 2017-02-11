<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Reyl Pro
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- WP_Head -->
<?php wp_head(); ?>
<!-- End WP_Head -->

</head>

<body <?php body_class(); ?>>
    <?php
    $header_image = "";
    if ( get_header_image() ){
        $header_image = 'style="background-image: url(' . get_header_image() . ');"';
    }
    ?>
	<header id="header" class="site-header" role="banner" <?php echo $header_image; ?>>
		<div class="container">
        	<div class="row">

        		<div class="logo_container col-md-5">
                     <?php
                    $logo = '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home" class="ql_logo">' . get_bloginfo( 'name' ) . '</a>';
                    if ( has_custom_logo() ) {
                        $logo = get_custom_logo();
                    }
                    ?>
                    <?php if ( is_front_page() && is_home() ) : ?>
                        <h1 class="site-title"><?php echo $logo; ?></h1>
                    <?php else : ?>
                        <p class="site-title"><?php echo $logo; ?></p>
                    <?php endif; ?>
                    <?php
                    $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                        <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                    <?php
                    endif; ?>
                </div><!-- /logo_container -->

                <button id="ql_nav_btn" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ql_nav_collapse" aria-expanded="false">
                    <i class="fa fa-navicon"></i>
                </button>


                <div class="col-md-7">
                	<div class="collapse navbar-collapse" id="ql_nav_collapse">
                        <nav id="jqueryslidemenu" class="jqueryslidemenu navbar " role="navigation">
                            <?php
                            wp_nav_menu( array(                     
                                'theme_location'  => 'primary',
                                'menu_id' => 'primary-menu',
                                'depth'             => 3,
                                'menu_class'        => 'nav',
                                'fallback_cb'       => 'reyl_pro_wp_bootstrap_navwalker::fallback',
                                'walker'            => new reyl_pro_wp_bootstrap_navwalker()
                            ));
                            ?>
                        </nav>
                    </div><!-- /ql_nav_collapse -->
                </div><!-- /col-md-7 -->

                <div class="clearfix"></div>

        	</div><!-- row-->
        </div><!-- /container -->
	</header>
	<div class="clearfix"></div>
    

    <div id="container" class="container">
        <div class="row">