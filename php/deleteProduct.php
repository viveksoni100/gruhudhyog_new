<?php
require_once('../admin/config.php');

$id = $_GET['productId'];

$query_for_deleting_record = "DELETE FROM product WHERE ID=$id";
if ($conn->query($query_for_deleting_record) === TRUE) {
    echo '<script type="text/javascript"> window.location = "../admin/product.php" </script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>