<?php
require_once("connect.php");
$link = mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link));
mysqli_query($link, "SET NAMES 'utf8'");
$val = $_POST['fn'];
$id = $_POST['fr'];
$pieces = explode(" ", $id);
$finr=$pieces[1];
$finn=$pieces[0];

mysqli_query($link, "UPDATE users SET $finr='$val' WHERE id='$finn'") or die(mysqli_error($link)); 
?>