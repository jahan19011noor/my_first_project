<?php

	session_start();
	require 'mysqlconn.php';
	$x = false;
	$y = false;
	$z = false;
	$c = false;
	
	if(
		isset($_POST['username']) && 
		isset($_POST['pass']) &&
		isset($_POST['pass_again']) &&
		isset($_POST['first']) &&
		isset($_POST['last'])&&
		isset($_POST['captcha'])
		)
	{
		$username = $_POST['username'];
		$password = $_POST['pass'];
		$confirm_password = $_POST['pass_again'];
		
		$encrypt_pass = md5($password);
		
		$first_name = $_POST['first'];
		$last_name = $_POST['last'];
		$captcha = $_POST['captcha'];
		
		if(
			!empty($username) &&
			!empty($password) &&
			!empty($confirm_password) &&
			!empty($first_name) &&
			!empty($last_name)&&
			!empty($captcha)
		)
		{
			if($captcha == $_SESSION['secure'])
			{
				if(strlen($username)<=30 || strlen($first_name)<=40 || strlen($last_name)<=40)
				{	
					if($password != $confirm_password)
					{
						$y = true;
					}
					else
					{
						$query = "SELECT username FROM users WHERE username = '$username'";
						
						if($run_query = mysql_query($query))
						{
							if(mysql_num_rows($run_query) == 1)
							{
								$z = true;
							}
							else
							{
								$query = "INSERT INTO users VALUES 
								('','".mysql_real_escape_string($username)."','"
								.mysql_real_escape_string($encrypt_pass)."','"
								.mysql_real_escape_string($first_name)."','"
								.mysql_real_escape_string($last_name)."')";
								
								if($run_query = mysql_query($query))
								{
									header('Location: homepage.php');
								}
							}
						}
					}
				}
			}
			else
			{
				$c = true;
				$_SESSION['secure'] = rand(1000,9999);
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
			background: rgba(0,0,0, 0.3);
			display: block;
			position: absolute;
			font: bold 14px Tahoma;
			border: 5px solid rgba(255, 255, 255, 0.5);
			width: 580px;
			padding-left: 160px;
			padding-top: 20px;
			margin: 20px;
			height: 560px;
			top: -14px;
			left: 21%;
			box-shadow: inset 0 40px 10px rgba(255,255,255, 0.1),
			inset 0 -40px 10px rgba(255,255,255, 0.1),
			inset 40px 0 10px rgba(255,255,255, 0.1),
			inset -40px 0 10px rgba(255,255,255, 0.1);
			border-radius: 10px;
		}
		
		#myform:hover
		{
			border: 5px solid rgba(255, 255, 255, 0.75)
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
		
		.name1 h1
		{
			float: left;
			margin: 0px 20px 20px 30px;
		}
		
		.name #name
		{
			float: left;
			width: 150px;
			margin: 5px 20px 10px 82px;
			padding: 5px;
			border-radius: 5px;
			box-shadow: 1px 1px #ffffff;
		}
		
		.name #name1
		{
			float: left;
			width: 150px;
			margin: 5px 20px 10px 84px;
			padding: 5px;
			border-radius: 5px;
			box-shadow: 1px 1px #ffffff;
		}
		
		.name #name:hover
		{
			border: 1px solid #ffffff;
			box-shadow: 1px 1px #cccccc;
		}
		
		.name #name1:hover
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
		
		#clear
		{
			margin-top: 65px;
			width: 1px;
			height: 1px;
		}
		
		.pass h1
		{
			float: left;
			margin: 10px 0px 10px 30px;
		}
		
		
		
		.pass #pass1
		{
			float: left;
			width: 150px;
			margin: 5px 20px 10px 79px;
			padding: 6px;
			border-radius: 5px;
			box-shadow: 1px 1px #ffffff;
		}
		
		.pass #pass2
		{
			float: left;
			width: 150px;
			margin: 5px 20px 10px 20px;
			padding: 6px;
			border-radius: 5px;
			box-shadow: 1px 1px #ffffff;
		}
		
		.pass #pass1:hover
		{
			border: 1px solid #ffffff;
			box-shadow: 1px 1px #cccccc;
		}
		
		.pass #pass2:hover
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
			margin-left: 70px;
			font: bold 12px Tahoma;
			border-radius: 10px
		}
		
		.submit #home:hover
		{
			padding: 6px 11px 6px 10px;
			box-shadow: 1px 1px #ffffff;
		}
		
		.submit a
		{
			text-decoration: none;
		}
		
		.empty
		{
			margin-left: 30px;
		}
		
		.empty h1
		{
			font: normal 14px Tahoma;
		}
		
		.img_cap li
		{
			margin-left: 223px;
			border: 3px solid black;
			width: 125px;
			height: 40px;
			border: 10px solid rgba(255, 255, 255, 0.5);
			border-radius: 5px;
			margin-top: 30px;
		}
		
		.pass #pass3
		{
			float: left;
			width: 62px;
			margin: 15px 20px 10px -10px;
			padding: 6px;
			border-radius: 5px;
			box-shadow: 1px 1px #ffffff;
		}
		
		.pass #pass3:hover
		{
			border: 1px solid #ffffff;
			box-shadow: 1px 1px #cccccc;
		}
		
		#move
		{
			margin-top: 20px;
		}
	</style>
</head>
<body>

	<form action="register.php" method="POST">
		<div id="myform">
			<ul class="name1">
				<li><h1>Please, fill up the registration form:</h1></li>
			</ul>
			<ul class="clear"></ul>
			<ul class="name">
				<li><h1>First Name:</h1></li>
				<li><input type="text" name="first" id="name" maxlength="40" value="<?php if(isset($first_name)){echo $first_name;}?>"/></li>
			</ul>
			<ul class="clear"></ul>
			<ul class="name">
				<li><h1>Last Name:</h1></li>
				<li><input type="text" class="move" name="last" id="name1" maxlength="40" value="<?php if(isset($last_name)){echo $last_name;}?>"/></li>
			</ul>
			<ul class="clear"></ul>
			<ul class="name">
				<li><h1>User Name:</h1></li>
				<li><input type="text" name="username" id="name" maxlength="30" value="<?php if(isset($username)){echo $username;}?>"/></li>
			</ul>
			<ul class="clear" id="clear"></ul>
			<ul class="pass">
				<li><h1>Password:<h1/></li>
				<li><input type="password" name="pass" id="pass1"/></li>
			</ul>
			<ul class="clear"></ul>
			<ul class="pass" id="higher">
				<li><h1>Confirm Password:<h1/></li>
				<li><input type="password" name="pass_again" id="pass2"/></li>
			</ul>
			<ul class="clear"></ul>
			
			<ul class="img_cap">
				<li><img src="imgcap.php"/></li>
			</ul>
			<ul class="clear"></ul>
			
			<ul class="pass">
				<li><h1 id="move">Please, type the value you see<h1/></li>
				<li><input type="text" name="captcha" id="pass3"/></li>
			</ul>
			<ul class="clear"></ul>
			
			<?php if($c==true){?>
			<ul class="empty">
				<li><h1>Wrong input, please try again<h1/></li>
			</ul>
			<?php }?>
			<ul class="clear"></ul>
			
			<ul class="submit">
				<li><input type="submit" name="submit" value="Sign Up" id="submit"></li>
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
			<ul class="empty">
				<li><h1>Passwords do not match.</h1></li>
			</ul>
			<?php }?>
			<ul class="clear"></ul>
			<?php if($z==true){?>
			<ul class="empty">
				<li><h1>The user name '<?php echo $username?>' already exists in the database</br>Please choose another user name</h1></li>
			</ul>
			<?php }?>
		</div>
	</form>
</body>
<html>