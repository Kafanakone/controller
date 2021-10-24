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
    <div class="container">
        <div class="row">
            <div class="col-lg-5 mx-auto text-center mt-5">
            <img src="img/homme3.png" alt="" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                <div class="">
                    <h5>Connectez-Vous</h5>
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
            </div>
        </div>
    </div>
</body>
</html>