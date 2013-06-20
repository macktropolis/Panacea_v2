<?php get_header(); ?>

<section id="content">

	<div id="inner-content" class="clearfix">

		<div id="main" class="clearfix" role="main">

			<?php if (have_posts()) : // begin loop ?>
			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>				
			<?php if (is_search()) { // If this a search results page ?>
			
				<h6 class="title">Search Results for <?php the_search_query(); ?></h6>
			
			<?php } ?>
			<?php while (have_posts()) : the_post(); // If Posts are present, then do this...?>
			
				<article class="clearfix">
			
						<header class="article">
					
							<?php include(TEMPLATEPATH . '/featured_image.php') ; ?>			
						
							<hgroup>			
					
								<h2 id="post-<?php the_ID(); ?>" class="title">
									<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
										<?php the_title(); ?>
									</a>
								</h2><!--end: .title -->
								
								<h3 class="dateline">
									<span class="author"><span>Posted by </span><?php the_author(); ?></span> 
									<time datetime="<?php the_time('F j, Y g:i a') ?>"><span>on </span><?php the_date() ?></time>
									<span class="amp">&amp;</span> 
									<span class="category"><span>filed under </span><?php the_category(', '); ?></span>
								</h3><!-- end: .dateline -->
					
							</hgroup><!-- end: hgroup -->
						
						</header><!-- header.article -->
						
						<section class="entry clearfix">					
							
								<?php the_excerpt(); ?>
							
						</section><!-- end: .entry -->
						
						<footer class="article">
					
							<p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'panaceatheme') . '</span> ', ', ', ''); ?></p>
						
						</footer><!-- end: footer.article -->
			
				</article><!-- end: article -->
			
			<?php endwhile; ?>
			
			<?php if (function_exists('panacea_page_navi')) { ?>
			
				<?php panacea_page_navi(); ?>
			
			<?php } else { ?>
			
				<nav class="wp-prev-next article">
					<ul class="clearfix">
						<li class="prev-link prev"><?php next_posts_link(__('&laquo; Older Entries', "panaceatheme")) ?></li>
						<li class="next-link next"><?php previous_posts_link(__('Newer Entries &raquo;', "panaceatheme")) ?></li>
					</ul>
				</nav>
			
			<?php } ?>
									
			<?php else : //If no posts are present, then do this instead... ?>
			<?php include_once(TEMPLATEPATH . '/content_404.php'); ?>		
			<?php endif; //End Loop ?>

		</div><!-- end: #main -->
		
		<?php get_sidebar(); ?>

	</div><!-- end: #inner-content -->
	
</section><!-- end: #content -->

<?php get_footer(); ?>