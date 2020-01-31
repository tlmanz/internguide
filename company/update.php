<?php
require_once "connect.php";
$id_student =$_GET['id_student'];
$id_company = $_GET['id_company'];
$sql1 = "SELECT student from employee where id='".$id_company."'"; 
$sql2 = "SELECT username from customer_account where id='".$id_student."'";
$student_set = mysqli_query($connection,$sql1);
$student_name_set = mysqli_query($connection,$sql2);
$student_list=mysqli_fetch_object($student_set);
$student_name=mysqli_fetch_object($student_name_set);
$student_list = $student_name.",".$student_list;
$update="UPDATE employee SET student='".$student_list."'";
mysqli_query($connect, $update);
?>
