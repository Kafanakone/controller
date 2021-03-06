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
    <script src="../js/oeil.js"></script>
    <title>Dashboard</title>
</head>
<body onclick="DelErrorMessage()">
    <style>
        body{
            background-image: url("../img/bg_dash.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            font-family: roboto !important;
        }
        h3{
            font-family: roboto !important;
            text-align:center;
            padding-bottom: 0.5em;
            text-transform: uppercase;
        }
        td{
            text-align: center;
        }
    </style>

    <!-- Message incorrect password -->
    <!-- <?php
    //    if(isset($_GET['error'])){
            
    ?>
             <div class="alert alert-warning" role="alert" id="PasswordError">
                Vous n'avez les autorisations nécessaire pour effectuer ceette action
             </div>
                <script> // effacer le message d'erreur
                    function DelErrorMessage(){
                    document.getElementById("PasswordError").style.display = "none";
                    }
                </script>
    <?php //} ?> -->
    <!-- End Message incorrect password -->
    <!--  -->
    <div class="col-12 col-lg-3 container mt-5 bg-light p-5">
    <div class="row">
    <div class="col-3 bg-light p-4 rounded-lg">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link " id="v-pills-home-tab" data-toggle="pill" href="dashboard.php" role="tab" aria-controls="v-pills-home" aria-selected="true">
                    <i class="pr-3"><img src="../icons/house-fill.svg" alt=""></i>
                    Accueil
                </a>
                <a class="nav-link " id="v-pills-profile-tab" data-toggle="pill" href="dashboard_liste_users.php" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                    <i class="pr-3"><img src="../icons/person-circle.svg" alt=""></i>
                     Liste des Users
                </a>
                <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="dashboard_liste_admin.php" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                    <i class="pr-3"><img src="../icons/person-circle.svg" alt=""></i>
                     Liste des Admins
                </a>

            </div>
            <a href="logout.php" class=" col btn btn-danger">Se deconnecter</a>

        </div>
    <div class="col-12 col-lg-9">
        <!-- table -->
                <h3>Liste des Administrateurs</h3>
            <table class="table">
                <thead class="thead-primary bg-primary text-white text-center">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Noms</th>
                    <th scope="col">Username</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <?php
                $listing_user = $bdd->query('SELECT * FROM admin');
                    $i = 0;
                    while ($affiche_user = $listing_user->fetch()) {
                ?>   
                
                <form action="delete_user.php" method="post"> <!-- formulaire envoie des infos de suppression -->
                <tbody>
                    <tr>
                    <th scope="row"><?php echo ++$i ?></th>
                    <td><?php echo $affiche_user['nom'] ?></td>
                    <td><?php echo $affiche_user['username'] ?></td>
                    <!-- <td><a  href="confirme_modify_user.php?id=<?php echo $affiche_user['id'] ?>" class=" col btn btn-primary">Modifier le mot de passe</a></td>
                    <td><a  href="confirme_delete_user.php?id=<?php echo $affiche_user['id'] ?>" class="col btn btn-danger">Supprimer le compte</a></td> -->
                    </tr>
                </tbody>
            <?php
                    }
                ?>    
            </table>
            
        <!-- End tableau -->
    </div>
           <!-- Script Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>
</html>