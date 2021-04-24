<?php
session_start();
include_once("bdd/bddData.php");
include_once("php/verif_connexion.php");




if(isset($_SESSION['user_nom']) || isset($_SESSION['user_email'])){
    $_SESSION['connecter']=true;
}

if(isset($_GET['cat'])){//automatisation de la catégorie


    $req = $BDD->prepare("SELECT * 
                    FROM produits
                    WHERE categorie = ?");
    $req->execute(array($_GET['cat']));
    $categorie=$req->fetchAll();

    $produit=$_GET['cat'];
    $nom_categorie=ucfirst($produit);
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
        <?php 
        if($_SESSION['connecter']==true){
            require_once('php/fonctions.php'); 
        }

        ?>
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

                <h1 class="whats-new"><?php echo $nom_categorie; ?></h1>
                <div class="container">
                    <?php
                    include_once("php/se_connecter.php");
                    ?>
                    <table>
                        <?php
                        $i=1;
                        //var_dump($categorie);
                        foreach($categorie as $key){
                        ?>
                        <tr>
                            <th style='width:110px;'><img id='pic<?=$i?>' src="<?=$key['photo']?>"></th>
                            <th style='width:110px;' id='ref<?=$i?>'><?=$key['ref']?></th>
                            <th style='width:110px;' id='nom_produit<?=$i?>'><?=$key['nom']?></th>
                            <th style='width:110px;' id='prix<?=$i?>'><?=$key['prix']?>€</th>
                            <th style='width:110px;' class='stock'
                                id='qte_max<?=$i?>'><?=$key['qte_stock']?></th>

                            <th>
                                <input id='moins<?=$i?>' type='button' value='-' onclick='moins<?=$i?>()' disabled> <input type='text' id='qte<?=$i?>' value='0'>
                                <input id='plus<?=$i?>' type='button' value='+' onclick='plus<?=$i?>()'><br><br>

                                <input class='AddCart' type='button' value='Ajouter au panier' onclick='<?php if($_SESSION['connecter']==true){echo "add_panier(".$i.")";}
                            else{
                                echo "openForm()";}?>'>

                            </th>
                        </tr>
                        <?php $i++; }?>

                    </table>

                </div>

                <br>
                <button onclick="suppStock()" id="cache-btn">Cacher</button>
                <button onclick="rajouteStock()" style="display: none;" id="rajoute-btn">Dévoiler</button>
                <br>
            </section>

        </div>
        <?php
        include_once("php/footer.php");
        ?>
    </body>
</html>