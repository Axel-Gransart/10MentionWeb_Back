<?php
  require_once "../inc/functions.inc.php";

  $info = '';

  if (empty($_SESSION['user'])) {
    header('location:'.RACINE_SITE.'authentification.php');
  }

  if (isset($_POST) && !empty($_POST)) {

    $idFilm = htmlentities($_POST['id_film']);
    $film = showFilmViaId($idFilm);
    $quantite = htmlentities($_POST['quantity']);

    $title = $film['title'];
    $price = $film['price'];
    $stock = $film['stock'];
    $image = $film['image'];

    if ($idFilm != $film['id_film'] || !isset($quantite) || empty($quantite) || $quantite > $stock ) {

      header('location:'.RACINE_SITE.'index.php');
    }
    else {

      if (!isset($_SESSION['panier'])) { // Je vérifie si je n'ai pas de film dans le panier donc j'initialise le panier. S'il n'existe pas une session avec l'index "panier", on en crée une et on met un tableau à l'intérieur.
        $_SESSION['panier'] = array();
      }
      // Si la session contient l'index "panier", on passe directement à la vérification du film

      
      // unset($_SESSION['panier']);
       

      // Si le film existe dans le panier,
      $filmNotExiste = false;

      foreach ($_SESSION['panier'] as $key => $film) {

        if ($film['id_film'] == $idFilm) {
          debug($idFilm);
         
          $_SESSION['panier'][$key]['quantity'] += $quantite;
          // film n°1 : quantité = quantité initiale + la nouvelle quantité

          $filmNotExiste = true;
        }
      }

      if (!$filmNotExiste) { // équivalent à $filmNotExiste = true (le film n'existe pas dans la bdd $_SESSION['panier'])
      // Si le film n'existe pas dans le panier 
        $newFilm = [
          'id_film' => $idFilm,
          'quantity' => $quantite,
          'title' => $title,
          'price' => $price,
          'stock' => $stock,
          'image' => $image
        ];

        $_SESSION['panier'][] = $newFilm; // j'ajoute le film avec toute les informations dans $_SESSION['panier']      
      }

    

      // $_SESSION['panier'] = $film;
      debug($_SESSION['panier']);
    }
  }

  // vider le panier complet

  if (isset($_GET['vider'])) {

    unset($_SESSION['panier']);    
  }

  // Supprimer un seul film

  if (isset($_GET['id_film'])) {

    $idFilmForDelete = htmlentities($_GET['id_film']);

    foreach ($_SESSION['panier'] as $key => $film) {

      if ($film['id_film'] == $idFilmForDelete) {
        
        unset($_SESSION['panier'][$key]);
      }
    }
  }

  require_once "../inc/header.inc.php";
?>

<main>
  <div class="panier d-flex justify-content-center" style="padding-top:8rem;">
   
    <div class="d-flex flex-column  mt-5 p-5">
      <h2 class="text-center fw-bolder mb-5 text-danger">Mon panier</h2>
      <!-- le paramètre vider=1 pour indiquer qu'il faut vider le panier. -->
      <?php
        if (empty($_SESSION['panier'])) { // Si le panier est vide, on affiche un message à l'utilisateur
        echo $info = alert('Votre panier est vide retournez sur <a href="../index.php" class="">la page d\'accueil</a>', 'warning');
        }
        else { // Sinon, on affiche le tableau avec les films stocké dans le panier
      ?>
      <div class="w-100 d-flex justify-content-between">
        <a value="back" onClick="window.history.back()" class="btn mb-5">Retourner au choix de films</a>
        <a href="?vider" class="btn mb-5">Vider le panier</a>
      </div>
      <table class="fs-4">
        <tr>
          <th class="text-center text-danger fw-bolder">Affiche</th>
          <th class="text-center text-danger fw-bolder">Nom</th>
          <th class="text-center text-danger fw-bolder">Prix unitaire</th>
          <th class="text-center text-danger fw-bolder">Quantité</th>
          <th class="text-center text-danger fw-bolder">Sous-total</th>
          <th class="text-center text-danger fw-bolder">Supprimer</th>
        </tr>
        <?php
          $totalPrice = 0;
          foreach ($_SESSION['panier'] as $filmDansPanier) {
            $totalPrice += $filmDansPanier["price"] * $filmDansPanier["quantity"]; 
        ?>
          <tr>
            <td class="text-center border-top border-dark-subtle">
              <a href="<?=RACINE_SITE?>showFilm.php?action=visu&id_film=<?=$filmDansPanier['id_film']?>">
                <img src="<?=RACINE_SITE?>assets/img/<?=$filmDansPanier["image"]?>" alt="" style="width: 100px;">
              </a>
            </td>
            <td class="text-center border-top border-dark-subtle">
              <?= html_entity_decode($filmDansPanier["title"])?>
            </td>
            <td class="text-center border-top border-dark-subtle"><?= $filmDansPanier["price"] ?> €</td>
            <td class="text-center border-top border-dark-subtle d-flex align-items-center justify-content-center"
              style="padding: 7rem;">              
              <?= $filmDansPanier["quantity"] ?>
                            
              <!-- Afficher la quantité actuelle -->
              <?php         
                $moviePrice = $filmDansPanier["price"] * $filmDansPanier["quantity"];         
              ?>
            </td>
            <td class="text-center border-top border-dark-subtle"><?= $moviePrice ?> €</td>
            <td class="text-center border-top border-dark-subtle"><a href="?id_film=<?= $filmDansPanier['id_film']?>"><i class="bi bi-trash3"></i></a>
            </td>
          </tr>
        <?php                 
          }          
        ?>
        <tr class="border-top border-dark-subtle">
          <th class="text-danger p-4 fs-3">Total : <?= $totalPrice ?> €</th>
          <th class="text-danger p-4 fs-3">Total : <?= calculMontantTotal($_SESSION['panier']) ?> €</th>
        </tr>
      </table>
      <form action="checkout.php" method="post">
        <input type="hidden" name="total" value="<?= calculMontantTotal($_SESSION['panier']) ?>">
        <button type="submit" class="btn btn-danger mt-5 p-3" id="checkout-button">Payer</button>
      </form>
      <?php 
        }        
      ?>
    </div>
  </div>
</main>

<?php
  
  require_once "../inc/footer.inc.php";
?>