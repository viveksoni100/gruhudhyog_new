<?php
// opening connection
$conn = new mysqli("localhost", "root", "", "gruhudhyog_db");

$username = mysqli_real_escape_string($conn, $_REQUEST['uname']);
$password = mysqli_real_escape_string($conn, $_REQUEST['psw']);
$hashed_password = md5($password);

$sql = "SELECT * FROM user WHERE email='$username' and password='$hashed_password'";

$resultset = $conn->query($sql);

while($obj = $resultset->fetch_object()){
    $savedPassword = $obj->password;
    $username = $obj->name;
}

if ($savedPassword != $hashed_password) {
    header("Location: http://localhost/gruhudhyog_new/login.php?reg=failed");
} else {
    header("Location: http://localhost/gruhudhyog_new/index.php?login=success&user=".$username);
}

?>