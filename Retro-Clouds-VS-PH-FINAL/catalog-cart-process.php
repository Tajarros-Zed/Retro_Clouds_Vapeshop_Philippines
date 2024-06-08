<?php
require "config/config.php";
$customerID = $_POST['customerID'] ?? "";
$productID = $_POST['productID'] ?? "";
$productQuantity = $_POST['productQuantity'] ?? "";

echo "
    <script>
        console.log('$customerID - $productID - $productQuantity');
    </script>
";

$addToCart = "INSERT INTO cart_tbl (customer_id, product_id, product_quantity) VALUES ($customerID, $productID, $productQuantity)";
mysqli_query($conn, $addToCart);

?>