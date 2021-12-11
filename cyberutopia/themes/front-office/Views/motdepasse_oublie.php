<?php
session_start();


include '..\Controller\UtilisateurC.php';

$erreur='';

$email_util=null;


// créer une instance du controlleur
$utilisateurC=new UtilisateurC();


if(isset($_POST["mail"])&& (!empty($_POST["mail"])) ) 
{
    $utilisateur= $utilisateurC->recupererutilisateur_via_email($_POST["mail"]);
       if($utilisateur!=null) // si cet utilisateur existe dans la base de donnée
       {  $email_util=$utilisateur['EmailUtilisateur'];  // stocker l'email de l'utilisateur pour l'envoyer un mail à cet adresse
         $code_de_verification=1000+$utilisateur['IdUtilisateur']; // le code de vérification sera toujours =(1000+l'identifiant) de l'utilisateur et puisque L'Id est unique donc le code sera toujours unique
         $_SESSION['code']=$code_de_verification; //--> stocker le code de vérification envoyé 
         $_SESSION['id']=$utilisateur['IdUtilisateur'];  // stocker l'Id de l'utilisateur

         //L'envoie du mail à l'utilisateur :
         $destinataire=$email_util;

         $sujet="récupération du mot de passe";

        $message="Votre Email : ".$email_util."\r\nVotre code : ".$code_de_verification."\r\n Merci pour votre confiance \r\n L'équipe CyberUtopia";//le texte du mail

        $headers="From:cyberutopia648@gmail.com";  //l'adresse mail qui va générer et envoyer ce messsage
       mail($destinataire,$sujet,$message,$headers); //la fonction qui permet d'envoyer le mail au destinataire
    
     /////////////////////////////

     header('Location:valider_code.php');
   

     }

}
else 
{
    $erreur='<p><div class="alert alert-danger alert-common" role="alert"><i class="tf-ion-close-circled"></i>Veuillez saisir votre Email</div></p>';
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
         
          <h2 class="text-center">Mot de passe oublié</h2><br>

           <!--la balise de l'erreur-->
          <p><?php echo $erreur; ?></p>

          <form class="text-left clearfix" action="" method="POST" name="form3">
         
            <div class="form-group">
                <label>Entrez votre adresse e-mail complète et cliquez sur le bouton Valider.</label>
              <input type="email" class="form-control"  placeholder="Email" name="mail">
            </div>
       

            <div class="text-center">
              <input type="submit" class="btn btn-main text-center" value="Valider">
            </div>
         
            
          </form>
            
          
             
				<hr>
				<p>Nous enverrons un code de validation au <?php echo $email_util; ?> </p>
			
				<hr>



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
    


  </body>
  </html>