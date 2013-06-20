			</div><!-- end: focus -->
		</div><!-- end: wrap -->
		
		<footer class="site clearfix"><!-- begin: footer -->			
  		<section class="colophon">
  			<?php
  			// usage: place your start date into $start variable i.e. $start = '2008'
  			$start = '2008';
  			echo( ($start < date('Y') ? 'Copyright &copy;' . $start . '-' . date('Y') . ' Mack Richardson. All Rights Reserved.' : 'Copyright &copy; ' . $start . 'Mack Richardson. All Rights Reserved.') );
  			?> | <a href="<?php bloginfo('rss2_url'); ?>" title="RSS Feed" class="rss">Entries RSS</a> | <a href="<?php bloginfo('comments_rss2_url'); ?>" title="Comments RSS Feed" class="rss">Comments RSS</a>.
  		</section>
		
		</footer><!-- end: footer -->

	<!-- Script Libraries -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/library/js/smoothscroll.js"></script>			
	<script src="<?php echo get_template_directory_uri(); ?>/library/js/toggle_nav.js"></script>			
	
	<!-- WordPress Footer Stuff -->
	<?php wp_footer(); ?>	
	<!-- WordPress Footer Stuff -->
	
</body>
</html>