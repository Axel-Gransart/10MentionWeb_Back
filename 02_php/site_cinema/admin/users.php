
<?php
  require_once "../inc/functions.inc.php";  

  $users = allUsers();
  // debug($users);

  if (isset($_GET) && isset($_GET['action']) && isset($_GET['id_user'])) {
      
    if ($_GET['action'] == 'delete' && !empty($_GET['id_user'])) {      

      $idUser = htmlentities($_GET['id_user']);
      deleteUser($idUser);

      /*
        htmlentities :convertit tous les caractères applicables en entités HTML. Cela inclut non seulement les caractères spéciaux comme htmlspecialchars, mais aussi d'autres caractères qui ont des entités HTML (comme les caractères accentués) exemple.

        é devient &eacute;
        © devient &copy;
      */
    }

    if ($_GET['action'] == 'update' && !empty($_GET['id_user'])) {      

      $idUser = htmlentities($_GET['id_user']);
      $user = showUser($idUser);

      if ( $user['role'] == 'ROLE_ADMIN') {

        modifyRole($idUser, 'ROLE_USER');      
      }
      else {
        modifyRole($idUser, 'ROLE_ADMIN');
      }

    }

    header('location:users.php');

  }
  
  // Gestion de l'accessibilité des pages admin
  
  if (empty($_SESSION['user'])) {
    
    header('location:' . RACINE_SITE . 'authentification.php');
  }
  else {
    
    if ($_SESSION['user']['role'] == 'ROLE_USER') {
      
      header('location:' . RACINE_SITE . 'index.php');      
    }
  }
  
  require_once "../inc/header.inc.php";
  ?>

<div class="d-flex flex-column m-auto mt-5 table-responsive">
  <!-- tableau pour afficher tout les utilisateurs avec des boutons de suppression et de modification -->
  <h2 class="text-center fw-bolder mb-5 text-danger">Liste des utilisateurs</h2>
  <table class="table table-dark table-bordered mt-5">
    <thead>
      <tr>
        <!-- th*14 -->
        <th>ID</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>Pseudo</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Civility</th>
        <th>Address</th>
        <th>Zip</th>
        <th>City</th>
        <th>Country</th>
        <th>Rôle actuel</th>
        <th>Supprimer</th>
        <th>Modifier Le rôle</th>
      </tr>
    </thead>
    <tbody>

      <?php

        foreach ($users as $key => $user) {
          //$variable as $key => $value
      ?>
        <tr>
          <td><?= $user['id_user']?></td>
          <td><?= $user['firstName']?></td>
          <td><?= $user['lastName']?></td>
          <td><?= $user['pseudo']?></td>
          <td><?= $user['email']?></td>
          <td><?= $user['phone']?></td>
          <td><?= $user['civility']?></td>
          <td><?= $user['address']?></td>
          <td><?= $user['zip']?></td>
          <td><?= $user['city']?></td>
          <td><?= $user['country']?></td>
          <td><?= $user['role']?></td>
          <td class="text-center"><a href="?action=delete&id_user=<?= $user['id_user']?>"><i class="bi bi-trash3"></i></a></td>
          <td class="text-center">
            <a class="btn btn-danger" href="?action=update&id_user=<?= $user['id_user']?>">
              <?= $user['role'] == "ROLE_ADMIN" ? "Role_user" : "Role_admin" ?>
            </a>
          </td>
        </tr>
      <?php
        }
      ?>
    </tbody>
  </table>

</div>

<?php
  require_once "../inc/footer.inc.php";
?>