<?php
session_start();


if(!empty($_POST)){
    $ok=true;

    if(isset($_POST['submit'])){

        $_POST['contact_date']=date("Y-m-d");
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $mail=$_POST['mail'];
        $naiss=$_POST['naissance_date'];
        $obj=$_POST['objet'];
        $contenu=$_POST['contenu'];

        //Vérification nom
        if(empty($nom)){
            $ok=false;
            $err_nom="Entrez votre nom !";
        }
        else if(!ctype_alpha($nom)){
            $ok=false;
            $err_nom="Le nom ne doit pas contenir de chiffres ou de caractères spéciaux !";
        }

        //Vérification prenom
        if(empty($prenom)){
            $ok=false;
            $err_prenom="Entrez votre prénom !";
        }
        else if(!ctype_alpha($prenom)){
            $ok=false;
            $err_prenom="Le prénom ne doit pas contenir de chiffres ou de caractères spéciaux !";
        }

        //Vérification mail
        if(empty($mail)){
            $ok=false;
            $err_mail="Entrez votre email !";
        }
        else if(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
            $ok=false;
            $err_mail="Le mail doit s'écrire comme sous cette forme : monmail@mail.com";
        }

        //Vérification date
        function isValid($date, $format = 'Y-m-d'){//vérifie format date
            $dt = DateTime::createFromFormat($format, $date);
            return $dt && $dt->format($format) === $date;
        }

        if(empty($naiss)){
            $ok=false;
            $err_naiss="Entrez votre date de naissance !";
        }
        else if(!isValid($naiss)){
            $ok=false;
            $err_naiss="La date doit s'écrire comme sous cette forme : dd/mm/aaaa";
        }

        //Vérification objet
        if(empty($obj)){
            $ok=false;
            $err_obj="Entrez un objet !";
        }

        //Vérification contenu
        if(empty($contenu)){
            $ok=false;
            $err_contenu="Entrez du contenu !";
        }



        if($ok){//si toout est bon
            $_SESSION['contact_date']=date("Y-m-d");
            $_SESSION['nom']=$nom;
            $_SESSION['prenom']=$prenom;
            $_SESSION['mail']=$mail;
            $_SESSION['naissance_date']=$naiss;
            $_SESSION['objet']=$obj;
            $_SESSION['contenu']=$contenu;
            
            ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            
            $destinataire='arihoela@gmail.com';
            $header='From : cyspot@eisti.eu';
            $message="Bonjour ".$nom." ".$prenom.", \n"."Vous êtes né le ".$naiss." et vous avez evoyé le message suivant : \n".$contenu;
            
            mail($destinataire, $obj, $message, $header);
            header('Location: envoi.php');
            exit;
        }
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
                    <form method="post">
                        <!--                <form method="post" action="envoi.php" onsubmit="return Verif()">-->
                        <br><br/>
                        <label for="contact_date">Date du contact :</label>
                        <input type="date" id="contact_date" name="contact_date"><br><br/>

                        <label for="nom">Nom :</label>
                        <input type="text" name="nom" id="nom" placeholder="Entrez vote nom">
                        <?php
                        if(isset($err_nom)){
                            echo"<span style='color:red'>".$err_nom."</span>";

                        }

                        ?>
                        <br><br/>

                        <label for="prenom">Prénom :</label>
                        <input type="text" name="prenom" id="prenom" placeholder="Entrez vote prénom">
                        <?php
                        if(isset($err_prenom)){
                            echo"<span style='color:red'>".$err_prenom."</span>";
                        }

                        ?>
                        <br><br/>

                        <label for="email">Email :</label>
                        <input type="email" name="mail" id="mail" placeholder="Entrez vote email">
                        <?php
                        if(isset($err_mail)){
                            echo"<span style='color:red'>".$err_mail."</span>";
                        }

                        ?>
                        <br><br/>

                        <label for="genre">Genre :</label>
                        <input type="radio" name="genre" value="H" checked> Femme <input type="radio" name="genre" value="F"> Homme<br><br/>

                        <label for="naissance_date">Date de naissance :</label>
                        <input type="date" id="naissance_date" name="naissance_date">
                        <?php
                        if(isset($err_naiss)){
                            echo"<span style='color:red'>".$err_naiss."</span>";

                        }

                        ?>
                        <br><br/>

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
                        <?php
                        if(isset($err_obj)){
                            echo"<span style='color:red'>".$err_obj."</span>";

                        }

                        ?>
                        <br><br/>

                        <label for="contenu">Contenu :</label>
                        <textarea id="contenu" name="contenu" placeholder="Entrez du contenu dans votre mail"></textarea>
                        <?php
                        if(isset($err_contenu)){
                            echo"<span style='color:red'>".$err_contenu."</span>";

                        }

                        ?>
                        <br><br/>

                        <input type="submit" name="submit" id="submit" class="submit" value="Envoyer">
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