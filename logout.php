<?php
   session_start(); //otvorenie session

   unset($_SESSION["username"]); //vymazanie session
   
   echo '<link rel=stylesheet href="logout.css">';
   echo '<div class="zaklad">';
   echo '<div class="logout">You have log out and cleaned session</div>';

   header('Refresh: 2; URL = index.php'); // presmerovanie na prihlasenie
?>