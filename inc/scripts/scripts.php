<?php

	wp_enqueue_script( 'jquery' );
	
	//HTML5 Shiv ==============================================
	wp_enqueue_script( 'reyl_pro_html5shiv', get_template_directory_uri() . '/js/html5shiv.js', array(), '3.7.3', true );
	//=================================================================

	//Modernizr Plugin ================================================
	wp_enqueue_script( 'reyl_pro_modernizr', get_template_directory_uri() . '/js/modernizr.custom.67069.js', '2.8.3', true );
	//=================================================================
	
	//Pace  ===========================================================
	wp_enqueue_script( 'reyl_pro_pace', get_template_directory_uri() . '/js/pace.js', array(), '0.2.0', true);
	//=================================================================
	
	//Bootstrap JS ========================================
	wp_enqueue_script( 'reyl_pro_bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), '3.3.5', true);
	//=================================================================
	
	//Comment Reply ===================================================
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	//=================================================================


	if ( is_page_template( 'template-gallery.php' ) ) {
		
		//Imageloaded  ===========================================================
		wp_enqueue_script( 'imagesloaded' );
		//=================================================================
		

		//Isotope  ===========================================================
		wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), '3.0.1', true);
		//=================================================================

		//Packery Mode  ===========================================================
		wp_enqueue_script( 'packery-mode', get_template_directory_uri() . '/js/packery-mode.pkgd.min.js', array(), '2.0.0', true);
		//=================================================================

		//photoSwipe and UI Plugin ==============================================
		wp_register_script( 'photoswipe-and-ui', get_template_directory_uri() . '/js/photoswipe-ui-default.js', array( 'jquery' ), '4.1.1', true );
		wp_enqueue_script( 'photoswipe-and-ui' );
		//=================================================================

	}	


	
	//Customs Scripts =================================================
	wp_enqueue_script( 'reyl_pro_theme-custom', get_template_directory_uri() . '/js/script.js', array( 'jquery', 'reyl_pro_bootstrap' ), '1.0', true );
	//=================================================================

?>