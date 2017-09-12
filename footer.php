<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package whippsoFacto
 */

?>

	</div><!-- #content -->
	<?php
	//homepage added ------------//
	  if(is_front_page()){?>
		<?php } else { ?>
  <!-- to here ------------------->
			<footer id="colophon" class="site-footer">
				<div class="icons">
					<a href="https://www.github.com/whippsofacto">
					 <i class="fa fa-github footer-icon" aria-hidden="true"></i>
				  </a>
					<a href="https://www.twitter.com/whippsofacto">
					 <i class="fa fa-twitter footer-icon" aria-hidden="true"></i>
				  </a>
					<a href="http://www.portfolio.whippsofacto.com/contact">
					 <i class="fa fa-envelope-o footer-icon" aria-hidden="true"></i>
				  </a>
					<a href='http://localhost/whippPress/search'>
					 <i class="fa fa-search footer-icon" aria-hidden="true"></i>
				  </a>
				</div>
				<div>
					<p class='copyright'> &#169; Stephen Whipp 2017 </p>
				</div>
				<div class="site-info copyright">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'whippsofacto' ) ); ?>"><?php
						/* translators: %s: CMS name, i.e. WordPress. */
						printf( esc_html__( 'Proudly powered by %s', 'whippsofacto' ), 'WordPress' );
					?></a>
					<!--<span class="sep"> | </span>
					<?php
						/* translators: 1: Theme name, 2: Theme author. */
						//printf( esc_html__( 'Theme: %1$s by %2$s.', 'whippsofacto' ), 'whippsofacto', '<a href="https://automattic.com/">Stephen Whipp</a>' );
					?>
				</div> .site-info -->
			</footer><!-- #colophon -->
	  <?php
	  //here is the closing else statement
		 };
	 ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
