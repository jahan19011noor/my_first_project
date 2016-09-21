<?php

	session_start();
	require 'mysqlconn.php';
	include 'security.php';
	
	if(isset($_POST['field_1']) && isset($_POST['field_2']) && isset($_POST['field_3']))
	{
		$field = $_POST['field_1'];
		$field_values = $_POST['field_2'];
		$identity = $_POST['field_3'];
		
		
		if(!empty($field) && !empty($field_values) && !empty($identity))
		{
			//$table_name = escape($table);
			$field_name = escape($field);
			$field_value = escape($field_values);
			$identity = escape($identity);
			
			$field_num = str_word_count($identity, 1, '1234567890');
			
			$check = 0;
			foreach($field_num as $val)
			{
				$check++;
			}
			
			if($check == 1)
			{
			
			$query = "SHOW COLUMNS FROM image_table";
			
				if($run_query = mysql_query($query))
				{
					$field_found = false;
					
					$field_num = str_word_count($field_name, 1, '_');
					
					$check = 0;
					foreach($field_num as $val)
					{
						$check++;
					}
					
					if($check>1)
					{
						$_SESSION['please_single_image'] = 'invalid';
						header('Location: testview.php');
					}
					else if($check == 1)
					{
					//echo 'check = 1';
					
						while($row=mysql_fetch_row($run_query))
						{
							if($field_name == $row[0])
							{
								$field_found = true;
								break;
							}
							//$values[$var] = $row[0];
							//$var++;
						}
						
						if($field_found == false)
						{
							$_SESSION['image_invalid_field'] = $field_name;
							header('Location: testview.php');
						}
						else if($field_found == true)
						{
							$query = "UPDATE image_table SET ".mysql_real_escape_string($field_name)." = '".mysql_real_escape_string($field_value)."' WHERE id = '".mysql_real_escape_string($identity)."'";
							//echo $query;
							
							if($run_query = mysql_query($query))
								{
									//echo 'query';
									if($run_query = mysql_query($query))
									{
										//$_SESSION['success_table'] = $table_name;
										//echo mysql_error();
										//echo 'success';
										$_SESSION['success_image_update'] = 'success';
										header('Location: testview.php');
									}
								}
								else if(!$run_query = mysql_query($query))
								{
									//echo 'data_unsuccessful';
									$_SESSION['unsuccess_image_update'] = 'success';
									header('Location: testview.php');
								}
						}
					}
				}
				else if(!$run_query = mysql_query($query))
				{
					$_SESSION['no_such_image_table'] = $table_name;
					header('Location: testview.php');
				}
			}
			else
				{
					$_SESSION['there_id_image'] = 'success';
					header('Location: testview.php');
					//echo 'you cannot insert into table'.$table_name;
				}
		}
		else
		{
			$_SESSION['no_update_image'] = 'entered';
			header('Location: testview.php');
		}
	}
?>