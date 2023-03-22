<?php
include '../includes/dbh.inc.php';
session_start();
if (isset($_SESSION["useruid"]) || isset($_SESSION["userid"])) {
    $userUid = $_SESSION["useruid"];
    $user = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE usersUid='$userUid'"));
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Flexy lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Flexy admin lite design, Flexy admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description" content="Flexy Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Moyo Clinic Admin </title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/Flexy-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/hosbig.png">
    <!-- Custom CSS -->
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">


<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>


    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <img src="../assets/images/hosmed.png" alt="homepage" class="dark-logo" />
                        </b>
                        <span class="logo-text">
                            <h4 class="card-title">Moyo Clinic Admin</h4>
                        </span>
                    </a>
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

                </div>

            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="admin-index.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="create-profile.php" aria-expanded="false"><i class="mdi mdi-account-network"></i><span class="hide-menu">Profiles</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="disease.php" aria-expanded="false"><i class="mdi mdi-border-all"></i><span class="hide-menu">Diseases</span></a></li>


                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 d-flex align-items-center">
                                <li class="breadcrumb-item"><a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                        <h1 class="mb-0 fw-bold">Dashboard</h1>
                    </div>
                    <div class="col-6">
                        <div class="text-end upgrade-btn">
                            <a href="../../index.php" class="btn btn-primary text-white">Homepage</a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end upgrade-btn">
                            <a href="../includes/logout.inc.php" class="btn btn-danger text-white">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <!-- Sales chart -->
                <!-- Table -->
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- title -->
                                <div class="d-md-flex">
                                    <div>
                                        <h4 class="card-title">All Moyo Clinic Patients</h4>
                                        <h5 class="card-subtitle">Overview</h5>
                                    </div>
                                </div>
                                <!-- title -->
                                <div class="table-responsive">
                                    <table class="table mb-0 table-hover align-middle text-nowrap">

                                        <?php
                                        $serverName = "localhost";
                                        $dbUserName = "root";
                                        $dbPassword = "";
                                        $dbName = "moyoclinic2";

                                        $conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

                                        if (!$conn) {
                                            die("Connection Failed: " + mysqli_connect_error());
                                        }
                                        ?>
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Users Id</th>
                                                <th class="border-top-0">Full Names</th>
                                                <th class="border-top-0">Email</th>
                                                <th class="border-top-0">Username ID</th>
                                                <th class="border-top-0">Admin Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $sql = "SELECT * FROM users2";
                                            $result = mysqli_query($conn, $sql);
                                            $resultCheck = mysqli_num_rows($result);

                                            if ($resultCheck > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $id = $row["usersId"];
                                                    $name = $row["usersName"];
                                                    $email = $row["usersEmail"];
                                                    $username = $row["usersUid"];
                                                
                                                    echo "
<tr> 
<td>$id</td>
<td>$name</td>
<td>$email</td>
<td>$username</td>
<td>
<a class='btn btn-primary btn-sm' href='edit-profile.php?id=$id'>Edit</a>
    <a class='btn btn-danger btn-sm' href='delete-profile.php?id=$id'>Delete</a>
</td>
</tr>

";
                                                }
                                            }

                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
            </div>
            <!-- End Container fluid  -->

            <footer class="footer text-center">
                Muriithi Samuel Kirogo
                <a href=""></a>.
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
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../dist/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../dist/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>