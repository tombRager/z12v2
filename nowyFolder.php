<?php
session_start();
$folder = $_POST['name'];
if(isset($folder)){
    $sciezka = $_SESSION['login_user'].'/'.$folder;
if(!file_exists($sciezka)){ mkdir($sciezka, 0777, true); echo "Dodano nowy folder";
    }
}
?>



<?php session_start(); ?>
<?php if(!isset($_SESSION['login_user'])){
    header("Location: login.php");
}?>

﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>myCloud - serwer plików - Witamy!</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
<div id="wrapper">
    <?php include("gora.php"); ?>
    <!-- /. NAV TOP  -->
    <?php include ("nawigacja.php"); ?>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div id="page-inner">
            <div>
                <h3> Dodaj nowy folder</h3>

                <form method="POST" action="">
                    Nazwa nowego folderu: <input type="text" name="name"/>
                    <input type="submit" value="Dodaj folder"/>
                </form>

            </div>
        </div></div>
    <!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>


</body>
</html>