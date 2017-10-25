<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sobre Lite
 */

?>

		<!-- Footer -->
		<footer class="footer">
		  <div class="bottom-footer bg-white">
			<div class="container">
			  <div class="row">
				  <?php do_action('sobre_lite_footer'); ?>
			  </div>
			</div>
		  </div>
		</footer> <!-- end footer -->
  </main> <!-- end main wrapper -->

<?php wp_footer(); ?>

</body>
</html>
