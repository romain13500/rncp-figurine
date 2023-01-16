<?php ob_start() ?>

<p> Precommande </p><br>
    <div class="row">
        <div class="d-flex flex-wrap">

                <div class="cards m-auto bg-primary rounded shadow mb-5" style="width: 20rem;">
                    <img class="rounded-top w-100" src="https://www.figurine-collector.fr/62591-thickbox_default/banpresto-dragon-ball-legends-collab-super-saiyan-gotenks-17cm.jpg" alt="img">
                        <hr>
                            <div class="card-body">
                                <h5 class="card-title">Gotenks</h5>
                                <p class="card-text">Prix : 30 euro</p>
                                <a href="#" class="btn btn-primary">Precommande</a>
                            </div>
                </div>

                <div class="cards m-auto bg-primary rounded shadow mb-5" style="width: 20rem;">
                    <img class="rounded-top w-100" src="https://www.figurine-collector.fr/62354-thickbox_default/tsume-dragon-ball-z-hqs-statue-freezer-4th-form-76cm.jpg">
                        <hr>
                            <div class="card-body">
                                <h5 class="card-title">Freezer</h5>
                                <p class="card-text">Prix : 1300 euro</p>
                                <a href="#" class="btn btn-primary">Precommande</a>
                            </div>
                </div>

                 <div class="cards m-auto bg-primary rounded shadow mb-5" style="width: 20rem;">
                    <img class="rounded-top w-100" src="https://www.figurine-collector.fr/41557-thickbox_default/banpresto-dragonball-super-broly-super-master-stars-piece-gogeta-blue-god-34cm.jpg">
                        <hr>
                            <div class="card-body">
                                <h5 class="card-title">Gogeta</h5>
                                <p class="card-text">Prix : 80 euro</p>
                                <a href="#" class="btn btn-primary">Precommande</a>
                            </div>
                </div>
            </div>
        </div>
            
    </div>

<?php

$content = ob_get_clean();
$title = "Bienvenue dans le monde des figurines";
require_once "base.html.php";

?>