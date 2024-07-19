<?php
  require_once "inc/functions.inc.php";  

  if (empty($_SESSION['user'])) {
    header('location:authentification.php');
  }
  

  if (isset($_GET) && isset($_GET['action']) && isset($_GET['id_film'])) {
      
    if ($_GET['action'] == 'visu' && !empty($_GET['id_film'])) {

      $id_film = htmlentities($_GET['id_film']);

      $movie = showFilmViaId($id_film);

      $category = checkCatId($movie['category_id']);
      $categoryName = $category['name'];

      $actors= stringToArray(html_entity_decode($movie['actors']));

      $date_time = new DateTime($movie['duration']); // nous créeons un nouvel objet DateTime en passant la valeur de l'input de type time  en tant que paramètre
      $duration = $date_time->format('H:i');// Nous utilisons ensuite la méthode format() pour extraire l'heure et les minutes au format 'H:i'

      $date_View = new DateTime($movie['date']);

      $dateSortie = $date_View->format('d M y');

      if (!$movie) {
        header('location:index.php');
      }
    }
  }
 
  require_once "inc/header.inc.php";
?>

<main>
  <div class="film bg-dark">
    <div class="back">
      <a value="back" onClick="window.history.back()"><i class="bi bi-arrow-left-circle-fill"></i></a>
    </div>
    <div class="cardDetails row mt-5">
      <h2 class="text-center mb-5"><?= html_entity_decode(ucfirst($movie['title']))?></h2>
      <div class="col-12 col-xl-5 row p-5">
        <img src="<?=RACINE_SITE ."assets/img/" . $movie['image']?>" alt="<?=$movie['texte_alternatif']?>">
        <div class="col-12 mt-5">
          <form action="boutique/panier.php" method="post" enctype="multipart/form-data" class="w-50 m-auto row justify-content-center p-5">
          <!-- Dans le formulaire d'ajout au panier, ajoutez des champs cachés pour chaque information que vous souhaitez conserver du film -->
            <input type="hidden" name="id_film" value="<?= $movie['id_film'] ?>">
            <input type="hidden" name="title" value="<?= html_entity_decode(ucfirst($movie['title']))?>">
            <input type="hidden" name="price" value="<?= html_entity_decode($movie['price']) ?>">
            <input type="hidden" name="stock" value="<?= html_entity_decode($movie['stock']) ?>">
            <input type="hidden" name="image" value="<?=RACINE_SITE ."assets/img/" . $movie['image']?>">
            <select name="quantity" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
              <!-- Je créé dynamiquement la quantité sélectionnable dans la limite du stock -->
              <?php
                for ($i = 1; $i <= $movie['stock']; $i++ ) :
              ?>
                <option value="<?= $i?>"><?= $i?></option>
              <?php
                endfor;
              ?>
            </select>
            <!-- <a href="boutique/panier.php?id_film=<?//=$film["id_film"] ?>" class="btn w-100 m-auto">Ajouter au Panier</a>  -->
            <input class="btn btn-outline-danger mt-3 w-100" type="submit" value="Ajouter au panier" name="ajout_panier"
              id="addCart">
            <!-- au moment du click j'initalise une session de panier qui sera récupérer dans le fichier panier.php -->
          </form>
        </div>
      </div>
      <div class="detailsContent  col-md-7 p-5">
        <div class="container mt-5">
          <div class="row">
            <h3 class="col-4"><span>Realisateur :</span></h3>
            <ul class="col-8">
              <li><?= html_entity_decode(ucfirst($movie['director']))?></li>
            </ul>
            <hr>
          </div>
          <div class="row">
            <h3 class="col-4"><span>Acteur :</span></h3>
            <ul class="col-8">
              <?php
                foreach($actors as $key => $actor){
              ?>
                <li><?= $actor;?></li>
              <?php
                }
              ?>
            </ul>
            <hr>
          </div>

          <!-- // si j'ai un age limite renseigné je l'affiche si non pas de div avec Àge limite : -->

          <div class="row">
            <h3 class="col-4"><span>Àge limite :</span></h3>
            <ul class="col-8">
              <li>+ <?= html_entity_decode($movie['ageLimit'])?> ans</li>
            </ul>
            <hr>
          </div>
          <div class="row">
            <h3 class="col-4"><span>Genre : </span></h3>
            <ul class="col-8">
              <li><?= $categoryName ?></li>
            </ul>
            <hr>
          </div>
          <div class="row">
            <h3 class="col-4"><span>Durée : </span></h3>
            <ul class="col-8">
              <li><?= $duration ?></li>
            </ul>
            <hr>
          </div>
          <div class="row">
            <h3 class="col-4"><span>Date de sortie:</span></h3>
            <ul class="col-8">
              <li><?= $dateSortie ?></li>
            </ul>
            <hr>
          </div>
          <div class="row">
            <h3 class="col-4"><span>Prix : </span></h3>
            <ul class="col-8">
              <li><?= html_entity_decode($movie['price']) ?> €</li>
            </ul>
            <hr>
          </div>
          <div class="row">
            <h3 class="col-4"><span>Stock :</span> </h3>
            <ul class="col-8">
              <li><?= html_entity_decode($movie['stock']) ?> pièces en stock </li>
            </ul>
            <hr>
          </div>
          <div class="row">
            <h5 class="col-4"><span>Synopsis :</span></h5>
            <ul class="col-8">
              <li><?= html_entity_decode($movie['synopsis']) ?></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>


<?php
  require_once "inc/footer.inc.php";
?>