<?php
$_SESSION['user']="visiteur";
$_SESSION['id']=rand(0,50);


$_SESSION['connecter']=false;
if(isset($_SESSION['user_nom']) || isset($_SESSION['user_email'])  ) {//on vérifie si on est connecté ou pas
    $_SESSION['connecter']=true;
}

//$_SESSION=session_id();

/* les tableaux de chaque catégorie */

/*$burger=[
'burger01'=>['photo' => 'img/burger_hamburger.jpg','ref' => 'burger01', 'nom'=>'Hamburger','prix'=>5 , 'quantite' => 10],
'burger02'=>['photo' => 'img/cheeseburger.png', 'ref' => 'burger02', 'nom'=>'Cheeseburger','prix'=>5 , 'quantite' => 8],
'burger03'=>['photo' => 'img/burger_cheesebacon.jpg', 'ref' =>
'burger03', 'nom'=>'Cheese Bacon','prix'=>7 , 'quantite' => 6],
'burger04'=>['photo' => 'img/burger_doublecheese.jpg', 'ref' => 'burger04', 'nom'=>'Double Cheese','prix'=>6 , 'quantite' => 7],
'burger05'=>['photo' => 'img/burger_bigmac.jpg', 'ref' => 'burger05' ,'nom'=>'Big Mac','prix'=>8 , 'quantite' => 5]
];

$poulet=[
'poulet01'=>['photo' => 'img/tenders.jpg', 'ref' => 'poulet01' ,'nom'=>'Tenders (10 pièces)','prix'=>7 , 'quantite' => 10],
'poulet02'=>['photo' => 'img/wings.jpg', 'ref' => 'poulet02' ,'nom'=>'Wings','prix'=>7 , 'quantite' => 8],
'poulet03'=>['photo' => 'img/wings_bbq.jpg', 'ref' => 'poulet03', 'nom'=>'Wings Bbq (10 pièces)','prix'=>8 , 'quantite' => 8],
'poulet04'=>['photo' => 'img/bucket_tenders.jpg', 'ref' => 'poulet04', 'nom'=>'Bucket Tenders (20 pièces)','prix'=>13 , 'quantite' => 7],
'poulet05'=>['photo' => 'img/bucket_wings.jpg', 'ref' => 'poulet05','nom'=>'Bucket Wings (20 pièces)','prix'=>13 , 'quantite' => 5]
];

$pizza=[
'pizza01'=>['photo' => 'img/pepperoni.png', 'ref' => 'pizza01','nom'=>'Pizza Pepperoni','prix'=>9.99 , 'quantite' => 10],
'pizza02'=>['photo' => 'img/4F.png', 'ref' => 'pizza02','nom'=>'Pizza 4 Fromages','prix'=>8 , 'quantite' => 8],
'pizza03'=>['photo' => 'img/reine.png', 'ref' => 'pizza03','nom'=>'Pizza Reine','prix'=>7 , 'quantite' => 8],
'pizza04'=>['photo' => 'img/tartiflette.png', 'ref' => 'pizza04','nom'=>'Pizza Tartiflette','prix'=>11 , 'quantite' => 10],
'pizza05'=>['photo' => 'img/sicilienne.png', 'ref' => 'pizza05','nom'=>'Pizza Sicilienne','prix'=>13 , 'quantite' => 5]
];

$tab_cat=[
'burger' => $burger,
'poulet' => $poulet,
'pizza' => $pizza
];

//transfer categories to JSON
$produits_json= json_encode($tab_cat);
$bytes = file_put_contents("data.json", $produits_json); */

//import categories from JSON
$json_code=file_get_contents("data/categorie.json");
$json_code=str_replace('}, ]',"} ]",$json_code);
$_SESSION['categorie']=json_decode($json_code);

/////////////////////////////////////////////////////////////////////////////////////////////////////////
/*Tableaux des utilisateurs*/

/*TODO
$users=[
'1' => ['login' => 'cyspot@cyu.eu', 'mdp' => '123', 'nom' => 'Webmaster', 'panier' => [] ],
'2' => ['login' => 'ari@cyu.eu', 'mdp' => '123', 'nom' => 'Ari', 'panier' => [] ],
'3' => ['login' => 'jo@cyu.eu', 'mdp' => '123', 'nom' => 'Jo', 'panier' => ['alibava','okkk' ]]
];*/

//$users=[
// ['login' => 'cyspot@cyu.eu', 'mdp' => '123', 'nom' => 'Webmaster'],
// ['login' => 'ari@cyu.eu', 'mdp' => '123', 'nom' => 'Ari'],
// ['login' => 'jo@cyu.eu', 'mdp' => '123', 'nom' => 'Jo']
//];
//$row='';
//foreach($users as $id){
// foreach($id as $key => $value){
// $row .=$value.",";
// }
// $row.="\n";
//}
//$file= fopen("user.txt","w+");//création d'un fichier txt contenant tableau
//fwrite($file,$row);
//fclose($file);

$user=[];//tableau d'utilisateur crée à partir du fichier txt
$content=file_get_contents("data/user.txt");
$user_txt = explode(";",trim($content," \n\r\t\v\0"));

//$user_txt=rtrim($user_txt,"\n");
//var_dump($user_txt);
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

//var_dump($user);
?>