<?php
	error_reporting(0);
	$my_server = 'localhost';
	$my_user = 'root';
	$my_pass = '';

	$my_database = 'tourist_attraction';

	$db = new mysqli($my_server, $my_user,'', $my_database);
	$error = false;
	
	if($db -> connect_errno)
	{
		echo $db -> connect_error;
		$error = true;
	}
	
	if($error == true)
	{
		die('<br>sorry, some error have occured.');
	}

?>