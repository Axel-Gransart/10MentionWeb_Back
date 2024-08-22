<?php
require_once "../inc/function.inc.php";
$title = "Cours - L'héritage";
require_once "../inc/header.inc.php";

?>

   
            <p class="lead">L'héritage</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center p-4 text-danger">Introduction</h2>

                <p>Une notion essentielle à comprendre en orienté objet est l'héritage. En effet on peut avoir besoin de changer certains paramètres d'une classe mais en garder d'autres. C'est à ce moment là que la notion d'héritage arrive. Elle va permettre de dire dans une nouvelle classe qu'on hérite d'une ancienne classe. Cette nouvelle classe aura accès à toutes les propriétés et méthodes de notre classe initiale </p>

                <h2 class="text-center p-4 text-danger">Les avantages</h2>

                <p>L'héritage va nous permettre non seulement de garder une organisation optimale pour le code mais aussi d'avoir le moins de répétitions possibles. Un autres des avantages est que l'on peut redéfinir des propritétés à la volée. Alors que dans la classe parente, les attaques étaient à 20, ici, on peut redéfinir que les attaques du magicien sont à 40.</p>

                <h2 class="text-center p-4 text-danger">Utilisation</h2>
                
                <p>Pour qu'une classe profite d'une autre, il suffira, apès l'habituel <code>class Nomclass</code> de mettre le mot clé <em>extends</em> suivi du nom de la classe sur laquelle on veut s'appuyer. Par exemple: <code>class Magicien extends Personnage</code>. Cette façon de faire permettre de dire que l'on veut que notre nouvelle classe profite de notre classe Personnage.</p>
                <p>Lorsque l'on fera un <em>require</em> de notre nouvelle classe, il faudra faire bien attention à l'ordre dans lequel on appelle nos classe : d'abord l'initiale puis celle qui est étendue de celle-ci.</p>
            </div>
        </div>
    </div>




<?php
require_once "../inc/footer.inc.php"
?>
