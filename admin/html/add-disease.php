<?php
$serverName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "moyoclinic2";

$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

if (!$conn) {
    die("Connection Failed: " + mysqli_connect_error());
}

// Check if the form has been submitted
if (isset($_POST["submit"])) {
    // Get the form data
    $disease = $_POST["name"];
    $symptoms1 = $_POST["sym1"];
    $symptoms2 = $_POST["sym2"];
    $symptoms3 = $_POST["sym3"];
    $symptoms4 = $_POST["sym4"];
    $symptoms5 = $_POST["sym5"];
    $symptoms6 = $_POST["sym6"];

    // Insert the data into the database
    $sql = "INSERT INTO diseases(type, sym1, sym2, sym3, syM4, sym5, sym6) VALUES ('$disease', '$symptoms1', '$symptoms2', '$symptoms3', '$symptoms4', '$symptoms5', '$symptoms6')";

    if (mysqli_query($conn, $sql)) {
        //echo "Data inserted successfully!";
        header("location: disease.php");
    } else {
        echo "Error inserting data: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
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
    <title>Moyo Clinic Admin Panel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/Flexy-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/hosmed.png">
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">

</head>

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

                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <img src="../assets/images/hosmed.png" alt="homepage" class="dark-logo" />
                        </b>
                        <span class="logo-text">
                            <h4 class="card-title">Moyo Clinic Admin</h4>
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->

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
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="admin-index.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="create-profile.php" aria-expanded="false"><i class="mdi mdi-account-network"></i><span class="hide-menu">Profiles</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="disease.php" aria-expanded="false"><i class="mdi mdi-border-all"></i><span class="hide-menu">Diseases</span></a></li>

                        <li class="text-center p-20 upgrade-btn">
                            <a href="create-profile.php" class="btn d-block w-100 text-white" target=""></a>
                        </li>


                        <li class="text-center p-20 upgrade-btn">
                            <a href="add-disease.php" class="btn d-block w-100 btn-success text-white">Add Disease Category</a>
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
                <div class="row align-items-center">
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 d-flex align-items-center">
                                <li class="breadcrumb-item"><a href="index.php" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Diseases</li>
                            </ol>
                        </nav>
                        <h1 class="mb-0 fw-bold">Add Disease Category</h1>
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
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                            <form class="form-horizontal form-material mx-2" method="POST">
                                    <div class="form-group">
                                        <label class="col-md-12">Disease</label>
                                        <div class="col-md-12">
                                            <input type="text" name="name" value="" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Symptoms</label>
                                        <div class="col-md-12">
                                            <input type="text" value="" class="form-control form-control-line" name="sym1" id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Symptoms 2</label>
                                        <div class="col-md-12">
                                            <input type="text" name="sym2" value="" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Symptoms 3</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="sym3" id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Symptoms 4</label>
                                        <div class="col-md-12">
                                            <input type="text" name="sym4" value="" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Symptoms 5</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="sym5" id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Symptoms 6</label>
                                        <div class="col-md-12">
                                            <input type="text" name="sym6" value="" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success text-white" type="submit" name="submit">Add New Category</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                Muriithi Samuel Kirogo
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
</body>

</html>