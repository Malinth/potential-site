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
	    	$()
		});

		/* För att visa meny när man hovrar över "menu" och så visas menyn */


	    $(".menubtn").hover(function(){
        $("#menu1").fadeIn("slow");
        $("#menu2").fadeIn("slow");
    	});


/*
  $('.footerbutton').hover(function () {
    var message = $('<p>Meny3</p>');
    $('.result_hover').append(message);
	});

		$(function() {
		
	$(".result_hover").hover(function () {
    $("div #item").css("visibility","visible");
      },
      function () {
        $("div #item").css("visibility","hidden");
     
     } });*/
      
})( jQuery );

