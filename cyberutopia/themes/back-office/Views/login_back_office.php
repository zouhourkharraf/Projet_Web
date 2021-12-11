<?php
session_start();

include_once '../Model/Utilisateur.php';
include_once '../Controller/UtilisateurC.php';
$user=null;

$message="";
$userC = new UtilisateurC();

if (isset($_POST["mail"]) &&
    isset($_POST["mp"])) {
    if (!empty($_POST["mail"]) &&
        !empty($_POST["mp"]))
    {    $message=$userC->connexionUser($_POST["mail"],$_POST["mp"]);
         $_SESSION['e'] = $_POST["mail"];// on stocke dans le tableau une colonne ayant comme nom "e",
        //  avec l'email à l'intérieur
        if($message!='E-mail ou mot de passe incorrects')
        {
           $message=$userC->verif_admin($_POST["mail"],$_POST["mp"]);
           if($message!="Accès refusé, vous n'êtes pas administrateur") // càd que cet utilisateur est un administrateur
          {  header('Location:table_utilisateur.php');    }
        }
        else{
            $message='E-mail ou mot de passe incorrects';
        }}
    else
        $message = "Missing information";}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                           
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                           
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Administration du site</h1>
                                    </div>
                                    
                                    <!--la balise de l'erreur-->
                                    <p id="erreur"></p>
                                    <form class="user" name="form_inscri" action="" method="post" onsubmit="return verif_formulaire(event)">

                                        <div class="form-group">
                                <input type="email" class="form-control form-control-user" name="mail" aria-describedby="emailHelp" placeholder="Votre adresse email">
                                        </div>

                                        <div class="form-group">
                                <input type="password" class="form-control form-control-user" name="mp" placeholder="Votre mot de passe">
                                        </div>
                                       
                                        <input type="submit" value="Se connecter" class="btn btn-primary btn-user btn-block">
                                      
                                        <hr>
                                    
                                        
            <div >
       <?php if($message!="") { echo '<p><div class="alert alert-danger alert-common" role="alert"><i class="tf-ion-close-circled"></i><span>Erreur!</span> '. $message .'</div></p>'; } ?>
        </div> 


                                       
                                    </form>
                                    <hr>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>


<script>

function verification()
 {
  var message_erreur=document.getElementById("erreur");
  
  var test=false;


  if( (document.forms["form_inscri"]["mail"].value=="")&&(document.forms["form_inscri"]["mp"].value=="") )
  { message_erreur.innerHTML='<p><a href="#" class="btn btn-warning btn-icon-split"><span class="icon text-white-50"><i class="fas fa-exclamation-triangle"></i></span><span class="text"> Veuillez remplir les champs</span></a></p>'; }
  
  else if(document.forms["form_inscri"]["mail"].value=="")
  { message_erreur.innerHTML='<p><a href="#" class="btn btn-warning btn-icon-split"><span class="icon text-white-50"><i class="fas fa-exclamation-triangle"></i></span><span class="text"> Veuillez saisir votre email</span></a></p>'; }
 
  else if(document.forms["form_inscri"]["mp"].value=="")
  { message_erreur.innerHTML='<p><a href="#" class="btn btn-warning btn-icon-split"><span class="icon text-white-50"><i class="fas fa-exclamation-triangle"></i></span><span class="text"> Veuillez saisir votre mot de passe</span></a></p>'; }
  
  else
  { message_erreur.innerHTML='<p></p>';   test=true; }

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