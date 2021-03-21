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
                <form method="post" id="monForm" action="envoi.html" onsubmit="return Verif()">
                   <br><br/>
                    <label for="contact_date">Date du contact :</label>
                    <input type="date" id="contact_date" name="contact_date"><br><br/>

                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" id="nom" placeholder="Entrez vote nom">
                    <span id="nom_manquant"></span>
                    <br><br/>

                    <label for="prenom">Prénom :</label>
                    <input type="text" name="prenom" id="prenom" placeholder="Entrez vote prénom">
                    <span id="prenom_manquant"></span>
                    <br><br/>

                    <label for="email">Email :</label>
                    <input type="email" name="mail" id="mail" placeholder="Entrez vote email">
                    <span id="mail_manquant"></span>
                    <br><br/>

                    <label for="genre">Genre :</label>
                    <input type="radio" name="genre" value="H" checked> Femme <input type="radio" name="genre" value="F"> Homme<br><br/>

                    <label for="naissance_date">Date de naissance :</label>
                    <input type="date" id="naissance_date" name="naissance_date">
                    <span id="date_manquant"></span><br><br/>

                    <label for="fonction">Fonction :</label>
                    <select name="fonction">
                        <option>Cadre</option>
                        <option>Directeur</option>
                        <option>Enseignant</option>
                        <option>Etudiant</option>
                        <option>Ouvrier</option>
                        <option  selected>Autre</option>
                    </select><br><br/>

                    <label for="objet">Objet :</label>
                    <input type="text" name="objet" id="objet" placeholder="Entrez l'objet de votre mail">
                    <span id="objet_manquant"></span><br><br/>

                    <label for="contenu">Contenu :</label>
                    <textarea id="contenu" name="contenu" placeholder="Entrez du contenu dans votre mail"></textarea>
                    <span id="contenu_manquant"></span><br><br/>

                    <input type="submit" id="submit" class="submit" value="Envoyer">
                    <br><br/>
                </form>
                </div>
            </section>
        </div>
        
        <?php
        include_once("php/footer.php");
        ?>

    </body>
</html>