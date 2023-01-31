<?php


ob_start() 
?>
<h2>Votre panier</h2>

<section>
    <table class="w-75 m-auto">
        
            <tr>
                <th class="bg-primary">Figurine</th>
                <th class="bg-primary">Prix</th>
                <th class="bg-primary">Quantité</th>
                <th class="bg-primary">Action</th>
            </tr>
            <tr>
                <?php foreach ($paniers as $panier) : ?>
                <td class="bg-secondary"><?= $panier->getName() ?></td>
                <td class="bg-secondary"><?= $panier->getPrice()?></td>
                <td class="bg-secondary"><?= $panier->getQuantity()?></td>
                <td class="bg-secondary"><button class="btn" type="submit"><i class="fa-solid fa-trash"></i></button></td>
            </tr>
            <?php endforeach ?>
            <tr>
                <th class="bg-primary justify-content-start">Total : €</th>
            </tr>  
    </table>
     <button class="btn" type="submit">Valider la commande</button>
</section>


<?php

$content = ob_get_clean();
$title = "Votre panier";
require_once "base.html.php";

?>