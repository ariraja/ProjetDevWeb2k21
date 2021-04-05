<?php
session_start();

//$user[]['panier']=$_SESSION['panier'];
session_unset();
session_destroy();

header('Location: index.php');
exit;

?>