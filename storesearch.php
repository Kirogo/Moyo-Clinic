<?php
session_start();

include 'includes/dbh.inc.php';
$allSymptoms = $_POST['allSymptoms'];
$results = $_POST['results'];

if($allSymptoms != '' || $results != ''){
if (isset($_SESSION["useruid"]) || isset($_SESSION["userid"])) {
    $userUid = $_SESSION["useruid"];
    $user = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users2 WHERE usersUid='$userUid'"));
    $Name = $user['usersName'];
    mysqli_query($conn, "INSERT INTO searchdata(Name,Symptoms,result) VALUE('$Name','$allSymptoms','$results')");

    // Construct the success response data
    $responseData = array(
        'status' => 'success'
    );
} else {
    // Construct the error response data
    $responseData = array(
        'status' => 'error',
        'message' => 'User is not logged in'
    );
}
}else{
    $responseData = array(
        'status' => 'error',
        'message' => 'fill all the fields'
    );   
}
// Convert the response data to a JSON object
$json = json_encode($responseData);

// Return the JSON data
echo $json;
