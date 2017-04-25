<?php

$con = mysqli_connect("localhost","root","","ecommerce");

if(mysqli_connect_errno()){
	echo "Failed to connect to MySQL: ".mysqli_connect_error();
}

//getting ip
function getIp(){
	$ip = $_SERVER['REMOTE_ADDR'];
	
	if(!empty($_SERVER['HTTP_CLIENT_IP'])){
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	 
	return $ip;
}

//adding to cart
function cart(){
	if(isset($_GET['pro_id'])){
		global $con;
		$pro_id = $_GET['pro_id'];
		$ip = getIp();
		$check_pro = "select * from cart where ip_add ='$ip' AND p_id='$pro_id'";
		
		$run_check = mysqli_query($con, $check_pro);

		if(mysqli_num_rows($run_check)>0){
			echo "<script>
				document.getElementById('model_data').innerHTML='Product already in Cart';
			</script>";
		}
		else{
			
			$qty=1;
			$insert_pro = "insert into cart (p_id,ip_add,qty) values ('$pro_id','$ip','$qty')";
			$run_pro = mysqli_query($con, $insert_pro);
			
			echo "<script>
				document.getElementById('model_data').innerHTML='Product added to Cart';
				var x=document.getElementById('carttext').innerHTML;
				var z = parseInt(x);
				z=z+1;
				document.getElementById('carttext').innerHTML = z;
			</script>";
		}
	}
}

//getting total added items
function total_items(){
	
	global $con;
	
	if(isset($_GET['add_cart'])){
		
		$ip = getIp();
		
		$get_items = "select * from cart where ip_add='$ip'";
		$run_items = mysqli_query($con, $get_items);
		$count_items = mysqli_num_rows($run_items);	
	}
	else{
		$ip = getIp();
		
		$get_items = "select * from cart where ip_add='$ip'";
		$run_items = mysqli_query($con, $get_items);
		$count_items = mysqli_num_rows($run_items);		
	}
		echo $count_items;
}

//getting total price of all itemws in cart
function total_price(){
	
	$total = 0;
	global $con;
	
	$ip = getIp();
	
	$sel_price = "select * from cart where ip_add='$ip'";
	
	$run_price = mysqli_query($con, $sel_price);
	
	while($p_price=mysqli_fetch_array($run_price)){
		
		$pro_id = $p_price['p_id'];
		
		$pro_price = "select * from products where product_id='$pro_id'";
		
		$run_pro_price = mysqli_query($con,$pro_price);
		
		while($pp_price = mysqli_fetch_array($run_pro_price)){
			$product_price = array($pp_price['product_price']);
		
			$values = array_sum($product_price); 
			
			$total += $values;
		}
	}
	
	echo "$".$total;
	
}

//getting the categoreis

function getCats(){
	
	global $con;
	$get_cats = "select * from categories";
	$run_cats = mysqli_query($con,$get_cats);
	
	while($row_cats = mysqli_fetch_array($run_cats)){
		
		$cat_id = $row_cats['cat_id'];
		$cat_title = $row_cats['cat_title'];
	
		echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
	}
}

//getting the categoreis

function getBrands(){
	
	global $con;
	$get_br = "select * from brand";
	$run_br = mysqli_query($con,$get_br);
	
	while($row_br = mysqli_fetch_array($run_br)){
		
		$br_id = $row_br['brand_id'];
		$br_title = $row_br['brand_title'];
	
		echo "<li><a href='index.php?brand=$br_id'>$br_title</a></li>";
	}
}

function getPro(){
	
	if(!isset($_GET['cat'])){
		if(!isset($_GET['brand'])){
			
			global $con;
			
			$get_pro = "select * from products order by RAND() LIMIT 0,9";
			
			$run_pro = mysqli_query($con,$get_pro);
			
			while($row_pro = mysqli_fetch_array($run_pro)){
				
				$pro_id = $row_pro['product_id'];
				$pro_cat = $row_pro['product_cat'];
				$pro_brand = $row_pro['product_brand'];
				$pro_title = $row_pro['product_title'];
				$pro_price = $row_pro['product_price'];
				$pro_image = $row_pro['product_image'];
				
				echo "
					<a href='details.php?pro_id=$pro_id' style='color:black;' ><div id='single_product' onmouseover='chngdetsin(this)' onmouseout='chngdets(this,\"$pro_title\",\"<b>Price: Rs $pro_price</b>\")'>
						<img src='admin_area/product_images/$pro_image' />
						
						<h3>$pro_title</h3>
						<p><b>Price: Rs $pro_price</b></p>
						
					</div></a>
				
				";
				
			
			}
		}
	}
}

function getCatPro(){
	
	if(isset($_GET['cat'])){
			
		$cat_id=$_GET['cat'];
		global $con;
			
		$get_cat_pro = "select * from products where product_cat='$cat_id'";
			
		$run_cat_pro = mysqli_query($con,$get_cat_pro);
		
		$count_cats = mysqli_num_rows($run_cat_pro);
		
		if($count_cats == 0){
			echo "<h2 style='margin:10px;padding:20px;'>No product in This Category</h2>";
		}
		else{			
			while($row_cat_pro = mysqli_fetch_array($run_cat_pro)){
				
				$pro_id = $row_cat_pro['product_id'];
				$pro_cat = $row_cat_pro['product_cat'];
				$pro_brand = $row_cat_pro['product_brand'];
				$pro_title = $row_cat_pro['product_title'];
				$pro_price = $row_cat_pro['product_price'];
				$pro_image = $row_cat_pro['product_image'];
				
				echo "
					<a href='details.php?pro_id=$pro_id' style='color:black;' ><div id='single_product' onmouseover='chngdetsin(this)' onmouseout='chngdets(this,\"$pro_title\",\"<b>Price: Rs $pro_price</b>\")'>
						<img src='admin_area/product_images/$pro_image' />
						
						<h3>$pro_title</h3>
						<p><b>Price: Rs $pro_price</b></p>
						
					</div></a>
				
				";
			}
			}
	}
}

function getBrandPro(){
	
	if(isset($_GET['brand'])){
			
		$brand_id=$_GET['brand'];
		global $con;
			
		$get_brand_pro = "select * from products where product_brand='$brand_id'";
			
		$run_brand_pro = mysqli_query($con,$get_brand_pro);
		
		$count_brands = mysqli_num_rows($run_brand_pro);
		
		if($count_brands == 0){
			echo "<h2 style='margin:10px;padding:20px;'>No product found in This Brand</h2>";
		}
		else{			
			while($row_brand_pro = mysqli_fetch_array($run_brand_pro)){
				
				$pro_id = $row_brand_pro['product_id'];
				$pro_cat = $row_brand_pro['product_cat'];
				$pro_brand = $row_brand_pro['product_brand'];
				$pro_title = $row_brand_pro['product_title'];
				$pro_price = $row_brand_pro['product_price'];
				$pro_image = $row_brand_pro['product_image'];
				
				echo "
					<a href='details.php?pro_id=$pro_id' style='color:black;' ><div id='single_product' onmouseover='chngdetsin(this)' onmouseout='chngdets(this,\"$pro_title\",\"<b>Price: Rs $pro_price</b>\")'>
						<img src='admin_area/product_images/$pro_image' />
						
						<h3>$pro_title</h3>
						<p><b>Price: Rs $pro_price</b></p>
						
					</div></a>
				
				";
			
			}
			}
	}
}
?>