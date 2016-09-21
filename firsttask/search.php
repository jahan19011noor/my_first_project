<?php

	require 'connect.php';
	include 'security.php';
	
	$x = false;
	
	if(isset($_POST['search_box']))
	{
		$search = $_POST['search_box'];
		
		if(!empty($search))
		{
			$string = escape($search);
			
			$query = "SELECT image, place, about FROM image_table WHERE 
			division LIKE '%".mysql_real_escape_string($string)."%' OR
			place LIKE '%".mysql_real_escape_string($string)."%' OR
			about LIKE '%".mysql_real_escape_string($string)."%'";
			
			if(!$result = $db->query($query))
			{
				die($db->error);
			}
			else
			{
				
?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="chittagong.css">
</head>
<body>
	<div id="back">
	<a href="homepage.php"><input type="button" name="home" id="home" value="Home"></a>
	</div>

	<div id="section">
		<?php
		if($result->num_rows)
		{
			while($rows = $result->fetch_object())
			{
	?>
	<div id="one_img">
		<div id="image">
			<img src="<?php echo $rows->image;?>">
		</div>
		<div id="place">
			<h1><?php echo $rows->place;?></h1>
		</div>
		<div id="about">
			<h2><?php echo $rows->about;?><h2>
		</div>
	</div>
		<?php
			}
			$result -> free();
		}
		else
		{?>
		
		<div id="not_found">
			<h1>No results found for <?php echo $search?></h1>
		</div>
		<?php
		}?>
	</div>
	<?php	
		
	}
}
}
	?>
</body>
</html>