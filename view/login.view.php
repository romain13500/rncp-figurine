<?php 
ob_start() 

?>

<p> Connexion </p>

<form class=" form row  d-flex flex-wrap flex-column justify-content-between m-auto border border-warning " enctype="multipart/form-data" method="POST" action="<?= URL ?>login/connexion">
<div class="mb-3 w-50 m-auto">
        <label for="email" class="form-label">Votre email :</label>
        <input type="email" class="form-control bg-info bg-opacity-10 border border-success" id="email" name="email" value="">
    </div><br>    
    <div class="mb-3 w-50 m-auto">
        <label for="pass" class="form-label">Password :</label>
        <input type="password" class="form-control bg-info bg-opacity-10 border border-success" id="MdP" name="MdP" value="">
    </div>
        <p class="small"><a class="text-success" href="forget-password.html">Forgot password?</a></p>
    <div class="d-grid">
        <button class="btn btn-success w-50 m-auto" type="submit" id="connexion" name="connexion"> Connexion</button>
    </div>
                
    <div class="mt-3">
        <p class="mb-0  text-center">Vous n'avez pas encore de compte ? <a href="<?= URL ?>inscription"
                class="text-success fw-bold">Inscription </a>
        </p>
    </div>
</form>


<?php
$content = ob_get_clean();
$title = "Bienvenue dans le monde des figurines";
require_once "base.html.php";
?>