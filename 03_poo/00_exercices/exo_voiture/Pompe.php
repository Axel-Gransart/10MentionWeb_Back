<?php

  class Pompe {


    /**
     * Taille du réservoir de la pompe
     *
     * @var float
     */
    private int $tailleReservoirPompe;

    /**
     * Quantité d'essence actuellement dans le réservoir de la pompe
     *
     * @var float
     */
    private float $nbLitreEssencePompe;

     /**
     * Constructeur de la classe Pompe
     *
     * @param integer $t
     * @param float $l
     */
    public function __construct(int $t, float $l){
      
      $this->setTailleReservoirPompe($t);
      $this->setNbLitreEssencePompe($l);
    }

    /**
     * Définir la quantité d'essence dans le réservoir de la pompe
     *
     * @param float $quantite
     * @return void
     */
    public function setNbLitreEssencePompe(float $quantite) :void {
      $this->nbLitreEssencePompe = $quantite;
    }

    /**
     * Définir la taille du réservoir de la pompe
     *
     * @param integer $taille
     * @return void
     */
    public function setTailleReservoirPompe(int $taille) :void {
      $this->tailleReservoirPompe = $taille;
    }



    
    /**
     * Méthode pour récupérer la taille du réservoir de la pompe
     *
     * @return integer
     */
    public function getTailleReservoirPompe() :int {  
      return $this->tailleReservoirPompe;
    }

    /**
     * Méthode pour récupérer la quantité d'essence dans le réservoir de la pompe
     *
     * @return float
     */
    public function getNbLitreEssencePompe() :float {
      return $this->nbLitreEssencePompe;
    }

    /**
     * Délivrer de l'essence dans la voiture
     *
     * @param Voiture $v
     * @return string
     */
    public function delivrerEssence(Voiture $v) { // Indique que la méthode attend un objet de type Voiture en paramètre.

      // Quantité à délivrer = taille du réservoir de la voiture - nombre de litre dans le reservoir de la voiture.

      $quantite_a_delivrer = $v->getTailleReservoirVoiture() - $v->getNbLitreEssenceVoiture();

      // Si la quantité à délivrer est supérieur à ce que la pompe contient, il faut ajuster la quantité à ce qu'il reste de disponible.

      if ($quantite_a_delivrer > $this->getNbLitreEssencePompe()) {

        $quantite_a_delivrer = $this->getNbLitreEssencePompe();
      }

      // 1 - Mettre à jour la quantité d'essence dans la voiture
      $v->setNbLitreEssenceVoiture($v->getNbLitreEssenceVoiture() + $quantite_a_delivrer);

      // 2 - Mettre à jour la quantité d'essence restant dans la pompe
      $this->setNbLitreEssencePompe($this->getNbLitreEssencePompe() - $quantite_a_delivrer);

      // Retourne un message indiquant la quantité d'essence délivrée
      return "<p> Je viens de mettre $quantite_a_delivrer litre(s) d'essence dans le reservoir</p>";
    }
  }