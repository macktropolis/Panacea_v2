<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie6 ie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="ie7 ie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="ie8 ie" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-ie" <?php language_attributes(); ?>> <!--<![endif]-->
<head>

	<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
	
	<!-- Metadata -->
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="keywords" content="" />
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	
	<!-- Site Author Information. -->
	<meta name="author" content="Mack Richardson" />
	<meta name="copyright" content="<?php echo date('Y'); ?>" />
	<meta name="company" content="" />
	<meta name="revisit-after" content="3 days" />
		
	<!-- Favicon. -->
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
	<!--[if IE]>
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
	<![endif]-->
	<!-- or, set /favicon.ico for IE10 win -->
	<meta name="msapplication-TileColor" content="#f01d4f">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
	
	<!-- Stylesheets. -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link href='http://fonts.googleapis.com/css?family=Lato:400,900,400italic,900italic' rel='stylesheet' type='text/css'>

	<!--[if lt IE 8]>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/screen-ie.css" type="text/css" media="screen" />
	<![endif]--> 
	
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!--[if lt IE 9]>
	<!-- HTML5 Shiv -->
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]--> 
	
	<!-- WordPress Head Stuff -->
	<?php wp_head(); ?>
	<!-- WordPress Head Stuff -->

	<!-- Drop Your Google Analytics Code Here -->
	<!-- Google Analytics Code -->
	
</head>

<body <?php body_class(); ?>>
	
	<div id="wrap"><!-- begin: wrap -->
		<div id="focus" class="clearfix"><!-- begin: focus -->
	
			<header class="site"><!-- begin: header -->		
				<div class="inner clearfix">
					<hgroup>
						<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
						<p><?php bloginfo('description'); ?></p>
					</hgroup>
					
					<?php 
						// The search form is generally included as a widget in the sidebar
						// If you'd like to manually place it in the header just uncomment
						// the next line.
						// include (TEMPLATEPATH . '/searchform.php'); 
					
						// You can copy include (TEMPLATEPATH . '/searchform.php')
						// and paste it in other parts of the theme if you'd like
						// to have a search form in the footer (for example)
					?>
				</div>
			</header><!-- end: header -->		

			<nav class="site clearfix" id="nav-site"><!-- begin: site navigation -->
				<?php panacea_main_nav(); ?>
			</nav><!-- end: site navigation -->
			