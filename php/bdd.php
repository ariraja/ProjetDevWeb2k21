<!-- contenant 
les fonctions sécurisées (avec récupération sur erreur) suivantes :
o Connexion : pour se connecter à la base et renvoyant vrai ou faux si erreur
o Deconnexion : pour se déconnecter de la base
o Une fonction par récupération de données nécessaires à votre site et 
renvoyant un tableau des données récupérées ou NULL si la requêtes a 
échoué.-->




<!--
// Déconnexion de la BDD
unset( $exemple ); ou $dbh = null;-->
<?php
   /* public function connexion() {
        return $this->connexion;
    }*/
class connexionDB {
    private $host = 'localhost'; // nom de l'hote
    private $name = 'cyspot'; // nom de la base de donnée
    private $user = 'root';       // utilisateur 
    private $pass = '';       // mot de passe (il faudra peut-être mettre '' sous Windows)
    private $connexion;

    function __construct($host = null, $name = null, $user = null, $pass = null){//constructeur de la classe connexionDB
        if($host != null){
            $this->host = $host;           
            $this->name = $name;           
            $this->user = $user;          
            $this->pass = $pass;
        }
        try{
            $this->connexion = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->name,
                                       $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES UTF8', 
                                                                       PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        }catch (PDOException $e){
            echo 'Erreur : Impossible de se connecter  à la BDD !';
            die();
        }
    }
    public function connexion() {
        return $this->connexion;
    }
    public function deconnexion(){
        $this->connexion = null;
        return $this->connexion;
    }
}
?>