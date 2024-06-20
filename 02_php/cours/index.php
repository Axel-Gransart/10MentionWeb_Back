<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/logo.png" type="favicon">
    <title>Cours PHP - Introduction</title>
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
        <h1 class="display-5 fw-bold">Introduction au PHP</h1>
        <p class="col-md-12 fs-4">PHP, ce sigle est un acronyme récursif <span>Préprocesseur Hypertexte PHP</span>(PHP Hypertext Preprocessor).Il s'agit d'un langage de script côté serveur open source utilisé pour le développement web dynamique et peut être intégré dans des codes HTML, notez bien qu'un navigateur ne comprend pas le PHP </p>
    </section>
  </header>
  <main class="container-fluid px-5">
    <section class="row mt-5">
        <h2 class="text-center ">1 - Pourquoi apprendre php </h2>
        <div class="col-12 col-md-8 mt-3">
            <ul> 
              <li>C'est un langage open-source. Cela signifie que PHP est librement disponible pour être utilisé et implémenté.</li>
              <li>Il est indépendant de la plate-forme, ce qui signifie que les applications développées à l'aide de PHP peuvent s'exécuter dans n'importe quel environnement.</li>
              <li>Il a une grande communauté de développeurs. La programmation consiste à aider et à être aidé; par conséquent, une grande communauté signifierait plus d'aide.</li>
              <li>Il est régulièrement mis à jour et fonctionne donc bien avec les dernières technologies.</li>
              <li>Grâce au PHP, nous pouvons créer tout type de site : moteur de recherche de type Google, réseaux sociaux comme Facebook, plateforme multimédia comme YouTube ou encore site d'information comme Wikipedia, nous pouvons aussi développer des site d'e-commerce, des espaces membres, des pages d'administration, etc.</li>
              <li>Il est hautement compatible car il peut être intégré à plusieurs langages de programmation tels que HTML, Javascript et prend en charge différentes bases de données telles que MySQL, PostgreSQL, Oracle, etc.</li>
              <li>Le PHP nous sert en fait à créer un site web dynamique. Un site web dynamique va être un site dont les informations proviennent d'une BDD et pour cela on va apprendre à faire fonctionner le PHP et le SQL main dans la main.</li>
            </ul>
        </div>
        <div class="col-12 col-md-4 d-flex justify-content-center">
          <img src="assets/img/PHP.png" alt="" width="250" >
        </div>
        <div class="col-10 m-auto">
          <p class="alert alert-danger">
                    Attention, il ne faut pas confondre un site web dynamique avec un site web d'animation gérées par des écouteurs d'événements comme peut le faire le JS.
          </p>
          <div class="alert alert-secondary">
            <p>Nous utiliserons à partir de maintenant l'appellation de <em>site dynamique</em> pour les sites dont les informations sont stockées en BDD et qui possèdent deux interfaces distinctes : </p>
            <ol>
                <li>Une interface "front" sur laquelle on retrouvera l'affichage "normal" du site, le côté pour les admins et les clients.</li>
                <li>Une interface "back" qui permettra d'assurer la gestion de la BDD et certains réglages de l'interface front => on l'appellera le back office ou la page d'administration.</li>
            </ol>
            </div>

        </div>
    </section>
    <section class="row mt-5">
      <h2 class="text-center">2 - Comment fonctionne PHP </h2>
      <div class="col-12 mt-5">
        <ul>
            <li>PHP étant un langage côté serveur, l'ensemble du flux de travail se trouve sur le serveur lui-même. Un interpréteur PHP est également installé sur le serveur pour vérifier les fichiers PHP. Du côté client, la seule exigence est un navigateur Web et une connexion Internet.</li>
        </ul>
        <p class="alert alert-danger">
          Vous ne verrez jamais de code PHP dans le code source d'une page car ce dernier est un langage interprété par le navigateur et il ne renvoit donc que du code HTML à l'utilisateur. C'est la raison pour laquelle les fichiers ne sont plus lancés comme avant à partir de l'explorateur de fichiers.
        </p>
      </div>  
      <div class="col-8 m-auto border px-5">
        <div class="row align-items-center mt-5 "> 
            <p class="col-6"><span>Étape 1 -</span> Le client demande la page Web sur le navigateur.</p>
            <img src="assets/img/etape_1.png" alt="etape 1 du fonctionnement de php" class="col-6">
        </div>
        <div class="row align-items-center mt-5 "> 
            <p class="col-6"><span>Étape 2 -</span>  Le serveur (où le logiciel PHP est installé) recherche alors le fichier .php associé à la requête. </p>
            <img src="assets/img/etape_2.png" alt="etape 2 du fonctionnement de php" class="col-6">
        </div>
        <div class="row align-items-center mt-5 "> 
            <p class="col-6"><span>Étape 3 -</span>  S'il est trouvé, il envoie le fichier à l'interpréteur PHP (puisque PHP est un langage interprété), qui vérifie les données demandées dans la base de données</p>
            <img src="assets/img/etape_3.png" alt="etape 3 du fonctionnement de php" class="col-6">
        </div>
        <div class="row align-items-center mt-5 "> 
            <p class="col-6"><span>Étape 4 -</span>  l'interpréteur renvoie ensuite la sortie de données demandée sous forme de page Web HTML (car un navigateur ne comprend pas les fichiers .php).</p>
            <img src="assets/img/etape_4.png" alt="etape 4 du fonctionnement de php" class="col-6">
        </div>
        <div class="row align-items-center mt-5 "> 
            <p class="col-6"><span>Étape 5 -</span>  Le serveur Web reçoit le fichier HTML de l'interpréteur.</p>
            <img src="assets/img/etape_5.png" alt="etape 5 du fonctionnement de php" class="col-6">
        </div>
        <div class="row align-items-center mt-5 "> 
            <p class="col-6"><span>Étape 6 -</span>  Et il renvoie la page Web au navigateur. </p> 
            <img src="assets/img/etape_6.png" alt="etape 6 du fonctionnement de php" class="col-6">
        </div>
          
      </div>
      <div class="col-12 mt-5">  
        <div class="alert alert-secondary">
          <p> Pour lancer les sites réalisé avec du langage php, on aura 2 manières pour le faire :</p>
          <ul>
            <li>À partir du terminal : après avoir installer PHP sur la machine on peut laces les applications avec la ligne de commande <span>php -S localhost:numéroduport (ex: 8000)</span></li>
            <li>Depuis le navigateur : le dossier de la page ou l'application doit être placé dans le dossier xampp > htdocs (puisque qu'on utilise le logiciel xampp afin d'avoir un serveur en local) en suite via l'url il faut chercher la page : <span>localhost/nomdudossier</span> </li>
            
          </ul>
          <p>Pour avoir live server avec du PHP : Avec l'extension <span>live server extension</span> de chrome : j'ouvre ma page en passant par l'url et le chemin via localhost/nomdudossier, je copie ce chemin et je le colle  dans l'input Actual Server Address, je lance ma page avec le Go live de VS Code, je récupére le chemin de l'url et je le copie dans l'input Live Server Address de l'extension, enfin, je rafraichie l'extension ainsi que la page.</p>
        </div>
      </div>
    </section>
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