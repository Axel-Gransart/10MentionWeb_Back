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
            <div class="col-12">
              <h4>Exercice 1</h4>
              <p>Créez une classe Calculatrice avec deux méthodes : additionner et diviser.<br>
              Vous devrez ajouter des commentaires de documentation <br>
              Méthode additionner: La méthode doit retourner un int, qui est la somme des deux nombres.<br>
              Méthode diviser: La méthode doit retourner un float si la division est possible. Si le diviseur est zéro, la méthode doit retourner false.</p>

<?php
//////////////////////////// Exercice 1 //////////////////////////////////////

/* 
  Créez une classe Calculatrice avec deux méthodes : additionner et diviser. 
  Vous devrez ajouter des commentaires de documentation 
  Méthode additionner: La méthode doit retourner un int, qui est la somme des deux nombres.
  Méthode diviser: La méthode doit retourner un float si la division est possible. Si le diviseur est zéro, la méthode doit retourner false.
*/

class Calculatrice {

  /**
   * Additionne 2 nombres
   * @return int Le total de l'addition de $nb1 et $nb2
   */

   /**
    * Undocumented function
    *
    * @param integer $nb1
    * @param integer $nb2
    * @return integer
    */
  public function additionner(int $nb1, int $nb2) :int {
    $total = $nb1 + $nb2;

    return $total;
  }

  /**
   * divise 2 nombres
   * @return mixed Le résultat de $nb1 divisé par $nb2
   * Ou False si le diviseur est égal à 0
   */

  public function diviser(float $nb1, float $nb2) :mixed {
   

    if ( $nb2 == 0 ) {

      return " false ";
    }
    return $nb1 / $nb2;      
     
  }
}

$calcul = new Calculatrice();



echo $calcul -> additionner(5, 3) . "<br>";
echo $calcul -> additionner(48, 25) . "<br>";
echo $calcul -> diviser(32, 8) . "<br>";
echo $calcul -> diviser(15, 0) . "<br>";
?>
            </div>
            <div class="col-12">
              <h4>Exercice 2</h4>
              <p>Créez un objet $fruit_1 à partir de la classe Fruit avec les propriétés suivantes : "Fraise" pour le nom et "rouge" pour la couleur.<br>
              Vous devrez ajouter des commentaires de documentation <br>
              La classe Fruit doit contenir les propriétés privées $nom et $couleur.<br>
              La classe doit également inclure un constructeur pour initialiser ces propriétés.<br>
              Affichez les valeurs des propriétés "Fraise" et "rouge" de l'objet $fruit_1 en utilisant un echo.</p>


<?php
//////////////////////////// Exercice 2  //////////////////////////////////////

/*
    Créez un objet $fruit_1 à partir de la classe Fruit avec les propriétés suivantes : "Fraise" pour le nom et "rouge" pour la couleur.
    Vous devrez ajouter des commentaires de documentation 
    La classe Fruit doit contenir les propriétés privées $nom et $couleur.
    La classe doit également inclure un constructeur pour initialiser ces propriétés.
    Affichez les valeurs des propriétés "Fraise" et "rouge" de l'objet $fruit_1 en utilisant un echo.
*/

class Fruit {

  /**
    * Le nom du fruit
    *
    * @var string
  */
  private string $nomDuFruit;

  /**
   * La couleur du fruit
   *
   * @var string
   */
  private string $couleur;
  
  public function __construct(string $n, string $c){
    
    // Initialisation des propriétés de l'objet avec les valeurs fournies lors de l'instanciation
    $this->nomDuFruit = $n;
    $this->couleur = $c;  
  }

  /**
    * Méthode pour obtenir le nom du fruit
    *
    * @return string
  */
  public function getNomDuFruit() :string {
    return $this->nomDuFruit;
  }

  /**
    * Méthode pour obtenir la couleur du fruit
    *
    * @return string
  */
  public function getCouleur() :string {
    return $this->couleur;
  }

 /**
   * Méthode pour afficher les détails du jeu vidéo
   *
   * @return string
   */
  public function afficheDetails() :string {
    return "<p>Fruit : {$this->nomDuFruit}, couleur : {$this->couleur}</p>";
  }  
} 

$fruit_1 = new Fruit('Fraise', 'Rouge');
debug($fruit_1);

echo $fruit_1->afficheDetails();


$fruit_2 = new Fruit('Mangue', 'Jaune');
debug($fruit_2);

echo $fruit_2->getCouleur();


require_once "../inc/footer.inc.php"
?>