<?php

	$hero_image = get_field( 'hero_image' );	
	
	$hero_heading_right = get_field( 'hero_heading_right' );
	
	$hero_text_right = get_field( 'hero_text_right' );
	
	$hero_linktext_right = get_field( 'hero_linktext_right' );
	
	$hero_link_right = get_field( 'hero_link_right' );
	
?>
<?php if ( $hero_image ) : ?>
	
	<div class="hero" style="background-image: url(<?php echo $hero_image['url']; ?>);">
				
		<img src="<?php echo $hero_image['url']; ?>" alt="<?php echo $hero_image['alt']; ?>" class="mobile-hero-img" />
		
		<?php if ( $hero_show_video ) : ?>
			<video poster="<?php echo get_template_directory_uri(); ?>/videos/tigerton.jpg" style="width:100%;height:100%;" title="tigerton" muted>
				<source src="<?php echo get_template_directory_uri(); ?>/videos/tigerton.m4v" type="video/mp4" />
				<source src="<?php echo get_template_directory_uri(); ?>/videos/tigerton.webm" type="video/webm" />
				<source src="<?php echo get_template_directory_uri(); ?>/videos/tigerton.ogv" type="video/ogg" />
				<source src="<?php echo get_template_directory_uri(); ?>/videos/tigerton.mp4" />
				<object type="application/x-shockwave-flash" data="<?php echo get_template_directory_uri(); ?>/videos/flashfox.swf" width="1280" height="720" style="position:relative;">
					<param name="movie" value="<?php echo get_template_directory_uri(); ?>/videos/flashfox.swf" />
					<param name="allowFullScreen" value="true" />
					<param name="flashVars" value="autoplay=true&controls=true&fullScreenEnabled=true&posterOnEnd=true&loop=false&poster=<?php echo get_template_directory_uri(); ?>/videos/tigerton.jpg&src=tigerton.m4v" />
					<embed src="<?php echo get_template_directory_uri(); ?>/videos/flashfox.swf" width="1280" height="720" style="position:relative;"  flashVars="autoplay=true&controls=true&fullScreenEnabled=true&posterOnEnd=true&loop=false&poster=<?php echo get_template_directory_uri(); ?>/videos/tigerton.jpg&src=tigerton.m4v"	allowFullScreen="true" wmode="transparent" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer_en" />
					<img alt="tigerton" src="<?php echo get_template_directory_uri(); ?>/videos/tigerton.jpg" style="position:absolute;left:0;" width="100%" title="Video playback is not supported by your browser" />
				</object>
			</video>
			<script src="<?php echo get_template_directory_uri(); ?>/videos/html5ext.js" type="text/javascript"></script>
		<?php endif; ?>
		
		<div class="hero-overlay"></div>
		
		<?php if ( $hero_heading_left || $hero_heading_center || $hero_heading_right ) : ?>
			
			
			<?php if ( get_field( 'job_display' ) ): ?>
			
				<div class="job-wrapper">
					
					<a href="#" class="job-teaser hero">
						<h3> <?php the_field('job_teaser'); ?> </h3>
					</a>
					
					<div class="job-content hero">
						<?php the_field('job_text'); ?>
						<img src="<?php echo get_template_directory_uri(); ?>/images/jobb-tiger.png" alt="jobb" />
						<span class="job-close job-teaser"></span>
					</div>
				
				</div>
							
			<?php else: endif; ?>
			
			
		
			<div class="hero-content">
				<div class="wrapper clearfix">
					
					<?php if ( $hero_heading_left ) : ?>
						<div class="hero-column">
							
							<img src="<?php echo $hero_icon_left['url']; ?>" alt="<?php echo $hero_icon_left['alt']; ?>" class="icon" />
							
							<h3><?php echo $hero_heading_left; ?></h3>
							<p><?php echo $hero_text_left; ?></p>
							
							<?php if( $hero_link_left ) : ?>
 								<a href="<?php echo $hero_link_left; ?>" class="btn pink button27"><?php echo $hero_linktext_left; ?></a>
							<?php endif; ?>
						</div>
					<?php endif; ?>
					
					<?php if ( $hero_heading_center ) : ?>
						<div class="hero-column">
							
							<img src="<?php echo $hero_icon_center['url']; ?>" alt="<?php echo $hero_icon_center['alt']; ?>" class="icon" />
							
							<h3><?php echo $hero_heading_center; ?></h3>
							<p><?php echo $hero_text_center; ?></p>
							
							<?php if( $hero_link_center ) : ?>
 								<a href="<?php echo $hero_link_center; ?>" class="btn pink"><?php echo $hero_linktext_center; ?></a>
							<?php endif; ?>
						</div>
					<?php endif; ?>
					
					<?php if ( $hero_heading_right ) : ?>
						<div class="hero-column">
							
							<img src="<?php echo $hero_icon_right['url']; ?>" alt="<?php echo $hero_icon_right['alt']; ?>" class="icon" />
							
							<h3><?php echo $hero_heading_right; ?></h3>
							<p><?php echo $hero_text_right; ?></p>
							
							<?php if( $hero_link_right ) : ?>
 								<a href="<?php echo $hero_link_right; ?>" class="btn pink"><?php echo $hero_linktext_right; ?></a>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
			
		<?php endif; ?>
		
		
	</div>
	
<?php endif; ?>