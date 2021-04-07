<?php
session_start();
include_once("php/varSession.inc.php");
?>


<!DOCTYPE html>
<html>
    <head>
        <title>CY SPOT 😋</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" media="all and (max-width:640px)" href="css/index.css"/>
        <link rel="stylesheet" media="all and (max-width:862px)" href="css/index.css"/>
        <link rel="stylesheet" media="all and (max-width:712px)" href="css/index.css"/>
        <link rel="icon" type="image/png" sizes="18
                                                 5x15" href="img/miniature.png">
        <script type="text/javascript" src="js/index.js"></script>
    </head>
    <body>

        <?php
        include_once("php/header.php");
        ?>

        <!--    Menu latéral    -->

        <div class="main-content">

            <!--    Contenu principal    -->
            <?php
            include_once("php/menu_contextuel.php");
            ?>


            <section class="main-section">

                <?php
                include_once("php/se_connecter.php");
                ?>
                <div class="whats-new">
                    <img src="img/WHATS%20NEW.png">
                </div>
                <div class="search"><input type="search" placeholder="Recherchez un produit..."/><button class="search_btn">🔍</button></div>
                <article class="new_pizza">
                    <h2>Nouveauté Pizza à édition limité</h2>
                    <p>La Pepperoni</p>
                    <p>à 9.99€ TTC</p>
                    <p>Disponible jusqu'au 27/06/2021</p>
                    <p>Commandez sur notre site et vous faire livrer</p>
                    <a href="produits.php?cat=pizza"><button type="button" class="btn-article">
                        <span>Je commande</span></button></a>
                </article>
                <br><br/>
                <article class="new_burger">
                    <h2>Testez nos variétés de burgers</h2>
                    <p>A découvrir mtn</p>
                    <p>à partir de 4.99€ TTC</p>
                    <p>5 burgers à découvrir</p>
                    <p>Commandez sur notre site et vous faire livrer</p>
                    <a href="produits.php?cat=burger"><button type="button" class="btn-article">
                        <span>Je commande</span></button></a>
                </article>
                <br><br/>
                <article class="new_poulet">
                    <h2>Savourez l'authenticité de nos poulets</h2>
                    <p>A découvrir mtn</p>
                    <p>à partir de 6.99€ TTC</p>
                    <p>Poulets élevés en Farnce</p>
                    <p>Commandez sur notre site et vous faire livrer</p>
                    <a href="produits.php?cat=poulet"><button type="button" class="btn-article">
                        <span>Je commande</span></button></a>
                </article>
            </section>
        </div><br>

        <?php
        include_once("php/footer.php");
        ?>

    </body>
</html>

