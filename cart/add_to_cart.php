<?php

$product = json_decode($_POST['product']);
if(is_null($product)){
    echo "No Data to Add";
}
else {
    echo "Item Added To Cart";
}

?>

