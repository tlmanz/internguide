<?php
require_once "connect.php";
$id_student =trim($_GET['id_student']);
$id_company = trim($_GET['id_company']);

$sql1 = "SELECT * FROM employee WHERE id= '$id_company'"; 
$sql2 = "SELECT * FROM customer_account WHERE cid= '$id_student'";

$student_set = mysqli_query($connection,$sql1);
$student_set_list=mysqli_fetch_array($student_set);
$student_list = $student_set_list['student']


$student_name_set = mysqli_query($connection,$sql2);
$student_name_list=mysqli_fetch_object($student_name_set);
$student_name = $student_name_list['username'];

$student_list = $student_name.",".$student_list;
array_push($student_list,$student_name);

$update="UPDATE employee SET student='$student_list' WHERE id='$id_company'";
$run_querry=mysqli_query($connection, $update);
?>
