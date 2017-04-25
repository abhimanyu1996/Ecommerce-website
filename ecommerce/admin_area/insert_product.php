<!DOCTYPE>
<?php
include("includes/db.php");
?>
<html>
	<head>
		<title>Inserting Product</title>
	</head>
	<body bgcolor= #b3b3b3>
	
		<form action="insert_product.php" method="post" enctype="multipart/form-data">
			
			<table align="center" width="600" border="2" bgcolor=orange>
				
				<tr align="center" >
					<td  colspan="2"><h2>Insert New Post Here</td>
				
				</tr>
				
				<tr>
					<td  align="right">Product Title: </td>
					<td><input type="text" name="product_title" required /></td>
				</tr>
				
				<tr>
					<td align="right">Product Catgory: </td>
					<td>
						<select name="product_cat" required>
							<option>Select a category</option>
							<?php
								$getcat="select * from categories";
								$run_cat=mysqli_query($con,$getcat);
								
								while($row_cats = mysqli_fetch_array($run_cat)){
									$cat_id = $row_cats['cat_id'];
									$cat_title = $row_cats['cat_title'];
									echo "<option value='$cat_id'>$cat_title</option>";
								}
							
							?>
					
						</select>
					
					</td>
				</tr>
				
				<tr>
					<td align="right">Product Brand: </td>
					<td>
						<select name="product_brand" required>
							<option>Select a category</option>
							<?php
							$get_br = "select * from brand";
							$run_br = mysqli_query($con,$get_br);
							
							while($row_br = mysqli_fetch_array($run_br)){
								
								$br_id = $row_br['brand_id'];
								$br_title = $row_br['brand_title'];
							
								echo "<option value='$br_id'>$br_title</option>";
							}
							
							?>
						</select>
					</td>
				</tr>
				
				<tr>
					<td align="right">Product Image: </td>
					<td><input type="file" name="product_image" /></td>
				</tr>
				
				<tr>
					<td  align="right">Product Price: </td>
					<td><input type="text" name="product_price" required/></td>
				</tr>
				
				<tr>
					<td align="right">Product Description: </td>
					<td><textarea type="text" name="product_desc" cols="20" rows="10" required></textarea></td>
				</tr>
				
				<tr>
					<td align="right">Product Keywords: </td>
					<td><input type="text" name="product_keywords" size="50" required/></td>
				</tr>
				
				<tr align="center">
					<td colspan="2"><input type="submit" name="insert_post" value="Insert Now"/></td>
				</tr>
			</table>
		
		</form>
	
	
	</body>


</html>

<?php
	if(isset($_POST['insert_post'])){
		//getting text data
		$product_title = $_POST['product_title'];
		$product_cat = $_POST['product_cat'];
		$product_brand = $_POST['product_brand'];
		$product_price = $_POST['product_price'];
		$product_desc = $_POST['product_desc'];
		$product_keywords = $_POST['product_keywords'];
		
		//getting image2
		$product_image = $_FILES['product_image']['name'];
		$product_image_tmp = $_FILES['product_image']['tmp_name'];
		
		move_uploaded_file($product_image_tmp,"product_images/$product_image");
		
		$insert_product = "insert into products(product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
		
		$insert_pro = mysqli_query($con,$insert_product);
		
		if($insert_pro){
			
			echo "<script>alert('Product Has been inserted!!')</script>";
			echo "<script>window.open('insert_product.php','_self')</script>";
		}
	}
?>
