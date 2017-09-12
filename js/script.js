console.log("Hello World!");


//projects images behaviours
jQuery('#header_container > img').hover(
       function(){ jQuery('#header_container > img').addClass('hover').removeClass('off-hover'); },
       function(){ jQuery('#header_container > img').removeClass('hover').addClass('off-hover'); }
);

jQuery(window).scroll(function(){
    jQuery("#header_container").css("opacity", 1 - jQuery(window).scrollTop() / 130);
    jQuery("#header_container").css("transition", "ease-in-out opacity 5s;" - jQuery(window).scrollTop() / 130);

  });

/* web vr page title */
jQuery( "h1:contains('The Island – Web VR')" )
      .css( "color", "#FC8D29")
      .css("background","linear-gradient(180deg, #FC8D29, #A811F0)")
      .css("-webkit-background-clip","text")
      .css("background-clip","text")
      .css("-webkit-text-fill-color","transparent");


/* Nav */

jQuery(".burger-nav").click(function(){
  jQuery('#myNav').addClass('show-nav');
  jQuery('.burger-nav').css('display','none');
});

jQuery("#closeIcon").click(function(){
  jQuery('#myNav').removeClass('show-nav');
  console.log('hello from close!');
  jQuery('.burger-nav').css('display','');
  jQuery('#content').css('position','inherit');
  jQuery('footer').css('position','inherit');
  jQuery('#arrow_container').removeClass('hidden-arrow');
});

//homeNav
jQuery(".home-text").click(function(){
  jQuery('#myNav').addClass('show-nav');
  jQuery('#arrow_container').addClass('hidden-arrow');
  jQuery('.burger-nav').css('display','none');
});

// take the sub menu out of the document flow
jQuery('.sub-menu').prepend('<h2> Projects </h2>');


var element = jQuery('.sub-menu').detach();
jQuery('.menu-nav-container').append(element);


//searchBarToggle
jQuery('#searchNav').click(function(){
  jQuery('#nav_search').addClass('search-full');
});
//fs searchBarToggle
jQuery('#fs_searchNav').click(function(){
  jQuery('#nav_search').addClass('search-full');
});
//on mouse up remove the search-full class and close the search nav
jQuery(document).bind("mouseup touchend",function(e)
              {
                  var container = jQuery("#search-container");
                  var projects = jQuery('#sidebar_nav_elements > section:nth-child(2) > div > ul > li > a');
                  var posts = jQuery('#sidebar_nav_elements > section:nth-child(3) > ul > li > a');

                  // if the target of the click isn't the container nor a descendant of the container
                  if (!container.is(e.target) && container.has(e.target).length === 0)
                  {
                    jQuery('#nav_search').removeClass('search-full');
                  }

                  // apply the same script to the projects drop down
                  if (!projects.is(e.target) && container.has(e.target).length === 0)
                  {
                    jQuery("#sidebar_nav_elements > section:nth-child(2) > div").removeClass('show-section');
                  }

                  // apply the same script to the posts drop down
                  if (!posts.is(e.target) && container.has(e.target).length === 0)
                  {
                    jQuery('#sidebar_nav_elements > section:nth-child(3) > ul').removeClass('show-section');
                  }

      });

// remove type attribute
jQuery('.search-field').removeAttr("type");

//add a div around the sidebar after the menu and spans
jQuery("#secondary").children('section').not(':first-child').wrapAll('<nav id="sidebar_nav_elements" class="sidebar-nav" />');

jQuery("#nav_span_inner").click(function(){
  // how click affects the hamburger
  jQuery('#nav_span').toggleClass('span-rotate');
  jQuery('#top_span').toggleClass('nav-transition-class-top');
  jQuery('#middle_span').toggleClass('nav-transition-class');
  jQuery('#menu_span').toggleClass('hidden-menu');
  // how click affects the menu items
  jQuery('#sidebar_nav_elements').toggleClass('display-nav');
});


//Page navs -----------------------------------------------------------------------------//
var projectLinks = jQuery('#sidebar_nav_elements > section:nth-child(2) > h2');
//post links
var postLinks = jQuery('#sidebar_nav_elements > section:nth-child(3) > h2');

jQuery(projectLinks).click(function(){
    jQuery('#sidebar_nav_elements > section:nth-child(2) > div').toggleClass('show-section');

});

jQuery(postLinks).click(function(){
  jQuery('#sidebar_nav_elements > section:nth-child(3) > ul').toggleClass('show-section');
});

// single page scroller
    //all pages
		jQuery(document).ready(function() {
			jQuery('#post_arrow').onePageNav({
      changeHash: false,
      scrollSpeed: 1000,
      scrollThreshold: 0.5,
      filter: '',
      easing: 'swing'
    });
	});

  //projects page only
  // single page scroller

  		jQuery(document).ready(function() {
  			jQuery('#header_outter_container').onePageNav({
        changeHash: false,
        scrollSpeed: 1000,
        scrollThreshold: 0.5,
        filter: '',
        easing: 'swing'
      });
  	});


//contact form
var wpcf7Elm = document.querySelector( '.wpcf7' );

wpcf7Elm.addEventListener( 'wpcf7mailsent', function( event ) {
    //alert( "Fire!" );
    jQuery("#myForm").css('display','none');
}, false );
