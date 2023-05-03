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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                    <!-- Logo -->
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <img src="../assets/images/hosmed.png" alt="homepage" class="dark-logo" />
                        </b>
                        <span class="logo-text">
                            <h4 class="card-title">Moyo Clinic Admin</h4>
                        </span>
                    </a>
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
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="admin-index.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="create-profile.php" aria-expanded="false"><i class="mdi mdi-account-card-details"></i><span class="hide-menu">Profile</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="disease.php" aria-expanded="false"><i class="mdi mdi-hospital"></i><span class="hide-menu">Diseases</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="searcheddata.php" aria-expanded="false"><i class="mdi mdi-stethoscope"></i><span class="hide-menu">Diagnostic Results</span></a></li>
                        <li class="text-center p-20 upgrade-btn">
                        </li>
                    </ul>
                    <div class="col-6">
                        <div class="text-end upgrade-btn">
                            <a href="../includes/logout.inc.php" class="btn btn-danger text-white">Logout</a>
                        </div>
                    </div>

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
                                <li class="breadcrumb-item"><a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Diseases</li>
                            </ol>
                        </nav>
                        <h1 class="mb-0 fw-bold">Heart Diseases</h1>
                    </div>
                    <!-- <div class="col-6">
                        <div class="text-end upgrade-btn">
                            <a href="add-disease.php" class="btn btn-primary text-white">Add Disease Category</a>
                        </div>
                    </div> -->
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div>
                                <canvas id="myChart"></canvas>
                            </div>
                            
                            <script>
                                const ctx = document.getElementById('myChart');

                                new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: ['Dizziness', 'Discomfort', 'Chest pain', 'Fever', 'Fatigue', 'Fainting'],
                                        datasets: [{
                                            label: 'Common Symptoms',
                                            data: [8, 10, 5, 3, 4, 2],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>
                            <div>
                                <p>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Searched symptoms and their corresponding diseases</h4>
                                <h6 class="card-subtitle">Current Patients and their diagnostic results</h6>
                                <h6 class="card-title m-t-40"><i class=""></i></h6>
                                <div class="table-responsive">
                                    <table class="table">

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
                                                <th scope="col">No.</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Symptoms</th>
                                                <th scope="col">Result</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $getSearchData = mysqli_query($conn, "SELECT * FROM searchdata ORDER BY ID DESC");
                                            if (mysqli_num_rows($getSearchData) > 0) {
                                                $num = 0;
                                                while ($searchdata = mysqli_fetch_array($getSearchData)) {
                                                    $num++;
                                            ?>
                                                    <tr>
                                                        <td><?php echo $num; ?></td>
                                                        <td><?php echo $searchdata['Name']; ?></td>
                                                        <td><?php echo $searchdata['Symptoms']; ?></td>
                                                        <td><?php echo $searchdata['result']; ?></td>
                                                    </tr>
                                            <?php }
                                            } else {
                                                echo "No Searched Data";
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            Muriithi Samuel Kirogo</a>.
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