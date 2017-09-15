<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package whippsoFacto
 */

get_header(); ?>

	<div id="primary" class="content-area box">
		<main id="main" class="site-main">
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			//the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		<div class="project-tags">
		 <?php	/* translators: used between list items, there is a space after the comma */
		 	$tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'whippsofacto' ) );
			 if ( $tags_list ) {
				 /* translators: 1: list of tags. */
				 printf( '<span class="tags-links">' . esc_html__( '%1$s', 'whippsofacto' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			 }
		 ?>
	  </div>
	 </main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer();
