<!DOCTYPE>
<?php
	session_start();
	include("../functions/functions.php");
	
	if(!isset($_SESSION['customer_email'])){
							
							echo "<script>window.open('../checkout.php','_self');</script>";
						}
						
?>

<html>
	<head>
		<title>My E-Commerce Page</title>
		<link rel="stylesheet" href="styles/stylel.css" media="all" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>

	<body style="background-image: url('../images/bg.jpg');">
		<div class="top_wrapper">		
			<!--header starts here-->
			<div class="header_wrapper" align="center">
				
				<a href="../index.php" style="float:left;"> <img id="logo" src="../images/logo.png" /> </a>
				
				<div class="headerelements">
					<a href="../cart.php">
						<div id="cartbox" style="background-image:url('../images/cartimg.png');" >
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
								<a href="my_account.php?my_orders">Your Orders</a>
								<a href="my_account.php">Your Account</a>
								<hr>
								
					<?php 
							echo "<a href='../logout.php' id='logintext'>Logout</a>";
						
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
					<li><a href="../index.php">Home</a></li>
					<li><a href="../all_products.php">Artworks</a></li>
					<li><a href="my_account.php">My Account</a></li>
					<li><a href="../cart.php">Shopping Cart</a></li>
					<li><a href="../contact_us.php">Contact Us</a></li>
				</ul>
			</div>
			<!--navigation bar ends here-->
		</div>
		<!--top ends here-->
		
		<!--Main content starts here-->
		<div class="main_wrapper">
			
			<!--content wrapper starts here-->
			<div class="content_wrapper">
			
				<div id="content_area" >
				
				<?php
				
				$user = $_SESSION['customer_email'];
					
					$get_img = "select * from customers where customer_email='$user'";
					
					$run_img=mysqli_query($con,$get_img);
					
					$row_img = mysqli_fetch_array($run_img);
					
					$c_image = $row_img['customer_image'];
					$c_name = $row_img['customer_name'];
					
				
				?>
				
					<div id="products_box">
					
					
					<?php
					
					if(!isset($_GET['my_orders'])){
						if(!isset($_GET['edit_account'])){
							if(!isset($_GET['change_pass'])){
								if(!isset($_GET['delete_account'])){
									echo "<h2 style='padding:20px;'>Welcome: <?php echo $c_name; ?></h2><br><b>You can see you order by clicking this <a href='my_account.php?my_orders'>link</a></b>";
								}
							}
						}
					}
					
					
					?>
					
					<?php
					
					 if(isset($_GET['edit_account'])){
						include("edit_acc.php");
						 
					 }
					
					if(isset($_GET['change_pass'])){
						include("change_pass.php");
						 
					 }
					
					if(isset($_GET['delete_account'])){
						include("delete_account.php");
						 
					 }
					 
					?>
					
					</div>
				
				
				</div>
				
				<div id="sidebar">
				
					<div id="sidebar_title">My Account</div>
					<ul id="cats">
					
					<?php
					
					
					echo "<p style='text-align:center;'><img src='customer_images/$c_image' style='border:2px solid white;margin:10px auto;border-radius:75px;' width='150' height='150'></p>
					<h2 style='text-align:center;'>$c_name</h2>";
					?>
					
					
					<li><a href="my_account.php?my_orders">My Orders</a></li>
					<li><a href="my_account.php?edit_account">Edit Account</a></li>
					<li><a href="my_account.php?change_pass">Change Password</a></li>
					<li><a href="my_account.php?delete_account">Delete Account</a></li>
					<li><a href="../logout.php">Logout</a></li>
					
					</ul>
					
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