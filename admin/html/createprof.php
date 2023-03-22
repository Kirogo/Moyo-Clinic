<?php


$serverName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "moyoclinic2";

$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

if (!$conn) {
    die("Connection Failed: " + mysqli_connect_error());
}

//From the functions file
// This function checks if there is data in the form

function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat)
{
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUid($username)
{
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat)
{
   
    if ($pwd !== $pwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email)
{
    $sql = "SELECT * from users2 where usersUid = ? or usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../create-profile.php?error=stmtfailed");
        exit;
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd)
{
    $sql = "INSERT INTO users2(usersName, usersEmail, usersUid, usersPwd) values (?, ?, ?, ?) ;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../create-profile.php?error=stmtfailed");
        exit;
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); // Makes the users password into gibberish words that cant be understood

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../html/create-profile.php?error=none");
    exit;
}

function emptyInputLogin($username, $pwd)
{

    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd)
{
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit;
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkpwd = password_verify($pwd, $pwdHashed);

    if ($checkpwd == false) {
        header("location: ../login.php?error=wronglogin");
        exit;
    } else if ($checkpwd == true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersid"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../home.php?");
        exit;
    }
}


if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];


    // This shows an error whenever the user didnt type in in the form
    if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false) {
        header("location: ../create-profile.php?error=emptyinput");
        exit;
    }
    if (invalidUid($username) !== false) {
        header("location: ../create-profile.php?error=invaliduid");
        exit;
    }
    if (invalidEmail($email,) !== false) {
        header("location: ../create-profile.php?error=invalidemail");
        exit;
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../create-profile.php?error=passwordsdontmatch");
        exit;
    }
    if (uidExists($conn, $username, $email) !== false) {
        header("location: ../create-profile.php?error=usernametaken");
        exit;
    }

    createUser($conn, $name, $email, $username, $pwd);
} else {
    header("location: ../create-profile.php");
}
