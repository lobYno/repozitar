<?php
session_start(); // Open session

// Check if session is set
if(isset($_SESSION['username'])) {
    echo '<link rel="stylesheet" href="welcome.css">';
    echo '<div class="zaklad">';
    echo '<p>Welcome <span>'.$_SESSION['username'].'</span></p><br>';
    echo '<p class="logout-link">Click here to <a href="logout.php" title="Logout">logout.</a></p>'; // Logout link
    echo '</div>';
}
?>
