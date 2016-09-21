<?php

	session_start();
	require 'mysqlconn.php';
	include 'security.php';
	
	//$_SESSION['a'] = false;
	//$_SESSION['b'] = false;
	
if(!isset($_SESSION['form']) || empty($_SESSION['form']))
{	
	if(isset($_POST['text']))
	{
		$table = $_POST['text'];
		
		if(!empty($table))
		{
			$table_name = escape($table);
			
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
			
			$_SESSION['table'] = $table_name;
			
			if($table_name != 'about_us' && 
				$table_name != 'admin_panel' && 
				$table_name != 'image_table' &&
				$table_name != 'users' &&
				$table_name != 'user_message'
				)
			{
			$query = "SHOW COLUMNS FROM ".mysql_real_escape_string($table_name)."";
			
			if($run_query = mysql_query($query))
			{	
				$_SESSION['rows'] = mysql_num_rows($run_query);
				
				$_SESSION['in'] = 1;
				$var = 0;
				while($row=mysql_fetch_row($run_query))
				{
					$values[$var] = $row[0];
					$var++;
				}
				
				$_SESSION['values'] = $values;
				$_SESSION['form'] = 1;
				
				//print_r($values);
				header('Location: testview.php');
			}
			else if(!$run_query = mysql_query($query))
			{
				$_SESSION['the_table'] = $table_name;
				header('Location: testview.php');
			}
			}
			else
			{
				$_SESSION['forbidden_table'] = $table_name;
				header('Location: testview.php');
				//echo 'you cannot insert into table'.$table_name;
			}
			}
			else if($check > 1)
			{
				$_SESSION['multitable'] = 'twotables';
				header('Location: testview.php');
			}
		}
		else
		{
			$_SESSION['enter'] = 'entered';
			header('Location: testview.php');
		}
	}
}
else if(isset($_SESSION['form']) && !empty($_SESSION['form']))
{
	$set = 0;
	//echo $set;
	if($set == 0)
	{
		foreach($_SESSION['values'] as $val)
		{
			if(isset($_POST[$val]))
			{
				$set++;
			}
		}
		//echo $set;
	}
	
	if($set == $_SESSION['rows'])
	{
		//echo $set;
		$set = 0;
		
		foreach($_SESSION['values'] as $val)
		{
			$fields[$val] = $_POST[$val];
		}
		print_r($fields);
		
		$field_num = str_word_count($fields[id], 1, '1234567890');
					
			$check = 0;
			foreach($field_num as $val)
			{
				$check++;
			}
		if($check == 1)
		{
			if(is_numeric($fields[id]))
			{
			
				foreach($fields as $val)
				{
					if(!empty($val))
					{
						$set++;
					}
				}
				//echo $set;
				if($set == $_SESSION['rows'])
				{
					//echo 'success;';
					
					$string = "";
					
					foreach($fields as $val)
					{
						$val = mysql_real_escape_string($val);
						$string = $string."'".$val."',";
					}
					
					//echo $string;
					
					$length = strlen($string);
					
					//echo $length;
					
					$final_string = substr($string, 0, $length-1);
					
					//echo $final_string;
					
					$query = "INSERT INTO ".$_SESSION['table']." VALUES (".($final_string).")";
					
					//echo $query;	//mysql_real_escape_string($final_string)
					
					/*('','".mysql_real_escape_string($username)."','"
					.mysql_real_escape_string($encrypt_pass)."','"
					.mysql_real_escape_string($first_name)."','"
					.mysql_real_escape_string($last_name)."')";
					*/
					if($run_query = mysql_query($query))
					{
						//echo 'success';
						$_SESSION['success'] = 'success';
						header('Location: testview.php');
					}
					else
					{
						//echo mysql_error();
						$_SESSION['unsuccess'] = 'unsuccess';
						header('Location: testview.php');
					}
					
				}
				else if($set<$_SESSION['rows'])
				{
					$_SESSION['c'] = 1;
					header('Location: testview.php');
				}
			}
			else if(!is_numeric($id))
				{
					//echo $id."not numeric";
					
					$_SESSION['id_is_not_numeric'] = 'success';
					header('Location: testview.php');
					
				}
		}
		else if($check != 1)
			{
				$_SESSION['data_is_not_one'] = 'success';
				header('Location: testview.php');
			}
	}
}
	
?>