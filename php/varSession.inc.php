<?php
$_SESSION['user']="visiteur";
$_SESSION['id']=rand(0,50);


//$_SESSION=session_id();

/* les tableaux de chaque catégorie */

$burger=[
    'burger01'=>['photo' => 'img/burger_hamburger.jpg', 'nom'=>'Hamburger','prix'=>5 , 'quantite' => 10],
    'burger02'=>['photo' => 'img/cheeseburger.png', 'nom'=>'Cheeseburger','prix'=>5 , 'quantite' => 8],
    'burger03'=>['photo' => 'img/burger_cheesebacon.jpg', 'nom'=>'Cheese Bacon','prix'=>7 , 'quantite' => 6],
    'burger04'=>['photo' => 'img/burger_doublecheese.jpg', 'nom'=>'Double Cheese','prix'=>6 , 'quantite' => 7],
    'burger05'=>['photo' => 'img/burger_bigmac.jpg', 'nom'=>'Big Mac','prix'=>8 , 'quantite' => 5]
];

$poulet=[
    'poulet01'=>['photo' => 'img/tenders.jpg', 'nom'=>'Tenders (10 pièces)','prix'=>7 , 'quantite' => 10],
    'poulet02'=>['photo' => 'img/wings.jpg', 'nom'=>'Wings','prix'=>7 , 'quantite' => 8],
    'poulet03'=>['photo' => 'img/wings_bbq.jpg', 'nom'=>'Wings Bbq (10 pièces)','prix'=>8 , 'quantite' => 8],
    'poulet04'=>['photo' => 'img/bucket_tenders.jpg', 'nom'=>'Bucket Tenders (20 pièces)','prix'=>13 , 'quantite' => 7],
    'poulet05'=>['photo' => 'img/bucket_wings.jpg', 'nom'=>'Bucket Wings (20 pièces)','prix'=>13 , 'quantite' => 5]
];

$pizza=[
    'pizza01'=>['photo' => 'img/pepperoni.png', 'nom'=>'Pizza Pepperoni','prix'=>9.99 , 'quantite' => 10],
    'pizza02'=>['photo' => 'img/4F.png', 'nom'=>'Pizza 4 Fromages','prix'=>8 , 'quantite' => 8],
    'pizza03'=>['photo' => 'img/reine.png', 'nom'=>'Pizza Reine','prix'=>7 , 'quantite' => 8],
    'pizza04'=>['photo' => 'img/tartiflette.png', 'nom'=>'Pizza Tartiflette','prix'=>11 , 'quantite' => 10],
    'pizza05'=>['photo' => 'img/sicilienne.png', 'nom'=>'Pizza Sicilienne','prix'=>13 , 'quantite' => 5]
];

?>