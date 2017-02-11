/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Logo
	wp.customize( 'reyl_pro_logo', function( value ) {
		value.bind( function( to ) {
			if ( to != "" ) {
				var logo = '<img src="' + to + '" />';
				$( '.logo_container .ql_logo' ).html( logo );		
			}else{
				$( '.logo_container .ql_logo' ).text( wp_customizer.site_name );
			}
		} );
	} );
	
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description, #jqueryslidemenu a' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );


	

	/*
    Colors
    =====================================================
    */
		//Categories Color
		wp.customize( 'reyl_pro_category_color', function( value ) {
			value.bind( function( to ) {
				$( '.metadata ul li.meta_categories a' ).css( {
						'color': to
				} );
			} );
		} );
		//Tags Color
		wp.customize( 'reyl_pro_tags_color', function( value ) {
			value.bind( function( to ) {
				$( '.metadata ul li.meta_tags a' ).css( {
						'color': to
				} );
			} );
		} );

		//Text Color
		wp.customize( 'reyl_pro_text_color', function( value ) {
			value.bind( function( to ) {
				$( 'body' ).css( {
						'color': to
				} );
			} );
		} );
		//Link Color
		wp.customize( 'reyl_pro_link_color', function( value ) {
			value.bind( function( to ) {
				$( '.entry-content a' ).css( {
						'color': to
				} );
			} );
		} );



} )( jQuery );
