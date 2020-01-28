<?php
session_start();
include_once 'config.php';
$username = $_SESSION["username"];
$sql = "SELECT * from users WHERE username='$username';";
$result = mysqli_query($link, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
}
// $id = $_SESSION['id'];
// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];

        // $fileExt = explode('.',$fileName);
        // $fileActualExt = strtolower(end($fileExt));
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

        //$fileNameNew = uniqid('',true).".".$filetype;
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            $filenameNew = "profile-".$id.".".$ext;
            move_uploaded_file($_FILES["photo"]["tmp_name"], "C:\wamp64\www\Shakya\uploads\ " . $filenameNew);
            $sql = "UPDATE profileimg SET status=0, filename='$filenameNew' WHERE userid='$id';";
            $result = mysqli_query($link,$sql);
            header("Location: view-profile.php");
             
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }
}
?>