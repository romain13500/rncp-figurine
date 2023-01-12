<?php ob_start(); 

?>

<form action="" method="post">
    <div class="border border-solid">
        <div>
        <label for="name">Nom :</label>
        <input type="text" id="name" name="user_name">
    </div>
    <div>
        <label for="mail">e-mail&nbsp;:</label>
        <input type="email" id="mail" name="user_mail">
    </div>
    <div>
        <label for="msg">Message :</label>
        <textarea id="msg" name="user_message"></textarea>
    </div>
    <button>Envoyer</button>
</div>
</form>

<?php

$content = ob_get_clean();
$title = "Contact";
require_once "base.html.php";

?>