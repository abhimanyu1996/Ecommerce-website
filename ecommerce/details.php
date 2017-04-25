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
		input[name=myBtn]{
				border-radius:25px;
                position:relative;
                padding:6px 15px;
                border:2px solid #1ab2ff;
                background-color:#1ab2ff;
                color:#fafafa;
				margin-right:10px;
				margin-top:20px;
				float:right;
			}
			input[name=myBtn]:hover{
							background-color:#fafafa;
							color:#207cca;
			}
		</style>
		<script>


// When the user clicks the button, open the modal 
function buttonclick() {
	var modal = document.getElementById('myModal');
	
    modal.style.display = "block";
	
}

// When the user clicks on <span> (x), close the modal
function closemodel() {
	var modal = document.getElementById('myModal');
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
	var modal = document.getElementById('myModal');
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

		
		


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
				
					<div id="products_box" >
						<?php
						
						
						if(isset($_GET['pro_id'])){
						
						$product_id=$_GET['pro_id'];
						
						$get_pro = "select * from products where product_id='$product_id'";
						
						$run_pro = mysqli_query($con,$get_pro);
						
						while($row_pro = mysqli_fetch_array($run_pro)){
		
							$pro_id = $row_pro['product_id'];
							$pro_title = $row_pro['product_title'];
							$pro_price = $row_pro['product_price'];
							$pro_image = $row_pro['product_image'];
							$pro_desc = $row_pro['product_desc'];
							
							echo "
								<div style='text-align:center;color:white'>
								
									<h3 style='font-size:30px;margin:10px;'>$pro_title</h3>
									
									<img src='admin_area/product_images/$pro_image' width='400' height='300' style='float:left;margin-bottom:25px;margin-right:25px;border:4px solid black'/>
									
									<div style='margin-right:20px;'>
									<p> <b>Price: Rs $pro_price</b></p>
									<br>
									<p style='text-align:justify;'>$pro_desc</p>
									
									<a href='index.php' style='float:left;margin-top:20px;'>Go Back..!!</a>
								
									<form method='POST' action=''>
								<input type='submit' id='myBtn' onclick='' name='myBtn' value='Add to Cart'>
									</form>
									</div>
									</div>
							";
						
						}
						}
						else{
							echo "
							<div style='text-align:center;'>
									<h3 style='font-size:30px;margin:10px;'>No Product Selected..!!</h3>
							</div>";
						}
						?>
					</div>
				
				<!-- The Modal -->
						<div id="myModal" class="modal">

						  <!-- Modal content -->
						  <div class="modal-content">
							<span class="close" onclick="closemodel()">x</span>
							<p id="model_data">Unknown Error..!!</p>
								<input type="button" name="search" value="Continue" onclick="closemodel()" style="float:right;margin-top:50px;left:0;"> 
								<a href="index.php"><input type="button" name="search" value="Go Home" style="float:left; margin-top:50px; left:0;" ></a>
						  </div>

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
<?php
if(isset($_POST['myBtn'])){
	cart();
	echo "<script>buttonclick();
	</script>";
}
	

?>