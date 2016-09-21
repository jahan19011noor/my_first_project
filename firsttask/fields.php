<?php
	
	session_start();
	require 'mysqlconn.php';
	include 'security.php';
	$_SESSION['z'] = false;
	
	//$table_name = 'users';
	//$fields = 'id, username, password';
	//$columns = str_word_count($fields, 1);
	
	if(isset($_POST['text']) && isset($_POST['field_1']))
	{
		$table_name_1 = $_POST['text'];
		$fields_1 = $_POST['field_1'];
		
		if(!empty($table_name_1) && !empty($fields_1))
		{
			$table_name = escape($table_name_1);
			$fields = escape($fields_1);
			
			$values = str_word_count($table_name, 1, '0123456789_');
			
			foreach($values as $val)
			{
				//mysql_real_escape_string($val);
				//$fields = $fields.$field_name."='".$val."' OR ";
				$the_value++;
			}
			
		if($the_value == 1)
		{
			$query = "SHOW COLUMNS FROM ".mysql_real_escape_string($table_name)."";
			
			if($run_query = mysql_query($query))
			{
			$columns = str_word_count($fields, 1, '_');
			
			$check = 0;
			foreach($columns as $val)
			{
				//$val = mysql_real_escape_string($val);
				//$fields = $fields.$field_name."='".$val."' OR ";
				$check++;
			}
			
			$number = 0;
			while($row=mysql_fetch_row($run_query))
			{
				foreach($columns as $val)
				{
					if($val == $row[0])
					{
						$number++;
						//echo $val;
						break;
					}
				}
			}
			
			if($check == $number)
			{
			$query = "SELECT ".mysql_real_escape_string($fields)." FROM ".mysql_real_escape_string($table_name)."";
			/*
			if($run_query = mysql_query($query))
			{	
				while ($row = mysql_fetch_row($run_query)) 
				{
					foreach($row as $field)
					{
						echo $field.'<tb>';
					}
					echo "<br>";
				}
			}
			/*
		}
	}
	*/
	
?>



<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="table.css">
</head>

<body>
	<div id="back">
	<a href="testview.php"><input type="button" name="home" id="home" value="Back"></a>
	</div>
	
	<div id="table">
		<?php
		if($run_query = mysql_query($query))
		{	
			if(mysql_num_rows($run_query) != 0)
			{
		?>
		<table id="the_table">
			<tr id="table_row">
			<?php
			/*while($row_col=mysql_fetch_row($run_query_col))*/
			foreach($columns as $row_col)
			{
			?>
				<th id="table_data" class="not"><h1><?php echo $row_col?><h1></th>
			<?php
			}
			?>	
			</tr>
			<?php
			while($row=mysql_fetch_row($run_query))
			{	
			?>
			<tr id="table_row">
				<?php
				foreach($row as $field)
				{
				?>
				<td id="table_data" class="data"><?php echo $field?></td>
				<?php
				}
				?>
			</tr>
			<?php
			}
			?>
		</table>
		<?php
			}
			else
			{
			?>
			<h1>The table '<?php echo $table_name?>' does not have any data inserted</h1>
			<?php
			}
		}
		else
			{
			$_SESSION['sql_query_unsuccess'] = 'success';
			header('Location: testview.php');
			}
			}
			else
			{
				$_SESSION['only_from_table'] = 'success';
				header('Location: testview.php');
			}
			}
			else
			{
				$_SESSION['there_is_no_table'] = 'success';
				header('Location: testview.php');
			}
		}
		else
			{
				$_SESSION['view_from_table'] = 'success';
				header('Location: testview.php');
			}
	}
	else
	{
		$_SESSION['z'] = true;
		header('Location: testview.php');
	}
	}
	
			?>
	</div>
	
</body>
</html>