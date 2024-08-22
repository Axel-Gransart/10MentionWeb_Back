<?php

require_once "../inc/function.inc.php";
$title = "Pratique -> Jeu Vidéo";
require_once "../inc/header.inc.php";
?>

<p class="lead">Pratique -> Jeu Vidéo</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">



<?php

class JeuVideo {

  /**
   * Le nom du jeu
   *
   * @var string
   */
  private string $nomDuJeu;

  /**
   * Le modèle de console
   *
   * @var string
   */
  private string $console;

  /**
   * Le prix du jeu
   *
   * @var float
   */
  private float $prix;


  /**
    * Le constructeur de la classe
    *
    * @param string $n Le nom du jeu
    * @param string $c Le modèle de console
    * @param float $p Le prix du jeu
  */
  /* 
    * Le constructeur est une méthode spéciale dans une classe, définie avec le nom __construct(). (double underscore)
    * Elle est utilisée pour initialiser les propriétés de l'objet lors de sa création.
    * En PHP, il s'agit d'une méthode magique, ce qui signifie qu'elle est automatiquement appelée lors de l'instanciation de la classe.
    * Il est important de noter qu'une classe ne peut avoir qu'un seul constructeur en PHP.
  */
  public function __construct(string $n, string $c, float $p){
    
    // Initialisation des propriétés de l'objet avec les valeurs fournies lors de l'instanciation
    $this->nomDuJeu = $n;
    $this->console = $c;
    $this->prix = $p;
  }
  
  /**
    * Méthode pour obtenir le nom du jeu vidéo
    *
    * @return string
  */
  public function getNomDuJeu() :string {
    return $this->nomDuJeu;
  }

  /**
    * Méthode pour obtenir le modèle de consola
    *
    * @return string
  */
  public function getConsole() :string {
    return $this->console;
  }

  /**
    * Méthode pour obtenir le prix du jeu vidéo
    *
    * @return float
  */
  public function getprix() :float {
    return $this->prix;
  }

  /**
   * Méthode pour afficher les détails du jeu vidéo
   *
   * @return string
   */
  public function afficheDetails() :string {
    return "<p>Jeu : {$this->nomDuJeu}, console : {$this->console}, prix : {$this->prix}€ </p>";
  }
}

// Instanciation de la classe JeuVideo avec les arguments pour initialiser les propriétés
$jeu_1 = new JeuVideo('Street Fighter 6', 'PS4', 69.99);
debug($jeu_1);

echo $jeu_1->afficheDetails();


$jeu_2 = new JeuVideo('Diablo IV', 'PS5', 79.99);
debug($jeu_2);

echo $jeu_2->afficheDetails();



require_once "../inc/footer.inc.php"
?>