<?php
require_once (__DIR__.'/../../../config/connect.php');


if (isset($_GET['edit'])) {
	$del_table = $_GET['tab'];
	$del_id = $_GET['edit'];
	if ($del_table === 'admin'){
		$return = 'admin_remove.php';
	}
	else{
		$return = 'company_remove.php';
	}
	if($del_table === 'admin' && $del_id === '2'){
		echo "<script>alert ('Cant Remove Super Admin!')</script>";
		echo "<script>window.open('../../html/admin_remove.php','_self')</script>";
	}
	else{
		$del_item = "delete from $del_table where id =$del_id";
		$run_del_item = mysqli_query($connection , $del_item);

		if ($run_del_item) {
			echo "<script>alert ('An User Removed from the database successfully!')</script>";
			echo "<script>window.open('../../html/$return','_self')</script>";

		}
	}
}

?>