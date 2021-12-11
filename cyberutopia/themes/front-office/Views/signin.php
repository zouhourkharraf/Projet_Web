<?php
session_start(); //--> la session du captcha
$status="";
include_once '../Model/Utilisateur.php';
include_once '../Controller/UtilisateurC.php';



    // créer untilisateur
    $utilisateur = null;
// créer une instance du controlleur
$utilisateurC=new UtilisateurC();

if (
    isset($_POST["nom1"]) &&
    isset($_POST["prenom"]) &&		
    isset($_POST["pseudo"]) && 
    isset($_POST["adresse"]) && 
    isset($_POST["tel1"]) &&
    isset($_POST["tel2"]) &&
    isset($_POST["sexe"]) &&		
    isset($_POST["date_naiss"]) &&
    isset($_POST["mail1"]) && 
    isset($_POST["mail2"]) && 
    isset($_POST["mp1"]) &&
    isset($_POST["mp2"]) 
) {  
    if (
      !empty($_POST["nom1"]) &&
      !empty($_POST["prenom"]) &&		
      !empty($_POST["pseudo"]) && 
      !empty($_POST["adresse"]) && 
      !empty($_POST["tel1"]) &&
      !empty($_POST["sexe"]) &&		
      !empty($_POST["mail1"]) && 
      !empty($_POST["mail2"]) && 
      !empty($_POST["mp1"]) &&
      !empty($_POST["mp2"])
     
    
        
    ) { 
      if( (isset($_POST["captcha"]) )&& ( empty($_POST["captcha"]) ) )
      {    $status ='<div class="alert alert-danger alert-common" role="alert"><i class="tf-ion-close-circled"></i><span>Erreur! </span>Veuillez saisir le code.</div>'; }
     else if( (isset($_POST["captcha"]) )&& ( !empty($_POST["captcha"]) ) && ($_SESSION["code"]==$_POST["captcha"]) )
        {
         $status ='<div class="alert alert-success alert-common" role="alert"><i class="tf-ion-thumbsup"></i><Prfait! </span>Votre code est correct.</div>'; 
      
        $utilisateur = new Utilisateur(
          '',
          $_POST['nom1'],
          $_POST['prenom'],
          $_POST['pseudo'], 
          $_POST['adresse'],
          $_POST['tel1'],
          $_POST['tel2'],
          $_POST['sexe'],
          $_POST['date_naiss'],
          $_POST['mail2'],
          $_POST['mp2'],
          'client'   
      ); 
     $utilisateurC->ajouterutilisateur($utilisateur);
        header('Location:message_confirmation.php');
    }
    else
    {
     $status ='<div class="alert alert-danger alert-common" role="alert"><i class="tf-ion-close-circled"></i><span>Erreur! </span>Le code entré ne correspond pas! Veuillez réessayer.</div>';
   
    }
      }

      
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Aviato | E-commerce template</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.png" />
  
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="../plugins/themefisher-font/style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
  
  <!-- Animate css -->
  <link rel="stylesheet" href="../plugins/animate/animate.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="../plugins/slick/slick.css">
  <link rel="stylesheet" href="../plugins/slick/slick-theme.css">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="../css/style.css">



</head>

<body id="body">
<section class="signin-page account">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
          <a class="logo" href="/cyberutopia/themes/front-office/index.php">
            <img src="../images/photo_logo.png" alt="" width="135" height="135">
          </a>
          <h2 class="text-center">Créer votre compte client</h2>



       
          <form class="text-left clearfix" action="" method="POST" name="form1" onsubmit="return verif_formulaire(event)">
             
 <!-- le champ du captcha--> 
 <div class="form-group">
  <p><?php echo $status; 
  ?></p>
          <label>Entrer le texte dans l'image </label>
          <input name="captcha" type="text" class="form-control">
          <img src="captcha.php" style="vertical-align: middle;"/>
        </div>
 <!-- / le champ du captcha-->




            <div class="form-group">
              <p id="erreur1"></p>
              <input type="text" class="form-control" placeholder="Nom" name="nom1">
            </div>

            <div class="form-group">
              <p id="erreur2"></p>
              <input type="text" class="form-control"  placeholder="Prénom" name="prenom">
            </div>

            <div class="form-group">
              <p id="erreur3"></p>
              <input type="text" class="form-control"  placeholder="pseudo" name="pseudo" onclick="generer_pseudo()">
            </div>

            <div class="form-group">
              <p id="erreur4"></p>
              <input type="text" class="form-control"  placeholder="Adresse" name="adresse">
            </div>

            <div class="form-group">
              <p id="erreur5"></p>
              <input type="text" class="form-control"  placeholder="Numéro de téléphone (obligatoire)" name="tel1">
            </div>

            
            <div class="form-group">
              <p id="erreur6"></p>
              <input type="text" class="form-control"  placeholder="Numéro de téléphone 2 (optionnel)" name="tel2"> 
            </div>

            <p class="mt-20"><strong>Genre (obligatoire):</strong></p>
            <div class="form-group">  
              <p id="erreur7"></p> 
              <label><input type="radio" class="form-control" name="sexe" value="homme">Monsieur</label>
              <label><input type="radio" class="form-control" name="sexe" value="femme">Madame</label>
            </div>

            <div class="form-group">
              <p id="erreur8"></p>
              <input type="date" class="form-control"  placeholder="Date de naissance" name="date_naiss">
            </div>


            <div class="form-group">
              <p id="erreur9"></p>
              <input type="email" class="form-control"  placeholder="Email (obligatoire)" name="mail1">
            </div>

            <div class="form-group">
              <p id="erreur10"></p>
              <input type="email" class="form-control"  placeholder="Confirmation d'email" name="mail2">
            </div>

            <div class="form-group">
              <p id="erreur11"></p> 
              <input type="password" class="form-control"  placeholder="Mot de passe (minimum: 6 chiffres et maximum: 20 chiffres)" name="mp1">
            </div>

            <div class="form-group">
              <p id="erreur12"></p>
              <input type="password" class="form-control"  placeholder="Confirmation de mot de passe" name="mp2">
            </div>
             


            <div class="text-center">
              <input type="submit" class="btn btn-main text-center" value="Créer votre compte">

            </div>

          </form>

          <p class="mt-20">Vous possédez déjà un compte ?<a href="login.php">Connectez-vous</a></p>
         
        </div>
      </div>
    </div>
  </div>
</section>

    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- Main jQuery -->
    <script src="../plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap Touchpin -->
    <script src="../plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Instagram Feed Js -->
    <script src="../plugins/instafeed/instafeed.min.js"></script>
    <!-- Video Lightbox Plugin -->
    <script src="../plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
    <!-- Count Down Js -->
    <script src="../plugins/syo-timer/build/jquery.syotimer.min.js"></script>

    <!-- slick Carousel -->
    <script src="../plugins/slick/slick.min.js"></script>
    <script src="../plugins/slick/slick-animation.min.js"></script>

    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="../plugins/google-map/gmap.js"></script>

    <!-- Main Js File -->
    <script src="../js/script.js"></script>
    <script src="../js/signin00.js"></script>


  </body>
  </html>