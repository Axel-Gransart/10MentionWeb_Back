
  <!-- Fichier qui contient les fonctions php à utiliser dans notre site -->

  <?php

    session_start();


    ///////////////////////////////////////////////////// constante pour définir le chemin du site ///////////////////////////////////////



    // constante qui définit les dossiers dans lesquels se situe le site pour pouvoir déterminer des chemins absolus à partir de localhost (on ne prends localhost). Ainsi nous écrivons tout les chemins (exp : src, href ) en absolu avec cette constante

    // define('RACINE_SITE', "/10MentionWeb_Back/02_php/site_cinema/");
    define('RACINE_SITE', "http://10mentionweb_back.local/02_php/site_cinema/");


    ################### Fonction pour debuger ###################

    function debug($var) {
      echo '<pre class="border border-dark bg-light text-primary w-50 p-3">';
        var_dump($var);
      echo '</pre>';
    }

    ################### Fonction d'alert ###################

    function alert(string $contenu, string $class) {

      return "<div class=\"alert alert-$class alert-dismissible fade show text-center w-50 m-auto mb-5\" role=\"alert\">
                $contenu
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
              </div>";
    }


    ################### Fonction pour la déconnexion ###################

    function logOut() {
      if (isset($_GET['action']) && $_GET['action'] == "deconnexion") {
        
        unset($_SESSION['user']);
        header('location:index.php');
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

  ################### Fonctions du CRUD pour les utilisateurs ###################

  // Inscription 

  function InscriptionUSers(string $lastName, string $firstName, string $pseudo, string $email, string $phone, string $mdp, string $civility, string $birthday, string $address, string $zip, string $city, string $country) : void {

    /* Les requêtes préparée sont préconisées si vous exécutez plusieurs fois la même requête. Ainsi vous évitez au SGBD de répéter toutes les phases analyse / interpretation / exécution de la requête (gain de performance). Les requêtes préparées sont aussi utilisées pour nettoyer les données et se prémunir des injections de type SQL.

        1 - On prépare la requête
        2 - On lie le marqueur à la requête
        3 - On execute la requête
    */

    $cnx = connexionBDD();

    $sql =  "INSERT INTO users
            (lastName, firstName, pseudo, email, phone, mdp, civility, birthday, address, zip, city, country) VALUES (:lastName, :firstName, :pseudo, :email, :phone, :mdp, :civility, :birthday, :address, :zip, :city, :country) 
            ";

    $request = $cnx->prepare($sql);  
    // prepare() est une méthode qui permet de préparer la requête sans l'exécuter. Elle contient un marqueur :firstName (entre autre) qui est vide et attend une valeur.
    // $requet est à cette ligne encore un objet PDOstatement.

    $request->execute(array(
      ":lastName" => $lastName,
      ":firstName" => $firstName,
      ":pseudo" => $pseudo,
      ":email" => $email,
      ":phone" => $phone,
      ":mdp" => $mdp,
      ":civility" => $civility,
      ":birthday" => $birthday,
      ":address" => $address,
      ":zip" => $zip,
      ":city" => $city,
      ":country" => $country 
    ));       // execute() permet d'executer toute la requête préparée avec prepare()
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

  
  //////////////////////////////// fonction pour supprimer un utilisateur //////////////////////////////////////////

  function deleteUser(int $id_user) :void{

    $cnx = connexionBDD();

    $sql = "DELETE FROM users WHERE id_user = :id_user";

    $request = $cnx->prepare($sql);

    $request->execute(array(

      ":id_user"=>$id_user
    ));
  }


  ################### Fonctions du CRUD pour les catégories ###################

  // insertion categories 

  function InsertCat(string $name, string $description) : void {
   
    $cnx = connexionBDD();

    $sql =  "INSERT INTO categories
            (name, description) VALUES (:name, :description) 
            ";

    $request = $cnx->prepare($sql);  
  
    $request->execute(array(
      ":name" => $name,
      ":description" => $description
    ));       // execute() permet d'executer toute la requête préparée avec prepare()
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



  ################### Fonctions pour récupérer toute les catégories de la BDD ###################

  function allCat() {

    $cnx = connexionBDD();
    $sql = "SELECT * FROM categories";

    $request = $cnx->query($sql);

    $result = $request->fetchAll();
    // fetchAll() récupère tout les résultats dans la requête et les sort sous forme d'un tableau à 2 dimensions
      
    return $result;
  }

   //////////////////////////////// fonction pour supprimer une catégorie //////////////////////////////////////////

   function deleteCat(int $id_category) :void{

    $cnx = connexionBDD();

    $sql = "DELETE FROM categories WHERE id_category = :id_category";

    $request = $cnx->prepare($sql);

    $request->execute(array(

      ":id_category"=>$id_category
    ));
  }







  function viewUser( int $idUser) {

    $cnx = connexionBDD();
    $sql = "SELECT * FROM users WHERE id_user = $idUser";

    $request = $cnx->prepare($sql);

    $result = $request->fetch();
      
    return $result;

  }
  
  


?>