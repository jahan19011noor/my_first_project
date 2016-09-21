<?php

	require 'mysqlconn.php';
	$query = "SHOW TABLES FROM $my_database";
			
	if($run_query = mysql_query($query))
	{	
		/*while ($row = mysql_fetch_row($run_query)) 
		{
			echo "Table: {$row[0]}<br>";
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
		<table id="the_table">
			<tr id="table_row">
				<th id="table_data" class="not"><h1>Names of tables in the database<h1></th>
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
			}
			?>
		</table>
	</div>
	
</body>
</html>