<!-- DEBUT DU FRONT -->
<div>
    <img class="w-75" src="./image/dragonball/shenron.jpeg" alt="img">
</div>
<container>
    <div id="drangonball">
    <div class="row">
        <div class="d-flex flex-wrap my-5 ">
            
 <!-- BOUCLE SUR LE TABLEAU FIGURINE ET AFFICHER -->
           <?php foreach ($figurines as $figurine) :
           
                    if($figurine->getManga() != 1) {
                        continue;
                    }
            ?> 
            <div class="card m-auto" style="width: 18rem;">

                <img src="<?= $figurine->getImage() ?>" alt="img">

                <hr>
                    <div class="card-body">
                        <h5 class="card-title"><?= $figurine->getName() ?></h5>
                        <p class="card-text">Prix : <?= $figurine->getPrice() ?> euro</p>
                        <a href="#" class="btn btn-primary">Acheter</a>
                    </div>
            </div>
           <?php endforeach ?>
        </div>
    </div> 
    </div>
</container>

<?php

$content = ob_get_clean();
$title = "Dragon Ball";
require_once "base.html.php";

?>