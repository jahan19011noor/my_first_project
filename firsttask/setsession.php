<?php

	error_reporting(0);
	session_start();
	$_SESSION['in'] = '';
	$_SESSION['form'] = '';
	header('Location: testview.php');

?>