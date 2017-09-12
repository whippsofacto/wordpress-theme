<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package whippsoFacto
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'whippsofacto' ); ?></a>
	<!-- Section only for front page ------->
	<?php
	 if (is_front_page()){?>
	 <div id="video_home_full">
		 <?php } ?> <!-- end of opening front-page div ---->
	  <header id="masthead" class="site-header">
			 <div class="site-branding">
				<?php
			  if ( is_front_page() && is_home() ) : ?>
			  <div id="header_outter_container" class="header-outter-container"><div id="header_container" class="header-container"> <?the_post_thumbnail()?>  </div></div>
				<div id="site_tite_and_description" class="site-title-and-description"><h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<!-- if on a "projects page" -->
			<?php elseif ( is_singular('projects') ) :?>
				<div id="header_outter_container" class="header-outter-container"><a href="#secondary" id="projects_link"><div id="header_container" class="header-container"> <?the_post_thumbnail()?> </div>
					</a>
			</div>
			<!-- Show video from header media on the front page -->
			<?php elseif (is_front_page() ) :?>
				<div id="header_outter_container" class="header-outter-container"><div id="header_container" class="header-container">  </div></div>
				<div id="site_tite_and_description" class="site-title-and-description home-site-title"><h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name','description' ); ?></a></h1>
					<?php	$description = get_bloginfo( 'description', 'display' );
						 if ( $description || is_customize_preview() ) : ?>
							<p class="site-description home-site-description"><?php echo "$description" /* WPCS: xss ok. */ ?></p>
							<?php
						endif;?>


				<?php elseif (is_search() ) :?>
					<div id='page_header_container'>
					 <div id='header_image'> <?php the_custom_header_markup();?></div>
					<div id="site_tite_and_description" class="site-title-and-description"><h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php	$description = get_bloginfo( 'description', 'display' );
							 if ( $description || is_customize_preview() ) : ?>
								<p class="site-description"><?php echo "$description" /* WPCS: xss ok. */ ?></p>
								<?php
							endif;?>
							<div id="post_title">
								<?php the_title( '<p> [', ']</p>' ); ?>
							</div>
							<div id='post_arrow'>
								<a href='#secondary'><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></a>
							</div>
					</div>

			<?php else : ?>
				<div id='page_header_container'>
         <div id='header_image'> <?php the_custom_header_markup();?></div>
				 <div id="site_tite_and_description" class="site-title-and-description"><h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					 <?php	$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
							 <p class="site-description"><?php echo "$description" /* WPCS: xss ok. */ ?></p>
							 <?php
						 endif;?>
					<div id="post_title">
						<?php the_title( '<p> [', ']</p>' ); ?>
					</div>
					<ul id='post_arrow'>
						<li><a href='#secondary'><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			<?php
			endif;
	 	?>
	 </div><!-- site_tite_and_description -->
</div><!-- .site-branding -->

	<?php if (is_front_page()){?>
  <!-- beginning of the rather long and complicated navigation -->
	<div class="burger-nav">
		<span></span>
		<span></span>
		<span></span>
	</div>
  	<div id="myNav" class="overlay">
	   <div id='myNav_container'>
		  <div id="leftElements">
	   	<nav id="site-navigation" class="main-navigation overlay-content">
			<!--<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php//esc_html_e( 'Primary Menu', 'whippsofacto' ); ?></button>-->
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
			?>
		</nav><!-- # end site-navigation -->
	</div><!--#end of Elements -->
  <div id="rightElements">
		<div id="nav_contact_form" class="overlay-content">
			<?php echo do_shortcode( '[contact-form-7 id="2079" title="Contact Form"]' ); ?>
		</div>
				<hr class='socialHr'>
			 <div id="social_nav_container">
				<div class="mids social-nav-inner-container">
		 	  	 <i id="searchNav" class="fa fa-search" aria-hidden="true"></i>
			  </div>
			  <div class="mids social-nav-inner-container">
					<a href="https://www.github.com/whippsofacto">
			   	 <i class="fa fa-github" aria-hidden="true"></i>
				  </a>
			  </div>
			  <div class="mids social-nav-inner-container">
					<a href="https://www.twitter.com/whippsofacto">
				  	<i class="fa fa-twitter" aria-hidden="true"></i>
				 </a>
				</div>
				<div class="social-nav-inner-container">
					<a href="http://www.portfolio.whippsofacto.com/contact">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
				 </a>
				</div>
			</div><!-- Social Nav Container -->
			<hr class="socialHr">
				<div id="fs_social_nav_container">
					<div class="fs-social-nav-inner-container">
							<i id="closeIcon" class=" fa fa-times-circle-o" aria-hidden="true"></i>
					</div>
				 <div class="fs-social-hr fs-social-nav-inner-container">
						<i id="fs_searchNav" class="fs fa fa-search" aria-hidden="true"></i>
				 </div>
				 <div class="fs-social-hr fs-social-nav-inner-container">
					 <a href="https://www.github.com/whippsofacto">
						<i class="fs fa fa-github" aria-hidden="true"></i>
					 </a>
				 </div>
				 <div class="fs-social-hr fs-social-nav-inner-container">
					 <a href="https://www.twitter.com/whippsofacto">
						 <i class="fs fa fa-twitter" aria-hidden="true"></i>
					</a>
				 </div>
			 </div><!-- FS Social Nav Container -->
		 </div>
		 <div id="nav_search" class="search-overlay">
			 <div id='search-container' class='search-overlay-content'>
				<?php get_search_form(); ?>
		 </div> <!--search overlay content -->
	  </div> <!--search overlay -->
	  </div> <!-- #end of Right Elements -->
	 </div><!-- #end of mynav contianer -->
	</div> <!-- #end of nav contianer -->
	</header><!-- #masthead -->
	<?php } else { ?>
	<!--place nav for all other pages in here ------>
	<?php } ?>
	<!-- Section only for front page ------->
	<!-- close the header div ------->
	<?php if (is_front_page()){ ?>
	</div>
	<?php } ?>
	<div id="content" class="site-content">
