<?php 
ob_start();


?>
<div>
    <h1>Votre compte :</h1>
</div>

<div class="container">
    <div class="row">

        <label for="email"> Votre email :</label>
            <p><?= $_SESSION['email']?></p>

        <label for="username"> Votre identifiant :</label>
            <p><?= $_SESSION['username']?></p>

        <label for="MdP"> Votre mot de passe :</label>
         <p><?= $_SESSION['MdP']?></p>
        <div class="d-flex flex-wrap justify-content-around">
            <form  method="POST" action="userprofil/edit/">
                <button type="button" class="btn btn-info w-100"><a href="<?= URL ?>userprofil/edit/">Modifier</a></button>
            </form>
            <form  method="POST" action="">
                <button type="button" class="btn btn-danger w-100"><a href="<?= URL ?>userprofil/delete/">Supprimer</a></button>
            </form>
        </div>


    </div>
</div>

<?php
$content = ob_get_clean();
$title = "Bienvenue dans le monde des figurines";
require_once "base.html.php";


?>