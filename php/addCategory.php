<?php
require_once('../admin/config.php');

$catName = $_GET['categoryName'];

$sql_query = "INSERT INTO category (name, created_at, created_by) VALUES('$catName', now(), 'ADMIN')";
if ($conn->query($sql_query) === TRUE) {
    echo "Record inserted";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>