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
            <td class="bg-secondary">Vegeta</td>
            <td class="bg-secondary">10€</td>
            <td class="bg-secondary">1</td>
            <td class="bg-secondary">10€</td>
            <td class="bg-secondary"><button class="btn" type="submit"><i class="fa-solid fa-trash"></i></button></td>
        </tr>
        <tr>
            <th class="bg-primary justify-content-start">Total : 10€</th>
        </tr>

    </table>
</section>


<?php

$content = ob_get_clean();
$title = "Votre panier";
require_once "base.html.php";

?>