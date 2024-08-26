<?php
require_once "../inc/function.inc.php";
$title = "Pratique -> Exercices";
require_once "../inc/header.inc.php";

?>

<p class="lead">Pratique -> Exercices</p>
</div>
</div>
<div class="container">
  <div class="row">
    <div class="col-12 border rounded mt-3 p-3">
      <h4 class="text-center">Exercice Classe étendue</h4>
      <p>Vous allez créer une classe de base "Media" qui représente un média général dans la bibliothèque (par exemple,
        un livre, un CD, un DVD). Ensuite, vous allez créer des classes dérivées pour des types spécifiques de médias :
        Livre et DVD. <br><br>


        La classe Media doit avoir les propriétés protected suivantes :<br>
        $titre : le titre du média.<br>
        $auteur : l'auteur ou le créateur du média.<br>
        Ajoutez un constructeur qui initialise ces propriétés.<br>
        Ajoutez une méthode protected nommée afficherDetails() qui retourne une chaîne de caractères avec le titre et
        l'auteur.<br><br>


        Créez une classe Livre qui hérite de Media.<br>
        Ajoutez une propriété private pour le nombre de pages, $nbPages.<br>
        Ajoutez un constructeur pour initialiser le titre, l'auteur et le nombre de pages.<br>
        Ajoutez une méthode public nommée afficherInfos() qui utilise la méthode afficherDetails() de la classe Media et
        ajoute le nombre de pages.<br><br>

        Créez une classe DVD qui hérite également de Media.<br>
        Ajoutez une propriété private pour la durée du DVD en minutes, $duree.<br>
        Ajoutez un constructeur pour initialiser le titre, l'auteur et la durée.<br>
        Ajoutez une méthode public nommée afficherInfos() qui utilise la méthode afficherDetails() de la classe Media et
        ajoute la durée du DVD.<br><br>

        Instanciez des objets Livre et DVD et affichez leurs informations en utilisant les méthodes afficherInfos().</p>

      <?php
//////////////////////////// Exercice 4  //////////////////////////////////////

/*

 Vous allez créer une classe de base "Media" qui représente un média général dans la bibliothèque (par exemple, un livre, un CD, un DVD). Ensuite, vous allez créer des classes dérivées pour des types spécifiques de médias : Livre et DVD.


La classe Media doit avoir les propriétés protected suivantes :
$titre : le titre du média.
$auteur : l'auteur ou le créateur du média.
Ajoutez un constructeur qui initialise ces propriétés.
Ajoutez une méthode protected nommée afficherDetails() qui retourne une chaîne de caractères avec le titre et l'auteur.


Créez une classe Livre qui hérite de Media.
Ajoutez une propriété private pour le nombre de pages, $nbPages.
Ajoutez un constructeur pour initialiser le titre, l'auteur et le nombre de pages.
Ajoutez une méthode public nommée afficherInfos() qui utilise la méthode afficherDetails() de la classe Media et ajoute le nombre de pages.

Créez une classe DVD qui hérite également de Media.
Ajoutez une propriété private pour la durée du DVD en minutes, $duree.
Ajoutez un constructeur pour initialiser le titre, l'auteur et la durée.
Ajoutez une méthode public nommée afficherInfos() qui utilise la méthode afficherDetails() de la classe Media et ajoute la durée du DVD.

Instanciez des objets Livre et DVD et affichez leurs informations en utilisant les méthodes afficherInfos().
*/


  class Media {
  
    protected string $titre;

    protected string $auteur;
  
    public function __construct( string $t, string $a){
      
      $this->titre = $t;
      $this->auteur = $a;
    }

    protected function afficheDetails() :string {

      return "L'auteur de {$this->titre} est {$this->auteur}";
    }

    protected function afficheTitre() :string {

      return " {$this->titre}";
    }

    protected function afficheAuteur() :string {

      return " est de {$this->auteur}";
    }
  }



  class Livre extends Media {

    private int $nbPages;

    public function __construct(string $titre, string $auteur, int $p){
      
      parent::__construct($titre, $auteur); 
      $this->nbPages = $p;
    }

    public function afficheInfos() {
      return "<p>{$this->afficheDetails()}, il contient {$this->nbPages} pages</p>";
    }

  }


  class DVD extends Media {
    
    private int $duree;

    public function __construct($titre, $auteur, $d){
      
      parent::__construct($titre, $auteur);
      $this->duree = $d;
    }

    public function afficheInfos() :string {
      return "<p>{$this->afficheDetails()}, il dure {$this->duree} minutes</p>";
    }
  }

  $livre1 = new Livre("La divine Comédie", "Dante", 859);
  $livre2 = new Livre("Da Vinci Code", "Dan Brown", 735);

  $dvd1 = new DVD("Heat", "Michael Mann", 170);
  $dvd2 = new DVD("Gladiator", "Ridley Scott", 155);

  echo $livre1->afficheInfos();
  echo $livre2->afficheInfos();
  echo $dvd1->afficheInfos();
  echo $dvd2->afficheInfos();



  require_once "../inc/footer.inc.php"
?>