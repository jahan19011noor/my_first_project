<?php

	session_start();
	$_SESSION['secure'] = rand(1000,9999);
	error_reporting(0);
	header('Content-type: image/jpeg');
	
	$text = $_SESSION['secure'];
	
	$font_size = 30;
	
	$image_width = 125;
	$image_height = 40;
	
	$image = imagecreate($image_width, $image_height);
	imagecolorallocate($image, 255, 255, 255);
	$font_color = imagecolorallocate($image, 0, 0, 0);
	
	for($i=1; $i<30; $i++)
	{
		$x1 = rand(1, 125);
		$y1 = rand(1, 125);
		$x2 = rand(1, 125);
		$y2 = rand(1, 125);
		
		imageline($image, $x1, $y1, $x2, $y2, $font_color);
	}
	
	imagettftext($image, $font_size, 0, 15, 30, $font_color, 'font.ttf', $text);
	imagejpeg($image);

?>