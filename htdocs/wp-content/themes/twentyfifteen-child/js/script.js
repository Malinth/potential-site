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
  
  /*example */
  
	  $('a').click(function(){
	    $('html, body').animate({
	        scrollTop: $( $(this).attr('href') ).offset().top
	    }, 500);
	    return false;
	});


	/* example 3 funkar inte eftersom jag inte har ngt som heter .top ??
	
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
	*/


		
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