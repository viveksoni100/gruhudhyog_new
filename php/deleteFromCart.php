<?php
require_once('../admin/config.php');

$id = $_GET['id'];

$query_for_deleting_record = "DELETE FROM cart WHERE ID=$id";
if ($conn->query($query_for_deleting_record) === TRUE) {
    echo '<script type="text/javascript"> window.location = "../cart.php" </script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>