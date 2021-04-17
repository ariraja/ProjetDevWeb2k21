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


if(isset($_GET['pic'])&&isset($_GET['ref'])&&isset($_GET['nom'])&&isset($_GET['prix'])&& isset($_GET['qte'])&& isset($_GET['qte_max']) ){

    $pic=$_GET['pic'];
    $ref=$_GET['ref'];
    $nom=$_GET['nom'];
    $prix=(int)$_GET['prix'];
    $qte_max=$_GET['qte_max'];
    $qte=$_GET['qte'];

    $qte_max=(int)$qte_max;
    $qte=(int)$qte; 
    $trouve=false;
    
   /*
    for($i=0;$i<count($_SESSION['panier'])+1;$i++){
        if($ref==$_SESSION['panier'][$i]['ref']){//si produit déjà dans panier
            if((int)$_SESSION['panier'][$i]['qte']+$qte>$qte_max){//si on a trop pris dans le panier
                $err_qte="Quantité maximale atteinte";
                $trouve=true;
                break;
            }
            else{
                $_SESSION['panier'][$i]['qte']+=$qte;//cumule quantité
                $trouve=true;
                break;
            }
        }
        else{
            $trouve=false;
        }
    }
    */
    
    $req = $BDD->prepare("SELECT id_panier, qte_produit FROM panier WHERE id_panier = ?");
    $req->execute(array($_SESSION['user_email']));
    $verif_panier = $req->fetch();
    
    if(isset($verif_panier['id_panier']){//si produit déjà dans panier
            if($verif_panier['qte_produit']+$qte>$qte_max){//si on a trop pris dans le panier
                $err_qte="Quantité maximale atteinte";
                $trouve=true;
                break;
            }
            else{
                $verif_panier['qte_produit']+=$qte;//cumule quantité
                $req = $BDD->prepare("UPDATE panier SET qte_produit = ? WHERE id_panier = ?");
                $req->execute(array($verif-panier['qte_produit'],$_SESSION['user_email']));
                $trouve=true;
                break;
            }
        }
        else{
            $trouve=false;
        }
    
    
    if($trouve==false){//si on n'a pas trouvé ajoute au panier
        $req = $BDD->prepare("INSERT INTO panier (id_panier,user_id,produit_id,qte_produit) VALUES (?,?,?)");
    $req->execute(array($_SESSION['user_email'],$_SESSION['user_email'],$ref,$qte));
        ajout_panier($pic,$ref,$nom,$prix,$qte);
    }


$prix_total=0;
$nb_article=0;
/*for($i=0;$i<count($_SESSION['panier']);$i++){//calcul montant panier
    $prix_total+=$_SESSION['panier'][$i]['qte']*$_SESSION['panier'][$i]['prix'];
    $nb_article+=$_SESSION['panier'][$i]['qte'];
}*/



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
                        $i=1;
                    foreach($_SESSION['panier'] as $article){
                        ?>
                      <tr>

                        <th style='width:110px;'><img id='pic' src="<?=$article['photo']?>"></th>
                        <th style='width:110px;' id='ref<?=$i?>'><?=$article['ref']?></th>
                        <th style='width:110px;' id='nom_produit<?=$i?>'><?=$article['nom']?></th>
                        <th style='width:110px;' id='prix<?=$i?>'><?=$article['prix']?>€</th>
                        <th style='width:110px;' class='stock'><?=$article['qte']?></th>
                        <th style='width:110px;' class='prix_article<?=$i?>'>=<?=$article['qte']*$article['prix']?>€</th>

                       <th>
                        <?php if(isset($err_qte)){
                            echo"<span style='color:red'>".$err_qte."</span><input id='delete".$i."' type='button' value='Supprimer article' onclick='delete_panier(".$i.")'>";
                        }  
                        else{
                            echo "<input id='delete".$i."' type='button' value='Supprimer article' onclick='delete_panier(".$i.")'>";
                        }?>
                        </th>
                    </tr>
                    <?php    $i++;
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