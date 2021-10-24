<?php 
    session_start();
    require_once '../php/config.php'; // Connexion à la Bd 
   // verification si le user est est connecté
    if(!isset($_SESSION['user'])){
        header('Location: index.php');
        die();
    }
    // Recuperation de l'Id 
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $iddelete = htmlspecialchars($_GET['id']);
        $_SESSION['changepwd'] = $iddelete ;
        $del = $bdd->prepare('SELECT * FROM users WHERE id = ?');
        $del->execute(array($_GET['id']));
        $DelPersonne = $del-> fetch();
        $DelPersonneName = $DelPersonne['nom'];
        header('Location: confirme_modify.php');

    }else  header('Location: dashboard_liste_users.php?error');


?>