<!-- variables de connexion à la base -->
<?php
include_once("bdd.php");
/*variable de connexion*/
$DB = new connexionDB;
$BDD = $DB->connexion();
?>


<!--closeCursor() utile ap chaque requête-->