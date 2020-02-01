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

	// Slider Image 1 ////////////////////////////////////////////////////////////

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "JPEG"&& $imageFileType != "PNG") {

	echo "<script>alert ('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
	echo "<script>window.open('../../html/company_add.php','_self')</script>";

}else{

	if (move_uploaded_file($_FILES["logo"]["tmp_name"], $lphoto)) {

		if (!empty($username) && !empty($name) && !empty($phone) && !empty($email) && !empty($password)) {

			if(mysqli_connect_error()){
				die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
			}else{

				$INSERT = "INSERT INTO employee(username,ename,password,description,email,phone,address,field,introduction,vision,mission,image,pin,linkedin,facebook,twitter) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";


				$stmt = $connection->prepare($INSERT);

				$stmt->bind_param("ssssssssssssssss",$username,$name,$password,$description,$email,$phone,$address,$field,$introduction,$vision,$mission,$logopath,$pin,$linkedin,$facebook,$twitter);

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