<?php

require_once "../inc/function.inc.php";
$title = "Pratique -> Panier";
require_once "../inc/header.inc.php";
?>

<p class="lead">Pratique -> Panier</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
              <p>En programmation, Une classe permet de regrouper des données (attributs / propriétés) et des comportements (méthodes).</p>
              <p>Pour obtenir un objet, il faut demander au langage de le créer et de nous le donner pour qu’on puisse le manipuler. Pour faire ça, on précise au langage le nom de l’élément que l’on veut manipuler, c’est-à-dire la classe.</p>
              <p>Une classe permet de produire plusieurs objets. Par convention, une classe sera nommée avec la première lettre en MAJUSCULE.</p>
              <p>La classe représente un modèle de données qui définit la structure commune à tous les objets créés à partir de celle-ci. La classe constitue donc une sorte de moule à travers lequel plusieurs objets du même type et de même structure peuvent être créés.</p>
              <p>Une classe représente une entité (le modèle qu'elle doit suivre) ; elle a ses services (= méthodes : ce qu'elle propose et ce qu'elle permet de faire) et elle a les attributs (= propriétés : ses spécificités).</p>
              <p>Pour en savoir plus : <a target="_blank" href="https://blog.hubspot.fr/website/programmation-orientee-objet#:~:text=La%20programmation%20orient%C3%A9e%20objet%2C%20ou,des%20instances%20individuelles%20d">Programmation orientée Objet</a></p>
              <p>Pour définir et créer une classe, on utilise le mot-clé class suivi du nom de la classe (avec une lettre majuscule au début et à chaque début d'un nouveau mot dans le nom de la classe).</p>


<?php
/* 
  * En programmation, Une classe permet de regrouper des données (attributs / propriétés) et des comportements (méthodes).

  * Pour obtenir un objet, il faut demander au langage de le créer et de nous le donner pour qu’on puisse le manipuler. Pour faire ça, on précise au langage le nom de l’élément que l’on veut manipuler, c’est-à-dire la classe.

  * Une classe permet de produire plusieurs objets. Par convention, une classe sera nommée avec la première lettre en MAJUSCULE.

  * La classe représente un modèle de données qui définit la structure commune à tous les objets créés à partir de celle-ci. La classe constitue donc une sorte de moule à travers lequel plusieurs objets du même type et de même structure peuvent être créés.

  * Une classe représente une entité (le modèle qu'elle doit suivre) ; elle a ses services (= méthodes : ce qu'elle propose et ce qu'elle permet de faire) et elle a les attributs (= propriétés : ses spécificités).
  
  * Pour en savoir plus : 
    - https://blog.hubspot.fr/website/programmation-orientee-objet#:~:text=La%20programmation%20orient%C3%A9e%20objet%2C%20ou,des%20instances%20individuelles%20d
  
  * Pour définir et créer une classe, on utilise le mot-clé class suivi du nom de la classe (avec une lettre majuscule au début et à chaque début d'un nouveau mot dans le nom de la classe).
*/

/////////////////////////////////////////////////////////////////////////////////////////////////////


  /* Classe réprésentant un panier d'articles */

class Panier {

  // une propriété (ou attribut) => une variable appartenant à une classe 
  // une méthode => une fonction appartenant à une classe


  /** les annotations sont très utiles pour les outils de développement et les environnements de développement intégré (IDE), elles ne sont pas obligatoires en PHP.

  * En programmation, un docblock ou DocBlock est un commentaire spécialement formaté spécifié dans le code source qui est utilisé pour documenter un segment de code spécifique

  * L'annotation @var est utilisée dans les commentaires de documentation (DocBlock) en PHP pour indiquer le type de donnée associé à une variable. Elle est souvent utilisée pour documenter les propriétés d'une classe, les variables dans des fonctions ou méthodes, ou même des variables dans le code, afin de clarifier le type attendu ou utilisé.
  */

  /**
    * @var int Nombre de produit dans le panier
  */

  public int $nbrProduits; // une propriété dans la classe Panier

  /**
    * Ajoute un article au panier 
    * @return string Un message indiquant que l'article à été ajouté
  */

  public function ajouterArticle() :string { // méthode 1 de la classe

    return "<p>L'article à été ajouté</p>"; // traitement
    
  }

  /**
    * Retire un article du panier 
    * @return string Un message indiquant que l'article à été retiré
  */

  // L'annotation @return est utilisée dans les commentaires de documentation (DocBlock) en PHP pour indiquer le type de valeur qu'une fonction ou une méthode renvoie.

  public function retireArticle() :string { // méthode 2 de la classe

    return "<p>L'article à été retiré</p>"; // traitement
    
  }

  // On peut déclarer des méthodes avec des paramètres 

    /**
      * Retourne le nombre d'article dans le panier
      * @param int $nbr le nombre d'article à définir (par défaut = 10)
      * @return string Un message indiquant le nombre d'article dans le panier
    */

    // L'annotation @param est utilisée dans les commentaires de documentation (DocBlock) en PHP pour décrire les paramètres d'une fonction ou d'une méthode,  on y trouve : le type, le nom et une brève description (facultative) du rôle de chaque paramètre attendu par la fonction ou la méthode

  public function nombreArticle( int $nbr = 10) :string { // nombreArticle() retourne par défaut un message avec noté 10 articles si aucun paramètre n'est passé

    return "<p>Il y a $nbr article(s) dans le panier</p>";

  }

}

////////////////////////////////////////////

$panier_1 = new Panier(); // Instanciation de la classe: On instancie ou on crée une instance de notre classe Panier, on la stocke dans un objet, cela permet de passer d'une classe à un objet.

// Panier est le modèle, $panier_1 est une version concrète de ce modèle.

// new : mot-clé permettant d'effectuer une instanciation

debug($panier_1); // Affiche la valeur de la propriété dans l'objet : type(objet), nom de la classe et référence de l'objet

debug(get_class_methods($panier_1)); // Cette méthode permet d'obtenir une liste des méthodes d'une classe donnée. elle renvoie un tableau, contenant les noms de toutes les méthodes publiques de la classe spécifiée, y compris celle héritées des classes parentes.

$panier_1 -> nbrProduits = 5; // on accède à la propriété $nbrProduits grâce à la flèche "->" appelée "opérateur objet" et on lui donne une valeur définie (ici 5)

debug($panier_1);

echo "<p> il a $panier_1->nbrProduits article(s) dans le panier </p>";
echo $panier_1-> ajouterArticle();
echo $panier_1-> retireArticle();
echo $panier_1-> nombreArticle();


////////////////////////////////////////////

$panier_2 = new Panier();

debug($panier_2);

unset($panier_1); // Pour détruire un objet, on utilise la fonction native unset()
debug($panier_1); // Affiche -> Warning: Undefined variable $panier_1


// On instancie un troisième objet et on le stocke dans la variable $panier_3

$panier_3 = new Panier();

debug($panier_3); // Ici, le nouvel objet $panier_3 à pris la place disponible dans la mémoire : Il est noté #1 dans le débug 

$panier_4 = new Panier();

debug($panier_4); // L'objet $panier_4 prend la suite dans la mémoire : Il est noté #3 dans le débug

/**
 * Une fois créés, les objets sont indépendants et ont chacun leurs propriétés;
 * ils ont tous accès aux méthodes déclarées dans la classe.
 * Toutes les informations déclarées publiques dans une classe seront accessibles depuis l'extérieur de cette classe.
 */


 require_once "../inc/footer.inc.php"
?>