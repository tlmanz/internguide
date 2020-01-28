<?php

require_once "config.php";
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: usr_login.php");
    exit;
}

$user = $_SESSION['username'];
$sql = "SELECT * from userprofile WHERE user = '$user';";
if ($result = mysqli_query($link, $sql)) {
    $profileData = mysqli_fetch_assoc($result);
    $userid = $profileData['user_id'];
    $sqlimg = "SELECT * from profileimg WHERE userid = '$userid'";
    if ($imgresult = mysqli_query($link, $sqlimg)) {
        $imgData = mysqli_fetch_assoc($imgresult);
        $fileName = $imgData['filename'];
        $status = $imgData['status'];
        if ($status == 0) {
            $imageAdd = "uploads/%20" . $fileName;
        } else {
            $imageAdd = "images/no-profile-picture.jpg";
        }
        // echo "<img src='$imageAdd'>";
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->

    <title>View Profile</title>
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic">
                    <h3 style="position: relative; top:-100px"><img src=<?php echo $imageAdd ?>></h3>

                    <form action="upload-manager.php" method="post" enctype="multipart/form-data">
                        <div>

                            <input type="file" name="photo">
                            <input type="submit" name="submit" value="Upload">
                            <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p>


                        </div>
                    </form>

                </div>

                <form class="login100-form validate-form">
                    <span class="login100-form-title">
                        Hi <?php echo $user ?>
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <label>Full name: </label> <?php echo $profileData['full_name'] ?><br>
                    </div>
                    <label>Gender: </label> <?php echo $profileData['gender'] ?><br>
                    <label>Age: </label> <?php echo $profileData['age'] ?><br>
                    <label>Address:</label> <?php echo $profileData['address'] ?><br>
                    <label>Fields:</label> <?php echo $profileData['Fields'] ?><br>

                    <div class="text-center p-t-136">
                        <a href="edit-profile.php" class="txt2"> Edit profile </a>
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </div>
                    <div class="text-center p-t-12">
                        <span class="txt1">
                            <a href="logout.php">Sign Out of Your Account</a>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>


    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
</body>

</html>