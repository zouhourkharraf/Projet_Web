<?php
// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['e']))
{
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location:login_back_office.php');
   }


?>
<?php
include '..\Controller\UtilisateurC.php';


// créer une instance du controlleur
$utilisateurC=new UtilisateurC();

// La variable qui va contenir le mot clé
$mot_cle="";

if(isset($_GET['MotCle']) ) //si l'utilisateur a tapé un mot clé
{
    $mot_cle=$_GET['MotCle'];

    $listeUtilisateurs=$utilisateurC->afficherutilisateurs_seloncritere($mot_cle); //--> afficher les utilisateur dont le nom ou le prénom contient ce mot clé 
}
else //si aucun mot clé n'est tapé
{
    $listeUtilisateurs=$utilisateurC->afficherutilisateurs(); //--> afficher tous les utilisateurs
}



?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>


     <!-- Divider -->
     <hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Page 1</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
        <!--      <a class="collapse-item" href="buttons.html">Buttons</a> -->
            
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#produit"
        aria-expanded="true" aria-controls="produit">
        <i class="fas fa-fw fa-cog"></i>
        <span>Produit</span>
    </a>
    <div id="produit" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Ajouter:</h6>
            <a class="collapse-item" href="\cyberutopia\themes\front-office\Views\ajoutercategorie.php"  >ajouter categorie </a>
            <a class="collapse-item" href="\cyberutopia\themes\front-office\Views\afficherListecategories.php"  >afficher categorie </a>
            <a class="collapse-item" href="\cyberutopia\themes\front-office\Views\ajouterproduit.php"  >ajouter produit </a>
            <a class="collapse-item" href= "\cyberutopia\themes\front-office\Views\afficherListeproduits.php">afficher les produits</a>
        </div>
    </div>
</li>


<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Addons
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
        
            <a class="collapse-item" href="404.html">404 Page</a>
     
        </div>
    </div>
</li>



<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="Views/table_utilisateur.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables des utilisateurs</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>




</ul>
<!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>                     
                    

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php 
                                if(isset($_SESSION['e']))
                                  {
                                    $utilisateur1= $utilisateurC->recupererutilisateur_via_email($_SESSION['e']); // permet de récupérer le pseudo de l'utilsateur connecté
                                    echo $utilisateur1['PseudoUtilisateur'];    // permet d'afficher le pseudo de l'utilisateur connecté 
                                  } 
		                       
                                ?>
                            </span>
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                               
                                <div class="dropdown-divider"></div> <!-- un trait -->
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                   Se Déconnecter
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><center><strong>Liste des utilisateurs</strong></center></h1>
                 

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Gérer les Utilisateurs (Clients et Administrateurs) : </h6>
                           
                            <!-- zone  de recherche -->
                            <div class="m-0 font-weight-bold text-primary">
                             <form align="right" method="GET" action="">
                               <label>
                                   Chercher ?
                                 <input type="text" name="MotCle" placeholder="tapez le nom ou le prénom" value="<?php echo $mot_cle; ?>">
                                      <button type="submit">
                                        <span class="icon text-gray-600"> <i class="fas fa-arrow-right"></i> </span>
                                      </button>
                               </label>
                           </form>
                                </div>
                           <!-- / zone  de recherche -->

                        </div>

                        
                        <div class="card-body">
                   
                           
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
        <th>Identifiant Utilisateur</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Pseudo</th>
        <th>Adresse</th>

        <th>Téléphone 1</th>
        <th>Téléphone 2</th>
        <th>Genre</th>
        <th>Date de naissance</th>
        <th>Email</th>
        <th>Mot de passe</th>
        <th>Rôle</th>
        <th>Mise à jour</th>
        <th>Suppression</th>
        <th>Définir comme Administrateur</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                     <tr>
                                           <th>Identifiant Utilisateur</th>
                                          <th>Nom</th>
                                          <th>Prenom</th>
                                          <th>Pseudo</th>
                                          <th>Adresse</th>
                                          <th>Téléphone 1</th>
                                          <th>Téléphone 2</th>
                                          <th>Genre</th>
                                          <th>Date de naissance</th>
                                          <th>Email</th>
                                         <th>Mot de passe</th>
                                         <th>Rôle</th>
                                         <th>Mise à jour</th>
                                        <th>Suppression</th>
                                        <th>Définir comme Administrateur</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php
				foreach($listeUtilisateurs as $utilisateur) // chaque enregistrement sera stoké dans ce '$utilisateur' 
                {
			?>
			<tr>
      
            <!-- afficher les valeur de chaque enregistrement de la table 'utilisateur'  -->
				<td><?php echo $utilisateur['IdUtilisateur']; ?></td>
                <td><?php echo $utilisateur['NomUtilisateur']; ?></td>
                <td><?php echo $utilisateur['PrenomUtilisateur']; ?></td>
                <td><?php echo $utilisateur['PseudoUtilisateur']; ?></td>
                <td><?php echo $utilisateur['AdresseUtilisateur']; ?></td>
                <td><?php echo $utilisateur['Tel1Utilisateur']; ?></td>
                <td><?php echo $utilisateur['Tel2Utilisateur']; ?></td>
                <td><?php echo $utilisateur['GenreUtilisateur']; ?></td>
                <td><?php echo $utilisateur['DatenaissUtilisateur']; ?></td>
                <td><?php echo $utilisateur['EmailUtilisateur']; ?></td>
                <td><?php echo $utilisateur['MpUtilisateur']; ?></td>
                <td><?php echo $utilisateur['RoleUtilisateur']; ?></td>
                
                <td>
					<form method="POST" action="update.php">
                    <a class="btn btn-light btn-icon-split">
						<input type="submit" name="Modifier" value="Modifier" class="text"> 
                    </a>
						<input type="hidden" value=<?PHP echo $utilisateur['IdUtilisateur']; ?> name="idutilisateur"> 
					</form>  
				</td> 


                <td>
		<button class="btn btn-danger btn-circle btn-lg"><a href="supprimerutilisateur.php?IdUtilisateur=<?php echo $utilisateur['IdUtilisateur']; ?>" class="btn btn-danger btn-circle btn-lg"> 
                <i class="fas fa-trash"></i> <!-- L'image du bouton -->
                 </a>
        </button>
				</td> 
                

                <td>
                <?php  // si le role de l'utilisateur est 'client' on va afficher le bouton activer et on va envoyer l'id à la page qui permet de modifier le role de cet utilisateur en 'administrateur' en utilisant une fonction 
                if( $utilisateur['RoleUtilisateur']=="client" )
                {
                    ?>
                   <a href="definir_comme_admin.php?IdUtilisateur=<?php echo $utilisateur['IdUtilisateur']; ?>" class="btn btn-primary btn-icon-split">
                   <span class="icon text-white-50">
                    <i class="fas fa-flag"></i>
                    </span>
                    <span class="text"> Activer </span>
                   </a>

                    <?php
                }
                else // càd $utilisateur['RoleUtilisateur']=="administrateur" : si le role de l'utilisateur est 'administrateur' on va afficher le bouton Désactiver et on va envoyer l'id à la page qui permet de modifier le role de cet utilisateur en 'client' en utilisant une fonction 
                {
                    ?>
                    <a href="definir_comme_client.php?IdUtilisateur=<?php echo $utilisateur['IdUtilisateur']; ?>" class="btn btn-secondary btn-icon-split">
                    <span class="icon text-white-50">
                     <i class="fas fa-arrow-right"></i>
                     </span>
                     <span class="text">Désactiver</span>
                   </a> 

                <?php
                }

                ?>

                </td>
			
				
			</tr>
                
                                      
                                 </tbody>
            <?php
			 }
			?>
                 
                                </table>
               <div>bonjourrrrrrrrrrrrrrrrrrrr</div>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Vous êtes sur de vouloir quitter le site ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Sélectionnez "Confirmer" si vous voulez quitter</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                    <a class="btn btn-primary" href="logout_back_office.php">Confirmer</a>
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

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>