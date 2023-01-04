<?php 
    ob_start() 
?> 
<p class="text-warning text-center">Voici le formulaire</p>

        <!-----  DEBUT FORMULAIRE EDIT GAME ----->

<form  method="POST" action="<?= URL ?>figurineadmin/editvalid">

<!----- input recuperant le titre du jeu dans bdd  ----->
<div class="form-group">    
    <label for="image" class="mb-3">Image</label>
     <input type="file" class="form-control" value="<?= $figurine->getImage()?>" name="image" id="image"> <!-- affichage du titre du jeu dans input -->
</div>

<!----- input recuperant le nombre de joueurs du jeu dans bdd  ----->
<div class="form-group mt-5">    
    <label for="nbPlayers" class="mb-3">Nom</label>
    <input type="text" class="form-control" name="name" value="<?= $figurine->getName()?>" id="name"> <!-- affichage du nbPlayers du jeu dans input -->
</div>

<!----- input recuperant le prix du jeu dans bdd  ----->
<div class="form-group">
    <label for="price" class="mb-3">Prix</label>
    <input type="number" class="form-control" name="price" value="<?= $figurine->getPrice()?>">
</div>

<div class="form-group">
    <input type="hidden" class="form-control" name="id" value="<?= $figurine->getId()?>" >
</div>

     <button type="submit" class="btn btn-primary my-5" >Ajouter</button>
</form> 

        <!----- END FORM ----->





<?php

 //  lis et efface la temporisation 
$content= ob_get_clean();
$title=" Editer : " . $figurine->getName();
require_once "base.html.php";

?>