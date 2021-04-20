<?php
$_SESSION['connecter']=false;
if(isset($_SESSION['user_nom']) || isset($_SESSION['user_email'])){//évite qu'un connecté s'inscrit
    $_SESSION['connecter']=true;
}
?>