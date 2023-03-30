<?php
include 'includes/dbh.inc.php';
session_start();
if (isset($_SESSION["useruid"]) || isset($_SESSION["userid"])) {
    $userUid = $_SESSION["useruid"];
    $user = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users2 WHERE usersUid='$userUid'"));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Heart Disease Diagnostic System</title>
    <link rel="icon" type="image/x-icon" href="assets/img/hosbig.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-PxPNy2UJEN1dbIwwsU/t04wzBmcGpDZ6eL+YtvfMek75GbfjkpOaB/W7+lO+zwnTGfMSZaQkAeO9XHeiAh90/g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
    <link href="css/app.css" rel="stylesheet" />
    <style>

    </style>
    <style>
        .input-container {
            margin-bottom: 10px;
        }

        .datainput {
            margin-right: 5px;
            margin-bottom: 5px;
        }

        #output-field {
            width: 50%;
            height: 40px;
            margin-top: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
        }

        .report {
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        .report-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .report-header h3 {
            margin: 0;
            margin-bottom: 5px;
            font-size: 28px;
            font-weight: bold;
            color: #1A5276;
            text-shadow: 1px 1px 2px #ccc;
            text-transform: uppercase;
        }

        .report-header h6 {
            margin: 0;
            font-size: 12px;
            color: #555;
        }

        .report-header h5 {
            margin: 0;
            margin-bottom: 5px;
            font-size: 16px;
            font-weight: bold;
            color: #1A5276;
            text-shadow: 1px 1px 2px #ccc;
            text-transform: uppercase;
        }

        .report-header p {
            margin: 0;
            font-size: 12px;
            color: #555;
        }

        .report-symptoms {
            margin-bottom: 20px;
            margin-top: 10px;
        }

        .report-symptoms h5 {
            margin-top: 10px;
            font-size: 16px;
            font-weight: bold;
            color: #1A5276;
            text-transform: uppercase;
        }

        .report-symptoms ul {
            margin: 0;
            padding: 0;
            list-style: disc;
            color: #555;
        }

        .report-symptoms li {
            margin-bottom: 5px;
            margin-left: 30px;
            color: black;
        }

        .report-disease {
            margin-bottom: 20px;
        }

        .report-disease h5 {
            margin-top: 0;
            font-size: 16px;
            font-weight: bold;
            color: #1A5276;
            text-transform: uppercase;
        }

        .report-disease p {
            margin: 0;
            font-size: 14px;
            color: #555;
        }

        .report-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .report-footer p {
            margin: 0;
            font-size: 12px;
            color: #555;
        }

        .report-footer a {
            font-size: 12px;
            color: #555;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php">Home</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="admin/html/login.php">Doctors' Access</a>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacts.php">Contact</a>
                    </li>
                    <?php
                    if (isset($_SESSION["useruid"]) || isset($_SESSION["userid"])) {
                    ?>

                        <li class="nav-item">
                            <a class="nav-link"><?php echo $user['usersName']; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="includes/logout.inc.php">Logout</a>
                        </li>
                    <?php
                    }
                    ?>

                </ul>
            </div>
        </div>
    </nav>
</body>