<?php
session_start();

include_once("php/varSession.inc.php");//utile pour l'ajout d'article

include_once('php/fonctions.php');

//var_dump($_SESSION);
//var_dump($user);

if(isset($_GET['pic'])&&isset($_GET['ref'])&&isset($_GET['nom'])&&isset($_GET['prix'])&& isset($_GET['qte']) ){
    
    $pic=$_GET['pic'];
    $ref=$_GET['ref'];
    $nom=$_GET['nom'];
    $prix=$_GET['prix'];
    $qte=$_GET['qte'];

    ajout_panier($pic,$ref,$nom,$prix,$qte);
    
    //test save panier
    
  /*  $file= fopen("data/user.txt","r+");//ajout produit dans le fichier
    $content_txt = file_get_contents('data/user.txt');
    $find = '[';
    $user_txt = explode(";",trim($content_txt," \n\r\t\v\0"));
    
    foreach($user as $u){
        if(in_array($_SESSION['user_id']),$u){
            implode('|',$u['panier']);
        }
    }*/
    
    /*foreach($user_txt as $ut){
        $pos = strpos($ut, $find);//position du panier pour chaque utilisateur
        $ut[$pos]='['.$ref.$prix.$qte.']';//remplace la chaine
        
        fseek($file, $pos);
        fwrite($file,$maj);
        
    } 
    fclose($file);*/
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

                    <?php

                    echo "<table>";
                    $i=1;
                    foreach($_SESSION['panier'] as $article){


                        echo "<tr>";

                        echo "<th style='width:110px;'><img id='pic' src=".$article['photo']."></th>";
                        echo "<th style='width:110px;' id='ref".$i."'>".$article['ref']."</th>";
                        echo "<th style='width:110px;' id='nom_produit".$i."'>".$article['nom']."</th>";
                        echo "<th style='width:110px;' id='prix".$i."'>".$article['prix']."</th>";
                        echo "<th style='width:110px;' class='stock'
                            >".$article['qte']."</th>";
                        
                        echo "<th><input id='delete".$i."' type='button' value='Supprimer article' onclick='delete_panier(".$i.")'></th>";

                        echo "</tr>";

                        $i++;
                    }

                    echo "</table>";

                    ?>

                </div>
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