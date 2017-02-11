<?php
/*
Template Name: Contact
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
		<?php
		$google_api_key = get_theme_mod( 'reyl_pro_map_key' );
		if ( !empty( $google_api_key ) ) {
		    echo '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=' . esc_attr( $google_api_key ) . '&sensor=false"></script>';
		?>

		<script type="text/javascript">
		    //When the window has finished loading create our google map below
		    google.maps.event.addDomListener(window, 'load', init);

		    function init() {
		        // Basic options for a simple Google Map
		        // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
		        var mapOptions = {
		            // How zoomed in you want the map to start at (always required)
		            zoom: parseInt('<?php echo absint( get_theme_mod( 'reyl_pro_map_zoom', '13' ) ) ; ?>'),

		            // The latitude and longitude to center the map (always required)
		            center: new google.maps.LatLng( <?php echo get_theme_mod( 'reyl_pro_map_lat_long', '40.725987, -74.002447' ) ; ?>), // New York

		            // How you would like to style the map. 
		            // This is where you would paste any style found on Snazzy Maps.
		            styles: [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}]
		        };

		        // Get the HTML DOM element that will contain your map 
		        // We are using a div with id="map" seen below in the <body>
		        var mapElement = document.getElementById('map');

		        // Create the Google Map using our element and options defined above
		        var map = new google.maps.Map(mapElement, mapOptions);

		        // Let's also add a marker while we're at it
		        var marker = new google.maps.Marker({
		            position: new google.maps.LatLng(<?php echo get_theme_mod( 'reyl_pro_map_lat_long', '40.725987, -74.002447' ); ?>),
		            map: map,
		            title: 'Snazzy!'
		        });
		    }
		</script>
		<div id="map-section" class="map-section">
		   <div id="map" class="map-wrap"></div>
		</div><!-- map-section -->
		<?php
		}//if map key
		?>

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="row">
					<div class="col-md-6">

						<?php get_template_part( 'template-parts/content', 'page' ); ?>
						
						<div class="contact-page-social">
							<h4><?php esc_html_e( 'Social', 'reyl-pro' ); ?></h4>
							<?php get_template_part( '/template-parts/social-menu', 'contact-page' ); ?>
						</div>
					</div>
					<div class="col-md-6">
						<?php
						if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'contact-form' ) ) {
							echo do_shortcode( '
								[contact-form]
								[contact-field label="Name" type="name" required="true" /]
								[contact-field label="Email" type="email" required="true" /]
								[contact-field label="Comment" type="textarea" required="true" /]
								[/contact-form]
								' );
						};
						?>
					</div>
				</div>

				

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>
		
			<div class="clearfix"></div>

	</main><!-- #main -->

<?php get_footer(); ?>