<?php

error_reporting(0);
$my_server = 'localhost';
$my_user = 'root';
$my_pass = '';
$my_database = 'tourist_attraction';

if(@!mysql_connect($my_server, $my_user, $my_pass) || !mysql_select_db($my_database))
{
	die('error');
}
?>