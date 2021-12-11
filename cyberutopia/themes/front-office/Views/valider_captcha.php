<?php

 session_start(); //--> la session du captcha
 
 if( (isset($_POST["captcha"]) )&& ( !empty($_POST["captcha"]) ) && ($_SESSION["code"]==$_POST["captcha"]) )
   {
    $status ='<div class="alert alert-success alert-common" role="alert"><i class="tf-ion-thumbsup"></i><Prfait! </span>Votre code est correct.</div>'; 
   }
   else
   {
    $status ='<div class="alert alert-danger alert-common" role="alert"><i class="tf-ion-close-circled"></i><span>Erreur! </span>Le code entré ne correspond pas! Veuillez réessayer.</div>';
   }



?>