
<?php
  require_once "../inc/functions.inc.php";

   // Gestion de l'accessibilité des pages admin  
  if (empty($_SESSION['user'])) {
    
    header('location:' . RACINE_SITE . 'authentification.php');
  }
  else {
    
    if ($_SESSION['user']['role'] == 'ROLE_USER') {
      
      header('location:' . RACINE_SITE . 'index.php');      
    }
  }

  if (isset($_GET) && isset($_GET['action']) && isset($_GET['id_film'])) {
      
    if ($_GET['action'] == 'delete' && !empty($_GET['id_film'])) {

      $id_film = htmlentities($_GET['id_film']);

      deleteMovie($id_film);
    }

    if ($_GET['action'] == 'update' && !empty($_GET['id_film']) ) {

      $id_film = htmlentities($_GET['id_film']);
      
      $movie = verifFilm($title, $date);
     
      header("location:gestion_film.php");
    }

  }

  $movies = allMovies();

  require_once "../inc/header.inc.php";
?>
<main>

  
  <div class="d-flex flex-column m-auto mt-5 table-responsive">
    <!-- tableau pour afficher tout les films avec des boutons de suppression et de modification -->
    <h2 class="text-center fw-bolder mb-5 text-danger">Liste des films</h2>    
    <button class="btn btn-danger btn-lg align-self-end"><a class="text-white fw-bold" href="<?=RACINE_SITE?>admin/gestion_film.php">Ajouter un film</a></button>  
  <table class="table table-dark table-bordered mt-5">
    <thead>
      <tr class="text-center">
        <th>id</th>
        <th>titre</th>
        <th>date</th>
        <th>réalisateur</th>
        <th>image</th>
        <th>acteurs</th>
        <th>categorie</th>
        <th>déconseillé au moins de :</th>
        <th>durée</th>
        <th>synopsis</th>
        <th>prix</th>
        <th>stock</th>     
        <th>Supprimer</th>
        <th>Modifier</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($movies as $key => $film) {
          //$variable as $key => $value

          $actors= stringToArray($film['actors']);
          // je transforme la chaîne de caractère récupérée à partrir de l'élément $film['actors'] du tableau $film en un tableau avec la fonction stringToArray()

          // la catégorie du film
          $category = checkCatId($film['category_id']);
          $categoryName = $category['name'];

          //Gérer l'affichage de la durée

          // $objet = new NomDeLaClasse();
          $date_time = new DateTime($film['duration']); // nous créeons un nouvel objet DateTime en passant  la valeur de l'input de type time  en tant que paramètre
          $duration = $date_time->format('H:i');// Nous utilisons ensuite la méthode format() pour extriare l'heure et les minutes au format 'H:i'

          $date_View = new DateTime($film['date']);

          $dateSortie = $date_View->format('d M y');

      ?>
        <tr class="text-center" >
          <td><?= $film['id_film']?></td>
          <td><?= html_entity_decode(ucfirst($film['title']))?></td>
          <td><?= $dateSortie ?></td>
          <td><?= html_entity_decode(ucfirst($film['director']))?></td>
          <td class="col-1"><img src="<?=RACINE_SITE ."assets/img/" . html_entity_decode($film['image'])?>" alt="<?=html_entity_decode($film['texte_alternatif'])?>"></td>
          
          <td class="text-start">
            <ul>
            <?php
              foreach($actors as $key => $actor){
            ?>
              <li><?= $actor;?></li>
            <?php
              }
            ?>
            </ul>
          </td>           
          <td> <?= $categoryName ?></td>
          <td><?= html_entity_decode($film['ageLimit'])?> ans</td>
          <td> <?= $duration?></td>
          <td><?= substr(html_entity_decode($film['synopsis']), 0, 40 ) . " ..." ?></td>
          <td>Vendu au prix de : <?= html_entity_decode($film['price'])?> €</td>
          <td>Il y en a <?= html_entity_decode($film['stock'])?> en stock</td>
          <td class="text-center"><a href="?action=delete&id_film=<?= $film['id_film']?>"><i class="bi bi-trash3"></i></a></td>
          <td class="text-center"><a href="gestion_film.php?action=update&id_film=<?= $film['id_film']?>"><i class="bi bi-pen"></i></a></td>
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