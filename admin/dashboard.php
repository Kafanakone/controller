<?php
    session_start(); // demarrage de la session
    require_once '../php/config.php'; //  inclut la connexion à la base de données bd

    if (!isset($_SESSION['user'])) { // si le user n'est pas connecter il se retourne sur panel admin
        header('Location: index.php');
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Dashboard</title>
</head>
<body>
    <style>
        body{
            background-image: url("../img/bg_dash.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
    <!--  -->
    <div class="container mt-5 bg-light p-5">
    <div class="row">
        <div class="col-12 col-lg-3 bg-light p-4 rounded-lg">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="dashboard.php" role="tab" aria-controls="v-pills-home" aria-selected="true">
                    <i class="pr-3"><img src="../icons/house-fill.svg" alt=""></i>
                    Accueil
                </a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="dashboard_liste_users.php" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                    <i class="pr-3"><img src="../icons/person-circle.svg" alt=""></i>
                     Liste des Users
                </a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="dashboard_liste_admin.php" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                    <i class="pr-3"><img src="../icons/person-circle.svg" alt=""></i>
                     Liste des Admins
                </a>

            </div>
            <a href="logout.php" class=" col btn btn-danger">Se deconnecter</a>

        </div>
    <div class="col-12 col-lg-9">
        <!-- Compteur -->
        <div class="row">
            <div class="col-sm-5">
                <div class="card bg-primary">
                    <div class="card-body text-white">
                        <h5 class="card-title text-center text-white">Nombre d'utilisateurs inscrit </h5>
                        <p class="card-text text-center text" style="font-size:2em"> 
                            <?php 
                            $req = $bdd->query('SELECT * FROM users');
                            $nbruser = $req->rowcount();
                            echo $nbruser;
                            ?>
                        </p>
                    </div>        
                </div>
            </div>
            
            <div class="col-sm-5">
                <div class="card bg-primary">
                    <div class="card-body text-white">
                        <h5 class="card-title text-center text-white">Nombre d'Admins </h5>
                        <p class="card-text text-center text" style="font-size:2em">
                             <?php 
                                $req = $bdd->query('SELECT * FROM admin');
                                $nbradmin = $req->rowcount();
                                echo $nbradmin;
                            ?>
                        </p>
                    </div>        
                </div>
            </div>
        </div>
        <!-- End Compteur -->
    </div>
    
</body>
</html>