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
        if(isset($_POST['passwordchange']) && !empty($_POST['passwordchange'] )){
            $adminpassword = md5(htmlspecialchars($_POST['adminpassword']));
            $passwordchange = md5(htmlspecialchars($_POST['passwordchange']));
            if ($adminpassword == $_SESSION['password']) {
                    $change = $bdd->prepare("UPDATE users SET motdepasse = ? WHERE users.id = ?");
                    $change->execute(array($passwordchange, $_SESSION['changepwd']));
                    echo "passwordSession" . $_SESSION['changepwd'] . "<br>";
                    echo "passwordChange" . $passwordchange;
                    header('Location: dashboard_liste_users.php'); 
                die();
            }else{
                header('Location: dashboard_liste_users.php?error'); die();}
        }else{
            header('Location: dashboard_liste_users.php?error'); die();}
        
    }else{header('Location: dashboard_liste_users.php?error'); die();}
    
?>