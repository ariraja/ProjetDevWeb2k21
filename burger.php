<?php
    session_start();

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
                
                <h1 class="whats-new">Burger</h1>
                <div class="container">
                    <?php
                include_once("php/se_connecter.php");
                ?>

                    <table>

                        <tr>
                            <th style="width:110px;"><img src="img/burger_hamburger.jpg"></th>
                            <th style="width:70px;">burger01</th>
                            <th style="width:70px;">Hamburger</th>
                            <th style="width:70px;">5€</th>
                            <th style="width:70px;" class="stock">10</th>
                            <th><input id="moins1" type="button" value="-" onclick="moins1()" disabled> <input type="text" id="qte1" value="0"> <input id="plus1" type="button" value="+" onclick="plus1()"><br><br><input class="AddCart" type="button" value="Ajouter au panier"> </th>
                        </tr>
                        <tr>
                            <th style="width:110px;"><img src="img/cheeseburger.png"></th>
                            <th style="width:70px;">burger02</th>
                            <th style="width:70px;">Cheese Burger</th>
                            <th style="width:70px;">5€</th>
                            <th style="width:70px;" class="stock">10</th>
                            <th><input id="moins2" type="button" value="-" onclick="moins2()" disabled> <input type="text" id="qte2" value="0"> <input id="plus2" type="button" value="+" onclick="plus2()"><br><br><input class="AddCart" type="button" value="Ajouter au panier"> </th>
                        </tr>
                        <tr>
                            <th style="width:110px;"><img src="img/burger_cheesebacon.jpg"></th>
                            <th style="width:70px;">burger03</th>
                            <th style="width:70px;">Cheese Bacon</th>
                            <th style="width:70px;">6€</th>
                            <th style="width:70px;" class="stock">10</th>
                            <th><input id="moins3" type="button" value="-" onclick="moins3()" disabled> <input type="text" id="qte3" value="0"> <input id="plus3" type="button" value="+" onclick="plus3()"><br><br><input class="AddCart" type="button" value="Ajouter au panier"> </th>
                        </tr>
                        <tr>
                            <th style="width:110px;"><img src="img/burger_doublecheese.jpg"></th>
                            <th style="width:70px;">burger04</th>
                            <th style="width:70px;">Double Cheese</th>
                            <th style="width:70px;">6€</th>
                            <th style="width:70px;" class="stock">10</th>
                            <th><input id="moins4" type="button" value="-" onclick="moins4()" disabled> <input type="text" id="qte4" value="0"> <input id="plus4" type="button" value="+" onclick="plus4()"><br><br><input class="AddCart" type="button" value="Ajouter au panier"> </th>
                        </tr>
                        <tr>
                            <th style="width:110px;"><img src="img/burger_bigmac.jpg"></th>
                            <th style="width:70px;">burger05</th>
                            <th style="width:70px;">Big Mac</th>
                            <th style="width:70px;">7€</th>
                            <th style="width:70px;" class="stock">10</th>
                            <th><input id="moins5" type="button" value="-" onclick="moins5()" disabled> <input type="text" id="qte5" value="0"> <input id="plus5" type="button" value="+" onclick="plus5()"><br><br><input class="AddCart" type="button" value="Ajouter au panier"> </th>
                        </tr>
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