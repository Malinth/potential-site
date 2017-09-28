/**
 * Functions go up here
 */


/**
 * Map jQuery to $
 */
(function( $ ) {
	'use strict';

	/**
	 * Runs when window is ready.
	 * Usually where most code that's not functions go.
	 */
	$(function() {
		
		$(".result").hover(function () {
	    	$(this).toggleClass("result_hover");
	  		});


		/* LOGO change */
		
		$(".site-branding").hover(function () {
	    	$(this).toggleClass(".site-branding_hover");
			});
		
		
		
		/* pagescroll to entry 
		
	$('a.hero_link[href*="#"]:not([href="#"])').click(function() {
    	if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
	      if (target.length) {
	        $('html, body').animate({
          scrollTop: (target.offset().top - 48)
        }, 1000, "easeInOutExpo");
        return false;
      }
    }
  });*/
  
  /*example 2*/
  
	  $('a').click(function(){
	    $('html, body').animate({
	        scrollTop: $( $(this).attr('href') ).offset().top
	    }, 500);
	    return false;
	});


/* example 3*/

function smoothScrollingTo(target){
  $('html,body').animate({scrollTop:$(target).offset().‌​top}, 500);
}
$('a[href*=\\#]').on('click', function(event){     
    event.preventDefault();
    smoothScrollingTo(this.hash);
});
$(document).ready(function(){
  smoothScrollingTo(location.hash);
});

		
		/* För att visa meny när man hovrar över "menu" och så visas menyn */

	               $(document).on('mouseenter', '.divbutton', function () {
                    $(this).find(":button").show();
					}).on('mouseleave', '.divbutton', function () { 
                    $(this).find(":button").hide();
                });
          
              $(document).on('mouseenter', '.divbutton', function () {
                    $(this).find(":button").show();
					}).on('mouseleave', '.divbutton', function () { 
                    $(this).find(":button").hide();
                });
                
                       
              

            var $hamburger = $('.home .hamburger'),
                $nav = $('.home .nav'),
                resizeTimer;

            $hamburger.on('mouseenter', function() {
               $nav.addClass('show');
               $hamburger.addClass('hide');
            });

            $nav.on('mouseleave', function() {
                $nav.removeClass('show');
                $hamburger.removeClass('hide');
            });

            $(window).on('resize', function() {
                clearTimeout(resizeTimer);

                resizeTimer = setTimeout(function() {
                    $(".page-permalink #content").height() + 200 > $body.height() ? $body.removeClass("center-vert webkit-flex") : $body.addClass("center-vert webkit-flex")

                    $nav.removeClass('show');
                    $hamburger.removeClass('hide');
                }, 250);
            });

            $("p").remove(":contains('Source:'),:contains('via ')");
        });
        
                      })( jQuery );