<?php
include "storescripts/connect_to_mysql.php";
if(isset($_POST['dlteBtn'])){
 $id=$_POST['CartID'];
 $sql =
 "
 delete FROM productmart.cart
 where cart.CartID =". $id .
 "";
//echo $sql;
 $result = mysqli_query($con, $sql);
 }
?>
