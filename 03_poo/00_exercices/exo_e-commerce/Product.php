<?php

  namespace ExoEcommerce {

    class Product {
      
      /**
       * Le nom du produit
       *
       * @var string
       */
      private string $name;

      /**
       * Le prix du produit
       *
       * @var float
       */
      private float $price;

      /**
       * Constructeur de la classe Product
       *
       * @param string $n
       * @param float $p
       */
      public function __construct(string $n, float $p){
        
        $this->name = $n;
        $this->price = $p;
      }
      
      /**
       * Méthode pour récupérer le nom du produit
       *
       * @param string $n
       */
      public function getName() :string {
        return $this->name;
      }

      /**
       * Méthode pour récupérer le prix du produit
       *
       * @param string $p
       */
      public function getPrice() :string {
        return $this->price;
      }
      

    }
  }