<?php
  add_theme_support( 'custom-header', array(
  'flex-width'    => true,
  'width'         => 980,
  'flex-height'    => true,
  'height'        => 200,
  'default-image' => get_template_directory_uri() . '/images/header.jpg',
  'video' => true
 ));
 // change the behaviour of the video player
 add_filter( 'header_video_settings', 'my_header_video_settings');
 function my_header_video_settings( $settings ) {
  // will play in any viewport width
  $settings['minWidth'] = 1;
  $settings['minHeight'] = 300;
 return $settings;
}
 //Add check if there is a header and if so, display it on the projects page.
 add_filter( 'is_header_video_active', 'custom_video_header_pages' );
 function custom_video_header_pages( $active ) {
   //if on the front page or the projects page
   if(is_front_page() || is_singular('projects')) {
     return true;
   }
   return false;
 }

 ?>
