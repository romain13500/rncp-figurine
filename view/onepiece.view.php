<!-- DEBUT DU FRONT -->
<div>
    <h2>One Piece</h2>
    <iframe width="800" height="400" src="https://www.youtube.com/embed/A3b5XJCFiU8?autoplay=1&mute=1&loop=1"></iframe>
</div>
<container>
    <div id="drangonball">
    <div class="row">
        <div class="d-flex flex-wrap my-5 ">
            
 <!-- BOUCLE SUR LE TABLEAU FIGURINE ET AFFICHER -->
           <?php foreach ($figurines as $figurine) :
           
                    if($figurine->getManga() != 2) {
                        continue;
                    }
            ?> 
            <div class="cards m-auto bg-dark rounded shadow" style="width: 18rem;">

                <img class="rounded-top w-100" src="<?= $figurine->getImage() ?>" alt="img">

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
$title = "One Piece";
require_once "base.html.php";

?>