<?php
require_once ('connect.php');

$id = trim($_GET['id']);
$uname = trim($_GET['uname']);

$get_admin = "select * from customer_account where cid =".$id;
$run_edit_admin = mysqli_query($connection , $get_admin);
$row_admin = mysqli_fetch_array($run_edit_admin);
$oldaccept = $row_admin['accept'];

//echo $oldaccept;
$accept = $oldaccept.','.$uname;
$uaccept = array_unique(explode(',',$accept));
$final = NULL;
foreach($uaccept as &$val){
	$final = $final.','.$val;
}
if (substr($final, 0,1) !== ','){
	$final = $final;
}
else{
	$final = substr($final, 1);
}
$query1 = "update customer_account set accept='$final' where cid ='$id' ";
$run_query = mysqli_query($connection , $query1);
if($run_query){
	echo "<script>alert ('Accepted Successfully!')</script>";
	echo "<script>window.open('studentsearch.php','_self')</script>";
}
else{
	echo "<script>alert ('Oops! Something Went Wrong.. Contact Help!')</script>";
	echo "<script>window.open('../../html/help.php','_self')</script>";
}


?>