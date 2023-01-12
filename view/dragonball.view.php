
<!-- DEBUT DU FRONT -->
<div>
    <h2>Dragon Ball</h2>  
    <iframe width="800" height="400" src="https://www.youtube.com/embed/rbgcjUhtgnE?autoplay=1&mute=1&loop=1"></iframe>  
</div>

<div class="container">
    <div class="drangonball">
        <div class="row">
            <div class="d-flex flex-wrap my-5 ">
            
         <!-- BOUCLE SUR LE TABLEAU FIGURINE ET AFFICHER -->
                <?php foreach ($figurines as $figurine) :
           
                    if($figurine->getManga() != 1) {
                        continue;
                    }
                ?> 
                <div class="cards m-auto bg-primary rounded shadow mb-5" style="width: 20rem;">

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
</div>

<?php

$content = ob_get_clean();
$title = "Dragon Ball";
require_once "base.html.php";

?>