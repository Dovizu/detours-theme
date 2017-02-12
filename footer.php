<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Reyl Pro
 */

?>

        <div class="clearfix"></div>
    </div><!-- /row -->
            
</div><!-- /#container -->



    <?php
    $footer_sections = array(
                            'first-footer-widgets' => false, 
                            'second-footer-widgets' => false, 
                            'third-footer-widgets' => false, 
                            'fourth-footer-widgets' => false, 
                        );
    $footer_count = 0;
    $footer_section_class = "";

    foreach ( $footer_sections as $footer_section => $active ) {
        if ( is_active_sidebar( $footer_section ) ) { 
            $footer_sections[$footer_section] = true;
            $footer_count++;
        }//if is_active_sidebar
    }//for each

    switch ( $footer_count ) {
        case 1:
            $footer_section_class = "col-md-12";
            break;
        case 2:
            $footer_section_class = "col-md-6 col-sm-6";
            break;
        case 3:
            $footer_section_class = "col-md-4 col-sm-4";
            break;
        case 4:
            $footer_section_class = "col-md-3 col-sm-6";
            break;
        default:
            $footer_section_class = "col-md-3 col-sm-6";
            break;
    }

    /*
    *Only show the Footer sections that have widgets
    */
    if ( $footer_count > 0 ) {
    ?>

    <footer id="footer" class="site-footer" role="contentinfo">
        <div class="container">
            <div class="row">

                <?php
                foreach ($footer_sections as $footer_section => $active) {
                    if ($active) {
                        echo '<div class="' . esc_attr( $footer_section_class ) . '">';

                            if ( is_active_sidebar( $footer_section ) ) { if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( $footer_section ) ) : else : 

                            endif; }//if is_active_sidebar

                        echo '</div>';
                    }//if active
                }//for each
                ?>

            </div><!-- .row -->
        </div><!-- .container -->
    </footer><!-- #footer -->
    <?php
    }//if footer_count
    ?>



	<div class="sub-footer">
        <div class="container">
            <div class="row">

                <div class="col-md-5">
                    <p>
                    <?php esc_html_e( '&copy;', 'reyl-pro' ); echo ' ' . date('Y') . ' ' . get_bloginfo( 'name' );  ?>.
                    </p>
                </div>
                <div class="col-md-7">
                    <?php get_template_part( '/template-parts/social-menu', 'footer' ); ?>
                </div>

            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .sub-footer -->


<?php wp_footer(); ?>

</body>
</html>