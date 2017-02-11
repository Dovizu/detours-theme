<?php
/*
Template Name: Gallery
*/
?>
<?php
/**
 * The template for displaying a full width page (no sidebar).
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Reyl Pro
 */

get_header(); ?>

	<main id="main" class="site-main col-md-10 col-md-offset-1" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<header class="entry-header">
					<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php 
                	//Remove the original Gallery Shortcode from the content
                	function ql_remove_gallery($content) {
						$patron = '/\[(\[?)(gallery)(?![\w-])([^\]\/]*(?:\/(?!\])[^\]\/]*)*?)(?:(\/)\]|\](?:([^\[]*+(?:\[(?!\/\2\])[^\[]*+)*+)\[\/\2\])?)(\]?)/';
						return preg_replace($patron, '', $content);
					}
					add_filter( 'the_content', 'ql_remove_gallery'); 
					//------------------------------------------------------<
                	?>
					<?php the_content(); ?>



					<div id="ql_gallery_container" class="ql_gallery_container">

                        <?php

                    	$post_content = get_the_content();
						preg_match( '/\[gallery.*ids=.(.*).\]/', $post_content, $ids );
						$array_id = explode( ",", $ids[1] );


						if ( count( $array_id ) > 1 ) {
							foreach ( $array_id as $image_id ) {

								$image_data = wp_get_attachment_metadata( $image_id );
								?>

								<div class="ql_gallery-item" id="ql_gallery-item-<?php echo esc_attr( $image_id ); ?>">

								<?php
								$featured_image = wp_get_attachment_image_src( $image_id, 'full');
								echo '<a href="'. esc_url( $featured_image[0] ) .'" data-width="'. $image_data['width'] .'" data-height="'. $image_data['height'] .'" class="ql_thumbnail_hover">';


									$cropped_image = wp_get_attachment_image_src( $image_id, 'reyl_pro_gallery' );
									//echo "<img class='ql-slider-image' src='".$cropped_image[0] . "' />";
									echo "<img class=''  src='" . $cropped_image[0] . "' />";
									;
										

								?>
									</a>

	                    			<div class="clearfix"></div>
	                                
	                            </div><!-- /ql_gallery-item -->
	                        <?php
										
							}//foreach	

							
						}//count


                        								
						?>
					</div> <!-- #ql_gallery_container -->
					<div class="clearfix"></div>










					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'reyl-pro' ),
							'after'  => '</div>',
						) );
					?>
				</div><!-- .entry-content -->

				<footer class="entry-footer">
					<?php
						edit_post_link(
							sprintf(
								/* translators: %s: Name of current post */
								esc_html__( 'Edit %s', 'reyl-pro' ),
								the_title( '<span class="screen-reader-text">"', '"</span>', false )
							),
							'<span class="edit-link">',
							'</span>'
						);
					?>
				</footer><!-- .entry-footer -->
			</article><!-- #post-## -->

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->

<?php get_footer(); ?>
