<?php

    //On démarre une nouvelle session
    session_start();

   ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.3/sketchy/bootstrap.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Passero+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css"/>
    <link rel="stylesheet" href="./css/dragonball.view.css"/>
    <script src="https://kit.fontawesome.com/3dbff86484.js" crossorigin="anonymous"></script>
    <title>heroes-collector</title>
</head>
<body class="bg-secondary">
  <header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?= URL ?>accueil"><h1 class="text-warning" id=" site "> Heroes Collector</h1></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            <div class="collapse navbar-collapse" id="navbarColor02">
              <ul class="navbar-nav me-auto">
                <li class="nav-item">
                  <p id="navlink"><a class="nav-link active" href="<?= URL ?>accueil">Accueil
                    <span class="visually-hidden">(current)</span>
                  </a></p>
                </li>
                <li class="nav-item">
                  <p id="navlink"><a class="nav-link" href="precommande"> Precommande</a></p>
                </li>
                <li class="nav-item">
                  <p id="navlink"><a class="nav-link" href="contact">Contact</a></p>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Categorie</a>
                  <div class="dropdown-menu bg-dark">
                    <a class="dropdown-item text-warning" href="<?= URL ?>dragonball">Dragon Ball</a>
                    <a class="dropdown-item text-warning" href="<?= URL ?>onepiece">One Piece</a>
                    <a class="dropdown-item text-warning" href="<?= URL ?>naruto">Naruto</a>
                    
                  </div>
                </li>
              </ul>
       
        </div>                               
       

                                 <!---------- LOGIN ------------->
         <div class="login d-flex flex-column align-self-center">
                <?php 

 // --------------- SI SESSION USERNAME EST VIDE ALORS AFFICHE LE BOUTON DE CONNEXION
            if(empty($_SESSION['username'])){
                ?>
                <ul>
                <li class="nav-item dropstart">
                  <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa-regular fa-circle-user fa-2x hover-zoom" style="color:silver"></i></a>
                  <div class="dropdown-menu">
                <p class ="fw-bold text-warning m-auto text-center"><a href="<?= URL ?>login"> Connectez vous </a></p>
                </div>
                </li>
              </ul>
                <?php 
            } 
// --------------- SINON AFFICHE LE BOUTON DE DECONNEXION
            elseif (!empty($_SESSION['username'])) {
                    ?>
              <ul class="m-auto">
                <li class="nav-item dropstart list-style:none">
                  <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa-regular fa-circle-user fa-2x hover-zoom" style="color:silver"></i></a>
                  <div class="dropdown-menu">
                    <a class="align-self-center" href="<?= URL ?>userprofil"><h3 class="text-center m-auto">Mon compte</h3></a>
                    <hr>
                    <?php
// --------------- SI SESSION USERNAME EST EGAL A ADMIN ALORS AFFICHE LA SECTION ADMIN  
                    if(isset($_SESSION['email']) && ($_SESSION['role'] === 'admin')){ ?>
                      <a class="dropdown-item text-center" href="<?= URL ?>admin">Admin</a>
                      <hr>
                    <?php
                    }  ?>
                <p class ="fw-bold text-warning m-auto text-center text-decoration-none"><a href="<?= URL ?>login/logout"> se deconnecter </a></p>
                </div>
                </li>
              </ul>
                <h4 class="text-warning"><?= $_SESSION['username'] ?></h4>
            
                <?php
                  }
                ?>
      </div>
    </nav>
  </header>
<main>
  <div class="container">
    <h1 id="title" class="my-4 text-center shadow p-2 text-info">
      <?php
      if(empty($_SESSION['username'])){
        
       echo "$title" ;
        
      }
      elseif (!empty($_SESSION['username'])) {
        echo "Les figurines vous souhaitent la bienvenue " . $_SESSION['username'] . " ! ! ";
      }
        ?>

      
      
    </h1>
    <div class="text-center text-warning"><h1><?= $content ?></h1></div>
  </div>
</main>

<footer>
  <section class="bg-primary p-5  fixed text-white text-center mt-5  w-100">
    <p class="font-weight-bold ">Heroes Collector</p>

      <div class="d-flex justify-content-center">
        <i class="fab fa-github fa-2x mx-3"></i>
        <i class="fab fa-linkedin fa-2x mx-3"></i>
        <i class="fab fa-youtube fa-2x mx-3"></i>
        <i class="fab fa-instagram fa-2x mx-3"></i>
        <i class="fab fa-snapchat fa-2x mx-3"></i>
        <i class="fab fa-twitter fa-2x mx-3"></i>
        <i class="fab fa-facebook fa-2x mx-3"></i>
        <i class="fab fa-whatsapp fa-2x mx-3"></i>
      </div>
  </section>
</footer>
    

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" ></script>
</body>
</html>