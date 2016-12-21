<?php
session_start();
$connection = mysqli_connect("localhost", "21772303_3333333", "bDbD889889889!");
$db = mysqli_select_db($connection, "21772303_3333333");
$charsetquery = mysqli_query($connection,"SET NAMES utf8");
$charsetquery2 = mysqli_query($connection,"SET CHARACTER_SET utf8_unicode_ci");
$all_title = "myCloud";
?>
