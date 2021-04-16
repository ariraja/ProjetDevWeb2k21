<?php
session_start();
include_once("php/varSession.inc.php");

if(isset($_SESSION['user_nom']) || isset($_SESSION['user_email'])){
    $_SESSION['connecter']=true;
}


if($_GET['cat']=='burger'){
    $categorie=$_SESSION['categorie']->burger;
    $nom_categorie="Burger";
}
if($_GET['cat']=='poulet'){
    $categorie=$_SESSION['categorie']->poulet;
    $nom_categorie="Poulet";
}
if($_GET['cat']=='pizza'){
    $categorie=$_SESSION['categorie']->pizza;
    $nom_categorie="Pizza";
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

                    <?php

                    echo "<table>";
                    $i=1;
                    foreach($categorie as $key){
                        echo "<tr>";

                        echo "<th style='width:110px;'><img id='pic".$i."' src=".$key->photo."></th>";
                        echo "<th style='width:110px;' id='ref".$i."'>".$key->ref."</th>";
                        echo "<th style='width:110px;' id='nom_produit".$i."'>".$key->nom."</th>";
                        echo "<th style='width:110px;' id='prix".$i."'>".$key->prix."€</th>";
                        echo "<th style='width:110px;' class='stock'
                            id='qte_max".$i."'>".$key->quantite."</th>";


                        if($_SESSION['connecter']==true){
                            echo"<th><input id='moins".$i."' type='button' value='-' onclick='moins".$i."()' disabled> <input type='text' id='qte".$i."' value='0'> <input id='plus".$i."' type='button' value='+' onclick='plus".$i."()'><br><br><input class='AddCart' type='button' value='Ajouter au panier'  onclick='add_panier(".$i.")'></th>";
                        }
                        else{
                            echo"<th><input id='moins".$i."' type='button' value='-' onclick='moins".$i."()' disabled> <input type='text' id='qte".$i."' value='0'> <input id='plus".$i."' type='button' value='+' onclick='plus".$i."()'><br><br><input class='AddCart' type='button' value='Ajouter au panier'></th>";
                        }

                        echo "</tr>";
                        $i++;
                    }

                    echo "</table>";

                    ?>

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