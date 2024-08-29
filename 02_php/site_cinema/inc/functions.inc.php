
  <!-- Fichier qui contient les fonctions php à utiliser dans notre site -->

  <?php

    session_start();

    
   /*
                          ╔═════════════════════════════════════════════╗
                          ║                                             ║
                          ║             FONCTIONS GLOBALES              ║
                          ║                                             ║
                          ╚═════════════════════════════════════════════╝ */


    ################### constante pour définir le chemin du site ###################



    // constante qui définit les dossiers dans lesquels se situe le site pour pouvoir déterminer des chemins absolus à partir de localhost (on ne prends localhost). Ainsi nous écrivons tout les chemins (exp : src, href ) en absolu avec cette constante

    // define('RACINE_SITE', "/10MentionWeb_Back/02_php/site_cinema/");
    define('RACINE_SITE', "http://10mentionweb_back.test/02_php/site_cinema/");


    ################### Fonction pour debuger ###################

    function debug($var) {
      echo '<div class="mt-5"><pre class="border border-dark bg-light text-primary w-50 p-3 mt-5 pt-5">';
        var_dump($var);
      echo '</pre></div>';
    }

    ################### Fonction d'alert ###################

    function alert(string $contenu, string $class) {

      return "<div class=\"alert alert-$class alert-dismissible fade show text-center w-50 m-auto mb-5\" role=\"alert\">
                $contenu
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
              </div>";
    }

    ################### Fonction mise en tableau d'une string ###################

    function stringToArray(string $string ) :array{
    
      $array = explode('/', trim($string, '/')); 
      // Je transforme ma chaîne de caractère en tableau et je supprime les '/' autour de la chaîne de caractère 
      return $array; // ma fonction retourne un tableau
  
    }
  


    ################### Fonction pour la déconnexion ###################

    function logOut() {
      if (isset($_GET['action']) && $_GET['action'] == "deconnexion") {
        
        unset($_SESSION['user']);
        header('location:'. RACINE_SITE . 'index.php');
      }
    }

    logOut();

    
    ################### Fonction pour la connexion à la BDD ###################

    /* On va utiliser l'extension PHP Data Objects (PDO), elle définit une excellente interface pour accéder à une base de données depuis PHP et d'exécuter des requêtes SQL.
    Pour se connecter à la BDD avec PDO il faut créer une instance de cet Objet (PDO) qui représente une connexion à la base,  pour cela il faut se servir du constructeur de la classe.
    Ce constructeur demande certains paramètres:
      -> On déclare des constantes d'environnement qui vont contenir les information à la connexion à la BDD
    */

        // Constante du serveur => localhost
        define('DBHOST', 'localhost');

        // Constante de l'utilisateur de la BDD du serveur en local => root
        define('DBUSER', 'root');

        // Constante pour le mot de passe de serveur en local => pas de mot de passe
        define('DBPASS', '');

        // Constante pour le nom de la BDD
        define('DBNAME', 'cinema');

        

    function connexionBDD() {

      // $dsn = mysql:host=localhost;dbname=cinema;charset=utf8;   -> dsn = Data Source Name (nom de variable)
      $dsn = "mysql:host=".DBHOST.";dbname=".DBNAME.";charset=utf8";

      //Grâce à PDO on peut lever une exception (une erreur) si la connexion à la BDD ne se réalise pas(ex. : suite à une faute au niveau du nom de la BDD) et par la suite si cette erreur est capté on lui demande d'afficher une erreur

      try {

        /* dans le try on va instancier PDO, c'est créer un objet de la classe PDO (un élment de PDO)
          avec la variable dsn et les constantes d'environnement */

        $pdo = new PDO($dsn, DBUSER, DBPASS);
        //echo '<p> Je suis connecté </p>';
        
        //On définit le mode d'erreur de PDO sur Exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      }
      catch (PDOException $e) {  // PDOException est une classe qui représente une erreur émise par PDO et $e c'est l'objet de la classe en question qui va stocker cette erreur

        die('Erreur : ' . $e->getMessage());  
        // die permet d'arrêter le PHP et d'afficher une erreur en utilisant la méthode getMessage de l'objet $e

      }

      //le catch sera exécuté dès lors on aura un problème dans le try
        
      return $pdo;
      // ici on utilise un return car on récupère l'objet de la fonction que l'on va appelé dans plusieurs autres fonctions

    };

    ################### Création des tables ###################

    function createTableCategories() {
      
      $cnx = connexionBDD();

      $sql = "CREATE TABLE IF NOT EXISTS categories (
                id_category INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                name VARCHAR(50) NOT NULL,
                description TEXT NULL
              )";
      
      $request = $cnx->exec($sql);

    };

    //createTableCategories();

    function createTableFilms(){

      $cnx = connexionBdd();

      $sql = " CREATE TABLE IF NOT EXISTS films (
          id_film INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
          category_id INT(11) NOT NULL,
          title VARCHAR(100) NOT NULL,
          director VARCHAR(100) NOT NULL,
          actors VARCHAR(100) NOT NULL,
          ageLimit VARCHAR(5) NULL,
          duration TIME NOT NULL,
          synopsis text NOT NULL,
          date DATE NOT NULL,
          image VARCHAR(250) NOT NULL,
          price Float NOT NULL,
          stock BIGINT NOT NULL
          )";

      $request = $cnx->exec($sql);

  }

  //createTableFilms();

  function createTableUsers(){

    $cnx = connexionBdd();

    $sql = " CREATE TABLE  users (
        id_user INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        firstName VARCHAR(50),
        lastName VARCHAR(50) NOT NULL,
        pseudo VARCHAR(50) NOT NULL,
        mdp VARCHAR(255) NOT NULL,
        email VARCHAR(100) NOT NULL,
        phone VARCHAR(30) NOT NULL,
        civility ENUM('f', 'h') NOT NULL,
        birthday date NOT NULL,
        address VARCHAR(50) NOT NULL,
        zip VARCHAR(50) NOT NULL,
        city VARCHAR(50) NOT NULL,
        country VARCHAR(50),
        role ENUM('ROLE_USER','ROLE_ADMIN') DEFAULT 'ROLE_USER' 
        )";

    $request = $cnx->exec($sql);

  }

  //createTableUsers();

  function createTableOrders(){

    $cnx = connexionBdd();
    $sql = " CREATE TABLE IF NOT EXISTS orders (
         id_order INT PRIMARY KEY AUTO_INCREMENT,
         user_id INT NOT NULL,
         price FLOAT,
         created_at DATETIME,
         is_paid ENUM('0', '1')
    )";
    $request = $cnx->exec($sql);

  
}

//  createTableOrders();


function createTableOrderDetails(){

  $pdo = connexionBdd();
  $sql = " CREATE TABLE IF NOT EXISTS order_details (
       order_id INT NOT NULL,
       film_id INT NOT NULL,
       price_film FLOAT NOT NULL,
       quantity INT NOT NULL
      
  )";
  $request = $pdo->exec($sql);

}
 // createTableOrderDetails();

  ################### Création des clés entrangères ###################

  // ALTER TABLE ORDERS ADD FOREIGN KEY (Customer_SID) REFERENCES CUSTOMER (SID);

  // $tableF -> La table où on va créer la clé étrangère
  // $keyF -> La clé étrangère dans la tableF
  // $tableP -> La table à partir de laquelle on récupère la clé primaire
  // $keyP -> La clé primaire de la tableP

  function foreignKey( string $tableF, string $keyF, string $tableP, string $keyP) {
    
    $cnx = connexionBDD();

    $sql ="ALTER TABLE $tableF ADD FOREIGN KEY ($keyF) REFERENCES $tableP ($keyP)";

    $request = $cnx->exec($sql);
  }

  // Création de la clé étrangère dans la table films
  //foreignKey('films', 'category_id', 'categories', 'id_category');

  // foreignKey('orders', 'user_id', 'users', 'id_user');

  // foreignKey('order_details','film_id','films','id_film');


   /*
                          ╔═════════════════════════════════════════════╗
                          ║                                             ║
                          ║                UTILISATEURS                 ║
                          ║                                             ║
                          ╚═════════════════════════════════════════════╝ */


  ################### Fonctions du CRUD pour les utilisateurs ###################

  ################### insertion de l'utilisateur dans la BDD ###################

  function InscriptionUSers(string $lastName, string $firstName, string $pseudo, string $email, string $phone, string $mdp, string $civility, string $birthday, string $address, string $zip, string $city, string $country) : void {

    /* Les requêtes préparée sont préconisées si vous exécutez plusieurs fois la même requête. Ainsi vous évitez au SGBD de répéter toutes les phases analyse / interpretation / exécution de la requête (gain de performance). Les requêtes préparées sont aussi utilisées pour nettoyer les données et se prémunir des injections de type SQL.

        1 - On prépare la requête
        2 - On lie le marqueur à la requête
        3 - On execute la requête
    */

    // Créer un tableau associatif avec les noms des colonnes comme clés
    // Les noms des clés du tableau $data correspondent aux noms des colonnes dans la base de données.
    
    $data = [
      'lastName' => $lastName,
      'firstName' => $firstName,
      'pseudo' => $pseudo,
      'mdp' => $mdp,
      'email' => $email,
      'phone' => $phone,
      'civility' => $civility,
      'birthday' => $birthday,
      'address' => $address,
      'zip' => $zip,
      'city' => $city,
      'country' => $country
  ];

    // Pour échapper les données et les traiter contre les failles JS (XSS)

  foreach ($data as $key => $value) {
    $data[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
  }
    /* 
      htmlspecialchars est une fonction qui convertit les caractères spéciaux en entités HTML. 
      Cela est utilisé afin d'empêcher l'exécution de code HTML ou JavaScript : les attaques XSS (Cross-Site Scripting) injecté par un utilisateur malveillant en échappant les caractères HTML potentiellement dangereux.
      Par défaut, htmlspecialchars échappe les caractères suivants :
        - & (ampersand) devient &amp;
        - < (inférieur) devient &lt;
        - > (supérieur) devient &gt;
        - " (guillemet double) devient &quot;
    
      ENT_QUOTES : est une constante en PHP  qui onvertit les guillemets simples et doubles. => ' (guillemet simple) devient &#039; 
      'UTF-8' : Spécifie que l'encodage utilisé est UTF-8.
    */


    $cnx = connexionBDD();

    $sql =  "INSERT INTO users
            (lastName, firstName, pseudo, email, phone, mdp, civility, birthday, address, zip, city, country) VALUES (:lastName, :firstName, :pseudo, :email, :phone, :mdp, :civility, :birthday, :address, :zip, :city, :country) 
            ";

    $request = $cnx->prepare($sql);  
    // prepare() est une méthode qui permet de préparer la requête sans l'exécuter. Elle contient un marqueur :firstName (entre autre) qui est vide et attend une valeur.
    // $request est à cette ligne encore un objet PDOstatement.

    $request->execute(array(       // Le tableau associatif contient les valeurs échappées à insérer dans la base de données, associées aux paramètres nommés de la requête préparée.
      ":lastName" => $data['lastName'],
      ":firstName" => $data['firstName'],
      ":pseudo" => $data['pseudo'],
      ":email" => $data['email'],
      ":phone" => $data['phone'],
      ":mdp" => $data['mdp'],
      ":civility" => $data['civility'],
      ":birthday" => $data['birthday'],
      ":address" => $data['address'],
      ":zip" => $data['zip'],
      ":city" => $data['city'],
      ":country" => $data['country']
    ));      
      // execute() permet d'executer toute la requête préparée avec prepare()
  }


  ################### Fonctions pour vérifier si un email existe dans la BDD ###################

  function checkEmailUser(string $email) : mixed {

    $cnx = connexionBDD();
    $sql = "SELECT * FROM users WHERE email = :email";

    $request = $cnx->prepare($sql);

    $request->execute(array(
      ':email' => $email
    ));

    $result = $request->fetch(PDO::FETCH_ASSOC);
      /* Le paramètre PDO::FETCH_ASSOC permet de transformer l'objet en un array ASSOCIATIF. On y trouve en indice le nom des champs de la requête SQL.    
        Pour information, on peut mettre dans les parenthèses de fecth() :
          - PDO::FETCH_NUM pour obtenir un tableau aux indices numérique
          - PDO::FETCH_OBJ pour obtenir un dernier objet
          - ou encore des () vides pour obtenir un mélange de tableau associatif et indéxé
     */

     return $result;

  }

  ################### Fonctions pour vérifier si un pseudo existe dans la BDD ###################

  function checkPseudoUser(string $pseudo) : mixed {

    $cnx = connexionBDD();
    $sql = "SELECT * FROM users WHERE pseudo = :pseudo";

    $request = $cnx->prepare($sql);

    $request->execute(array(
      ':pseudo' => $pseudo
    ));

    $result = $request->fetch(PDO::FETCH_ASSOC);
      // On peut éviter de mettre cette constante comme paramètre de la méthode fetch() à chaque fois en la définissant dans la connexion de la BDD par défaut (dans le try de la connexion à la BDD -> voir fonction connexionBdd())
    return $result;
  }

  ################### Fonctions pour vérifier si un user existe dans la BDD ###################

  function checkUser(string $pseudo, string $email) : mixed {

    $cnx = connexionBDD();
    $sql = "SELECT * FROM users WHERE pseudo = :pseudo AND email = :email";

    $request = $cnx->prepare($sql);

    $request->execute(array(
      ':pseudo' => $pseudo,
      ':email' => $email
    ));

    $result = $request->fetch();
      
    return $result;
  }


  ################### Fonctions pour récupérer tout les utilisateurs de la BDD ###################

  function allUsers() {

    $cnx = connexionBDD();
    $sql = "SELECT * FROM users";

    $request = $cnx->query($sql);

    $result = $request->fetchAll();
    // fetchAll() récupère tout les résultats dans la requête et les sort sous forme d'un tableau à 2 dimensions
      
    return $result;
  }

  
  ################### fonction pour supprimer un utilisateur ###################

  function deleteUser(int $id_user) :void{

    $cnx = connexionBDD();

    $sql = "DELETE FROM users WHERE id_user = :id_user";

    $request = $cnx->prepare($sql);

    $request->execute(array(

      ":id_user"=>$id_user
    ));
  }

   ################### fonction pour modifier le role d'un utilisateur ###################

   function modifyRole(int $id_user, string $role) :void {

    $cnx = connexionBDD();

    $sql = "UPDATE users SET role = :role WHERE id_user = :id_user";


    $request = $cnx->prepare($sql);

    $request->execute(array(
      ":role" => $role,
      ":id_user" => $id_user
    ));
  }

   ################### fonction pour modifier les éléments d'un utilisateur ###################

   function modifyUSer(string $lastName, string $firstName, string $pseudo, string $email, string $phone, string $civility, string $birthday, string $address, string $zip, string $city, string $country) {

    $cnx = connexionBDD();

    $sql = "UPDATE users SET  lastName = :lastName, firstName = :firstName, pseudo = :pseudo, email = :email, phone = :phone, civility = :civility, birthday = :birthday, address = :address, zip = :zip, city = :city, country = :country";

    $request = $cnx->prepare($sql);

    $request->execute(array(
      'lastName' => $lastName,
      'firstName' => $firstName,
      'pseudo' => $pseudo,      
      'email' => $email,
      'phone' => $phone,
      'civility' => $civility,
      'birthday' => $birthday,
      'address' => $address,
      'zip' => $zip,
      'city' => $city,
      'country' => $country
    ));
  }

    /*
                          ╔═════════════════════════════════════════════╗
                          ║                                             ║
                          ║                  CATEGORIES                 ║
                          ║                                             ║
                          ╚═════════════════════════════════════════════╝ */


  ################### Fonctions du CRUD pour les catégories ###################


  ################### insertion de la categorie dans la BDD ###################

  function InsertCat(string $nameCat, string $description) : void {
   
    $cnx = connexionBDD();

    $sql =  "INSERT INTO categories
            (name, description) VALUES (:name, :description) 
            ";

    $request = $cnx->prepare($sql);  
  
    $request->execute(array(
      ":name" => $nameCat,
      ":description" => $description
    ));       // execute() permet d'executer toute la requête préparée avec prepare()
  }
  
  ################### Fonctions pour récupérer toute les catégories de la BDD ###################
  
  function allCat() {
    
    $cnx = connexionBDD();
    $sql = "SELECT * FROM categories";
    
    $request = $cnx->query($sql);
    
    $result = $request->fetchAll();
    // fetchAll() récupère tout les résultats dans la requête et les sort sous forme d'un tableau à 2 dimensions
    
    return $result;
  }
  
  ################### Fonctions pour vérifier si une catégorie existe dans la BDD ###################

  function checkCat(string $name) : mixed {

    $cnx = connexionBDD();
    $sql = "SELECT * FROM categories WHERE name = :name";

    $request = $cnx->prepare($sql);

    $request->execute(array(
      ':name' => $name
    ));

    $result = $request->fetch(PDO::FETCH_ASSOC);
     
     return $result;
  }

  function checkCatId(int $id_category) : mixed {

    $cnx = connexionBDD();
    $sql = "SELECT * FROM categories WHERE id_category = :id_category";

    $request = $cnx->prepare($sql);

    $request->execute(array(
      ':id_category' => $id_category
    ));

    $result = $request->fetch(PDO::FETCH_ASSOC);
     
     return $result;
  }

   ################### fonction pour supprimer une catégorie ###################

    function deleteCat(int $id_cat) :void{

      $cnx = connexionBDD();

      $sql = "DELETE FROM categories WHERE id_category = :id_category";

      $request = $cnx->prepare($sql);

      $request->execute(array(

        ":id_category"=>$id_cat
      ));

    }

    ################### fonction pour modifier une catégorie ###################

    function modifyCat(int $id_category, string $name, string $description) : void {

    $cnx = connexionBDD();

    $sql = "UPDATE categories SET  name = :name, description = :description WHERE id_category = :id_category";

    $request = $cnx->prepare($sql);

    $request->execute(array(

      ":id_category"=>$id_category,
      ":name"=>$name,
      ":description"=>$description
    ));
  }


  
    /*
                          ╔═════════════════════════════════════════════╗
                          ║                                             ║
                          ║                    FILMS                    ║
                          ║                                             ║
                          ╚═════════════════════════════════════════════╝ */


  ################### Fonctions du CRUD pour les films ###################


  ################### insertion du film dans la BDD ###################

  function InsertMovie (int $category_id, string $title, string $director, string $actors, string $ageLimit, string $duration, string $synopsis, string $date, string $image, float $price, int $stock) : void {
   

    $data = [
      "category_id" => $category_id,
      "title" => $title,
      "director" => $director,
      "actors" => $actors,
      "ageLimit" => $ageLimit,
      "duration" => $duration,
      "synopsis" => $synopsis,
      "date" => $date,
      "image" => $image,
      "texte_alternatif" => $title,
      "price" => $price,
      "stock" => $stock
  ];

    // Pour échapper les données et les traiter contre les failles JS (XSS)

  foreach ($data as $key => $value) {
    $data[$key] = htmlentities($value);
  }
  
    $cnx = connexionBDD();

    $sql =  "INSERT INTO films
            ( category_id, title, director, actors, ageLimit, duration, synopsis, date, image, texte_alternatif, price, stock) VALUES ( :category_id, :title, :director, :actors, :ageLimit, :duration, :synopsis, :date, :image, :texte_alternatif, :price, :stock) 
            ";

    $request = $cnx->prepare($sql);
  
    $request->execute(array(
      ":category_id" => $data['category_id'],
      ":title" => $data['title'],
      ":director" => $data['director'],
      ":actors" => $data['actors'],
      ":ageLimit" => $data['ageLimit'],
      ":duration" => $data['duration'],
      ":synopsis" => $data['synopsis'],
      ":date" => $data['date'],
      ":image" => $data['image'],
      "texte_alternatif" => 'Affiche du film ' . $data['texte_alternatif'],
      ":price" => $data['price'],
      ":stock" => $data['stock']
    ));      
  }
  
  ################### Fonctions pour récupérer tout les films de la BDD ###################
  
  function allMovies() : mixed {
    
    $cnx = connexionBDD();
    $sql = "SELECT * FROM films";
    
    $request = $cnx->query($sql);
    
    $result = $request->fetchAll();
    // fetchAll() récupère tout les résultats dans la requête et les sort sous forme d'un tableau à 2 dimensions
    
    return $result;
  }

   ################### Fonctions pour récupérer tout les films de la BDD dans l'ordre alphabetique ###################

  function allMoviesOrderAlpha() : mixed {
    
    $cnx = connexionBDD();
    $sql = "SELECT * FROM films ORDER BY title ASC";
    
    $request = $cnx->query($sql);
    
    $result = $request->fetchAll();
    // fetchAll() récupère tout les résultats dans la requête et les sort sous forme d'un tableau à 2 dimensions
    
    return $result;
  }

   ################### Fonctions pour récupérer les films de la BDD suivant leur catégorie ###################

  function filmsByCategory($id) : mixed {

    $cnx = connexionBDD();
    $sql = "SELECT * FROM films WHERE category_id = :id";
    
    $request = $cnx->prepare($sql);

    $request->execute(array(

      ":id"=>$id
    ));

    $result = $request->fetchAll();
      
    return $result;
  }

   ################### fonction pour supprimer un film ###################

   function deleteMovie(int $id_film) :void{

    $cnx = connexionBDD();

    $sql = "DELETE FROM films WHERE id_film = :id_film";

    $request = $cnx->prepare($sql);

    $request->execute(array(

      ":id_film"=>$id_film
    ));

  }

  ################### Fonctions pour vérifier si un film existe dans la BDD ###################

  function verifFilm(string $title, string $date) : mixed {

    $cnx = connexionBDD();
    
    $sql = "SELECT * FROM films WHERE title = :title AND date = :date"; // : est appelé marqueur, paramètres nommés ou paramètres positionnels

    $request = $cnx->prepare($sql);

    $request->execute(array(
      ':title' => $title,
      ':date' => $date
    ));

    $result = $request->fetch();
    
    return $result;
  }

  ################### fonction pour modifier un film ###################

  function modifyMovie(int $id_film, int $category_id, string $title, string $director, string $actors, string $ageLimit, string $duration, string $synopsis, string $date, string $image, float $price, int $stock) : void {

    $cnx = connexionBDD();

    $sql = "UPDATE films SET category_id = :category_id, title = :title, director = :director, actors = :actors, ageLimit = :ageLimit, duration = :duration, synopsis = :synopsis, date = :date, image = :image, price = :price, stock = :stock WHERE id_film = :id_film";

    $request = $cnx->prepare($sql);

    $request->execute(array(
      ":id_film"=>$id_film,
      ":category_id" => $category_id,
      ":title" => $title,
      ":director" => $director,
      ":actors" => $actors,
      ":ageLimit" => $ageLimit,
      ":duration" => $duration,
      ":synopsis" => $synopsis,
      ":date" => $date,
      ":image" => $image,
      ":price" => $price,
      ":stock" => $stock   
    ));

  }


  ################### Fonctions pour afficher un film via son id ###################

  function showFilmViaId( int $id ) {

    $cnx = connexionBDD();
    $sql = "SELECT * FROM films WHERE id_film = :id";

    $request = $cnx->prepare($sql);

    $request->execute(array(
      ":id"=>$id
    ));

    $result = $request->fetch();
      
    return $result;
  }




 /*
                          ╔═════════════════════════════════════════════╗
                          ║                                             ║
                          ║                 PAGE INDEX                  ║
                          ║                                             ║
                          ╚═════════════════════════════════════════════╝ */

  ################### Fonctions pour afficher les 6 films les plus récents ###################

  function filmByDate() : mixed {

    $cnx = connexionBDD();
    $sql = "SELECT * FROM films ORDER BY date DESC LIMIT 6";

    $request = $cnx->query($sql);
    
    $result = $request->fetchAll();
      
    return $result;
  }

   /*
                          ╔═════════════════════════════════════════════╗
                          ║                                             ║
                          ║                 PAGE PANIER                 ║
                          ║                                             ║
                          ╚═════════════════════════════════════════════╝ */
  
  ################### Fonctions pour calculer le montant total du panier ###################

  function calculMontantTotal(array $tab) {
    $montantTotal = 0;

    foreach ($tab as $key) {
      $montantTotal += $key['price'] * $key['quantity'];
    }
    return $montantTotal;
  }

  /*
                          ╔═════════════════════════════════════════════╗
                          ║                                             ║
                          ║                 PAGE SUCCESS                ║
                          ║                                             ║
                          ╚═════════════════════════════════════════════╝ */

  ################### Fonctions pour ajouter la commande dans le profil ###################

  function addOrder(int $user_id, float $price, string $created_at, string $is_paid) :bool{

    $cnx = connexionBdd();
    $sql = "INSERT INTO orders(user_id, price, created_at, is_paid) VALUES (:user_id, :price, :created_at, :is_paid)";

    $request = $cnx->prepare($sql);

    $request->execute(array( 
      ':user_id'     =>$user_id,
      ':price'       =>$price, 
      ':created_at'  =>$created_at, 
      ':is_paid'     =>$is_paid      
    ));

    if($request){
      return true;
    }
  }

  ################### Fonctions pour ajouter la commande dans le profil ###################

  function lastId(): array{

    $cnx = connexionBdd();

    $sql = "SELECT MAX(id_order) AS lastId FROM orders";

    $request= $cnx->query($sql);

    $result= $request->fetch();

    return $result;

  } 

################### Fonctions pour ajouter la commande dans le profil ###################

function addOrderDetails(int $orderId, int $filmId, float $filmPrice, int $quantity) :void{

  $cnx = connexionBdd();
  
  $sql = "INSERT INTO order_details(order_id, film_id, price_film, quantity) VALUES (:order_id, :film_id, :price_film,:quantity)";

  $request = $cnx->prepare($sql);

  $request->execute(array( 
    ':order_id'     => $orderId,
    ':film_id'      => $filmId,
    ':price_film'   => $filmPrice, 
    ':quantity'     => $quantity, 
  ));



}




















 ################### fonction pour récupérer un seul utilisateur ###################



  function showUser(int $id_user) : mixed {

    $cnx = connexionBDD();
    $sql = "SELECT * FROM users WHERE id_user = :id_user";

    $request = $cnx->prepare($sql);

    $request->execute(array(

      ":id_user"=>$id_user
    ));

    $result = $request->fetch();
      
    return $result;
  }
  
  


?>