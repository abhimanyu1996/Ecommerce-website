<?php
	session_start();
	include("functions/functions.php");

?>
<html>
	<head>
		<title>My E-Commerce Page</title>
		<link rel="stylesheet" href="styles/style.css" media="all" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1">


	</head>

	<body style="background-image: url('images/bg.jpg');">
		<div class="top_wrapper">		
			<!--header starts here-->
			<div class="header_wrapper" align="center">
				
				<a href="index.php" style="float:left;"> <img id="logo" src="images/logo.png" /> </a>
				
				<div class="headerelements">
					<a href="cart.php">
						<div id="cartbox" style="background-image:url('images/cartimg.png');" >
							<div id="carttext">
								<?php total_items(); ?>
							</div>
						</div>
					</a>
					<div id="signinbox" style="" >
						<div class="dropdown">
							  
					
					<?php if(!isset($_SESSION['customer_email'])){
							
						echo "<button class='dropbtn'>Sign In</button>";
						}
						else{
							echo "<button class='dropbtn'>Hey, <span style=' overflow:hidden;text-overflow: ellipsis; font-size:15px;white-space:nowrap;display:block;'>".$_SESSION['customer_email']."</span></button>";
							
						} 
						
					?>
							  
							  
							  <div class="dropdown-content">
								<a href="customer/my_account.php?my_orders">Your Orders</a>
								<a href="customer/my_account.php">Your Account</a>
								<hr>
								
					<?php if(!isset($_SESSION['customer_email'])){
							
						echo "<p style='font-size:10px; margin-top:5px; color:#666666;'>Not a Member..??</p><a id='regtext' href='customer_register.php'>Register</a><a id='logintext' href='checkout.php'>Login</a>";
						}
						else{
							echo "<a href='logout.php' id='logintext'>Logout</a>";
							
						} 
						
					?>
							  </div>
						</div>
					</div>
				</div>	
				
				<div id="form" align="center">
					<form method="get" action="results.php" enctype="multipart/form-data">
						<input type="text" name="user_query" placeholder="Search a Paintings, Arts..." onfocus="document.getElementsByClassName('main_wrapper')[0].style.opacity = '0.8';" onblur="document.getElementsByClassName('main_wrapper')[0].style.opacity = '1';" />
						<input type="submit" name="search" value="Search" />
					</form>
				</div>
				
				
			</div>
			<!--header ends here-->
			
			<!--naviagtion bar starts here-->
			<div class="menubar">
				<ul id="menu">
					<li><a href="index.php">Home</a></li>
					<li><a href="all_products.php">Artworks</a></li>
					<li><a href="customer/my_account.php">My Account</a></li>
					<li><a href="cart.php">Shopping Cart</a></li>
					<li><a href="contact_us.php">Contact Us</a></li>
				</ul>
			</div>
			<!--navigation bar ends here-->
		</div>
		<!--top ends here-->
				
		
		
		<!--Main content starts here-->
		<div class="main_wrapper">
			
			<!--content wrapper starts here-->
			<div class="content_wrapper">
				<div id="sidebar">
				
					<div id="sidebar_title">Categories</div>
					<ul id="cats">
						<?php getCats(); ?>
					</ul>
					
					<div id="sidebar_title">Brands</div>
					<ul id="cats">
						<?php getBrands();?>
					</ul>
				</div>
			
				<div id="content_area">
				
					<div id="products_box">
					
					<?php
					if(!isset($_SESSION['customer_email'])){
						
						include("customer_login.php");
						
					}
					else{
						
						include("payment.php");
					}
					?>
					</div>
				
				
				</div>
			</div>
			<!--content wrapper ends here-->
			
			<!--footer starts here-->
			<div id="footer" style="clear:both;margin-bottom:10px;">
			
			<h2 style="text-align:center;padding-top:10px;">&copy; Website by Abhimanyu and Brijesh	</h2>
			
			</div>
			<!--footer ends here-->
			
		</div>
		<!--Main content ends here-->
	</body>
</html>