<?php 
ob_start(); 
?>
<div>
    <h1>Votre compte :</h1>
</div>

<div class="container">
    <div class="row">

<label for="firstname"> Votre prénom :</label>
<input type="text" value="" name="username" id="" >

<label for="lastname"> Votre nom :</label>
<input type="text" value="" name="lastname" id="">

<label for="MdP"> Votre mot de passe :</label>
<input type="password" value="" name="MdP" id="MdP">

</div>
</div>
<?php
$content = ob_get_clean();
$title = "Bienvenue dans le monde des figurines";
require_once "base.html.php";


?>