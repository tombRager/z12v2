<?php
session_start();
$cel = $_GET['cel'];
$file_url = 'http://serwer1631701.home.pl/tz/z12/'.$_SESSION['login_user'].'/'.$cel;
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");
readfile($file_url);?>