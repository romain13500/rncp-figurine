<?php 
    ob_start() 
?> 
<p class="text-warning text-center">Voici le formulaire</p>


<form  method="POST" action="<?= URL ?>dragonballadmin/validation">

<div class="form-group">
    <label for="image">Image</label>
    <input type="file" class="form-control" name="image" id="image" required>
</div>

<div class="form-group">
    <label for="name">Nom</label>
    <input type="text" class="form-control" name="name" id="name" required>
</div>
<div class="form-group">
    <label for="price">Prix</label>
    <input type="number" class="form-control" name="price" id="price" required>
</div>
<button type="submit" class="btn btn-primary">Ajouter</button>
</form> 




<?php

 //  lis et efface la temporisation 
$content= ob_get_clean();
$title=" ajouter un jeu";
require_once "base.html.php";

?>