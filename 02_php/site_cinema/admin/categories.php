
<?php
  require_once "../inc/functions.inc.php";
  require_once "../inc/header.inc.php";



  if (!empty($_POST)) {    

    // On vérifie si un champs est vide
    $verif = true;
    
    foreach ($_POST as $key => $value) {
      
      if (empty( trim($value) )) {

        $verif = false;
      }
    }
    
    if (!$verif) { // !$verif revient à ($verif == false)
      $info = alert("Veuillez renseigner tout les champs", "danger");
    }
    else {

      // On récupère les valeurs de nos champs et on les stocke dans des variables
      $name = trim($_POST['name']);
      $description = trim($_POST['description']);
     

     

      if (!isset($name) || strlen($name) < 2 || strlen($name) > 30  ) { 
        $info = alert("Le champ nom n'est pas valide", "danger");
      }

      if (!isset($description) || strlen($description) < 20 ) {

        $info .= alert("Le champ description n'est pas valide", "danger");
      }  


      elseif (empty($info)) {

        $catExist = checkCat($name);

        if ($catExist) {
          $info = alert("Cette catégorie existe déjà", "danger");
        }
        elseif (empty($info)) {
       
          insertCat($name, $description);
          $info = alert("La catégorie et sa description est bien enregistrée", "success");
        }
      }
    }
  }

  $categories = allCat();
  // debug($users);

  if (isset($_GET) && isset($_GET['action']) && isset($_GET['id_category'])) {
      
    if ($_GET['action'] == 'delete' && !empty($_GET['id_category'])) {      

      $id_category = htmlentities($_GET['id_category']);

      deleteCat($id_category);     
    }

    if ($_GET['action'] == 'update' && !empty($_GET['id_category'])) {      

      $id_category = htmlentities($_GET['id_category']);

      modifyCat($id_category);     
    }
  }

  // debug($categories);
?>

<main>
  <div class="w-50 m-auto p-5 mb-5" style="background: rgba(20, 20, 20, 0.9);">
    <h2 class="text-center mb-5 p-3">Gestion des catégories</h2>
    <div class="text-center">
      <?php
      // echo $info;
      ?>
    </div>
    <form action="" method="post" class="p-5">
      <div class="row flex-column mb-3">
        <div class="col-12 mb-5">
          <label for="name" class="form-label mb-3">Nom de la catégorie</label>
          <input type="text" class="form-control fs-5" id="name" name="name">
        </div>
        <div class="col-12 mb-5">
          <label for="description" class="form-label">description</label>
          <textarea type="text" class="form-control fs-5" id="description" name="description"></textarea>
        </div>        
        <div class="d-flex flex-column justify-content-center">
          <button class="w-75 mx-auto btn btn-danger btn-lg fs-5" type="submit">Ajouter une catégorie</button>
        </div>
      </div>
    </form>
  </div>
  <div class="d-flex flex-column m-auto mt-5 table-responsive">
  <!-- tableau pour afficher tout les utilisateurs avec des boutons de suppression et de modification -->
  <h2 class="text-center fw-bolder mb-5 text-danger">Liste des catégories</h2>
  <table class="table table-dark table-bordered mt-5">
    <thead>
      <tr>
        <!-- th*5 -->
        <th>ID</th>
        <th>Nom</th>
        <th>Description</th>        
        <th>Supprimer</th>
        <th>Modifier</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($categories as $key => $cat) {
          //$variable as $key => $value
      ?>
        <tr>
          <td><?= $cat['id_category']?></td>
          <td><?= $cat['name']?></td>
          <td><?= $cat['description']?></td>          
          <td class="text-center"><a href="?action=delete&id_category=<?= $cat['id_category']?>"><i class="bi bi-trash3"></i></a></td>
          <td class="text-center"><a href="?action=update&id_category=<?= $cat['id_category']?>"><i class="bi bi-pen"></i></a></td>
        </tr>
      <?php
        }
      ?>
    </tbody>
  </table>

</div>


</main>





<?php
  require_once "../inc/footer.inc.php";
?>