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
      <a class="navbar-brand" href="index.php"><img src="assets/img/logo.png" alt="logo php"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
  <header class="p-5 m-4 bg-light rounded-3 border">
    <section class="container py-5">
        <?php
        
        echo "<h1 class=\"display-5 fw-bold\">Les variables et les constantes en PHP</h1>";
        
        ?>
    </section>
  </header>
  <main class="container-fluid px-5">
      <?php

        echo "<h2>Les variables utilisateurs / affectation / concaténation</h2><br>";

        echo "<h3>Variable number</h3>";
        $number = 127; // On déclare une variable $number et on lui affecte la valeur 127
        echo 'Ma variable $number vaut : '. $number . '<br>'; //je concaténe avec le point(.)

        //Je peux voir le type d'une variable avec la fonction prédéfinie gettype()
        echo 'Le type de ma variable $number est : ' . gettype($number) . '<br><br>';// ici c'est integer

        ###########################

        echo "<h3>Variable double</h3>";
        $double = 1.5;
        echo 'Ma variable $double vaut : '. $double . '<br>';
        echo 'Le type de ma variable $double est : ' . gettype($double) . '<br><br>';// ici il s'agit d'un double (nombre à virgule)
        
        ###########################
        echo "<h3>Variable string</h3>";
        $chaine = "'Une chaine de caractère entre simple quotes'";
        echo 'Ma variable $chaine vaut : ' . $chaine . '<br>';
        echo 'Le type de ma variable $chaine est : ' . gettype($chaine) . '<br><br>'; // ici il s'agit d'une string

        ###########################

        $chaine1 = '"Une chaine de caractère entre double quotes"';
        echo 'Ma variable $chaine1 vaut : ' . $chaine1 . '<br>';
        echo 'Le type de ma variable $chaine1 est : ' . gettype($chaine1) . '<br><br>'; // ici il s'agit d'une string

        ###########################

        $chaine2 = "'127'";
        echo 'Ma variable $chaine2 vaut : ' . $chaine2 . '<br>';
        echo 'Le type de ma variable $chaine2 est : ' . gettype($chaine2) . '<br><br>'; // ici il s'agit d'une string (c'est un nombre mais placé entre simple ou double quotes)

        ###########################

        $chaine3 = `Une chaine de caractère entre backquotes`;
        echo 'Ma variable $chaine3 vaut : ' . $chaine3 . '<br>';
        echo 'Le type de ma variable $chaine3 est : ' . gettype($chaine3) . '<br><br>';

        ###########################

        $boolean = true; // ou false -> Le navigateur associe true à 1 et false à vide qui correspond à 0
        echo 'Ma variable $boolean valeur true vaut : ' . $boolean . '<br>';
        $boolean1 = false;
        echo 'Ma variable $boolean valeur false vaut : ' . $boolean1 . '<br>';
        echo 'Le type de ma variable $boolean est : ' . gettype($boolean) . '<br><br>'; // ici il s'agit d'un boolean (booléen) : permet de savoir si quelque chose est vrai ou faux

        ###########################

        // Concaténation, affectation et affectations combinées avec l'opérateur ".=" pour les chaines de caractères
        echo "<h2>Concaténation, affectation et affectations combinées avec l'opérateur '. =' pour les chaines de caractères</h2>";


        $prenom = 'Nicolas';
        $prenom .= ' Thomas'; // On ajoute la valeur ' Thomas' à la valeur 'Nicolas' SANS la remplacer grâce à l'opérateur ".="
        echo 'Je déclare ma variable $prenom avec vaut : ' . $boolean1 . '<br>';
        echo $prenom;

        echo '<p>Bonjour ' . $prenom . '</p>';
        echo "<p>Bonjour $prenom </p><br>"; /* affiche "Bonjour Nicolas Thomas". Ici j'utilise les doubles quotes, je n'ai pas besoin de concaténer avec le point (.).
        Dans les guillemets, la variable est évaluée : c'est son contenu qui est affiché.
        C'est ce qu'on appelle la substitution de variable.*/

        ###########################
        // Déclarer une chaine de caractère qui contient des apostrophes. ex. : aujourd'hui
        // échappement des apostrophes

        $message = 'aujourd\'hui'; // Ici on échappe l'apostrophe quand on est dans les simples quotes avec "\"
        $message = "aujourd'hui";

        ###########################
        // Exercice : Vous devez afficher Bleu-Blanc-Rouge en mettant le texte de chaque couleur dans des variables 
        echo "<h4>Exercice : Vous devez afficher Bleu-Blanc-Rouge en mettant le texte de chaque couleur dans des variables</h4><br>";

        $bleu = 'Bleu';
        $blanc = 'Blanc';
        $rouge = 'Rouge';
        echo 'J\'ai déclaré la variable "$bleu" qui a pour valeur : ' . $bleu . ', la variable "$blanc" qui a pour valeur : ' . $blanc .' et la variable "$rouge" qui a pour valeur : ' . $rouge . '<br><br>';

        echo "<p class='bg-dark text-center fw-bold col-2 mx-auto'><span class='text-primary'>-- $bleu -</span> <span class='text-white'>- $blanc -</span> <span class='text-danger'> -$rouge --</span></p><br>";

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


        ###########################
        echo '<h2 class="mt-5">Opérateurs numériques</h2>';

        $a = 10;
        $b = 2;
        echo 'Nous déclarons la variable $a = 10 <br>et $b = 2 <br><br>';

        echo 'addition -> $a + $b = ' . $a + $b . '<br>';  // on affiche le résultat de l'addition soit : 12
        echo 'soustraction -> $a - $b = ' . $a - $b . '<br>';  // on affiche le résultat de la soustraction soit : 8
        echo 'multiplication -> $a * $b = ' . $a * $b . '<br>';  // on affiche le résultat de la multiplication soit : 20
        echo 'division -> $a / $b = ' . $a / $b . '<br>';  // on affiche le résultat de la division soit : 5
        echo 'modulo -> $a % $b = ' . $a % $b . ' le modulo est le reste d\'une division. Là -> 10/2 = 5 sans reste donc le modulo est de 0<br>';  // on affiche le résultat du modulo soit : 0  -> modulo : reste d'une division



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

        ###########################

        echo "<h2 class='mt-5'>Transtypage des variables</h2>";

        $string1 = (int)'100';
        var_dump($string1); // Affiche 100 avec type Integer

        $string2 = (float)'12.5';
        var_dump($string2); // Affiche 12.5 avec type Float 

        $string2 = (int)'12.5';
        var_dump($string2); // Affiche 12 avec type Integer 

        echo '<br>';

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