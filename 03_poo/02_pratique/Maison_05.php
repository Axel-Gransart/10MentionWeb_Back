<?php

require_once "../inc/function.inc.php";
$title = "Pratique -> Maison";
require_once "../inc/header.inc.php";
?>

<p class="lead">Pratique -> Maison</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
              <h2>Propriétés et Méthodes STATIQUE</h2>
              <p>Le mot static pour définir et préciser que la propriété ou la méthode appartient seulement à la classe dans laquelle elle a été définie ( => ne vont pas appartenir à une instance de classe et par la suite à un objet qui stocke cette instance).</p>
              <p>Les méthodes et les propriétés STATIQUES vont avoir la même définition et la même valeur pour toutes les instances d'une classe.</p>
              <p>On peut  accéder  à ces éléments sans avoir besoin d'instancier la classe.</p>
              <p>Depuis un objet il est impossible d'accéder à une propriété statique.</p>
              <p>On utilise les propriété et méthode statique quand on a pas besoin d'instnacier la classe plusieurs fois et stocker cette instanciation dans des objets différents.</p>
              <p>Cela nous permettre de partager de données communes entre toutes les instances d'une classe, optimiser des ressources et économiser de la mémoire quand les données changent pas et qui  doivent être partagées entre toutes les instances</p>
              <p>Exemple l'utilisation de la connexion à la BDD</p>


<?php

  //--------------------------Méthodes et propriétés STATIQUE ------------------//

  /*
     
    -- Le mot static pour définir et préciser que la propriété ou la méthode appartient  seulement à la classe dans laquelle elle a été définie ( => ne vont pas appartenir à une instance de classe et par la suite à un objet qui stocke cette instance).

    -- Les méthodes et les propriétés STATIQUES vont avoir la même définition et la même valeur pour toutes les instances d'une classe .

    -- On peut  accéder  à ces éléments sans avoir besoin d'instancier la classe .

    -- Depuis un objet il est impossible d'accéder à une propriété statique.

    On utilise les propriété et méthode statique quand on a pas besoin d'instancier la classe plusieurs fois et stocker cette instanciation dans des objets différents.

    cela nous permet de partager de données communes entre toutes les instances d'une classe, optimiser des ressources et économiser de la mémoire quand les données changent pas et qui  doivent être partagées entre toutes les instances
    Exemple l'utilisation de la connexion à la BDD     
     
  */

  class Maison {

    /**
     * La surface du terrain
     *
     * @var string
     */
    public static $espaceTerrain = '500 m²';
    
    /**
     * La couleur de la maison
     *
     * @var string
     */
    public string $couleur = 'blanc';


    const HAUTEUR = '10m';
    
    /**
     * Nombre de pièces dans la maison
     *
     * @var integer
     */
    private static int $nbPiece = 7;

    /**
     * Nombre de porte dans la maison
     *
     * @var integer
     */
    private int $nbPorte = 10;

    public static function getNbPiece() {
            
      // Utilisation de 'self::' pour accéder à une propriété statique, il fait référence à la classe, contrairement à $this, qui fait référence à l'instance de l'objet.
      //Les méthodes statiques peuvent accéder aux propriétés statiques via le mot-clé 'self'.
      
      return self::$nbPiece; // Lors d'un 'self::', il faut mettre le $ devant la propriété appelé 'opérateur de résolution de portée' (::)
    }

    public function getNbPorte() {
      
      return $this->nbPorte;
    }
    
  }
?>
    <p> On déclare la classe Maison avec les propriétés à l'intérieur :</p>
    <code>
      <pre  class="alert alert-info">

        class Maison {
          
          /**
          * La surface du terrain
          *
          * @var string
          */
          public static $espaceTerrain = '500 m²';
          
          /**
          * La couleur de la maison
          *
          * @var string
          */
          public string $couleur = 'blanc';
          
          
          const HAUTEUR = '10m';
          
          /**
          * Nombre de pièces dans la maison
          *
          * @var integer
          */
          private static int $nbPiece = 7;
          
          /**
          * Nombre de porte dans la maison
          *
          * @var integer
          */
          private int $nbPorte = 10;
          
          public static function getNbPiece() {
            
            // Utilisation de 'self::' pour accéder à une propriété statique, il fait référence à la classe, contrairement à $this, qui fait référence à l'instance de l'objet.
            //Les méthodes statiques peuvent accéder aux propriétés statiques via le mot-clé 'self'.
            
            return self::$nbPiece; // Lors d'un 'self::', il faut mettre le $ devant la propriété appelé 'opérateur de résolution de portée' (::)
          }
          
          public function getNbPorte() {
            
            return $this->nbPorte;
          }
          
        }
        
      </pre>
   </code>

<?php

  // Appel de la propriété $espaceTerrain dans la class Maison

  // $maison_1 = new Maison(); // L'instanciation de la classe n'est pas obligatoire

  echo "<p> Surface du terrain : " . Maison::$espaceTerrain . "</p>"; // Appelle d'une propriété statique par la classe

  
  echo "<p> Nombre de pièce : " . Maison::getNbPiece() . "</p>";
  

  /* Création d'une instance de la classe Maison */

  $maison_2 = new Maison();

  // Appel à la propriété couleur
  echo "<p> Couleur de la maison : " . $maison_2->couleur . "</p>";

  // Affichage du nombre de porte dans la maison
  echo "<p> Nombre de porte : " . $maison_2->getNbPorte() . "</p>";

  //Appel de la constante HAUTEUR de la classe Maison
  echo "<p> Hauteur de la maison : " . Maison::HAUTEUR . "</p>";  


  //---------------------------- Les exemples ci-dessous contiennent des erreurs ----------------------------

  // echo Maison::$couleur; // Erreur: On ne peut pas appeler une propriété non statique (publique) avec la classe
  // echo Maison::getNbPorte(); // Erreur: On ne peut pas appeler une méthode non statique (publique) par la classe 
  // echo $maison_2->getNbPorte(); // On ne devrait pas pouvoir appeler une méthode statique par un objet, mais PHP permet cette action. Cependant, il est préférable d'éviter cela pour de bonnes pratiques


  //---------------------------- Exemples d'utilisation de la propriété static ----------------------------

  class Compteur {

    /**
     * Total
     *
     * @var integer
     */
    public static $totalCount = 0;

    public function __construct(){
      self::$totalCount++;
    }
  }

  echo Compteur::$totalCount . "<br>";
  $objet1 = new Compteur();

  echo Compteur::$totalCount . "<br>";
  $objet2 = new Compteur();

  echo Compteur::$totalCount . "<br>";


  //---------------------------- Exemples de configuration de BDD ----------------------------

  class ConfigurationBDD {

    public static $dbName = "nomBdd";
    public static $dbUser = "user";
    public static $dbPassword = "mdp";

  }
  echo ConfigurationBDD::$dbName;


  require_once "../inc/footer.inc.php"
?>