<?php
require_once (__DIR__.'/../../../config/connect.php');

$firstname = $_POST['firstname'];
$pass = $_POST['password'];
$confpass = $_POST['confpassword'];
$username = $_POST['username'];
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
$dob = $_POST['dob'];
$age = $_POST['age'];

$num = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `customer_account` WHERE ( `username` = '".$_POST['username']."' )"));
$emailnum = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `customer_account` WHERE ( `email` = '".$_POST['email']."' )"));
$phonenum = preg_match('/^[0-9]{10}+$/', $phone);

if ($pass !== $confpass){
	echo "<script>alert ('Password does not match')</script>";
	echo "<script>window.open('../../html/student_add.php','_self')</script>";
}
else{

	$password = password_hash($pass, PASSWORD_DEFAULT);

	$p_loc = __DIR__."/../../assets/userImages/";
	$temp = explode(".", $_FILES["profile"]["name"]);
	$newfilename = $username. '.' . end($temp);
	$cphoto = $p_loc.$newfilename;
	$imageFileType = strtolower(pathinfo($cphoto,PATHINFO_EXTENSION));
	$imagepath = "userImages/".$newfilename;

	$cv_loc = __DIR__."/../../assets/studentCV/";
	$tempcv = explode(".", $_FILES["cv"]["name"]);
	$cvfilename = $username. '.' . end($tempcv);
	$cvname = $cv_loc.$cvfilename;
	$cvFileType = strtolower(pathinfo($cvname,PATHINFO_EXTENSION));
	$cvpath = "studentCV/".$cvfilename;

	if ($num > 0 && $emailnum > 0){
		$error = 'Username and Email Exists. Choose a Unique Ones!';
	}
	elseif ($num > 0){
		$error = 'Username Exists. Choose a Unique One!';
	}
	elseif($emailnum > 0){
		$error = 'Email Exists. Choose a Unique One!';
	}

	if ($num > 0 || $emailnum > 0){

		echo "<script>alert ('$error')</script>";
		echo "<script>window.open('../../html/student_add.php','_self')</script>";

	}
	elseif($phonenum < 1){
		echo "<script>alert ('Please Enter a Valid Phone Number')</script>";
		echo "<script>window.open('../../html/student_add.php','_self')</script>";
	}
	else{

		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG"&& $imageFileType != "JPEG"&& $imageFileType != "PNG") {

			echo "<script>alert ('Sorry, only JPG, JPEG, PNG & GIF files are allowed')</script>";
			echo "<script>window.open('../../html/student_add.php','_self')</script>";

		}
		elseif($cvFileType !="pdf" && $cvFileType !="PDF"){

			echo "<script>alert ('Sorry, only PDF files are allowed')</script>";
			echo "<script>window.open('../../html/student_add.php','_self')</script>";
		}
		else{

			if (move_uploaded_file($_FILES["profile"]["tmp_name"], $cphoto) && move_uploaded_file($_FILES["cv"]["tmp_name"], $cvname)) {

				if (!empty($firstname) && !empty($lastname) && !empty($address) && !empty($phone) && !empty($email) && !empty($password)) {

					if(mysqli_connect_error()){
						die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
					}
					else{

						$INSERT = "INSERT INTO customer_account(username,firstname,lastname,nic,gender,field,address,telephone,email,password,linkedin,web,description1,cphoto,gpa,dob,age,cv) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";


						$stmt = $connection->prepare($INSERT);

						$stmt->bind_param("ssssssssssssssdsis",$username,$firstname,$lastname,$nic,$gender,$field,$address,$phone,$email,$password,$linkedin,$web,$desc1,$imagepath,$gpa,$dob,$age,$cvpath);

						$stmt->execute();

			//redirect to admin page 
						header("Location:../../html/stu_table.php");
						$stmt->close();
						$connection->close();

					}

				}
				else{

					echo "All field are required";
					die();
				}
			}
		}
	}
}

?>