<?php


ob_start() 
?>

<!-- DEBUT DU FRONT -->

<container>
    
<form  method="POST" action="<?= URL ?>useradmin/editvalidation" onSubmit=" return confirm('Voulez vous modifier l'utilisateur' ?')">
<div class="form-group">
    <label for="title">Email</label>
    <input type="text" class="form-control" value="<?= $user->getEmail()?>" name="email" id="title">
</div>
<div class="form-group">
    <label for="nbPlayers">Identifiant</label>
    <input type="text" class="form-control" name="username" value="<?= $user->getUsername()?>" id="nbPlayers">
</div>
<div class="form-group">
    <label for="nbPlayers">Mot de passe</label>
    <input type="text" class="form-control" name="MdP" value="<?= $user->getMdP()?>" id="nbPlayers">
</div>
<div class="form-group">
    
    <input type="hidden" class="form-control" name="id" value="<?= $user->getId()?>" >
</div>
<button type="submit" class="btn btn-primary my-5">Modifier</button>
</form> 
    
</container>

<?php

$content = ob_get_clean();
$title = "USERS";
require_once "base.html.php";

?>
