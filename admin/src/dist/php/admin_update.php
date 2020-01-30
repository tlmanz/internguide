<?php
		require_once (__DIR__.'/../../../config/connect.php');

		$id = $_POST['id'];
		$name = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$imagepathdef = $_POST['defphoto'];

		$p_loc =__DIR__."/../../assets/adminImages/";
		$aphoto = $p_loc.basename($_FILES['profile']['name']);
		$imageFileType = strtolower(pathinfo($aphoto,PATHINFO_EXTENSION));
		$imagepath = "adminImages/".basename($_FILES['profile']['name']);
		// echo "outside";

		if (move_uploaded_file($_FILES["profile"]["tmp_name"], $aphoto)) {
		// echo "insert";

			$query1 = "update admin set name='$name',lastname='$lastname',phone='$phone',email='$email', aphoto = '$imagepath' where id = '$id' ";
			$run_query = mysqli_query($connection , $query1);
			if($run_query){
				echo "<script>alert ('Administrator Profile Updated!')</script>";
				echo "<script>window.open('../../html/admin_table.php','_self')</script>";
			}
	 	}
		else {
	 		$query1 = "update admin set name='$name',lastname='$lastname',phone='$phone',email='$email', aphoto = 'imagepathdef' where id = '$id' ";
			$run_query = mysqli_query($connection , $query1);
			echo "<script>alert ('Profile Picture is not updated!')</script>";
			if($run_query){
				echo "<script>window.open('../../html/admin_table.php','_self')</script>";
			}
	 }

?>