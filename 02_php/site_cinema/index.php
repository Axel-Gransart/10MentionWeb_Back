<?php
  require_once "inc/functions.inc.php";

  $info = "";

  $categories = allCat();

  
  if (isset($_GET)  && !empty($_GET) ) {

    if (isset($_GET['id_category']) ) {

      $idCategory = htmlentities($_GET['id_category']);

        if(is_numeric($idCategory)){

          $cat = checkCatId($idCategory);

          if (($cat['id_category'] != $idCategory )  || empty($idCategory) ) {

            header('location:index.php');

          }
          else {

            $films = filmsByCategory($idCategory);

            $numberFilms = count($films) == 1 ? ' film' : ' films';

            $messageTitle = 'La catégorie ' . $categoryName . ' contient ' . count($films) . $numberFilms;        
        
            if (count($films) == 0) {
              
              $info = alert("Désolé ! Cette catégorie ne contient aucun film", "danger");
              $messageTitle = '';
              
            }
        // if (!$films) {
        //   header('location:index.php');
        // }
        }
      }
      else {
        header('location:index.php');
      }
    }
    elseif (isset($_GET['action']) && $_GET['action'] == 'voirPlus') {
      
      $films = allMoviesOrderAlpha();
      $messageTitle = 'Les '. count($films) . ' films que nous avons à la vente';

    }
  }
  else {
    $films = filmByDate();
    $messageTitle = 'Nos ' . count($films) . ' films les plus récents';

  }
 
  require_once "inc/header.inc.php";
?>

<main>
  <div class="films">
    <?php
      echo $info;
    ?>
    <h2 class="fw-bold fs-1 mx-5 text-center"><?= $messageTitle ?></h2>
    <div class="row justify-content-around">
      <?php
        foreach ($films as $key => $film) {
          //$variable as $key => $value

          $category = checkCatId($film['category_id']);
          $categoryName = $category['name'];
      ?>
      <div class="col-sm-12 col-md-6 col-lg-4 col-xxl-3">
        <div class="card">
          <img src="<?=RACINE_SITE ."assets/img/" . $film['image']?>"
            alt="<?=html_entity_decode($film['texte_alternatif'])?>">
          <div class="card-body">
            <h3><?= html_entity_decode(ucfirst($film['title']))?></h3>
            <h4><?= html_entity_decode(ucfirst($film['director']))?></h4>
            <h5 class="fw-bold"><?= $categoryName ?></h5>
            <p> <span class="fw-bold">Résumé : </span>
              <?= substr(html_entity_decode($film['synopsis']), 0, 200 ) . " ..." ?> </p>
            <a href="<?=RACINE_SITE?>showFilm.php?action=visu&id_film=<?= $film['id_film']?>" class="btn">Voir plus</a>
          </div>
        </div>
      </div>
      <?php
        }
      ?>      
      <div class="col-12 text-center">
        <?= count($films) == 0 || (isset($_GET['action']) && $_GET['action'] == 'voirPlus') ? '<a href="'.RACINE_SITE.'index.php" class="btn p-4 fs-3"> Retourner à l\'accueil </a>' : '<a href="'.RACINE_SITE.'?action=voirPlus" class="btn p-4 fs-3"> Accéder à tout les films </a>' ?>
      </div>      
    </div>
  </div>
</main>

<?php

  require_once "inc/footer.inc.php";

?>