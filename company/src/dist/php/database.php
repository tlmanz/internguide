<?php 
require_once (__DIR__.'/../../../config/connect.php');
$sql = "select * from customer_account";
$stu =0;
$run_edit_admin = mysqli_query($connection , $sql);
while($row_admin = mysqli_fetch_array($run_edit_admin))
{
  $stu = $stu+1;
}
$sql = "select * from employee";
$tot =0;
$run_edit_admin = mysqli_query($connection , $sql);
while($row_admin = mysqli_fetch_array($run_edit_admin))
{
  $tot = $tot+1;
}
$sql = "select * from admin";
$admin_count =0;
$run_edit_admin = mysqli_query($connection , $sql);
while($row_admin = mysqli_fetch_array($run_edit_admin))
{
  $admin_count = $admin_count+1;
}
?>