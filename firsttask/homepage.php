<?php
	session_start();
	require 'mysqlconn.php';
	
	function logging()
	{
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
		{
			return true;
		}
		else return false;
	}
	
	function getfield($field)
	{
		$query = "SELECT $field FROM users WHERE id = '".$_SESSION['user_id']."'";
		if($run_query = mysql_query($query))
		{
			if($result = mysql_result($run_query, 0, $field))
			{
				return $result;
			}
		}
	}
?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Home Page: Beauty of Bangladesh</title>

	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="homestyle.css">
	<link rel="stylesheet" href="Slides-SlidesJS-3/examples/playing/css/example.css">
	<link rel="stylesheet" href="Slides-SlidesJS-3/examples/playing/css/css/font-awesome.min.css">
	
	<style>
		body
		{
			text-align: center;
			background: url("images/grey.png") repeat;
		}
	</style>
	

</head>
<body>
	<div id="total">
		<header id="top_banner">
			<h1><img src="images/logo1.png">Welcome to our beautiful country<h1>
		</header> 
		
		<nav id="top">
			<ul id="left_menu">
				<li id="homeimg" class="border"><a href="#"><img src="images/homeicon5.jpg">Home</a></li>
				
				<li class="border"><a href="#">Account</a>
					<div class="two_column_layout">
						<div class="col_2">
							<h2>Register to enjoy all our resources</h2>
						</div>
						
						<div class="clear"></div>
						
						<div class="col_1">
							<p>
							<?php
								if(logging())
								{
							?>
								<div id="no_user">Sign Up</div>
								
							<?php
								}
								else
								{
							?>
								<a href="register.php" class="headerLinks">Sign Up</a>
							<?php
							
								}
							
							?>
							
							<!--<a href="#" class="headerLinks">Sign Up</a>-->
							
							</p>
							<p class="plaintext">Enjoy our resources best of all</p>
						</div>
						
						<div class="col_1">
							<p>
							<!--<a href="logout.php" class="headerLinks">Log out</a>-->
							
							<?php
								if(logging())
								{
							?>
								<a href="logout.php" class="headerLinks">Log out</a>
							<?php
								}
								else
								{
							?>
								<div id="no_user">Log out</div>
							<?php
							
								}
							
							?>
							</p>
							<p class="plaintext">We have enjoyed servicing you</p>
						</div>
				
					</div>
				</li>
				
				<li class="border"><a href="#">Choose Area</a>
					<ul class="dropdown">
						<li><a href="chittagong.php">Chittagong</a></li>
						<li><a href="dhaka.php">Dhaka</a></li>
						<li><a href="rajshahi.php">Rajshahi and Rangpur</a></li>
						<li><a href="barisal.php">Barisal</a></li>
						<li><a href="sylhet.php">Sylhet</a></li>
						<li class="last"><a href="khulna.php">Khulna</a></li>
					</ul>
				</li>
				<?php
					if(logging())
					{
				?>
				<li id="no_border">
				<!--<a href="loginform.php">Sign In</a>-->
				
				
					<div id="hi_user">Hi, <?php echo getfield('first_name')?></div>
				</li>
				<?php
					}
					else
					{
				?>
				<li class="border">
					<a href="loginform.php">Sign In</a>
				<?php
				?>
				</li>
				<?php
					}
				
				?>
				
			</ul>
			
			<form action="search.php" method="POST">
			<ul id="right_menu">
				<li>
					<ul class="searchbutton">
						<li>
							<input type="text" id="search_box" name="search_box" value="">
						</li>
						<li>
							<h1><input type="submit" name="submit" id="submit" value="Search"/></h1>
						</li>
					</ul>
				</li>
			</ul>
			</form>
		</nav>
		
		<nav id="img_nav">
			<div class="container">
				<div id="slides">
				 <img src="images/homepg4.jpg" height="500" width="970">
				  <img src="images/homepg.jpg" height="500" width="970">
				  <img src="images/homepg8.jpg" height="500" width="970">
				  <img src="images/homepg7.jpg" height="500" width="970">
				  <a href="#" class="slidesjs-previous slidesjs-navigation"><i class="icon-chevron-left icon-large"></i></a>
				  <a href="#" class="slidesjs-next slidesjs-navigation"><i class="icon-chevron-right icon-large"></i></a>
				</div>
			  </div>
			  <!-- End SlidesJS Required: Start Slides -->

			  <!-- SlidesJS Required: Link to jQuery -->
			  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
			  <!-- End SlidesJS Required -->

			  <!-- SlidesJS Required: Link to jquery.slides.js -->
			  <script src="Slides-SlidesJS-3/examples/playing/js/jquery.slides.min.js"></script>
			  <!-- End SlidesJS Required -->

			  <!-- SlidesJS Required: Initialize SlidesJS with a jQuery doc ready -->
			  <script>
				$(function() {
				  $('#slides').slidesjs({
					width: 900,
					height: 500,
					play: {
					  active: true,
					  auto: true,
					  interval: 4000,
					  swap: true
					}
				  });
				});
			  </script>
		</nav>
		
		<section id="body">
			<aside id="left_text">
				<article id="static_section">
					<header>
						<p>As you fly over Bangladesh a Mosaic of green farmlands
						and streaks of meandering rivers offer themselves in an
						unforgettable kaleidoscope of colours. A placid Bangladesh
						where shapla(water lily) blooms amoung the ripple on serene
						lakes, rivers and ponds that dot the countryside, is one of
						a many splendoured tale.</p>
						
						<p><img src="images/aside.png"></p>
						<div id="red_text">
							<p><a href="http://www.discoverybd.com/dhaka.htm">DHAKA - The Capital City</a></p>
							<p><a href="http://www.discoverybd.com/chittagong.htm">CHITTAGONG - Gate way to the Bay of Bengal</a></p>
							<p><a href="http://www.discoverybd.com/chittagong.htm">CHITTAGONG HILL TRACTS - The Hills and Tribal Ranqamati Bandarban Khagrachari</a></p>
							<p><a href="http://www.discoverybd.com/coxbazar.htm">COX'S BAZAR - The Beach and OffshoreIslands</a></p>
							<p><a href="http://www.discoverybd.com/sylhet.htm">SYLHET - The tea gardens and Rain Forest</a></p>
							<p><a href="http://www.discoverybd.com/sundarbans.htm">THE SUNDARBANS - The world's largest Mangrove Forest</a></p>
							<p><a href="http://www.discoverybd.com/archaeology.htm">ARCHAELOGICAL SITES</a></p>

					</header>
					
				</article>
			</aside>
			
			<section id="right_text">
				<article>
					<header>
						<p>
							Have you ever visited best Bangladesh tourist attractions ? 
							Bangladesh is enriched with some nice tourist spots. Many 
							tourists visit these attractions every year. I have selected 
							the best Bangladesh tourist attractions. You can visit and enjoy 
							this country with low cost.
						</p>
						
						<p>
							<div id="bold">Sea Beach</div>
							
						</p>
						
						<p>
							Cox’s Bazar Sea Beach, Cox’s Bazar</br>
							Parki Sea Beach, Chittagong</br>
							Patenga Sea Beach, Chittagong</br>
							Kuakata Sea Beach, Patuakhali</br>
							Teknaf Sea Beach, Cox’s Bazar</br>     
							Dublar Char Sea Beach, Khulna</br>
							St. Martin Island Sea Beach, Cox’s Bazar</br>
							Inani Sea Beach, Cox’s Bazar
						</p>
						
						<p>
							Cox's Bazar and St. Martin are among the best Bangladesh tourist attractions.
						</p>
						
						<p>
							<div id="bold">Garden or Park</div>
						</p>
						
						<p>
							The below spots are included in the best Bangladesh
							tourist attractions for natural beauty and history.
						</p>
						
						<p>
							Baldha Garden, Dhaka</br>
							Bhawal National Park, Gazipur</br>
							Banskhali Eco Park, Chittagong</br>
							Bahadur Shah Park, Dhaka</br>
							Dhaka Zoological Garden, Dhaka</br>
							National Botanical Garden, Dhaka</br>
							Suhrawardi Uddyan, Dhaka</br>
							Bangabandhu Safari Park, Dulahajra, Cox’s Bazar</br>
							Butterfly Park, Patenga, Chittagong</br>
							Chunati Wildlife sanctuary, Chittagong</br>
							Ramsagar National Park, Dinajpur</br>
							Fantasy Kingdom, Ashulia, Dhaka</br>
							Satchari National Park, Hobiganj</br>
							Teknaf Game Reserve, Cox’s Bazar</br>
							Bangabandhu Sheikh Mujib Safari Park, Gazipur
						</p>
						
						<p>
							<div id="bold">Memorial</div>
						</p>
						
						<p>
							To be enriched with history and knowledge, the travelers must visit the below best Bangladesh tourst attractions.
						</p>
						
						<p>
							National Memorial, Savar, Dhaka</br>
							Central Shahid Minar (Central Martyred Memorial), Dhaka University, Dhaka</br>
							Mausoleum of the Father of the Nation, Tungipara, Gopalganj</br>
							Martyred Intellectual Memorial, Mirpur, Dhaka</br>
							Martyred Intellectual Memorial, Rayerbazar, Dhaka</br>
							Mujibnagar Memorial, Mujibnagar, Meherpur</br>
							2nd World War Cemetery, Comilla</br>
							National Poet’s Grave, Dhaka University Dhaka</br>
						</p>
						
						<p>
							<div id="bold">Mosques</div>
						</p>
						
						<p>
							There are some Muslim spots which are included in the best Bangladesh tourist attractions. Have a look:
						</p>
						
						<p>
							Shait Gombuj Mosque, </br>
							Baitul Mukarram National Mosque, Dhaka</br>
							Binat Bibi Mosque, Dhaka</br>
							Seven Dome Mosque, Mohammadpur, Dhaka</br>
							Star Mosque, Armanitola, Dhaka</br>
							Aurangzeb’s Mosque, Kishorganj</br>
							Kushumba Mosque, Naogaon</br>
							Choto Sona Mosque, Chapainababganj</br>
							Bagha Mosque, Rajshahi</br>
							Atiya Mosque, Tangail</br>
							The Shrine of Hazrat Shah Jalal, Sylhet</br>
							The Shrine of Hazrat Shah Poran, Sylhet</br>
							The Shrine of Khan Jahan Ali, Bagerhat</br>
							The Shrine of Shah Makhdum, Rajshahi</br>
							The Shrine of Shah Amanot, Chittagong</br>
							The Shrine of Baizid Bostami, Chittagong
						</p>
						
						<p>
							<div id="bold">Temples</div>
						</p>
						
						<p>
							Some Hindu temples are also important part of the best Bangladesh tourist attractions.</br>
							These are:
						</p>
						
						<p>
							Dhakeshwari National Temple, Dhaka</br>
							Ramna Kali Mandir, Dhaka</br>
							Chandranath Hindu Temple, Sitakunda, Chittagong</br>
							Kantaji Temple, Dinajpur</br>
							Sri Chaitanya Temple</br>
							Adinath Temple, Maheshkhali, Cox’s Bazar</br>
							Puthia Temple Town, Rajshahi</br>
							Jagannath Temple, Comilla</br>
							Ram Krishna Mission Temple, Dhaka
						</p>
						
						<p>
							<div id="bold">Buddhist Temple</div>
						</p>
						
						<p>
							The travelers also make tour to Buddhist temples 
							which are included into the best Bangladesh tourist 
							attractions. These are:
						
						</p>
						
						<p>
							Dharmarajika Buddha Bihara, Dhaka</br>
							The Golden Temple, bandarban</br>
							Rankut banasram Buddha Bihar, Ramu, Cox’s Bazar</br>
							Rajban Bihar Pagoda, Rangamati
						</p>
						
						<p>
							<div id="bold">Christian Church</div>
						</p>
						
						<p>
							Three Christian churches have been added to the best Bangladesh tourist attractions.</br>
							Have a look:</br>
						</p>
						
						<p>
							Armenian Church, Dhaka
							Holy Rosary Church, Tejgaon, Dhaka
							St. Mary’s Cathedral, Ramna, Dhaka
						</p>
						
						<p>
							<div id="bold">Museums</div>
						</p>
						
						<p>
							To know a country closely, museums play vital role.
							Here are some museums as the best Bangladesh tourist attractions:
						</p>
						
						<p>
							National Museum, Dhaka</br>
							Postal Museum, Dhaka</br>
							Tea Museum, Srimongal, Moulvibazar</br>
							Rocks Museum, Panchagarh</br>
							Currency Museum, Bangladesh Bank, Dhaka</br>
							Liberation War Museum, Dhaka</br>
							Barendra Museum, Rajshahi</br>
							Tribal Museum, Rangamati</br>
							Folk and Art Museum, Sonargaon, Narayanganj</br>
							Ethnological Museum, Agrabad, Chittagong
						</p>
						
						<p>
							<div id="bold">Forest and Jungle</div>
						</p>
						
						<p>
							I have enlisted some natural forests and jungles into best Bangladesh tourist attractions. These are:

							Sundarbans</br>
							Ratargul Swamp Forest</br>
							Modhupur Forest</br>
							Chittagong Hill Trackt Forest</br>
							Lawachara Forest, Moulvibazar
						</p>
						
						<p>
							<div id="bold">Building and Architecture</div>
						</p>
						
						<p>
							When you are making trip to Bangladesh, then you should not miss a few architectural spots. These are also included in the best Bangladesh tourist attractions: 
						</p>
						
						<p>
							Jatiya Sangsad Vobon (National Parliament)</br>
							Bangabhaban (President’s House)</br>
							Ahsan Manzil (Pink Palace), Dhaka</br>
							Old High Court Building, Dhaka</br>
							Curzon Hall, Dhaka University</br>
							Dighapatia Rajbari, Natore</br>
							Rabindra Kuthibari, Shilaidaha, Kushtia</br>
							Lalbagh Fort, Dhaka
						</p>
						
						<p>
							<div id="bold">Islands</div>
						</p>
						
						<p>
							Little Bangladesh has some beautiful islands. The tour specilists pay attention to these beutiful islands as best Bangladesh tourist attractions. Have a look: 
						</p>
						
						<p>
							St. Martin Island, Cox’s Bazar</br>
							Maheshkhali Island, Cox’s Bazar</br>
							Nijhum Island, Noakhali</br>
							Dublar Char Island, Khulna</br>
							Sonadia Island, Cox’s Bazar</br>
							Monpura Island, Bhola</br>
							Kutubdia Island, Cox’s Bazar</br>
							Tinkona Island, khulna</br>
							Pokkhir Chor Island, Khulna</br>
							Shonakata Island, Barguna</br>
							Chor Kukri Mukri Island, Bhola</br>
							Crab Island (Lal Kakrar Dwip), Patuakhali</br>
							Fatrar Chor Island, Patuakhali
						</p>
						
						<p>
							<div id="bold">Hills</div>
						</p>
						
						<p>
							The travelers have the chance of visiting some hills recognized as tourist spots located mainly in the eastern region of Bangladesh. Here are the hills which are in the list of best Bangladesh tourist attractions:
						</p>
						
						<p>
							DC Hill, Chittagong</br>
							Batali Hill, Chittagong</br>
							Nilgiri Hill, Bandarban</br>
							Furamon Hill, Rangamati</br>
							Chimbuk Hill, Bandarban</br>
							Tiger Hill (Nilachal), Bandarban</br>
							Alutila Hill, Khagrachari</br>
							Garo hill, Mymensingh
						</p>
						
						<p>
							<div id="bold">Archaeological sites</div>
						</p>
						
						<p>
							When we think about Bangladesh tourism, then the archaeological sites come forward automatically as the best Bangladesh tourist attractions. Have a look at some sites: 
						</p>
						
						<p>
							Mahasthangarh, Bogra</br>
							Paharpur, Naogaon</br>
							Mainamoti, Comilla</br>
							Wari Bateshwar, Narsingdi</br>
							Sonargaon, Narayanganj</br>
							Idrakpur Fort, Munshiganj</br>
							Mir Kadim Bridge, Munshiganj</br>
							Baliati Palace, Manikganj
						</p>
						<p>
							If anybody wants to discover Bangladesh, then he should visit the best Bangladesh tourist attractions. The tourists can have guided tours here. You can make fantastic holidays in Bangladesh.
						</p>
					</header>
					
				</article>
			</section>
		</section>
		
		<footer id="footer">
			<ul id="footer_menu">
				<!--Account-->
				
				<li>
					<a href="gallery.php">Gallery</a>
					<div class="one_column_layout" id="gallery">
						<div class="col_1">
							<h2>View our photo album</h2>
						</div>
					</div>
				</li>
				
				<!--profile-->
				<li><a href="aboutus.php">About Us</a>
					<div class="one_column_layout" id="about_us">
						<div class="col_1">
							<h2>Know about our program and destination</h2>
						</div>
					</div>
				</li>
				
				<!--programs-->
				<li><a href="contactus.php">Contact Us</a>
					<div class="one_column_layout" id="contact_us">
						<div class="col_1">
							<h2>Please let us know your demands and problems</h2>
						</div>
					</div>
				</li>
				
				<!--Logout -->
				<li><a href="adminvalidation.php">Admin Panel</a>
					<div class="one_column_layout" id="admin_panel">
						<div class="col_1">
							<h2>Access only if you are the admin of the website</h2>
						</div>
					</div>
				</li>
			</ul>
			
			<ul id="notification">
				<li>
					<a href="#" class="notificationIcons"><img src="images/note1.png"></a>
				</li>
				<li>
					<a href="#" class="notificationIcons"><img src="images/note2.png"></a>
				</li>
				<li>
					<a href="#" class="notificationIcons"><img src="images/note3.png"></a>
				</li>
			</ul>
		</footer>
	</div>
</body>
</html>