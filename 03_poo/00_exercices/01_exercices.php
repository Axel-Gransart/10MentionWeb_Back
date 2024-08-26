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
              <h4 class="text-center">Exercice 1</h4>
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
debug($calcul);
?>
            </div>
            <div class="col-12 border rounded mt-3 p-3">
              <h4 class="text-center">Exercice 2</h4>
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

unset($fruit_2);

?>
            </div>
            <div class="col-12 border rounded mt-3 p-3">
              <h4 class="text-center">Exercice 3</h4>
              <p>Créez une classe Membre avec les propriétés privées pseudo et mdp.<br>
              La propriété pseudo doit être une chaîne de caractères et doit respecter les conditions suivantes :
              <ul>
                <li>Contenir entre 1 et 15 caractères inclus.</li>
              </ul>
              La propriété mdp représente le mot de passe associé au membre.<br>
              afficher dans un echo les valeurs du pseudo et du mdp en respectant les contraintes définies.</p>

<?php

//////////////////////////// Exercice 3  //////////////////////////////////////
/*
    Créez une classe Membre avec les propriétés privées pseudo et mdp.
    La propriété pseudo doit être une chaîne de caractères et doit respecter les conditions suivantes :
        - Contenir entre 1 et 15 caractères inclus.
    La propriété mdp représente le mot de passe associé au membre.
    afficher dans un echo les valeurs du pseudo et du mdp en respectant les contraintes définies.
*/

class Membre {

  /**
    * Le pseudo du membre
    *
    * @var string
  */
  private string $pseudo;

  /**
    * Le mot de passe du membre
    *
    * @var string
  */
  private string $mdp;

  /**
    * Le prénom du membre
    *
    * @var string
  */
  private string $prenom;

  /**
    * Le mot de passe du membre
    *
    * @var string
  */
  //private string $mdp;


  public function __construct(string $p, string $m, string $pr){
    
    if (is_string($p) && strlen($p) >= 1 && strlen($p) < 15) {
      $this->pseudo = $p;
    }
    else {
      $this->pseudo = "wrong pseudo";
    }
    if (ctype_alpha($pr)) {
      $this->prenom = $pr;
    }
    else {
      $this->prenom = "wrong prenom";
    }        

    $this->mdp = $m;  
  }

  /**
   * Méthode pour récupérer le pseudo
   *
   * @return string
   */
  public function getPseudo() :string {
       
    return $this->pseudo;    
  }

  /**
   * Méthode pour récupérer le mot de passe
   *
   * @return string
   */
  public function getMdp() :string {
    return $this->mdp;
  }

  /**
   * Méthode pour afficher les infos du membre
   *
   * @return string
   */
  public function afficheInfo() {
    if ($this->pseudo == "wrong pseudo") {
      return "<p>Votre pseudo n'est pas valide et doit faire entre 1 et 15 caractères</p>";
    }
    if ($this->prenom == "wrong prenom") {
      return "<p>Votre prénom n'est pas valide et ne doit pas contenir de chiffre</p>";
    }
    else {
      return "<p>Bonjour {$this->prenom}. Votre pseudo est : {$this->pseudo} et vous avez choisi '{$this->mdp}' comme mot de passe.</p>";
    }
  }
}

$member_1 = new Membre("Rocket54", "Essai1234", "Teddy3");
debug($member_1);
echo $member_1->afficheInfo();

$member_2 = new Membre("JadoreLaTraviata", "Essai1234", "Teddy");
debug($member_2);
echo $member_2->afficheInfo();

$member_3 = new Membre("RocketRacoon", "Test1234", "Teddy");
debug($member_3);
echo $member_3->afficheInfo();


?>
<h4>Correction</h4>


<?php

/**
 * Classe représentant un membre avec un pseudo et un mot de passe.
 */
class MembreCorrection {

    /**
     * Le pseudo du membre.
     * @var string
     */
    private string $pseudo;

    /**
     * Le mot de passe du membre.
     * @var string
     */
    private string $mdp;

    /**
     * Constructeur de la classe Membre.
     *
     * Initialise les propriétés pseudo et mdp en respectant les contraintes définies pour le pseudo.
     *
     * @param string $pseudo Le pseudo du membre, doit être une chaîne de caractères entre 1 et 15 caractères.
     * @param string $mdp Le mot de passe du membre.
     * @throws Exception Si le pseudo ne respecte pas les contraintes de longueur ou de type.
     */

     // L'annotation @throws Exception dans un commentaire de méthode PHP est utilisée pour indiquer que la méthode peut lancer une exception de type Exception
    public function __construct(string $pseudo, string $mdp) {
        $this->setPseudo($pseudo); // Initialise la propriété pseudo en utilisant le setter pour vérifier les contraintes.
        $this->mdp = $mdp; // Initialise la propriété mdp directement.
    }

    /**
     * Définit la propriété pseudo après validation.
     *
     * @param string $pseudo Le pseudo à définir.
     * @throws Exception Si le pseudo ne respecte pas les contraintes de longueur ou de type.
     */
    public function setPseudo(string $pseudo): void {
        if (is_string($pseudo) && strlen($pseudo) > 0 && strlen($pseudo) <= 15) {
            $this->pseudo = $pseudo; // Assigne le pseudo si toutes les contraintes sont respectées.
        } else {
            throw new Exception("Le pseudo doit être une chaîne de caractères entre 1 et 15 caractères."); // Lance une exception en cas de non-respect des contraintes.
        }
    }

    /**
     * Récupère la valeur du pseudo.
     *
     * @return string Le pseudo du membre.
     */
    public function getPseudo(): string {
        return $this->pseudo;
    }

    /**
     * Récupère la valeur du mot de passe.
     *
     * @return string Le mot de passe du membre.
     */
    public function getMdp(): string {
        return $this->mdp;
    }
}

// Création d'une instance de la classe Membre avec un pseudo et un mot de passe valides.
try {
    $membre = new MembreCorrection("JohnDoe", "password123");

    // Affichage des valeurs du pseudo et du mot de passe.
    echo "Pseudo : " . $membre->getPseudo() . "<br>";
    echo "Mot de passe : " . $membre->getMdp();
} catch (Exception $e) {
    // Gestion des erreurs en cas de non-respect des contraintes du pseudo.
    echo "Erreur : " . $e->getMessage();
}

?>


</div>
<?php

require_once "../inc/footer.inc.php"
?>