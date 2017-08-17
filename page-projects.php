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

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			 <section id ='projects_blurb'> <p> A list of the latest posts and projects all summarised in one helpful place. </p> </section>
			 <div id="main-container">
		  	<?php
					$args = array( 'post_type' => ['post','projects'], 'posts_per_page' => 10 );
      		$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
								echo '<div class="project_page_posts_container">';
			  				get_template_part( 'template-parts/content', 'whipp' );

								/* If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;*/

			    endwhile; // End of the loop.
		  	?>
		 </div><!-- my posts class -->
	 </main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer();
