<?php


ob_start() 
?>

<!-- DEBUT DU FRONT -->

<container>
    
<form  method="POST" action="<?= URL ?>userprofil/editvalidation" >
<div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" value="<?=$_SESSION['email'] ?>" name="email" id="email">
</div>
<div class="form-group">
    <label for="username">Identifiant</label>
    <input type="text" class="form-control" name="username" value="<?= $_SESSION['username']?>" id="username">
</div>
<div class="form-group">
    <label for="MdP">Mot de passe</label>
    <input type="text" class="form-control" name="MdP" value="<?= $_SESSION['MdP']?>" id="MdP">
</div>
<div class="form-group">
    
    <input type="hidden" class="form-control" name="id" value="<?= $_SESSION['id']?>" >
</div>
<button type="submit" class="btn btn-primary my-5">Modifier</button>
</form> 
    
</container>

<?php

$content = ob_get_clean();
$title = "Vos informations";
require_once "base.html.php";

?>
