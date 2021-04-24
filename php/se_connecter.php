<?php
include_once("bdd/bddData.php");

if(!empty($_POST)){
    $ok=true;

    if(isset($_POST['signin'])){

        $email=$_POST['email'];
        $mdp=$_POST['psw'];

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
        $req = $BDD->prepare("SELECT login
                            FROM user
                            WHERE login = ? 
                                ");
        $req->execute(array($email));
        $verif_email = $req->fetch();

        if(!isset($verif_email['login'])){//si on trouve pas l'email dans la BDD
            $ok = false;
            $err_email = "Email inexistant !";
        }

        //si email et mdp existent
        if($ok==true){

            $req = $BDD->prepare("SELECT login,nom
                            FROM user
                            WHERE login = ? AND mdp = ?
                                ");
            $req->execute(array($email,$mdp));
            $verif_user = $req->fetch();

            if(!isset($verif_user['login'])) {//si email ou mdp entrés sont non valides 
                $err_mdp="L'email et le mot de passe ne correspondent pas !<br>";

            }
            else{
                $_SESSION['user_email']=$email;
                $_SESSION['user_nom']=$verif_user['nom'];
                $_SESSION['user_mdp']=$mdp;
                $_SESSION['connecter']=true;
                header('Location: dashboard.php');
                exit;
            }
        }
    }
}
?>
<div class="overlay"></div>
<div class="login-popup">
    <div class="form-popup" id="popupForm">
        <form method="post" class="form-container">
            <img src="img/logo.png"/>
            <h2 style="color:black;font-family:calibri;">Veuillez vous connecter</h2>
            <label for="email">
                <strong>E-mail</strong>
            </label>
            <input type="text" id="email" placeholder="Votre Email" name="email" required>
            <?php
            if(isset($err_email)){
                echo"<span style='color:red'>".$err_email."</span>";
            }

            ?>
            <label for="psw">
                <strong>Mot de passe</strong>
            </label>
            <input type="password" id="psw" placeholder="Votre Mot de passe" name="psw" required>
            <?php
            if(isset($err_mdp)){
                echo"<span style='color:red'>".$err_mdp."</span>";
            }

            ?>
            <span>Si vous n'avez pas de compte,<a href="inscription.php"> inscrivez-vous.</a></span>
            <br><br/>
            <button type="submit" class="btn" onclick="Verif_login()" id="signin" name="signin">Connecter</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Fermer</button>
        </form>
    </div>
</div>