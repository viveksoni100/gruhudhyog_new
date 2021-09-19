<?php
require_once('../admin/config.php');

$productName = $_GET['productName'];
$categoryName = $_GET['categoryName'];
$price = $_GET['price'];
$qty = $_GET['qty'];
$seller = $_GET['seller'];
$image = $_GET['image'];

$sql_query = "INSERT INTO product (name, category_name, price, qty, seller_name, created_at, created_by, del_flag, status) 
VALUES('$productName', '$categoryName', $price, $qty, '$seller', now(), 'ADMIN', 0, 1)";
if ($conn->query($sql_query) === TRUE) {
    echo "Record inserted";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>