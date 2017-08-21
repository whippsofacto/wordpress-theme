<?php /**
      *Name: Whippy's Pages
      *Description: Custom page plugin for adding new projects to wordpress.
      *Version: 1.0
      *Author: Stephen Whipp
      *License: GPL2
      */

      function my_custom_postypes(){
      $labels = array(
    		'name'               => 'Projects',
    		'singular_name'      => 'Project',
    		'menu_name'          => 'Projects',
    		'name_admin_bar'     => 'Project',
    		'add_new'            => 'Add New',
    		'add_new_item'       => 'Add New Project Page',
    		'new_item'           => 'New Project Page',
    		'edit_item'          => 'Edit Page',
    		'view_item'          => 'View Page',
    		'all_items'          => 'All Projects',
    		'search_items'       => 'Search Project',
    		'parent_item_colon'  => 'Parent Pages:',
    		'not_found'          => 'No Project found.',
    		'not_found_in_trash' => 'No Project Page found in Trash.'
      );

      $args = array(
        'labels' => $labels,
        'public'             => true,
      	'publicly_queryable' => true,
      	'show_ui'            => true,
      	'show_in_menu'       => true,
        'menu_icon'          => 'http://localhost/whippPress/wp-content/uploads/2017/07/ICONW.png',
      	'query_var'          => true,
      	'rewrite'            => true,
      	'capability_type'    => 'page',
      	'has_archive'        => false,
      	'hierarchical'       => true,
      	'menu_position'      => null,
      	'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields','post-formats','revisions','page-attributes' ),
        'show_in_rest'       => true
      );
      register_post_type('projects',$args);
    }

      add_action('init',my_custom_postypes);

      function my_rewrite_flush() {
          my_custom_postypes();
          flush_rewrite_rules();
      }
      add_action( 'after_switch_theme', 'my_rewrite_flush' );
 ?>
