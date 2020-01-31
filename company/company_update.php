<?php
require_once ('connect.php');

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
$linkedin = $_POST['linkedin'];
$pin = $_POST['pin'];
$twitter = $_POST['twitter'];
$facebook = $_POST['facebook'];
$introduction = $_POST['intro'];
$status = $_POST['check'];
$oldemail = $_POST['oldemail'];

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
$s_loc = "src/assets/companyImages/slider/";

$temp1 = explode(".", $_FILES["image1"]["name"]);
$newfilename1 = round(microtime(true)) .$id.'slide1'.'.' . end($temp1);
$s1photo = $s_loc.$newfilename1;
$imageFileType1 = strtolower(pathinfo($s1photo,PATHINFO_EXTENSION));
$s1path = "companyImages/slider/".$newfilename1;
$defs1path = $_POST['defimage1'];
	/////////////////////////////////////////////////////////////////////////////

	// Slider Image 2 /////////////////////////////////////////////////////////////
$temp2 = explode(".", $_FILES["image2"]["name"]);
$newfilename2 = round(microtime(true)) .$id.'slide2'.'.' . end($temp2);
$s2photo = $s_loc.$newfilename2;
$imageFileType2 = strtolower(pathinfo($s2photo,PATHINFO_EXTENSION));
$s2path = "companyImages/slider/".$newfilename2;
$defs2path = $_POST['defimage2'];
	/////////////////////////////////////////////////////////////////////////////

	// Slider Image 3 /////////////////////////////////////////////////////////////
$temp3 = explode(".", $_FILES["image3"]["name"]);
$newfilename3 = round(microtime(true)) .$id.'slide3'.'.' . end($temp3);
$s3photo = $s_loc.$newfilename3;
$imageFileType3 = strtolower(pathinfo($s3photo,PATHINFO_EXTENSION));
$s3path = "companyImages/slider/".$newfilename3;
$defs3path = $_POST['defimage3'];
	/////////////////////////////////////////////////////////////////////////////
		// echo "outside";
$temp4 = explode(".", $_FILES["image4"]["name"]);
$newfilename4 = round(microtime(true)) .$id.'slide4'.'.' . end($temp4);
$s4photo = $s_loc.$newfilename4;
$imageFileType4 = strtolower(pathinfo($s4photo,PATHINFO_EXTENSION));
$s4path = "companyImages/slider/".$newfilename4;
$defs4path = $_POST['defimage4'];

$temp5 = explode(".", $_FILES["image5"]["name"]);
$newfilename5 = round(microtime(true)) .$id.'slide5'.'.' . end($temp5);
$s5photo = $s_loc.$newfilename5;
$imageFileType5 = strtolower(pathinfo($s5photo,PATHINFO_EXTENSION));
$s5path = "companyImages/slider/".$newfilename5;
$defs5path = $_POST['defimage5'];



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
	echo "<script>window.open('company_edit.php?edit=$id','_self')</script>";
}
else{
	if($status !== '0'){
		if (!empty($name) && !empty($phone) && !empty($email)) {

			if(mysqli_connect_error()){
				die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
			}else{

				$query1 = "update employee set ename='$name',description='$description',email='$email',phone='$phone',address='$address',field='$field',introduction='$introduction',vision='$vision',mission='$mission',photo2='$defs1path',photo3='$defs2path',photo4='$defs3path',photo5='$defs4path',photo6='$defs5path',pin='$pin',linkedin='$linkedin',facebook='$facebook',twitter='$twitter' where id = '$id' ";
				$run_query = mysqli_query($connection , $query1);
				if($run_query){
					echo "<script>alert ('Company Profile Updated!')</script>";
					//echo "<script>window.open('company_new.php','_self')</script>";
				}
				else{
					echo "<script>alert ('Oops! Something Went Wrong.. Contact Help!')</script>";
					//echo "<script>window.open('help.php','_self')</script>";
				}

			}

		}else{

			echo "<script>alert ('Oops! Something Went Wrong.. Contact Help!')</script>";
			//echo "<script>window.open('help.php','_self')</script>";
		}
	}
	else{
		if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif" && $imageFileType1 != "JPG" && $imageFileType1 != "JPEG"&& $imageFileType1 != "PNG" && $imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg" && $imageFileType2 != "gif" && $imageFileType2 != "JPG" && $imageFileType2 != "JPEG"&& $imageFileType2 != "PNG" && $imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg" && $imageFileType3 != "gif" && $imageFileType3 != "JPG" && $imageFileType3 != "JPEG" && $imageFileType3 != "PNG"  && $imageFileType4 != "jpg" && $imageFileType4 != "png" && $imageFileType4 != "jpeg" && $imageFileType4 != "gif" && $imageFileType4 != "JPG" && $imageFileType4 != "JPEG"&& $imageFileType4 != "PNG" && $imageFileType5 != "jpg" && $imageFileType5 != "png" && $imageFileType5 != "jpeg" && $imageFileType5 != "gif" && $imageFileType5 != "JPG" && $imageFileType5 != "JPEG"&& $imageFileType5 != "PNG") {

			echo "<script>alert ('Sorry, only JPG, JPEG, PNG & GIF files are allowed. Select Again!')</script>";
			echo "<script>window.open('company_edit.php?edit=$id','_self')</script>";

		}else{

			if (move_uploaded_file($_FILES["image1"]["tmp_name"], $s1photo) && move_uploaded_file($_FILES["image2"]["tmp_name"], $s2photo) && move_uploaded_file($_FILES["image3"]["tmp_name"], $s3photo) && move_uploaded_file($_FILES["image4"]["tmp_name"], $s4photo)&& move_uploaded_file($_FILES["image5"]["tmp_name"], $s5photo)) {

				if (!empty($name) && !empty($phone) && !empty($email)) {

					if(mysqli_connect_error()){
						die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
					}else{

						$query1 = "update employee set ename='$name',description='$description',email='$email',phone='$phone',address='$address',field='$field',introduction='$introduction',vision='$vision',mission='$mission',photo2='$s1path',photo3='$s2path',photo4='$s3path',photo5='$s4path',photo6='$s5path',pin='$pin',linkedin='$linkedin',facebook='$facebook',twitter='$twitter' where id = '$id' ";
						$run_query = mysqli_query($connection , $query1);
						if($run_query){
							echo "<script>alert ('Company Profile Updated!')</script>";
							//echo "<script>window.open('company_new.php','_self')</script>";
						}
						else{
							echo "<script>alert ('Something Went Wrong.. Contact Help!')</script>";
							//echo "<script>window.open('help.php','_self')</script>";
						}

					}

				}else{

					echo "<script>alert ('Something Went Wrong.. Contact Help!')</script>";
					//echo "<script>window.open('html/help.php','_self')</script>";
				}
			}
		}
	}
}
?>