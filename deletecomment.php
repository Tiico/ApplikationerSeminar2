<?php
include("config.php");
$deleteid = $_GET['id'];
mysqli_query($link,"DELETE FROM comments WHERE id = '$deleteid'");
header('location:' . $_SERVER['HTTP_REFERER']);
?>