<?php 
    session_start();
    require_once '../php/config.php'; // Connexion à la Bd 
   // verification si le user est est connecté
    if(!isset($_SESSION['user'])){
        header('Location: index.php');
        die();
    }
    // Recuperation de l'Id 
    if (isset($_SESSION['iddelete']) && !empty($_SESSION['iddelete'])) {
        $iddelete = htmlspecialchars($_SESSION['iddelete']);
        $_SESSION['iddelete'] = $iddelete ;
        $del = $bdd->prepare('SELECT * FROM users WHERE id = ?');
        $del->execute(array($_SESSION['iddelete']));
        $DelPersonne = $del-> fetch();
        $DelPersonneName = $DelPersonne['nom'];

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
                <h5>Confirmer votre mot de passe pour supprimer</h5>
                <p class="text-danger text-uppercase"><?php echo $DelPersonneName;?></p>
                </div>
                <form action="modify_user.php" method="post" class="">
                        <div>
                            <div class="input-group-prepend mb-4">
                                <input type="password" name="passwordchange" class="form-control" minlength="4" placeholder="Entrez le nouveau password de <?php echo $DelPersonneName;?> ">
                                <div class="input-group-text bg-danger"> 
                                    <img src="../img/oeil.png" alt="" style="width: 20px;" class="cachemotpasse" id="img-oeil" onClick="EtatOeil()">
                                </div> 
                            </div>
                            <!-- Password Admin -->
                            <div class="input-group-prepend">
                                <input type="password" name="adminpassword" class="form-control" minlength="4" placeholder="Entrez Mot de passe Admin pour confirmer">
                                <div class="input-group-text bg-danger"> 
                                    <img src="../img/oeil.png" alt="" style="width: 20px;" class="cachemotpasse" id="img-oeil" onClick="EtatOeil()">
                                </div> 
                            </div>
                            
                            <div class="text-danger" id="motpassincorrect">
                                
                            </div>  

                        </div>
                    <button type="submit" class="btn btn-danger my-3 p-2 col">Confirmer</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>