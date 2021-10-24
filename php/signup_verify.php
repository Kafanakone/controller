<?php 
    session_start(); // Démarrager une  session

    require_once 'config.php'; //  inclut la connexion à la base de données bd

    if(!empty($_POST['mail']) && !empty($_POST['motdepasse'])){
        // proectection  XSS
        $mail = htmlspecialchars($_POST['mail']); 
        $password = htmlspecialchars($_POST['motdepasse']);
        
        $mail = strtolower($mail); // Mettre l'email en minuscule 
        
        // vérification si le user existe dans la Bd
        $check = $bdd->prepare('SELECT nom, email, motdepasse FROM users WHERE email = ?');
        $check->execute(array($mail));
        $data = $check->fetch();
        $row = $check->rowCount();
        

        // Si $row > à 0 alors l'utilisateur existe
        if($row > 0){
            // verification de l'email
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
                // verification du password
                if(md5($password) == $data['motdepasse']){
                    // création de la session
                    $_SESSION['user'] = $data['nom'];
                    // Envoyer le user sur la page home
                    header('Location: ../home.php');
                    die();
                }else{ header('Location: ../index.php?login_error=passwordincorrect'); die(); } // Password ne correspond pas
            }else{ header('Location: ../index.php?login_error=emailincorrect'); die(); } // le mail n'existe pas
        }else{ header('Location: ../index.php?login_error=Dontuser'); die(); } // user n'existe pas
    }else{ header('Location: ../index.php?login_error=champ_vide'); die();} // si le formulaire est vide