<?php

	session_start();
	require 'mysqlconn.php';
	include 'security.php';
	
	if(isset($_POST['field']) && isset($_POST['field_value']))
	{
		$field = $_POST['field'];
		$field_values = $_POST['field_value'];
		
		if(!empty($field) && !empty($field_values))
		{
			$field_name = escape($field);
			$field_value = escape($field_values);
			
			/*if($table_name != 'about_us' && 
				$table_name != 'admin_panel' &&
				$table_name != 'users'
				)
			{*/
			$query = "SHOW COLUMNS FROM image_table";
			
				if($run_query = mysql_query($query))
				{
					$field_found = false;
					
					$field_num = str_word_count($field_name, 1, '_');
					
					$check = 0;
					foreach($field_num as $val)
					{
						//mysql_real_escape_string($val);
						//$fields = $fields.$field_name."='".$val."' OR ";
						$check++;
					}
					
					if($check>1)
					{
						//echo $check;
						$number = 0;
						while($row=mysql_fetch_row($run_query))
						{
							foreach($field_num as $val)
							{
								if($val == $row[0])
								{
									$number++;
									//echo $val;
									break;
								}
							}
							/*if($field_name == $row[0])
							{
								$field_found = true;
								break;
							}
							*/
							//$values[$var] = $row[0];
							//$var++;
						}
						if($check == $number)
						{
							//echo 'all matched';
							
							$values = str_word_count($field_value, 1, '0123456789_');
							//print_r($values);
							
							foreach($values as $val)
							{
								//mysql_real_escape_string($val);
								//$fields = $fields.$field_name."='".$val."' OR ";
								$the_value++;
							}
							
							if($the_value == $number)
							{
							
								
							//to change for the field-value problem.
							$checking = 0;
							for($x=0; $x<$number; $x++)
							{
								//$field_num[x], $table_name
								$query_1 = "SELECT ".mysql_real_escape_string($field_num[$x])." FROM image_table";
								//echo $query_1;
								
								if($run_query_1 = mysql_query($query_1))
								{
								//echo $query_1;
								//echo $checking = 0;
									while($row=mysql_fetch_row($run_query_1))
									{
										//echo $query_1;
										if($values[$x] == $row[0])
										{
											//echo $values[$x]." == ".$row[0];
											$checking++;
											//echo $checking;
											//echo $val;
											break;
										}
										//echo $query_1;
									}
								}
								//else echo mysql_error();
							}
							
							if($checking == $number)
							{
								
								$fields = '';
								
								$set_x = 0;
								foreach($field_num as $num)
								{
									$num = mysql_real_escape_string($num);
									for($x=$set_x; $x<$check; $x++)
									{
										$values[$x] = mysql_real_escape_string($values[$x]);
										//echo $values[0];
										$fields = $fields.$num."='".$values[$x]."' OR ";
										$set_x++;
										break;
									}
									//mysql_real_escape_string($num);
									//$fields = $fields.$num."='".$val."' OR ";
								}
								$set_x = 0;
								//echo $fields;
								
								$length = strlen($fields);
								
								$final_fields = substr($fields, 0, $length-4);
								
								//echo $final_fields;
								
								$query = "DELETE FROM image_table WHERE ".$final_fields;
								//echo $query;
								
								if($run_query = mysql_query($query))
								{
									//echo 'query';
									
									
									if($run_query = mysql_query($query))
									{
										
										$_SESSION['delete_in_image_table'] = 'success';
										header('Location: testview.php');
									}
									
									
								}
								else if(!$run_query = mysql_query($query))
								{
									//echo 'unsuccessful';
									$_SESSION['the_unsuccessful'] = 'success';
									header('Location: testview.php');
								}
								}
								else
								{
									$_SESSION['wrong_image_field_value'] = 'invalid';
									header('Location: testview.php');
								}
							}
							else if($the_value != $number)
							{
								$_SESSION['wrong_number'] = 'invalid';
								header('Location: testview.php');
							}
						}
						else if($check > $number)
						{
							//echo 'all dont match';
							$_SESSION['the_field_invalid'] = 'invalid';
							header('Location: testview.php');
						}
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
							$_SESSION['one_not_found'] = $field_name;
							header('Location: testview.php');
						}
						else if($field_found == true)
						{
							//echo 'field found';
							
							$values = str_word_count($field_value, 1, '0123456789_');
							//print_r($values);
							
							$num_value = 0;
							foreach($values as $val)
							{
								//mysql_real_escape_string($val);
								//$fields = $fields.$field_name."='".$val."' OR ";
								$num_value++;
							}
							
							
							//to change for the field-value problem.
							$checking = 0;
							
								$query_1 = "SELECT ".mysql_real_escape_string($field_name)." FROM image_table";
								//echo $query_1;
								if($run_query_1 = mysql_query($query_1))
								{
									while($row=mysql_fetch_row($run_query_1))
									{
										for($x=0; $x<$num_value; $x++)
										{
											if($values[$x] == $row[0])
											{
												//echo $values[$x]." == ".$row[0];
												$checking++;
												break;
											}
										}
									}
								}
							
							if($checking == $num_value)
							{
							
							
							$fields = '';
							
							foreach($values as $val)
							{
								$val = mysql_real_escape_string($val);
								$fields = $fields.$field_name."='".$val."' OR ";
							}
							
							$length = strlen($fields);
							
							$final_fields = substr($fields, 0, $length-4);
							
							echo $final_fields;
							$query = "DELETE FROM image_table WHERE ".$final_fields;
							echo $query;
							
							if($run_query = mysql_query($query))
							{
								if($run_query = mysql_query($query))
									{
										//$_SESSION['delete_in_success_table'] = $table_name;
										//echo mysql_error();
										//echo 'success';
										$_SESSION['one_zero_rows'] = 'success';
										header('Location: testview.php');
									}
								
							}
							else if(!$run_query = mysql_query($query))
							{
								//echo 'unsuccessful';
								$_SESSION['the_one_unsuccessful'] = 'success';
								header('Location: testview.php');
							}
							}
							else 
								{
									//echo 'checking did not match number for 1 also';
									//echo 'unsuccessful';
									$_SESSION['is_such_field_value'] = 'success';
									header('Location: testview.php');
								}
						}
					}
				}
				else if(!$run_query = mysql_query($query))
				{
					$_SESSION['img_table_not_found'] = 'query unsuccess';
					header('Location: testview.php');
				}
			/*}
			else
			{
				$_SESSION['dont_delete'] = $table_name;
				header('Location: testview.php');
				//echo 'you cannot insert into table'.$table_name;
			}*/
		}
		else
		{
			$_SESSION['missing_value'] = 'entered';
			header('Location: testview.php');
		}
	}
?>