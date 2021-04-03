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
        <link rel="stylesheet" type="text/css" href="css/contact.css">
        <link rel="icon" type="image/png" sizes="18
                                                 5x15" href="img/miniature.png">
        <script type="text/javascript" src="js/contact.js"></script>
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

            <section class="form-section">
                <br><br/>
                
                <?php
                include_once("php/se_connecter.php");
                ?>
                
                <h1>Demande de contact</h1>
                <div class="form-style">
               <?php
                    echo "Envoi effectué ! Un mail de vérification a été envoyé au webmaster.";
                    ?>
                </div>
            </section>
        </div>
        
        <?php
        include_once("php/footer.php");
        ?>

    </body>
</html>