<?php
require_once (__DIR__.'/../../../config/connect.php');

if (isset($_GET['edit']))
	$pw_table = $_GET['tab'];
	$pw_id = $_GET['edit'];

	$del_item = "delete from $pw_table where cid =$pw_id";
	$run_del_item = mysqli_query($connection , $del_item);

if ($run_del_item) {

	echo "<script>alert ('An User Removed from the database successfully!')</script>";
	echo "<script>window.open('../../html/.php','_self')</script>";

}

?>