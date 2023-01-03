<?php

ob_start() 
?>

<!-- DEBUT DU FRONT -->
<div class = "container">
    <div class="d-flex flex-wrap justify-content-around">

        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <hr>
            <div class="card-body">                  
                <p class="card-text">Gestion Dragon Ball</p>
                <a href="<?= URL ?>dragonballadmin" class="btn btn-primary">Setting</a>
            </div>
        </div>




        <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <hr>
        <div class="card-body">
            <p class="card-text">Gestion Naruto</p>
            <a href="<?= URL ?>narutoadmin" class="btn btn-primary">Setting</a>
        </div>
        </div>




        <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <hr>
        <div class="card-body">
            <p class="card-text">Gestion One Piece</p>
            <a href="<?= URL ?>onepieceadmin" class="btn btn-primary">Setting</a>
        </div>
        </div>

        <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <hr>
        <div class="card-body">
            <p class="card-text">Gestion Users</p>
            <a href="<?= URL ?>useradmin" class="btn btn-primary">Setting</a>
        </div>
        </div>
    </div>
</div>


<?php

$content = ob_get_clean();
$title = "admin";
require_once "base.html.php";

?>
