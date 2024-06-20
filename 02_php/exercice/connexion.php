<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />    
    <!-- Bootstrap CSS v5.2.1 -->
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Exercice page connexion</title>
  </head>
  <body>
    <header class="bg-dark d-flex align-items-center">
      <h1 class="col-6 text-white"> Exercice formulaire</h1>
      <nav class="col-6 nav justify-content-end">
        <a class="nav-link" aria-current="page" href="index.php">index</a>
        <a class="nav-link" href="inscription.php">Inscription</a>
        <a class="nav-link active" href="connexion.php">Connexion</a>
      </nav>
    </header>
    <main class="bg-dark-subtle py-5"> 
    <form class="row col-4 mx-auto bg-primary-subtle" action="#" method="GET">
      <h3 class="text-center text-primary">Connexion au site</h3>
    <div class="mb-3">
          <input type="email" class="form-control" name="emailConnexion" id="emailConnexion" placeholder="adresse mail" required>
        </div>
        <div class="mb-3">
          <input type="password" class="form-control" name="password" id="password" placeholder="mot de passe" required>
        </div>  
        <button type="submit" class="btn btn-primary col-2 mx-auto">Submit</button>
      </form>
      <div class="bg-warning-subtle p-4 mt-5 col-4 mx-auto">
        <?php
          echo '<pre>';
          var_dump($_GET);
          echo '</pre>';
        ?>
      </div>
    </main>
    <footer class="bg-dark">
      <nav class="col-12 nav justify-content-around">
        <a class="nav-link" href="inscription.php">Inscription</a>
        <a class="nav-link" href="connexion.php">Connexion</a>
      </nav>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
