<?php

require_once "../inc/function.inc.php";
$title = "Pratique -> Humain";
require_once "../inc/header.inc.php";
?>

<p class="lead">Pratique -> Humain</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
              <h2>GETTER et SETTER</h2>
              <p>Une classe représentant un humain avec des propriétés privées pour le prénom et le nom</p>
              <p> Les propriétés privées sont accédées et modifiées via des méthodes publiques appelées getter et setter</p>


<?php

// GETTER et SETTER 

// Une classe représentant un humain avec des propriétés privées pour le prénom et le nom
// Les propriétés privées sont accédées et modifiées via des méthodes publiques appelées getter et setter

class Humain {

/**
 * Le prénom de l'humain
 *
 * @var string
 */
  private string $prenom;


  /**
   * Le nom de l'humain
   *
   * @var string
   */
  private string $nom;
  
  /*
    Les propriétés étant 'private', il est nécessaire de passer par des méthodes 'publiques' pour pouvoir lire et écrire ces propriétés.
    On parle de Getter (lire / récupérer) et de Setter (écrire / définir): ce sont des méthodes qui vont faire la médiation (l'intermédiaire) entre l'extérieur de la classe et ses attributs.
  */

  /**
   * Définit le prénom de l'humain
   *
   * @param string $p
   * @return void
   */
  public function setPrenom(string $p) :void { // Par convention, on appelle la fonction avec le mot-clé 'set'

    if (is_string($p)) { // Si c'est une chaîne de caractère, je rentre dans la condition

      // le mot-clé $this est une "pseudo-variable", elle va être remplacée par l'objet couramment utilisé. 
      // $this est créé automatiquement et représente l'instance courante

      $this->prenom = $p; // On assigne la valeur de $p à la propriété $prenom
    }
  }

  /**
   * Récupère le prénom de l'humain
   *
   * @return string
   */
  public function getPrenom() :string { // Par convention, on appelle la fonction avec le mot-clé 'get'

    return $this->prenom;
  }


  /**
    * Définit le nom de l'humain
    *
    * @param string $n
    * @return void
  */
  public function setNom(string $n) :void { // Par convention, on appelle la fonction avec le mot-clé 'set'

    if (is_string($n)) { // Si c'est une chaîne de caractère, je rentre dans la condition

      // le mot-clé $this est une "pseudo-variable", elle va être remplacée par l'objet couramment utilisé. 
      // $this est créé automatiquement et représente l'instance courante

      $this->nom = $n; // On assigne la valeur de $n à la propriété $nom
    }
  }

  /**
   * Récupère le nom de l'humain
   *
   * @return string
   */
  public function getNom() :string { // Par convention, on appelle la fonction avec le mot-clé 'get'

    return $this->nom;
  }
}

$personne_1 = new Humain();

// $personne_1->prenom = "Axel";
// echo $personne_1->prenom; // Affiche Uncaught Error: Cannot access private property Humain::$prenom 
// -> On ne peut pas acceder à une propriété private.

// Utilisation de la méthode setPrenom() pour définir le prénom de l'humain
$personne_1->setPrenom("Axel") ;

// Utilisation de la méthode getPrenom() pour récupérer et afficher le prénom de l'humain
echo "<p>". $personne_1->getPrenom(). "</p>";

$personne_1->setNom("Gransart");
echo "<p>". $personne_1->getNom(). "</p>";

echo "<p> Je m'appelle ". $personne_1->getPrenom() . " " . $personne_1->getNom() . "</p>";



$personne_2 = new Humain();

$personne_2->setPrenom("Nicolas") ;

echo "<p>". $personne_2->getPrenom(). "</p>";

$personne_2->setNom("Houy");
echo "<p>". $personne_2->getNom(). "</p>";

echo "<p> Je m'appelle ". $personne_2->getPrenom() . " " . $personne_2->getNom() . "</p>";




require_once "../inc/footer.inc.php"
?>