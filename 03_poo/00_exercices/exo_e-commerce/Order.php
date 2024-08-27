<?php

  namespace ExoEcommerce {

    class Order {

      /**
        * L'identifiant de la commande
        *
        * @var int
      */
      private int $orderId;

      /**
        * Liste des produits dans la commande
        *
        * @var array
      */
      private array $produitList = [];


      /**
        * Constructeur de la classe Order
        *
        * @param integer $o
      */
      public function __construct(int $o){
        
        $this->orderId = $o;        
      }

      /**
        * Get l'identifiant de la commande
        *
        * @return  int
      */ 
      public function getOrderId(){
        return $this->orderId;
      }
  
      /**
        * Get liste des produits dans la commande
        *
        * @return  array
      */ 
      public function getProduitList(){
        return $this->produitList;
      }

      public function addProduct(Product $produit) :void{
        
        $this->produitList[] = $produit;       
      }


      public function afficheProduitList(){

        $array = $this->produitList;
        $string = sprintf('%s %s %s %s', ...$array);

        echo $string;

        $this->produitList.implode(", ",$this->produitList);

        return "<p>J'ai {$this->produitList} dans mon panier</p>";
      }
    }
  }