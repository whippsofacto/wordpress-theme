console.log("Hello World!");


jQuery('#header_container') > jQuery('img').hover(
       function(){ jQuery(this).addClass('hover').removeClass('off-hover'); },
       function(){ jQuery(this).removeClass('hover').addClass('off-hover'); }
);

jQuery(window).scroll(function(){
    jQuery("#header_container").css("opacity", 1 - jQuery(window).scrollTop() / 130);
    jQuery("#header_container").css("transition", "ease-in-out opacity 5s;" - jQuery(window).scrollTop() / 130);

  });

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
});

// take the sub menu out of the document flow
jQuery('.sub-menu').append('<hr />');
jQuery('.sub-menu').prepend('<h2> Projects </h2>');
jQuery('.sub-menu').prepend('<hr />');


var element = jQuery('.sub-menu').detach();
jQuery('.menu-nav-container').append(element);


//searchBarToggle
jQuery('#searchNav').click(function(){
  jQuery('#search-container').toggleClass('show-search');
});
//fs searchBarToggle
jQuery('#fs_searchNav').click(function(){
  jQuery('#search-container').toggleClass('show-search');
});
//search Bar two lines
jQuery('.search-submit').before("<br />","<br />");
