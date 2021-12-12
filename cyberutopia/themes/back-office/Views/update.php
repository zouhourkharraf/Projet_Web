<?php
    include_once '..\Model\Utilisateur.php';
    include_once '..\Controller\UtilisateurC.php';

    $error = "";

    // créer un utilisateur
    $utilisateur = null;

    // create an instance of the controller
    $utilisateurC = new UtilisateurC();
    

    if (
        isset($_POST["nom1"]) &&
		    isset($_POST["prenom"]) &&		
        isset($_POST["pseudo"]) &&
		    isset($_POST["adresse"]) && 
        isset($_POST["tel1"]) && 
        isset($_POST["tel2"]) &&
        isset($_POST["date_naiss"])
    ) {
        if (
            !empty($_POST["nom1"]) && 
		      	!empty($_POST['prenom']) &&
            !empty($_POST["pseudo"]) && 
			      !empty($_POST["adresse"]) && 
            !empty($_POST["tel1"])  
        /*    !empty($_POST["tel2"]) && 
            !empty($_POST["date_naiss"])*/
        ) {                                           
            $utilisateur = new Utilisateur(
                $_POST['id_util'],
				        $_POST['nom1'],
                $_POST['prenom'], 
				        $_POST['pseudo'],
                $_POST['adresse'],
                $_POST['tel1'], 
				        $_POST['tel2'],
                $_POST['genreutilisateur'],
                $_POST['date_naiss'],
                $_POST['emailutilisateur'],
                $_POST['mputilisateur'],
                $_POST['roleutilisateur']
            );

            $utilisateurC->modifierutilisateur($utilisateur,  $_POST['id_util'] ); // on a passé en paramètre l'idantifiant de l'utilisateur en question (qui est la clé primaire de la table utilisateur)
            header('Location:table_utilisateur.php');
        }     
        else
            $error = "Veuillez remplir tous les champs";
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
             <br><br>
            <div class="text-center">
<button><a href="table_utilisateur.php" class="btn btn-main text-center">Retour à la liste des utilisateurs</a></button>
           </div>
        <hr>

        <div id="error" >
            <?php echo $error; ?>
        </div>

<section class="signin-page account">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
          <a class="logo" href="index.html">
            <img src="../images/photo_logo.png" alt="" width="135" height="135">
          </a>
          <h2 class="text-center">Modifier les informations du compte</h2>


          <?php
			if (isset($_POST['idutilisateur'])){
				$utilisateur = $utilisateurC->recupererutilisateur($_POST['idutilisateur']); 
   
	   	?>

          <form class="text-left clearfix" action="" method="POST" name="form1" onsubmit="return verif_formulaire(event)"> 
          
     

                  <!--Des input cachées pour stoker les autres attributs de l'utilisateur -->
  <input type="hidden" name="id_util" value="<?php echo $utilisateur['IdUtilisateur']; ?>">
  <input type="hidden" name="genreutilisateur" value="<?php echo $utilisateur['GenreUtilisateur']; ?>">
  <input type="hidden" name="emailutilisateur" value="<?php echo $utilisateur['EmailUtilisateur']; ?>">
  <input type="hidden" name="mputilisateur" value="<?php echo $utilisateur['MpUtilisateur']; ?>">
  <input type="hidden" name="roleutilisateur" value="<?php echo $utilisateur['RoleUtilisateur']; ?>">

            <div class="form-group">
              <p id="erreur1"></p>
              <input type="text" class="form-control" placeholder="Nom" name="nom1" value="<?php echo $utilisateur['NomUtilisateur']; ?>">
            </div>

            <div class="form-group">
              <p id="erreur2"></p>
              <input type="text" class="form-control"  placeholder="Prénom" name="prenom" value="<?php echo $utilisateur['PrenomUtilisateur']; ?>">
            </div>

            <div class="form-group">
              <p id="erreur3"></p>
              <input type="text" class="form-control"  placeholder="pseudo" name="pseudo" onclick="generer_pseudo()" value="<?php echo $utilisateur['PseudoUtilisateur']; ?>">
            </div>


            <div class="form-group">
              <p id="erreur4"></p>
              <input type="text" class="form-control"  placeholder="Adresse" name="adresse" value="<?php echo $utilisateur['AdresseUtilisateur']; ?>">
            </div>

            <div class="form-group">
              <p id="erreur5"></p>
              <input type="text" class="form-control"  placeholder="Numéro de téléphone (obligatoire)" name="tel1" value="<?php echo $utilisateur['Tel1Utilisateur']; ?>">
            </div>

            
            <div class="form-group">
              <p id="erreur6"></p>
              <input type="text" class="form-control"  placeholder="Numéro de téléphone 2 (optionnel)" name="tel2" value="<?php echo $utilisateur['Tel2Utilisateur']; ?>"> 
            </div>

           
            <div class="form-group">
            <p class="mt-20"><strong>Genre : <?php echo $utilisateur['GenreUtilisateur']; ?></strong></p> 
            </div>

            <div class="form-group">
              <p id="erreur8"></p>
              <input type="date" class="form-control"  placeholder="Date de naissance" name="date_naiss" value="<?php echo $utilisateur['DatenaissUtilisateur']; ?>">
            </div>

        

            <div class="text-center">
              <input type="submit" class="btn btn-main text-center" value="Mettre à jour">   <input type="reset" class="btn btn-main text-center" value="Annuler">
            </div>

          </form>
          <?php

          }
          ?>
         
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
    
 <!-- pour le controle de saisie -->
 <script src="../js/update2.js"></script>

  </body>
  </html>