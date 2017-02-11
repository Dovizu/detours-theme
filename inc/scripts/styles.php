<?php

/**
 * Enqueues front-end CSS for color scheme.
 *
 * @see wp_add_inline_style()
 */
function reyl_pro_custom_css() {
	$categories_color = get_theme_mod( 'reyl_pro_category_color', '#00bd85' );
	$tags_color = get_theme_mod( 'reyl_pro_tags_color', '#ffaf36' );
	$text_color = get_theme_mod( 'reyl_pro_text_color', '#8c8c8c' );
	$link_color = get_theme_mod( 'reyl_pro_link_color', '#1793ff' );
	$background_color = '#' . get_background_color();

	$colors = array(
		'categories_color'      => $categories_color,
		'tags_color'      => $tags_color,
		'text_color'     => $text_color,
		'link_color'     => $link_color,
		'background_color'     => $background_color
	);

	$custom_css = reyl_pro_get_custom_css( $colors );

	wp_add_inline_style( 'reyl_pro_style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'reyl_pro_custom_css' );



/**
 * Returns CSS for the color schemes.
 *
 * @param array $colors colors.
 * @return string CSS.
 */
function reyl_pro_get_custom_css( $colors ) {

	//Default colors
	$colors = wp_parse_args( $colors, array(
		'categories_color'      => '',
		'tags_color'      => '',
		'text_color'            => '',
		'link_color'            => '',
		'background_color'      => ''
	) );

	$css = <<<CSS
	
	/* Text Color */
	body{
		color: {$colors['text_color']};
	}
	/* Link Color */
	a, a:hover{
		color: {$colors['link_color']};
	}
	/* Categories Color */
	.metadata ul li.meta_categories a{
		color: {$colors['categories_color']};
	}
	/* Categories Color */
	.metadata ul li.meta_tags a{
		color: {$colors['tags_color']};
	}

	/* Background Color */
	.pagination li.active a,
	.pagination li.active a:hover,
	.wpb_wrapper .products .product-category h3,
	.btn-ql:active,
	.btn-ql.alternative:hover,
	.btn-ql.alternative-white:hover,
	.btn-ql.alternative-gray:hover,
	.hero_bck,
	.ql_nav_btn:hover,
	.ql_nav_btn:active,
	.cd-popular .cd-select,
	.no-touch .cd-popular .cd-select:hover,
	.pace .pace-progress,
	.btn-ql::before, .btn-ql:hover::before, .btn-ql:active::before, .btn-ql::after, .btn-ql:hover::after, .btn-ql:active::after,
	.service .service-category::before,
	.service .service-category span,
	.section-title::before,
	.about-section .about-text .about-service p::before,
	.video-text-wrap .video-text-title::before,
	.btn-ql-round::after, .btn-ql-round:hover::after, .btn-ql-round:active::after,
	.about-section .about-text .about-service p::after,
	.team-member .member-image span::before,
	.team-member .member-image span::after,
	.team-member .member-image::before,
	.team-member .member-image::after,
	.portfolio-section .portfolio-item::before,
	.portfolio-section .portfolio-item::after,
	.portfolio-section .portfolio-item span.lines::before,
	.portfolio-section .portfolio-item span.lines::after,
	.pricing-section .pricing-table::before,
	.pricing-section .pricing-table::after,
	.pricing-section .pricing-table span.lines::before,
	.pricing-section .pricing-table span.lines::after,
	.flickity-page-dots .dot.is-selected,
	.blog-wrap .blog-time-date::after,
	.contact-section .contact-submit::after,
	.read-more::after,
	.bullet-points-image .bullet-points-title::before,
	.bullet-point .bullet-point-number::after
	{
		background-color: {$colors['link_color']};
	}
	/* Color */
	.pagination .current,
	.pagination a:hover,
	.widget_recent_posts ul li h6 a, .widget_popular_posts ul li h6 a,
	.read-more,
	.read-more:hover,
	.read-more i,
	.btn-ql.alternative,
	.hero_color,
	.cd-popular .cd-pricing-header,
	.cd-popular .cd-currency, .cd-popular .cd-duration,
	#sidebar .widget ul li > a:hover,
	#sidebar .widget_recent_comments ul li a:hover,
	#footer a
	{
		color: {$colors['link_color']};
	}

CSS;

	return $css;
}