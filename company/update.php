<?php
require_once ('../company/connect.php');
$id_student =trim($_GET['id_student']);
$id_company = trim($_GET['id_company']);

$sql1 = "SELECT * FROM employee WHERE id= '$id_company'"; 
$sql2 = "SELECT * FROM customer_account WHERE cid= '$id_student'";

$student_set = mysqli_query($connection,$sql1);
$student_set_list=mysqli_fetch_array($student_set);
$student_list = $student_set_list['student'];


$student_name_set = mysqli_query($connection,$sql2);
$student_name_list=mysqli_fetch_array($student_name_set);
$student_name = trim($student_name_list['username']);

$username = $student_set_list['student'];      
$username = (explode(",",$username)); 
$count = 0;
foreach ($username as $val){
if(trim($val) != $student_name){
   $count = $count +1;
}
}

if($count == count($username)){
      $student_list = $student_name.",".$student_list;
      $update="UPDATE employee SET student='$student_list' WHERE id='$id_company'";
      $run_querry=mysqli_query($connection, $update);
      echo "<script>alert ('You have registered sucssesfully!')</script>";
      echo "<script>window.open('../users/companyshow.php','_self')</script>";
}
else{
   echo "<script>alert ('You have already registered!')</script>";
   echo "<script>window.open('../users/companyshow.php','_self')</script>";
}
?>
