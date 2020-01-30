<?php
		require_once (__DIR__.'/../../../config/connect.php');

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
		// $cv = $POST['cv'];
		$p_loc = __DIR__."/../../assets/userImages/";
		$cphoto = $p_loc.basename($_FILES['profile']['name']);
		$imageFileType = strtolower(pathinfo($cphoto,PATHINFO_EXTENSION));
		$imagepath = "userImages/".basename($_FILES['profile']['name']);
		// echo "outside";

		if (move_uploaded_file($_FILES["profile"]["tmp_name"], $cphoto)) {
		// echo "insert";

			$query1 = "update customer_account set firstname='$firstname',lastname='$lastname', nic = '$nic', gender = '$gender', field = '$field', address='$address',telephone='$phone',email='$email', gpa = '$gpa', linkedin = '$linkedin', web = '$web', description1 = '$desc1', cphoto = '$imagepath' where cid = '$cid' ";
			$run_query = mysqli_query($connection , $query1);
			if($run_query){
				header("Location:../../html/student_show.php?edit=$cid");
			}
	 	}
		else {
	 		$query1 = "update customer_account set firstname='$firstname',lastname='$lastname', nic = '$nic', gender = '$gender', field = '$field', address='$address',telephone='$phone',email='$email', gpa = '$gpa', linkedin = '$linkedin', web = '$web', description1 = '$desc1' where cid = '$cid' ";
			$run_query = mysqli_query($connection , $query1);
			echo "<script>alert ('Profile Picture is not updated!')</script>";
			if($run_query){
				header("Location:../../html/student_show.php?edit=$cid");
			}
	 }

?>