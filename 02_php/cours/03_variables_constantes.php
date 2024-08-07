<?php
    $titre='variables constantes';
    $titreH1='Les variables constantes en PHP';
    $paragraphe=null;
    include "inc/header.inc.php";
  ?>
  <header class="p-5 m-4 bg-light rounded-3 border">
    <section class="container py-5">
      <h1 class="display-5 text-center fw-bold">Les variables et les constantes en PHP</h1>
    </section>
  </header>
  <main class="container-fluid px-5 row">
    <h2 class="text-center">Les variables utilisateurs / affectation / concaténation</h2>   
    <div class="border rounded my-3 col-sm-12 col-md-6 p-3">
      <h3 class="text-danger fw-bold">- Variable number</h3>
      <div>
        <p>On déclare une variable $number et on lui affecte la valeur 127</p>
        <pre> $number = 127;</pre>
        <p>Ensuite on affiche une phrase et on concatène avec le point(.)</p>
        <pre> echo 'Ma variable $number vaut : '. $number;</pre>
        <?php
        $number = 127; // On déclare une variable $number et on lui affecte la valeur 127
        echo 'Ma variable $number vaut : '. $number . '<br><br>'; //je concatène avec le point(.)
        ?>
        <p>Je peux voir le type d'une variable avec la fonction prédéfinie <em class="fw-bold">gettype()</em> :</p>
        <pre> echo 'Le type de ma variable $number est : ' . gettype($number);</pre>
        <?php
        //Je peux voir le type d'une variable avec la fonction prédéfinie gettype()
        echo 'Le type de ma variable $number est : ' . gettype($number) . '<br><br>';// ici c'est integer
        
        ?>
        <p class="alert alert-success">ici il s'agit d'un type de variable <em class="fw-bold">integer</em> (nombre entier)</p>
      </div>
    </div>
<!-- ########################### -->
    <div class="border rounded my-3 col-sm-12 col-md-6 p-3">
      <h3 class="text-danger fw-bold">- Variable double</h3>
      <div>
        <p>On déclare une variable $double et on lui affecte la valeur 1.5</p>
        <pre> $double = 1.5;
 echo 'Ma variable $double vaut : '. $double;
 echo 'Le type de ma variable $double est : ' . gettype($double);</pre>       
        <?php
        $double = 1.5;
        echo 'Ma variable $double vaut : '. $double . '<br>';
        echo 'Le type de ma variable $double est : ' . gettype($double) . '<br><br>';// ici il s'agit d'un double (nombre à virgule)
        ?>
        <p class="alert alert-success">ici il s'agit d'un type de variable <em class="fw-bold">double</em> (nombre à virgule)</p>
      </div>
    </div>
<!-- ########################### -->
    <div class="border rounded my-3 col-sm-12 p-3">
      <h3 class="text-danger fw-bold">- Variable string</h3>
      <div class="m-1 my-3 p-3 border">
        <h4>Une chaine de caractère entre simple quotes</h4>
        <pre>
 $chaine = 'Une chaine de caractère entre simple quotes';
 echo 'Ma variable $chaine vaut : ' . $chaine;
 echo 'Le type de ma variable $chaine est : ' . gettype($chaine);</pre>
        <?php        
        $chaine = 'Une chaine de caractère entre simple quotes';
        echo 'Ma variable $chaine vaut : ' . $chaine . '<br>';
        echo 'Le type de ma variable $chaine est : ' . gettype($chaine) . '<br><br>'; // ici il s'agit d'une string
        ?>
        <p class="alert alert-success">ici il s'agit d'un type de variable <em class="fw-bold">string</em> (chaîne de caractère)</p>
      </div>
      <!-- ########################### -->
      <div class="m-1 my-3 p-3 border">
        <h4>Une chaine de caractère entre double quotes</h4>
        <pre>
 $chaine1 = "Une chaine de caractère entre double quotes";
 echo "Ma variable \$chaine1 vaut : " . $chaine1;
 echo 'Le type de ma variable $chaine1 est : ' . gettype($chaine1);</pre>
        <?php
        $chaine1 = '"Une chaine de caractère entre double quotes"';
        echo "Ma variable \$chaine1 vaut : " . $chaine1 . '<br>';
        echo 'Le type de ma variable $chaine1 est : ' . gettype($chaine1) . '<br><br>'; // ici il s'agit d'une string
        ?>
        <p class="alert alert-success">ici il s'agit d'un type de variable <em class="fw-bold">string</em> (chaîne de caractère)</p>
      </div>
      <!-- ########################### -->
      <div class="m-1 my-3 p-3 border">
        <h4>Une chaine de caractère entre quotes</h4>
        <pre>
 $chaine2 = '127';
 echo 'Ma variable $chaine2 vaut : ' . $chaine2;
 echo 'Le type de ma variable $chaine2 est : ' . gettype($chaine2);</pre>
        <?php
        $chaine2 = "'127'";
        echo 'Ma variable $chaine2 vaut : ' . $chaine2 . '<br>';
        echo 'Le type de ma variable $chaine2 est : ' . gettype($chaine2) . '<br><br>'; // ici il s'agit d'une string (c'est un nombre mais placé entre simple ou double quotes)
        ?>
        <p class="alert alert-success">ici il s'agit d'un type de variable <em class="fw-bold">string</em> (chaîne de caractère) même s'il s'agit de nombre. Toutes valeurs de variable noté entre quotes (simple ou double) est considérée de type string.</p>
      </div>
      <!-- ########################### -->
      <div class="m-1 my-3 p-3 border">
        <h4>Une chaine de caractère entre backquotes</h4>
        <pre>
 $chaine3 = `Une chaine de caractère entre backquotes`;
 echo 'Ma variable $chaine3 vaut : ' . $chaine3;
 echo 'Le type de ma variable $chaine3 est : ' . gettype($chaine3);</pre>
        <?php
        $chaine3 = `Une chaine de caractère entre backquotes`;
        echo 'Ma variable $chaine3 vaut : ' . $chaine3 . '<br>';
        echo 'Le type de ma variable $chaine3 est : ' . gettype($chaine3) . '<br><br>';
        ?>
        <p class="alert alert-success">ici il s'agit d'un type de variable <em class="fw-bold">NULL</em> (null = vide)</p>
      </div>
    </div>
    <!-- ########################### -->
    <div class="border rounded my-3 col-sm-12 p-3">
      <h3 class="text-danger fw-bold">- Variable boolean</h3>
      <pre>
 $boolean = true;
 echo 'Ma variable $boolean valeur true vaut : ' . $boolean;
 $boolean1 = false;
 echo 'Ma variable $boolean1 valeur false vaut : ' . $boolean1;
 echo 'Le type de ma variable $boolean est : ' . gettype($boolean)</pre>
        <?php
        $boolean = true; // ou false -> Le navigateur associe true à 1 et false à vide qui correspond à 0
        echo 'Ma variable $boolean valeur true vaut : ' . $boolean . '<br>';
        $boolean1 = false;
        echo 'Ma variable $boolean valeur false vaut : ' . $boolean1 . '<br>';
        echo 'Le type de ma variable $boolean est : ' . gettype($boolean) . '<br><br>'; // ici il s'agit d'un boolean (booléen) : permet de savoir si quelque chose est vrai ou faux
        ?>
        <p class="alert alert-success">ici il s'agit d'un type de variable <em class="fw-bold">boolean</em> (true or false)</p>
        <p class="alert alert-success">Le navigateur associe true à 1 et false à vide qui correspond à 0</p>
    </div>
    <!-- ########################### -->
    <div class="border rounded my-3 col-sm-12 p-3">
      <h3 class="text-danger fw-bold">- Concaténation, affectation et affectations combinées avec l'opérateur ".=" pour les chaines de caractères</h3>
      <pre>
 $prenom = 'Nicolas';
 echo 'Je déclare ma variable $prenom qui a pour valeur :' . $prenom;</pre>
        <?php
        // Concaténation, affectation et affectations combinées avec l'opérateur ".=" pour les chaines de caractères
        $prenom = 'Nicolas';
        echo 'Je déclare ma variable $prenom qui a pour valeur : ' . $prenom;
        ?>
      <pre>
 $prenom .= ' Thomas';
 echo 'Je réaffiche ma variable $prenom qui a pour valeur : ' . $prenom;</pre>
        <?php
        $prenom .= ' Thomas'; // On ajoute la valeur ' Thomas' à la valeur 'Nicolas' SANS la remplacer grâce à l'opérateur ".="
        echo 'Je réaffiche ma variable $prenom qui a pour valeur : ' . $prenom . '<br>';
        // echo $prenom;
        ?>
        <pre>
 echo 'Bonjour ' . $prenom;
 echo "Bonjour $prenom";</pre>
        <?php
        echo '<p>Bonjour ' . $prenom . '</p>';
        echo "<p>Bonjour $prenom </p>"; /* affiche "Bonjour Nicolas Thomas". Ici j'utilise les doubles quotes, je n'ai pas besoin de concaténer avec le point (.).
        Dans les guillemets, la variable est évaluée : c'est son contenu qui est affiché.
        C'est ce qu'on appelle la substitution de variable.*/
        ?>
        <p class="alert alert-success">Ici j'utilise les doubles quotes, je n'ai pas besoin de concaténer avec le point (.). Dans les guillemets, la variable est évaluée : c'est son contenu qui est affiché. C'est ce qu'on appelle la substitution de variable.</p>
    </div>
    <!-- ########################### -->
    <div class="border rounded my-3 col-sm-12 p-3">
      <h3 class="text-danger fw-bold">- Echappement des apostrophes</h3>
      <p>On va déclarer une chaine de caractère qui contient des apostrophes. ex. : aujourd'hui</p>
      <p>Deux possibilités :</p>
      <pre>
 $message = 'aujourd\'hui';
 $message = "aujourd'hui";</pre>
      <?php
      // Déclarer une chaine de caractère qui contient des apostrophes. ex. : aujourd'hui
      // échappement des apostrophes
      $message = 'aujourd\'hui'; // Ici on échappe l'apostrophe quand on est dans les simples quotes avec "\"
      $message = "aujourd'hui";
      ?>
      <p class="alert alert-success">Pour la version avec les simples quotes, on échappe l'apostrophe avec "<em class="fw-bold">\</em>" (alt gr + 8)</p>
    </div>
    <div class="border rounded my-3 col-sm-12 p-3">
      <div class="border rounded col-sm-12 p-3">
        <?php
        ###########################
        // Exercice : Vous devez afficher Bleu-Blanc-Rouge en mettant le texte de chaque couleur dans des variables 
        echo "<h4>Exercice : Vous devez afficher Bleu-Blanc-Rouge en mettant le texte de chaque couleur dans des variables</h4><br>";

        $bleu = 'Bleu';
        $blanc = 'Blanc';
        $rouge = 'Rouge';
        echo 'J\'ai déclaré la variable "$bleu" qui a pour valeur : ' . $bleu . ', la variable "$blanc" qui a pour valeur : ' . $blanc .' et la variable "$rouge" qui a pour valeur : ' . $rouge . '<br><br>';
        echo "<p class='bg-dark text-center fw-bold col-2 mx-auto'><span class='text-primary'>-- $bleu -</span> <span class='text-white'>- $blanc -</span> <span class='text-danger'> -$rouge --</span></p><br>";
        ?>
      </div>
      <div class="border rounded col-sm-12 p-3">
        <?php
        echo "<h4>Exercice : Vous devez afficher Bleu-Blanc-Rouge en mettant le texte de chaque couleur dans des variables et les textes dans des conteneurs de couleurs</h4><br>";

        echo "<p class='bg-dark text-center fw-bold col-3 mx-auto p-4'><span class='bg-primary py-3'>-- $bleu -</span> <span class='bg-white py-3'>- $blanc -</span> <span class='bg-danger py-3'> -$rouge --</span></p>";

        // Correction
        echo "<h4>Correction</h4><br>";

        $bleu2 = "blue";
        $blanc2 = "white";
        $rouge2 = "red";

        echo "<div class='d-flex justify-content-center bg-dark p-5 m-auto m-5 rounded' style='width: 40%;'>
                <div class='bg-primary text-center fw-bold' style='width: 50px; height: 80px; line-height: 80px'>
                  $bleu2
                </div>
                <div class='bg-$blanc2 text-center fw-bold' style='width: 50px; height: 80px; line-height: 80px'>
                  $blanc2
                </div>
                <div class='bg-danger text-center fw-bold' style='width: 50px; height: 80px; line-height: 80px'>
                  $rouge2
                </div>
            </div>";

            ?>
      </div>
    </div>
    <!-- ########################### -->
    <div>
      <h2 class="text-center">Opérateurs numériques</h2> 
      <div class="border rounded my-3 col-sm-12 col-md-6 p-3">
        <h3 class="text-danger fw-bold">- Déclaration des variables</h3>
        <p>Nous déclarons la variable $a = 10 et $b = 2</p>
        <?php
        $a = 10;
        $b = 2;

        echo 'addition -> $a <em class="fw-bold">+</em> $b = ' . $a + $b . '<br>';  // on affiche le résultat de l'addition soit : 12
        echo 'soustraction -> $a <em class="fw-bold">-</em> $b = ' . $a - $b . '<br>';  // on affiche le résultat de la soustraction soit : 8
        echo 'multiplication -> $a <em class="fw-bold">*</em> $b = ' . $a * $b . '<br>';  // on affiche le résultat de la multiplication soit : 20
        echo 'division -> $a <em class="fw-bold">/</em> $b = ' . $a / $b . '<br>';  // on affiche le résultat de la division soit : 5
        echo 'modulo -> $a <em class="fw-bold">%</em> $b = ' . $a % $b . ' le modulo est le reste d\'une division. Là -> 10/2 = 5 sans reste donc le modulo est de 0<br>';  // on affiche le résultat du modulo soit : 0  -> modulo : reste d'une division



        echo "<h3 class='mt-5'>Opérateurs d'affectation combiné pour les valeurs numériques</h3>";
        echo 'Nous déclarons la variable $a = 10 <br>et $b = 2 <br><br>';

        echo '$a -= $b revient à écrire : a = a-b soit a = 10-2<br>';
        $a -= $b;
        echo '$a = ' . $a;

        echo '<br><br>';

        $a = 10;
        echo '$a += $b revient à écrire : a = a+b soit a = 10+2<br>';
        $a += $b;
        echo '$a = ' . $a;

        echo '<br>';

        // Il existe aussi les autres opérateurs *= , /= ou %=

        ?>
        <?php
        ###########################
        echo "<h3 class='mt-5'>Incrémentation et décrémentation</h3>";

        echo 'Nous déclarons la variable $i = 0 <br><br>';

        $i = 0;
        $i ++;
        echo '$i ++ revient à écrire i = i+1 <br>';
        echo '$i = ' . $i;
        echo '<br><br>';

        $i --;
        echo '$i -- revient à écrire i = i-1 <br>';
        echo '$i = ' . $i;
        echo '<br><br>';

        ?>
        </div>
      </div>
        <?php
        ###########################
        echo "<h3 class='mt-5'>Substitution de variables</h3>";

        /*
        * Si je veux afficher le contenu d'une variable et qu'elle soit collé à une chaine de caractère
          exemple : Aujourd'hui il fait 32°c !!

        * ici le 32 et °c sont collés.
          Pour le faire en utilisant le mécanisme de substitution des variables, il faut mettre la variable entre accolades
        */

        echo "<p>Si je veux afficher le contenu d'une variable et qu'elle soit collé à une chaine de caractère <br>
          exemple : Aujourd'hui il fait 32°c !!<br>
          ici le 32 et °c sont collés.<br>
          Pour le faire en utilisant le mécanisme de substitution des variables, il faut mettre la variable entre accolades
          </p> <br>";

        echo '<p>Je déclare la variable $degre = 32</p> <br>';
        echo '<p>il existe 2 méthodes :</p>';
        echo '<p> - $phrase = "Aujourd\'hui il fait " . $degre . "°C !!"</p>';
        echo '<p>Avec ce rendu :</p>';

        $degre = 32;
        $phrase = '<p> Aujourd\'hui il fait ' . $degre . '°C !! </p> <br>';
        echo $phrase;

        echo '<p> - $phrase2 = "Aujourd\'hui il fait {$degre}°C !!"</p>';
        echo '<p>Avec ce rendu :</p>';
        $phrase2 = "<p> Aujourd'hui il fait {$degre}°C !! </p>";
        echo $phrase2;

        ?>
        <?php
        ###########################

        echo "<h2 class='mt-5'>Transtypage des variables</h2>";

        $string1 = (int)'100';
        var_dump($string1); // Affiche 100 avec type Integer

        $string2 = (float)'12.5';
        var_dump($string2); // Affiche 12.5 avec type Float 

        $string2 = (int)'12.5';
        var_dump($string2); // Affiche 12 avec type Integer 

        echo '<br>';

        ?>
        <?php
        ###########################

        echo "<h2 class='mt-5'>Constante utilisateurs</h2>";

        # Avec la fonction prédéfinie define()
        echo '<h3> Pour déclarer une constante, il existe plusieurs façons :</h3><br>';
        echo '<h4>En utilisant la fonction prédéfinie define()</h4>';

        define('CHAINE', 'la valeur de la constante CHAINE');
        echo CHAINE . '<br>';

        define('ENTIER', 30);
        echo ENTIER . '<br>';

        echo "j'ai " . ENTIER . ' ans <br><br>';
        // echo gettype(ENTIER);


        echo '<h4>En utilisant le mot réservé const</h4>';

        const SEMAINE = 52;
        const HEBDOMADAIRE = 35;
        const MOIS = 12;

        // Calcul du nombre d'heure mensuel sous a constante HEURE

        const HEURE = (SEMAINE / MOIS) * HEBDOMADAIRE;

        echo '<p>Il y a ' . HEURE . ' heures travaillés par mois</p>';

        ?>
        <?php
        ###########################

        echo "<h2 class='mt-5'>Les variables prédéfinies : super-globale</h2>";

        /*
        echo $_SERVER["HTTP_HOST"];
        echo '<pre>';
        var_dump($_SERVER);
        echo '</pre>';

        echo '<br>';
        */

        function dump($tableau) {
          echo '<pre>';
          var_dump($tableau);
          echo '</pre>';
        }

        echo '<br>';

        dump($_SERVER);

        ###########################





        ?>
        <?php
        ###########################

        echo '<br><br><br>';
        $age = 25;

        if ($age >= 18) {
          echo 'Vous êtes majeur';
        }
        else {
          echo 'Vous êtes mineur';
        }

      ?>
      <br><br>
      <P><a href="https://www.php.net/manual/fr/language.operators.execution.php">Lien pour les opérateurs d'éxecutions</a></P>
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