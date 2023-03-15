<?php
include 'includes/dbh.inc.php';
session_start();
if (isset($_SESSION["useruid"]) || isset($_SESSION["userid"])) {
    $userUid = $_SESSION["useruid"];
    $user = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE usersUid='$userUid'"));
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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
    <link href="css/app.css" rel="stylesheet" />
    <!--Body-->

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
                        <a class="nav-link" href="login.php">Get Started</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacts.php">Contact</a>
                    </li>

<<<<<<< HEAD
                    <li class="nav-item">
                        <a class="nav-link" href="chatbot.php">Doctors' Access</a>
                        <?php
                        if (isset($_SESSION["useruid"]) || isset($_SESSION["userid"])) {
                        ?>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><?php echo $user['usersName']; ?></a>
                    </li>
                    <li class="nav-item">
=======
                    <li class="nav-item">
                        <a class="nav-link" href="chatbot.php">Chatbot</a>
                        <?php
                        if (isset($_SESSION["useruid"]) || isset($_SESSION["userid"])) {
                        ?>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><?php echo $user['usersName']; ?></a>
                    </li>
                    <li class="nav-item">
>>>>>>> 853105f9b9681dcdf0b6ac4af3b146cc668f1a25
                        <a class="nav-link" href="includes/logout.inc.php">Logout</a>
                    </li>
                <?php
                        }
                ?>

                </ul>
            </div>
        </div>
    </nav>