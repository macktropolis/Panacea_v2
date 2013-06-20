<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
	
	if (!empty($post->post_password)) { // if there's a password
	if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
?>

<h6 class="nocomments">This post is password protected. Enter the password to view comments.</h6>

<?php
	return;
	}
	}
?>

<!-- You can start editing here. -->

<?php if ('open' == $post->comment_status) : ?>

<?php if ($comments) : ?>
<!-- Begin the Comment List. -->
<section class="commentlist">	
  
  <h6 class="title"><?php comments_number('0 Comments', '1 Comment', '% Comments' );?> on &#8220;<?php the_title(); ?>&#8221;</h6>

	<?php foreach ($comments as $comment) : ?>
	<article class="singlecomment clearfix">	<!-- begin: single comment wrapper -->
		
		<div class="author"><!-- begin: author content -->
			<?php echo get_avatar( $comment, 62 ); ?>					
		</div><!-- end: author content -->
		
		<div class="comment"><!-- begin: comment content -->
			<p>On <?php comment_date() ?>, <?php comment_author_link() ?> said:</p>
					
			<?php if ($comment->comment_approved == '0') : ?>						
				<p><i>Your comment is awaiting moderation.</i></p>
			<?php endif; ?>
				
			<?php comment_text() ?>
				
			<p><?php edit_comment_link('Edit this Comment','',' &raquo;'); ?></p>
		</div><!-- end: comment content -->

	</article><!-- end: single comment wrapper -->
				
	<?php endforeach; /* end for each comment */ ?>

</section>
<!-- End the Comment List. -->
	
<?php else : // this is displayed if there are no comments so far ?>

<?php if ('open' == $post->comment_status) : ?>
<!-- If comments are open, but there are no comments. -->
<?php else : // comments are closed ?>
<!-- If comments are closed. -->
<p class="nocomments">Comments are closed.</p>
<?php endif; // If comments are closed. ?>
<?php endif; // If there are any comments. ?>
		
<?php endif; // If registration required and not logged in ?>

<!-- begin: commentform section -->
<section class="commentform">
  <h5>Leave a Comment</h5>
  
  <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
  	<p class="nopassword">You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
  <?php else : ?>
  
  <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="clearfix" name="commentform">
  <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
  	
  	<?php if ( $user_ID ) : ?>
  	
  		<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a></p>
  	
  	<?php else : ?>
  	
  		<label for="author">Name <?php if ($req) echo "<span class='alert'>*</span>"; ?></label>
  		<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
  		
  		<label for="email">Email Address <span class="alert">(will not be published)</span> <?php if ($req) echo "<span class='alert'>*</span>"; ?></label>
  		<input type="email" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
  		
  		<label for="url">Website</label>
  		<input type="url" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
  	
  	<?php endif; ?>
  	
  		<label for="comment">Your Comment</label>
  		<textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea>
  	
  		<input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" class="button" />
  		
  		<p class="guidelines"><b>Guidelines:</b> I reserve the right to delete off-topic, inflammatory, or anonymous comments. <b>XHTML:</b> You can use these tags: <code><?php echo allowed_tags(); ?></code></p>
  	
  	<?php do_action('comment_form', $post->ID); ?>
  	
  </form>
  <!-- End the Comment Form. -->
</section>
<!-- end: commentform section -->

<?php endif; // if you delete this the sky will fall on your head ?>