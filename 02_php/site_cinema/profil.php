<?php
  require_once "inc/functions.inc.php";

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
      $lastName = trim($_POST['lastName']);
      $firstName = trim($_POST['firstName']);
      $pseudo  = trim($_POST['pseudo']);
      $email = trim($_POST['email']);
      $phone = trim($_POST['phone']);
      $civility = trim($_POST['civility']);
      $birthday = trim($_POST['birthday']);
      $address = trim($_POST['address']);
      $zip = trim($_POST['zip']);
      $city = trim($_POST['city']);
      $country = trim($_POST['country']);
    }
  }
  
  require_once "inc/header.inc.php";
?>


<main>
  <div class="mx-auto p-2 row flex-column align-items-center">
    <h2 class="text-center mb-5">Bonjour </h2>
    <div class="cardFilm">
      <div class="image">
        <img src="<?=$_SESSION['user']['civility'] == 'h' ? RACINE_SITE .'assets/img/avatar_h.png' : RACINE_SITE .'assets/img/avatar_f.png'?>" alt="<?=$_SESSION['user']['civility'] == 'h' ? 'Image avatar homme' : 'Image avatar femme'?>">
        <div class="details">
          <div class="center ">
            <table class="table">
              <tr>
                <th scope="row" class="fw-bold">Nom</th>
                <td><?=$_SESSION['user']['lastName']?></td>
              </tr>
              <tr>
                <th scope="row" class="fw-bold">Prenom</th>
                <td><?=$_SESSION['user']['firstName']?></td>
              </tr>
              <tr>
                <th scope="row" class="fw-bold">Pseudo</th>
                <td colspan="2"><?=$_SESSION['user']['pseudo']?></td>
              </tr>
              <tr>
                <th scope="row" class="fw-bold">email</th>
                <td colspan="2"><?=$_SESSION['user']['email']?></td>
              </tr>
              <tr>
                <th scope="row" class="fw-bold">Tel</th>
                <td colspan="2"><?=$_SESSION['user']['phone']?></td>
              </tr>
              <tr>
                <th scope="row" class="fw-bold">Adresse</th>
                <td colspan="2"><?=$_SESSION['user']['address'] .'<br>'. $_SESSION['user']['zip'] .' '. $_SESSION['user']['city'] . '<br>' . $_SESSION['user']['country'] ?></td>
              </tr>
            </table>
            <a href="?action=update&id_user=<?= $_SESSION['user']['id_user']?>" class="btn mt-5">Modifier vos informations</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php

    if(isset($_GET) && isset($_GET['action']) == 'update') {
  ?>
  <div class="col-6 mx-auto mt-5 pt-5">
    <table class="table">
      <form action="" method="post">
        <tr>
          <th scope="row" class="fw-bold">Nom</th>
          <td><input class="col-8" value="<?=$_SESSION['user']['lastName']?>"></td>
        </tr>
        <tr>
          <th scope="row" class="fw-bold">Prenom</th>
          <td><input class="col-8" value="<?=$_SESSION['user']['firstName']?>"></td>
        </tr>
        <tr>
          <th scope="row" class="fw-bold">Pseudo</th>
          <td colspan="2"><input class="col-8" value="<?=$_SESSION['user']['pseudo']?>"></td>
        </tr>
        <tr>
          <th scope="row" class="fw-bold">date de naissance</th>
          <td colspan="2"><input class="col-8" value="<?= $_SESSION['user']['birthday'] ?>"></td>
        </tr>
        <tr>
          <th scope="row" class="fw-bold">email</th>
          <td colspan="2"><input class="col-8" value="<?=$_SESSION['user']['email']?>"></td>
        </tr>
        <tr>
          <th scope="row" class="fw-bold">Tel</th>
        <td colspan="2"><input class="col-8" value="<?=$_SESSION['user']['phone']?>"></td>
      </tr>
      <tr>
        <th scope="row" class="fw-bold">Adresse</th>
        <td colspan="2"><input class="col-8" value="<?=$_SESSION['user']['address']?>"></td>
      </tr>
      <tr>
        <th scope="row" class="fw-bold">code postal</th>
        <td colspan="2"><input class="col-8" value="<?=$_SESSION['user']['zip']?>"></td>
      </tr>
      <tr>
        <th scope="row" class="fw-bold">Ville</th>
        <td colspan="2"><input class="col-8" value="<?= $_SESSION['user']['city']?>"></td>
      </tr>
      <tr>
        <th scope="row" class="fw-bold">pays</th>
        <td colspan="2"><input class="col-8" value="<?= $_SESSION['user']['country'] ?>"></td>
      </tr>     
    </form>
    </table>
    <div class="d-flex flex-column justify-content-center">
      <button class="col-4 mx-auto btn btn-danger btn-lg fs-5" type="submit"> Modifier mon profil </button>
    </div>
  </div>
  
  <?php
    }
  ?>
</main>

<?php

  require_once "inc/footer.inc.php";
?>