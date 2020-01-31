    <?php
    require_once (__DIR__.'/../../config/connect.php');
    include_once('../dist/php/database.php');
    session_start();

    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || !isset($_SESSION["usertype"]) || $_SESSION["usertype"] !== 'admin'){
        header("location: admin_login.php");
        exit;
    }
    ?>
    <!DOCTYPE html>
    <html dir="ltr" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
        <link href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
        <title>Intern Guide - One Place for All Intern Needs</title>
        <!-- Custom CSS -->
        <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
        <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
        <link href="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
        <!-- Custom CSS -->
        <!-- <link href="../dist/css/style.min.css" rel="stylesheet"> -->
        <link href="../dist/css/style.css" rel="stylesheet">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin6">
        <nav class="navbar top-navbar navbar-expand-md">
            <div class="navbar-header" data-logobg="skin6">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                    class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="index.php">
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="../assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo text -->
                                <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                    data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                    class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                        <!-- Notification -->

                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link" href="javascript:void(0)">
                                <form>
                                    <div class="customize-input">
                                        <input class="form-control custom-shadow custom-radius border-0 bg-white"
                                        type="search" placeholder="Search" aria-label="Search">
                                        <i class="form-control-icon" data-feather="search"></i>
                                    </div>
                                </form>
                            </a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <?php
                        $get_admin = "select * from admin where id=".$_SESSION['id'];
                        $run_edit_admin = mysqli_query($connection , $get_admin);
                        $row_admin = mysqli_fetch_array($run_edit_admin);
                        $name = $row_admin['name'];
                        $photo = $row_admin['aphoto'];
                        $loc = "../assets/".$photo;                                    
                        ?>
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="<?php echo $loc ?>" alt="user" class="rounded-circle"
                            width="40">
                            <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                            class="text-dark"><?php echo $name ?></span> <i data-feather="chevron-down"
                            class="svg-icon"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                            <a class="dropdown-item" href="admin_show.php?edit=<?php echo $_SESSION['id'] ?>"><i data-feather="user"
                                class="svg-icon mr-2 ml-1"></i>
                            My Profile</a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../dist/php/logout.php"><i data-feather="power"
                                class="svg-icon mr-2 ml-1"></i>
                            Logout</a>

                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="index.php"
                        aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                        class="hide-menu">Dashboard</span></a></li>
                        <li class="list-divider"></li> 
                        <li class="nav-small-cap"><span class="hide-menu">User Management</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                            aria-expanded="false"><i class="fa fa-users-cog"></i><span
                            class="hide-menu">Administrators</span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="admin_admin.php" class="sidebar-link"><span
                                    class="hide-menu"> Admin Manager
                                </span></a>
                            </li>
                            <li class="sidebar-item"><a href="admin_table.php" class="sidebar-link"><span
                                class="hide-menu"> Admin List
                            </span></a>
                        </li>
                        <li class="sidebar-item"><a href="admin_add.php" class="sidebar-link"><span
                            class="hide-menu"> Add an Admin
                        </span></a>
                    </li>
                    <li class="sidebar-item"><a href="admin_remove.php" class="sidebar-link"><span
                        class="hide-menu"> Remove an Admin
                    </span></a>
                </li>
            </ul>
            <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                aria-expanded="false"><i class="fa fa-users"></i><span
                class="hide-menu">Students</span></a>
                <ul aria-expanded="false" class="collapse  first-level base-level-line">
                    <li class="sidebar-item"><a href="student_admin.php" class="sidebar-link"><span
                        class="hide-menu"> Student Manager
                    </span></a>
                </li>
                <li class="sidebar-item"><a href="stu_table.php" class="sidebar-link"><span
                    class="hide-menu"> Student List
                </span></a>
            </li>
            <li class="sidebar-item"><a href="student_add.php" class="sidebar-link"><span
                class="hide-menu"> Add a Student
            </span></a>
        </li>
        <li class="sidebar-item"><a href="student_remove.php" class="sidebar-link"><span
            class="hide-menu"> Remove a Student
        </span></a>
    </li>
</ul>
<li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
    aria-expanded="false"><i class="fa fa-city"></i><span
    class="hide-menu">Companies</span></a>
    <ul aria-expanded="false" class="collapse  first-level base-level-line">
        <li class="sidebar-item"><a href="company_admin.php" class="sidebar-link"><span
            class="hide-menu"> Company Manager
        </span></a>
    </li>
    <li class="sidebar-item"><a href="comp_table.php" class="sidebar-link"><span
        class="hide-menu"> Company List
    </span></a>
</li>
<li class="sidebar-item"><a href="company_add.php" class="sidebar-link"><span
    class="hide-menu"> Add a Company
</span></a>
</li>
<li class="sidebar-item"><a href="company_remove.php" class="sidebar-link"><span
    class="hide-menu"> Remove a Company
</span></a>
</li>
</ul>
</li>

<li class="list-divider"></li>
<li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="../dist/php/logout.php"
    aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span
    class="hide-menu">Logout</span></a></li>
</ul>
</nav>
<!-- End Sidebar navigation -->
</div>
<!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">
                    <?php
                    date_default_timezone_set('Asia/Colombo');
                    if(date("H") < 12){
                        echo "Good Morning";
                    }elseif(date("H") > 11 && date("H") < 18){
                        echo "Good Afternoon";
                    }elseif(date("H") > 17){
                        echo "Good Evening";
                    }
                    ?>
                    <?php echo $name ?>!</h3>
                </div>
                <div class="col-5 align-self-center">
                    <div class="customize-input float-right">
                        <h1 style="font-size:120%; "selected><?php
                        date_default_timezone_set('Asia/Colombo');
                        $mydate=getdate(date("U"));
                        echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
                        ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- *************************************************************** -->
            <!-- Start First Cards -->
            <!-- *************************************************************** -->
            <?php
            if(isset($_GET['edit'])){
                $edit_id = $_GET['edit'];
                $get_student = "select * from customer_account where cid='$edit_id'";
                $run_edit_student = mysqli_query($connection , $get_student);
                $row_emp = mysqli_fetch_array($run_edit_student);
                $id = $row_emp['cid'];
                $username = $row_emp['username'];
                $firstname = $row_emp['firstname'];
                $lastname = $row_emp['lastname'];
                $nic = $row_emp['nic'];
                $gender = $row_emp['gender'];
                $field = $row_emp['field'];
                $address = $row_emp['address'];
                $phone = $row_emp['telephone'];
                $email = $row_emp['email'];
                $gpa = $row_emp['gpa'];
                $linkedin = $row_emp['linkedin'];
                $web = $row_emp['web'];
                $desc1 = $row_emp['description1'];
                $photo = $row_emp['cphoto'];
                $cv = $row_emp['cv'];
                $created = $row_emp['created_at'];
                $dob = $row_emp['dob'];
                $age = $row_emp['age'];
                $p_loc = "../assets/".$photo;
            }
            ?>
            <div class="row">
                <div style='margin-left: auto; margin-right: auto;'class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Student Details</h2>
                            <div class= 'text-center'>
                                <img src='<?php echo $p_loc ?>' alt='image' class='rounded-circle' height='150'
                                width="150">
                                <br><br>
                                <h3>Profile Picture</h3>
                                <div style='margin-left: auto; margin-right: auto;' class="col-sm-5 col-md-7">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <form action='../dist/php/student_image_update.php' method='post' enctype='multipart/form-data'>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-outline-secondary" type="submit">Update Profile Image</button>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" name='profile' class="custom-file-input" id="inputGroupFile03">
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
                                <form action='../dist/php/student_update.php' method='post' enctype='multipart/form-data'>
                                    <div class="form-body">
                                        <div class="form-group row">
                                            <label class="col-md-2"></label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label class="col-md-3">ID</label>
                                                            <input type="text" class="form-control text-center"
                                                            placeholder="First Name" value='<?php echo $id ?>' name='cid' readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label class="col-md-6">Username</label>
                                                            <input type="text" class="form-control text-center"
                                                            placeholder="Username" name='username' value='<?php echo $username?>' readonly>
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
                                                            placeholder="Company Name" value='<?php echo $email ?>' name="email">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label class="col-md-6">Password</label>
                                                            <a href='password_reset_student.php?edit=<?php echo $id ?>' class="form-control text-center">
                                                                Click To Reset Password
                                                            </a>
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
                                                            <label class="col-md-8">Date of Birth</label>
                                                            <input type="date" class="form-control text-center" name='dob'
                                                            placeholder="Date of Birth" min='1980-01-01' max='2005-01-01' value='<?php echo $dob ?>' reqired>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label class="col-md-8">Age</label>
                                                            <input type="number" class="form-control text-center"
                                                            placeholder="Age" min='10' max='40' name='age' value='<?php echo $age?>' required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">Name</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <input id='text-input' type="text" class="form-control"
                                                            placeholder="First Name" name='firstname' value='<?php echo $firstname ?>' required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                            placeholder="Last Name" name='lastname' value='<?php echo $lastname?>' required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">NIC<br>Number</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <input id='text-input' type="text" class="form-control"
                                                            placeholder="xxxxxxxxxV" name='nic' value='<?php echo $nic ?>' required>
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
                                                            <textarea id='text-input' type='text' name='address' class="form-control" rows="3" placeholder="Address..." required><?php echo $address ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">Mobile Number</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input id='text-input' type="text" class="form-control"
                                                            placeholder="07xxxxxxxx" name='telephone' value='<?php echo $phone ?>' required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">Gender</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio1" name="gender"
                                                            class="custom-control-input" value="m" <?php if ($gender == "m") echo "checked"; ?>>
                                                            <label class="custom-control-label" for="customRadio1">Male&nbsp&nbsp&nbsp</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio2" name="gender"
                                                            class="custom-control-input" value = 'f' <?php if ($gender == "f") echo "checked"; ?>>
                                                            <label class="custom-control-label" for="customRadio2">Female&nbsp&nbsp&nbsp</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio3" name="gender"
                                                            class="custom-control-input" value = 'n' <?php if ($gender == "n") echo "checked"; ?>>
                                                            <label class="custom-control-label" for="customRadio3">N/A</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">Field of Study</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-4">
                                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="field">
                                                                <option type='text' value="Electronic and Telecommunication Engineering" <?php if($field=="Electronic and Telecommunication Engineering") echo 'selected="selected"'; ?>>Electronic and Telecommunication Engineering</option>
                                                                <option type='text' value="Computer Science and Engineering"<?php if($field=="Computer Science and Engineering") echo 'selected="selected"'; ?>>Computer Science and Engineering</option>
                                                                <option type='text' value="Civil Engineering"<?php if($field=="Civil Engineering") echo 'selected="selected"'; ?>>Civil Engineering</option>
                                                                <option type='text' value="Bio Medical Engineering" <?php if($field=="Bio Medical Engineering") echo 'selected="selected"'; ?>>Bio Medical Engineering</option>
                                                                <option type='text' value="Electrical Engineering"<?php if($field=="Electrical Engineering") echo 'selected="selected"'; ?>>Electrical Engineering</option>
                                                                <option type='text' value="Mechanical Engineering"<?php if($field=="Mechanical Engineering") echo 'selected="selected"'; ?>>Mechanical Engineering</option>
                                                                <option type='text' value="Chemical and Process Engineering" <?php if($field=="Chemical and Process Engineering") echo 'selected="selected"'; ?>>Chemical and Process Engineering</option>
                                                                <option type='text' value="Material Engineering"<?php if($field=="Material Engineering") echo 'selected="selected"'; ?>>Material Engineering</option>
                                                                <option type='text' value="Textile Engineering"<?php if($field=="Textile Engineering") echo 'selected="selected"'; ?>>Textile Engineering</option>
                                                                <option type='text' value="Earth Resource Engineering"<?php if($field=="Earth Resource Engineering") echo 'selected="selected"'; ?>>Earth Resource Engineering</option>
                                                                <option type='text' value="Architecture" <?php if($field=="Architecture") echo 'selected="selected"'; ?>>Architecture</option>
                                                                <option type='text' value="Business"<?php if($field=="Business") echo 'selected="selected"'; ?>>Business</option>
                                                                <option type='text' value="Information Technology"<?php if($field=="Information Technology") echo 'selected="selected"'; ?>>Information Technology</option>
                                                                <option type='text' value="Other"<?php if($field=="Other") echo 'selected="selected"'; ?>>Other</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">GPA <br>(Up to Day)</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input id='text-input' type="number" class="form-control" name="gpa"
                                                            placeholder="GPA" step='0.0001' min="0" max="4.2"value="<?php echo $gpa ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">LinkedIn <br>URL</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <input id='text-input' type='text' class="form-control" name="linkedin"
                                                            placeholder="URL.." value="<?php echo $linkedin ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">Blog or Web <br>(Personal)</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <input id='text-input' type='text' class="form-control" name="web"
                                                            placeholder="URL.." value="<?php echo $web ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">About</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <textarea id='text-input' type='text' class="form-control" name="description1" rows="3" placeholder="About..." required><?php echo $desc1 ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name='cv' id="inputGroupFile04">
                                                <label class="custom-file-label" for="inputGroupFile04">Choose PDF</label>
                                            </div>
                                            <input type="hidden" name='oldcv' value="<?php echo $cv ?>">
                                            <input type="hidden" name='oldemail' value="<?php echo $email ?>">
                                        </div>
                                        <br>
                                    </div>
                                </div>
                                <br>
                                <div class = 'footer'>
                                    <div style='text-align: center;'>
                                        <button type ='submit' class="btn btn-rounded btn-info"><i class='fa fa-sync-alt'></i>&nbspUpdate</button>
                                        &nbsp&nbsp
                                        <button type="reset" class="btn btn-rounded btn-danger"><i class='fa fa-ban'></i>&nbspReset</button>
                                    </div>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center text-muted">
            All Rights Reserved by Ward12. Designed and Developed by <a
            href="https://wrappixel.com">TeamX</a>.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- apps -->
<!-- apps -->
<script src="../dist/js/app-style-switcher.js"></script>
<script src="../dist/js/feather.min.js"></script>
<script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="../dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="../dist/js/custom.min.js"></script>
<!--This page JavaScript -->
<script src="../assets/extra-libs/c3/d3.min.js"></script>
<script src="../assets/extra-libs/c3/c3.min.js"></script>
<script src="../assets/libs/chartist/dist/chartist.min.js"></script>
<script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<script src="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
<script src="../assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
<script src="../dist/js/pages/dashboards/dashboard1.min.js"></script>
<script src="../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../dist/js/pages/datatable/datatable-basic.init.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</body>

</html>