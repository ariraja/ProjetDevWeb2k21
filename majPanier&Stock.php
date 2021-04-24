<?php
session_start();

include_once("bdd/bddData.php");

if(!empty($_GET)){
    $ok=true;
    
    if(isset($_GET['ok'])){
        
        $req = $BDD->prepare("SELECT * 
                    FROM panier
                    WHERE user_id = ?");
        $req->execute(array($_SESSION['user_email']));
        $verif_panier=$req->fetch();
        
        if(empty($verif_panier)){//si le panier est vide on ne peut pas commander
            $ok=false;
        }
        
        if($ok){
            //requête pour insérer une commande
            $req=$BDD->prepare("INSERT INTO commande(user_id,produit_id,prix,qte_produit)
SELECT pa.user_id,pr.ref,pr.prix,pa.qte_produit
FROM produits pr, panier pa 
WHERE pr.ref = pa.produit_id AND pa.user_id = ?");
            $req->execute(array($_SESSION['user_email']));
            
            //modifie stock des produits après commande
            $req = $BDD->prepare("DELETE FROM panier 
 WHERE user_id = ?"); 
    $req->execute(array($_SESSION['user_email']));
            $req = $BDD->prepare("UPDATE produits
            JOIN commande ON commande.produit_id=produits.ref
            SET produits.qte_stock = produits.qte_stock-commande.qte_produit WHERE user_id = ?");
            $req->execute(array($_SESSION['user_email']));
            
             //supprime panier après commande
            $req = $BDD->prepare("DELETE FROM panier 
 WHERE user_id = ?"); 
    $req->execute(array($_SESSION['user_email']));

        }
    }
}
?>