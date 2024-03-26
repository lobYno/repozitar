<?php
session_start(); //otvorenie session

//zistenie ci je session nastavene
if(isset($_SESSION['username']) ) {
    echo '<link rel=stylesheet href="welcome.css">';
    echo '<div class="zaklad">';
    echo '<p>Welcome <span>'.$_SESSION['username'].'</span></p><br>';
    echo '<p>Click here to <a href = "logout.php" tite = "Logout">logout.</p>';//odkaz na odhlasenie
    echo '</div>';
}
?>