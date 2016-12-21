<?php
session_start();
$folder = $_GET['id'];
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
            <h2> Twoje pliki</h2>
            <h3> Zawartość folderu <?php echo $folder ?></h3>
            <div>
                <?php if($komunik) echo $komunik; ?><br>
                <?php
                if(isSet($folder)){
                    $handle = opendir($_SESSION['login_user'].'/'.$folder);
                    $nested = true;
                }else{
                    $handle = opendir($_SESSION['login_user']);
                    $nested = false;
                }

                echo " <ul>";
                if ($handle) {
                    while (false !== ($file = readdir($handle))) {
                        if ($file != "." && $file != "..") {
                            $info = pathinfo($file);
                            if ($info["extension"] == "") {
                                echo '<li>Folder <a href="glebiej.php?id='.$file.'">'.$file.'</a> - otwórz</li>';
                            }else {
                                if (isSet($folder)) {
                                    echo "<li>Plik <a href='sciagnij.php?cel=" . $folder . '/' . $file . "'>" . $file . "</a> - ściągnij</li>";
                                } else {
                                    echo "<li>Plik <a href='sciagnij.php?cel=" . $file . "'>" . $file . "</a> - ściągnij</li>";
                                }
                            }
                        } else {
                        }
                    }
                }
                echo "</ul>";
                ?><?php if($nested==false) {
                    echo'<br><a href="nowyPlik.php"><button> Nowy plik</button></a ><a href = "nowyFolder.php" ><button>  Nowy folder</button></a>';
                }else{
                    echo'<br><a href="nowyPlik.php?id='.$folder.'"><button> Nowy plik</button></a ><a href="profile.php"><button> Powrót do kat. głównego</button></a>';}?>
            </div>
        </div>
        <!-- /. PAGE INNER  -->
    </div>
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

