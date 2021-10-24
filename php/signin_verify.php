<?php
    session_start();
    require_once 'config.php';
    
    if(!empty($_POST['fullname']) && !empty($_POST['mail']) && !empty($_POST['motdepasse']) && !empty($_POST['motdepasseconfirme'])){
        // evite les  XSS
        $nom = htmlspecialchars($_POST['fullname']);
        $mail = htmlspecialchars($_POST['mail']);
        $password = htmlspecialchars($_POST['motdepasse']);
        $password_confirme = htmlspecialchars($_POST['motdepasseconfirme']);

        // verification si le mail existe déjà
        $check = $bdd->prepare('SELECT nom, email, motdepasse FROM users WHERE email = ?');
        $check->execute(array($mail));
        $data = $check->fetch();
        $row = $check->rowCount();

        $mail = strtolower($mail); // rend le mail entrer en miniscule
        
        // si la valeur de $row=0 alors le user n'est pas dans la bd 
        if($row == 0){ 
            if($nom < 4){ // verification de la longueur du nom (ne doit pas être inferieur à 4 caractère Ps: Yed est mal barré)
                    if(filter_var($mail, FILTER_VALIDATE_EMAIL)){ // verification du mail
                        if($password === $password_confirme){ // verification si passwordconfirme est égal à password

                            
                            // criptage du password avec md5
                            $password = md5($password);
                            
                            // insertion des données dans la bd 
                            $insert = $bdd->prepare('INSERT INTO users(nom, email, motdepasse) VALUES(:nom, :email, :motdepasse)');
                            //insertion en tableau associatif
                            $insert->execute(array(
                                'nom' => $nom,
                                'email' => $mail,
                                'motdepasse' => $password,
                            ));

                            // envoie d'un mail d'inscription reussi
                            mail($mail, "Inscription reussie", "Hello! bienvenue, Vous êtes bien sur notre site");
                            $_SESSION['user'] = $nom;
                            // redirection sur index pour se connecter
                            header('Location:../home.php');
                            die();
                        }else{ header('Location: ../signin.php?error=passworddifferent'); die();} // erreur mdp different
                    }else{ header('Location: ../signin.php?error=emailincorrect'); die();} // erreur mail
            }else{ header('Location: ../signin.php?error=nomincorrect'); die();} // erreur nom <4 caracteres
        }else{ header('Location: ../signin.php?error=user_existe'); die();} // erreur user existe
    }else{ header('Location: ../signin.php?error=champ_vide'); die();} // champ vide
?>