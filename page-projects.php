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

						//args for displaying project info on projects page
						$args = [
								'post_type'      => ['projects','post'],
								'posts_per_page' => 10,
								'paged' => get_query_var('page')
						];
						//define a query to source the results
						$loop = new WP_Query($args);
			      while ( have_posts() ) : the_post();

			     	get_template_part( 'template-parts/content', 'page' );

			     	// If comments are open or we have at least one comment, load up the comment template.
			    	if ( comments_open() || get_comments_number() ) :
			     		comments_template();
			     	endif;



			//loop
			while ($loop->have_posts()) {
			$loop->the_post();
			?>
			<!-- the output -->
			<div class="entry-content">
			 <div class='project_page_posts_container'>
				 <?php if (!has_post_thumbnail()){
				     the_title();
				 } else {
					the_post_thumbnail();
				 }?>
			   <?php the_content(); ?>
				 <?php the_tags(); ?>
				 <hr />
			 </div><!-- end of project page post container -->
			</div>
			<?php

			}
		 endwhile; // End of the loop.
		 ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer();
