<?php

error_reporting(0);

?>

<!DOCTYPE html>

<html>
<head>
	<link rel="stylesheet" href="adminstyle.css">
</head>
<body>
	
	<section id="view">
	<form id="first_form" action="" method="POST">
	<p id="header">View Form</p>
	<div id="view_table">
		<p id="heading" class="first">
			<h1>To view the database</h1>
			<h1><a href="#" id="table_name">Click here</a></h1>
		</p>
		<div id="clear"></div>
		
		<p id="heading">To view the tables:</p>
		<p>
			<h1><a href="#">Click here</a></h1>
		</p>
		<div id="clear"></div>
		
		<p id="heading">To view the columns from a table:</p>
		<p>
			<h1><a href="#">Click here</a></h1>
		</p>
		<div id="clear"></div>
		
		<p id="heading" class="first">To view all fields from a table:</p>
		<p>
			<h1>Enter table name:</h1>
			<input type="text" name="whole_table" id="table_name"/>
		</p>
		<div id="clear"></div>
		
		<p id="heading">To view all images in the database:</p>
		<p>
			<h1><a href="#">Click here</a></h1>
		</p>
		<div id="clear"></div>
		
		<p id="heading">To view some fields from a table:</p>
		<p>
			<h1>Enter table name:</h1>
			<input type="text" name="some_table" id="table_field"/>
		</p>
		<div id="clear"></div>
		<p id="heading">Enter fields you want to view:</p>
		
		<div id="fields">
		<p>
			<h1>Enter a field name:</h1>
			<input type="text" name="field_1" id="field"/>
		</p>
		<div id="clear"></div>
		<p>
			<h1>Enter a field name:</h1>
			<input type="text" name="field_2" id="field"/>
		</p>
		<div id="clear"></div>
		<p>
			<h1>Enter a field name:</h1>
			<input type="text" name="field_3" id="field"/>
		</p>
		<div id="clear"></div>
		<p>
			<h1>Enter a field name:</h1>
			<input type="text" name="field_4" id="field"/>
		</p>
		<div id="clear"></div>
		<p>
			<h1>Enter a field name:</h1>
			<input type="text" name="field_5" id="field"/>
		</p>
		</div>
		<div id="clear"></div>
		<p><input type="submit" value="Perform Query" id="submit"></p>
	</div>
	</form>
	</section>
	
	<section id="view">
	<form id="first_form" action="" method="POST">
	<p id="header">Insert Form</p>
	<div id="view_table">
		<p id="heading" class="first">To insert new image to gallery:</p>
		<div id="clear"></div>
		<p id="heading" class="first">Enter all the image table data:</p>
		<div id="clear"></div>
		<div id="fields">
		<p>
			<h1>Enter 'image' field value or file path:</h1>
			<input type="text" name="field_1" id="field"/>
		</p>
		<div id="clear"></div>
		<p>
			<h1>Enter 'division' field value:</h1>
			<input type="text" name="field_2" id="field"/>
		</p>
		<div id="clear"></div>
		<p>
			<h1>Enter 'place' field value:</h1>
			<input type="text" name="field_3" id="field"/>
		</p>
		<div id="clear"></div>
		<p>
			<h1>Enter 'about' field value:</h1>
			<input type="text" name="field_4" id="field"/>
		</p>
		<div id="clear"></div>
		
		<p id="heading">To insert data into a table:</p>
		<p>
			<h1>Enter table name:</h1>
			<input type="text" name="some_table" id="table_field"/>
		</p>
		<div id="clear"></div>
		<p id="heading">Enter field values:</p>
		
		<div id="fields">
		<p>
			<input type="text" name="field_1" id="field"/>
		</p>
		<div id="clear"></div>
		<p>
			<input type="text" name="field_2" id="field"/>
		</p>
		<div id="clear"></div>
		<p>
			<input type="text" name="field_3" id="field"/>
		</p>
		<div id="clear"></div>
		<p>
			<input type="text" name="field_4" id="field"/>
		</p>
		<div id="clear"></div>
		<p>
			<input type="text" name="field_5" id="field"/>
		</p>
		</div>
		<div id="clear"></div>
		<p><input type="submit" value="Perform Query" id="submit"></p>
	</div>
	</form>
	</section>
	
	<section id="view">
	<form id="first_form" action="" method="POST">
	<p id="header">Delete Form</p>
	<div id="view_table">
		<p id="heading" class="first">To delete an image from gallery:</p>
		<div id="clear"></div>
		<p id="heading" class="first">Enter all the image table data:</p>
		<div id="clear"></div>
		<div id="fields">
		<p>
			<h1>Enter 'image' field value or file path:</h1>
			<input type="text" name="field_1" id="field"/>
		</p>
		<div id="clear"></div>
		
		
		<p id="heading">To delete data from a table:</p>
		<p>
			<h1>Enter table name:</h1>
			<input type="text" name="some_table" id="table_field"/>
		</p>
		<div id="clear"></div>
		<p id="heading">Enter any one field value of the item to delete:</p>
		
		<div id="fields">
		<p>
			<input type="text" name="field_1" id="field"/>
		</p>
		<div id="clear"></div>
		
		<p><input type="submit" value="Perform Query" id="submit"></p>
	</div>
	</form>
	</section>
	
	<section id="view">
	<form id="first_form" action="" method="POST">
	<p id="header">Update Form</p>
	<div id="view_table">
		<p id="heading" class="first">To delete an image from gallery:</p>
		<div id="clear"></div>
		<p id="heading" class="first">Enter all the image table data:</p>
		<div id="clear"></div>
		<div id="fields">
		<p>
			<h1>Enter 'image' field value or file path:</h1>
			<input type="text" name="field_1" id="field"/>
		</p>
		<div id="clear"></div>
		
		
		<p id="heading">To delete data from a table:</p>
		<p>
			<h1>Enter table name:</h1>
			<input type="text" name="some_table" id="table_field"/>
		</p>
		<div id="clear"></div>
		<p id="heading">Enter any one field value of the item to delete:</p>
		
		<div id="fields">
		<p>
			<input type="text" name="field_1" id="field"/>
		</p>
		<div id="clear"></div>
		
		<p><input type="submit" value="Perform Query" id="submit"></p>
	</div>
	</form>
	</section>
</body>
</html>