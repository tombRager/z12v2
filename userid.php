<?php session_start(); ?>
<?php if(!isset($_SESSION['login_user'])){
    header("Location: login.php");
}?>

<?php
include("baza.php");

    if (!$userId) {
        $uzyt = mysqli_real_escape_string($connection, $_SESSION['login_user']);
        $quer = mysqli_query($connection, "SELECT id FROM uzytkownicy WHERE nazwa='" . $uzyt . "';") or die(mysqli_error($connection));
        if ($quer) {
            $row = mysqli_fetch_array($quer);
            $userId = $row[0];
        }
    }


?>