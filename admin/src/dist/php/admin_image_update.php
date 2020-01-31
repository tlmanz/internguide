<?php
require_once (__DIR__.'/../../../config/connect.php');

$id = $_POST['id'];
$username = $_POST['username'];

$p_loc =__DIR__."/../../assets/adminImages/";
$temp = explode(".", $_FILES["profile"]["name"]);
$newfilename = $username.'.' . end($temp);
$aphoto = $p_loc.$newfilename;
$imageFileType = strtolower(pathinfo($aphoto,PATHINFO_EXTENSION));
$imagepath = "adminImages/".$newfilename;

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "JPEG"&& $imageFileType != "PNG"){
	echo "<script>alert ('Sorry, only JPG, JPEG, PNG & GIF files are allowed. Select Again!')</script>";
	echo "<script>window.open('../../html/admin_edit.php?edit=$id','_self')</script>";
}
else{
	if (move_uploaded_file($_FILES["profile"]["tmp_name"], $aphoto)) {
		// echo "insert";

		$query1 = "update admin set aphoto = '$imagepath' where id = '$id' ";
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
	else{
		echo "<script>alert ('Oops! Something Went Wrong.. Contact Help!')</script>";
		echo "<script>window.open('../../html/help.php','_self')</script>";
	}
}



?>