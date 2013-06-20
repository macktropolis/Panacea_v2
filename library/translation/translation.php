<?php
/* Welcome to Panacea
Thanks to the fantastic work by Panacea users, we've now
the ability to translate Panacea into different languages.

Developed by: Mack Richardson
URL: http://mackrichardson.com/panacea/
*/



// Adding Translation Option
load_theme_textdomain( 'panaceatheme', get_template_directory() .'/library/translation' );
	$locale = get_locale();
	$locale_file = get_template_directory() ."/library/translation/$locale.php";
if ( is_readable($locale_file) ) require_once($locale_file);








?>