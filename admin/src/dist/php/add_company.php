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
$temp = explode(".", $_FILES["logo"]["name"]);
$newfilename = round(microtime(true)) .$username.'logo'.'.' . end($temp);
$lphoto = $p_loc.$newfilename;
$imageFileType = strtolower(pathinfo($lphoto,PATHINFO_EXTENSION));
$logopath = "companyImages/".$newfilename;
	//////////////////////////////////////////////////////////////////////////

	// Slider Image 1 /////////////////////////////////////////////////////////////
$s_loc = __DIR__."/../../assets/companyImages/slider/";
$temp1 = explode(".", $_FILES["image1"]["name"]);
$newfilename1 = round(microtime(true)).$username .'slide1'.'.' . end($temp1);
$s1photo = $s_loc.$newfilename1;
$imageFileType1 = strtolower(pathinfo($s1photo,PATHINFO_EXTENSION));
$s1path = "companyImages/slider/".$newfilename1;
	/////////////////////////////////////////////////////////////////////////////

	// Slider Image 2 /////////////////////////////////////////////////////////////
$temp2 = explode(".", $_FILES["image2"]["name"]);
$newfilename2 = round(microtime(true)).$username .'slide2'.'.' . end($temp2);
$s2photo = $s_loc.$newfilename2;
$imageFileType2 = strtolower(pathinfo($s2photo,PATHINFO_EXTENSION));
$s2path = "companyImages/slider/".$newfilename2;
	/////////////////////////////////////////////////////////////////////////////

	// Slider Image 3 /////////////////////////////////////////////////////////////
$temp3 = explode(".", $_FILES["image3"]["name"]);
$newfilename3 = round(microtime(true)) .$username.'slide3'.'.' . end($temp3);
$s3photo = $s_loc.$newfilename3;
$imageFileType3 = strtolower(pathinfo($s3photo,PATHINFO_EXTENSION));
$s3path = "companyImages/slider/".$newfilename3;
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