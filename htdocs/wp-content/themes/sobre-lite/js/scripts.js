(function($){

  "use strict"; 

  $(window).on('load', function() {

    // Preloader
    $('.loader').fadeOut();
    $('.loader-mask').delay(350).fadeOut('slow');
   

    $(window).trigger("resize");
  });


  // Init
  initMasonry();


  /* Sidenav
  -------------------------------------------------------*/
  var $navOpened = $(".nav-type-1, #nav-icon");

  $("#nav-trigger").on('click', function() {
    $navOpened.toggleClass('opened');
  });

  $('.main-wrapper').on('click', function() {
    $navOpened.removeClass('opened');
  });


  /* Mobile Detect
  -------------------------------------------------------*/
  if (/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i.test(navigator.userAgent || navigator.vendor || window.opera)) {
     $("html").addClass("mobile");
     $('.dropdown-toggle').attr('data-toggle', 'dropdown');
  }
  else {
    $("html").removeClass("mobile");
  }

  /* IE Detect
  -------------------------------------------------------*/
  if(Function('/*@cc_on return document.documentMode===10@*/')()){ $("html").addClass("ie"); }




  /* Nav Toggles
  -------------------------------------------------------*/
  $(".nav-item-submenu").hide();
  $(".nav-item-toggle").on('click', "> a", function(e){
    e.preventDefault();
    if ($(this).hasClass("active")) {
      $(this).next().slideUp("easeOutExpo");
      $(this).removeClass("active");
    }

    else {
      $(this).next(".nav-item-submenu");
      $(this).addClass("active");
      $(this).next().slideDown("easeOutExpo");
    }

  });



    /* Portfolio Isotope
     -------------------------------------------------------*/

    var $portfolio = $('#isotope-grid');
    $portfolio.imagesLoaded( function() {
        $portfolio.isotope({
            isOriginLeft: true,
            stagger: 30
        });
        $portfolio.isotope();
    });


    /* Masonry
    -------------------------------------------------------*/
    function initMasonry(){

        var $masonry = $('#masonry-grid');
        $masonry.imagesLoaded( function() {
            $masonry.isotope({
                itemSelector: '.work-item',
                layoutMode: 'masonry',
                percentPosition: true,
                resizable: false,
                isResizeBound: false,
                masonry: { columnWidth: '.work-item.quarter' }
            });
        });

        $masonry.isotope();
    }

    // Isotope filter
    var $portfolioFilter = $('#isotope-grid, #masonry-grid');
    $('.portfolio-filter').on( 'click', 'a', function(e) {
        e.preventDefault();
        var filterValue = $(this).attr('data-filter');
        $portfolioFilter.isotope({ filter: filterValue });
        $('.portfolio-filter a').removeClass('active');
        $(this).closest('a').addClass('active');
    });



})(jQuery);