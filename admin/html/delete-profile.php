<?php
$serverName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "moyoclinic2";

$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

if (!$conn) {
    die("Connection Failed: " + mysqli_connect_error());
}

if(isset($_GET['id'])){
    $id=$_GET['id'];

    $sql="DELETE FROM users where usersId=$id";
    $result=mysqli_query($conn,$sql);
    if ($result){
        header('location: index.php');
    }else{
        die(mysqli_error($conn));
    }

}
?>