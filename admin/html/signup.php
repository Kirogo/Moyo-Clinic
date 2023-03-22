<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8" />
     <title>Register</title>
     <link rel="stylesheet" href="../css/style.css" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
     <div>

     </div>
     <div class="wrapper">
          <?php
          if (isset($_GET["error"])) {
               if ($_GET["error"] == "emptyinput") {
                    echo "<p>Fill in all fields!!!</p>";
               } else if ($_GET["error"] == "invaliduid") {
                    echo "<p>Choose a proper username</P>";
               } else if ($_GET["error"] == "invalidemail") {
                    echo "<p>Write a proper username</P>";
               } else if ($_GET["error"] == "passwordsdontmatch") {
                    echo "<p>Passwords didn't match</P>";
               } else if ($_GET["error"] == "stmtfailed") {
                    echo "<p>Something went wrong...Try again</P>";
               } else if ($_GET["error"] == "usernametaken") {
                    echo "<p>Username already taken</P>";
               } else if ($_GET["error"] == "none") {
                    echo "<p>You have signed up successfully</P>";
               }
          }
          ?>
          <p>Doctors Credentials<br />
          Required <br />
          </p>
          <form action="create-admin.php" method="POST">
               <input type="text" name="name" placeholder="Full Name" />
               <input type="text" name="email" placeholder="Email" />
               <input type="text" name="uid" placeholder="Username" />
               <input type="password" name="pwd" placeholder="Passsword" />
               <input type="password" name="pwdrepeat" placeholder="Repeat Password" />

               <button type="submit" name="submit">Sign Up</button>

               <div class="not-member">
                    Signed Up?<a href="login.php"> Login as a  Doctor</a><br>
                    <a href="../../index.php">Back to Home</a><br>
               </div>
               <div class="not-member">
                    
               </div>


          </form>


          <!-- <p class="or">----- or continue with -----</p>
     <div class="icons">
        <i class="fab fa-google"></i>
        <i class="fab fa-github"></i>
        <i class="fab fa-facebook"></i>
      </div> -->
     </div>
</body>

</html>