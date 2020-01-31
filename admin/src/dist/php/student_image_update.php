<?php
require_once (__DIR__.'/../../../config/connect.php');

$id = $_POST['id'];
$username = $_POST['username'];

$p_loc =__DIR__."/../../assets/userImages/";
$temp = explode(".", $_FILES["profile"]["name"]);
$newfilename = $username.'.' . end($temp);
$aphoto = $p_loc.$newfilename;
$imageFileType = strtolower(pathinfo($aphoto,PATHINFO_EXTENSION));
$imagepath = "userImages/".$newfilename;

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "JPEG"&& $imageFileType != "PNG"){
	echo "<script>alert ('Sorry, only JPG, JPEG, PNG & GIF files are allowed. Select Again!')</script>";
	echo "<script>window.open('../../html/student_edit.php?edit=$id','_self')</script>";
}
else{
	if (move_uploaded_file($_FILES["profile"]["tmp_name"], $aphoto)) {
		// echo "insert";

		$query1 = "update customer_account set cphoto = '$imagepath' where cid = '$id' ";
		$run_query = mysqli_query($connection , $query1);
		if($run_query){
			echo "<script>alert ('Student Photo Updated!')</script>";
			echo "<script>window.open('../../html/student_edit.php?edit=$id','_self')</script>";
		}
		else{
			echo "<script>alert ('Oops! Something Went Wrong 2.. Contact Help!')</script>";
			echo "<script>window.open('../../html/help.php','_self')</script>";
		}
	}
	else{
		echo "<script>alert ('Oops! Something Went Wrong 1.. Contact Help!')</script>";
		echo "<script>window.open('../../html/help.php','_self')</script>";
	}
}



?>