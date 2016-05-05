<?php
session_start();
require_once("user-options.php");
require_once("connection.php");

switch($theme){
	case 'green': $theme = "success"; break;
	case 'yellow': $theme = "warning"; break;
	case 'pink': $theme = "danger"; break;
	case 'lightblue': $theme = "info"; break;
	case 'blue': $theme = "primary"; break;
	case 'grey':
	default: $theme = "default";
}

?>