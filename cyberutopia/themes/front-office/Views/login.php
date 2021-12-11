<?php
session_start();

include_once '../Model/Utilisateur.php';
include_once '../Controller/UtilisateurC.php';

$message="";
$userC = new UtilisateurC();

if (isset($_POST["mail"]) &&
    isset($_POST["mp"])) {
    if (!empty($_POST["mail"]) &&
        !empty($_POST["mp"]))
    {    $message=$userC->connexionUser($_POST["mail"],$_POST["mp"]);
         $_SESSION['e'] = $_POST["mail"];// on stocke dans le tableau une colonne ayant comme nom "e",
        //  avec l'email à l'intérieur
        if($message!='E-mail ou mot de passe incorrects'){
           header('Location:profile-details.php');}
        else{
            $message='E-mail ou mot de passe incorrects';
        }}
    else
        $message = "Missing information";}


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
          <h2 class="text-center">Se connecter à votre compte</h2><br>
           <!--la balise de l'erreur-->
          <p id="erreur"></p>

          <form class="text-left clearfix" action="" method="post" name="form_inscri" onsubmit="return verif_formulaire(event)">
         
            <div class="form-group">
              <input type="email" class="form-control"  placeholder="Email" name="mail">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Mot de passe" name="mp">
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-main text-center" >Se connecter</button>
            </div>

            <div >
       <?php if($message!="") { echo '<p><div class="alert alert-danger alert-common" role="alert"><i class="tf-ion-close-circled"></i><span>Erreur!</span> '. $message .'</div></p>'; } ?>
        </div> 
       

          </form>
          
          <p class="mt-20"><a href="motdepasse_oublie.php">Mot de passe oublié ?</a></p>
          <br>
          <p class="mt-20">Nouveau sur cyberutopia ?<a href="signin.php"> Créer un compte client</a></p>
          
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
    
<script>

 function verification()
 {
  var message_erreur=document.getElementById("erreur");
  
  var test=false;

  if( (document.forms["form_inscri"]["mail"].value=="")&&(document.forms["form_inscri"]["mp"].value=="") )
  { message_erreur.innerHTML='<p><div class="alert alert-danger alert-common" role="alert"><i class="tf-ion-close-circled"></i><span>Erreur!</span> Veuillez remplir les champs</div></p>'; }
  
  else if(document.forms["form_inscri"]["mail"].value=="")
  { message_erreur.innerHTML='<p><div class="alert alert-danger alert-common" role="alert"><i class="tf-ion-close-circled"></i><span>Erreur!</span> Veuillez saisir votre email</div></p>'; }
  
  else if(document.forms["form_inscri"]["mp"].value=="")
  { message_erreur.innerHTML='<p><div class="alert alert-danger alert-common" role="alert"><i class="tf-ion-close-circled"></i><span>Erreur ! </span> Veuillez saisir votre mot de passe</div></p>'; }
  
  else
  { message_erreur.innerHTML='<p></p>'; test=true; }

  return (test);
 }

function verif_formulaire(e) {
    if(!verification())
    {
        e.preventDefault();
    }
    
}

</script>

  </body>
  </html>