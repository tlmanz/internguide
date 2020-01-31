<?
require once "../admin/config/connect.php";
session_start();

$c_name = $_SESSION("cid");       //company user name
$user = $_GET["user"];
$query = "INSERT INTO customer_account VALUES reqcompany=$c_name WHERE user=$user ";
$run_querry = mysqli_querry($connection,$query);

?>
