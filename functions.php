<?php
/*
Author: Mack Richardson
URL: htp://mackrichardson.com/panacea/

This is where you can drop your custom functions or
just edit things like thumbnail sizes,
sidebars, etc.
*/

/*
1. library/functions/extensions.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the read more link
*/
require_once('library/functions/extensions.php');
/*
2. library/functions/shortcodes.php
	- display raw code [raw][/raw]
*/
require_once('library/functions/shortcodes.php');
/*
3. library/functions/custom-post-type.php
	- an example custom post type
	- example custom taxonomy (like categories)
	- example custom taxonomy (like tags)
*/
require_once('library/functions/custom-post-type.php'); // you can disable this if you like
/*
4. library/functions/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
require_once('library/functions/admin.php'); // you can disable this if you like
/*
5. library/translation/translation.php
	- adding support for other languages
*/
// require_once('library/translation/translation.php'); // this comes turned off by default

// enable custom menus
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		  'primary' => 'Primary Header Nav',
		  'foot_menu' => 'My Custom Footer Menu'
		)
	);
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'panacea-thumb-600', 600, 150, true );
add_image_size( 'panacea-thumb-300', 300, 100, true );
/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'panacea-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'panacea-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/
// Sidebars & Widgetizes Areas
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __('Sidebar 1', 'panaceatheme'),
		'description' => __('The first (primary) sidebar.', 'panaceatheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __('Sidebar 2', 'panaceatheme'),
		'description' => __('The second (secondary) sidebar.', 'panaceatheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/


/************* IMAGES ********************/
// add support for a post featured image (aka thumbnails)
add_theme_support( 'post-thumbnails' );

// add support for a secondary post featured image
if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(array(
    'label' => 'Secondary Image',
    'id' => 'secondary-image',
    'post_type' => 'post'
    )
);
}


/************* BACKGROUND IMAGE & COLOR ********************/
// add support for user defined background images & colors
$defaults = array(
	'default-color'          => '',
	'default-image'          => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $defaults );




/************* SEARCH RESULTS ********************/
// this function excludes pages from search results
function SearchFilter($query) {
	if ($query->is_search) {
		$query->set('post_type', array('post'));
		}
		return $query;
		}
add_filter('pre_get_posts','SearchFilter');


/************* CUSTOM POST TYPES ********************/
// this function adds custom post types to the wp_get_archives tag
add_filter( 'getarchives_where' , 'ucc_getarchives_where_filter' , 10 , 2 );
function ucc_getarchives_where_filter( $where , $r ) {
  $args = array(
    'public' => true ,
    '_builtin' => false
  );
  $output = 'names';
  $operator = 'and';

  $post_types = get_post_types( $args , $output , $operator );
  $post_types = array_merge( $post_types , array( 'post' ) );
  $post_types = "'" . implode( "' , '" , $post_types ) . "'";

  return str_replace( "post_type = 'post'" , "post_type IN ( $post_types )" , $where );
}


/************* IMPROVED EXCERPT ********************/
function improved_trim_excerpt($text) {
  global $post;
  if ( '' == $text ) {
          $text = get_the_content('');
          $text = apply_filters('the_content', $text);
          $text = str_replace('\]\]\>', ']]&gt;', $text);
          $text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
          $text = strip_tags($text, '<p>, <small>, <h2>, <h3>, <h4>, <h5>, <h6>, <ol>, <ul>, <a>, <dfn>, <li>, <b>, <i>, <em>, <strong>, <code>, <span>, <blockquote>, <cite>');
          $excerpt_length = 55;
          $words = explode(' ', $text, $excerpt_length + 1);
          if (count($words)> $excerpt_length) {
                  array_pop($words);
                  array_push($words, '... <a href="'. get_permalink($post->ID) . '" class="more-link" title="">' . 'Read More &raquo;' . '</a>');
                  $text = implode(' ', $words);
          }
  }
  return $text;
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'improved_trim_excerpt');

?>