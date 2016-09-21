<?php

	session_start();
	require 'mysqlconn_2.php';
	include 'security.php';
	
	$_SESSION['x'] = false;
	
	if(isset($_POST['text']))
	{
		$table_name_1 = $_POST['text'];
		
		if(!empty($table_name_1))
		{
			$table_name = escape($table_name_1);
			
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
				
				/*if($run_query = mysql_query($query))
				{	
					while ($row = mysql_fetch_row($run_query)) 
					{
						echo "Table: {$row[0]}<br>";
					}
				}
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
		?>
		<table id="the_table">
			<tr id="table_row">
				<th id="table_data" class="not"><h1>Names of columns in the table <?php echo $table_name?><h1></th>
			</tr>
			<?php
				while($row=mysql_fetch_row($run_query))
				{
			?>
			<tr id="table_row">
				<td id="table_data" class="data"><?php echo $row[0]?></td>
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
				<h1>The table '<?php echo $table_name?>' does not exist</h1>
				<?php
				}
			}
			else
			{
				$_SESSION['one_table_please'] = 'success';
				header('Location: testview.php');
			}
		}
		else
		{
			$_SESSION['x'] = true;
			header('Location: testview.php');
		}
	}
			?>
	</div>
	
</body>
</html>