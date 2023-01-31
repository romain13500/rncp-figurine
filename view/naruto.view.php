<!-- DEBUT DU FRONT -->
<h2>Naruto</h2>
<div class="d-flex flew-wrap justify-content-center">
    
    <iframe width="800" height="400" src="https://www.youtube.com/embed/5H0CNZrsbK8?autoplay=1&mute=1&loop=1"></iframe>
</div>
<container>
    <div id="drangonball">
    <div class="row">
        <form class="d-flex flex-wrap my-5" method="post" action="<?= URL ?>addPanier">
            
                <!-- BOUCLE SUR LE TABLEAU FIGURINE ET AFFICHER -->
        <?php foreach ($figurines as $figurine) :
           
                    if($figurine->getManga() != 3) {
                        continue;
                    }
            ?> 
            <div class="cards m-auto bg-primary rounded shadow mb-5" style="width: 18rem;">

                <img class="rounded-top w-100" src="<?= $figurine->getImage() ?>" alt="img">

                    <hr>
                    <div class="card-body">
                        <h5 class="card-title"><?= $figurine->getName() ?></h5>
                        <p class="card-text">Prix : <?= $figurine->getPrice() ?> euro</p>
                        <button class=" btn btn-secondary mb-3" type="submit">Acheter</button>

                    </div>
                    
            </div>
        <?php endforeach ?>
        </form>
    </div> 
    </div>
</container>

<?php

$content = ob_get_clean();
$title = "Naruto";
require_once "base.html.php";

?>