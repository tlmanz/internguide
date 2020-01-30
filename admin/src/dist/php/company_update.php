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
$linkedin = $_POST['linkedin'];
$pin = $_POST['pin'];
$twitter = $_POST['twitter'];
$facebook = $_POST['facebook'];
$introduction = $_POST['intro'];
$status = $_POST['check'];

	// Logo For Company
$p_loc = __DIR__."/../../assets/companyImages/";
$lphoto = $p_loc.basename($_FILES['logo']['name']);
$imageFileType = strtolower(pathinfo($lphoto,PATHINFO_EXTENSION));
$logopath = "companyImages/".basename($_FILES['logo']['name']);
$deflogopath = $_POST['deflogo'];
	//////////////////////////////////////////////////////////////////////////

	// Slider Image 1 /////////////////////////////////////////////////////////////
$s_loc = __DIR__."/../../assets/companyImages/slider/";
$s1photo = $s_loc.basename($_FILES['image1']['name']);
$imageFileType1 = strtolower(pathinfo($s1photo,PATHINFO_EXTENSION));
$s1path = "companyImages/slider/".basename($_FILES['image1']['name']);
$defs1path = $_POST['defimage1'];
	/////////////////////////////////////////////////////////////////////////////

	// Slider Image 2 /////////////////////////////////////////////////////////////
$s2photo = $s_loc.basename($_FILES['image2']['name']);
$imageFileType2 = strtolower(pathinfo($s2photo,PATHINFO_EXTENSION));
$s2path = "companyImages/slider/".basename($_FILES['image2']['name']);
$defs2path = $_POST['defimage2'];
	/////////////////////////////////////////////////////////////////////////////

	// Slider Image 3 /////////////////////////////////////////////////////////////
$s3photo = $s_loc.basename($_FILES['image3']['name']);
$imageFileType3 = strtolower(pathinfo($s3photo,PATHINFO_EXTENSION));
$s3path = "companyImages/slider/".basename($_FILES['image3']['name']);
$defs3path = $_POST['defimage3'];
	/////////////////////////////////////////////////////////////////////////////
		// echo "outside";
if($status !== '0'){
	if (!empty($name) && !empty($phone) && !empty($email)) {

		if(mysqli_connect_error()){
			die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
		}else{

			$query1 = "update employee set ename='$name',description='$description',email='$email',phone='$phone',address='$address',field='$field',introduction='$introduction',vision='$vision',mission='$mission',image='$deflogopath',photo2='$defs1path',photo3='$defs2path',photo4='$defs3path',pin='$pin',linkedin='$linkedin',facebook='$facebook',twitter='$twitter' where id = '$id' ";
			$run_query = mysqli_query($connection , $query1);
			if($run_query){
				echo "<script>alert ('Company Profile Updated!')</script>";
				echo "<script>window.open('../../html/comp_table.php','_self')</script>";
			}
			else{
				echo "<script>alert ('Oops! Something Went Wrong.. Contact Help!')</script>";
				echo "<script>window.open('../../html/help.php','_self')</script>";
			}

		}

	}else{

		echo "<script>alert ('Oops! Something Went Wrong.. Contact Help!')</script>";
		echo "<script>window.open('../../html/help.php','_self')</script>";
	}
}
else{
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "JPEG"&& $imageFileType != "PNG" && $imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif" && $imageFileType1 != "JPG" && $imageFileType1 != "JPEG"&& $imageFileType1 != "PNG" && $imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg" && $imageFileType2 != "gif" && $imageFileType2 != "JPG" && $imageFileType2 != "JPEG"&& $imageFileType2 != "PNG" && $imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg" && $imageFileType3 != "gif" && $imageFileType3 != "JPG" && $imageFileType3 != "JPEG"&& $imageFileType3 != "PNG") {

		echo "<script>alert ('Sorry, only JPG, JPEG, PNG & GIF files are allowed. Select Again!')</script>";
		echo "<script>window.open('../../html/company_edit.php?edit=$id','_self')</script>";

	}else{

		if (move_uploaded_file($_FILES["logo"]["tmp_name"], $lphoto) && move_uploaded_file($_FILES["image1"]["tmp_name"], $s1photo) && move_uploaded_file($_FILES["image2"]["tmp_name"], $s2photo) && move_uploaded_file($_FILES["image3"]["tmp_name"], $s3photo)) {

			if (!empty($name) && !empty($phone) && !empty($email)) {

				if(mysqli_connect_error()){
					die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
				}else{

					$query1 = "update employee set ename='$name',description='$description',email='$email',phone='$phone',address='$address',field='$field',introduction='$introduction',vision='$vision',mission='$mission',image='$logopath',photo2='$s1path',photo3='$s2path',photo4='$s3path',pin='$pin',linkedin='$linkedin',facebook='$facebook',twitter='$twitter' where id = '$id' ";
					$run_query = mysqli_query($connection , $query1);
					if($run_query){
						echo "<script>alert ('Company Profile Updated!')</script>";
						echo "<script>window.open('../../html/comp_table.php','_self')</script>";
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
	}
}
?>