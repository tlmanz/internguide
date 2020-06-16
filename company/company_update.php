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
$mainfield = $_POST['mainfield'];
$linkedin = $_POST['linkedin'];
$pin = $_POST['pin'];
$twitter = $_POST['twitter'];
$facebook = $_POST['facebook'];
$introduction = $_POST['intro'];
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
	echo "<script>window.open('company_edit.php?edit=$id','_self')</script>";
}
else{
	if (!empty($name) && !empty($phone) && !empty($email)) {

		if(mysqli_connect_error()){
			die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
		}else{
			$statement = $connection->prepare('UPDATE employee SET ename=?, description=?,email=?,phone=?,address=?,mainfield=?,field=?,introduction=?,vision=?,mission=?,pin=?,linkedin=?,facebook=?,twitter=? WHERE id=?');

			$statement->bind_param('sssssssssssssss',$name,$description,$email,$phone,$address,$mainfield,$field,$introduction,$vision,$mission,$pin,$linkedin,$facebook,$twitter,$id);


			if($statement->execute()){
				echo "<script>alert ('Profile Updated Successfully!')</script>";
				$statement->close();
				$connection->close();
				echo "<script>window.open('company_new.php','_self')</script>";
			}
			else{
				echo "<script>alert ('Oops! Something Went Wrong.. Contact Help!')</script>";
				echo "<script>window.open('../../html/help.php','_self')</script>";
			}

		}

	}
}
?>