<?php

require_once "config.php";
session_start();

$user = $_SESSION['username'];
$sql = "SELECT * from userprofile WHERE user = '$user';";
if ($result = mysqli_query($link, $sql)) {
    $profileData = mysqli_fetch_assoc($result);
}
if (($_SERVER['REQUEST_METHOD'] == "POST")) {

    $fieldList = implode(',', $_POST['field']);
    // $fieldList = "";
    // foreach ($fields as $tem) {
    //     $fieldList .= $item . ",";
    // }
    $sqlProfileData = "UPDATE userprofile SET full_name='" . $_POST['fullname'] . "', gender='" . $_POST['gender'] . "',age='" . $_POST['age'] . "',address='" . $_POST['address'] . "',Fields='$fieldList' WHERE user='$user'";
    mysqli_query($link, $sqlProfileData);
    header("location:view-profile.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <form action="edit-profile.php?user=<?php echo $user ?>" method="POST">
        <label> Full Name: </label><br> <input type="text" name="fullname" value='<?php echo $profileData['full_name'] ?>'> <br>
        <label> Gender: </label><br> <input type="radio" name="gender" value="male" checked> Male <input type="radio" name="gender" value="female"> Female<br>
        <label> Age: </label><br> <input type="text" name="age" value='<?php echo $profileData['age'] ?>'><br>
        <label> Address: </label><br> <input type="text" name="address" value='<?php echo $profileData['address'] ?>'>
        <label> Interested Fields: </label><br>
        <input type="checkbox" name="field[]" value="Machine Learning " id="MachineLearning"> <label for="MachineLearning">Machine Learning</label>
        <input type="checkbox" name="field[]" value="Electronic Design " id="ElectronicDesign"> <label for="ElectronicDesign">Electronic Circuit design</label>
        <input type="checkbox" name="field[]" value="Programming " id="Programming"> <label for="Programming">Programming</label>
        <input type="checkbox" name="field[]" value="Networking " id="Networking"> <label for="Networking">Networking</label>
        <input type="submit" value="submit">
    </form>
</body>

</html>