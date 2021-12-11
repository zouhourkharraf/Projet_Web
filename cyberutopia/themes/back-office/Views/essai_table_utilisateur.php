<?php
include '..\Controller\UtilisateurC.php';

// créer une instance du controlleur
$utilisateurC=new UtilisateurC();

$listeUtilisateurs=$utilisateurC->afficherutilisateurs();


?>

<html>
	<head></head>
	<body>
	   
		<center><h1>Liste des utilisateurs</h1></center>

		<table border="1" align="center">
			<tr>
        
				<th>IdUtilisateur</th>
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
			<?php
				foreach($listeUtilisateurs as $utilisateur) // chaque enregistrement sera stoké dans ce '$utilisateur' 
                {
			?>
			<tr>
      
            <!-- afficher les valeur de chaque enregistrement RQ: il faut utiliser les mêmes nom des champs de la table   -->
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
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $utilisateur['IdUtilisateur']; ?> name="idutilisateur"> 
					</form>  
				</td> 
                
                <td>
				<button><a href="supprimerutilisateur.php?IdUtilisateur=<?php echo $utilisateur['IdUtilisateur']; ?>">Supprimer</a> </button>
				</td> 
                

                <td>
                <?php
                if( $utilisateur['RoleUtilisateur']=="client" )
                {
                    ?>
                    <button><a href="definir_comme_admin.php?IdUtilisateur=<?php echo $utilisateur['IdUtilisateur']; ?>">Activer</a> </button>
                    <?php
                }
                else // càd $utilisateur['RoleUtilisateur']=="administrateur"
                {
                    ?>
                    <button><a href="definir_comme_client.php?IdUtilisateur=<?php echo $utilisateur['IdUtilisateur']; ?>">Désactiver</a> </button>
                <?php
                }

                ?>

                </td>
			
                
	
				
			</tr>

			<?php
				 }
			?>
		</table>
	</body>
</html>
