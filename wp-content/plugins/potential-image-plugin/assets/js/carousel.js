jQuery(function($) {
	// Events attachment
	$(document).ready(function() {
			$('#carousel ul').css('margin-left', 0);

			$('#carousel ul li a.carousel-prev').click(carousel_previous_link);
			$('#carousel ul li a.carousel-next').click(carousel_next_link);
		});

	// Displays another link
	function carousel_previous_link() {
		carousel_show_another_link(-1);
		return false;
	}

	// Displays the next link
	function carousel_next_link() {
		carousel_show_another_link(1);
		return false;
	}

	// Displays a different link
	function carousel_show_another_link(direction) {
		// Current link
		var ul = $('#carousel ul');
		var current = -parseInt(ul[0].style.marginLeft) / 100;

		// Link to display
		var new_link = current + direction;

		// Can we display this link?
		var links_number = ul.children('li').length;

		if (new_link >= 0 && new_link < links_number) {
			// Animation
			ul.animate({'margin-left': -(new_link * 100) + '%'});
		}
	}
});
