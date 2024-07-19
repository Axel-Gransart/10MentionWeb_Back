<?php
  require_once "../inc/functions.inc.php";

   // Gestion de l'accessibilité des pages admin

   $info = "";
  
   if (empty($_SESSION['user'])) {
    
    header('location:' . RACINE_SITE . 'authentification.php');
  }
  else {
    
    if ($_SESSION['user']['role'] == 'ROLE_USER') {
      
      header('location:' . RACINE_SITE . 'index.php');      
    }
  }

 // Supression et modification d'une catégorie

if (isset($_GET) && isset($_GET['action']) && isset($_GET['id_category']) && !empty($_GET['action']) && !empty($_GET['id_category'])) {

  $idCategory = htmlentities($_GET['id_category']);

  if(is_numeric($idCategory)){

    $category = checkCatId($idCategory);

    if($category){

      if ($_GET['action'] == 'delete') {

        deleteCat($idCategory);

      }
      if ($_GET['action'] != 'update') {

        header('location:categories.php');

      }
    }
    else {
        header('location:categories.php');
    }
  }
  else {

    header('location:categories.php');

  }
}



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
     
     

      if (!isset($name) || strlen($name) < 2 || preg_match('/[0-9]/', $name)  ) { 

        $info = alert("Le nom de la catégorie n'est pas valide", "danger");
      }

      if (!isset($description) || strlen($description) < 20 ) {

        $info .= alert("La description n'est pas valide", "danger");
      }  

      elseif (empty($info)) {
        // on vérifie si la catégorie existe dans la BDD

        // $name = strtolower($name);
        $name = htmlentities($name);
        $categoryBdd = checkCat($name);
        // debug($name);

        if ($categoryBdd) {

          $info .= alert("la catégorie existe déjà", "danger");
        }
        else {

          $description = htmlentities($description);

          if(isset($_GET) && isset($_GET['action']) == 'update' && !empty($_GET['id_category'])) {

            $id_category = htmlentities($_GET['id_category']);
            modifyCat($id_category, $name, $description);
            header('location:categories.php');
          }
          else {
              
            InsertCat($name, $description);

          }
        }        
      }
    }
  }

  $categories = allCat();
  // debug($users);

 

  require_once "../inc/header.inc.php";
?>

<main>
  <div class="w-50 m-auto p-5 mb-5" style="background: rgba(20, 20, 20, 0.9);">
    <h2 class="text-center mb-5 p-3">Gestion des catégories</h2>
    <div class="text-center">
      <?= $info; ?>
    </div>
    <form action="" method="post" class="p-5">
      <div class="row flex-column mb-3">
        <div class="col-12 mb-5">
          <label for="name" class="form-label mb-3">Nom de la catégorie</label>
          <!-- <input type="text" class="form-control fs-5" id="name" name="name" value="<?//=isset($category)? $category['name'] : '' ?>">; -->
          <input type="text" class="form-control fs-5" id="name" name="name" value="<?=$category['name'] ?? '' ?>">
          <!--  le '??' est appelée l'opérateur de coalescence nulle en PHP. Cet opérateur permet de vérifier si une variable est définie et nulle, et de fournir une valeur par défaut si ce n'est pas le cas. -->

        </div>
        <div class="col-12 mb-5">
          <label for="description" class="form-label">description</label>
          <textarea type="text" class="form-control fs-5" id="description"
            name="description"><?=isset($category)? $category['description'] : '' ?></textarea>
        </div>
        <div class="d-flex flex-column justify-content-center">
          <button class="w-75 mx-auto btn btn-danger btn-lg fs-5"
            type="submit"><?=isset($category) ? 'Modifier la catégorie' : 'Ajouter une catégorie' ?></button>
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
          <td><?= html_entity_decode(ucfirst($cat['name']))?></td>
          <!-- ucfirst() permet de mettre la première lettre en majuscule -->
          <td><?=substr(html_entity_decode($cat['description']), 0, 100 ) . " ..." ?></td>
          <!--Convertit les entités HTML à leurs caractères correspondant -->

          <td class="text-center"><a href="?action=delete&id_category=<?= $cat['id_category']?>"><i
                class="bi bi-trash3"></i></a></td>
          <td class="text-center"><a href="?action=update&id_category=<?= $cat['id_category']?>"><i
                class="bi bi-pen"></i></a></td>
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