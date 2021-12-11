<?php

include '..\Controller\UtilisateurC.php';

$utilisateurC=new UtilisateurC();

$utilisateurC->definir_comme_client($_GET["IdUtilisateur"]);

header('Location:table_utilisateur.php');



?>