<?php
ini_set('display_errors', 1);
//session_start();

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

$output = array();
$productId = $_POST["productId"];
$fetchProducyQuery = "select * from products where ProductID = '$productId'";

$productResults =  $conn->query($fetchProducyQuery);
if($productResults->num_rows > 0){
    while ($row = $productResults->fetch_assoc()) {
        $output[] = $row;
    }
    echo json_encode($output);
}
else {
    echo "No Product Found";
}

?>

