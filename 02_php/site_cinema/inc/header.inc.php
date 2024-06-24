<!DOCTYPE html>
<html lang="fr">
<head>
  <!-- required meta Tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Premier site en PHP : site cinema">
  <meta name="author" content="Axel Gransart">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Google Fonts Dosis & Lora -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
  <!-- Personal style sheet -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <title></title>
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Movies</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav w-100 d-flex justify-content-end align-items-center">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#">Accueil</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Catégories
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Science Fiction</a></li>
                <li><a class="dropdown-item" href="#">Aventure</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Inscription</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Connexion</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Back Office</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Déconnexion</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="bi bi-cart fs-2"></i></a>
            </li>                     
          </ul>
        </div>
      </div>
    </nav>
  </header>
