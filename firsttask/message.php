<?php

	require 'mysqlconn.php';
	include 'security.php';
	$x = false;
	$y = 0;
	
	if(isset($_POST['name']) && isset($_POST['textarea']) && isset($_POST['user_email']))
	{
		$name1 = $_POST['name'];
		$email1 = $_POST['user_email'];
		$message1 = $_POST['textarea'];
		
		if(!empty($name1) && !empty($message1) && !empty($email1))
		{
			
			$name = escape($name1);
			$email = escape($email1);
			$message = escape($message1);
			
			$query = "INSERT INTO user_message (id, name, email, message) VALUES 
			(NULL, '".mysql_real_escape_string($name)."',
			'".mysql_real_escape_string($email)."', 
			'".mysql_real_escape_string($message)."')";
			
			$to = "beautifulbangladesh19011@yahoo.com";
			$subject = "user message";
			$from = "From: ";
			$mail = $from.$email;
			
			$retval = mail($to,$subject,$message,$mail);
			if( $retval == true )  
			{
				$y = 1;
				if($run_query = mysql_query($query))
				{
					$y=0;
				}
			}
			else
			{
				$y = 2;
			}
		}
		else $x = true;
	}

?>