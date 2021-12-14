<?php

include ('C:/xampp/htdocs/projetlivraison/model/livraison.php');
include ('C:/xampp/htdocs/projetlivraison/controller/livraisonC.php');

$id=$_GET['id'];
$ec= new livraisonC();
$ec->Supprimerlivraison($id);
header('Location: livraison.php');  
?>