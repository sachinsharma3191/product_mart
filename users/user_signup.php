<?php
ini_set('display_errors', 1);
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "productmart";
//$port = 3306;

// Create connection
$conn = new mysqli($servername, $username, $password,$database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
    //echo "Connected Successfully";
}

$name = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$checkExistingQuery = "select * from users where email ='$email'";
$user_details = $conn->query($checkExistingQuery);

if($user_details->num_rows > 0){
    echo "User Already Exists";
}
else {
    $insertQuery  = "insert into users value(null,'$name','$password','$email')";
    if ($conn->query($insertQuery) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $checkExistingQuery . "<br>" . $conn->error;
    }
}

?>

