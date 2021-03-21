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


?>