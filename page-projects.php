<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package whippsoFacto
 */

get_header(); ?>

	<div id="primary" class="content-area box">
		<main id="main" class="site-main">

			<?php
			$args = array( 'post_type' => ['post','projects'], 'posts_per_page' => 10 );
      $loop = new WP_Query( $args );

			while ( $loop->have_posts() ) : $loop->the_post();


				get_template_part( 'template-parts/content', 'page' );
				if ( !empty(has_post_thumbnail() )) {
						 	the_title();
					  } else {
				    	the_post_thumbnail();
			      }
				echo '<div class="entry-content">';
				the_content();
				echo '</div>';

				/* If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;*/

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
