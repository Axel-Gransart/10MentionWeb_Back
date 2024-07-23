<!DOCTYPE html>
<html lang="fr">
<head>
  <!-- required meta Tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Premier site en PHP : site cinema">
  <meta name="author" content="Axel Gransart">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Google Fonts Dosis & Lora -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">  

  <!-- Personal style sheet -->
  <link rel="stylesheet" href="<?=RACINE_SITE?>assets/css/style.css"> 
  <!-- &lt;?= remplace &lt;=php echo  -->
  <title></title>
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container-fluid">
      <h1><a class="navbar-brand" href="<?=RACINE_SITE?>index.php">M <img src="<?=RACINE_SITE?>assets/img/logo.png" alt="" > VIES</a></h1>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav w-100 d-flex justify-content-end align-items-center">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="<?=RACINE_SITE?>index.php">Accueil</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Catégories
              </a>
              <ul class="dropdown-menu">
                <?php

                  $categories = allCat();

                  foreach ($categories as $key => $cat) {
                  //$variable as $key => $value
                ?>                
                  <li>
                    <a class="dropdown-item" href="<?= RACINE_SITE?>index.php?id_category=<?= $cat['id_category']?>"><?= ucfirst(html_entity_decode($cat['name']))?></a>
                  </li>                
                <?php               
                  }
                ?>
              </ul>
            </li>
            <?php
              if (empty($_SESSION['user'])) {
            ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?=RACINE_SITE?>register.php">Inscription</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=RACINE_SITE?>authentification.php">Connexion</a>
                </li>

            <?php               
              }
              else {
            ?>
              <li class="nav-item">
                <a class="nav-link" href="<?=RACINE_SITE?>profil.php">Compte <sup class="badge rounded-pill text-bg-primary"><?= $_SESSION['user']['pseudo'] ?></sup></a>
              </li>

              <?php
                if ($_SESSION['user']['role'] == 'ROLE_ADMIN') {
              ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">Backoffice</a>
                  <ul class="dropdown-menu">
                      <li><a class="dropdown-item text-dark fs-4" href="<?=RACINE_SITE?>admin/categories.php">Catégories</a></li>
                      <li><a class="dropdown-item text-dark fs-4" href="<?=RACINE_SITE?>admin/films.php">Films</a></li>
                      <li><a class="dropdown-item text-dark fs-4" href="<?=RACINE_SITE?>admin/gestion_film.php">Gestion des films</a></li>
                      <li><a class="dropdown-item text-dark fs-4" href="<?=RACINE_SITE?>admin/users.php">utilisateurs</a></li>
                  </ul>
                </li>
              <?php               
                }              
              ?>

              <li class="nav-item">
                <a class="nav-link" href="?action=deconnexion">Déconnexion</a>
              </li>
            <?php     
              //debug($_GET['action']);          
              }
            ?>
            <li class="nav-item">
              <a class="nav-link" href="<?=RACINE_SITE?>boutique/panier.php"><i class="bi bi-cart fs-2"></i><sup class="badge rounded-pill text-bg-primary"><?= count($_SESSION['panier']) ?></sup></a>
            </li>                     
          </ul>
        </div>
      </div>
    </nav>
  </header>

