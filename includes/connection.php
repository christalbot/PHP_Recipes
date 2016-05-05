<?php
$con = mysqli_connect($server_name, $server_username, $server_password, $database_name);
if(!$con){
	die("Error. Unable to connect to database.");
}
?>