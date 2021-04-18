<?php
session_start();

if(isset($_SESSION['user_nom']) || isset($_SESSION['user_email'])) {//sécurité
    $_SESSION['connecter']=true;
} else {
    header('Location: index.php');
    exit;
} 

include_once("php/varSession.inc.php");//utile pour l'ajout d'article
include_once('php/fonctions.php');
include_once("php/bddData.php");


if(isset($_GET['pic'])&&isset($_GET['ref'])&&isset($_GET['nom'])&&isset($_GET['prix'])&&isset($_GET['qte'])&&isset($_GET['qte_max'])){

    $ok=true;

    $pic=$_GET['pic'];
    $ref=$_GET['ref'];
    $nom=$_GET['nom'];
    $prix=(int)$_GET['prix'];
    $qte_max=$_GET['qte_max'];
    $qte=$_GET['qte'];
    $qte=(int)$qte;
    $qte_max=(int)$qte_max;


    $req = $BDD->prepare("SELECT * FROM panier WHERE user_id = ? AND produit_id=?");
    $req->execute(array($_SESSION['user_email'],$ref));
    $verif_panier = $req->fetch();


    if(isset($verif_panier['id_panier'])){//si produit déjà dans panier
        if($verif_panier['qte_produit']+$qte>$qte_max){//si on a trop pris dans le panier
            $err_qte="Quantité maximale atteinte";
        }
        else{
            $verif_panier['qte_produit']+=$qte;//cumule quantité
            $req = $BDD->prepare("UPDATE panier SET qte_produit = ? WHERE user_id = ? AND produit_id=?");
            $req->execute(array($verif_panier['qte_produit'],$_SESSION['user_email'],$ref));
        }
        $ok=false;
    }

    if($ok){//si on n'a pas trouvé ajoute au panier
        $req = $BDD->prepare("INSERT INTO panier (user_id,produit_id,qte_produit) VALUES (?,?,?)");
        $req->execute(array($_SESSION['user_email'],$ref,$qte));
        //ajout_panier($pic,$ref,$nom,$prix,$qte);
    }
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title>CY SPOT 😋</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/burger.css">
        <link rel="icon" type="image/png" sizes="18
                                                 5x15" href="img/miniature.png">
        <script type="text/javascript" src="js/burger.js"></script>
        <script type="text/javascript" src="js/index.js"></script>

    </head>
    <body>
        <?php
        include_once("php/header.php");
        ?>


        <!--    Contenu principal    -->

        <div class="main-content">

            <?php
            include_once("php/menu_contextuel.php");
            ?>
            <section class="main-section">

                <h1 class="whats-new">Mon panier</h1>
                <div class="container">
                    <table>
                        <?php 
                        $req1 = $BDD->prepare("SELECT * 
                    FROM produits pr, panier pa 
                    WHERE pr.ref = pa.produit_id AND pa.user_id = ?");
                        $req1->execute(array($_SESSION['user_email']));
                        $panier=$req1->fetchAll();
                        //var_dump($_SESSION['user_email']);
                        //var_dump($panier);
                        $i=1;

                        $prix_total=0;
                        $nb_article=0;
                        foreach($panier as $article){
                        ?>
                        <tr>
                            <th style='width:110px;'><img id='pic<?=$i?>' src="<?=$article['photo']?>"></th>
                            <th style='width:110px;' id='ref<?=$i?>'><?=$article['produit_id']?></th>
                            <th style='width:110px;' id='nom_produit<?=$i?>'><?=$article['nom']?></th>
                            <th style='width:110px;' id='prix<?=$i?>'><?=$article['prix']?>€</th>
                            <th style='width:110px;' class='stock'><?=$article['qte_produit']?></th>
                            <th style='width:110px;' class='prix_article<?=$i?>'>=<?=$article['qte_produit']*$article['prix']?>€</th>
                            <th>
                                <?php if(isset($err_qte)){
                            echo"<span style='color:red'>".$err_qte."</span>";
                        }
                                ?>
                                <input id='delete<?=$i?>' type='button' value='Supprimer article' onclick='delete_panier(<?=$i?>)'>
                            </th>
                        </tr>
                        <?php    $i++;
                            $prix_total+=$article['qte_produit']*$article['prix'];
                            $nb_article+=$article['qte_produit'];
                        } ?>
                    </table>
                </div>
                <h3 style="font-family: calibri;
                           font-weight: bold;">Montant total à payer : 
                    <?php
                    echo $prix_total."€ pour ".$nb_article." article(s) ajouté(s) au total.";
                    ?></h3>
                <br>
                <input type="submit" value="Commander">
                <br>
            </section>

        </div>
        <?php
        include_once("php/footer.php");
        ?>
    </body>
</html>