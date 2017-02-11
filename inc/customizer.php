<?php
/**
 * Reyl Pro Theme Customizer.
 *
 * @package Reyl Pro
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function reyl_pro_customize_register( $wp_customize ) {


	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


	/*
    Colors
    ===================================================== */

		/*
		Text
		------------------------------ */
		$wp_customize->add_setting( 'reyl_pro_text_color', array( 'default' => '#8c8c8c', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_hex_color', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'reyl_pro_text_color', array(
			'label'        => esc_attr__( 'Text Color', 'reyl-pro' ),
			'section'    => 'colors',
		) ) );

		/*
		Link
		------------------------------ */
		$wp_customize->add_setting( 'reyl_pro_link_color', array( 'default' => '#1793ff', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_hex_color', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'reyl_pro_link_color', array(
			'label'        => esc_attr__( 'Link Color', 'reyl-pro' ),
			'section'    => 'colors',
		) ) );

		/*
		Categories
		------------------------------ */
		$wp_customize->add_setting( 'reyl_pro_category_color', array( 'default' => '#00bd85', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_hex_color', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'reyl_pro_category_color', array(
			'label'        => esc_attr__( 'Categories Color', 'reyl-pro' ),
			'section'    => 'colors',
		) ) );

		/*
		Tags
		------------------------------ */
		$wp_customize->add_setting( 'reyl_pro_tags_color', array( 'default' => '#ffaf36', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_hex_color', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'reyl_pro_tags_color', array(
			'label'        => esc_attr__( 'Tags Color', 'reyl-pro' ),
			'section'    => 'colors',
		) ) );




	/*
	Blog
	------------------------------ */
	$wp_customize->add_section( 'reyl_pro_blog_layout_section', array(
		'title' => esc_attr__( 'Blog Options', 'reyl-pro' ),
		'priority' => 150
	) );

	$wp_customize->add_setting( 'reyl_pro_blog_sidebar', array( 'default' => '1', 'sanitize_callback' => 'reyl_pro_sanitize_text', ) );
	$wp_customize->add_control( 'reyl_pro_blog_sidebar', array(
		'type' => 'radio',
		'choices'    => array(
            '1' => 'No Sidebar',
            '2' => 'Sidebar'
        ),
		'section' => 'reyl_pro_blog_layout_section', // Required, core or custom.
		'label' => esc_attr__( 'Sidebar', 'reyl-pro' ),
		'description' => esc_attr__( 'Display or hide the Sidebar.', 'reyl-pro' ),
	) );

	$wp_customize->add_setting( 'reyl_pro_blog_thumbnail', array( 'default' => '1', 'sanitize_callback' => 'reyl_pro_sanitize_text', ) );
	$wp_customize->add_control( 'reyl_pro_blog_thumbnail', array(
		'type' => 'radio',
		'choices'    => array(
            '1' => 'No Image',
            '2' => 'Show Image'
        ),
		'section' => 'reyl_pro_blog_layout_section', // Required, core or custom.
		'label' => esc_attr__( 'Post Thumbnails', 'reyl-pro' ),
		'description' => esc_attr__( 'Display or hide post thumbnail on the blog index.', 'reyl-pro' ),
	) );

	$wp_customize->add_setting( 'reyl_pro_blog_animations_enable', array( 'default' => true, 'sanitize_callback' => 'reyl_pro_sanitize_bool', ) );
    $wp_customize->add_control( 'reyl_pro_blog_animations_enable', array(
		'section' => 'reyl_pro_blog_layout_section', // Required, core or custom.
		'label' => esc_attr__( "Enable CSS animations?", 'reyl-pro' ),
		'type'    => 'checkbox',
	) );

	$wp_customize->add_setting( 'reyl_pro_blog_show_author', array( 'default' => true, 'sanitize_callback' => 'reyl_pro_sanitize_bool', ) );
    $wp_customize->add_control( 'reyl_pro_blog_show_author', array(
		'section' => 'reyl_pro_blog_layout_section', // Required, core or custom.
		'label' => esc_attr__( "Show About the Author on posts", 'reyl-pro' ),
		'type'    => 'checkbox',
	) );


	/*
	Contact Page
	------------------------------ */
	$wp_customize->add_section( 'reyl_pro_map_section', array(
		'title' => esc_attr__( 'Contact Page', 'reyl-pro' ),
		'description' => esc_attr__( "Display a map and your contact information. You'll have to create a page using the 'Contact' page template.", 'reyl-pro' ),
	) );

	$wp_customize->add_setting( 'reyl_pro_map_key', array( 'default' => '', 'sanitize_callback' => 'reyl_pro_sanitize_text', 'type' => 'theme_mod' ) );
	$wp_customize->add_control( 'reyl_pro_map_key', array(
		'type' => 'text',
		'section' => 'reyl_pro_map_section', // Required, core or custom.
		'label' => esc_attr__( "Google Maps API Key", 'reyl-pro' ),
		'description' => sprintf( esc_html__( "An API Key is required for Google Maps to work. %s Sign up for one here %s (it's free for small usage)", 'reyl-pro' ), '<a href="https://developers.google.com/maps/documentation/javascript/get-api-key">', '</a>' ) 
	) );

	$wp_customize->add_setting( 'reyl_pro_map_lat_long', array( 'default' => '40.725987, -74.002447', 'sanitize_callback' => 'reyl_pro_sanitize_lat_long', 'type' => 'theme_mod' ) );
	$wp_customize->add_control( 'reyl_pro_map_lat_long', array(
		'type' => 'text',
		'section' => 'reyl_pro_map_section', // Required, core or custom.
		'label' => esc_attr__( "Latitude and Longitude", 'reyl-pro' ),
		'description' => esc_attr__( 'Comma separated. Example: 40.725987, -74.002447', 'reyl-pro' )
	) );

	$wp_customize->add_setting( 'reyl_pro_map_zoom', array( 'default' => '12', 'sanitize_callback' => 'reyl_pro_sanitize_integer', 'type' => 'theme_mod' ) );
	$wp_customize->add_control( 'reyl_pro_map_zoom', array(
		'type' => 'text',
		'section' => 'reyl_pro_map_section', // Required, core or custom.
		'label' => esc_attr__( "Zoom", 'reyl-pro' ),
	) );

	$wp_customize->add_setting( 'reyl_pro_contact_form', array( 'default' => '', 'sanitize_callback' => 'reyl_pro_sanitize_text', ) );
	$wp_customize->add_control( new reyl_pro_Display_Text_Control( $wp_customize, 'reyl_pro_contact_form', array(
		'section' => 'reyl_pro_map_section', // Required, core or custom.
		'label' => sprintf( esc_html__( 'Add a contact form by activating the Contact Form module of %s Jetpack %s plugin.', 'reyl-pro' ), '<a href="' . get_admin_url( null, 'admin.php?page=jetpack_modules' ) .'">', '</a>' ),
	) ) );


}
add_action( 'customize_register', 'reyl_pro_customize_register' );











/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function reyl_pro_customize_preview_js() {
	
	wp_register_script( 'reyl_pro_customizer_preview', get_template_directory_uri() . '/js/customizer-preview.js', array( 'customize-preview' ), '20151024', true );
	wp_localize_script( 'reyl_pro_customizer_preview', 'wp_customizer', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'theme_url' => get_template_directory_uri(),
		'site_name' => get_bloginfo( 'name' )
	));
	wp_enqueue_script( 'reyl_pro_customizer_preview' );

}
add_action( 'customize_preview_init', 'reyl_pro_customize_preview_js' );


/**
 * Load scripts on the Customizer not the Previewer (iframe)
 */
function reyl_pro_customize_js() {

	wp_enqueue_script( 'reyl_pro_customizer_top_buttons', get_template_directory_uri() . '/js/theme-customizer-top-buttons.js', array( 'jquery' ), true  );
	wp_localize_script( 'reyl_pro_customizer_top_buttons', 'topbtns', array(
			'pro' => esc_html__( 'More Themes', 'reyl-pro' )
	) );
	
	wp_enqueue_script( 'reyl_pro_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-controls' ), '20151024', true );

}
add_action( 'customize_controls_enqueue_scripts', 'reyl_pro_customize_js' );










/*
Sanitize Callbacks
*/

/**
 * Sanitize for post's categories
 */
function reyl_pro_sanitize_categories( $value ) {
    if ( ! array_key_exists( $value, reyl_pro_categories_ar() ) )
        $value = '';
    return $value;
}

/**
 * Sanitize return an non-negative Integer
 */
function reyl_pro_sanitize_integer( $value ) {
    return absint( $value );
}

/**
 * Sanitize return pro version text
 */
function reyl_pro_pro_version( $input ) {
    return $input;
}

/**
 * Sanitize Any
 */
function reyl_pro_sanitize_any( $input ) {
    return $input;
}

/**
 * Sanitize Text
 */
function reyl_pro_sanitize_text( $str ) {
	return sanitize_text_field( $str );
} 

/**
 * Sanitize Textarea
 */
function reyl_pro_sanitize_textarea( $text ) {
	return esc_textarea( $text );
}

/**
 * Sanitize URL
 */
function reyl_pro_sanitize_url( $url ) {
	return esc_url( $url );
}

/**
 * Sanitize Boolean
 */
function reyl_pro_sanitize_bool( $string ) {
	return (bool)$string;
} 

/**
 * Sanitize Text with html
 */
function reyl_pro_sanitize_text_html( $str ) {
	$args = array(
			    'a' => array(
			        'href' => array(),
			        'title' => array()
			    ),
			    'br' => array(),
			    'em' => array(),
			    'strong' => array(),
			    'span' => array(),
			);
	return wp_kses( $str, $args );
}

/**
 * Sanitize GPS Latitude and Longitud
 * http://stackoverflow.com/a/22007205
 */
function reyl_pro_sanitize_lat_long( $coords ) {
	if ( preg_match( '/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?),[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/', $coords ) ) {
	    return $coords;
	} else {
	    return 'error';
	}
} 


/**
 * Display Text Control
 * Custom Control to display text
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	class reyl_pro_Display_Text_Control extends WP_Customize_Control {
		/**
		* Render the control's content.
		*/
		public function render_content() {

	        $wp_kses_args = array(
			    'a' => array(
			        'href' => array(),
			        'title' => array(),
			        'data-section' => array(),
			    ),
			    'br' => array(),
			    'em' => array(),
			    'strong' => array(),
			    'span' => array(),
			);
			$label = wp_kses( $this->label, $wp_kses_args );
	        ?>
			<p><?php echo $label; ?></p>		
		<?php
		}
	}
}



/*
* AJAX call to retreive an image URI by its ID
*/
add_action( 'wp_ajax_nopriv_reyl_pro_get_image_src', 'reyl_pro_get_image_src' );
add_action( 'wp_ajax_reyl_pro_get_image_src', 'reyl_pro_get_image_src' );

function reyl_pro_get_image_src() {
	$image_id = $_POST['image_id'];
	$image = wp_get_attachment_image_src( absint( $image_id ), 'full' );
	$image = $image[0];
	echo $image;
	die();
}
