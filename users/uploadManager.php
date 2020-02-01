<?php
require_once (__DIR__.'../../admin/config/connect.php');

$cid = $_POST['cid'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$nic = $_POST['nic'];
$gender = $_POST['gender'];
$field = $_POST['field'];
$address = $_POST['address'];
$phone = $_POST['telephone'];
$email = $_POST['email'];
$gpa = $_POST['gpa'];
$linkedin = $_POST['linkedin'];
$web = $_POST['web'];
$desc1 = $_POST['description1'];
$username = $_POST['username'];
$dob = $_POST['dob'];
$age = $_POST['age'];
$oldcv = $_POST['oldcv'];
$oldemail = $_POST['oldemail'];
		// $cv = $POST['cv'];
$emailnum = 0;

if($email !== $oldemail ){
	$emailnum = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `customer_account` WHERE ( `email` = '".$_POST['email']."' )"));
}
else{
	$emailnum = 0;
}

if(!isset($_FILES['cv']) || $_FILES['cv']['error']== UPLOAD_ERR_NO_FILE){
	$cvpath = $oldcv;
}
else{
	$cv_loc = __DIR__."../../admin/src/assets/studentCV/";
	$tempcv = explode(".", $_FILES["cv"]["name"]);
	$cvfilename = $username. '.' . end($tempcv);
	$cvname = $cv_loc.$cvfilename;
	$cvFileType = strtolower(pathinfo($cvname,PATHINFO_EXTENSION));
	$cvpath = "studentCV/".$cvfilename;
	move_uploaded_file($_FILES["cv"]["tmp_name"], $cvname);
	if($cvFileType !="pdf" && $cvFileType !="PDF"){
		echo "<script>alert ('Sorry, only PDF files are allowed')</script>";
		echo "<script>window.open('../../html/student_edit.php?edit=$cid','_self')</script>";
	}
}

$emailnum = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `customer_account` WHERE ( `email` = '".$_POST['email']."' )"));
$phonenum = preg_match('/^[0-9]{10}+$/', $phone);
if ($phonenum < 1 && $emailnum > 0){
	$error = 'Email Exists. Choose a Unique One!.. Check Your Contact Number Again!..';
}
elseif ($emailnum > 0){
	$error = 'Email Exists. Choose a Unique One!';
}
if($phonenum < 1 || $emailnum > 0){
	echo "<script>alert ('$error')</script>";
	echo "<script>window.open('../../html/student_edit.php?edit=$cid','_self')</script>";
}		// echo "outside";
else{
		// echo "insert";
	$query1 = "update customer_account set firstname='$firstname',lastname='$lastname', nic = '$nic', gender = '$gender', field = '$field', address='$address',telephone='$phone',email='$email', gpa = '$gpa', linkedin = '$linkedin', web = '$web', description1 = '$desc1', dob = '$dob', age = '$age', cv = '$cvpath' where cid = '$cid' ";
	$run_query = mysqli_query($connection , $query1);
	if($run_query){
		echo "<script>alert ('Profile Updated Successfully!')</script>";
		echo "<script>window.open('userprofile.php','_self')</script>";
	}
	else{
		echo "<script>alert ('Oops! Something Went Wrong.. Contact Help!')</script>";
		echo "<script>window.open('../../html/help.php','_self')</script>";
	}
}


?>