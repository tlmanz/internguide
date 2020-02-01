<?php
//Student Password Reset
session_start();
require_once "../connect.php";

$new_password = $_POST['newpassword'];
$confirm_new_password = $_POST['confirmpassword'];
$pw_id = $_POST['id'];
if ($new_password !== $confirm_new_password){
	echo "<script>alert ('Password Does Not Match!')</script>";
	echo "<script>window.open('../company_reset.php','_self')</script>";
}
else{
	$password = password_hash($new_password, PASSWORD_DEFAULT);
	$query1 = "update customer_account set password='$password' where cid=".$pw_id;
	$run_pw_update = mysqli_query($connection , $query1);
	if ($run_pw_update) {

		echo "<script>alert ('Password Resetted Successfully!')</script>";
		echo "<script>window.open('../company_login.php','_self')</script>";

	}

}

?>