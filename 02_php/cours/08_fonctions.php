<?php 
$title= "Les fonctions en PHP";
$titre= "Les fonctions en PHP";
$paragraphe = "Les fonctions";
require_once ("inc/header.inc.php");
?>

<main class="container px-5 border">
  <div class="row mt-5">
    <h2 class="mt-5">1 - Les fonctions prédéfinies </h2>
    <ul>
      <li> Une fonction prédéfine permet de réaliser un traitement spécifique prédéterminé dans le langage PHP</li>
    </ul>
    <div class="col-sm-12 mt-5">
      <h3 class="text-primary text-center mb-5">Les fonctions prédéfinies des chaînes de carcatères </h3>
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <ul>
            <!-- https://www.php.net/manual/en/function.rtrim.php -->
            <li><span>substr()</span> : permet d'extraire une partie d'une chaine de caractère</li>
            <li><span>strpos()</span>: permet de récuperer la position d'un caractère dans une chaîne de caractère </li>
            <li><span>strlen()</span> : permet de récupérer la taille d'une chaîne de carctére</li>
            <li><span>substr_replace()</span> : permet de remplacer un segment de la chaîne</li>
            <li><span>substr_ireplace()</span>: Version insensible à la casse de str_replace()</li>
            <li><span>str_contains()</span> : permet de vérifier si la chaîne contient un mot particulier</li>
            <li><span>str_starts_with()</span> : permet de vérifier si une chaîne commence par une sous-chaîne donnée
            </li>

          </ul>
        </div>
        <div class="col-sm-12 col-md-6">
          <ul>
            <li><span>str_ends_with()</span> : permet de vérifier si une chaîne se termine par une sous-chaîne donnée
            </li>
            <li><span>trim()</span> : permet de supprimer les espaces avant et après une chaîne de caractère </li>
            <li><span>strtolower()</span> : permet de retourner la chaîne en miniscule</li>
            <li><span>strtoupper()</span> : permet de retourner la chaîne en majuscules</li>
            <li><span>ucfirst()</span> : permet de mettre le premier caractère en majuscule. </li>
            <li><span>lcfirst()</span> : permet de mettre le premier caractère en miniscule. </li>
          </ul>
        </div>
      </div>
      <?php
                        $maChaine = "Bonjour j'aime le PHP !!";
                        // J'affiche un caractère de la chaine de caractère
                        echo $maChaine[3] . "<br>";

                        // Modifier un caractère de la chaine
                        $maChaine[0] = "B"; // je change le b minuscule en B majuscule
                        echo $maChaine . "<br>";

                        // Extraire une partie de la chaine de caractère
                        $nvlChaine = substr($maChaine, 0, 9); // Cette fonction prend en paramètre la variable, le point de départ et la longueur qu'on souhaite obtenir
                        echo $nvlChaine . "<br>";

                        //Exercice 
                        // Récupérez une partie du texte (de l'indice 0 à l'indice 40) et  remplacer la partie enlever avec ce morceau de code :
                        // ...<a href="#"> lire la suite </a>
                        $texte = " Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi ducimus illum, sequi harum vitae tempore veritatis? Aliquam saepe quia     delectus molestiae aut repudiandae expedita autem, dolorem dolorum cum nesciunt dolor.
                        Praesentium eum, molestiae autem quas numquam temporibus et cupiditate corporis quo eos deserunt magni non cum explicabo doloribus, fugiat illum    necessitatibus maxime! Similique corporis veniam sunt consequuntur soluta est aliquam?
                        Mollitia, sint incidunt est vero, blanditiis, officiis nostrum quisquam maxime rem sed at neque dolor magni ratione. Veniam, obcaecati. Voluptate   consequuntur consectetur provident voluptates ex mollitia, saepe odio necessitatibus voluptas?
                        Facilis, officia illo accusantium libero quidem laborum inventore, eveniet excepturi nobis neque doloremque itaque expedita voluptatum molestias hic    quo facere! Aliquam suscipit deserunt perferendis nesciunt illo earum eaque quo excepturi.";

                        $nvText = substr($texte, 0, 41);
                        echo $nvText . "<a href='#'> lire la suite </a>";

                        # /!\ Attention : Les espaces sont des caractères dans la chaine et les accents circonflexe sont considérés comme 2 caractères.

                        # récupérer la position d'un caractère dans une chaine de caractère :
                        echo "<br><br>";

                        echo 'La position de la lettre H dans ma phrase est : ' . strpos($maChaine, 'H'). '<br>';

                        // Attention ! La fonction est case sensitive. Elle fait attention à la casse des lettres : si je mets la lettre h en minuscule, il ne nous affiche rien.

                        var_dump(strpos($maChaine, 'h'));

                        # Récuperer la taille d'une chaîne de caractère
                        echo "<br><br>";

                        echo strlen($maChaine);

                        # Remplacer une partie de la chaîne
                        echo "<br><br>";

                        $maChaine = str_replace('PHP', 'JS', $maChaine); // Les paramètres de la fonction : la chaîne de caractère à changer, la chaîne de caractère qui remplace, et a variable à manipuler
                        echo $maChaine .'<br>'; 
                        // Ici aussi la fonction est sensible à la casse on ne change pas la valeur si y'en as une différence entre la valeur cherché et stocké
                        // il existe un autre fonction qui ne fait pas de distinction entre les lettres majuscule et miniscule dans la chaîne 
                        $maChaine = str_ireplace('bonjour', 'Hello', $maChaine);
                        echo $maChaine .'<br>'; 

                        # Varifier si la chaîne contient un mot particulier 
                        echo "<br><br>";

                        var_dump(str_contains($maChaine, 'JS')); // les paramètres : la variable qui contient la chaîne et le mot à vérifier dans la chaîne // sensible à la casse 
                        // Le résiltat est un boolean true ou false (trouvé ou pas trouvé)

                        echo '<br>';
                        # Vérifier si la chaîne commence par ce que vous notez dans les paramètres
                        echo "<br><br>";

                        var_dump(str_starts_with($maChaine, 'Hel'));

                        echo '<br>';

                        # Vérifier si la chaîne se termine par ce que vous notez dans les paramètres
                        echo "<br><br>";

                        var_dump(str_ends_with($maChaine, '!'));

                        echo '<br>';

                        # Supprimer les espaces en début et fin de chaîne
                        echo "<br><br>";
                        
                        $testTrim = "   Je suis une phrase avec des espaces au début et à la fin   ";
                        
                        echo $testTrim . '<br>';
                        echo strlen($testTrim) . '<br>';

                        echo '<br>';
                        
                        $nouveau = trim($testTrim);
                        echo $nouveau  . '<br>';
                        echo strlen($nouveau) . '<br>';                      
                    ?>
    </div>
    <div class="col-sm-12 mt-5">
      <h3 class="text-primary text-center mb-5">Les fonctions prédéfinies des tableaux </h3>
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <ul>
            <li><span>array_push()</span> : permet d'ajouter plusieurs valeurs à la fin d' un tableau</li>
            <li class="alert alert-warning">Si on veut ajouter une seule valeur à la fin on utilise la syntaxe :
              <strong>$tableau[] = valeur_à_ajouter</strong>
            </li>
            <li><span>array_unshift</span>: permet d'ajouter une valeur au début d'un tableau</li>
            <li><span>array_pop</span>: permet de supprimer la dernière valeur d'un tableau</li>
            <li><span>array_shift</span>: permet de supprimer la première valeur d'un tableau</li>
            <li><span>unset()</span>: permet de supprimer un élément d'un tableau</li>
            <li><span>shuffle</span>: permet de mélanger et réorganiser un tableau</li>
          </ul>
        </div>
        <div class="col-sm-12 col-md-6">
          <ul>
            <li><span>array_chunk</span>: permet de déviser un tableau en plusieurs parties et avec un nombre de valeurs
              à définir</li>
            <li><span>count() / sizeof()</span> : permet de retourner la taille du tableau passé en paramètre.</li>
            <li><span>in_array()</span>: permet de vérifier qu'une valeur est présente dans un tableau.</li>
            <li><span>array_key_exists()</span> : permet de vérifier si une clé existe dans un tableau.</li>
            <li><span>explode()</span> : permet de transformer une chaîne de caractère en tableau</li>
            <li><span>implode()</span> : permet de Transformer un tableau en chaîne de caractères.</li>
            <li><span>array_slice()</span> : permet de récuperer une partie d'un tableau </li>
          </ul>
        </div>
        <?php
                    echo'<h2>Tableau de départ</h2>';
                    $tableau = ['Rouge', 'Bleu', 'Rose', 'Violet'];
                    echo'<pre class="bg-info-subtle">';
                    var_dump($tableau);
                    echo'</pre>';

                    echo'<h2>Ajouter des valeurs à la fin</h2>';
                   array_push($tableau, 'Vert','noir'); // dans les paramétres on met la variable qui contient le tableau ensuite les valeurs à ajouter
                    echo'<pre class="bg-info-subtle">';
                    var_dump($tableau);
                    echo'</pre>';
                    
                   echo'<h2>Ajouter des valeurs au début</h2>';
                    echo "<br><br>";

                    array_unshift($tableau,'Gris', 'Jaune');
                    echo'<pre class="bg-info-subtle">';
                    var_dump($tableau);
                    echo'</pre>';

                    echo'<h2>Supprimer la dernière valeur du tableau</h2>';
                    echo "<br><br>";

                    $valeurSupprimerFin = array_pop($tableau); // Supprime la valeur et je peux la stocker dans une variable 

                    echo'<pre class="bg-info-subtle">';
                    var_dump($tableau);// tableau après suppressioin de la dernière valeur
                    echo'</pre>';

                    echo "<br>";

                    echo'<pre class="bg-info-subtle">';
                    var_dump($valeurSupprimerFin);// La couleur supprimée à la fin du tableau
                    echo'</pre>';

                    echo'<h2>Supprimer la première valeur du tableau</h2>';
                    echo "<br><br>";

                    $valeurSupprimerDebut = array_shift($tableau);

                    echo'<pre class="bg-info-subtle">';
                    var_dump($tableau);// tableau après suppressioin de la première valeur
                    echo'</pre>';

                    echo "<br>";

                    echo'<pre class="bg-info-subtle">';
                    var_dump($valeurSupprimerDebut);// La couleur supprimée au début du tableau
                    echo'</pre>';

                    echo'<h2>Mélanger un tableau</h2>';
                    echo "<br><br>";

                    shuffle($tableau);
                    echo'<pre class="bg-info-subtle">';
                    var_dump($tableau);
                    echo'</pre>';

                    echo "<br><br>";
                    echo'<h2>Diviser un tableau en plusieurs partie</h2>';

                    $tableau2 = array_chunk($tableau,3, true); // En ajoutant true  dans les paramètres, je garde les même indices au valeurs du tableau d'origine
                    echo'<pre class="bg-info-subtle">';
                    var_dump($tableau2);
                    echo'</pre>';

                    echo'<h2>Compter les éléments dans un tableau</h2>';
                    echo "<br><br>";


                    $nbr1 = count($tableau);
                    $nbr2 = sizeof($tableau);
                    echo'<pre class="bg-info-subtle">';
                    var_dump($nbr2);
                    echo'</pre>';

                    echo'<h2>Vérifier une valeur dans un tableau</h2>';
                    echo "<br><br>";

                    $result = in_array('Bleu', $tableau); // cette fonction est sensible à la casse 
                    echo'<pre class="bg-info-subtle">';
                    var_dump($result);
                    echo'</pre>';

                    echo'<h2>Vérifier une clé dans un tableau </h2>';
                    echo "<br><br>";

                    $result = array_key_exists(2, $tableau);
                    echo'<pre class="bg-info-subtle">';
                    var_dump($result);
                    echo'</pre>';

                    echo'<h2>Créer un tableau à partir de deux tableaux</h2>';
                    echo "<br><br>";

                    $couleur = ['Rouge', 'Orange','Turquoise'];

                    $all = [...$tableau, ...$couleur]; // On décompose chacun des tableaux avec l'opérateur de décomposition(...)
                    echo'<pre class="bg-info-subtle">';
                    var_dump($all);// La variable $all contient le nouveau tableau indéxé créer à partir des deux tableaus 
                    echo'</pre>';

                    echo'<h4>Je n\'aurais pas le même résultat avec cette syntaxe</h4>';
                    echo "<br>";
                    
                    $all = [$tableau,$couleur];
                    echo'<pre class="bg-info-subtle">';
                    var_dump($all);// resultat: un tableau multidimentsionnel
                    echo'</pre>';

                    echo'<h2>Transformer une chaîne de caratère en tableau</h2>';
                    echo "<br><br>";

                    $maChaine2 = 'Je me transforme en tableau';
                    $chaineEnTableau = explode(' ', $maChaine2 ); // Le sparamètres : le caractére de séparation dans la chaîne, et la variable de la chaîne à scinder
                    echo'<pre class="bg-info-subtle">';
                    var_dump($chaineEnTableau);
                    echo'</pre>';

                    echo'<h2>Transformer un tableau en chaîne de caractère</h2>';
                    echo "<br><br>";
                    
                    $monTab = ['Salut', 'je', 'viens', 'du', 'tableau', '!'];
                    $tableauEnChaine = implode(' ', $monTab); // Les paramètres : le caractére de séparation dans la chaîne et la variable du tableau à fusionner 
                    echo'<pre class="bg-info-subtle">';
                    var_dump($tableauEnChaine);
                    echo'</pre>';

                    echo "<br>";

                    echo$tableauEnChaine;

                    echo'<h2>Récupérer une partie d\'un tableau</h2>';
                    echo "<br><br>";

                    $monArray = [
                         'a' => 1,
                         'b' => 2,
                         'c' => 3,
                         'd' => 4,
                         'e'=> 5
                    ];
                    echo "<br>";

                    $nvArray = array_slice($monArray, 1,2);

                    echo'<pre class="bg-info-subtle">';
                    var_dump($nvArray);
                    echo'</pre>';

                  ?>
      </div>
      <div class="col-sm-12 mt-5">
        <h3 class="text-primary text-center mb-5">Les fonctions <em class="fw-bold">isset()</em> et <em
            class="fw-bold">empty()</em></h3>
        <ul>
          <li class="alert alert-success">Ces fonctions sont utiles lorsque vous souhaitez effectuer une validation de
            données.</li>
        </ul>
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h4 class="text-success text-center"> <em class="fw-bold">isset()</em></h4>
            <ul>
              <li>La fonction <em class="fw-bold">isset()</em> détermine si une variable existe.</li>
              <li>La fonction vérifie si la variable est définie, et non NULL </li>
              <li>La fonction retourne true quand la variable testé est définie ou elle ne contient pas la valeur NULL
              </li>
            </ul>

          </div>
          <div class="col-sm-12 col-md-6">
            <h4 class="text-success text-center"><em class="fw-bold">empty()</em></h4>
            <ul>
              <li>La fonction <em class="fw-bold">empty()</em> vérifie si une variable est vide.</li>
              <li>La focntion retourne true si la variable testé est égale à :
                <ul>
                  <li>"" ou '' (une chaîne vide)</li>
                  <li>0 (0 en tant qu'entier)</li>
                  <li>"0" (0 en tant que chaîne de caractères)</li>
                  <li>NULL</li>
                  <li>false</li>
                  <li>array() (un tableau vide)</li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
        <hr>
        <?php
          $var1 = 0;
          $var2 = '';

          if (isset($var1)) {
                            
            echo "\$var1 existe et est not NULL, elle est égale à $var1 <br>";

          } else {
            echo "\$var1 n'existe pas et est NULL <br>";
          }
        


          ###################################

          if (empty($var2)) {
              
              echo "\$var2 est vide (0, string vide, NULL, non définie) <br>";

          } else {
              echo "\$var2 n'est pas vide <br>";
          }

          /* Utilisation : 
                  empty() -> pour valider et vérifier qu'un formulaire est rempli
                  isset() -> pour vérifier l'existance d'une variable avant de l'utiliser
          
          */

        ?>
      </div>
    </div>
    <div>

      <h2 class="mt-5">2 - Les fonctions Utilisateurs </h2>
      <ul>
        <li>Les fonctions utilisateurs sont des morceaux de code écrits dans des accolades et portant un nom.</li>
        <li>On applele une fonction au besoin pour exécuter le code qui s'y trouve .</li>
        <li>Il est d'usage de créer des fonctions pour ne pas se répéter quand on veut exécuter plusieurs fois le même
          traitement . On parle alors de "factoriser" son code.</li>
      </ul>

      <?php
            function separation() { // On déclare une fonction avec le mot clé 'function' suivi du nom de la fonction et d'une paire de () qui accueilleront des paramètres ultèrieurement
              
              echo '<hr>';
            }
            separation(); // Pour éxécuter une fonction (donc le code qui s'y trouve), on l'appelle en écrivant son nom suivi d'une paire de ()
            
            ####################### Fonction sans Return #######################
            
            function bonjour1($prenom, $nom) { // $prenom et $nom sont les paramètres de notre fonction. Ils permettent de recevoir une valeur car il s'agit de variables de réception
              
              echo "<p>Bonjour $prenom $nom </p>";
            };
            
            bonjour1("Axel", "Gransart");
            
            ####################### Fonction avec Return #######################
            
            function bonjour2($prenom, $nom) {
              return "<p>Bonjour $prenom $nom </p>"; // return permet de sortir la phrase "Bonjour ..." et de la renvoyer à l'endroit où la fonction est appelée
              
              // Après le return, toute les instructions ne seront pas éxécutés
            }
            
            echo bonjour2("Jacques", "Dupont"); // Ici on met un echo car la fonction nous retourne la phrase mais ne l'affiche pas directement.
            
            // Ici on peut remplacer les arguments par des variables (provenant d'un formulaire par exemple)
            
            $prenom1 = 'spartak';
            $nom1 = 'SMBATYAN';
            
            echo bonjour2($prenom1, $nom1); // Les 2 arguments sont variables et peuvent recevoir n'importe quelle valeur
            
            $prenom1 = 'Paul';
            $nom1 = 'PIERRARD';
            
            echo bonjour2($prenom1, $nom1);
            
            echo "<h3>Exercice : vous écrivez une fonction qui multiplie un nombre 1 par un nombre 2 fournis lors de l'appel . cette fonction retourne le résultat de la multiplication . Vous affichez le résultat :</h3>";
            
            function mult($nb1, $nb2) {
              return "<p>Si on multiplie $nb1 par $nb2, le résultat est : " . $nb1*$nb2 . "</p>";
            }

            echo mult(12, 5);
            
            $nbr1 = 60;
            $nbr2 = 30;
            
            echo mult($nbr1, $nbr2);
            echo mult($nbr1, $nbr2 = 10); // Je réaffecte une nouvelle  valeur à ma variable directement dans les arguments de ma fonction
            
            ####################### Fonction avec paramètre optionnel #######################
            
            // Certains paramètres peuvent ne pas être passés à la création de la fonction. Une valeur est fournis lors de la déclaration.
            
            function bonjour3($prenom, $nom, $bonjour = "Salut") {
              echo "<p>$bonjour $prenom $nom</p>";
            }

            bonjour3(prenom : 'Antoine', nom : 'Dupont');
            
            bonjour3(prenom : 'John', nom : 'Doe', bonjour : 'Hello');
            
            ?>
    </div>
    <div class='row'>
      <h2 class="mt-5">3 - Portée des variables dans les fonctions</h2>
      <div class="col-sm-12 col-md-4 border rounded">
        <h3 class='text-primary text-center mb-5'>Variables locales</h3>
        <p>Les variables déclarées dans vos scripts ne sont pas accessibles dans vos fonctions et inversement</p>
        <?php
          const A = 'Je suis une constante';
          echo A;

          echo "<br>";

          define("B", "Je suis aussi une constante");
          echo B;

          $a = 5;

          echo "<br><br>";

          function maFonction() {
            echo A; // La constante est appelé à l'exterieur de la fonction et je peux bien récupérer sa valeur de l'intérieur de la fonction
            // echo $a; // -> Affiche Variable non définie

            $b = 3;

            echo "<p>La variable \$b = $b </p>"; // Affiche 3 : ici nous nous trouvons dans l'espace local de la focntion. cette variable est dite "locale"
          }

          maFonction();
          
          echo "<p>La variable \$a = $a </p>";
          // echo "<p>La variable \$b = $b </p>"; // je demande à afficher la variable $b qui est définie dans la fonction => affiche variable indéfinie : on ne peut pas accéder à cette variable car elle n'est connue que à l'intérieur de la fonction
        ?>
      </div>
      <div class="col-sm-12 col-md-4 border rounded">
        <h3 class='text-primary text-center mb-5'>Variables globales</h3>
        <p>Les variables déclarées dans vos scripts peuvent être accessibles dans vos fonctions à condition d'être
          déclarés avec le mot clé <em class="fw-bold">global</em></p>
        <?php

        $a = 2;

        function maFonction2() {
          global $a; // permet d'aller chercher la variable à l'éxtérieur de la fonction pour pouvoir l'exploiter à l'intérieur
          echo "<p>La variable \$a dans la fonction = $a </p>";

          define("C", "Je suis une constante déclaré dans une fonction mais appelée en dehors");
        }

        maFonction2();

        echo "<p>La variable \$a en dehors de la fonction = $a </p>";
        echo C;

        ?>
      </div>
      <div class="col-sm-12 col-md-4 border rounded">
        <h3 class='text-primary text-center mb-5'>Variables static</h3>
        <p>Les variables d'une fonction sont réinitialisées à chaque appel de cette fonction.</p>
        <p>Si l'on veut conserver la valeur précédente, il faut déclarer la variable comme static</p>
        <?php
          function maFonction3() {
            static $c = 3;
            $c ++;
            echo "<p>La variable \$c = $c </p>";
          }

          maFonction3(); // 4
          maFonction3(); // 5
          maFonction3(); // 6
          maFonction3(); // 7
        ?>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <h2 class="mt-5">4 - Typage des paramètres dans les fonctions</h2>
        <ul>
          <li>Dans nos fonctions on peut ajouter des contraintes de type sur les arguments et sur les valeurs de retour de fonction</li>
          <li>Le typage permet un débogage du code plus rapide. En effet, si vous ne transmettez pa le bon type de paramètre à votre fonction, ou si elle ne retourne pas le bon type, une erreur se déclenchera immédiatement au déclenchement de la fonction. Sinon , vous pourriez avoir une cascades d'erreurs non détéctés et retournant un résultat faux.</li>
        </ul>
        <?php

          function prix(int $val) : void { // La fonction attends un entier en argument (int $val) et ne retourne rien (void)
            echo var_dump($val);

            echo "<p>Cet objet coûte $val euros</p>";
          }

          prix(3);
          // prix('beaucoup'); // L'appel avec une chaine déclenche un typeError car la fonction attend un nombre entier en paramètre

          // On peut déclarer une union de type en écrivant plusieurs types et en les séparant par des pipes 
          function cout(int|string $val) : void {

            echo "<p>Cet objet coûte $val euros</p>";
          }
          cout(5);
          cout('beaucoup');

          // Fonction avec return

          function diviser(int $nbr1, int $nbr2) {
            $resultat = $nbr1 / $nbr2;
            return "<p> Le résultat de la division du nombre \$nbr1 / \$nbr2 = $resultat </p>";
          }
          
          echo diviser(9,2);

          function diviser2(int $nbr1, int $nbr2) : float {
            $resultat = $nbr1 / $nbr2;
            // return "<p> Le résultat de la division du nombre \$nbr1 / \$nbr2 = $resultat </p>";
            return $resultat;
          }
          
          echo diviser2(12,5);
        ?>
      </div>
    </div>
</main>

<?php include_once ("inc/footer.inc.php");?>