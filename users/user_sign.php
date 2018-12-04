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
$password = $_POST['password'];
$name = $_POSTac['username'];

$loginQuery = "select * from user where (user_name = '$name' or email ='$name') and password = '$password';";
$user_details = $conn->query($loginQuery);

if($user_details->num_rows > 0){
    while ($row = $user_details->fetch_assoc()) {
            $cookie_name = "username";
            $cookie_value =  $row["email"];
            setcookie($cookie_name, $cookie_value, time() + (60), "/product_mart"); // 86400 = 1 day
    }
    echo "Successful";
}
else {
    echo "Failed";
}
?>

