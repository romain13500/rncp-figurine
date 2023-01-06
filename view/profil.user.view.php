<?php 
ob_start(); 
?>
<div>
    <h1>Votre compte :</h1>
</div>

<div class="container">
    <div class="row">

        <label for="firstname"> Votre email :</label>
            <p><?= $_SESSION['email']?></p>

        <label for="lastname"> Votre identifiant :</label>
            <input type="text" value="<?= $_SESSION['username']?>" name="username" id="">

        <label for="MdP"> Votre mot de passe :</label>
            <input type="password" value="<?= $_SESSION['MdP']?>" name="MdP" id="MdP">

    </div>
</div>

<?php
$content = ob_get_clean();
$title = "Bienvenue dans le monde des figurines";
require_once "base.html.php";


?>