<?php
require_once (__DIR__.'/../../../config/connect.php');

$firstname = $_POST['firstname'];
$pass = $_POST['password'];
$username = $_POST['username'];
$lastname = $_POST['lastname'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$num = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `admin` WHERE ( `username` = '".$_POST['username']."' )"));
$emailnum = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `admin` WHERE ( `email` = '".$_POST['email']."' )"));
$phonenum = preg_match('/^[0-9]{10}+$/', $phone);

$error = '';

$password = password_hash($pass, PASSWORD_DEFAULT);

$p_loc = __DIR__."/../../assets/adminImages/";
$temp = explode(".", $_FILES["profile"]["name"]);
$newfilename = round(microtime(true)) .$username.'.'.end($temp);
$aphoto = $p_loc.$newfilename;
$imageFileType = strtolower(pathinfo($aphoto,PATHINFO_EXTENSION));
$imagepath = "adminImages/".$newfilename;

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
	echo "<script>window.open('../../html/admin_add.php','_self')</script>";

}
elseif($phonenum < 1){
	echo "<script>alert ('Please Enter a Valid Phone Number')</script>";
	echo "<script>window.open('../../html/admin_add.php','_self')</script>";
}
else{

	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG"&& $imageFileType != "JPEG"&& $imageFileType != "PNG") {

		echo "<script>alert ('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
		echo "<script>window.open('../../html/admin_add.php','_self')</script>";

	}else{

		if (move_uploaded_file($_FILES["profile"]["tmp_name"], $aphoto)) {

			if (!empty($firstname) && !empty($lastname) && !empty($phone) && !empty($email) && !empty($password)) {

				if(mysqli_connect_error()){
					die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
				}else{

					$INSERT = "INSERT INTO admin(username,name,lastname,phone,email,password,aphoto) VALUES (?,?,?,?,?,?,?)";


					$stmt = $connection->prepare($INSERT);

					$stmt->bind_param("sssssss",$username,$firstname,$lastname,$phone,$email,$password,$imagepath);

					$stmt->execute();

			//redirect to admin page 
					echo "<script>alert ('Administrator Added Successfully!')</script>";
					echo "<script>window.open('../../html/admin_table.php','_self')</script>";
					$stmt->close();
					$connection->close();

				}

			}else{

				echo "All field are required";
				die();
			}
		}
	}
}

?>