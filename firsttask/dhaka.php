<?php

	require 'connect.php';
	
	if(!$result = $db->query("SELECT image, place, about FROM image_table WHERE division='dhaka'"))
	{
		die($db->error);
	}
	else
	{
		if($result->num_rows)
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
	<?php 
		while($rows = $result->fetch_object())
			{
	?>
	<div id="section">
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
	</div>
	<?php
			}
		}
		$result -> free();
	}
	?>
</body>
</html>