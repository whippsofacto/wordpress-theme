console.log("Hello World!");


jQuery('#header_container') > jQuery('img').hover(
       function(){ jQuery(this).addClass('hover').removeClass('off-hover'); },
       function(){ jQuery(this).removeClass('hover').addClass('off-hover'); }
);

jQuery(window).scroll(function(){
    jQuery("#header_container").css("opacity", 1 - jQuery(window).scrollTop() / 30);
    jQuery("#header_container").css("transition", "ease-in-out opacity 5s;" - jQuery(window).scrollTop() / 30);

  });
