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
            <p class="card-text">Gestion Users</p>
            <a href="<?= URL ?>useradmin" class="btn btn-primary">Setting</a>
        </div>
        </div>

        <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <hr>
        <div class="card-body">
            <p class="card-text">Gestion Figurine</p>
            <a href="<?= URL ?>figurineadmin" class="btn btn-primary">Setting</a>
        </div>
        </div>

    </div>
</div>


<?php

$content = ob_get_clean();
$title = "admin";
require_once "base.html.php";

?>
