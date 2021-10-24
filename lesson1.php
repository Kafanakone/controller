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
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="stylesheet" href="css/style.css" />
      <title>Info School</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="img/logo.png" width="50" height="50" alt="Info Logo" />
          Info School
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="home.php">Accueil</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="lessons.php">Cours</a>
            </li>
          </ul>
        </div>
      </div>
      <a class="col-12 col-md-2 btn btn-danger" href="php/logout.php">Se deconnecter</a>

    </nav>
    <div class="container mt-4">
      <div class="alert alert-info alert-dismissible fade show" role="alert">
       <h5 class="alert-heading">Prérequis</h5>
       <p>Bases en CSS. Si vous ne les maîtrisez pas, suivez ce cours : <a href="" class="alert-link"> Apprenez à créer votre site web avec HTML5 et CSS3</a></p>
       <button type="button" class="close" data-dismiss="alert" aria-label="close">
          <span aria-hidden="true">x</span>
       </button>
     </div>
      <div class="row">
        <div class="col">
          <h1>Créez des animations CSS</h1>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/lOox4UJVFb4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen> </iframe>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <h2 class="mb-3">À la fin de ce cours, vous serez capable de :</h2>
          <ul>
            <li>réaliser vos premières animations CSS ;</li>
            <li>maîtriser les translations, les rotations et l’opacité ;</li>
            <li>réaliser des animations dynamiques.</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col">
          <hr>
          <h3 class="mb-4 mt-3">Notes</h3>
          <form>
            <div class="form-group">
              <label for="timeInput">Temps :</label>
              <input type="text" class="form-control" id="timeInput" placeholder="mm:ss" aria-describedby="timeHelp">
            </div>
            <div class="form-group">
              <label for="note">Note :</label>
              <textarea id="note" rows="5" class="form-control" required></textarea>
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                  Rendre cette notation publique
                </label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
          </form>
        </div>
      </div>
    </div>
    </div>
    <div class="bg-light">
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


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
  </html>