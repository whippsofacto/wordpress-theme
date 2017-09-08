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
			 <div class="project-blurb blog-page-text">
					 <?php
				   if (have_posts()) : while (have_posts()) : the_post(); ?>
					  <?php echo the_content();?>
					  <?php endwhile;
					  endif; ?>
						<!-- Page Content -->
		       </div><!-- .entry-content-page -->
			   <div id="main-container blog-container">
			  	 <div class="project-page-posts-container">

					<?php
			 		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
          //echo "paged " . $paged;
					$args = array( 'post_type' => array('post','projects'),
												 'posts_per_page' => 5,
												 'paged' => $paged
											 );
      	 	$loop = new WP_Query( $args );

				  	//
          if ( $loop->have_posts() ) : ?>

				 	<?php
				 	while ( $loop->have_posts() ) : $loop->the_post();
  			  				get_template_part( 'template-parts/content', 'whipp' );

	  							/* If comments are open or we have at least one comment, load up the comment template.
		  						if ( comments_open() || get_comments_number() ) :
									comments_template();
			  					endif;*/
			    endwhile; // End of the loop.
		  	?>



				<!--- here ---->

				<?php if ($loop->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
  			<div class="prev-next-posts">
    	  <div class="prev-posts-link">
      	<?php echo get_next_posts_link( 'Next >>', $loop->max_num_pages ); // display older posts link ?>
    	  </div>
        <div class="next-posts-link">
        <?php echo get_previous_posts_link( '<< Prev' ); // display newer posts link ?>
        </div>
		  	</div>
			<?php } ?>


			<?php wp_reset_postdata(); ?>

			<?php else:  ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>
			<!--post ---->

		 </div><!-- my posts class -->
	 </main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer();
