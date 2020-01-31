<?php
// Include config file
require_once ('connect.php');
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || !isset($_SESSION["usertype"]) || $_SESSION["usertype"] !== 'company'){
    header("location: company_login.php");
    exit;
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="UTF-8">
	<meta name="keywords" content="resume, civic, onepage, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,600,600i,700" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/magnific-popup.css"/>
	<link rel="stylesheet" href="css/style.css"/>
    <script src="https://kit.fontawesome.com/6d41dc11d3.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title></title>
    <!-- Custom CSS -->
    <link href="assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
</head>

<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <?php
            $s_id =  $_SESSION['id'];
            $get_admin = "select * from employee where id ='$s_id'";
            $run_edit_admin = mysqli_query($connection,$get_admin);
            $row = mysqli_fetch_array($run_edit_admin);
			$name = $row['ename'];
			$id = $row['id'];
			$email = $row['email'];
			$phone = $row['phone'];
			$description = $row['description'];
			$phone = $row['address'];
			$introduction = $row['introduction'];
			$vision = $row['vision'];
			$mission = $row['mission'];
			$photo1 = $row['image'];
			$loc1 = "../company/src/assets/".$photo1;
			$photo2 = $row['photo2'];
			$loc2 = "../company/src/assets/".$photo2;  
			$photo3 = $row['photo3'];
			$loc3 = "../company/src/assets/".$photo3; 
			$photo4 = $row['photo4'];
            $loc4 = "../company/src/assets/".$photo4;
            $photo5 = $row['photo5'];
            $loc5 = "../company/src/assets/".$photo5; 
            $photo6 = $row['photo6'];
            $loc6 = "../company/src/assets/".$photo6; 
            $photo7 = $row['photo7'];
            $loc7 = "../company/src/assets/".$photo7;  
            $field = $row['field'];      
            $areas = (explode(",",$field));                         
        ?>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="index.html">
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                            </b>
                            <span class="logo-text">
                                InternGuid
                            </span>
                        </a>
                    </div>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                            <h1 style="font-size:120%; "selected><?php
                                        date_default_timezone_set('Asia/Colombo');
                                        $mydate=getdate(date("U"));
                                        echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
                                    ?></h1>
                        <li class="nav-item dropdown">
                           
                        </li>
                        <li class="nav-item d-none d-md-block">
                            
                        </li>
                    </ul>
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="<?php echo $loc1 ?>"  style="max-height:500px; max-width : 100px" alt="user" class="rounded-circle"
                                    width="40">
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                                        class="text-dark"><?php echo $row['ename'] ?></span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="company_edit.php"><i data-feather="settings"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="php/logout.php"><i data-feather="power"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link" href="studentlist.php"
                                aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
                                    class="hide-menu">View Student List</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link" href="studentsearch.php"
                                aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
                                    class="hide-menu">Search Students
                                </span></a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="container-fluid">
            <!-- *************************************************************** -->
            <!-- Start First Cards -->
            <!-- *************************************************************** -->
            <?php
                            $edit_id = $_SESSION['id'];
                            $get_student = "select * from employee where id='$edit_id'";
                            $run_edit_student = mysqli_query($connection , $get_student);
                            $row_emp = mysqli_fetch_array($run_edit_student);
                            $id = $row_emp['id'];
                            $firstname = $row_emp['ename'];
                            $username = $row_emp['username'];
                            $field = $row_emp['field'];
                            $address = $row_emp['address'];
                            $phone = $row_emp['phone'];
                            $email = $row_emp['email'];
                            $intro = $row_emp['introduction'];
                            $desc1 = $row_emp['description'];
                            $pinterest = $row_emp['pin'];
                            $linkedin = $row_emp['linkedin'];
                            $facebook = $row_emp['facebook'];
                            $twitter = $row_emp['twitter'];
                            $created = $row_emp['created_at'];
                            $vision = $row_emp['vision'];
                            $mission = $row_emp['mission'];
                            $photo1 = $row_emp['image'];
                            $p_loc = "../company/src/assets/".$photo1;
                            $photo2 = $row_emp['photo2'];
                            $p1_loc = "../company/src/assets/".$photo2;  
                            $photo3 = $row_emp['photo3'];
                            $p2_loc = "../company/src/assets/".$photo3; 
                            $photo4 = $row_emp['photo4'];
                            $p3_loc = "../company/src/assets/".$photo4;
                            $photo5 = $row_emp['photo5'];
                            $p4_loc = "../company/src/assets/".$photo5; 
                            $photo6 = $row_emp['photo6'];
                            $p5_loc = "../company/src/assets/".$photo6; 
                            $photo7 = $row_emp['photo7'];
                            $p6_loc = "../company/src/assets/".$photo7;
                        
                        ?>
                        <div class="row">
                            <div style='margin-left: auto; margin-right: auto;'class="col-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="card-title">Company Details</h2>
                                        <div class= 'text-center'>
                                            <img src='<?php echo $p_loc ?>' alt='image' class='rounded-circle' height='150'
                                            width="150">
                                            <br><br>
                                            <h3>Logo</h3>
                                            <div style='margin-left: auto; margin-right: auto;' class="col-sm-5 col-md-7">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <form action='company_image_update.php' method='post' enctype='multipart/form-data'>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <button class="btn btn-outline-secondary" type="submit">Update Logo</button>
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input type="file" name='logo' class="custom-file-input" id="inputGroupFile03">
                                                                    <input type="hidden" name='id' value='<?php echo $id ?>'>
                                                                    <input type="hidden" name='username' value='<?php echo $username?>'>
                                                                    <label class="custom-file-label" for="inputGroupFile03"></label>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div style="text-align: center;">
                                            <form action='company_edit.php' method='post' enctype='multipart/form-data'>
                                                <div class="form-body">
                                                    <div class="form-group row">
                                                        <label class="col-md-2"></label>
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    <div class="form-group">
                                                                        <label class="col-md-3">ID</label>
                                                                        <input type="text" class="form-control text-center"
                                                                        placeholder="First Name" value='<?php echo $id ?>' name='id' readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <div class="form-group">
                                                                        <label class="col-md-6">Username</label>
                                                                        <input type="text" class="form-control text-center"
                                                                        placeholder="Username" value='<?php echo $username?>' readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-2"></label>
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    <div class="form-group">
                                                                        <label class="col-md-8">Company Name</label>
                                                                        <input type="text" class="form-control text-center"
                                                                        placeholder="Company Name" value='<?php echo $firstname ?>' name="name" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <div class="form-group">
                                                                        <label class="col-md-8">Contact Number</label>
                                                                        <input type="text" class="form-control text-center"
                                                                        placeholder="07xxxxxxxx" value='<?php echo $phone?>' name='phone' required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-2"></label>
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    <div class="form-group">
                                                                        <label class="col-md-8">Email</label>
                                                                        <input type="text" class="form-control text-center"
                                                                        placeholder="Company Name" value='<?php echo $email ?>' name="email" required>
                                                                        <input type="hidden" name='oldemail' value='<?php echo $email?>'>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <div class="form-group">
                                                                        <label class="col-md-6">Password</label>
                                                                        <a href='password_reset_company.php?edit=<?php echo $id ?>' class="form-control text-center">
                                                                            Click To Reset Password
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-2">Introduction</label>
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    <div class="form-group">
                                                                        <textarea class="form-control" rows="3" placeholder="Introduction" name='intro' required><?php echo $intro ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-2">Address</label>
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    <div class="form-group">
                                                                        <textarea type='text' class="form-control" rows="3" placeholder="Address..." name='address' required><?php echo $address ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-2">Vision</label>
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    <div class="form-group">
                                                                        <textarea type='text'  class="form-control" rows="3" placeholder="Vision" name='vision' required><?php echo $vision ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-2">Mission</label>
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    <div class="form-group">
                                                                        <textarea type='text' class="form-control" rows="3" placeholder="Mission" name='mission' required><?php echo $mission ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-2">Description</label>
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    <div class="form-group">
                                                                        <textarea type='text' class="form-control" rows="3" placeholder="Description"  name='description' required><?php echo $desc1 ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-2">Field of Study</label>
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    <div class="form-group mb-4">
                                                                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="field">
                                                                            <option type='text' value="Electronic and Telecommunication" >Electronic and Telecommunication Engineering</option>
                                                                            <option type='text' value="Computer Science and Engineering">Computer Science and Engineering</option>
                                                                            <option type='text' value="Civil Engineering">Bio Medical Engineering</option>
                                                                            <option type='text' value="Civil Engineering">Civil Engineering</option>
                                                                            <option type='text' value="Electrical Engineering">Electrical Engineering</option>
                                                                            <option type='text' value="Mechanical Engineering">Mechanical Engineering</option>
                                                                            <option type='text' value="Chemical and Process Engineering">Chemical and Process Engineering</option>
                                                                            <option type='text' value="Material Engineering">Material Engineering</option>
                                                                            <option type='text' value="Textile Engineering">Textile Engineering</option>
                                                                            <option type='text' value="Earth Resource Engineering">Earth Resource Engineering</option>
                                                                            <option type='text' value="Architecture">Architecture</option>
                                                                            <option type='text' value="Business">Business</option>
                                                                            <option type='text' value="Information Technology">Information Technology</option>
                                                                            <option type='text' value="Other">Other</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-2">LinkedIn</label>
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    <div class="form-group">
                                                                        <input type="tel" class="form-control"
                                                                        placeholder="URL.." value="<?php echo $linkedin ?>" name='linkedin'>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-2">Pinterest</label>
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    <div class="form-group">
                                                                        <input type="tel" class="form-control"
                                                                        placeholder="URL.." value="<?php echo $pinterest ?>" name='pin'>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-2">Twitter</label>
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    <div class="form-group">
                                                                        <input type="tel" class="form-control"
                                                                        placeholder="URL.." value="<?php echo $twitter ?>" name='twitter'>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-2">Facebook</label>
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    <div class="form-group">
                                                                        <input type="tel" class="form-control"
                                                                        placeholder="URL.." value="<?php echo $facebook ?>" name='facebook'>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input id='file-input' name='image1' type="file" class="custom-file-input" id="inputGroupFile04">
                                                            <label class="custom-file-label" for="inputGroupFile04">Choose Slide Image 1</label>
                                                        </div>
                                                        <input type='hidden' id='file-input' name='defimage1' value='<?php echo $p1_loc?>'>
                                                    </div><br>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input id='file-input' name='image2' type="file" class="custom-file-input" id="inputGroupFile04">
                                                            <label class="custom-file-label" for="inputGroupFile04">Choose Slide Image 2</label>
                                                        </div>
                                                        <input type='hidden' id='file-input' name='defimage2' value='<?php echo $p2_loc?>' >
                                                    </div><br>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input id='file-input' name='image3' type="file" class="custom-file-input" id="inputGroupFile04">
                                                            <label class="custom-file-label" for="inputGroupFile04">Choose Slide Image 3</label>
                                                        </div>
                                                        <input type='hidden' id='file-input' name='defimage3' value='<?php echo $p3_loc?>'>
                                                    </div><br>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input id='file-input' name='image4' type="file" class="custom-file-input" id="inputGroupFile04">
                                                            <label class="custom-file-label" for="inputGroupFile04">Choose Slide Image 4</label>
                                                        </div>
                                                        <input type='hidden' id='file-input' name='defimage4' value='<?php echo $p4_loc?>'>
                                                    </div><br>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input id='file-input' name='image5' type="file" class="custom-file-input" id="inputGroupFile04">
                                                            <label class="custom-file-label" for="inputGroupFile04">Choose Slide Image 5</label>
                                                        </div>
                                                        <input type='hidden' id='file-input' name='defimage5' value='<?php echo $p5_loc?>'>
                                                    </div><br>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input id='file-input' name='image6' type="file" class="custom-file-input" id="inputGroupFile04">
                                                            <label class="custom-file-label" for="inputGroupFile04">Choose Slide Image 6</label>
                                                        </div>
                                                        <input type='hidden' id='file-input' name='defimage6' value='<?php echo $p6_loc?>'>
                                                    </div><br>
                                                    <div style="font-size:100% ">
                                                        <fieldset class="checkbox">
                                                            <label>
                                                                <input type='hidden' value='0' name='check'>
                                                                <input style='transform: scale(1.5);' type="checkbox" name='check' value="1" >&nbsp &nbsp &nbsp Tick This to Update without Images
                                                            </label>
                                                        </fieldset>
                                                    </div>
                                                    <div class = 'footer'>
                                                        <div style='text-align: center;'>
                                                            <a href = 'company_new.php' >
                                                                <button type='' class="btn btn-rounded btn-success"><i class='fa fa-arrow-left'></i>&nbspBack</button>
                                                            </a>
                                                            &nbsp &nbsp
                                                            <button type ='submit' class="btn btn-rounded btn-info"><i class='fa fa-sync-alt'></i>&nbspUpdate</button>
                                                            &nbsp &nbsp
                                                            <button type="reset" class="btn btn-rounded btn-danger"><i class='fa fa-ban'></i>&nbspReset</button>
                                                        </div>
                                                    </div>
                                                </form> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    </div>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="dist/js/app-style-switcher.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="assets/extra-libs/c3/d3.min.js"></script>
    <script src="assets/extra-libs/c3/c3.min.js"></script>
    <script src="assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="dist/js/pages/dashboards/dashboard1.min.js"></script>
    
</body>

</html>