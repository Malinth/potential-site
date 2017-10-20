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
		  
  
	  $('a').click(function(){
	    $('html, body').animate({
	        scrollTop: $( $(this).attr('href') ).offset().top
	    }, 500);
	    return false;
	});

*/

$(function() {
  // This will select everything with the class smoothScroll
  // This should prevent problems with carousel, scrollspy, etc...
  $('.smoothScroll').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000); // The number here represents the speed of the scroll in milliseconds
        return false;
      }
    }
  });
});



		
		/* För att visa meny när man hovrar över "menu" och så visas menyn - dropdown meny*/

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
                
        
        
        /* för att dölja eller visa sidebar menyn */
        
		$('.navbartoggle').on('click', function(){
		    $('#sidebar').slideToggle('slide', { direction: 'left' }, 1000);
		    $('#primary').animate({
		        'margin-left' : $('#primary').css('margin-left') == '0px' ? '210px' : '10px'
		    }, 1000);
		});



		/* för att dölja eller visa sidebar menyn 2 

	$(function(){
	    $('.navbartoggle').on('click', function(){
	        if( $('#sidebar').is(':visible') ) {
	            $('#sidebar').animate({ 'width': '0px' }, 'slow', function(){
	                $('#sidebar').hide();
	            });
	            $('#primary').animate({ 'margin-left': '0px' }, 'slow');
	        }
	        else {
	            $('#sidebar').show();
	            $('#sidebar').animate({ 'width': '210px' }, 'slow');
	            $('#primary').animate({ 'margin-left': '210px' }, 'slow');
	        }
	    });
	});
	*/


        
                      })( jQuery );