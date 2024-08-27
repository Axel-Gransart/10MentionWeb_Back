<?php
require_once "../inc/function.inc.php";
$title = "Cours - Autoloading";
require_once "../inc/header.inc.php";

?>


            <p class="lead">L'autoloading</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 border rounded my-2 p-2">
                <h2 class="text-center p-4 text-danger">Introduction</h2>
                <p>L'autoloading est un système qui va permettre de charger automatiquement les différentes classes. Cela va nous permettre de ne pas avoir à faire à chaque fois un <em>require</em>, surtout si on a plusieurs classes.</p>
                <p>L'autoloader va en effet permettre de gagner du temps, on aura juste à appeler un new suivi de la class que l'on souhaite, et l'autoloader ira chercher par lui-même la classe dans notre code.</p>
                <hr>
                <h2 class="text-center p-4 text-danger">Utilisation</h2>
                <p>Pour l'autoloader, la syntaxe sera la même sur toutes les pages ou nous souhaitons l'appeler, la seule chose à laquelle il faudra faire attention et le chemin grâce auquel on accèdera aux différentes classes. C'est la raison pour laquelle, les classes sont toutes rangées au même endroit, dans un dossier <em>class</em> ou <strong>classes</strong>.</p>
                <p>On pourra bien entendu faire un autoload dans une class externe pour avoir le moiins de code possible dans notre vue (la page qui sert à afficher) mais pour notre utilisation ce n'est pas nécessaire.</p>
            </div>
        </div>
    </div>



<?php
require_once "../inc/footer.inc.php"
?>
