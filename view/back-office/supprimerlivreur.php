<?php

include ('C:/xampp/htdocs/projetlivraison/model/livreur.php');
include ('C:/xampp/htdocs/projetlivraison/controller/livreurC.php');
$log=$_GET['login'];
$ec= new livreurC();
$ec->Supprimerlivreur($log);
header('Location: livreur.php');  
?>