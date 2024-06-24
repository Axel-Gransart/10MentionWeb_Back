<!doctype html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.png">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Cours PHP - Les boucles</title>
</head>

<body>
  <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="assets/img/logo.png" alt="logo php"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="index.php">Introduction</a>
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
          <li class="nav-item">
            <a class="nav-link" href="07_tableaux.php">Les tableaux en PHP</a>
          </li>
        </ul>

      </div>
    </div>
  </nav>
  <header class="p-5 m-4 bg-light rounded-3 border ">
    <section class="container py-5">
      <h1>Les boucles en PHP</h1>
      <p class="col-md-12 fs-4"> Les boucles (qu'on appelle aussi des structures itératives) sont un moyen de faire
        répéter plusieurs fois un même morceau de code. Une boucle est donc une répétition, comme on a pu le voir en
        JavaScript</p>
    </section>
  </header><!-- fin header -->
  <main class="container-fluid px-5">
    <div class="row d-md-flex justify-content-around my-3">
      <div class="col-sm-12 col-md-8 border my-3 border-primary">
        <h2 class="text-center text-primary">La boucle <em>WHILE</em></h2>
        <p>La boucle est, comme en JS, une boucle qui permet d'executer un code TANT QUE la condition d'entrée est
          toujours remplie.</p>
        <?php
              $a =0; // Initialisation de la variable à 0 => valeur de départ de la boucle
              while ($a < 5) { // On boucle tant que $a est strictement inférieur à 5
                echo "<p> tour n° $a</p>"; // On affiche à quel tour on se trouve
                $a ++; // On incrémente la valeur de la variable pour que le condition d'entrée devienne false à un moment donné
              }
            ?>
      </div>
      <div class="col-sm-12 col-md-8 border my-3 border-primary">
        <h2 class="text-center text-primary">Exercice boucle <em>WHILE</em></h2>
        <p> à l'aide d'une boucle while, vous affichez les années de 1920 à 2023 dans un menu déroulant.</p>
        <?php
              // Exercice :
                // à l'aide d'une boucle while, vous affichez les années de 1920 à 2023 dans un menu déroulant.              
                
              $annee = 1920;
            
              echo '<select name="" id="">';
              while ($annee <= 2023) { 
                    echo "<option value='$annee'>$annee</option>"; 
                    $annee ++; 
                  }
              echo '</select>';
            ?>
        <p> Exercice bonus : on fait la même chose dans l'autre sens, de 2023 à 1920.</p>
        <?php
              $annee1 = 2023;
             
              echo '<select name="" id="">';
              while ($annee1 >= 1920) { 
                    echo "<option value='$annee1'>$annee1</option>"; 
                    $annee1 --; 
                  }
              echo '</select>';
            ?>
      </div>
      <div class="col-sm-12 col-md-8 border my-3 border-primary">
        <h2 class="text-center text-primary">La boucle <em>DO WHILE</em></h2>
        <p>cete boucle fonctionne avec la même instruction que la boucle <span>while</span>. Ce pendant ppour cette
          boucle, la condition est testée à la fin et pas au début</p>
        <p>La boucle do while a la particularité de s'exécuter au mois une fois puis tant que la condition de fin est
          vraie</p>
        <?php

            $i = 0; // déclaration et initialisation de la variable : valeur de départ
                do { // ici on exécute d'abord cette première partie avant même de regarder la condition
                    $i++; // j'incrémente  1
                    echo "<p>$i</P>"; // j'affiche la valeur de $i

                }while($i > 100); // je donne la condition, si elle a déjà été rempli, mon scipt à cet endroit, sinon la boucle recommence jusqu'à ce que la condition soit remplie.
            ?>
      </div>
      <div class="col-sm-12 col-md-8 border my-3 border-primary">
        <h2 class="text-center text-primary">La boucle <em>FOR</em></h2>
        <p>La boucle FOR, comme toute les boucles, sert à répeter un morceau de code tant que la condition n'est pas
          respectée. Sa structure est cependant différente :</p>
        <ol>
          <li><span>Initialisation de la variable</span></li>
          <li><span>Condition de sortie</span></li>
          <li><span>Incrémentation de la variable</span></li>
        </ol>
        <?php
                for ($i=0; $i <15 ; $i++) { // je lance ma boucle for avec les options citées au dessus 
                    echo "<span class='me-5'>Tour n° $i</span>"; // Dans les accolades, je précise le code à répéter
                }                
            ?>
      </div>
      <div class="col-sm-12 col-md-8 border my-3 border-primary">
        <h2 class="text-center text-primary">Exercie boucle <em>FOR</em></h2>
        <p>Créer en PHP un formulaire de selection de date de naissance (jour - mois - année)</p>
        <div class="bg-secondary text-white mb-3">
          <?php
                           
              echo '<form class="d-flex justify-content-around">
                      <div>
                        <label for="jour"> Jour de naissance</label>
                          <select class="for-select" name="jour" id="jour">';
              for ($day = 1; $day <= 31 ; $day ++) { 
                echo "<option value='$day'>$day</option>";                  
              }
              echo '</select>
                  </div>';
              
              echo '<div>
                      <label for="mois"> mois de naissance</label>
                        <select class="for-select" name="mois" id="mois">';
              for ($month = 1; $month <= 12 ; $month ++) { 
                echo "<option value='$month'>$month</option>"; 
              }
              echo '</select>
                  </div>';
              
              echo '<div>
                      <label for="annee"> année de naissance</label>
                        <select class="for-select" name="annee" id="annee">';
              for ($year = 1972; $year <= 2024 ; $year ++) { 
                    echo "<option value='$year'>$year</option>";                   
              }
              echo '</select>
                  </div>
                </form>';
                  
                  
              ?>
        </div>
        <p>Créer un tableau qui affiche 0 à 9 sur une seule ligne avec comme titre de colonne "colonne numéro"</p>
        <div class="bg-secondary text-white mb-3">
          <?php
                echo '<table class="mx-auto">
                        <thead>
                          <tr class="border border-primary">
                            <td class="border border-primary" colspan="10">Colonne numéro</td>
                          </tr>
                          <tr>';
                for ($number = 0; $number <= 9 ; $number ++) { 
                  echo "<td class='border border-primary'>$number</td>";                  
                }
                echo '</tr>
                    </table>';
                
                    
                echo '<table class="mx-auto">
                <thead>
                  <tr class="border border-primary">';
                for ($numero = 0; $numero <= 9 ; $numero ++) { 
                  echo "<td class='border border-primary'>Colonne numéro $numero</td>";
                }
                echo "</tr>
                  <tr>";
                for ($number = 0; $number <= 9 ; $number ++) { 
                  echo "<td class='border border-primary'>$number</td>";                  
                }
                echo '</tr>
                    </table>';         
                    
                
                    echo "<table class=\"table table-bordered mt-5\">
                    <tr>";
                    for ($i = 1; $i <= 9; $i++) {
                        echo "<td>Colonne numéro $i </td>";
                    }
                    echo      "</tr>
                    <tr>";
                    for ($i = 0; $i < 9; $i++) {
                        echo "<td> $i </td>";
                    }
                    echo     "</tr>
                    </table>";
              ?>

        </div>
      </div>
      <div class="col-sm-12 col-md-8 border my-3 border-primary">
        <h2 class="text-center text-primary">La boucle <em>FOR EACH</em></h2>
        <p>La boucle FOR EACH sert à parcourir un tableau ( array() ou [] ). On verra cette boucle plus en détails dans
          la page dédiée aux array(). </p>

        <p class="alert alert-danger">Attention. Lorsque que vous faites une boucle, vérifiez votre condition de sortie
          ainsi que l'incrémentation de votre variable. Sans incrémentation, vous aurez une boucle infinie.</p>

        <p class="alert alert-secondary">A force d'utilier les boucles, il sera de plus en plus logique de choisir telle
          ou telle boucle pour tel ou tel usage. </p>
      </div>
    </div>



  </main>
  <footer>
    <div class="d-flex justify-content-evenly align-items-center bg-dark text-white p-3">
      <a class="nav-link" target="_blank" href="https://www.php.net/manual/fr/langref.php">Doc PHP</a>
      <a class="nav-link" href="01_index.php"><img src="assets/img/logo.png" alt="logo php"></a>
      <a class="nav-link" target="_blank" href="https://devdocs.io/php/">DevDocs</a>
    </div>
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>