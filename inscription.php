<?php
session_start();
include_once("bdd/bddData.php");


$_SESSION['connecter']=false;

if(isset($_SESSION['user_nom']) || isset($_SESSION['user_email'])){//évite qu'un connecté s'inscrit
    header('Location: dashboard.php');
    exit;
} 


if(!empty($_POST['sinscrire'])){
    $ok=true;

    if(isset($_POST['sinscrire'])){

        $nom=$_POST['new_nom'];
        $email=$_POST['new_mail'];
        $mdp=$_POST['new_mdp'];


        //Vérification nom
        if(empty($nom)){
            $ok=false;
            $erreur_nom="Entrez votre nom !";
        }
        else if(!ctype_alnum($nom)){
            $ok=false;
            $erreur_nom="Le nom ne doit pas contenir de caractères spéciaux !";
        }
        $req = $BDD->prepare("SELECT nom 
                            FROM user
                            WHERE nom = ?");
        $req->execute(array($nom));
        $verif_nom = $req->fetch();
            
        if(isset($verif_nom['nom'])){
            $ok = false;
            $erreur_nom = "Ce nom est déjà pris ! Choississez-en un autre.";
        }
        

        //Vérification mail
        if(empty($email)){
            $ok=false;
            $erreur_email="Entrez votre email !";
        }
        else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $ok=false;
            $erreur_email="Le mail doit s'écrire comme sous cette forme : monmail@mail.com";
        }
        
        $req = $BDD->prepare("SELECT login
                            FROM user
                            WHERE login = ?");
        $req->execute(array($email));
        $verif_login = $req->fetch();
            
        if(isset($verif_login['login'])){
                $ok = false;
                $erreur_email = "Cet e-mail existe déja !";
        }
        
        //Vérification mdp
        if(empty($mdp)){
            $ok=false;
            $erreur_mdp="Entrez votre mot de passe !";
        }

        //si email et mdp valides
        if($ok){
            $req = $BDD->prepare("INSERT INTO user (login,mdp,nom) VALUES (?, ?, ?)");
            $req->execute(array($email,$mdp,$nom));
            
            /*$req = $BDD->prepare("SELECT login,nom FROM user WHERE login = ? AND nom = ?");
            
            $req->execute(array($nom,$email));
            $u = $req->fetch();*/
            
            $_SESSION['user_email']=$email;
            $_SESSION['user_nom']=$nom;
            $_SESSION['user_mdp']=$mdp;
            header('Location: dashboard.php');
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

                        <label for="nom">Nom :</label>
                        <input type="text" name="new_nom" id="new_nom" placeholder="Entrez vote nom">
                        <?php
                        if(isset($erreur_nom)){
                            echo"<span style='color:red'>".$erreur_nom."</span>";

                        }

                        ?>
                        <br><br/>

                        <label for="email">Email :</label>
                        <input type="email" name="new_mail" id="new_mail" placeholder="Entrez vote email">
                        <?php
                        if(isset($erreur_email)){
                            echo"<span style='color:red'>".$erreur_email."</span>";
                        }

                        ?>
                        <br><br/>

                        <label for="email">Mot de passe :</label>
                        <input type="password" name="new_mdp" id="new_mdp" placeholder="Entrez vote mot de passe">
                        <?php
                        if(isset($erreur_mdp)){
                            echo"<span style='color:red'>".$erreur_mdp."</span>";
                        }

                        ?>
                        <br><br/>
                        <input type="submit" name="sinscrire" id="sinscrire" class="submit" value="S'inscrire">
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