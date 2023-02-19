<?php
session_start();
if (isset($_SESSION["useruid"]) || isset($_SESSION["userid"])) {
    header("location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Login</title>

    <link rel="stylesheet" href="css/style.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <div class="wrapper">
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Fill in all fields!!!</p>";
            } else if ($_GET["error"] == "wronglogin") {
                echo "<p>Wrong Login Information</P>";
            }
        }
        ?>
        <h1>Hello</h1>
        <p>Welcome to Moyo Clinic <br /></p>
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="uid" placeholder="Username/Email" />
            <input type="password" name="pwd" placeholder="Password" />

            <button type="submit" name="submit">Login</button>
            <div class="not-member">
                Not a member? <a href="signup.php">Register Now</a><br />
                <a href="index.php">Back to Home</a>
            </div>

        </form>
        <p></p>

        <!-- <p class="or">----- or continue with -----</p>
      <div class="icons">
        <i class="fab fa-google"></i>
        <i class="fab fa-github"></i>
        <i class="fab fa-facebook"></i>
      </div> -->

    </div>
</body>

</html>