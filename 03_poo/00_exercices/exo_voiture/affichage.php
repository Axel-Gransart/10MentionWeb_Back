<?php

require_once "../../inc/function.inc.php";
require_once "Voiture.php";
require_once "Pompe.php";
$title = "Pratique -> Exercice voiture";
require_once "../../inc/header.inc.php";

?>

<p class="lead">Pratique -> Exercice voiture</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
              

<?php

    $voiture = new Voiture(50, 5);
    $pompe = new Pompe(800, 800);

    // Départ

    echo "<p> La taille du reservoir de la voiture est de : {$voiture->getTailleReservoirVoiture()} litres et il y a {$voiture->getNbLitreEssenceVoiture()} litres d'essence dans le reservoir</p>";

    // La pompe 

    echo "<p>La pompe contient {$pompe->getNbLitreEssencePompe()} litres et sa contenance est de {$pompe->getTailleReservoirPompe()} litres</p>";

    // Passage à la pompe

    echo $pompe->delivrerEssence($voiture);

    // après le plein

    echo "<p>Le reservoir de la voiture contient maintenant {$voiture->getNbLitreEssenceVoiture()} litres et il reste {$pompe->getNbLitreEssencePompe()} litres dans le reservoir de la pompe</p>";


    require_once "../../inc/footer.inc.php";
?>