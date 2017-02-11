<?php
	//Bootstrap =======================================================
	wp_enqueue_style( 'reyl_pro_bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '3.1', 'all');
	//=================================================================

	if ( is_page_template( 'template-gallery.php' ) ) {

		//Photoswipe ======================================================
		wp_register_style( 'photoswipe', get_template_directory_uri() . '/css/photoswipe.css', array(), '2.0.0', 'all' );  
		wp_enqueue_style( 'photoswipe' );  
		//=================================================================

		//Photoswipe Skin ======================================================
		wp_register_style( 'photoswipe-skin', get_template_directory_uri() . '/css/default-skin/default-skin.css', array(), '2.0.0', 'all' );  
		wp_enqueue_style( 'photoswipe-skin' );  
		//=================================================================

	}

	wp_enqueue_style( 'reyl_pro_style', get_stylesheet_uri() );

?>