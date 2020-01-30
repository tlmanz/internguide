<?php
    require_once (__DIR__.'/../../../config/connect.php');
    
	$firstname = $_POST['firstname'];
	echo $firstname;
	$pass = $_POST['password'];
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

	$password = password_hash($pass, PASSWORD_DEFAULT);
	
	$p_loc = __DIR__."/../../assets/userImages/";
	$cphoto = $p_loc.basename($_FILES['profile']['name']);
	$imageFileType = strtolower(pathinfo($cphoto,PATHINFO_EXTENSION));
	$imagepath = "userImages/".basename($_FILES['profile']['name']);

	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG"&& $imageFileType != "JPEG"&& $imageFileType != "PNG") {
   		
   		 echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    	
	}else{

		if (move_uploaded_file($_FILES["profile"]["tmp_name"], $cphoto)) {

       		 if (!empty($firstname) && !empty($lastname) && !empty($address) && !empty($phone) && !empty($email) && !empty($password)) {

		if(mysqli_connect_error()){
			die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
		}else{

		$INSERT = "INSERT INTO customer_account(username,firstname,lastname,nic,gender,field,address,telephone,email,password,linkedin,web,description1,cphoto,gpa) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";


		$stmt = $connection->prepare($INSERT);

		$stmt->bind_param("ssssssssssssssd",$username,$firstname,$lastname,$nic,$gender,$field,$address,$phone,$email,$password,$linkedin,$web,	$desc1,$imagepath,$gpa);

		$stmt->execute();
				
			//redirect to admin page 
			header("Location:../../html/stu_table.php");
			$stmt->close();
			$connection->close();

		}

	}else{

		echo "All field are required";
		die();
	}
   	 }
	}

?>