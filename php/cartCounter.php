<?php
require_once('../admin/config.php');


$query_for_cart_count = "SELECT COUNT(*) as COUNT FROM cart";
$result = $conn->query($query_for_cart_count);
$count = $result->fetch_assoc();

echo $count["COUNT"];

?>