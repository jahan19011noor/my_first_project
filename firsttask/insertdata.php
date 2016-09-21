<?php

	session_start();
	require 'mysqlconn.php';
	include 'security.php';
	$_SESSION['a'] = false;
	$_SESSION['b'] = false;
	
	if(
		isset($_POST['text']) && 
		isset($_POST['field_1'])
		)
	{
		$field_1 = $_POST['text'];
		$field_2 = $_POST['field_1'];
		
		if(
			!empty($field_1) &&
			!empty($field_2)
		)
		{
			$table_name = escape($field_1);
			$values = escape($field_2);
			
			$columns = str_word_count($values, 1);
			
			$query = "INSERT INTO image_table VALUES 
			('','".mysql_real_escape_string($image)."','"
			.mysql_real_escape_string($division)."','"
			.mysql_real_escape_string($place)."','"
			.mysql_real_escape_string($about)."')";
			
			if($run_query = mysql_query($query))
			{
				$_SESSION['b'] = true;
				header('Location: testview.php');
			}
		}
		else
		{
			$_SESSION['a'] = true;
			header('Location: testview.php');
		}
	}
	
?>