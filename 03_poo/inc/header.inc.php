<!doctype html>
<html lang="fr">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title><?= $title ?></title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-light bg-light  border-bottom border-dark">
            <div class="container-fluid">
                <a class="navbar-brand fw-bolder" href="https://www.php.net/manual/fr/language.oop5.php" target="_blank">POO</a>
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-success fw-bolder" href="<?=RACINE_SITE?>/01_cours/00_introduction.php">Introduction</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-success fw-bolder" href="<?=RACINE_SITE?>/01_cours/01_objet.php">L'objet en POO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-success fw-bolder" href="<?=RACINE_SITE?>/01_cours/02_visibilite.php">La visibilité en POO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-success fw-bolder" href="<?=RACINE_SITE?>/01_cours/03_statique.php">Visibilité statique</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-success fw-bolder" href="<?=RACINE_SITE?>/01_cours/04_heritage.php">L'héritage en POO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-success fw-bolder" href="<?=RACINE_SITE?>/01_cours/05_autoload.php">L'autoload en POO</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle  text-success fw-bolder" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Pratique
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?=RACINE_SITE?>/02_pratique/Panier_01.php">Panier</a></li>
                                <li><a class="dropdown-item" href="<?=RACINE_SITE?>/02_pratique/Visibilite_02.php">Visibilité</a></li>
                                <li><a class="dropdown-item" href="<?=RACINE_SITE?>/02_pratique/Humain_03.php">Humain</a></li>
                                <li><a class="dropdown-item" href="<?=RACINE_SITE?>/02_pratique/JeuVideo_04.php">Jeu video</a></li>
                                <li><a class="dropdown-item" href="<?=RACINE_SITE?>/02_pratique/Maison_05.php">Maison</a></li>
                                <li><a class="dropdown-item" href="<?=RACINE_SITE?>/02_pratique/Animal_06.php">Animal</a></li>
                                <li><a class="dropdown-item" href="<?=RACINE_SITE?>/02_pratique/Personne_07.php">Personne</a></li>
                                <li><a class="dropdown-item" href="<?=RACINE_SITE?>/02_pratique/Static_VS_const.php">Static VS const</a></li>
                                <li><a class="dropdown-item" href="<?=RACINE_SITE?>/00_exercices/01_exercices.php">Exercices</a></li>
                                <li><a class="dropdown-item" href="<?=RACINE_SITE?>/00_exercices/Media_V1.php">Média V1</a></li>
                                <li><a class="dropdown-item" href="<?=RACINE_SITE?>/00_exercices/exo_voiture/affichage.php">Exercice voiture</a></li>
                            </ul>
                            
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>
    <div class="p-5 bg-light ">
        <div class="container">
            <h1 class="display-3">POO : Programmation Orientée Objet</h1>