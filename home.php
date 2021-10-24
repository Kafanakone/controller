<?php 
    session_start();
    require_once 'php/config.php'; // Connexion à la Bd 
   // verification si le user est est connecté
    if(!isset($_SESSION['user'])){
        header('Location: index.php');
        die();
    }

    // On récupere les données de l'utilisateur
    $req = $bdd->prepare('SELECT * FROM users WHERE nom = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="css/style.css" />
  <title>Info School </title>
</head>

<body onclick="welcome()">
  <div class="bg-dark">
    <!-- Message de bienvenue avec le nom de l'user -->
    <div class="alert alert-dark" id="welcome" role="alert">
      Bienvenue <?php echo $_SESSION['user']?> !!
      </div>
      <script>
        function welcome(){
          document.getElementById("welcome").style.display = "none";
        }
      </script>
    <div class="container">
      <div class="row">
        <nav class="col navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="index.html">
                <img src="img/logo.png" width="40" height="30" alt="logo Site"/>
                  Info School 
                </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div id="navbarContent" class="collapse navbar-collapse">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="index.html">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="lessons.html">Cours</a>
              </li>
            </ul>
          </div>
          <a class="col-12 col-md-2 btn btn-danger" href="php/logout.php">Se deconnecter</a>
        </nav>
      </div>
    </div>
  </div>

  <div class="container mt-2">
    <div class="carousel slide" data-ride="carousel" id="carouselControls">
        <div class="carousel-inner">
           <div class="carousel-item active">
              <img src="img/apprenant.jpg" class="d-block w-100" alt="">
           </div>
           <div class="carousel-item">
              <img src="img/apprenant2.jpg" class="d-block w-100" alt="">
           </div>
        </div>
        <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Précédent</span>
         </a>
         <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Suivant</span>
         </a>
     </div>
    <div class="row mt-4">
      <div class="col-12 col-lg-4 mb-4">
        <div class="card shadow">
            <img src="img/certificate.png"  alt="image de certificate" class="card-img-top"/>
          <div class="card-body">
            <h5 class="card-title">Devenez diplômé</h5>
            <p class="card-text">De zéro à héros, obtenez un diplôme en informatique.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4 mb-4">
        <div class="card shadow">
            <img src="img/instruction.png"  alt="image de certificate" class="card-img-top"/>
          <div class="card-body">
            <h5 class="card-title">Formateurs de qualités</h5>
            <p class="card-text">Tous nos cours sont réalisés par les meilleurs informaticiens.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="card shadow">
            <img src="img/job.png"  alt="image de certificate" class="card-img-top"/>
          <div class="card-body">
            <h5 class="card-title">Un travail graranti</h5>
            <p class="card-text">Nous vous garantissons un emploi à l'issue de votre formation.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-light mt-5 p-3">
    <div class="container">
      <div class="row">
        <div class="col">
          <ul class="list-inline text-center">
            <li class="list-inline-item"><a href="#">À propos</a></li>
            <li class="list-inline-item">&middot;</li>
            <li class="list-inline-item"><a href="#">Vie privée</a></li>
            <li class="list-inline-item">&middot;</li>
            <li class="list-inline-item"><a href="#">Conditions d'utilisations</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  </div>
  

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>