<?php ob_start(); ?>

<p> Inscription </p>

<form class=" form row  d-flex flex-wrap justify-content-between m-auto  " enctype="multipart/form-data" method="POST" action="<?= URL?>inscription/validation"  >
  <!-- EMAIL -->

  <div class="col-sm-8 col-md-5 mt-3">
    <label for="email" class="form-label"> Votre email :</label>
    <input type="email" class="form-control bg-info bg-opacity-10 border border-success" id="email" name="email" placeholder="Entrez votre email" required  >
  </div>
  

  <!-- USERNAME  -->

  <div class="col-sm-8 col-md-5 mt-3">
    <label for="username" class="form-label"> Votre identifiant :</label>
    <input type="text" class="form-control bg-info bg-opacity-10 border border-success" id="username" name="username" placeholder="Entrez un identifiant" required  >
  </div>
  
  
  <!-- PASSWORD -->

  <div class="col-sm-8 col-md-5 mt-3">
    <label for="pass" class="form-label"> Votre mot de passe :</label>
    <input type="password" class="form-control bg-info bg-opacity-10 border border-success" id="MdP" name="MdP" placeholder="Entrez un mot de passe" required  >
  </div>

<!-- CONDITION -->

  <div class="col-12 mt-3">
    <div class="form-check">
      <input class="form-check-input bg-info bg-opacity-10 border border-success" type="checkbox" value="" id="invalidCheck2" >
      <label class="form-check-label" for="invalidCheck2">
        Agree to terms and conditions
      </label>
    </div>
  </div> 

  <div class="col-1 m-auto mb-3">
    <button class="btn btn-success" type="submit">Inscription</button>
  </div>
</form>


<?php


$content = ob_get_clean();
$title = "Bienvenue dans le monde des figurines";
require_once "base.html.php";

?>