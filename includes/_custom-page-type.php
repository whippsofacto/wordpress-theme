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
      	'rewrite'            => array( 'slug' => 'projects' ),
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
        // First, we "add" the custom post type via the above written function.
        // Note: "add" is written with quotes, as CPTs don't get added to the DB,
        // They are only referenced in the post_type column with a post entry,
        // when you add a post of this CPT.
        my_custom_postypes();

        // ATTENTION: This is *only* done during plugin activation hook in this example!
        // You should *NEVER EVER* do this on every page load!!
        flush_rewrite_rules();
      }

      register_activation_hook( __FILE__, 'my_rewrite_flush' );
 ?>
