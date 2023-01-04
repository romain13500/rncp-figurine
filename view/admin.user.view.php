<?php


ob_start() 
?>

<!-- DEBUT DU FRONT -->

<section class ="container">
  <table class="table table-hover table-primary text-center m-auto">
    <thead>
      <tr>
        <th>Email</th>
        <th>Username</th>
        <th>Mot de passe</th>
        <th scope="col" colspan="2">Action</th>  <!--  colspan pour icon edit et trash -->
      </tr>
    </thead>
  <tbody>

    <!-- ON BOUCLE LE TABLEAU "$dragonballs"   -->

    <?php foreach ($users as $user) : ?> 
      <tr class="table-info">
        <td><?= $user->getEmail() ?></td>
        <td><?= $user->getUsername() ?></td>
        <td><?= $user->getMdP() ?></td>
        <td>
         <form action="<?= URL ?>useradmin/edit/<?= $user->getId() ?>" method="POST" >
            <button class="btn" type="submit"><i class="fa-solid fa-edit"></i></button> <!-- colspan 2 pour 2 icone dans la colone -->
          </form>
        </td>  
        <td>
        <form action="<?= URL ?>useradmin/delete/<?= $user->getId() ?>" method="POST"
              onSubmit=" return confirm('Supprimer ce user ?')">
          <button class="btn" type="submit"><i class="fa-solid fa-trash"></i></button>
        </form>
    </td>
    </tr> 
    <?php endforeach; ?>

    <!-- FIN DE LA BOUCLE  -->

  </tbody>
</table>


<?php
$content = ob_get_clean();
$title = "Gestion des utilisateurs";
require_once "base.html.php";
?>