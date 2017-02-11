<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Reyl Pro
 */

if ( ! function_exists( 'reyl_pro_metadata' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function reyl_pro_metadata() {

	echo '<ul>';

	$time_string = '<time class="entry-date published updated" datetime="%1$s"><a href="%2$s" rel="bookmark">%3$s</a></time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%3$s</time><time class="updated" datetime="%4$s"><a href="%2$s" rel="bookmark">%5$s</a></time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_url( get_permalink() ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	echo '<li class="meta_date">' . $time_string . '</li>';


	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'reyl-pro' ) );
		if ( $categories_list && reyl_pro_categorized_blog() ) {
			printf( '<li class="meta_categories"><span class="cat-links">%1$s</span></li>', $categories_list ); // WPCS: XSS OK.
		}
		
		if ( is_single() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'reyl-pro' ) );
			if ( $tags_list ) {
				printf( '<li class="meta_tags"><span class="tags-links">' . esc_html__( 'Tagged %1$s', 'reyl-pro' ) . '</span></li>', $tags_list ); // WPCS: XSS OK.
			}
		}
	}


	if ( is_single() ) {
		$byline = sprintf(
			esc_html_x( 'by %s', 'post author', 'reyl-pro' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);
		echo '<li class="meta_author">' . $byline . '</li>';
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<li class="meta_comments"><span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'reyl-pro' ), esc_html__( '1 Comment', 'reyl-pro' ), esc_html__( '% Comments', 'reyl-pro' ) );
		echo '</span></li>';
	}

	

	echo '</ul>';


}
endif;



/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function reyl_pro_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'reyl_pro_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'reyl_pro_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so reyl_pro_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so reyl_pro_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in reyl_pro_categorized_blog.
 */
function reyl_pro_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'reyl_pro_categories' );
}
add_action( 'edit_category', 'reyl_pro_category_transient_flusher' );
add_action( 'save_post',     'reyl_pro_category_transient_flusher' );




/**
 * Returns CSS class for Main div. Depends if the Sidebar is displayed or not
 *
 * @return string
 */
function reyl_pro_main_css_class() {
	$blog_sidebar = get_theme_mod( 'reyl_pro_blog_sidebar', '1' );
	if ( '2' == $blog_sidebar || isset( $_GET[ 'show_sidebar' ] ) ) {
		return 'col-md-6';
	}else{
		return 'col-md-6 col-md-offset-3';
	}
}