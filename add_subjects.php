<?php
require_once "database/functions.php";

session_start();
$id = $_SESSION['id'];
$img_url = queryresult($conn, "select image_url from  security where security_id='$id'", 'image_url');
$user_name = queryresult($conn, "select user_name from  security where security_id='$id'", 'user_name');

$msg = "";
$style =  "";
if (isset($_POST['saveSubject'])) {
    $subject = $_POST['subject'];
    if ($subject != "") {
        $qryInsert = mysqli_query($conn, "INSERT INTO subjects (subject, status) VALUES ('$subject', '1')") or die(mysqli_error());
        $msg = "Subject Added Successfully";
        $style = "color:green;";
    } else {
        $msg = "Please Enter Subject";
        $style = "color:red;";
    }
}

if (isset($_POST['hid_delete_id'])) {
    $delete_id = $_POST['hid_delete_id'];
    $qryDelete = mysqli_query($conn, "UPDATE subjects SET status='0' WHERE subject_id='$delete_id'") or die(mysqli_error());
    $msg = "Subject Deleted Successfully";
    $style = "color:red;";
}

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">


<!-- Mirrored from themedesigner.in/demo/adminbite/html/ltr/ticket-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Feb 2020 05:05:50 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <title> ChatBOT Admin</title>
    <!-- This page css -->
    <link href="../../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style type="text/css">
        .input-focus {
            border-color: #4798e8;
        }
        #main-wrapper[data-layout=vertical] .left-sidebar[data-sidebarbg=skin5], #main-wrapper[data-layout=vertical] .left-sidebar[data-sidebarbg=skin5] ul, #main-wrapper[data-layout=horizontal] .left-sidebar[data-sidebarbg=skin5], #main-wrapper[data-layout=horizontal] .left-sidebar[data-sidebarbg=skin5] ul {
            background: #000e45;
        }
        #main-wrapper[data-layout=vertical] .topbar .top-navbar .navbar-header[data-logobg=skin5], #main-wrapper[data-layout=horizontal] .topbar .top-navbar .navbar-header[data-logobg=skin5] {
            background: #000e45;
        }
    </style>
    <script>
        function deleteSubject(id, subject) {
            if (confirm('Are you sure! you want to delete ' + subject)) {
                document.getElementById("hid_delete_id").value = id;
                document.getElementById("hid_delete_form").submit();
            }
        }

        function save() {
            document.getElementById("displayText").innerHTML = "";
        }
    </script>
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
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="" style="justify-content: center; margin-top: 30px;">
                        <b class="logo-icon">
                            <img src="../../assets/images/logo.png" class="light-logo" alt="homepage" style="width: 100%;" />
                        </b>
                        <span class="logo-text"></span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                                <i class="sl-icon-menu font-20"></i>
                            </a>
                        </li>
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
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile dropdown m-t-20">
                                <div class="user-pic">
                                    <img src="<?= $img_url; ?>" alt="users" class="rounded-circle img-fluid" />
                                </div>
                                <div class="user-content hide-menu m-t-10">
                                    <h5 class="m-b-10 user-name font-medium"><?= $user_name; ?></h5>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                        <li class="nav-small-cap">
                            <i class="mdi mdi-dots-horizontal"></i>
                            <span class="hide-menu">Personal</span>
                        </li>

                        <li class="sidebar-item">
                            <a href="admin_bot_new.php" class="sidebar-link">
                                <i class="mdi mdi-plus"></i>
                                <span class="hide-menu"> Create Users </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="add_subjects.php" class="sidebar-link">
                                <i class="mdi mdi-plus"></i>
                                <span class="hide-menu"> Add Subjects </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="add_fee.php" class="sidebar-link">
                                <i class="mdi mdi-plus"></i>
                                <span class="hide-menu"> Add Fee </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="add_info.php" class="sidebar-link">
                                <i class="mdi mdi-plus"></i>
                                <span class="hide-menu"> Add Information </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="add_timetable.php" class="sidebar-link">
                                <i class="mdi mdi-plus"></i>
                                <span class="hide-menu"> Add Time Tables </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="add_faculty.php" class="sidebar-link">
                                <i class="mdi mdi-plus"></i>
                                <span class="hide-menu"> Add Faculty </span>
                            </a>
                        </li>


                        <li class="sidebar-item">
                            <a href="logout_bot.php" class="sidebar-link">
                                <i class="mdi mdi-power"></i>
                                <span class="hide-menu"> LOG OUT </span>
                            </a>
                        </li>
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
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Enter Subjects</h4>
                        <div class="d-flex align-items-center">

                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <center>
                                    <h5 class="p-1" style="<?= $style ?>" id="displayText"><?= $msg ?></h5>
                                </center>
                                <div class="card-body">
                                    <form method="POST" action="">
                                        <h4 class="card-title">Subject: <span class="text-danger">*</span></h4>
                                        <input type="text" required class='form-control col-12 col-lg-5 input-focus' name="subject" id="subject" value=""><br>
                                        <div class="col-12 col-lg-5">
                                            <center>
                                                <button class='btn btn-info btn-rounded' onclick="save()" type="submit" name="saveSubject" id="saveSubject">SAVE</button>
                                            </center>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>Subject</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $getSubjectsList = mysqli_query($conn, "SELECT * FROM subjects WHERE status='1' ORDER BY subject_id DESC") or die(mysqli_error());
                                        $sno = 1;
                                        while ($resSubjectsList = mysqli_fetch_object($getSubjectsList)) {
                                        ?>
                                            <tr>
                                                <td><?= $sno++ ?></td>
                                                <td><?= $resSubjectsList->subject ?></td>
                                                <td><a class="btn btn-primary" href="javascript:deleteSubject('<?= $resSubjectsList->subject_id ?>', '<?= $resSubjectsList->subject ?>')">Delete</a></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </form>
                <form action="" method="POST" id="hid_delete_form">
                    <input type="hidden" id="hid_delete_id" name="hid_delete_id" value="">
                </form>
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->

            <footer class="footer text-center">
                All Rights Reserved by ChatBOT Students. Designed and Developed by  Batch 14
            </footer>

            <!-- End footer -->

        </div>

    </div>

  
    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/extra-libs/taskboard/js/jquery.ui.touch-punch-improved.js"></script>
    <script src="../../assets/extra-libs/taskboard/js/jquery-ui.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="../../dist/js/app.min.js"></script>
    <script src="../../dist/js/app.init.js"></script>
    <script src="../../dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- This Page JS -->
    <script src="../../assets/libs/tinymce/tinymce.min.js"></script>
    <script src="../../assets/libs/tinymce/themes/modern/theme.min.js"></script>
    <!--c3 charts -->
    <script src="../../assets/extra-libs/c3/d3.min.js"></script>
    <script src="../../assets/extra-libs/c3/c3.min.js"></script>

</body>


<!-- Mirrored from themedesigner.in/demo/adminbite/html/ltr/ticket-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Feb 2020 05:05:51 GMT -->

</html>