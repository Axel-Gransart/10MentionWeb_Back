<?php

require_once "../inc/function.inc.php";
$title = "Pratique -> Visibilité";
require_once "../inc/header.inc.php";
?>

<p class="lead">Pratique -> Visibilité</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">



<?php

class Vehicule {
  /**
   * Marque du véhicule
   *
   * @var string
   */
  public string $brand;

  /**
   * Couleur du véhicule
   *
   * @var string
   */
  private string $color; // propriété privée
};

$vehicule_1 = new Vehicule();
$vehicule_1->brand = "BMW";

echo $vehicule_1->brand;

// $vehicule_1->color = "Rouge";
// echo $vehicule_1->color; // Affiche Uncaught Error: Cannot access private property Vehicule::$color 
// -> On ne peut pas acceder à une propriété private.


require_once "../inc/footer.inc.php"
?>