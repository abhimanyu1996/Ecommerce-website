<?php
	session_start();
	include("functions/functions.php");
	include("includes/db.php");
	
	if(isset($_SESSION['customer_email'])){
							
							echo "<script>alert('Already Logged In..?!!');
							window.open('index.php','_self');</script>";
	}
?>
<html>
	<head>
		<title>My E-Commerce Page</title>
		<link rel="stylesheet" href="styles/style.css" media="all" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		
		<style>
		#outerbox{
			width:500px;margin:auto;box-shadow:0 0 7px 2px #666666; border-radius:10px;
			background:rgba(255,255,255,0.3);
		}
		
		#tabletop{
				border-radius:10px 10px 0 0; font-weight:bolder; background-color:#1ab2ff; box-shadow:0 0 4px 1px #666666;color:white;padding:10px;text-align:center;
			
		}
		
		#outerbox tr{
			text-align:left;color:white;
		}
		
		#outerbox tr td{
		padding-left:30px;padding-top:10px;
		}
		
		#outerbox input[type=text],#outerbox input[type=password], #outerbox select,#outerbox input[type=file],#outerbox input[type=email]{
			width:80%;
				 border: 1px solid rgba(255,255,255,0.3); 
				-webkit-box-shadow: 
				  inset 0 0 8px  rgba(0,0,0,0.1),
						0 0 16px rgba(0,0,0,0.1); 
				-moz-box-shadow: 
				  inset 0 0 8px  rgba(0,0,0,0.1),
						0 0 16px rgba(0,0,0,0.1); 
				box-shadow: 
				  inset 0 0 8px  rgba(0,0,0,0.1),
						0 0 16px rgba(0,0,0,0.1); 
				padding: 5px;
				background: rgba(255,255,255,0.5);
				margin: 0 0 10px 0;
				border-radius:10px;
		}
		
		input[name=register] {
				border-radius:25px;
                position:relative;
                padding:6px 15px;
                border:2px solid #1ab2ff;
                background-color:#1ab2ff;
                color:#fafafa;
			}
			input[name=register]:hover  {
							background-color:#fafafa;
							color:#207cca;
			}
		</style>

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
					
					<div id="sidebar_title">Artists</div>
					<ul id="cats">
						<?php getBrands();?>
					</ul>
				</div>
			
				<div id="content_area">
									
					<form action="" method="post" enctype="multipart/form-data" style="margin:15px;">
						
						<table align="center" width="750" id="outerbox">
							
							<tr align="center" >
								<td colspan="2" id="tabletop"><h2>Create an Account</h2></td>
							
							</tr>
						
							<tr>
								<td align="right">Customer Name: </td>
								<td><input type="text" name="c_name" required /></td>
							</tr>
							
							<tr>
								<td align="right">Customer Email:</td>
								<td><input type="email" name="c_email"required ></td>
							</tr>

							<tr>
								<td align="right">Customer Password:</td>
								<td><input type="password" name="c_pass"required ></td>
							</tr>

							<tr>
								<td align="right">Customer Image:</td>
								<td><input type="file" name="c_image"required ></td>
							</tr>		

							<tr>
								<td align="right">Customer Country:</td>
								<td>
								<select name="c_country">
									<option>India</option>
									<option>Afganistan</option>
									<option>Nepal</option>
									<option>Bhutan</option>
									<option>USA</option>
									<option>UK</option>
									<option>United Arab Emirates</option>
								</select>
								
								</td>
							</tr>	

							<tr>
								<td align="right">Customer City:</td>
								<td><input type="text" name="c_city" required></td>
							</tr>	

							<tr>
								<td align="right">Customer Contact: </td>
								<td><input type="text" name="c_contact" pattern="[0-9]{10}" required></td>
							</tr>	

							<tr>
								<td align="right">Customer Address:</td>
								<td><input type="text" name="c_address"required></textarea></td>
							</tr>					
							
							<tr >
								<td colspan="2" style="text-align:center;margin:10px;padding:10px;color:red;" id="reg_error"></td>
							</tr>
							
							<tr >
								<td colspan="2" style="text-align:center;margin:10px;padding:10px;"><input type="submit" name="register" value="Create Account" /></td>
							</tr>
						</table>
					
					</form>
				
				
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


<?php
	if(isset($_POST['register'])){
		
		$ip = getIp();
		
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = md5($_POST['c_pass']);
		$c_image = $_FILES['c_image']['name'];
		$c_image_tmp = $_FILES['c_image']['tmp_name'];
		$c_country = $_POST['c_country'];
		$c_city = $_POST['c_city'];
		$c_contact = $_POST['c_contact'];
		$c_address = $_POST['c_address'];
		
		$check_email = "select * from customers where customer_email='$c_email'";
		$run_check_email = mysqli_query($con,$check_email);
		
		if(mysqli_num_rows($run_check_email)>0){
			echo "<script>document.getElementById('reg_error').innerHTML = 'Email Already Exists'; </script>";
			exit();
		}
		
		move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
		
		$insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";
		
		$run_c = mysqli_query($con, $insert_c);
		
		$sel_cart = "select * from cart where ip_add='$ip'";
		
		$run_cart = mysqli_query($con,$sel_cart);
		
		$check_cart = mysqli_num_rows($run_cart);
		
		
		if($check_cart==0){
			
			$_SESSION['customer_email']=$c_email;
			echo "<script>alert('Account has been created sucessfully')</script>";
			echo "<script>window.open('customer/my_account.php','_self')</script>";
		}
		else{
			$_SESSION['customer_email']=$c_email;
			echo "<script>alert('Account has been created sucessfully, Thanks..!!')</script>";
			echo "<script>window.open('checkout.php','_self')</script>";
			
			
		}
	}


?>