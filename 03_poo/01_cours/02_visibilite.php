<?php
require_once "../inc/function.inc.php";
$title = "Cours - La visibilité";
require_once "../inc/header.inc.php";

?>


            <p class="lead">La visibilité</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 border rounded my-2 p-2">
                <h2 class="text-center p-4 text-danger">Introduction</h2>
                <p>La visibilité représente la portée de notre propriété et/ou de notre méthode, à quel moment on pourra y accéder et à quel moment on ne pourra pas.</p>
                <hr>                
                <h3 class="text-center p-4 text-danger">La visibilité public</h3>
                <p>La visibilité <strong class="fw-bolder">" public " </strong>est celle que l'on utilise par défaut au sein de notre classe. Elle va nous permettre de définir que cette propriété est accessible au sein de la classe en faisant <code>$this</code> mais aussi sur une page externe. </p>
                <hr>
                <h3 class="text-center p-4 text-danger">La visibilité private</h3>
                <p>La visibilité privée <strong class="fw-bolder">" private " </strong> signifie que la variable est accessible dans la classe mais pas en dehors, on ne pourra donc pas faire appel à notre propriété dans une page externe comme affichage. C'est là que les <code>getter</code> font leur apparition. Ils vont permettre d'afficher le contenu d'une variable mais en s'assurant que c'est vraiment l'opération que l'on veut grâce aux <code>getter</code>. La construction du <code>getter</code> se fait toujours de la même façon (on verra ça plus en détails grâce à Symfony).</p>
                <p>Mettre les propriétés en 'private'permet d'éviter qu'elles ne soit modifiées de l'éxtérieur de la classe sans contrôle.</p>
                <hr>               
                <h3 class="text-center p-4 text-danger">La visibilité protected</h3>
                <p>Lorsqu'une variable à la visibilité <strong class="fw-bolder">" protected "</strong> on a peu près la même visibilité que lorsque l'on est en private, en revanche cette visibilité est légèrement moins stricte car on peut réutiliser la propriété protected lorsqu'on hérite de la classe sur laquelle elle est déclarée.  => accessible à l'intérieur de la classe et dans la classe héritières On verra la notion d'héritage un peu plus tard.</p>
            </div>
            <div class="col-12 border rounded my-2 p-2">
                <h2 class="text-center p-4 text-danger">Mais pourquoi choisir autre chose que public ?</h2>
                <p>Les notions de public / private et protected ne sont pas nécessaires à 100% lorsque l'on travaille seul. Cependant, si notre code a vocation a être vu par d'autres personnes, il faudra bien définir les propriétés pour que les autres personnes qui voient le code comprennent ce qui peut être modifié et ce qui ne doit pas l'être.</p>
                <p>Généralement on trouvera dans les codes destinés à la lecture par d'autres développeurs, toutes les propriétés en private et des getters pour y accéder. Pour modifier leur contenu, cela se fera par des setters. Cette façon de fonctionner servira de garde fous pour éviter les modifications intempestives du code. Le svariables ne pourront donc pas être modifiées en dehors de la classe dans laquelle elles se trouvent.</p>
                <p> Les propriétés sont déclarées en générale en private, les mèthodes sont déclarées en public sauf dans des cas particulier.
                </p>
            </div>
        </div>
    </div>


<?php
require_once "../inc/footer.inc.php"
?>

