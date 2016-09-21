<?php

require 'mysqlconn.php';

	$query = "SELECT image, text FROM about_us";
			
	if($run_query = mysql_query($query))
	{	
		if(mysql_num_rows($run_query) == 1)
		{
			$image = mysql_result($run_query, 0, 'image');
			$text = mysql_result($run_query, 0, 'text');

		}
	}

?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<style>
		*
		{
			padding: 0;
			margin: 0;
		}
		
		body
		{
			background: url(images/login2.jpg);
		}
		
		#both
		{
			background: rgba(0,0,0, 0.7);
			display: block;
			position: absolute;
			font: bold 14px Tahoma;
			border: 2px solid #ffffff;
			width: 1000px;
			padding: 20px;
			margin: 20px;
			height: 350px;
			top: 15%;
			left: 10%;
			box-shadow: inset 0 40px 10px rgba(255,255,255, 0.1),
			inset 0 -40px 10px rgba(255,255,255, 0.1),
			inset 40px 0 10px rgba(255,255,255, 0.1),
			inset -40px 0 10px rgba(255,255,255, 0.1);
			border-radius: 10px;
		}
		
		
		h1
		{
			font: bold 20px Tahoma;
			color: #ffffff;
		}
		
		h1:first-letter
		{
			font: bold 50px Tahoma;
		}
		
		#image
		{
			display: block;
			float: left;
			padding: 0px;
			margin: 20px 10px 30px 30px;
			border: 4px solid skyblue;
		}
		
		#image:hover
		{
			box-shadow: 2px 2px #cccccc;
			padding-left: 1px;
			padding-bottom: 1px;
		}
		
		#text
		{
			display: block;
			position: relative;
			float: left;
			width: 600px;
			height: 200px;
			padding: 10px 10px 10px 10px;
			margin: 20px 5px 20px 20px;
		}
		
		#home
		{
			float: left;
			margin: 40px 10px 10px 40px;
			height: 30px;
			width: 80px;
			font: bold 14px Tahoma;
			color: #ffffff;
			background: rgba(255,255,255,0.5);
			box-shadow: 2px 2px #cccccc;
			border-radius: 5px;
		}
		
		#home:hover
		{
			background: rgba(0,0,0, 0.6);
			box-shadow: 2px 2px #ffffff;
			color: white;
			text-shadow: 1px 1px #cccccc;
		}
	</style>
</head>
<body>
	<div id="both">
		<section id="image">
			<img src="<?php echo $image?>">
		</section>
		<section id="text">
			<h1><?php echo $text?></h1>
			<a href="homepage.php"><input type="button" name="home" id="home" value="Back"></a>
		</section>
	</div>
</body>
</html>