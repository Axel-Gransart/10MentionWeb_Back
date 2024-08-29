<?php
  require_once "../inc/functions.inc.php";

   ################### Gestion de l'accessibilité des pages admin ###################
  
  if (empty($_SESSION['user'])) {
    
    header('location:' . RACINE_SITE . 'authentification.php');
  }
  else {
    
    if ($_SESSION['user']['role'] == 'ROLE_USER') {
      
      header('location:' . RACINE_SITE . 'index.php');      
    }
  }

  ################### Modification d'un film ###################

  if (isset($_GET) && isset($_GET['action']) && isset($_GET['id_film']) ) {
    
    $id_film = htmlentities($_GET['id_film']);

    if ( $_GET['action'] == 'update' && !empty($_GET['id_film']) ) {
      
      $film = showFilmViaId($id_film);
                        
    }
  }

  $categories = allCat();
   
  $info = "";

  if (!empty($_POST)) {

################## On vérifie si un champs est vide ##################

    $verif = true;
    
    foreach ($_POST as $key => $value) {
      
      if (empty( trim($value) )) {

        $verif = false;
      }
    }


    // la superglobale $_FILES a un indice "image" qui correspond au "name" de l'input type="file" du formulaire, ainsi qu'un indice "name" qui contient le nom du fichier en cours de téléchargement.

    // Vérifie si le champ 'image' du tableau $_FILES n'est pas vide, ce qui signifie qu'un fichier est en cours de téléchargement.
    if (!empty($_FILES['image']['name'])) {  // $_FILES['image']['name'] contient le nom original du fichier téléchargé.

      // Définit la variable $image avec le nom du fichier téléchargé.
      // Cela crée le chemin relatif vers l'image qui sera utilisé pour stocker l'image et peut être utilisé dans les balises <img>.
      $image =  $_FILES['image']['name'];
    
      // Utilise la fonction copy() pour copier le fichier temporaire téléchargé (stocké à l'adresse contenue dans $_FILES['image']['tmp_name'])
      // vers un emplacement permanent. Le fichier est déplacé dans le dossier "../assets/img/" avec le nom original du fichier.

      // copy() prend deux arguments : le chemin source (le fichier temporaire) et le chemin de destination.
      copy($_FILES['image']['tmp_name'], '../assets/img/' . $image); // $_FILES['image']['tmp_name'] contient le chemin temporaire où le fichier est stocké après le téléchargement.
    }
    
    if (!$verif || empty($image)) { // !$verif revient à ($verif == false)
      // Si la variable $verif passe en false ou si la variable $image est vide, j'affiche le message d'erreur ci dessous

      $info = alert("Veuillez renseigner tout les champs", "danger");
    }
    else {

      /*
        on vérifie l'image : 
          $_FILES['image']['name'] Nom
          $_FILES ['image']['type'] Type
          $_FILES ['image']['size'] Taille
          $_FILES ['image']['tmp_name'] Emplacement temporaire
          $_FILES ['image']['error'] Erreur si oui/non l'image a été réceptionné */
           
      if($_FILES['image']['error'] != 0 || $_FILES['image']['size'] == 0 || !isset($_FILES['image']['type'])){

        $info .= alert("L'image n'est pas valide","danger");

      }

      // On récupère les valeurs de nos champs et on les stocke dans des variables
      $category_id = trim($_POST["categories"]);
      $title = trim($_POST['title']);
      $director = trim($_POST['director']);
      $actors = trim($_POST['actors']);
      $ageLimit = trim($_POST['ageLimit']);
      $duration = trim($_POST['duration']);
      $date = trim($_POST['date']);
      $price = trim($_POST['price']);
      $stock = trim(intval($_POST['stock']));
      $synopsis = trim($_POST['synopsis']);

      $regex_chiffre = '/[0-9]/';
      $regex_acteurs = '/.*\/.*/';

      //Explications -> '/.*\/.*/': 
      /*  .* : correspond à n'importe quel nombre de caractères (y compris zéro caractère), sauf une nouvelle ligne.
          \/ : correspond au caractère /. Le caractère / doit être précédé d'un backslash \ car il est un caractère spécial en expression régulière. Le backslash est appelé caractère d'échappement et il permet de spécifier que le caractère qui suit doit être considéré comme un caractère ordinaire.
          .* : correspond à n'importe quel nombre de caractères (y compris zéro caractère), sauf une nouvelle ligne. */

      if (!isset($category_id) || checkCatId($category_id) == false ) {

        $info .= alert("Veuillez renseigner la catégorie", "danger");
      }

      if (!isset($title) || strlen($title) < 2  ) {
        $info = alert("Le champ nom n'est pas valide", "danger");
      }
     
      if (!isset($director) || strlen($director) < 2 || preg_match($regex_chiffre, $director) ) {

        $info .= alert("Le champ Réalisateur n'est pas valide", "danger");
      }
      
      if(!isset($actors) || strlen($actors) < 3 || preg_match($regex_chiffre, $actors) || !preg_match($regex_acteurs, $actors) ){ // valider que l'utilisateur a bien inséré le symbole '/' : chaîne de caractères qui contient au moins un caractère avant et après le symbole /.

        $info .= alert("Le champ acteurs n'est pas valide", "danger");
      }
    
      if (!isset($ageLimit) || !in_array($ageLimit, ["3", "7", "10", "12", "16"])) {
        $info .= alert("L'age limite n'est pas valide", "danger");
      }

      if (!isset($duration) ) {

        $info .= alert("La durée n'est pas valide", "danger");
      }
     
      if (!isset($date) ) {

        $info .= alert("La date n'est pas valide", "danger");
      }

      if (!isset($price) /*|| is_numeric($price)*/ ) { 

        $info .= alert("Le prix n'est pas valide", "danger");
      }

      if (!isset($stock) || !preg_match('/[0-9]/', $stock) ) {

        $info .= alert("Le stock n'est pas valide", "danger");
      }
      
      if (!isset($synopsis) || strlen($synopsis) < 50 ) {

        $info .= alert("Le synopsis doit faire 50 caractères minimum", "danger");      
      }

      elseif (empty($info)) {

        // $emailExist = checkEmailUser($email); 
        $category_id = htmlentities($category_id);
        $title = htmlentities($title);
        $director = htmlentities($director);
        $actors = htmlentities($actors);
        $ageLimit = htmlentities($ageLimit);
        $duration = htmlentities($duration);
        $synopsis = htmlentities($synopsis);
        $date = htmlentities($date);
        $image = htmlentities($image);
        $price = htmlentities($price);
        $stock = htmlentities($stock);
        

        if (isset($_GET) && isset($_GET['action']) && isset($_GET['id_film']) && !empty($_GET['action']) && !empty($_GET['id_film']) && $_GET['action'] == 'update' ) {
          
                 
        modifyMovie($id_film, $category_id, $title, $director, $actors, $ageLimit, $duration, $synopsis, $date, $image, $price, $stock);

        header("location:films.php");
                      
        }
        else {
          if (verifFilm($title, $date)) { // Si le film existe dans la BDD

            $info = alert("Ce film est déjà enregistré", "danger");
          }
          else { // Si le film n'existe pas                    
          
            InsertMovie( $category_id, $title, $director, $actors, $ageLimit, $duration, $synopsis, $date, $image, (float) $price, (int) $stock);

            $info = alert("Le film est bien inscrit dans la base de donnée", "success");

          }
          
          header("location:films.php");

        }
      }
    }
  }

  
  
  $movies = allMovies();

  require_once "../inc/header.inc.php";
?>


<main>
  <h2 class="text-center fw-bolder mb-5 text-danger">Ajouter un film</h2>

  <?php
    echo $info;
    ?>
  <form action="" method="post" class="back" enctype="multipart/form-data">
    <!-- il faut isérer une image pour chaque film, pour le traitement des images et des fichiers en PHP on utilise la surperglobal $_FILES -->
    <div class="row">
      <div class="col-md-6 mb-5">
        <label for="title">Titre de film</label>
        <input type="text" name="title" id="title" class="form-control" value="<?= $film["title"] ?? '' ?>">

      </div>
      <div class="col-md-6 mb-5">
        <label for="image">Photo</label>
        <br>
        <input type="file" name="image" id="image" <?=$film['image'] ?? '' ?>>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 mb-5">
        <label for="director">Réalisateur</label>
        <input type="text" class="form-control" id="director" name="director" value="<?=$film['director'] ?? '' ?>">
      </div>
      <div class="col-md-6">
        <label for="actors">Acteur(s)</label>
        <input type="text" class="form-control" id="actors" name="actors" value="<?=$film['actors'] ?? '' ?>"
          placeholder="séparez les noms d'acteurs avec un /">
      </div>
    </div>
    <div class="row">
      <!-- raccouci bs5 select multiple -->
      <div class="mb-3">
        <label for="ageLimit" class="form-label">Àge limite</label>
        <div class="d-flex justify-content-around">
          <div>
            <input class="form-check-input" type="radio" name="ageLimit" value="3" id="radio3" <?= isset($film['ageLimit']) && $film['ageLimit'] == 3 ?  'checked' : '' ?>>
            <label class="form-check-label" for="radio3"> 3 </label>
          </div>
          <div>
            <input class="form-check-input" type="radio" name="ageLimit" value="7" id="radio7" <?= isset($film['ageLimit']) && $film['ageLimit'] == 7 ?  'checked' : '' ?>>
            <label class="form-check-label" for="radio7"> 7 </label>
          </div>
          <div>
            <input class="form-check-input" type="radio" name="ageLimit" value="10" id="radio10" <?= isset($film['ageLimit']) && $film['ageLimit'] == 10 ?  'checked' : '' ?>>
            <label class="form-check-label" for="radio10"> 10 </label>
          </div>
          <div>
            <input class="form-check-input" type="radio" name="ageLimit" value="12" id="radio12" <?= isset($film['ageLimit']) && $film['ageLimit'] == 12 ?  'checked' : '' ?>>
            <label class="form-check-label" for="radio13"> 12 </label>
          </div>
          <div>
            <input class="form-check-input" type="radio" name="ageLimit" value="16" id="radio16" <?= isset($film['ageLimit']) && $film['ageLimit'] == 16 ?  'checked' : '' ?>>
            <label class="form-check-label" for="radio16"> 16 </label>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <label for="categories">Genre du film</label>
      <!--  Ici c'est les catégories qui sont déjà stockées dans la BDD et qu'on va récupérer à partir de cette dernière -->    
      <?php
        foreach ($categories as $key => $cat) {
          //$variable as $key => $value
      ?>  
        <div class="form-check col-sm-12 col-md-4">
          <input class="form-check-input" type="radio" name="categories" id="<?= html_entity_decode($cat['name'])?>" value="<?= html_entity_decode($cat['id_category'])?>" <?= isset($film['category_id']) && $film['category_id'] == $cat['id_category'] ? 'checked' : '' ?>>
          <label class="form-check-label" for="<?= html_entity_decode($cat['name'])?>"><?= ucfirst(html_entity_decode($cat['name']))?></label>
        </div>
      <?php
        }
      ?>
    </div>
    <div class="row">
      <div class="col-md-6 mb-5">
        <label for="duration">Durée du film</label>
        <input type="time" class="form-control" min="01:00" id="duration" name="duration" value="<?=$film['duration'] ?? '' ?>">
      </div>
      <div class="col-md-6 mb-5">
        <label for="date">Date de sortie</label>
        <input type="date" name="date" id="date" class="form-control" value="<?=$film['date'] ?? '' ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 mb-5">
        <label for="price">Prix</label>
        <div class=" input-group">
          <input type="text" class="form-control" id="price" name="price"
            aria-label="Euros amount (with dot and two decimal places)" value="<?=$film['price'] ?? '' ?>">
            <!-- <input type="number" step="0.01" id="totalAmt">
              l'attribut step avec une valeur 0.01 permet de prendre en compte un nombre avec deux décimal dans un input de type number -->
          <span class="input-group-text">€</span>
        </div>
      </div>
      <div class="col-md-6">
        <label for="stock">Stock</label>
        <input type="number" name="stock" id="stock" class="form-control" min="0" value="<?=$film['stock'] ?? '' ?>">
        <!--pas de stock négativ donc je rajoute min="0"-->
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <label for="synopsis">Synopsis</label>
        <textarea type="text" class="form-control" id="synopsis" name="synopsis" rows="10"><?=isset($film)? html_entity_decode($film['synopsis']) : '' ?></textarea>
      </div>
    </div>
    <div class="row justify-content-center">
    <button class="w-75 mx-auto btn btn-danger btn-lg fs-5" type="submit"><?=isset($film) ? 'Modifier le film' : 'Ajouter un film' ?></button>
    </div>
  </form>



</main>
<?php
  debug($film);

  require_once "../inc/footer.inc.php";
?>
