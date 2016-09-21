<?php
	
	ob_start();
	session_start();
	require 'mysqlconn.php';
	
	$x = false;
	$y = false;

	if(isset($_POST['user_name']) && isset($_POST['password']))
	{
		$name = $_POST['user_name'];
		$password = $_POST['password'];
		if(!empty($name) && !empty($password))
		{
			$pass = md5($password);
			
			$query = "SELECT id FROM users WHERE username = '".mysql_real_escape_string($name)."' AND password = '".mysql_real_escape_string($pass)."'";
			
			if($run_query = mysql_query($query))
			{	
				if(mysql_num_rows($run_query) == 1)
				{
					$user_id = mysql_result($run_query, 0, 'id');
					$_SESSION['user_id'] = $user_id;
					header('Location: homepage.php');
				}
				else $y = true;
			}
		}
		else $x = true;
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
			background: url(images/login.jpg);
		}
		
		#myform
		{
			background: rgba(0,0,0, 0.5);
			display: block;
			position: absolute;
			font: bold 14px Tahoma;
			border: 2px solid #ffffff;
			width: 400px;
			padding: 20px;
			margin: 20px;
			height: 200px;
			top: 28%;
			left: 33%;
			box-shadow: inset 0 40px 10px rgba(255,255,255, 0.1),
			inset 0 -40px 10px rgba(255,255,255, 0.1),
			inset 40px 0 10px rgba(255,255,255, 0.1),
			inset -40px 0 10px rgba(255,255,255, 0.1);
			border-radius: 10px;
		}
		
		#myform li
		{
			list-style: none;
		}
		
		#name, #pass, #submit, h1
		{
			display: block;
		}
		
		h1
		{
			font: bold 14px Tahoma;
			color: #ffffff;
		}
		
		.name h1
		{
			float: left;
			margin: 10px 20px 10px 30px;
		}
		
		.name #name
		{
			float: left;
			width: 150px;
			margin: 5px 20px 10px 23px;
			padding: 5px;
			border-radius: 5px;
			box-shadow: 1px 1px #ffffff;
		}
		
		.name #name:hover
		{
			border: 1px solid #ffffff;
			box-shadow: 1px 1px #cccccc;
		}
		
		.clear
		{
			display: block;
			clear: both;
			overflow: none;
			width: 0;
			height: 0;
		}
		
		.pass
		{
			margin-top: 10px;
		}
		.pass h1
		{
			float: left;
			margin: 20px 0px 10px 30px;
		}
		
		.pass #pass
		{
			float: left;
			width: 150px;
			margin: 15px 20px 10px 20px;
			padding: 6px;
			border-radius: 5px;
			box-shadow: 1px 1px #ffffff;
		}
		
		.pass #pass:hover
		{
			border: 1px solid #ffffff;
			box-shadow: 1px 1px #cccccc;
		}
		
		.submit
		{
			margin: 20px 20px 10px 100px; 
		}
		
		.submit #submit
		{
			float: left;
			padding: 5px 10px 5px 10px;
			font: bold 12px Tahoma;
			border-radius: 10px
		}
		
		.submit #submit:hover
		{
			padding: 6px 11px 6px 10px;
			box-shadow: 1px 1px #ffffff;
		}
		
		.submit #home
		{
			float: left;
			padding: 5px 10px 5px 10px;
			margin-left: 30px;
			font: bold 12px Tahoma;
			border-radius: 10px
		}
		
		.submit #home:hover
		{
			padding: 6px 11px 6px 10px;
			box-shadow: 1px 1px #ffffff;
		}
		
		.empty, .notvalid
		{
			margin-left: 30px;
		}
		
	</style>
</head>
<body>

	<form action="loginform.php" method="POST">
		<div id="myform">
			<ul class="name">
				<li><h1>User Name:</h1></li>
				<li><input type="text" name="user_name" id="name"/></li>
			</ul>
			<ul class="clear"></ul>
			<ul class="pass">
				<li><h1>Password:<h1/></li>
				<li><input type="password" name="password" id="pass"/></li>
			</ul>
			<ul class="clear"></ul>
			<ul class="submit">
				<li><input type="submit" name="submit" value="Log In" id="submit"></li>
				<li><a href="homepage.php"><input type="button" id="home" value="Back"></a></li>
			</ul>
			<ul class="clear"></ul>
			<?php if($x==true){?>
			<ul class="empty">
				<li><h1>Please fill in all fields.</h1></li>
			</ul>
			<?php }?>
			<ul class="clear"></ul>
			<?php if($y==true){?>
			<ul class="notvalid">
				<li><h1>Sorry, your password or username is invalid.</h1></li>
			</ul>
			<?php }?>
		</div>
	</form>
	</div>
</body>
<html>