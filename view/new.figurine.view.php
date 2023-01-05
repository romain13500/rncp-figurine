<?php 
    ob_start() 
?> 
<p class="text-warning text-center">Voici le formulaire</p>


<form  method="POST" action="<?= URL ?>figurineadmin/validation">

<div class="form-group">
    <label for="image">Image</label>
    <input type="text" class="form-control" name="image" id="image" required>
</div>

<div class="form-group">
    <label for="name">Nom</label>
    <input type="text" class="form-control" name="name" id="name" required>
</div>
<div class="form-group">
    <label for="price">Prix</label>
    <input type="number" class="form-control" name="price" id="price" required>
</div>

<fieldset class="form-group">
      <legend class="mt-5 mb-5">Manga</legend>
      <div class="d-flex flex-wrap justify-content-between my-5">

      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="1" id="dragonball" name="manga">
        <label class="form-check-label" for="manga">
          Dragon Ball
        </label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="2" id="onepiece" name="manga">
        <label class="form-check-label" for="manga">
          One Piece
        </label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="3" id="naruto" name="manga">
        <label class="form-check-label" for="manga">
          Naruto
        </label>
    </div>
    </fieldset>

<button type="submit" class="btn btn-primary">Ajouter</button>
</form> 




<?php

 //  lis et efface la temporisation 
$content= ob_get_clean();
$title=" ajouter un jeu";
require_once "base.html.php";

?>