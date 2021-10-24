<?php 
    session_start();
    require_once '../php/config.php'; // Connexion à la Bd 
   // verification si le user est est connecté
    if(!isset($_SESSION['user'])){
        header('Location: index.php');
        die();
    }
    // verification s'il a le bon mot de passe pour supprimer
    if(isset($_POST['adminpassword']) && !empty($_POST['adminpassword'] )){
        $adminpassword = md5(htmlspecialchars($_POST['adminpassword']));
        $delPersonne = md5(htmlspecialchars($_POST['idPersonne']));
        if ($adminpassword == $_SESSION['password']) {
                $del = $bdd->prepare('DELETE FROM users WHERE id = ?');
                $del->execute(array($delPersonne));
                header('Location: dashboard_liste_users.php'); 
            die();
        }else{
            header('Location: dashboard_liste_users.php?error'); 
            die();
        }
    }else{
        header('Location: dashboard_liste_users.php?error'); 
        die();
    }
?>