<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Reyl Pro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="post-content">

			<header class="entry-header">
				<?php if ( 'post' === get_post_type() ) : ?>
				<div class="metadata">
	                <?php reyl_pro_metadata(); ?>
	                <div class="clearfix"></div>
	            </div><!-- /metadata -->
            <?php endif; ?>
			
			<?php $blog_thumbnail = get_theme_mod( 'reyl_pro_blog_thumbnail', '1' ); ?>
            <?php if ( has_post_thumbnail() && '2' == $blog_thumbnail || isset( $_GET[ 'show_thumbnails' ] ) ) : ?>
				<div class="post-image">
					<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
		                <?php the_post_thumbnail( 'reyl_pro_post' ); ?>
		            </a>
		        </div><!-- /post-image -->
		    <?php endif; ?>

        		<?php the_title( sprintf( '<h2 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        	</header><!-- .entry-header -->

        	<div class="entry-content">
				<?php
				if ( is_archive() ) {
					the_excerpt();
				}else{
					the_content();
				}
				?>

				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'reyl-pro' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

			<div class="clearfix"></div>

		</div><!-- /post_content -->
</article><!-- #post-## -->
