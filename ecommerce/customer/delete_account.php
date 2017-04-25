<style>
	input[type=submit] {
				border-radius:25px;
                position:relative;
                padding:6px 15px;
                border:2px solid #1ab2ff;
                background-color:#1ab2ff;
                color:#fafafa;
				margin:auto;
			margin-bottom:10px;
			}
			input[type=submit]:hover  {
							background-color:#fafafa;
							color:#207cca;
			}
</style>

<br>
<h2 style="text-align:center;color:white;">Do you really want to DELETE your account?</h2>
<form action="" method="post">

<br>
<br>
<input type="submit" name="yes" value="Yes I want">
<input type="submit" name="no" value="No I was Joking">

</form>

<?php
include("../includes/db.php");

$user = $_SESSION['customer_email'];

if(isset($_POST['yes'])){
	$delete_customer = "delete from customers where customer_email='$user'";
	$run_customer = mysqli_query($con,$delete_customer);
	
	session_destroy();
	echo "<script>alert('You Account has been deleted')</script>";
	echo "<script>window.open('../index.php','_self')</script>";
	
}

if(isset($_POST['no'])){
	echo "<script>alert('Do... not joke again!!!')</script>";
	echo "<script>window.open('my_account.php','_self')</script>";
	
}
?>