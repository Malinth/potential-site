/*!
* Sobre Load More v1.0.1
* Copyright 2016 Cvasnii Evgenii, Inc.
* Licensed under the MIT license
*/

(function($) {
	var query_vars = $('#query').attr('value'),
	max_pages = $('#max_pages').attr('value'),
	gridPortfolio = '#isotope-grid',
	loading_text = ajaxpagination.loading,
	loadmore_text = ajaxpagination.loadmore,
	current_page = 1;

	
	
	$(document).on( 'click', '#load-more', function( event ) {
		event.preventDefault();
		current_page++;
		
		$.ajax({
			url: ajaxpagination.ajaxurl,
			type: 'post',
			data: {
				action: 'ajax_posts_pagination',
				query: query_vars,
				page: current_page,
			},
			beforeSend: function() {
				
				$('#load-more').html('<span>'+loading_text+'</span>');
			},
			success: function( html ) {
				
				$(gridPortfolio).append(html).isotope('reloadItems');
				
				 $(gridPortfolio).imagesLoaded( function() {     
					$(gridPortfolio).isotope({
					  isOriginLeft: true,
					  stagger: 30
					});
					$(gridPortfolio).isotope();
				  });
						
	
				$('#load-more').html('<span>'+loadmore_text+'</span>');
				if (current_page == max_pages){
					$("#load-more").remove();
				}
			}
		})
	})
})(jQuery);
