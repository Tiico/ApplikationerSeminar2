<?php 

include("config.php");
require('connect.php');
session_start();

$username = $_SESSION['username'];
$comment = htmlspecialchars($_POST['comment']);
$pancake = $_POST['pancakes'];
$meatballs = $_POST['meatballs'];

if($username&&$comment&&$pancake){
    mysqli_query($link, "INSERT INTO comments (username, comment, food) VALUES ('$username','$comment','pancakes')");
    header('location:' . $_SERVER['HTTP_REFERER']);
}
else if($username&&$comment&&$meatballs){
    mysqli_query($link, "INSERT INTO comments (username, comment, food) VALUES ('$username','$comment','meatballs')");
    header('location:' . $_SERVER['HTTP_REFERER']);
}
else{
    die("Fill out everything please.");
}
?>