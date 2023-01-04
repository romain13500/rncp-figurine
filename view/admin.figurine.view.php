<?php


ob_start() 
?>

<!-- DEBUT DU FRONT -->
<section class ="container">
  <table class="table table-hover table-primary text-center m-auto">
    <thead>
      <tr>
        <th>Image</th>
        <th>Nom</th>
        <th>Prix</th>
        <th scope="col" colspan="2">Action</th>  <!--  colspan pour icon edit et trash -->
      </tr>
    </thead>
  <tbody>

    <!-- ON BOUCLE LE TABLEAU "$dragonballs"   -->

    <?php foreach ($figurines as $figurine) : ?> 
      <tr class="table-info">
        <td><?= $figurine->getImage() ?></td>
        <td><?= $figurine->getName() ?></td>
        <td><?= $figurine->getPrice() ?></td>
        <td>
         <form action="<?= URL ?>figurineadmin/edit/<?= $figurine->getId() ?>" method="POST" onSubmit=" return confirm('Voulez vous modifier le jeu ?')">
            <button class="btn" type="submit"><i class="fa-solid fa-edit"></i></button> <!-- colspan 2 pour 2 icone dans la colone -->
          </form>
        </td>  
        <td>
        <form action="<?= URL ?>figurineadmin/delete/<?= $figurine->getId() ?>" method="POST"
              onSubmit=" return confirm('Voulez vous supprimer la figurine ?')">
          <button class="btn" type="submit"><i class="fa-solid fa-trash"></i></button>
        </form>
    </td>
    </tr>
      
    <?php endforeach; ?>

    <!-- FIN DE LA BOUCLE  -->

  </tbody>
</table>

<a href="<?= URL ?>figurineadmin/add" class="btn btn-primary w-25 d-block m-auto mt-3 rounded"> 
    Ajouter un jeux 
  <br><i class="fa-solid fa-gamepad fa-2x"></i>
</a>
</section>


<?php
$content = ob_get_clean();
$title = "Gestion Dragon Ball";
require_once "base.html.php";
?>
