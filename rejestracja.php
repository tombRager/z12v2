<?php
include("session.php");
$error=''; 
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Hasło lub nazwa użytkownika niepoprawna.";
}
else
{
$username=$_POST['username'];
$password=$_POST['password'];
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($connection,$username);
$password = mysqli_real_escape_string($connection,$password);
$sql = "INSERT INTO uzytkownicy (nazwa,haslo) VALUES ('$username', '$password')";
$query = mysqli_query($connection, $sql);
if ($query) {
        $error = "Zarejestrowano poprawnie.";
    if (!file_exists($username)) {
        mkdir($username, 0777, true);

    }
} else {
    echo mysqli_error($connection);
$error = "Wystąpił błąd.";
}
mysqli_close($connection);
}}

?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $all_title; ?> - Rejestracja</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<h1>Zarejestruj się</h1>
<div id="login">
<h2>Rejestracja</h2>
<form action="" method="post">
<label>Nazwa :</label>
<input id="name" name="username" placeholder="Nazwa użytkownika" type="text">
<label>Hasło :</label>
<input id="password" name="password" placeholder="Hasło" type="password">
<input name="submit" type="submit" value=" Zarejestruj ">
<span><?php echo $error; ?></span>
    <span><br><a href="login.php">Zaloguj się</a></span>

</form>
</div>
</div>
</body>
</html>
