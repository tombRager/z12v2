<?php
include("session.php");
$error='';


$browser = get_browser(null, true);

if (isset($_POST['submit'])) {

    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Hasło lub nazwa użytkownika niepoprawna.";
    }
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($connection,$username);
$password = mysqli_real_escape_string($connection,$password);
$query = mysqli_query($connection,"select * from uzytkownicy where haslo='$password' AND nazwa='$username'");
$rows = mysqli_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: profile.php"); // Redirecting To Other Page
   include("userid.php");
    $przegl_os = $browser['browser'].' '.$browser['platform'];

        $sql= "INSERT INTO logi (user_id,przegl_os) VALUES (".$userId.", '".$przegl_os."');";
        $queryLogger = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        if($queryLogger) {
            //
        }

    header("Location: index.php");


} else {
    $error = "Hasło lub nazwa użytkownika niepoprawna.";
}
mysqli_close($connection);
}
}
?>

<html>
<head>
    <title><?php echo $all_title; ?> - Logowanie</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<h1>Logowanie</h1>
<div id="login">
<h2>Zaloguj się</h2>
<form action="" method="post">
    <label>Nazwa :</label>
    <input id="name" name="username" placeholder="Nazwa użytkownika" type="text">
    <label>Hasło :</label>
    <input id="password" name="password" placeholder="Hasło" type="password">
    <input name="submit" type="submit" value=" Zaloguj ">
<span><?php echo $error; ?></span>
    <span><br><a href="rejestracja.php">Zarejestruj się</a></span>
</form>
</div>
</div>
</body>
</html>
