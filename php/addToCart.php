<?php
require_once('../admin/config.php');

$product_id = $_GET['id'];
$product_name = $_GET['productName'];
$trim_product_name = trim($product_name);
$category_name = $_GET['categoryName'];
$trim_category_name = trim($category_name);
$price = $_GET['price'];
$qty = $_GET['qty'];
$seller_name = $_GET['sellerName'];
$trim_seller_name = trim($seller_name);
$image_name = $_GET['imageName'];
$trim_image_name = trim($image_name);
$image_path = $_GET['imagePath'];
$trim_image_path = trim($image_path);

//do entry in cart table
$sql = "INSERT INTO cart (product_id, product_name, category_name, price, qty, seller_name, image_name)
VALUES ($product_id, '$trim_product_name', '$trim_category_name', $price, $qty, '$trim_seller_name', '$trim_image_name')";


if ($conn->query($sql) === TRUE) {
  echo "New record created successfully"." - ";
    echo $image_path;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

?>