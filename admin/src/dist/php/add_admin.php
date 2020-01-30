<?php
    require_once (__DIR__.'/../../../config/connect.php');
    
	$firstname = $_POST['firstname'];
	$pass = $_POST['password'];
	$username = $_POST['username'];
	$lastname = $_POST['lastname'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];

	$password = password_hash($pass, PASSWORD_DEFAULT);
	
	$p_loc = __DIR__."/../../assets/adminImages/";
	$aphoto = $p_loc.basename($_FILES['profile']['name']);
	$imageFileType = strtolower(pathinfo($aphoto,PATHINFO_EXTENSION));
	$imagepath = "adminImages/".basename($_FILES['profile']['name']);

	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG"&& $imageFileType != "JPEG"&& $imageFileType != "PNG") {
   		
   		 echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    	
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
			header("Location:../../html/admin_table.php");
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