<?php

require "message.php";
	$query = "SELECT local_address, email FROM contact_info";
			
	if($run_query = mysql_query($query))
	{	
		if(mysql_num_rows($run_query) >= 1)
		{
			$address = mysql_result($run_query, 0, 'local_address');
			$email = mysql_result($run_query, 0, 'email');

		}
	}

?>

<!DOCTYPE html>
<html>
  <head>
    <div id="mapcontainer">
	<iframe src="https://mapsengine.google.com/map/embed?mid=zhKClBB6skb4.kxy7xUprr03A" width="500" height="400" marginheight="20px" marginwidth="20px" frameborder="1"></iframe>
    </div>
	<script>
      function initialize() 
	  {
        var map_canvas = document.getElementById('map_canvas');
		
        var map_options = 
		{
          center: new google.maps.LatLng(44.5403, -78.5463),
          zoom: 8,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(canvas, map_options)
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
	
	<style>
		*
		{
			padding: 0;
			margin: 0;
		}
		
		body
		{
			background: url("images/login.jpg");
			display: block;
		}
		
		#mapcontainer
		{
			position: relative;
			float: left;
			padding-bottom: 30%;
			padding-top: 50px;
			padding-right: 10px;
			margin-left: 35px;
			height: 0;
			width: 550px;
			overflow: hidden;
		}
		
		#mapcontainer iframe
		{
			border: 2px solid skyblue;
			box-shadow: 4px 4px 2px #cccccc;
			border-radius: 7px;
		}
		
		#mapcontainer iframe:hover
		{
			box-shadow: 4px 4px 2px #ffffff;
			border: 3px solid skyblue;
		}
		
		#contact_section
		{
			display: block;
			width: 700px;
			float: left;
			margin: 30px 10px 20px 10px;
			font: bold 12px Tahoma;
			color: #cccccc;
			text-shadow: 1px 1px black;
			background: rgba(0,0,51, 0.3);
			border-radius: 7px;
		}
		
		#form
		{
			display: block;
			padding: 10px;
		}
		
		#form li
		{
			list-style: none;
			display: block;
		}
		
		#clear
		{
			display: block;
			clear: both;
			height: 0;
			overflow: hidden;
		}
		
		#address
		{
			display: block;
			margin-top: 10px;
		}
		
		.add_tag
		{
			margin-right: 10px;
			float: left;
		}
		
		.main_add
		{
			float: left;
			margin-left: 30px;
			color: #ffffff;
		}
		
		#mail_address
		{
			display: block;
			margin-top: 10px;
		}
		
		.email_id
		{
			margin-right: 10px;
			float: left;
		}
		
		.mail_id
		{
			float: left;
			margin-left: 52px;
			color: #ffffff;
		}
		
		
		
		.contact
		{
			margin-top: 30px;
			color: #ffffff;
		}
		
		.name
		{
			margin-top: 30px;
			float: left;
		}
		
		#name_field
		{
			margin: 32px 10px 10px 50px;
			float: left;
			height: 20px;
			width: 150px;
			box-shadow: 2px 2px #cccccc;
			border-radius: 5px;
		}
		
		.message
		{
			margin-top: 30px;
			float: left;
		}
		
		#textarea
		{
			margin: 32px 10px 10px 25px;
			float: left;
			height: 100px;
			width: 200px;
			box-shadow: 2px 2px #cccccc;
			border-radius: 5px;
		}
		
		.user_mail
		{
			margin-top: 30px;
			float: left;
		}
		
		#user_email
		{
			margin: 32px 10px 10px 52px;
			float: left;
			height: 20px;
			width: 150px;
			box-shadow: 2px 2px #cccccc;
			border-radius: 5px;
		}
		
		.email
		{
			margin-top: 20px;
		}
		
		#submit
		{
			float: left;
			margin: 10px 10px 10px 159px;
			height: 30px;
			width: 70px;
			font: bold 12px Tahoma;
			color: #ffffff;
			background: rgba(0,0,0,0.5);
			box-shadow: 2px 2px #cccccc;
			border-radius: 5px;
		}
		
		#submit:hover
		{
			background: rgba(0,0,0, 0.6);
			box-shadow: 2px 2px #ffffff;
			color: white;
			text-shadow: 1px 1px #cccccc;
		}
		
		#about_map
		{
			display:block;
			clear: both;
			float: left;
			margin-left: 50px;
			font: bold 12px Tahoma;
			color: #ffffff;
			margin-top: 0px;
		}
		
		#option
		{
			margin: 32px 10px 10px 20px;
			float: left;
			font: bold 14px Tahoma;
		}
		
		#home
		{
			float: left;
			margin: 10px 10px 10px 40px;
			height: 30px;
			width: 70px;
			font: bold 12px Tahoma;
			color: #ffffff;
			background: rgba(0,0,0,0.5);
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
  <div id="all">
	<section id="map_section">
    <div id="map_canvas">
		
	</div>
	</section>
	<section id="contact_section">
		<ul id="form">
			<li id="address">
				<h1 class="add_tag">Address:</h1>
				<h1 class="main_add"><?php echo $address?></h1>
			</li>
			<li id="clear"></li>
			<li id="mail_address">
				<h1 class="email_id">Email:</h1>
				<h1 class="mail_id"><?php echo $email?></h1>
			</li>
			<li id="clear"></li>
			<li>
				<h1 class="contact">Please, feel free to contact us.</h1>
			</li>
			<li id="clear"></li>
			<form action="contactus.php" method="POST">
			<li>
				<h1 class="name">Your Name:</h1>
				<input type="text" name="name" id="name_field">
			</li>
			<li id="clear"></li>
			<li>
				<h1 class="user_mail">Your email:</h1>
				<input type="text" name="user_email" id="user_email">
			</li>
			<li id="clear"></li>
			<li>
				<h1 class="message">Your Message:</h1>
				<textarea name="textarea" id="textarea" maxlength="70"></textarea>
				<?php if($x==true){?>
				<h1 id="option">Please fill in all fields.</h1>
				<?php }?>
				<?php if($y==1){?>
				<h1 id="option">Your message has been sent.</h1>
				<?php }?>
				<?php if($y==2){?>
				<h1 id="option">Your message could not be sent.</h1>
				<?php 
					$y=0;
				}?>
			</li>
			<li id="clear"></li>
			<li>
				<input type="submit" name="submit" id="submit" value="Send">
			</li>
			<li>
				<a href="homepage.php"><input type="button" name="home" id="home" value="Back"></a>
			</li>
			</form>
			<li id="clear"></li>
			<li>
				<h1 class="email">We will be pleased to answer you.</h1>
			</li>
		</ul>
	</section>
	<section id="about_map">
		<h1>Map of our University and office area.</h1>
	</section>
</div>

  </body>
</html>