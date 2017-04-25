<?php
	session_start();
	include("functions/functions.php");

?>
<html>
	<head>
		<title>My E-Commerce Page</title>
		<link rel="stylesheet" href="styles/style.css" media="all" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<style>
		#outerbox{
			width:500px;margin:auto;box-shadow:0 0 7px 2px #666666; border-radius:10px;
			background:rgba(255,255,255,0.3);text-align:center;
		}
		
		#tabletop{
				border-radius:10px 10px 0 0; font-weight:bolder; background-color:#1ab2ff; box-shadow:0 0 4px 1px #666666;color:white;padding:10px;text-align:center;
			
		}
		
		#outerbox tr{
			text-align:center;color:white;
		}
		
		#outerbox tr td{
		padding:10px;
		}
		
		#outerbox select{
			width:50px;
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
		
		input[name=update_cart],input[name=continue],input[name=checkout] {
				border-radius:25px;
                position:relative;
                padding:6px 15px;
                border:2px solid #1ab2ff;
                background-color:#1ab2ff;
                color:#fafafa;
			}
			input[name=update_cart]:hover, input[name=continue]:hover, input[name=checkout]:hover  {
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
					 
					<div id="products_box">
					<br>
						<form action="" method="post" enctype="multipart/form-data">
							
							<table align="center" width="800" style="margin:auto;" id="outerbox">
								<tr align="center">
									<td colspan="5" id="tabletop"><h2>Update Cart</h2></td>
								</tr>
								
								<tr >
									<th>Products</th>
									<th>Quantity</th>
									<th>Price</th>
									<th>Remove</th>
								</tr>
								
								<?php 
								$total = 0;
								global $con;
								
								$ip = getIp();
								
								$sel_price = "select * from cart where ip_add='$ip'";
					
								$run_price = mysqli_query($con, $sel_price);
								
								while($p_price=mysqli_fetch_array($run_price)){
									
									$pro_id = $p_price['p_id'];
									
									$pro_price = "select * from products where product_id='$pro_id'";
									
									$run_pro_price = mysqli_query($con,$pro_price);
									
									$_SESSION['qty'] = $p_price['qty'];
									
									
									while($pp_price = mysqli_fetch_array($run_pro_price)){
										$product_price = array($pp_price['product_price']);
										$product_title = $pp_price['product_title'];
										$product_image = $pp_price['product_image'];
										$single_price = $pp_price['product_price'];
										
										$values = array_sum($product_price); 
										
										$total += $values*$p_price['qty'];
										
										
								?>
								
								<tr align="center">
									<td><?php echo $product_title; ?><br>
										<img src="admin_area/product_images/<?php echo $product_image;?>" width="60" height="60"/>
									</td>
									<td><select name="<?php echo "qty$pro_id"; ?>">
									<option><?php echo $p_price['qty'];?></option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
								</select></td>
								
									
									
									
									<td><?php echo "Rs ".$single_price;?></td>
									<td><input type="checkbox" name="remove_item[]" value="<?php echo $pro_id; ?>" ></td>
								</tr>
								
								<?php } } ?>
								
								<tr align="right">
									<td colspan="2"><b>Total Price:</b></td>
									<td style="color:red;" id="total"><b><?php echo "Rs ".$total; ?></b></td>
								<tr>
								
								<tr align="center">
									<td colspan="2"><input type="submit" name="update_cart" value="Update Cart"></td>
									<td><input type="submit" name="continue" value="Continue"></td>
									<td><a href="checkout.php"><input type="button" value="Checkout" name="checkout"></a></td>
								</tr>
							</table>
						</form>
						
						
				<?php
					$ip = getIp();
					
					if(isset($_POST['update_cart'])){
						if(!empty($_POST['remove_item'])){
						foreach($_POST['remove_item'] as $remove_id){
							
							$delete_product = "delete from cart where p_id='$remove_id' AND ip_add='$ip'";
							
							$run_delete= mysqli_query($con,$delete_product);
							
							if($run_delete){
								
								echo "<script>window.open('cart.php','_self')</script>";
							}
							
						}
						}
						
						
						
						$total = 0;
								global $con;
								
								$ip = getIp();
								
								$sel_price = "select * from cart where ip_add='$ip'";
					
								$run_price = mysqli_query($con, $sel_price);
								
								while($p_price=mysqli_fetch_array($run_price)){
									
									$pro_id = $p_price['p_id'];
									
									$qty = $_POST["qty$pro_id"];
									
									$up_cart = "update cart set qty='$qty' where p_id='$pro_id'";
									
									$run_up_cart = mysqli_query($con,$up_cart);
									
									
									$pro_price = "select * from products where product_id='$pro_id'";
									
									$run_pro_price = mysqli_query($con,$pro_price);
									
									
								while($pp_price = mysqli_fetch_array($run_pro_price)){
										
										$product_price = $pp_price['product_price'];
										
										$total += $product_price*$p_price['qty'];
									
								}
								
								}
						
						
						
						echo "<script>Document.getElementById('total').innerHTML=$total; </script>";
								
						echo "<script>window.open('cart.php','_self')</script>";
					}
					
					if(isset($_POST['continue'])){
						echo "<script>window.open('index.php','_self')</script>";
					}
				
				?>
					
					
					
					</div>
				
				
				</div>
			</div>
			<!--content wrapper ends here-->
			
			<div id="footer" style="clear:both;margin-bottom:10px;">
			
			<h2 style="text-align:center;padding-top:10px;">&copy; Website by Abhimanyu and Brijesh	</h2>
			
			</div>
			<!--footer ends here-->
			
		</div>
		<!--Main content ends here-->
	</body>
</html>