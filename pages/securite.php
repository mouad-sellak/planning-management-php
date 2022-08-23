<?php
    session_start();
    
    if( !isset($_SESSION['user']) && !isset($_SESSION['tech']) ) {
        header('location:home.php');
    }
?>
