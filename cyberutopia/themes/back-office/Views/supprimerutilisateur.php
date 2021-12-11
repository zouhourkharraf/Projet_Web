<?php

include '..\Controller\UtilisateurC.php';

$utilisateurC=new UtilisateurC();

$utilisateurC->supprimerutilisateur($_GET["IdUtilisateur"]);

header('Location:table_utilisateur.php');



?>