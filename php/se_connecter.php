<?php

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
       /* for($i=0;$i<count($user);$i++){
            if($email==$user[$i]['login']){
                break;
            }
            else{
                $ok=false;
                $err_email="Email inexistant !";
            }
        }*/
        for($i=0;$i<count($user);$i++){
            if(in_array($email,$user[$i])){
                $ok=true;
                $err_email="";
                break;
            }
            else{
                $ok=false;
                $err_email="Email inexistant !";
            }
        }
        
        for($i=0;$i<count($user);$i++){
            if(in_array($mdp,$user[$i])){
                $ok=true;
                $err_mdp="";
                break;
            }
            else{
                $ok=false;
                $err_mdp="Mot de passe inexistant !<br>";
            }

        }

        
        //si email et mdp existent
        if($ok==true){
            foreach($user as $u){
                if( ($u['login']==$email) && ($u['mdp']==$mdp)){
                    header('Location: dashboard.php');
                    $_SESSION['user_id']=$i;
                    $_SESSION['user_email']=$email;
                    $_SESSION['user_nom']=$u['nom'];
                    $_SESSION['user_mdp']=$mdp;
                    $_SESSION['connecter']=true;
                    $_SESSION['panier']=$u['panier'];
                    exit;
                }
            }
            //si email ou mdp entrés sont non valides 
            $err_mdp="L'email ou le mot de passe ne correspondent pas !<br>";
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