jQuery(document).ready(function($) {

	//Anomation at load -----------------
	Pace.on('done', function(event) {
		
	});//Pace


	$("body").on('click', 'article a[href^="'+window.location.origin+'"]:not(.ql_thumbnail_hover)', function(event) {
		event.preventDefault();
		/* Act on the event */
		$(".ql-animations #main article").each(function(index, el) {
			$(el).addClass('ql_clicked');
		});
		$(".ql-animations #sidebar .widget").each(function(index, el) {
			$(el).addClass('ql_clicked');
		});
		var target = $(this).attr('href');
		 setTimeout(function() {
	       window.location.href = target;
	    }, 600);
	});

	/*
	Gallery
	=========================================================
	*/
	var $blog_isotope = $('.ql_gallery_container');
	//Add preloader
	$blog_isotope.append('<div class="preloader"><i class="fa fa-cog fa-spin"></i></div>');

	//Isotope parameters
	var blog_args_isotope = {
		itemSelector : '.ql_gallery-item',
		layoutMode : 'packery',
	    percentPosition: true
	};

	//PhotoSwipe for WooCommerce Images
	if ( typeof initPhotoSwipe == 'function' ){
		initPhotoSwipe('.ql_gallery_container', 'img', '');
	}
	
	
	//Wait to images load
	if ( typeof imagesLoaded == 'function' ){
		$blog_isotope.imagesLoaded(  function( $images, $proper, $broken ) {

			//Start Isotope
			$blog_isotope.isotope( blog_args_isotope );

			//Remove preloader
			$blog_isotope.find('.preloader i').css('display', 'none');
			$blog_isotope.children('.preloader').css('opacity', 0).delay(900).fadeOut();
					
		});//images loaded
	}
	/*			
	//===========================================================
	*/

	$(".ql_scroll_top").click(function() {
	  $("html, body").animate({ scrollTop: 0 }, "slow");
	  return false;
	});

	$("#primary-menu > li > ul > li.dropdown").each(function(index, el) {
		$(el).removeClass('dropdown').addClass('dropdown-submenu');
	});

	$('.dropdown-toggle').dropdown();

	$('*[data-toggle="tooltip"]').tooltip();

});