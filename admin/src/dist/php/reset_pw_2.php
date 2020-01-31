<?php

//Company
require_once (__DIR__.'/../../../config/connect.php');

$new_password = $_POST['newpassword'];
$confirm_new_password = $_POST['confirmpassword'];
$pw_id = $_POST['id'];
if ($new_password !== $confirm_new_password){
	echo "<script>alert ('Password Does Not Match!')</script>";
	echo "<script>window.open('../../html/password_reset_student.php?edit=$pw_id','_self')</script>";
}
else{
	$password = password_hash($new_password, PASSWORD_DEFAULT);
	$query1 = "update employee set password='$password' where id=".$pw_id;
	$run_pw_update = mysqli_query($connection , $query1);
	if ($run_pw_update) {

		echo "<script>alert ('Password Resetted Successfully!')</script>";
		echo "<script>window.open('../../html/comp_table.php','_self')</script>";

	}
	else{
		echo 'error';
		echo $new_password;
		echo $confirm_new_password;
	}

}

?>