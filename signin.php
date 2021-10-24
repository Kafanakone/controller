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
            <div class="col-lg-6">
                <img src="img/icon-contact.png" alt="icon contact" class="icon-contact" style="max-width: 50px;">
                <div class="left-conteneur-text">
                    <h5>Inscrivez-Vous</h5>
                    <p>Créez un compte gratuit sur Futur Digital </p>
                </div>
                <form action="php/signin_verify.php" method="post">

                    <!-- message user existe -->
                    
                        <?php
                                if(isset($_GET['error']))
                                {
                                    $erreur = htmlspecialchars($_GET['error']);
                                    if ($erreur == 'user_existe') {
                                        ?>
                                        <div class="alert alert-warning" role="alert">
                                         Ce compte existe déjà
                                       </div>
                                        <?php
                                    }
                                }
                
                            ?>
                    
                    
                    <!-- message inscription reussi -->
                    
                       
                        <?php
                                if(isset($_GET['error']))
                                {
                                    $erreur = htmlspecialchars($_GET['error']);
                                    if ($erreur == 'success') {
                        ?>
                                        <div class="alert alert-success" role="alert">
                                            Votre compte a été enregistré avec succès
                                        </div>
                        <?php
                                    }
                                }
                
                        ?>
                   

                    <!-- message formulaire vide -->
                    <div class="text-danger">
                        
                        <?php
                                if(isset($_GET['error']))
                                {
                                    $erreur = htmlspecialchars($_GET['error']);
                                    if ($erreur == 'champ_vide') {
                                        ?>
                                       veuillez rensigner vos informations
                                        <?php
                                    }
                                }
                
                            ?>
                    </div>


                    <div class="pb-4">
                        <label for="name">Nom Complet</label>
                        <input type="text" placeholder="John Nash" id="name" class="form-control" name="fullname" minlength="4" >
                        <div class="text-danger" id="nomincorrect">
                            <!-- message d'erreur sur le nom -->
                            <?php
                                if(isset($_GET['error']))
                                {
                                    $erreur = htmlspecialchars($_GET['error']);
                                    if ($erreur == 'nomincorrect') {
                                        ?>
                                        Le nom est doit être supérieur à quatres (04) caractères
                                        <?php
                                    }
                                
                                

                                }
                
                            ?>
                        </div>
                    </div>


                    <div class="pb-4">
                        <input type="text" name="mail" id="mail" class="form-control " placeholder="Adresse e-mail">
                        <div class="text-danger" id="mailincorrect">
                            <!-- message d'erreur sur le mail -->
                        <?php
                                if(isset($_GET['error']))
                                {
                                    $erreur = htmlspecialchars($_GET['error']);
                                    if ($erreur == 'emailincorrect') {
                                        ?>
                                       veuillez entrer un mail valide
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
                                    <img src="img/oeil.png" alt="" style="width: 20px;" class="cachemotpasse" id="img-oeil" onClick="EtatOeil()">
                                </div> 
                            </div>
                        </div>
                        <p class="text-pass text-muted pb-4">Le mot de passe doit comporter au moins 4 caractères </p>
                        
                        
                        <div class="pb-4">
                            <div class="input-group-prepend">
                                <input type="password" name="motdepasseconfirme" id="motdepasseConfirme" class="form-control " minlength="4" placeholder="Confirmer le mot de passe">    
                                <div class="input-group-text bg-danger"> 
                                    <img src="img/oeil.png" alt="" style="width: 20px;" class="cachemotpasse" id="img-oeilConfirme" onClick="oeilConfirme()">
                                </div>
                            </div>
                            <div class="text-danger" id="motpassconfirmincorrect">
                                 <!-- message d'erreur mdp different -->
                            <?php
                                if(isset($_GET['error']))
                                {
                                    $erreur = htmlspecialchars($_GET['error']);
                                    if ($erreur == 'passworddifferent') {
                                        ?>
                                       Ce mot de passe est different du premier
                                        <?php
                                    }
                                }
                
                            ?>
                            </div>  
                        </div>


                    <input type="checkbox" name="case" id="case" class="form-check-input"><p class="text-check"> J'ai accepté les <a href=""> Conditions générales</a></p>
                   <!-- message accepter les conditions générales 
                   <?php
                                //if(!empty($_POST['case'])){
                                
                               // }else{
                                
                    ?>
                                    <script>
                                        alert(veuillez accepter les condition générale );
                                    </script>
                    <?php
                                //}
                
                    ?> -->
                    
                    <button type="submit" name="submit" class="btn btn-danger p-2 col">S'inscrire</button>
                </form>
            </div>
            <div class="col-lg-4 mt-4 mt-lg-0">
                <img src="img/img-right.png" alt="" class="img-fluid h-100" style="width: 100%;">
            </div>
        </div>
    </div>
<script src="js/oeil.js"></script>
</body>
</html>