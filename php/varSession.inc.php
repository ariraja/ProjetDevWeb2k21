<?php
$_SESSION['user']="visiteur";
$_SESSION['id']=rand(0,50);


//$_SESSION=session_id();

/* les tableaux de chaque catégorie */

$burger=[
    'burger01'=>['photo' => 'img/burger_hamburger.jpg','ref' => 'burger01', 'nom'=>'Hamburger','prix'=>5 , 'quantite' => 10],
    
    'burger02'=>['photo' => 'img/cheeseburger.png', 'ref' => 'burger02', 'nom'=>'Cheeseburger','prix'=>5 , 'quantite' => 8],
    
    'burger03'=>['photo' => 'img/burger_cheesebacon.jpg', 'ref' => 
    'burger03',  'nom'=>'Cheese Bacon','prix'=>7 , 'quantite' => 6],
    
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
?>