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
    <title>Exercice page index</title>
  </head>

  <body>
    <header class="bg-dark d-flex align-items-center">
      <h1 class="col-6 text-white"> Exercice formulaire</h1>
      <nav class="col-6 nav justify-content-end">
        <a class="nav-link active" aria-current="page" href="index.php">index</a>
        <a class="nav-link" href="inscription.php">Inscription</a>
        <a class="nav-link" href="connexion.php">Connexion</a>
      </nav>
    </header>
    <main>
      <h2 class="text-center">Veuillez vous diriger sur la page inscription afin de procéder à votre inscription sur le site</h2>

      <div class="d-flex flex-wrap justify-content-around">
        <?php
          $tab = [
            "Camaro" => "camaro-2140609_1280.jpg",
            "Ford GT 40" => "ford-gt-40-2683777_1280.jpg",
            "Ford Mustang fastback" => "mustang-7599802_1280.jpg",
            "Ford GT Gulf" => "auto-1615438_1280.jpg",
            "Delorean DMC 12" => "hinged-door-5144395_1280.jpg",
            "Harley Davidson softail" => "motorbike-861966_1280.jpg"
          ];

          foreach ($tab as $key => $value) {
            echo "<div class='card col-3 mx-1 my-3'>
                    <img src='assets/img/$value' class='card-img-top' alt='...'>
                    <div class='card-body'>
                      <h5 class='card-title'>$key</h5>                      
                      <a href='#' class='btn btn-primary'>Go somewhere</a>
                    </div>
                  </div>";
          }

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
