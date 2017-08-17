<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package whippsoFacto
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( !has_post_thumbnail()) {?>
		 <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		  <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
		 </a>
		 <?php } ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
		if ( has_post_thumbnail()) {
					?><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"> <?php
					the_post_thumbnail('medium');
					echo "</a>";
					}
					echo '<div class="entry-content">';
					the_content();
					echo '</div>';
		      echo '</div>';
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'whippsofacto' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'whippsofacto' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
