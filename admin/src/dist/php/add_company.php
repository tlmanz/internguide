<?php
require_once (__DIR__.'/../../../config/connect.php');

$username = $_POST['username'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$pass = $_POST['password'];
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

$password = password_hash($pass, PASSWORD_DEFAULT);
	// Logo For Company
$p_loc = __DIR__."/../../assets/companyImages/";
$lphoto = $p_loc.basename($_FILES['logo']['name']);
$imageFileType = strtolower(pathinfo($lphoto,PATHINFO_EXTENSION));
$logopath = "companyImages/".basename($_FILES['logo']['name']);
	//////////////////////////////////////////////////////////////////////////

	// Slider Image 1 /////////////////////////////////////////////////////////////
$s_loc = __DIR__."/../../assets/companyImages/slider/";
$s1photo = $s_loc.basename($_FILES['image1']['name']);
$imageFileType1 = strtolower(pathinfo($s1photo,PATHINFO_EXTENSION));
$s1path = "companyImages/slider/".basename($_FILES['image1']['name']);
	/////////////////////////////////////////////////////////////////////////////

	// Slider Image 2 /////////////////////////////////////////////////////////////
$s2photo = $s_loc.basename($_FILES['image2']['name']);
$imageFileType2 = strtolower(pathinfo($s2photo,PATHINFO_EXTENSION));
$s2path = "companyImages/slider/".basename($_FILES['image2']['name']);
	/////////////////////////////////////////////////////////////////////////////

	// Slider Image 3 /////////////////////////////////////////////////////////////
$s3photo = $s_loc.basename($_FILES['image3']['name']);
$imageFileType3 = strtolower(pathinfo($s3photo,PATHINFO_EXTENSION));
$s3path = "companyImages/slider/".basename($_FILES['image3']['name']);
	/////////////////////////////////////////////////////////////////////////////

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "JPEG"&& $imageFileType != "PNG") {

	echo "<script>alert ('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
	echo "<script>window.open('../../html/company_add.php','_self')</script>";

}else{

	if (move_uploaded_file($_FILES["logo"]["tmp_name"], $lphoto) && move_uploaded_file($_FILES["image1"]["tmp_name"], $s1photo) && move_uploaded_file($_FILES["image2"]["tmp_name"], $s2photo) && move_uploaded_file($_FILES["image3"]["tmp_name"], $s3photo)) {

		if (!empty($username) && !empty($name) && !empty($phone) && !empty($email) && !empty($password)) {

			if(mysqli_connect_error()){
				die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
			}else{

				$INSERT = "INSERT INTO employee(username,ename,password,description,email,phone,address,field,introduction,vision,mission,image,photo2,photo3,photo4,pin,linkedin,facebook,twitter) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";


				$stmt = $connection->prepare($INSERT);

				$stmt->bind_param("sssssssssssssssssss",$username,$name,$password,$description,$email,$phone,$address,$field,$introduction,$vision,$mission,$logopath,$s1path,$s2path,$s3path,$pin,$linkedin,$facebook,$twitter);

				if($stmt->execute()){

					$stmt->close();
					$connection->close();
					echo "<script>alert ('Company Added Successfully!')</script>";
					echo "<script>window.open('../../html/comp_table.php','_self')</script>";
				}
				else{
					echo 'Fail';
				}

			}

		}else{

			echo "All field are required";
			die();
		}
	}
}

?>