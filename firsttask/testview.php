<?php

	session_start();
	error_reporting(0);
	//$_SESSION['in'] = 0;
?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="testviewstyle.css"/>
</head>
<body>

	
	<a href="homepage.php"><input type="button" name="home" id="home" value="Home"></a>
	
	<div id="view_form">
		<header id="heading">View Form</header>
		
		<div id="view_all">
			<h1>Section 1:</h1>
			<a href="dbimages.php" id="h2">Click to view all the images in the database</a>
			<div id="clear"></div>
			<a href="tablenames.php" id="h2">Click to view all the tables in the database</a>
		</div>
		
		<hr/>
		
		<div id="columns">
			<h1>Section 2:</h1>
			<h2>To view the columns from a table:</h2>
			<form action="columns.php" method="POST">
				<h3>Enter table name:</h3>
				<input type="text" name="text" id="text"/>
			<?php
			if(isset($_SESSION['x']) && $_SESSION['x'] == true)
			{
			?>
				<h4>Please, enter some value in the text-box.</h4>
			<?php
				$_SESSION['x'] = false;
			}
			
			if(isset($_SESSION['one_table_please']) && !empty($_SESSION['one_table_please']))
			{
			?>
				<h4>Sorry, you can view columns from a single table at a time.</h4>
			<?php
				$_SESSION['one_table_please'] = '';
			}
			?>
				<input type="submit" id="submit" value="Submit"/>
			</form>
			
		</div>
		
		<hr/>
		
		<div id="table">
			<h1>Section 3:</h1>
			<h2>To view a table:</h2>
			<form action="table.php" method="POST">
				<h3>Enter table name:</h3>
				<input type="text" name="text" id="text"/>
			
			<?php
			if(isset($_SESSION['y']) && $_SESSION['y'] == true)
			{
			?>
				<h4>Please, enter some value in the text-box.</h4>
			<?php
				$_SESSION['y'] = false;
			}
			
			if(isset($_SESSION['view_one_table']) && !empty($_SESSION['view_one_table']))
			{
			?>
				<h4>Sorry, you can view a single table at a time.</h4>
			<?php
				$_SESSION['view_one_table'] = '';
			}
			?>
				
				<input type="submit" id="submit" value="Submit"/>
			</form>
			
		</div>
		
		<hr/>
		
		<div id="fields">
			<h1>Section 4:</h1>
			
			<form action="fields.php" method="POST">
				<h2>To view some fields from a table:</h2>
				
				<div id="move_down">
				<h3>Enter table name:</h3>
				<input type="text" name="text" id="text"/>
				</div>
				
				<h2>Enter fields you wand to view:</h2>
				
				<h3 id="move_down">Enter field names:</h3>
				
				<input type="text" name="field_1" id="text"/>
				
				
				<input type="submit" id="submit" value="Submit"/>
			</form>
			<?php
			if(isset($_SESSION['z']) && $_SESSION['z'] == true)
			{
			?>
				<h4>Please fill in both of the fields.</h4>
			<?php
				$_SESSION['z'] = false;
			}
			
			if(isset($_SESSION['view_from_table']) && !empty($_SESSION['view_from_table']))
			{
			?>
				<h4>Sorry, you can view fields from a single table at a time.</h4>
			<?php
				$_SESSION['view_from_table'] = '';
			}
			
			if(isset($_SESSION['only_from_table']) && !empty($_SESSION['only_from_table']))
			{
			?>
				<h4>Sorry, you entered an invalid field name.</h4>
			<?php
				$_SESSION['only_from_table'] = '';
			}
			
			if(isset($_SESSION['there_is_no_table']) && !empty($_SESSION['there_is_no_table']))
			{
			?>
				<h4>Sorry, you entered an invalid table-name.</h4>
			<?php
				$_SESSION['there_is_no_table'] = '';
			}
			
			if(isset($_SESSION['sql_query_unsuccess']) && !empty($_SESSION['sql_query_unsuccess']))
			{
			?>
				<h4>The sql-query was unsuccessful for some unknown reason.</h4>
			<?php
				$_SESSION['sql_query_unsuccess'] = '';
			}
			?>
		</div>
	</div>
	
	<div id="view_form">
		<header id="heading">Insert Form</header>
		
		<div id="insert_image">
		<h1>Section 1:</h1>
				<h2>To insert new image to gallery:</h2>
				
				<h2>Enter image table filed values:</h2>
				<div id="clear"></div>
		<form action="insertimage.php" method="POST">
				<h3 id="move_down">Enter id field-value:</h3>
				
				<input type="text" name="field_ff" id="text_f"/>
				<div id="clear"></div>
				<h3 id="move_down">Enter image file-path:</h3>
				
				<input type="text" name="field_1" id="text_1"/>
				<div id="clear"></div>
				<h3 id="move_down">Enter division of image:</h3>
				
				<input type="text" name="field_2" id="text_2"/>
				<div id="clear"></div>
				<h3 id="move_down">Enter place of image:</h3>
				
				<input type="text" name="field_3" id="text_3"/>
				<div id="clear"></div>
				<h3 id="move_down">Enter description of image:</h3>
				
				<input type="text" name="field_4" id="text_4"/>
				
				<h3>Note: The image file should always be inside 'databaseimages' folder or directory</h3>
				
				<?php
					if(isset($_SESSION['a']) && $_SESSION['a'] == true)
					{
				?>
				<h4>Please fill in all fields</h4>
				<?php
					$_SESSION['a'] = false;
					}
					
					if(isset($_SESSION['b']) && $_SESSION['b'] == true)
					{
				?>
				<h4>Image is successfully entered into the database</h4>
				<?php
					$_SESSION['b'] = false;
					}
					
					if(isset($_SESSION['ima_query_wrong']) && !empty($_SESSION['ima_query_wrong']))
					{
				?>
				<h4>Sorry, the insert-query was unsuccessful.</h4>
				<?php
					$_SESSION['ima_query_wrong'] = '';
					}
					
					if(isset($_SESSION['id_not_one']) && !empty($_SESSION['id_not_one']))
					{
				?>
				<h4>Sorry, you can insert at a single id value at a time.</h4>
				<?php
					$_SESSION['id_not_one'] = '';
					}
					
					if(isset($_SESSION['id_not_numeric']) && !empty($_SESSION['id_not_numeric']))
					{
				?>
				<h4>Sorry, you entered an invalid id.</h4>
				<?php
					$_SESSION['id_not_numeric'] = '';
					}
				?>
				
				<input type="submit" id="submit" value="Submit"/>
				<div id="clear"></div>
				
				
		</form>
				
		</div>
		
		<hr/>
		
		<div id="insert_data">
			<h1>Section 2:</h1>
			<form action="testinsert.php" method="POST">
				<?php
					if(!isset($_SESSION['in']) || empty($_SESSION['in']))
					{
				?>
				<h2>To insert new data into a table:</h2>
				
				<div id="move_down">
				<h3>Enter table name:</h3>
				<input type="text" name="text" id="text_5"/>
				</div>
				<?php
					}
					else if($_SESSION['in'] == 1)
					{
					?>
						<h2>To insert data into table '<?php echo $_SESSION['table']?>', enter values:</h2>
					<?php
						//for($num=0; $num<$_SESSION['num_of_rows']; $num++)
						foreach($_SESSION['values'] as $values)
						{
					?>
						<h3 id="move_down">Enter '<?php echo $values?>' value:</h3>
				
						<input type="text" name="<?php echo $values?>" id="text_7"/>
						<div id="clear"></div>
						
					<?php
						}
						if(isset($_SESSION['c']) && !empty($_SESSION['c']))
						{
					?>
						<h4>Please, fill in all fields.</h4>
					<?php
							$_SESSION['c'] = '';
						}
						//$_SESSION['in'] = '';
					}
					
					if(isset($_SESSION['the_table']) && !empty($_SESSION['the_table']))
					{
				?>
				<h4>The table '<?php echo $_SESSION['the_table']?>' does not exist.</h4>
				<?php
						$_SESSION['the_table'] = '';
					}
					
					if(isset($_SESSION['forbidden_table']) && !empty($_SESSION['forbidden_table']))
					{
				?>
					<h4>Sorry, you cannot enter data into table '<?php echo $_SESSION['forbidden_table']?>'</h4>
				<?php
						$_SESSION['forbidden_table'] = '';
					}
					
					if(isset($_SESSION['success']) && !empty($_SESSION['success']))
					{
				?>
					<h4>Data is successfully inserted into table '<?php echo $_SESSION['table']?>'</h4>
				<?php
						$_SESSION['success'] = '';
					}
					
					if(isset($_SESSION['data_is_not_one']) && !empty($_SESSION['data_is_not_one']))
					{
				?>
					<h4>Sorry, you can enter data into a single id value at a time.</h4>
				<?php
						$_SESSION['data_is_not_one'] = '';
					}
					
					if(isset($_SESSION['id_is_not_numeric']) && !empty($_SESSION['id_is_not_numeric']))
					{
				?>
					<h4>Sorry, you entered an invalid id.</h4>
				<?php
						$_SESSION['id_is_not_numeric'] = '';
					}
					
					if(isset($_SESSION['unsuccess']) && !empty($_SESSION['unsuccess']))
					{
				?>
					<h4>Sorry, data insertion into table '<?php echo $_SESSION['table']?>' was unsuccessful.</h4>
				<?php
						$_SESSION['unsuccess'] = '';
					}
					
					if(isset($_SESSION['enter']) && !empty($_SESSION['enter']))
					{
				?>
				<h4>Please, enter a table name.</h4>
				<?php
						$_SESSION['enter'] = '';
					}
					
					if(isset($_SESSION['multitable']) && !empty($_SESSION['multitable']))
					{
				?>
				<h4>Sorry, you can enter data into a single table at a time.</h4>
				<?php
						$_SESSION['multitable'] = '';
					}
				?>
				
				<!--<h2>Enter fields values you want to insert:</h2>
				
				<h3 id="move_down">Enter values:</h3>
				
				<input type="text" name="field_1" id="text_6"/>
				-->
				
				
				<input type="submit" id="submit" value="Submit"/>
				<?php
					if(isset($_SESSION['in']) && $_SESSION['in'] == 1)
					{
				?>
					<a href="setsession.php"><input type="button" id="back" value="Back"></a>
				<?php
					}
				?>
			</form>
		</div>
	</div>
	
	<div id="view_form">
		<header id="heading">Delete Form</header>
		
		<div id="delete_data">
			<h1>Section 1:</h1>
				<form action="delete_data.php" method="POST">
					<h2>To delete data from a table:</h2>
					
					<h3 id="move_down">Enter table name:</h3>
				
						<input type="text" name="text" id="text_7"/>
						<div id="clear"></div>
						
					<h3 id="move_down">Enter field name to use:</h3>
				
						<input type="text" name="field" id="text_7"/>
						<div id="clear"></div>
						
					<h3 id="move_down">Enter value/s of the field to use:</h3>
				
						<input type="text" name="field_value" id="text_7"/>
						<div id="clear"></div>
					
					<?php
						if(isset($_SESSION['no_value']) && !empty($_SESSION['no_value']))
						{
					?>
						<h4>Please, fill in all fields.</h4>
					<?php
						$_SESSION['no_value'] = '';
						}
						
						if(isset($_SESSION['dont_delete']) && !empty($_SESSION['dont_delete']))
						{
					?>
						<h4>Sorry, you cannot delete data from table '<?php echo $_SESSION['dont_delete']?>'</h4>
					<?php
						$_SESSION['dont_delete'] = '';
						}
						
						if(isset($_SESSION['invalid_table']) && !empty($_SESSION['invalid_table']))
						{
					?>
						<h4>The table '<?php echo $_SESSION['invalid_table']?>' does not exist.</h4>
					<?php
						$_SESSION['invalid_table'] = '';
						}
						
						if(isset($_SESSION['invalid_field']) && !empty($_SESSION['invalid_field']))
						{
					?>
						<h4>The field '<?php echo $_SESSION['invalid_field']?>' does not exist.</h4>
					<?php
						$_SESSION['invalid_field'] = '';
						}
						
						if(isset($_SESSION['row_deleted']) && !empty($_SESSION['row_deleted']))
						{
					?>
						<h4>The row at the given id in table <?php echo $_SESSION['delete_in_success_table']?> is successfully deleted.</h4>
					<?php
						$_SESSION['row_deleted'] = '';
						}
						
						if(isset($_SESSION['data_unsuccessful']) && !empty($_SESSION['data_unsuccessful']))
						{
					?>
						<h4>Sorry, the sql-query was unsuccessful for some unknown reason.</h4>
					<?php
						$_SESSION['data_unsuccessful'] = '';
						}
						
						if(isset($_SESSION['for_success_table']) && !empty($_SESSION['for_success_table']))
						{
					?>
						<h4>Data is successfully deleted from the table <?php echo $_SESSION['one_success_table']?>.</h4>
					<?php
						$_SESSION['for_success_table'] = '';
						}
						
						if(isset($_SESSION['for_the_unsuccessful']) && !empty($_SESSION['for_the_unsuccessful']))
						{
					?>
						<h4>Sorry, the sql-query was unsuccessful for some unknown reason.</h4>
					<?php
						$_SESSION['for_the_unsuccessful'] = '';
						}
						
						if(isset($_SESSION['one_field_invalid']) && !empty($_SESSION['one_field_invalid']))
						{
					?>
						<h4>You entered an invalid field-name.</h4>
					<?php
						$_SESSION['one_field_invalid'] = '';
						}
						
						if(isset($_SESSION['wrong_field_number']) && !empty($_SESSION['wrong_field_number']))
						{
					?>
						<h4>Sorry, your field value number does not match your field number.</h4>
					<?php
						$_SESSION['wrong_field_number'] = '';
						}
						
						if(isset($_SESSION['is_not_one_table']) && !empty($_SESSION['is_not_one_table']))
						{
					?>
						<h4>Sorry, you can delete data from a single table at a time.</h4>
					<?php
						$_SESSION['is_not_one_table'] = '';
						}
						
						if(isset($_SESSION['wrong_is_the_field_value']) && !empty($_SESSION['wrong_is_the_field_value']))
						{
					?>
						<h4>Sorry, you entered an invalid field-value.</h4>
					<?php
						$_SESSION['wrong_is_the_field_value'] = '';
						}
						
						if(isset($_SESSION['no_such_field_value']) && !empty($_SESSION['no_such_field_value']))
						{
					?>
						<h4>Sorry, you entered an invalid field-value.</h4>
					<?php
						$_SESSION['no_such_field_value'] = '';
						}
					?>
					<input type="submit" id="submit" value="Submit"/>
				</form>
		</div>
		
		<hr>
		
		<div id="delete_image">
			<h1>Section 2:</h1>
				<form action="delete_image.php" method="POST">
					<h2>To delete an image or images from database:</h2>
					
					<h3 id="move_down">Enter field name to use:</h3>
				
						<input type="text" name="field" id="text_7"/>
						<div id="clear"></div>
						
					<h3 id="move_down">Enter value of the field to use:</h3>
				
						<input type="text" name="field_value" id="text_7"/>
						<div id="clear"></div>
					
					<?php
						if(isset($_SESSION['missing_value']) && !empty($_SESSION['missing_value']))
						{
					?>
						<h4>Please, fill in all fields.</h4>
					<?php
						$_SESSION['missing_value'] = '';
						}
						
						if(isset($_SESSION['img_table_not_found']) && !empty($_SESSION['img_table_not_found']))
						{
					?>
						<h4>Sorry, the table 'image_table' is not being found.</h4>
					<?php
						$_SESSION['img_table_not_found'] = '';
						}
						
						if(isset($_SESSION['one_not_found']) && !empty($_SESSION['one_not_found']))
						{
					?>
						<h4>The field '<?php echo $_SESSION['one_not_found']?>' does not exist.</h4>
					<?php
						$_SESSION['one_not_found'] = '';
						}
						
						if(isset($_SESSION['one_zero_rows']) && !empty($_SESSION['one_zero_rows']))
						{
					?>
						<h4>The row at the given id is successfully deleted.</h4>
					<?php
						$_SESSION['one_zero_rows'] = '';
						}
						
						if(isset($_SESSION['the_field_invalid']) && !empty($_SESSION['the_field_invalid']))
						{
					?>
						<h4>Sorry, you entered an invalid field-name.</h4>
					<?php
						$_SESSION['the_field_invalid'] = '';
						}
						
						if(isset($_SESSION['wrong_number']) && !empty($_SESSION['wrong_number']))
						{
					?>
						<h4>Sorry, your field value number does not match your field number.</h4>
					<?php
						$_SESSION['wrong_number'] = '';
						}
						
						if((isset($_SESSION['the_unsuccessful']) && !empty($_SESSION['the_unsuccessful']))
							|| (isset($_SESSION['the_one_unsuccessful']) && !empty($_SESSION['the_one_unsuccessful']))
						)
						{
					?>
						<h4>Sorry, the mysql-query was unsuccessful for some unknown reason.</h4>
					<?php
						$_SESSION['the_unsuccessful'] = '';
						$_SESSION['the_one_unsuccessful'] = '';
						}
						
						if(isset($_SESSION['delete_in_image_table']) && !empty($_SESSION['delete_in_image_table']))
						{
					?>
						<h4>The row at the given id is successfully deleted.</h4>
					<?php
						$_SESSION['delete_in_image_table'] = '';
						}
						
						if(isset($_SESSION['wrong_image_field_value']) && !empty($_SESSION['wrong_image_field_value']))
						{
					?>
						<h4>Sorry, you entered an invalid field-value.</h4>
					<?php
						$_SESSION['wrong_image_field_value'] = '';
						}
						
						if(isset($_SESSION['is_such_field_value']) && !empty($_SESSION['is_such_field_value']))
						{
					?>
						<h4>Sorry, you entered an invalid field-value.</h4>
					<?php
						$_SESSION['is_such_field_value'] = '';
						}
					?>
					
					<input type="submit" id="submit" value="Submit"/>
				</form>
		</div>
	</div>
	
	<div id="view_form">
		<header id="heading">Update Form</header>
		<div id="update_data">
		<h1>Section 1:</h1>
		<form action="update_data.php" method="POST">
					<h2>To update a table:</h2>
					
					<h3 id="move_down">Enter table name:</h3>
				
						<input type="text" name="field_1" id="text_7"/>
						<div id="clear"></div>
						
					<h3 id="move_down">Enter field names to update:</h3>
				
						<input type="text" name="field_2" id="text_7"/>
						<div id="clear"></div>
		
					<h3 id="move_down">Enter new values for fields:</h3>
				
						<input type="text" name="field_3" id="text_7"/>
						<div id="clear"></div>
						
					<h3 id="move_down">Enter id-values of rows to update:</h3>
				
						<input type="text" name="field_4" id="text_7"/>
						<div id="clear"></div>
					
					<?php
					if(isset($_SESSION['no_update']) && !empty($_SESSION['no_update']))
						{
					?>
						<h4>Please, fill in all the fields</h4>
					<?php
						$_SESSION['no_update'] = '';
						}
						
					if(isset($_SESSION['cannot_update']) && !empty($_SESSION['cannot_update']))
						{
					?>
						<h4>Sorry, you cannot update data in the table '<?php echo $_SESSION['cannot_update']?>'</h4>
					<?php
						$_SESSION['cannot_update'] = '';
						}
						
					if(isset($_SESSION['there_id']) && !empty($_SESSION['there_id']))
						{
					?>
						<h4>Sorry, you can only update at a single id value or row at a time.</h4>
					<?php
						$_SESSION['there_id'] = '';
						}
					
					if(isset($_SESSION['non_numeric_id']) && !empty($_SESSION['non_numeric_id']))
						{
					?>
						<h4>Sorry, you entered an invalid id-value.</h4>
					<?php
						$_SESSION['non_numeric_id'] = '';
						}
						
					if(isset($_SESSION['no_such_table']) && !empty($_SESSION['no_such_table']))
						{
					?>
						<h4>The table '<?php echo $_SESSION['no_such_table']?>' does not exist</h4>
					<?php
						$_SESSION['no_such_table'] = '';
						}
						
					if(isset($_SESSION['update_one_only']) && !empty($_SESSION['update_one_only']))
						{
					?>
						<h4>Sorry, you can update data in a single table at a time.</h4>
					<?php
						$_SESSION['update_one_only'] = '';
						}
						
					if(isset($_SESSION['please_single_field']) && !empty($_SESSION['please_single_field']))
						{
					?>
						<h4>Sorry, you can update only one field at a time.</h4>
					<?php
						$_SESSION['please_single_field'] = '';
						}
						
					if(isset($_SESSION['unsuccessful_update']) && !empty($_SESSION['unsuccessful_update']))
						{
					?>
						<h4>The row at the given id is successfully updated.</h4>
					<?php
						$_SESSION['unsuccessful_update'] = '';
						}
						
					if(isset($_SESSION['sorry_unsuccess']) && !empty($_SESSION['sorry_unsuccess']))
						{
					?>
						<h4>Sorry, the sql-query was unsuccessful for some unknown reason.</h4>
					<?php
						$_SESSION['sorry_unsuccess'] = '';
						}
						
					if(isset($_SESSION['such_invalid_field']) && !empty($_SESSION['such_invalid_field']))
						{
					?>
						<h4>The field name '<?php echo $_SESSION['such_invalid_field']?>' does not exist</h4>
					<?php
						$_SESSION['such_invalid_field'] = '';
						}
					?>
					
					<input type="submit" id="submit" value="Submit"/>
		</form>
		</div>
		
		<hr>
		
		<div id="update_image">
		<h1>Section 2:</h1>
		<form action="update_image.php" method="POST">
					<h2>To update image_table:</h2>
						
					<h3 id="move_down">Enter field names to update:</h3>
				
						<input type="text" name="field_1" id="text_7"/>
						<div id="clear"></div>
		
					<h3 id="move_down">Enter new values for fields:</h3>
				
						<input type="text" name="field_2" id="text_7"/>
						<div id="clear"></div>
						
					<h3 id="move_down">Enter id-values of rows to update:</h3>
				
						<input type="text" name="field_3" id="text_7"/>
						<div id="clear"></div>
					<?php
					if(isset($_SESSION['no_update_image']) && !empty($_SESSION['no_update_image']))
						{
					?>
						<h4>Please fill in all the fields</h4>
					<?php
						$_SESSION['no_update_image'] = '';
						}
						
					if(isset($_SESSION['please_single_image']) && !empty($_SESSION['please_single_image']))
						{
					?>
						<h4>Sorry, you can update only one field at a time.</h4>
					<?php
						$_SESSION['please_single_image'] = '';
						}
						
					if(isset($_SESSION['image_invalid_field']) && !empty($_SESSION['image_invalid_field']))
						{
					?>
						<h4>Sorry, you entered an invalid field name.</h4>
					<?php
						$_SESSION['image_invalid_field'] = '';
						}
						
					if(isset($_SESSION['success_image_update']) && !empty($_SESSION['success_image_update']))
						{
					?>
						<h4>The row at the given id is successfully updated.</h4>
					<?php
						$_SESSION['success_image_update'] = '';
						}
						
					if(isset($_SESSION['unsuccess_image_update']) && !empty($_SESSION['unsuccess_image_update']))
						{
					?>
						<h4>Sorry, the sql-query was unsuccessful for some unknown reason.</h4>
					<?php
						$_SESSION['unsuccess_image_update'] = '';
						}
						
					if(isset($_SESSION['no_such_image_table']) && !empty($_SESSION['no_such_image_table']))
						{
					?>
						<h4>Sorry, image table is not being found.</h4>
					<?php
						$_SESSION['no_such_image_table'] = '';
						}
						
					if(isset($_SESSION['there_id_image']) && !empty($_SESSION['there_id_image']))
						{
					?>
						<h4>Sorry, you entered an invalid id-value.</h4>
					<?php
						$_SESSION['there_id_image'] = '';
						}
					?>
				
					<input type="submit" id="submit" value="Submit"/>
		</form>
		</div>
		
		
	</div>
</body>
</html>