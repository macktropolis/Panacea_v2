<?php // Check for Featured Image	
	if (has_post_thumbnail()) {    
	
		// get the URL for the current posts featured image
		$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), false, '' );
		 
		// create an inline style tag if using the featured image as a background
		$dir = 'style="background:transparent url(\'' . $src[0] . '\') no-repeat 50% 50%;background-size:cover;"'; 
		
		// create a variable with a link and image tag for use anywhere in the post    		
		$feature = '
			<div class="h_bgdiv">
				<a href="' . get_permalink() . '" rel="bookmark" title="Permanent Link to ' . the_title_attribute('echo=0') . '">
				<img src="' . get_template_directory_uri() . '/library/images/1140x422.jpg" class="ratio" />
				<div class="feature" ' . $dir . '></div>
				</a>
			</div>';
		
	} else {
	
		// create an empty variable named feature
		$feature = '';
	
	};      			

	echo $feature;
?> 