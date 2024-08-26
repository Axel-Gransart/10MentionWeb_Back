<?php

  class Voiture {

    /**
      * Taille du réservoir de la voiture
      *
      * @var integer
    */
    private int $tailleReservoirVoiture;

    /**
      * Quantité d'essence actuellement dans le réservoir de la voiture
      *
      * @var float
    */
    private float $nbLitreEssenceVoiture;

    /**
     * Constructeur de la classe Voiture
     *
     * @param integer $t
     * @param float $l
     */
    public function __construct(int $t, float $l){
      
      $this->setTailleReservoirVoiture($t);
      $this->setNbLitreEssenceVoiture($l);
    }

    /**
     * Définir la quantité d'essence dans le réservoir de la voiture
     *
     * @param float $quantite
     * @return void
     */
    public function setNbLitreEssenceVoiture(float $quantite) :void {
      $this->nbLitreEssenceVoiture = $quantite;
    }

    /**
     * Définir la taille du réservoir de la voiture
     *
     * @param integer $taille
     * @return void
     */
    public function setTailleReservoirVoiture(int $taille) :void {
      $this->tailleReservoirVoiture = $taille;
    }



    
    /**
     * Méthode pour récupérer la taille du réservoir de la voiture
     *
     * @return integer
     */
    public function getTailleReservoirVoiture() :int {  
      return $this->tailleReservoirVoiture;
    }

    /**
     * Méthode pour récupérer la quantité d'essence dans le réservoir de la voiture
     *
     * @return float
     */
    public function getNbLitreEssenceVoiture() :float {
      return $this->nbLitreEssenceVoiture;
    }
  }

