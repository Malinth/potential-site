<?php
/**
 * @package Dont_Worry
 * @version 1.6
 */
/*
Plugin Name: Dont Worry
Plugin URI: https://wordpress.org/plugins/dont-worry
Description: Dont Worry Be Happy Now
Author: Malin T
Version: 1.0
Author URI: http://potential-site.dev/
Text Domain: dont_worry
*/

function dont_worry_get_lyric() {
	/** These are the lyrics to Dont Worry */
	$lyrics = "Here's a little song I wrote
You might want to sing it note for note
Don't worry, be happy
In every life we have some trouble
But when you worry you make it double
Don't worry, be happy
Don't worry, be happy now
don't worry
(Ooh, ooh ooh ooh oo-ooh ooh oo-ooh) be happy
(Ooh, ooh ooh ooh oo-ooh ooh oo-ooh) don't worry, be happy
(Ooh, ooh ooh ooh oo-ooh ooh oo-ooh) don't worry
(Ooh, ooh ooh ooh oo-ooh ooh oo-ooh) be happy
(Ooh, ooh ooh ooh oo-ooh ooh oo-ooh) don't worry, be happy
Ain't got no place to lay your head
Somebody came and took your bed
Don't worry, be happy
The landlord say your rent is late
He may have to litigate
Don't worry, be happy
Oh, ooh ooh ooh oo-ooh ooh oo-ooh don't worry, be happy";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function dont_worry() {
	$chosen = dont_worry_get_lyric();
	echo "<p id='worry'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'dont_worry' );

// We need some CSS to position the paragraph
function worry_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#worry {
		float: $x;
		padding-$x: 45px;
		padding-top: 10px;
		margin: 0;
		font-size: 15px;
	}
	</style>
	";
}

add_action( 'admin_head', 'worry_css' );

?>
