<?php ob_start() ?>

<p> Precommande </p>




<?php

$content = ob_get_clean();
$title = "Bienvenue dans le monde des figurines";
require_once "base.html.php";

?>