<?php
require_once (__DIR__.'/../../../config/connect.php');

$id = $_POST['id'];
$name = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$username = $_POST['username'];


$error = '';
$emailnum = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `admin` WHERE ( `email` = '".$_POST['email']."' )"));
$phonenum = preg_match('/^[0-9]{10}+$/', $phone);
		// echo "outside";

if ($phonenum < 1 && $emailnum > 0){
	$error = 'Email Exists. Choose a Unique One!.. Check Your Contact Number Again!..';
}
elseif ($emailnum > 0){
	$error = 'Email Exists. Choose a Unique One!';
}
elseif($emailnum > 0){
	$error = 'Check Your Contact Number Again!';
}

if($phonenum < 1){
	echo "<script>alert ('Please Enter a Valid Phone Number')</script>";
	echo "<script>window.open('../../html/admin_edit?edit=$id.php','_self')</script>";
}
else{

	$query1 = "update admin set name='$name',lastname='$lastname',phone='$phone',email='$email' where id = '$id' ";
	$run_query = mysqli_query($connection , $query1);
	if($run_query){
		echo "<script>alert ('Administrator Profile Updated!')</script>";
		echo "<script>window.open('../../html/admin_table.php','_self')</script>";
	}
	else{
		echo "<script>alert ('Oops! Something Went Wrong.. Contact Help!')</script>";
		echo "<script>window.open('../../html/help.php','_self')</script>";
	}
	
}

?>