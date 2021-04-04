<?php
session_start();
include_once("php/varSession.inc.php");//utile pour l'ajout d'utilisateurs après



$_SESSION['connecter']=false;

if(isset($_SESSION['user_id']) || isset($_SESSION['user_email'])){//évite qu'un connecté s'inscrit
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
            $err_nom="Entrez votre nom !";
        }
        else if(!ctype_alnum($nom)){
            $ok=false;
            $err_nom="Le nom ne doit pas contenir de caractères spéciaux !";
        }

        //Vérification mail
        if(empty($email)){
            $ok=false;
            $err_email="Entrez votre email !";
        }
        else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $ok=false;
            $err_email="Le mail doit s'écrire comme sous cette forme : monmail@mail.com";
        }

        //Vérification mdp
        if(empty($mdp)){
            $ok=false;
            $err_mdp="Entrez votre mot de passe !";
        }

       
        //vérif bdd
        for($i=0;$i<count($user);$i++){
            if($nom==$user[$i]['nom']){
                $ok=false;
                $err_nom="Nom existant !<br>";
                break;
            }
        }
        for($i=0;$i<count($user);$i++){
            if(in_array($email,$user[$i])){
                $ok=false;
                $err_email="Email existant !";
                break;
            }
        }


        //si email et mdp existent
        if($ok){
            //$panier_vide= [];
            //array_push($user[$i],$email,$mdp,$panier_vide);
            $file= fopen("data/user.txt","a");//ajout utilisateur dans le fichier
            $row=$email.','.$mdp.','.$nom.','.'[]'.";\n";
            fwrite($file,$row);
            fclose($file);
            //màj bdd
            $user_txt = explode(";\n",file_get_contents("data/user.txt"));//ligne
            for($i=0;$i<count($user_txt)-1;$i++){
                $info_txt = explode(",",$user_txt[$i]);//pour chaque utilisateur on prend ces infos
                $user[$i]['login']=$info_txt[0];
                $user[$i]['mdp']=$info_txt[1];
                $user[$i]['nom']=$info_txt[2];
                $user[$i]['panier']=$info_txt[3];
            }

            foreach($user as $u){
                if( ($u['login']==$email) && ($u['mdp']==$mdp)){
                    $_SESSION['user_id']=$i;
                    $_SESSION['user_email']=$email;
                    $_SESSION['user_nom']=$nom;
                    $_SESSION['user_mdp']=$mdp;
                    $_SESSION['connecter']=true;
                    $_SESSION['panier']=$u['panier'];
                }
            }
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
                        if(isset($err_nom)){
                            echo"<span style='color:red'>".$err_nom."</span>";

                        }

                        ?>
                        <br><br/>

                        <label for="email">Email :</label>
                        <input type="email" name="new_mail" id="new_mail" placeholder="Entrez vote email">
                        <?php
                        if(isset($err_email)){
                            echo"<span style='color:red'>".$err_email."</span>";
                        }

                        ?>
                        <br><br/>

                        <label for="email">Mot de passe :</label>
                        <input type="password" name="new_mdp" id="new_mdp" placeholder="Entrez vote mot de passe">
                        <?php
                        if(isset($err_mdp)){
                            echo"<span style='color:red'>".$err_mdp."</span>";
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