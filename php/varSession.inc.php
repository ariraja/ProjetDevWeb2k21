<?php
$_SESSION['user']="visiteur";
include_once("php/bddData.php");
$_SESSION['id']=rand(0,50);


$_SESSION['connecter']=false;
if(isset($_SESSION['user_nom']) || isset($_SESSION['user_email'])  ) {//on vérifie si on est connecté ou pas
    $_SESSION['connecter']=true;
}

?>