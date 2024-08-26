<?php

require_once "../inc/function.inc.php";
$title = "Pratique -> Animal";
require_once "../inc/header.inc.php";
?>

<p class="lead">Pratique -> Animal</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">


<?php

  /**
    * La visibilité protected est un niveau d'accès intermédiaire qui permet à une propriété ou une méthode d'être accessible uniquement :

    *À l'intérieur de la classe où elle est définie.
    *Dans les classes filles (sous-classes) qui héritent de cette classe.
  */
  /**
    * Classe Animal
    *
    * Représente un animal générique avec un nom.
  */

  class Animal {

    /**
     * Le nom de l'animal (propriété protégée)
     *
     * @var string
     */
    protected string $nom;

    /**
     * Constructeur de la classe Animal
     *
     * @param string $n
     */
    public function __construct($n){
      
      $this->nom = $n;
    }

    /**
     * Méthode protégée pour obtenir une description générique de l'animal
     *
     * @return string
     */
    protected function description() :string {

      return "<p>Ceci est un animal nommé {$this->nom}</p>";
    }

    /**
     * Méthode pour récupérer le nom de l'animal
     *
     * @return string
     */
    public function getNom() :string {

      return $this->nom . "<br>";
    }
  }


  // Classe Dog qui hérite de la classe Animal
  class Dog extends Animal { // Elle étend la classe Animal et hérite de ses propriétés et méthodes protégées
    
    /**
     * Méthode publique pour abtenir le son spécifique d'un chien
     *
     * @return string
     */
    public function affichage() :string {

      // Accès à la propriété protégée $nom et à la méthode protégée description de la classe parent
      return $this->nom . " fait Wouf! " . $this->description();
    }
  }

  $chien = new Dog("Dajba"); // Instanciation de la classe

  echo $chien->getNom(); // Affiche le nom

  echo $chien->affichage();
?>