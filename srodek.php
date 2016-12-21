<?php
session_start();
$folder = $_GET['id'];
?>
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
