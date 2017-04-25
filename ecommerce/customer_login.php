<?php

include("includes/db.php");
?>
<style>
input[name=login] {
				border-radius:25px;
                position:relative;
                padding:6px 15px;
                border:2px solid #1ab2ff;
                background-color:#1ab2ff;
                color:#fafafa;
}
input[name=login]:hover  {
                background-color:#fafafa;
                color:#207cca;
}

input[name=reg] {
				border-radius:25px;
                position:relative;
                padding:6px 15px;
                border:2px solid #1ab2ff;
                background-color:#1ab2ff;
                color:#fafafa;
}
input[name=reg]:hover  {
                background-color:#fafafa;
                color:#207cca;
}


</style>
<div>
	<form method="post" action="" align="center">
	
		<div align="center" style=" width:300px;height:340px;margin:auto;box-shadow:0 0 7px 2px #666666; border-radius:10px;background:rgba(255,255,255,0.3);">
		
				<div align="center" style=" border-radius:10px 10px 0 0; font-weight:bolder; background-color:#1ab2ff; box-shadow:0 0 4px 1px #666666;color:white;padding:10px;"><h2>LOGIN</h2>
				
			</div>
			
			<div style="margin-left:30px;margin-top:10px;text-align:left;color:white;">
				<b>Email:</b>
			</div>
			<div style="margin-top:5px;text-align:center;" >
			<input type="email" name="email" placeholder="enter email" 
				style="width:80%;
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
				
				"

			required>
			
			</div>
			
			<div style="margin-left:30px;margin-top:3px;text-align:left;color:white;">
				<b>Password: </b></div>
				
			<div style="margin-top:5px;text-align:center;">
				<input type="password" name="pass" placeholder="enter password" 
				style="width:80%;
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
				
				"
				required>
			</div>
			
			<div style="margin-top:2px;text-align:center;color:red;" id="login_error">
			</div>
			
			<div style="margin-top:5px;text-align:center;">
			<input type="submit" name="login" value="Login" id="search"/>
			
			</div>
			<div style="margin-top:5px;text-align:center;">
				<a href="checkout.php?forgot_pass">Forgot Password</a>
			</div>
			
			
			<hr width="80%" style="color:white;border-color:white;background-color:white; ">
			<div style="margin-top:10px;text-align:center;">
				New?<br>
				<a href="customer_register.php" > <input type="button" name="reg" value="Register Here" id="search"/></a>
			
			</div>
			
		</div>
	
		
	
	</form>

	<?php
	if(isset($_POST['login'])){
		
		$c_email = $_POST['email']; 
		$c_pass = md5($_POST['pass']);
		
		$sel_c = "select * from customers where customer_pass='$c_pass' AND customer_email='$c_email'";
		
		$run_c = mysqli_query($con,$sel_c);
		
		$check_customer = mysqli_num_rows($run_c);
		
		if($check_customer == 0){
			echo "<script>document.getElementById('login_error').innerHTML = 'Email or Password incorrect';</script>";
			exit();
		}
		
		$ip = getIp();
		 
		$sel_cart = "select * from cart where ip_add='$ip'";
		
		$run_cart = mysqli_query($con,$sel_cart);
		
		$check_cart = mysqli_num_rows($run_cart);
		
		if($check_customer>0 AND $check_cart==0){
			
			$_SESSION['customer_email']=$c_email;
			echo "<script>window.open('customer/my_account.php','_self')</script>";
			
		}
		else{
			$_SESSION['customer_email']=$c_email;
			echo "<script>alert('You Logged in successfully..!!')</script>";
			echo "<script>window.open('checkout.php','_self')</script>";
			
		}
	}
	
	?>
	
	
</div>