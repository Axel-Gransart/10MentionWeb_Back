<?php
require_once "../inc/function.inc.php";
$title = "Cours - L'objet";
require_once "../inc/header.inc.php";

?>


            <p class="lead">L'objet</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mb-5 text-danger">Qu'est ce que sont les objets ?</h2>
                <p>On peut voir les objets comme des types de variables (number, string, array, etc.) mais ces trois types de variables sont limités et on peut se retrouver bloqué. Par exemple lorsque l'on créé un réseau social et que l'on veut sauvegarder un utilisateur et définir ses droits, ses limites etc. on doit définir des tableaux, qui sont vite trop complexes et les personnes qui découvrent le code auront du mal à s'y retrouver. </p>
                <p>Par exemple, les dates. Les dates en PHP sont complexes, les dates sont soit en string et c'est chiant, soit en nombres et c'est tout aussi chiant. Il va falloir convertir et passer d'un format à l'autre.</p>
                <p>Lorsque l'on créé un nouvel objet on fait en fait une instanciation de notre classe. A chaque fois que l'on créera un nouvel objet, on fera une nouvelle instanciation, grâce au mot clé <code>new</code>. Par exemple grâce au code suivant : <br>
                    <code>
                        $date1 = new MaDate("2022-03-28"); <br>
                        $date2 = new MaDate(); <br>
                    </code>
                    nous avons deux instances de la classe MaDate, à laquelle on fait appel. Ces deux instances seront indépendantes l'une de l'autre.
                </p>
                <p class="alert alert-info">
                    <strong>MaDate</strong> est une classe <br>
                    <strong>$date1 et $date2</strong> sont des objets ou bien des instances de cette classe <br>
                    la classe va être la définition, et l'objet va être une instance de cette définition, un objet.
                </p><!-- la classe va être la définition, et l'objet va être une instance de cette définition, un objet.  -->
            </div>
            <div class="col-12">
                <h2 class="text-center text-danger">Les propriétés</h2>
                <p>Sur nos différents objets, nous allons avoir des propriétés, des variables. Un objet pourra en fait avoir différents attributs, différentes propriétés. Pour une classe MaDate, on pourra par exemple imaginer des propriétés pour le nombre de jours, le nombre des mois, le nombre d'années. </p>
            </div>
            <div class="col-12">
                <h2 class="text-center text-danger">Les méthodes</h2>
                <p>Sur nos différents objets, nous allons aussi pouvoir avoir des méthodes. Les méthodes sont des fonctions, elles auront donc la même nomenclature : <code>nomMethode()</code>. La différence est qu'elles s'appliquent directement sur un objet, une instance <code>$date -> addDays()</code>.</p>
            </div>
        </div>
    </div>







<?php
require_once "../inc/footer.inc.php"
?>

