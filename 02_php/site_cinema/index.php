<?php
  require_once "inc/functions.inc.php";


  if (isset($_GET) && !empty($_GET)) {
    
    if (isset($_GET['id_category']) && !empty($_GET['id_category'])) {
      
      $idCategory = htmlentities($_GET['id_category']);
    
      if (is_numeric($idCategory)) {
      
        $films = filmsByCategory($idCategory);
      
        // if (!$film) {
        //   header('location:index.php');
        // }
      }
      else {
        header('location:index.php');
      }
    }
    elseif (isset($_GET['action']) && $_GET['action'] == 'voirPlus') {
      
      $films = allMoviesOrderAlpha();

    }
  }
  else {
    $films = filmByDate();
  }


  // if ($_GET['action'] == 'visu' && !empty($_GET['id_film']) ) {

  //   $id_film = htmlentities($_GET['id_film']);
    
  //   $movie = verifFilm($title, $date);
   
  //   header("location:gestion_film.php");
  // }

 
  require_once "inc/header.inc.php";
?>

<main>
  <div class="films">
    <h2 class="fw-bold fs-1 mx-5 text-center"><?= isset($_GET['action']) && $_GET['action'] == 'voirPlus' ?  'Tout nos films' : 'Nos films les plus récents' ?></h2>
    <div class="row justify-content-around">
      <?php
        foreach ($films as $key => $film) {
          //$variable as $key => $value

          $category = checkCatId($film['category_id']);
          $categoryName = $category['name'];
      ?>
        <div class="col-sm-12 col-md-6 col-lg-4 col-xxl-3">
          <div class="card">
            <img src="<?=RACINE_SITE ."assets/img/" . $film['image']?>" alt="<?=html_entity_decode($film['texte_alternatif'])?>">
            <div class="card-body">
              <h3><?= html_entity_decode(ucfirst($film['title']))?></h3>
              <h4><?= html_entity_decode(ucfirst($film['director']))?></h4>
              <h5 class="fw-bold"><?= $categoryName ?></h5>
              <p> <span class="fw-bold">Résumé : </span> <?= substr(html_entity_decode($film['synopsis']), 0, 200 ) . " ..." ?> </p>
              <a href="<?=RACINE_SITE?>showFilm.php?action=visu&id_film=<?= $film['id_film']?>" class="btn">Voir plus</a>
            </div>
          </div>
        </div>
      <?php
        }
      ?>
      <div class="col-12 text-center">
        <a href="<?=RACINE_SITE?>?action=voirPlus" class="btn p-4 fs-3"> Accéder à tout les films </a>
      </div>
    </div>
  </div>
</main>

<?php

  require_once "inc/footer.inc.php";

?>