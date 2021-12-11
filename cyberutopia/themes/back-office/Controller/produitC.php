<?php
	include '../config.php';
	include_once '../Model/produit.php';




	class produitC {
		function afficherproduits(){
			$sql="SELECT * FROM produit ";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}

		function rechercheproduits($id_scateg){
			$sql="SELECT * FROM produit where id_scateg=:id_scateg ";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}


		


	
		function supprimerproduit($id_produit){
			$sql="DELETE FROM produit WHERE id_produit=:id_produit";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_produit', $id_produit);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterproduit($produit){
			$sql="INSERT INTO produit ( Nom, descr, url_image, code_categ, id_scateg, pu_achat, pu_vente, qte_stock,date) 
			VALUES (:Nom,:descr, :url_image,:code_categ,:id_scateg,:pu_achat,:pu_vente,:qte_stock,:date)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
				
					'Nom' => $produit->getNom(),
					'descr' => $produit->getdescr(),
					'url_image' => $produit->geturl_image(),
					'code_categ' => $produit->getcode_categ(),
					'id_scateg'=> $produit->getid_scateg(),
					'pu_achat'=> $produit->getpu_achat(),
					'pu_vente'=> $produit->getpu_vente(),
					'qte_stock'=> $produit->getqte_stock(),
					'date'=> $produit->getdate()

				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererproduit($id_produit){
			$sql="SELECT * from produit where id_produit=$id_produit";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$produit=$query->fetch();
				return $produit;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierproduit($produit, $id_produit){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE produit SET 
						Nom= :Nom, 
						descr= :descr, 
						url_image= :url_image, 
						code_categ= :code_categ, 
						id_scateg= :id_scateg,
						pu_achat= :pu_achat, 
						pu_vente= :pu_vente,
						qte_stock = :qte_stock ,
						date = :date 
						
					WHERE id_produit= :id_produit'
				);
				$query->execute([
		
					'Nom' => $produit->getNom(),
					'descr' => $produit->getdescr(),
					'url_image' => $produit->geturl_image(),
					'code_categ' => $produit->getcode_categ(),
					'id_scateg'=> $produit->getid_scateg(),
					'pu_achat'=> $produit->getpu_achat(),
					'pu_vente'=> $produit->getpu_vente(),
					'qte_stock'=> $produit->getqte_stock(),
						'date'=> $produit->getdate(),
						
					
					'id_produit' => $id_produit
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>