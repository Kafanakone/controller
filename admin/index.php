<?php
    session_start();// demarrage de la session
    require_once '../php/config.php'; //  inclut la connexion à la base de données bd

    if(!empty($_POST['username']) && !empty($_POST['motdepasse'])){
        // proectection  XSS
        $username = htmlspecialchars($_POST['username']); 
        $password = htmlspecialchars($_POST['motdepasse']);
                
        // vérification si le user existe dans la Bd
        $check = $bdd->prepare('SELECT nom, username, mdp FROM admin WHERE username = ?');
        $check->execute(array($username));
        $data = $check->fetch();
        $row = $check->rowCount();
        

        // Si $row > à 0 alors l'utilisateur existe
        if($row > 0 && $username === $data['username']){
            // verification du username
                // verification du password
                if(md5($password) == $data['mdp']){
                    // création de la session
                    $_SESSION['user'] = $data['nom'];
                    $_SESSION['password'] = $data['mdp'];
                    // Envoyer le user sur la page home
                    header('Location: dashboard.php');
                    die();
                }else{ header('Location: index.php?login_error=passwordincorrect'); die(); } // Password ne correspond pas
            }else{ header('Location: index.php?login_error=usermaneerror'); die(); } // username incorrect
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/oeil.js"></script>
    <title>Inscription</title>
</head>

<style>
    body{
        background-image: url("../img/bg-panel-admin.jpg");
        background-repeat: no-repeat;
        background-size: cover;

    }
    .espace{
        background: #fff;
        padding: 3em;
        border-radius: 2em;
    }
</style>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-5 mx-auto text-center espace">
                <div class="">
                <img src="../img/homme3.png" alt="avatar" style="width:80px; heigth: 80px;" class="img-fluid rounded-pill">
                <h5>Espace Admin</h5>
                </div>
                <form action="" method="post" class="">
                    <!-- message champ vide -->
                    <?php
                                if(isset($_GET['login_error'])){
                                    $Msg = htmlspecialchars($_GET['login_error']);
                                    switch ($Msg){
                                        case 'champ_vide':
                        ?>
                                        <div class="alert alert-warning" role="alert">
                                            Veuillez renseigner vos informations de connexion
                                        </div>
                        <?php
                                        break;
                                        case 'usermaneerror':
                                            
                        ?>
                                            <div class="alert alert-warning" role="alert">
                                            Nom d'utilisateur incorrect
                                            </div>
                        <?php
                                        break;
                                        case 'passwordincorrect':
                        ?>
                                            <div class="alert alert-warning" role="alert">
                                            Le mot de passe est incorrect
                                            </div>
                        <?php
                                        break;

                                    }
                                }
                                 
                
                        ?>
                    <div class="pb-4">
                        <input type="text" name="username" id="mail" class="form-control " placeholder="Identifiant">
                        
                        <div class="text-danger" id="mailincorrect">
                            <!-- message email invalide -->
                    <?php
                                if(isset($_GET['login_error'])){
                                    $Msg = htmlspecialchars($_GET['login_error']);
                                    switch ($Msg){
                                        case ''
                        ?>
                                        <div class="alert alert-warning" role="alert">
                                            <?php 
                                                if (isset($_POST['mail'])) {
                                                    $mail = htmlspecialchars($_POST['mail']); 
                                                    echo $mail. "n'existe pas";
                                                }
                                            ?>
                                        </div>
                        <?php
                                    }
                                }
                
                        ?>
                        </div>

                    </div>


                        <div>
                            <div class="input-group-prepend">
                                <input type="password" name="motdepasse" id="motdepasse" class="form-control" minlength="4" placeholder="Mot de passe">
                                <div class="input-group-text bg-danger"> 
                                    <img src="../img/oeil.png" alt="" style="width: 20px;" class="cachemotpasse" id="img-oeil" onClick="EtatOeil()">
                                </div> 
                            </div>
                            
                            <div class="text-danger" id="motpassincorrect">
                                
                            </div>  

                        </div>
                    <button type="submit" class="btn btn-danger my-3 p-2 col">Se connecter</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>