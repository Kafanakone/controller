<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/oeil.js"></script>
    <title>Inscription</title>
</head>
<body>
    <style>
        body{
            background-image: url("img/bg_index.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        h3, h6{
            font-family: roboto !important;
            text-align:center;
            padding-bottom: 0.5em;
            /* text-transform: uppercase; */
        }
        .bg{
            background-color: rgba(220, 53, 69, 0.9);
        }
        .fw{
            font-weight: bold;
            font-size: 1.1em;
        }
    </style>
    <div class="container">
        <div class="row mx-auto text-center mt-3 p-5 rounded-lg bg">
        <div class="col col-lg-5 mx-auto text-center text-white fw">
            <img src="img/cours.png" alt="" class="img-fluid mx-auto">
            <p>Apprenez à apprendre.
                    Découvrez les compétences de demain.
                    Et prenez votre carrière en main.
            </p>

        </div>

        <!-- Form -->
            <div class=" col-12 mt-4 col-lg-6 bg-light p-4 mx-lg-auto">
            <!-- <img src="img/homme3.png" alt="" class="img-fluid rounded-circle" style="width: 150px; height: 150px;"> -->
                <div class="">
                    <h3 class="text-danger ">Votre avenir commence ici</h3>
                    <h6 class=" lead">Connectez-Vous pour continuer</h6>
                </div>
                <form action="php/signup_verify.php" method="post" class="">
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
                                        case 'Dontuser':
                                            
                        ?>
                                            <div class="alert alert-warning" role="alert">
                                            Ce compte n'existe pas
                                            </div>
                        <?php
                                        break;
                                        case 'emailincorrect':
                        ?>
                                            <div class="alert alert-warning" role="alert">
                                            Format de mail incorrect
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
                        <input type="email" name="mail" id="mail" class="form-control " placeholder="Adresse e-mail">
                        
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
                            <form action="" method="post">
                            <div class="input-group-prepend">
                                <input type="password" name="motdepasse" id="motdepasse" class="form-control" minlength="4" placeholder="Mot de passe">
                                <div class="input-group-text bg-danger"> 
                                    <img src="img/oeil.png" alt="" style="width: 20px;" class="cachemotpasse" id="img-oeil" onClick="EtatOeil()">
                                </div> 
                            </div>
                            
                            <div class="text-danger" id="motpassincorrect">
                                
                            </div>  

                        </div>
                    <button type="submit" class="btn btn-danger my-3 p-2 col">Se connecter</button>
                        </form>
                        <h6 class=" lead">Vous n'avez pas de compte ? </h6>
                        <p><a href="signin.php" class="text-danger fw">Inscrivez-vous ici</a></p>

            </div><!-- End form -->
        </div> 
        
    </div>
</body>
</html>