<?php

	session_start();
	require 'mysqlconn.php';
	include 'security.php';
	$_SESSION['a'] = false;
	$_SESSION['b'] = false;
	
	//echo 'success';
	if(
		isset($_POST['field_ff']) && 
		isset($_POST['field_1']) && 
		isset($_POST['field_2']) &&
		isset($_POST['field_3']) &&
		isset($_POST['field_4'])
		)
	{
		$field_f = $_POST['field_ff'];
		$field_1 = $_POST['field_1'];
		$field_2 = $_POST['field_2'];
		$field_3 = $_POST['field_3'];
		$field_4 = $_POST['field_4'];
		//echo 'success';
		if(
			!empty($field_f) &&
			!empty($field_1) &&
			!empty($field_2) &&
			!empty($field_3) &&
			!empty($field_4)
		)
		{
			$id = escape($field_f);
			$image = escape($field_1);
			$division = escape($field_2);
			$place = escape($field_3);
			$about = escape($field_4);
			
			$field_num = str_word_count($id, 1, '1234567890');
					
			$check = 0;
			foreach($field_num as $val)
			{
				$check++;
			}
			if($check == 1)
			{
				if(is_numeric($id))
				{
					//echo $id." is numeric";
					
					$query = "INSERT INTO image_table VALUES 
					('".mysql_real_escape_string($id)."','"
					.mysql_real_escape_string($image)."','"
					.mysql_real_escape_string($division)."','"
					.mysql_real_escape_string($place)."','"
					.mysql_real_escape_string($about)."')";
					
					//echo 'success';
					
					if($run_query = mysql_query($query))
					{
						//echo 'success';
						$_SESSION['b'] = true;
						header('Location: testview.php');
					}
					else
					{
						$_SESSION['ima_query_wrong'] = 'success';
						header('Location: testview.php');
					}
					
				}
				else if(!is_numeric($id))
				{
					//echo $id."not numeric";
					
					$_SESSION['id_not_numeric'] = 'success';
					header('Location: testview.php');
					
				}
			}
			else if($check != 1)
			{
				$_SESSION['id_not_one'] = 'success';
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