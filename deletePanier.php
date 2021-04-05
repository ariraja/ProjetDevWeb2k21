<?php
session_start();

require_once('php/fonctions.php');

if(isset($_GET['ref'])){
    $ref=$_GET['ref'];
    supp_panier($ref);
}
?>