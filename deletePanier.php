<?php
session_start();

include_once("php/bddData.php");
//require_once('php/fonctions.php');

if(isset($_GET['ref'])){
    $ref=$_GET['ref'];
    //supp_panier($ref);
    $ok=true;
    
    $req = $BDD->prepare("SELECT id_panier
                            FROM panier
                            WHERE produit_id = ? AND user_id = ? ");
    $req->execute(array($ref,$_SESSION['user_email']));
    $p = $req->fetch();
 

    if(!isset($p['id_panier'])){
        $ok = false;
        echo "Ce produit n'est pas dans le panier";
    }
    
    if($ok){
        $req = $BDD->prepare("DELETE FROM panier 
 WHERE produit_id = ? AND user_id = ?"); 
    $req->execute(array($ref,$_SESSION['user_email']));
    }
}
?>