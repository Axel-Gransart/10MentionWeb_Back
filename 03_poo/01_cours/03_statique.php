<?php
require_once "../inc/function.inc.php";
$title = "Cours - La visibilité";
require_once "../inc/header.inc.php";

?>



            <p class="lead">Propriétés et méthodes statiques</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center p-4 text-danger">Propriétés et méthodes statiques</h2>

                <p>Les propriéts et méthodes statiques sont particulières, en effet ces dernières n'ont pas besoin d'être appliquées sur l'instanciation de notre classe, elles vont être directemet liées. Dès qu'on créera un nouvel objet, il profitera donc de la méthode, sans qu'on ait besoin de lui attribuer. C'est pratique dans certains cas distincts, comme lorsque l'on veut formater un chiffre par exemple, en rajoutant un 0 initial s'il est inféireur à 10. On ne voudra pas dire à chaque fois : <code>$machin->format</code>, on voudra que dès que l'on instancie, ce format soit appliqué.</p>
                <p>La façon d'appeler une classe qui possède une fonction statique sera différente : <code>Classe::methode()</code>. On utilisera lorsque l'on a des méthodes ou des propriétés statiques deux fois deux points <em>::</em> et non plus l'appellation new suivie de la flèche <em>-></em>.</p>
                <p>Ces méthodes et propriétés statiques seront notamment utilisées lorsque l'on s'occupe de constantes, car elles sont elles mêmes statiques. (EXEMPLE PERSO MAX VIE)</p>

                <h2 class="text-center  p-4 text-danger">L'héritage</h2>

                <p>Une notion essentielle à comprendre en orienté objet est l'héritage. En effet on peut avoir besoin de changer certains paramètres d'une classe mais en garder d'autres. C'est à ce moment là que la notion d'héritage arrive. Elle va permettre de dire dans une nouvelle classe qu'on hérite d'une ancienne classe. Cette nouvelle classe aura accès à toutes les propriétés et méthodes de notre classe initiale </p>

                <h2 class="text-center  p-4 text-danger">Les avantages</h2>
                
                <p>L'héritage va nous permettre non seulement de garder une organisation optimale pour le code mais aussi d'avoir le moins de répétitions possibles. </p>
            </div>
        </div>
    </div>



<?php
require_once "../inc/footer.inc.php"
?>
