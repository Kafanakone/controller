<?php 
    session_start(); 
    session_destroy(); // fermeture de la session
    header('Location:../index.php'); // renvoie sur la page index
    die();
?>