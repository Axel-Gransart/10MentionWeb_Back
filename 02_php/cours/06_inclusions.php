<?php
include "inc/header.inc.php";
?>
<header class="p-5 m-4 bg-light rounded-3 border ">
  <section class="container-fluid py-5">
    <?php
      echo "<h1>Les importations de fichiers avec require() et include()</h1>"; // une istruction d'affichage en PHP
      echo " <p class=\"col-md-8 fs-4\">La grande majorité des sites web dynamiques ou des applications ont besoin de réutiliser des parties de code identique à plusieurs endroits d'une même page, ou bien dans plusieurs pages différentes. C'est le cas par exemple des librairies de fonctions utilisateurs ou bien des fichiers de configuration. Plutôt que de réécrire à chaque fois le code, il existe des fonctions (structures de langage en réalité) capables d'importer et exécuter le code à réutiliser dans la page. Il s'agit des fonctions <span>include()</span> et <span>require()</span>.</p>";
      echo "<p>Lorsque l'on crée un fichier que l'on veut inclure, la convention dit que l'on ajoute .inc avant .php est ces fichier on les crée dans un dossier nommé inc. Il n'y a pas d'influence sur la lecture du fichier, c'est une convention et une organisation.</p>";
      ?>
  </section>
</header><!-- fin header -->
<main class="container-fluid px-5">
  <div class="row">
    <div class="col-sm-12">
      <h2>Comment utiliser include() et require()</h2>
      <p>Ces deux fonctions prennent un seul paramètre de type chaîne de caractères. C'est le chemin qui mène au fichier
        à importer. Le chemin est par défaut relatif par rapport au répertoire dans lequel se trouve le script.</p>
      <p>Lorsqu'un fichier est importé, le code se trouvant à l'intérieur est exécuté. Les variables, constantes,
        objets, tableaux... du fichier importé peuvent donc être réutilisés dans la suite du programme.</p>
      <ul>Exemple d'utilisation:
        <li>le footer qui revient identique sur toutes les pages de notre site</li>
        <li>dans certains cas, un header qui reviendrait sur plusieurs pages</li>
        <li>notre connexion à la BDD : <code>init.inc.php</code></li>
        <li>notre fichier de fonctions que nous avons créer nous même : <code>functions.inc.php</code>. Dans un fichier
          de fonctions on retrouvera par exemple des fonctions de debuggage, des fonctions de vérification de statut
          del'utilisateur et de connexion de l'utilisateur.</li>

      </ul>
    </div>
    <div class="col-sm-12 mt-5">
      <h2 class="text-center border-top pt-5 my-5">La propriété include</h2>
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h3 class="text-center text-primary">include()</h3>
          <?php
                  /**
                   * On vas créer un dossier inc à la racine de notre dossier php
                   * Dans ce dossier inc on vas créer un fichier test1.inc.php
                   * On crée une balise p avec une phrase : Ceci est le premier fichier d'inclusion
                   */
                  include "inc/test1.inc.php" ;
                  include ("inc/test1.inc.php") ;          
                  ?>
          <p>Ici nous avons inclus notre fichier test1.inc.php grâce à la fonction <code>include</code>. Cette fonction
            prendra comme seul argument le chemin de notre fichier. Nous remarquons ici deux syntaxes possibles pour
            chacune d'elles. Les parenthèses sont facultatives </p>
        </div>
        <div class="col-sm-12 col-md-6">
          <h3 class="text-center text-primary">include_once()</h3>
          <?php
                  /**
                   * Dans ce dossier inc on vas créer un fichier test2.inc.php
                   * On crée une balise p avec une phrase : Ceci est le deuxième fichier d'inclusion
                   */
                  include_once "inc/test2.inc.php" ;
                  include_once "inc/test2.inc.php" ;             
                  ?>
          <p>Ici nous avons inclus notre fichier test2.inc.php grâce à la fonction <code>include_once()</code>. Cette
            fonction prendra comme seul argument le chemin de notre fichier. Cette fonction permet d'importer une fois
            seulement un fichier même s'il y'a plusieurs tentatives d'importation du fichier dans la page</p>
        </div>
      </div>
    </div>
    <div class="col-sm-12 mt-5">
      <h2 class="text-center border-top pt-5">La propriété require</h2>
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h3 class="text-center text-primary">require()</h3>
          <?php
                  /**
                   * On vas créer un dossier inc à la racine de notre dossier php
                   * Dans ce dossier inc on vas créer un fichier test3.inc.php
                   * On crée une balise p avec une phrase : Ceci est le premier fichier d'inclusion
                   */
                  require "inc/test3.inc.php" ;
                  require ("inc/test3.inc.php" );             
                  ?>
          <p>Ici nous avons inclus notre fichier test3.inc.php grâce à la fonction <code>require</code>. Cette fonction
            prendra comme seul argument le chemin de notre fichier.Nous remarquons aussi deux syntaxes possibles pour
            chacune d'elles. Les parenthèses sont facultatives </p>
        </div>
        <div class="col-sm-12 col-md-6">
          <h3 class="text-center text-primary">require_once()</h3>
          <?php
                  /**
                   * Dans ce dossier inc on vas créer un fichier test4.inc.php
                   * On crée une balise p avec une phrase : Ceci est le deuxième fichier d'inclusion
                   */
                  require_once "inc/test4.inc.php" ;
                  require_once ("inc/test4.inc.php" );             
                  ?>
          <p>Ici nous avons inclus notre fichier test4.inc.php grâce à la fonction <code>irequire_once()</code>. Cette
            fonction prendra comme seul argument le chemin de notre fichier. Cette fonction permet d'importer une fois
            seulement un fichier même s'il y'a plusieurs tentatives d'importation du fichier dans la page</p>
        </div>
      </div>
    </div>
    <div class="col-sm-12 mb-5">

      <p class="alert alert-warning text-center">l'utilisation des fonctions include_once et require_once est dépréciée
        pour des raisons d'optimisation. Elles sont en effet plus lentes que leur petite soeur respective car elles
        doivent vérifier en plus que le fichier n'a été importé qu'une fois.</p>

    </div>
    <div class="col-sm-12 ">
      <h2 class="text-center border-top pt-5">La différence entre include() et require()</h2>
      <p>La fonction include() renverra une erreur de type WARNING si elle n'arrive pas à ouvrir le fichier en question.
        De ce fait l'exécution du code qui suit dans la page sera exécuté. En revanche, la fonction require() affichera
        une erreur de type FATAL qui interrompt l'exécution du script.</p>

    </div>
    <div class="col-sm-12 mb-5">

      <p class="alert alert-secondary text-center">Afin de mettre en pratique l'utilisation de ces deux fonctions, nous
        allons créer deux fichiers : <span>header.inc.php</span> et <span>footer.inc.php</span>. Nous stockerons
        respectivement la partie haute et basse de notre site de cours PHP. À partir du prochain chapitre, nous
        utiliserons les fonctions d'inclusion afin de les rajouter à nos pages.</p>

    </div>
  </div>
</main>
<?php
  include("inc/footer.inc.php");
  ?>