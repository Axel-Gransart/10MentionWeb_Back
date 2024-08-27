<?php

require_once "../../inc/function.inc.php";
$title = "Pratique -> Exercice E-commerce";
require_once "../../inc/header.inc.php";

require_once "Product.php";
require_once "Order.php";

?>

<p class="lead">Pratique -> Exercice E-commerce</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">



<?php

  // Importation des namespace

  use ExoEcommerce\Product;
  use ExoEcommerce\Order;


  // Création des produits : Instanciation de la classe Product

  $produit1 = new ExoEcommerce\Product("Vélo", 250); // Je peux utiliser cette syntaxe si je ne veux pas mettre des use dans mon fichier
  $produit2 = new Product("Casque", 25); // Cette syntaxe si j'utilise le mot-clé use
  $produit3 = new Product("Gants", 30);
  $produit4 = new Product("Cuissard", 45);
  

  $order1 = new Order(1);

  $order1->addProduct($produit1);
  $order1->addProduct($produit2);
  $order1->addProduct($produit3);
  $order1->addProduct($produit4);
  // affichage des informations de la commande
    // Id :

    echo "<p> ID de la commande : {$order1->getOrderId()}</p>";

    // Les produits dans la commande :

    var_dump($order1->getProduitList());
    echo "<br><br><br>";

    $toutLesProduits = $order1->getProduitList();
    $total = 0;

    echo "<p><ul> La commande {$order1->getOrderId()} contient : ";
      foreach ($toutLesProduits as $value) {
        $total +=$value->getPrice();
        echo "<li>{$value->getName()} au prix de : {$value->getPrice()}€</li> ";
      }
    echo " </ul> Pour un total de {$total}€ </p>";


    // echo "<p> Les produits de la commande : ". $string . "</p>";



  require_once "../../inc/footer.inc.php";
?>