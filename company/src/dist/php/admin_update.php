<?php
require_once ('../config/connect.php'); 
session_start();
$id = $_POST['id'];
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
//$password = $_POST['password'];


$password_err = $confirm_password_err = "";

$loc = "admin/";

$aphoto = $loc.$username.basename($_FILES['aphoto']['name']);
$imageFileType = strtolower(pathinfo($aphoto,PATHINFO_EXTENSION));

if(strlen(trim($_POST["password"])) < 6){
	$password_err = '<span style="color:red">Password must have atleast 6 characters<br></span>';
	echo '<script>alert ("Password must have atleast 6 characters")</script>';
	echo "<script>window.open('../admin_account.php','_self')</script>";
} else{
	$password = trim($_POST["password"]);
}

if(empty(trim($_POST["confirm_password"]))){
	$confirm_password_err = '<span style="color:red">Please confirm password<br></span>';
	echo "<script>alert ('Please confirm password')</script>";
	echo "<script>window.open('../admin_account.php','_self')</script>";    
} else{
	$confirm_password = trim($_POST["confirm_password"]);
	if(empty($password_err) && ($password != $confirm_password)){
		$confirm_password_err = '<span style="color:red">Password did not match<br></span>';
		echo "<script>alert ('Password did not match')</script>";
		echo "<script>window.open('../admin_account.php','_self')</script>";
	}
}

if(empty($password_err) && empty($confirm_password_err)){
	$password = password_hash($password, PASSWORD_DEFAULT);
	if (move_uploaded_file($_FILES["aphoto"]["tmp_name"], $aphoto)) {


		$query1 = "update admin set name='$name',username='$username', email='$email',password='$password', aphoto='$aphoto' where id=".$_SESSION['id'];

		mysqli_query($connection , $query1);

		echo "<script>window.open('../admin_account.php','_self')</script>";

	}else{



		$query1 = "update admin set name='$name',username='$username', email='$email',password='$password' where id=".$_SESSION['id'];

		mysqli_query($connection , $query1);

		echo "<script>window.open('../admin_account.php','_self')</script>";
	}
}

?>