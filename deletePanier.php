<?php
session_start();

require_once('php/fonctions.php');
var_dump($_GET);

if(isset($_GET['ref'])){
    $ref=$_GET['ref'];
    supp_panier($ref);
}
?>