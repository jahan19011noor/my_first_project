<?php

	session_start();
	require 'mysqlconn.php';
	include 'security.php';
	
	$_SESSION['y'] = false;
	//$table_name = 'users';
	
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
			$query_col = "SHOW COLUMNS FROM ".mysql_real_escape_string($table_name)."";
			$query = "SELECT * FROM ".mysql_real_escape_string($table_name)."";
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
		if($run_query_col = mysql_query($query_col))
		{
			if($run_query = mysql_query($query))
			{
				if(mysql_num_rows($run_query) != 0)
				{
		?>
		<table id="the_table">
			<tr id="table_row">
			<?php
			while($row_col=mysql_fetch_row($run_query_col))
			{
			?>
				<th id="table_data" class="not"><h1><?php echo $row_col[0]?><h1></th>
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
			}
			?>
		</table>
		<?php
			if(mysql_num_rows($run_query) == 0)
			{
			?>
			<h1>The table '<?php echo $table_name?>' does not have any data inserted</h1>
			<?php
			}
		}
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
				$_SESSION['view_one_table'] = 'success';
				header('Location: testview.php');
			}
	}
	else
		{
			$_SESSION['y'] = true;
			header('Location: testview.php');
		}
	}
		
			?>
	</div>
	
</body>
</html>