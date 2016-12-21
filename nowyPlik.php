<?php
session_start();
include('baza.php');
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
                <?php
                session_start();
                $destination = $_GET['id'];
                if(isSet($destination)){
                    $target1 = $_SESSION['login_user'].'/'.$destination;
                }else{
                    $target1 = $_SESSION['login_user'];
                }
                $target = $target1 .'/'. basename( $_FILES['file']['name']);
                if(isSet($_FILES['file']['name'])){
                    if(move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
                        echo "Plik został wysłany.";
                    }else{
                        echo "Błąd wysyłania pliku na serwer.";
                    }
                }
                ?>
                <div>
                    <?php if(isSet($destination)) echo "Katalog docelowy: ".$destination." - "; ?>
                    <h3> Dodaj nowy plik</h3>

                    <form method="POST" action="" enctype="multipart/form-data">
                        <input type="file" name="file">
                        <input type="hidden" name="size" value="350000">
                        <input type="submit" value="Wyślij plik"/>
                    </form>
                    <?php

                    echo '<a href="profile.php"> Powrót do folderu głównego
                 
                 </a>';


                    ?>
                </div> </div>
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