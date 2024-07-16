<?php
  require_once "inc/functions.inc.php";  

  if (isset($_GET) && isset($_GET['action']) && isset($_GET['id_film'])) {
      
    if ($_GET['action'] == 'visu' && !empty($_GET['id_film'])) {

      $id_film = htmlentities($_GET['id_film']);

      $movie = showFilmViaId($id_film);

      $category = checkCatId($movie['category_id']);
      $categoryName = $category['name'];

      if (!$movie) {
        header('location:index.php');
      }

    }
  }
 
  require_once "inc/header.inc.php";
?>

<main>
<div class="row justify-content-around">      
  <div class="col-4">
    <div class="card">
      <img src="<?=RACINE_SITE ."assets/img/" . $movie['image']?>" alt="<?=$movie['texte_alternatif']?>">
      <div class="card-body">
        <h3><?= ucfirst(html_entity_decode($movie['title']))?></h3>
        <h4><?= html_entity_decode(ucfirst($movie['director']))?></h4>
        <h5 class="fw-bold"><?= $categoryName ?></h5>
        <p> <span class="fw-bold">Résumé : </span> <?= html_entity_decode($movie['synopsis']) ?> </p>
        <p> <span class="fw-bold">Disponible à la vente au prix de : </span> <?= html_entity_decode($movie['price']) ?> €</p>
        <p> <span class="fw-bold">Il reste</span> <?= html_entity_decode($movie['stock']) ?> pièces en stock </p>
      </div>
    </div>
  </div>
  <div class="text-center mt-5 pt-5">
    <a class="btn fw-bold fs-2 text-white" value="back" onClick="window.history.back()">Retour</a>     
  </div>
</div>

</main>


<?php
  require_once "inc/footer.inc.php";
?>