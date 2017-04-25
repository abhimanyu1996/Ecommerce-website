				<?php 
					include("../includes/db.php");
					$user = $_SESSION['customer_email'];
					
					$get_customer = "select * from customers where customer_email='$user'";
					
					$run_customer=mysqli_query($con,$get_customer);
					
					$row_customer = mysqli_fetch_array($run_customer);
					
					$c_id = $row_customer['customer_id'];
					$name = $row_customer['customer_name'];
					$email = $row_customer['customer_email'];
					$pass = $row_customer['customer_pass'];
					$country = $row_customer['customer_country'];
					$city = $row_customer['customer_city'];
					$contact = $row_customer['customer_contact'];
					$address = $row_customer['customer_address'];
					$image = $row_customer['customer_image'];
				?>

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
		
		input[name=update] {
				border-radius:25px;
                position:relative;
                padding:6px 15px;
                border:2px solid #1ab2ff;
                background-color:#1ab2ff;
                color:#fafafa;
				margin:auto;
			margin-bottom:10px;
			}
			input[name=update]:hover  {
							background-color:#fafafa;
							color:#207cca;
			}
		</style>

		
<form action="" method="post" enctype="multipart/form-data">
						
	<table align="center" width="750" id="outerbox">
							
		<tr align="center">
			<td colspan="2" id="tabletop"><h2>Update Your Account</h2></td>
							
		</tr>
						
							<tr>
								<td align="right">Customer Name: </td>
								<td><input type="text" name="c_name" value="<?php echo $name; ?>" required /></td>
							</tr>
							
							<tr>
								<td align="right">Customer Email:</td>
								<td><input type="text" name="c_email"value="<?php echo $email; ?>" required ></td>
							</tr>

							<tr>
								<td align="right">Customer Image:</td>
								<td><input type="file" name="c_image"><img src="customer_images/<?php echo $image; ?>" width="50" height="50" style="margin-left:10px; border-radius:50px;;" "></td>
							</tr>		

							<tr>
								<td align="right">Customer Country:</td>
								<td>
								<select name="c_country" disabled>
									<option><?php echo $country; ?></option>
								</select>
								
								</td>
							</tr>	

							<tr>
								<td align="right">Customer City:</td>
								<td><input type="text" name="c_city" value="<?php echo $city; ?>" required></td>
							</tr>	

							<tr>
								<td align="right">Customer Contact: </td>
								<td><input type="text" name="c_contact"value="<?php echo $contact; ?>" pattern="[0-9]{10}" required></td>
							</tr>	

							<tr>
								<td align="right">Customer Address:</td>
								<td><input type="text" name="c_address" value="<?php echo $address; ?>" required></textarea></td>
							</tr>					
							
							<tr>
								<td colspan="2" style="padding:5px;" ><hr></td>
							</tr>
							
							<tr>
								<td align="right">Confirm Password:</td>
								<td><input type="password" name="c_pass" required ></td>
							</tr>
							
							<tr>
								<td colspan="2"align="center" style="padding:0;color:red;" id="edit_error"></td>
							</tr>
							
							<tr align="center">
								<td colspan="2" align="center" style="padding:0;"><input type="submit" name="update" value="Update Account" /></td>
							</tr>
							
							

						</table>
					
					</form>
				

<?php
	if(isset($_POST['update'])){
		
		$ip = getIp();
		
		$customer_id = $c_id;
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = md5($_POST['c_pass']);
		$c_city = $_POST['c_city'];
		$c_contact = $_POST['c_contact'];
		$c_address = $_POST['c_address'];
		
		if($c_pass!=$pass){
			echo "<script>document.getElementById('edit_error').innerHTML='Password Incorrect';</script>";
		}else{
		
		
		$c_image = $_FILES['c_image']['name'];
		$c_image_tmp = $_FILES['c_image']['tmp_name'];
		
		if(!empty($c_image_tmp)){
		move_uploaded_file($c_image_tmp,"customer_images/$c_image");
		}else{
			
			$c_image = $image;
		}
		
		$update_c = "update customers set customer_name='$c_name', customer_email='$c_email', customer_pass='$pass', customer_country='$country', customer_city='$c_city', customer_contact='$c_contact', customer_address='$c_address', customer_image='$c_image' where customer_id= '$customer_id'";
		
		$run_update = mysqli_query($con, $update_c);
		
		if($run_update){
			
			echo "<script>alert('Your Account Updated');</script>";
			
			echo "<script>window.open('my_account.php','_self');</script>";
		}
		}
	}
	


?>