<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Heart Disease Diagnostic System </title>
    <link rel="icon" type="image/x-icon" href="assets/img/hosbig.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

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
                    <a class="nav-link"><?php
                                        if (isset($_SESSION["useruid"])) {
                                            echo "<p>" . $_SESSION["useruid"] . "</p>";
                                        } ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">
                        <?php
                        if (isset($_SESSION["useruid"])) {
                            echo "<li><a href='includes/logout.inc.php'>Log Out</a></li>";
                        } else {
                            echo "<li><a href='login.php'>Log In</a> </li>";
                        } ?>
                    </a>
                </li>
                <li class="nav-item">

                </li>


            </ul>
        </div>
    </div>
</nav>