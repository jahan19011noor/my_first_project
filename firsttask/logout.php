<?php

	ob_start();
	error_reporting(0);
	session_start();
	
	session_destroy();
	
	header('Location: homepage.php');

?>