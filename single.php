<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Reyl Pro
 */

get_header(); ?>

	<main id="main" class="site-main <?php echo reyl_pro_main_css_class(); ?>" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>
			
			<?php
			$show_author = get_theme_mod( 'reyl_pro_blog_show_author', true );
			if ( $show_author || isset( $_GET[ 'show_author' ] ) ) {
			?>
			<h3 class="about-author-title"><?php esc_html_e( 'About the Author', 'reyl-pro' ); ?></h3>
			<div class="about-author">
				
				<div class="row">
					<div class="col-md-3">
						<?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
					</div>
					<div class="col-md-9">
						<h4><?php echo get_the_author_meta( 'display_name' ); ?></h4>
						<?php echo get_the_author_meta( 'description' ); ?>
					</div>
				</div>
			</div><!-- /about-author -->
			<?php } ?>

			<?php the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
	

	<?php get_sidebar(); ?>


<?php get_footer(); ?>
