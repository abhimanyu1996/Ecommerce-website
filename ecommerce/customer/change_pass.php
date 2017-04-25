

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
		
		input[name=change_pass] {
				border-radius:25px;
                position:relative;
                padding:6px 15px;
                border:2px solid #1ab2ff;
                background-color:#1ab2ff;
                color:#fafafa;
				margin:auto;
			margin-bottom:10px;
			}
			input[name=change_pass]:hover  {
							background-color:#fafafa;
							color:#207cca;
			}
		</style>

<form action="" method="post">
	
	<table align="center" style="margin:auto" id="outerbox">
	
	<tr align="center">
			<td colspan="2" id="tabletop"><h2>Change Password</h2></td>
							
		</tr>
		
	<tr>
	<td align="right"><b>Enter Current Password: </b></td><td><input type="password" name="current_pass" required></td>
	</tr>
	
	<tr>
	<td align="right"><b>Enter New Password: </b></td><td><input type="password" name="new_pass" required></td>
	</tr>
	
	<tr>
	<td align="right"><b>Enter New Password Again: </b></td><td><input type="password" name="new_pass_again" required></td>
	</tr>
	
	<tr align="center">
	<td colspan="2"  align="center" style="padding:0;"><input type="submit" name="change_pass" value="Change Password"></td>
	</tr>
	</table>
</form> 


<?php
	
	include("../includes/db.php");
	
	if(isset($_POST['change_pass'])){
		
		$user=$_SESSION['customer_email'];
		
		$current_pass = md5($_POST['current_pass']);
		$new_pass = md5($_POST['new_pass']);
		$new_again = md5($_POST['new_pass_again']);
		
		$sel_pass = "select * from customers where customer_pass='$current_pass' AND customer_email='$user' ";
		
		$run_pass = mysqli_query($con, $sel_pass);
		
		$check_pass = mysqli_num_rows($run_pass);
		
		if($check_pass==0){
			
			echo "<script>alert('Your current password is wrong') </script>";
		}else{
		
		if($new_pass!=$new_again){
			
			echo "<script>alert('Passwords do not match') </script>";
			
		}	
		else{
			
			$update_pass="update customers set customer_pass='$new_pass' where customer_email='$user'";
			
			$run_update = mysqli_query($con,$update_pass);
			
			echo "<script>alert('Your password is updated successfully')</script>";
			echo "<script>window.open('my_account.php','_self')</script>";
		}
	}}

?>