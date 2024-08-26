<?php

require_once "../inc/function.inc.php";
$title = "Pratique -> Personne";
require_once "../inc/header.inc.php";
?>

<p class="lead">Pratique -> Personne</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">


<?php

  class Personne {

    /**
     * Le nom de la personne (propriété protégée)
     *
     * @var string
     */
    protected string $nom;

    /**
     * Constructeur de la classe Personne
     *
     * @param string $n
     */
    public function __construct($n){
      
      $this->nom = $n;
    }

    /**
      * Méthode protégée pour obtenir une description générique de la personne
      *
      * @return string
    */
    protected function afficheNom() :string {

      return "Cette personne s'appelle {$this->nom}";
    }
  }

  class Etudiant extends Personne {

    /**
      * L'âge de l'étudiant
      *
      * @var integer
    */
    private int $age;

    public function __construct($nom, $age){
      
      parent::__construct($nom); // Appel du constructeur de la classe de base parente (Personne) depuis la classe enfant
      $this->age = $age;
    }

    /**
      * Affiche les informations de l'étudiant, y compris le nom et l'âge
      *
      * @return string
    */
    public function afficheEtudiant() :string {
      return "<p>{$this->afficheNom()}, il a {$this->age} ans</p>";
    }

  }

  $personne1 = new Personne("Valentin");

  $etudiant1 = new Etudiant("Axel", 34);

  // echo $personne1->afficheNom();
  
  echo $etudiant1->afficheEtudiant();

?>