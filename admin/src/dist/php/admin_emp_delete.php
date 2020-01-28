<?php
    	require_once ('../config/connect.php'); 

		if (isset($_GET['del'])) {
			
			$del_id = $_GET['del'];

			$del_item = "delete from employee where id = $del_id";
			$run_del_item = mysqli_query($connection , $del_item);

			if ($run_del_item) {
				
				echo "<script>alert ('Employee removed from stock successfully!')</script>";
				echo "<script>window.open('../del_employee.php','_self')</script>";

			}
		}

?>