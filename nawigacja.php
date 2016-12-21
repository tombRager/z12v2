<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center user-image-back">
                <img src="assets/img/find_user.png" class="img-responsive" />

            </li>
            <?php
            include('userid.php');
           ?>

            <?php

            echo "<li><a href='#'> Witamy ${_SESSION['login_user']}!</a></li>"; ?>

            <li>
                <a href="profile.php"><i class="fa fa-desktop "></i>Katalog główny</a>
            </li>

            <li>
                <a href="profile.php?id=lista"><i class="fa fa-desktop "></i>Lista logowań</a>
            </li>


            <li>
                <a href="nowyPlik.php">Dodaj nowy plik </a>
            </li>
            <li>
                <a href="nowyFolder.php">Dodaj nowy folder </a>
            </li>
            <li>
                <a href="logout.php">Wyloguj się</a>
            </li>

        </ul>

    </div>

</nav>