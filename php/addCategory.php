<?php
require_once('../admin/config.php');

$data = isset($_REQUEST['categoryName']) ? $_REQUEST['categoryName'] : 'ok';
echo $data;
?>