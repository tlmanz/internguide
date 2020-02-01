<?php
require_once (__DIR__.'/../../../config/connect.php');

$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$intro = $_POST['intro'];
$address = $_POST['address'];
$vision = $_POST['vision'];
$mission = $_POST['mission'];
$description = $_POST['description'];
$field = $_POST['field'];
$mainfield = $_POST['mainfield'];
$linkedin = $_POST['linkedin'];
$pin = $_POST['pin'];
$twitter = $_POST['twitter'];
$facebook = $_POST['facebook'];
$introduction = $_POST['intro'];
//$status = $_POST['check'];
$oldemail = $_POST['oldemail'];
$username = $_POST['username'];

$emailnum = 0;

if($email !== $oldemail ){
	$emailnum = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `employee` WHERE ( `email` = '".$_POST['email']."' )"));
}
else{
	$emailnum = 0;
}
$phonenum = preg_match('/^[0-9]{10}+$/', $phone);
$error = '';
	// Logo For Company
	//////////////////////////////////////////////////////////////////////////

	// Slider Image 1 /////////////////////////////////////////////////////////////
// $s_loc = __DIR__."/../../assets/companyImages/slider/";
// $temp1 = explode(".", $_FILES["image1"]["name"]);
// $newfilename1 = $username.'slide1'.'.' . end($temp1);
// $s1photo = $s_loc.$newfilename1;
// $imageFileType1 = strtolower(pathinfo($s1photo,PATHINFO_EXTENSION));
// $s1path = "companyImages/slider/".$newfilename1;
// $defs1path = $_POST['defimage1'];
// 	/////////////////////////////////////////////////////////////////////////////

// 	// Slider Image 2 /////////////////////////////////////////////////////////////
// $temp2 = explode(".", $_FILES["image2"]["name"]);
// $newfilename2 = $username.'slide2'.'.' . end($temp2);
// $s2photo = $s_loc.$newfilename2;
// $imageFileType2 = strtolower(pathinfo($s2photo,PATHINFO_EXTENSION));
// $s2path = "companyImages/slider/".$newfilename2;
// $defs2path = $_POST['defimage2'];
// 	/////////////////////////////////////////////////////////////////////////////

// 	// Slider Image 3 /////////////////////////////////////////////////////////////
// $temp3 = explode(".", $_FILES["image3"]["name"]);
// $newfilename3 = $username.'slide3'.'.' . end($temp3);
// $s3photo = $s_loc.$newfilename3;
// $imageFileType3 = strtolower(pathinfo($s3photo,PATHINFO_EXTENSION));
// $s3path = "companyImages/slider/".$newfilename3;
// $defs3path = $_POST['defimage3'];
// 	/////////////////////////////////////////////////////////////////////////////
// 	// Slider Image 4 /////////////////////////////////////////////////////////////
// $temp4 = explode(".", $_FILES["image4"]["name"]);
// $newfilename4 = $username.'slide4'.'.' . end($temp4);
// $s4photo = $s_loc.$newfilename4;
// $imageFileType4 = strtolower(pathinfo($s4photo,PATHINFO_EXTENSION));
// $s4path = "companyImages/slider/".$newfilename4;
// $defs4path = $_POST['defimage4'];
// 	/////////////////////////////////////////////////////////////////////////////
// 	// Slider Image 5 /////////////////////////////////////////////////////////////
// $temp5 = explode(".", $_FILES["image5"]["name"]);
// $newfilename5 = $username.'slide5'.'.' . end($temp5);
// $s5photo = $s_loc.$newfilename5;
// $imageFileType5 = strtolower(pathinfo($s5photo,PATHINFO_EXTENSION));
// $s5path = "companyImages/slider/".$newfilename5;
// $defs5path = $_POST['defimage5'];
// 	/////////////////////////////////////////////////////////////////////////////

		// echo "outside";

if ($phonenum < 1 && $emailnum > 0){
	$error = 'Email Exists. Choose a Unique One!.. Check Your Contact Number Again!..';
}
elseif ($emailnum > 0){
	$error = 'Email Exists. Choose a Unique One!';
}
elseif($phonenum < 1){
	$error = 'Check Your Contact Number Again!..';
}
if($phonenum < 1 || $emailnum > 0){
	echo "<script>alert ('$error')</script>";
	echo "<script>window.open('../../html/company_edit.php?edit=$id','_self')</script>";
}
else{
	if (!empty($name) && !empty($phone) && !empty($email)) {

		if(mysqli_connect_error()){
			die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
		}else{

			$query1 = "update employee set ename='$name',description='$description',email='$email',phone='$phone',address='$address',mainfield='$mainfield',field='$field',introduction='$introduction',vision='$vision',mission='$mission',pin='$pin',linkedin='$linkedin',facebook='$facebook',twitter='$twitter' where id = '$id' ";
			$run_query = mysqli_query($connection , $query1);
			if($run_query){
				echo "<script>alert ('Company Profile Updated!')</script>";
				echo "<script>window.open('../../html/company_edit.php?edit=$id','_self')</script>";
			}
			else{
				echo "<script>alert ('Something Went Wrong.. Contact Help!')</script>";
				echo "<script>window.open('../../html/help.php','_self')</script>";
			}

		}

	}else{

		echo "<script>alert ('Something Went Wrong.. Contact Help!')</script>";
		echo "<script>window.open('../../html/help.php','_self')</script>";
	}
}
?>