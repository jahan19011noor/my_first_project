<?php

	session_start();
	require 'mysqlconn.php';
	include 'security.php';
	
	if(isset($_POST['field_1']) && isset($_POST['field_2']) && isset($_POST['field_3']) && isset($_POST['field_4']))
	{
		$table = $_POST['field_1'];
		$field = $_POST['field_2'];
		$field_values = $_POST['field_3'];
		$identity = $_POST['field_4'];
		
		
		if(!empty($table) && !empty($field) && !empty($field_values) && !empty($identity))
		{
			$table_name = escape($table);
			$field_name = escape($field);
			$field_value = escape($field_values);
			$identity = escape($identity);
			
			$table_num = str_word_count($table_name, 1, '_');
					
			$check = 0;
			foreach($table_num as $val)
			{
				//$val = mysql_real_escape_string($val);
				//$fields = $fields.$field_name."='".$val."' OR ";
				$check++;
			}
			
			if($check == 1)
			{
			if($table_name != 'admin_panel' &&
				$table_name != 'users' &&
				$table_name != 'user_message'
				)
			{
			
			$field_num = str_word_count($identity, 1, '1234567890');
					
			$check = 0;
			foreach($field_num as $val)
			{
				$check++;
			}
			
			if($check == 1)
			{
			
			if(is_numeric($identity))
			{
			
			$query = "SHOW COLUMNS FROM ".mysql_real_escape_string($table_name)."";
			
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
						$_SESSION['please_single_field'] = 'invalid';
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
							$_SESSION['such_invalid_field'] = $field_name;
							header('Location: testview.php');
						}
						else if($field_found == true)
						{
							$query = "UPDATE ".mysql_real_escape_string($table_name)." SET ".mysql_real_escape_string($field_name)." = '".mysql_real_escape_string($field_value)."' WHERE id = '".mysql_real_escape_string($identity)."'";
							//echo $query;
							
							if($run_query = mysql_query($query))
								{
									//echo 'query';
									if($run_query = mysql_query($query))
									{
										//$_SESSION['success_table'] = $table_name;
										//echo mysql_error();
										//echo 'success';
										$_SESSION['unsuccessful_update'] = 'success';
										header('Location: testview.php');
									}
								}
								else if(!$run_query = mysql_query($query))
								{
									//echo 'data_unsuccessful';
									$_SESSION['sorry_unsuccess'] = 'success';
									header('Location: testview.php');
								}
						}
					}
				}
				else if(!$run_query = mysql_query($query))
				{
					$_SESSION['no_such_table'] = $table_name;
					header('Location: testview.php');
				}
				}
				else
				{
					$_SESSION['non_numeric_id'] = 'success';
					header('Location: testview.php');
				}
			}
				else
				{
					$_SESSION['there_id'] = 'success';
					header('Location: testview.php');
					//echo 'you cannot insert into table'.$table_name;
				}
			}
			else
			{
				$_SESSION['cannot_update'] = $table_name;
				header('Location: testview.php');
				//echo 'you cannot insert into table'.$table_name;
			}
			}
			else if($check > 1)
			{
				$_SESSION['update_one_only'] = 'twotables';
				header('Location: testview.php');
			}
		}
		else
		{
			$_SESSION['no_update'] = 'entered';
			header('Location: testview.php');
		}
	}
?>