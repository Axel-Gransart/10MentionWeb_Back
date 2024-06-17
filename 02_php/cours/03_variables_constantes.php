<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/logo.png" type="favicon">
    <title>Cours PHP - Les variables et les constantes</title>
</head>
<body>
<nav class="navbar navbar-dark bg-dark navbar-expand-lg" >
    <div class="container-fluid">
      <a class="navbar-brand" href="01_index.php"><img src="assets/img/logo.png" alt="logo php"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="01_index.php">Introduction</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="02_bases.php">Les bases</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="03_variables_constantes.php">Les variables et les constantes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="04_conditions.php">Les conditions en PHP</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="05_boucles.php">Les boucles en PHP</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="06_inclusions.php">Les importations des fichier</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <header class="p-5 m-4 bg-light rounded-3 border">
    <section class="container py-5">
        <?php
        
        echo "<h1 class=\"display-5 fw-bold\">Les variables et les constantes en PHP</h1>";
        
        ?>
    </section>
  </header>
  <main class="container-fluid px-5">
        <?php

        echo "<h2>Les variables utilisateurs / affectation / concaténation</h2>";
        $number = 127; // On déclare une variable $number et on lui affecte la valeur 127
        echo 'Ma variable $number vaut : '. $number . '<br>'; //je concaténe avec le point(.)

        //Je peux voir le type d'une variable avec la fonction prédéfinie gettype()
        echo 'Le type de ma variable $number est : ' . gettype($number) . '<br>';// ici c'est integer
        ###########################
        $double = 1.5;
        echo 'Ma variable $bouble vaut : '. $double . '<br>';
        echo 'Le type de ma variable $bouble est : ' . gettype($double) . '<br>';// ici il s'agit d'un double
        
        
        ?>
  </main>
  <footer>
    <div class="d-flex justify-content-evenly align-items-center bg-dark text-white p-3">
      <a class="nav-link" target="_blank" href="https://www.php.net/manual/fr/langref.php">Doc PHP</a>
      <a class="nav-link" href="01_index.php"><img src="assets/img/logo.png" alt="logo php"></a>
      <a class="nav-link" target="_blank" href="https://devdocs.io/php/">DevDocs</a>
    </div>
  </footer>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>