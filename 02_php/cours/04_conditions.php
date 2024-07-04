  <?php
    $titre='conditions';
    $titreH1='Les conditions en PHP';
    $paragraphe=null;
    include "inc/header.inc.php";
  ?>
  <header class="p-5 m-4 bg-light rounded-3 border ">
        <section class="container py-5">
            <h1 class="display-5 text-center fw-bold">Les conditions en PHP</h1>
            <p class="col-md-12 fs-4"> Les conditions sont un chapitre clé en PHP comme dans les autres langages de programmation. Par exemple, lorque l'on fera une page de connexion, on aura la condition suivante: sSI l'adresse existe dans la BDD et SI le mdp correspond à l'adresse, l'utilisateur est connecté  SINON il reste sur la page avec une messega d'erreur</p> 
        </section>
  </header><!-- fin header -->
  <main class="container-fluid px-5">
    <div class="row">
      <div class="col-sm-12 my-3 border">
        <h2 class="text-center mt-5 text-primary border rounded">Les conditions simples</h2>
          <h2 class="mt-5">La condition simple if else </h2>

          <p>Pour cette condition, nous déclarons 2 variables :
            <ul>
              <li>$a = 10</li>
              <li>$b = 5</li>           
            </ul>
          </p>
          <?php
          $a = 10;
          $b = 5;
          $c = 2;

          if ($a > $b) {
            echo "<p class='alert alert-success'>La variable a qui contient $a est strictement supérieure à la variable b qui vaut $b </p>";
          }
          else {
            echo "<p class='alert alert-danger'>Non, c'est la variable b ($b) qui est supérieure à la variable a ($a) </p>";
          }
          ?>

          <h2 class="mt-5">La condition simple avec AND ou &&</h2>
          <p>Pour cette condition, nous déclarons 3 variables :
            <ul>
              <li>$a = 10</li>
              <li>$b = 5</li>
              <li>$c = 2</li>
            </ul>
          </p>
          <?php
           if ($a > $b && $b > $c) { // true
            echo "<p class='alert alert-success'>La variable a qui contient $a est strictement supérieure à la variable b qui vaut $b et b est strictmeent supérieur à la variable c qui vaut $c </p>";
          }
          else {
            echo "<p class='alert alert-danger'>Non, c'est la variable b ($b) qui est supérieure à la variable a ($a) </p>";
          }
          ?>
          <p>Comme en JS, la condition avec && attend forcément que chaque côté soit évalué à true et donc que les deux conditions renvoient vrai. Si l'une des deux est fausse, alors on ira au else s'il y en a un ou on affichera rien </p>
          <h2 class="mt-5">La condition simple avec OR ou ||</h2>
          <p>Pour cette condition, nous déclarons 3 variables :
            <ul>
              <li>$a = 10</li>
              <li>$b = 5</li>
              <li>$c = 2</li>
            </ul>
          </p>
          <?php
          if ($a == 9 || $b > $c) {
            echo "<p class='alert alert-success'> Une des deux conditions est vraie, le code renvoie true et le if s'execute </p>";
          }
          else {
            echo "<p class='alert alert-danger'>Aucune des conditions n'est vrai, c'est le else qui s'execute</p>";
          }
          ?>
          <p>Au contraire, lorsque l'on utilise OR '||', on attends qu'une seule des deux conditions soit vraie.</p>

          <h2 class="mt-5">Condition simple avec XOR </h2>
          <p>Alors que le OR s'exécute si une des conditons ou les deux conditions sont bonnes, XOR quant à lui ne s'exécute pas si les deux conditions sont bonnes ou si elles sont fausses. Seule l'une des deux conditions soit être bonne.</p>
          <?php
          if ($a == 10 XOR $b == 6) {
            echo "<p class='alert alert-success'> Une des deux conditions est vraie, le code renvoie true et le if s'execute </p>";
          }
          else {
            echo "<p class='alert alert-danger'>Aucune des conditions n'est vrai, ou les deux conditions sont vrais, c'est le else qui s'execute</p>";
          }
          ?>
      </div>
      <div class="col-sm-12 my-3 border">
        <h2 class="text-center mt-5 text-primary border rounded">Les conditions multiples</h2>
        <h2>Conditions multiples avec if, else if et else</h2>
        <p>Gràce a une conditon multiple, vérifiez dans un premierr temps si a est strictement égal à 8, dans un second temps si a est différent de 10 et enfin si aucune de ces condition n'est vrai</p>
        <?php
        if ($a ===8) {
          echo "<p class='alert alert-success'> a est strictement égale à 8</p>";
        }
        elseif ($a != 10) {
          echo "<p class='alert alert-warning'> a est différent de 10</p>";
        }
        else {
          echo "<p class='alert alert-danger'> a n'est pas égale à 8 et n'est pas différent de 10</p>";
        }
        ?>
      </div>
      <div class="col-sm-12 my-3 border">
        <h2 class="text-center mt-5 text-primary border rounded">Les conditions ternaires</h2>
        <?php
        // la ternaire est une autre syntaxe pour écrire if ... else 
        $a = 11;
        echo ($a === 10) ? "\$a est égale à 10" : "\$a est différent de 10 <br>"; // Dans la ternaire, le '?' remplace le if et le ':' remplace le else. Ainsi on dit -> si $a est égale à 10, on affiche la première expression, sinon la seconde.

              // Explication pour if .. elseif .. else en ternaire :

                      // Imaginons que votre code est de ce type :
                      $var = 1;
                      $var2 = 0;
                      if ($var === 0) {
                          $truc = true;
                      } elseif ($var2 === 0) {
                          $truc = true;
                      } else {
                          $truc = false;
                      }
                      // 6 lignes à écrire pour si peu ? Voici la version compactée :

                      $var = 1;
                      $var2 = 0;
                      $truc = (($var === 0) ? true : ($var2 === 0)) ? true : false;
                    

                      // Et oui, en une ligne, j'utilise 2 fois l'opérateur ternaire pour faire comme un if-elseif-else.          
        ?>
      </div>
      <div class="col-sm-12 my-3 border">
        <h2 class="text-center mt-5 text-primary border rounded">Les opérateurs '==' et '==='</h2>
        <p>L'opérateur <span>==</span> permet de comparer une égalité de valeur, alors que l'opérateur  <span>===</span> permet de comparer de façon stricte et donc une comparaison en valeur et en type</p>
        <?php
            $varA = 1; // integer
            $varB = '1'; // string

            // ==
            if ($varA == $varB) { // la condition est vrai car en valeur 1 et '1' sont équivalents
                echo "<p class=\"alert alert-success\"> \$varA  et \$varB sont égales en valeur</p>";
            }else {
                echo "<p class=\"alert alert-danger\"> \$varA  et \$varB ne sont pas égales en valeur</p>";
            }

            // ===
            if ($varA === $varB) { // la condition est fausse car 1 et '1 sont différents en type
                echo "<p class=\"alert alert-success\"> \$varA  et \$varB sont égales en valeur et en type</p>";
            }else {
                echo "<p class=\"alert alert-danger\"> \$varA  et \$varB  sont égales en valeur mais pas en type  </p>";
            }
        ?>

        <h2>L'opérateur combiné <=></h2>
        <?php
          //$a = 11 $b =5
          echo ($a <=> $b); // afiche 1
          // je change  $b = 11
          echo '<br>';
          $b = 11 ;
          echo ($a <=> $b); // affiche  0
          echo '<br>';
          // je change $b =   
          $b = 12;
          echo ($a <=> $b);  // affiche -1
          echo '<br>';
          /**
           * Ici l'opérateur combiné compare à la fois le : inférieur, le égale et le supèrieur en retournant respectivement la valeur -1, 0 et 1 
           *  <  ----> -1  si a < b (valeur de gauche est inférieure à la valeur de droite)
           *  =  ---->  =  si a = b (valeur de gauche est égal à la valeur de droite)
           *  >  ---->  1  si a > b (valeur de gauche est supérieure à la valeur de droite)
           */

          $a = 50;
          $b = 29; 
          echo gettype( $b);

          if(($a <=> $b) == -1){

            echo "\$a est inférieur à \$b";

          }else if(($a <=> $b) == 0) {

            echo "\$a est égal à \$b";

          } else if (($a <=> $b) == 1){

            echo "\$a est supérieur à \$b";

          }  
        ?>
        <?php                    
          $langue = 'Chinois';

          switch($langue){
            case 'Français':
              echo 'Bonjour !';
            break ;
            case 'Italien':
              echo 'Ciao !';
            break ;
            case 'Espagnol':
              echo 'Hola !';
            break ;
            default:
              echo 'Hello !<br>';
            break;
          }

          // switch avec l'opérateur de combinaison

          switch ($a <=> $b) {
            case -1 :  
                echo 'a est plus petit que b';
            break; // "break" est obligatoire pour quitter le witcgh une fois un "case " est exécuté
            case 0 :
                echo 'a est égal à b' ;
            break;
            case 1 :
                echo 'a est plus grand que b';
            break;
            
        }
        ?>
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
