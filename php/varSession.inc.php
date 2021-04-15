<?php
$_SESSION['user']="visiteur";
$_SESSION['id']=rand(0,50);


$_SESSION['connecter']=false;
if(isset($_SESSION['user_nom']) || isset($_SESSION['user_email'])  ) {//on vérifie si on est connecté ou pas
    $_SESSION['connecter']=true;
}


//import categories from JSON
$json_code=file_get_contents("data/categorie.json");
$json_code=str_replace('}, ]',"} ]",$json_code);
$_SESSION['categorie']=json_decode($json_code);

/////////////////////////////////////////////////////////////////////////////////////////////////////////
/*Tableaux des utilisateurs*/

$user=[];//tableau d'utilisateur crée à partir du fichier txt
$content=file_get_contents("data/user.txt");
$user_txt = explode(";",trim($content," \n\r\t\v\0"));

for($i=0;$i<count($user_txt)-1;$i++){
    $info_txt = explode(",",$user_txt[$i]);//pour chaque utilisateur on prend ces infos
    $user[$i]['login']=$info_txt[0];
    $user[$i]['mdp']=$info_txt[1];
    $user[$i]['nom']=$info_txt[2];//on enlève les sauts de ligne
    $user[$i]['panier']=$info_txt[3];
    if($user[$i]['panier']=="[]"){
        $user[$i]['panier']=[];
    }
}
?>