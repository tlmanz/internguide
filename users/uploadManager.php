<?php
require_once "../admin/config/connect.php";

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
$statusImg = $_POST['checkImage'];
$statusCV = $_POST['checkCV'];
//$cv = $_POST['cv'];

$p_loc = "../admin/src/assets/userImages/";
$temp = explode(".", $_FILES["profile"]["name"]);
$newfilename = round(microtime(true)) .$cid. '.' . end($temp);
$cphoto = $p_loc.$newfilename;
$imageFileType = strtolower(pathinfo($cphoto,PATHINFO_EXTENSION));
$imagepath = "userImages/".$newfilename;
$defImagepath = $_POST['preImg'];

//cv
$cv_loc = "../admin/src/assets/studentCV/";
$temp1 = explode(".", $_FILES["cv"]["name"]);
$newCVname = round(microtime(true)) .$cid. '.' . end($temp1);
$cv = $cv_loc.$newCVname;
$CVFileType = strtolower(pathinfo($cv,PATHINFO_EXTENSION));
$CVpath = "studentCV/".$newCVname;
$defCVpath = $_POST['preCV'];

		// echo "outside";
if(($statusImg !== '0') && ($statusCV !== '0')){
	$query1 = "update customer_account set firstname='$firstname',lastname='$lastname', nic = '$nic', gender = '$gender', field = '$field', address='$address',telephone='$phone',email='$email', gpa = '$gpa', linkedin = '$linkedin', web = '$web', description1 = '$desc1' where cid = '$cid' ";
	$run_query = mysqli_query($connection , $query1);
	if($run_query){
		echo "<script>alert ('Profile Updated Successfully Without Updating Profile Picture and Your CV!')</script>";
		//echo "<script>window.open('../../html/student_show.php?edit=$cid','_self')</script>";
	}
}
elseif (($statusImg == '0') && ($statusCV == '0')){

	if(($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "JPEG"&& $imageFileType != "PNG") && ($CVFileType != "pdf")){
		echo "<script>alert ('Sorry, only JPG, JPEG, PNG & GIF & pdf files are allowed. Select Again!')</script>";
		echo "<script>window.open('../../html/student_edit.php?edit=$cid','_self')</script>";
	}
	else{
		if ((move_uploaded_file($_FILES["profile"]["tmp_name"], $cphoto)) && (move_uploaded_file($_FILES["cv"]["tmp_name"], $cv))) {
		// echo "insert";

			$query1 = "update customer_account set firstname='$firstname',lastname='$lastname', nic = '$nic', gender = '$gender', field = '$field', address='$address',telephone='$phone',email='$email', gpa = '$gpa', linkedin = '$linkedin', web = '$web', description1 = '$desc1', cphoto = '$imagepath', cv = '$cv' where cid = '$cid' ";
			$run_query = mysqli_query($connection , $query1);
			if($run_query){
				echo "<script>alert ('Profile Updated Successfully!')</script>";
				echo "<script>window.open('../../html/student_show.php?edit=$cid','_self')</script>";
			}
			else{
				echo "<script>alert ('Oops! Something Went Wrong1.. Contact Help!')</script>";
				echo "<script>window.open('../../html/help.php','_self')</script>";
			}
		}
		else{
			echo "<script>alert ('Oops! Something Went Wrong2.. Contact Help!')</script>";
			//echo "<script>window.open('../../html/help.php','_self')</script>";
		}
    }
}
elseif (($statusImg == '0') && ($statusCV != '0')){

	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "JPEG"&& $imageFileType != "PNG"){
		echo "<script>alert ('Sorry, only JPG, JPEG, PNG & GIF files are allowed. Select Again!')</script>";
		echo "<script>window.open('../../html/student_edit.php?edit=$cid','_self')</script>";
	}
	else{
		if (move_uploaded_file($_FILES["profile"]["tmp_name"], $cphoto)) {
		// echo "insert";

			$query1 = "update customer_account set firstname='$firstname',lastname='$lastname', nic = '$nic', gender = '$gender', field = '$field', address='$address',telephone='$phone',email='$email', gpa = '$gpa', linkedin = '$linkedin', web = '$web', description1 = '$desc1', cphoto = '$imagepath', cv='$defCVpath' where cid = '$cid' ";
			$run_query = mysqli_query($connection , $query1);
			if($run_query){
				echo "<script>alert ('Profile Updated Successfully!')</script>";
				echo "<script>window.open('../../html/student_show.php?edit=$cid','_self')</script>";
			}
			else{
				echo "<script>alert ('Oops! Something Went Wrong3.. Contact Help!')</script>";
				//echo "<script>window.open('../../html/help.php','_self')</script>";
			}
		}
		else{
			echo "<script>alert ('Oops! Something Went Wrong4.. Contact Help!')</script>";
			//echo "<script>window.open('../../html/help.php','_self')</script>";
		}
    }
}
elseif (($statusImg != '0') && ($statusCV == '0')){

	if($CVFileType != "pdf"){
		echo "<script>alert ('Sorry, pdf files are allowed. Select Again!')</script>";
		echo "<script>window.open('../../html/student_edit.php?edit=$cid','_self')</script>";
	}
	else{
		if (move_uploaded_file($_FILES["cv"]["tmp_name"], $cv)){
		// echo "insert";

			$query1 = "update customer_account set firstname='$firstname',lastname='$lastname', nic = '$nic', gender = '$gender', field = '$field', address='$address',telephone='$phone',email='$email', gpa = '$gpa', linkedin = '$linkedin', web = '$web', description1 = '$desc1', cv = '$cv',cphoto = '$defImagepath' where cid = '$cid' ";
			$run_query = mysqli_query($connection , $query1);
			if($run_query){
				echo "<script>alert ('pdf uploaded Successfully!')</script>";
				echo "<script>window.open('../../html/student_show.php?edit=$cid','_self')</script>";
			}
			else{
				echo "<script>alert ('Oops! Something Went Wrong5.. Contact Help!')</script>";
				echo "<script>window.open('../../html/help.php','_self')</script>";
			}
		}
		else{
			echo "<script>alert ('Oops! Something Went Wrong6.. Contact Help!')</script>";
			echo "<script>window.open('../../html/help.php','_self')</script>";
		}
    }
}

		
	



?>