<?php
/*
*
* Debug mode:
* Toggles if the errors are displayed or hidden
* 0 = errors are not displayed(Production value)
* 1 = display errors
*/
error_reporting(E_ERROR | E_WARNING | E_PARSE);
 // error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);
define( 'ACTIVITY_PATH', dirname(__FILE__) . '/' );

/*
* Activity.php is just place to set various configration options.
* After setting the config options, we load another file core.php
* which actually set the ball rolling
*/
require_once( ACTIVITY_PATH . 'activity-mvc-framework/app/core.php');