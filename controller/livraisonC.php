<?php
include "C:/xampp/htdocs/projetlivraison/configuration.php";
/*
 * 
 */

 class LivraisonC 
{
function ajouterlivraison($livraison)
    { 
    $sql="INSERT INTO livraison (dateCommande,montantCommande,etatCommande,lieuLivraison,prixLivraison,idLivreur,idClient,etat) VALUES(:dateCommande,:montantCommande,:etatCommande,:lieuLivraison, :prixLivraison, :idLivreur, :idClient, :etat)";

    $db = config::getConnexion();
        try{

        $req=$db->prepare($sql); 

        $dateCommande=$livraison->get_dateCommande();
        $montantcommande=$livraison->get_montantCommande();
        $etatcommande=$livraison->get_etatCommande();

        $lieulivraison=$livraison->get_lieuLivraison();
        $prixlivraison=$livraison->get_prixLivraison();
        $idLivreur=$livraison->get_idLivreur();
        $idClient=$livraison->get_idClient();
        $etat=$livraison->get_etat();



        $req->bindValue(':dateCommande',$dateCommande);
        $req->bindValue(':montantCommande',$montantcommande);
        $req->bindValue(':etatCommande',$etatcommande);

        $req->bindValue(':lieuLivraison',$lieulivraison);
        $req->bindValue(':prixLivraison',$prixlivraison);
         $req->bindValue(':idLivreur',$idLivreur);
        $req->bindValue(':idClient',$idClient);
        $req->bindValue(':etat',$etat);

            $req->execute();
            
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
    }   
/*
function modifierlivraison($Livraison,$idcommande)
    {
        $db = config::getConnexion();
        $sql="UPDATE livraison SET  datecommande=:datecommande, montantcommande=:montantcommande, etatcommande=:etatcommande, lieuLivraison=:lieuLivraison, prixlivraison=:prixlivraison, idlivreur=:idlivreur, idclient=:idclient, etat=:etat where idcommande=$idcommande";
        try{

        $req=$db->prepare($sql);        
        $datecommande=$Livraison->get_dateCommande();
        $montantcommande=$Livraison->get_montantCommande();
        $etatcommande=$Livraison->get_etatCommande();
        $lieulivraison=$Livraison->get_lieuLivraison();
        $prixlivraison=$Livraison->get_prixLivraison();
        $idlivreur=$Livraison->get_idLivreur();
        $idclient=$Livraison->get_idClient();
        $etat=$Livraison->get_etat();
                $req->bindValue(':idcommande',$idcommande);

        $req->bindValue(':datecommande',$datecommande);
        $req->bindValue(':montantcommande',$montantcommande);
        $req->bindValue(':etatcommande',$etatcommande);
        $req->bindValue(':lieulivraison',$lieulivraison);
        $req->bindValue(':prixlivraison',$prixlivraison);
        $req->bindValue(':idlivreur',$idlivreur);
        $req->bindValue(':idclient',$idclient);
        $req->bindValue(':etat',$etat);


           if( $req->execute())
           {
            echo 'aaaaaaaaaaaaaaaa';
           }
           else 
            echo 'nnnnnnnnnnnn';
        }
        catch (Exception $e)
        {

            echo 'Erreur: '.$e->getMessage();
        }
    }
   

*/
function livraison_details($idcommande){

    $sql="SELECT *  FROM livraison  where idcommande = $idcommande";
    $db = config::getConnexion();
    try{
    $evennement=$db->query($sql);
    return $evennement;
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }



} 
function recupererlivraison($idcommande){
        $sql="SELECT * from livraison where idcommande=$idcommande";
        $db = config::getConnexion();
        try{
        $req=$db->prepare($sql);
        $req->execute();
        $livraison= $req->fetchALL(PDO::FETCH_OBJ);
        return $livraison;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    


function modif($livraison,$idcommande)
    {
        $db = config::getConnexion();
         $sql="UPDATE livraison SET  datecommande=:datecommande, montantCommande=:montantCommande, etatCommande=:etatCommande, lieuLivraison=:lieuLivraison, prixLivraison=:prixLivraison, idLivreur=:idLivreur, idClient=:idClient, etat=:etat where idcommande=$idcommande";

      
        try{

        $req=$db->prepare($sql); 
        $datecommande=$livraison->get_dateCommande();
        $montantCommande=$livraison->get_montantCommande();
        $etatCommande=$livraison->get_etatCommande();
        $lieuLivraison=$livraison->get_lieuLivraison();

        $prixLivraison=$livraison->get_prixLivraison();
        $idLivreur=$livraison->get_idLivreur();
        $idClient=$livraison->get_idClient();
        $etat=$livraison->get_etat();

        $req->bindValue(':datecommande',$datecommande);
        $req->bindValue(':montantCommande',$montantCommande);
        $req->bindValue(':etatCommande',$etatCommande);
        $req->bindValue(':lieuLivraison',$lieuLivraison);

        $req->bindValue(':prixLivraison',$prixLivraison);
        $req->bindValue(':idLivreur',$idLivreur);
        $req->bindValue(':idClient',$idClient);
        $req->bindValue(':etat',$etat);       
        

      

           if( $req->execute())
           {

           //header('Location: livraison.php');  
            //var_dump($sql);
             echo  '<meta http-equiv="refresh" content="0;url=livraison.php" />';
           }
           else
           //header('Location: livraison.php');
            //var_dump($sql);
             echo  '<meta http-equiv="refresh" content="0;url=livraison.php" />';
        }

        catch (Exception $e)
        {

            echo 'Erreur: '.$e->getMessage();
        }





    }


    
function Supprimerlivraison($idcommande){
        $sql="DELETE  from livraison where idcommande=$idcommande";
        $db = config::getConnexion();
        try{
        $req=$db->prepare($sql);
        $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function afficherlivraison()
    {
        $db = config::getConnexion();
            $sql="SELECT *FROM livraison";

        try{
        $req=$db->prepare($sql);
        $req->execute();
        $livraison= $req->fetchALL(PDO::FETCH_OBJ);
        return $livraison;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }   
    }
/*
function recherche($search_value){
        $db = config::getConnexion();
            $sql="select * from livreur where login like '%$search_value%'";

        try{
        $req=$db->prepare($sql);
        $req->execute();
        $livraison= $req->fetchALL(PDO::FETCH_OBJ);
        echo $livraison["login"];
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }    
}*/
function stat(){

    $sql="select lieuLivraison as lieuLivraison,count(*)as livraison FROM livraison GROUP by lieuLivraison";
    $db = config::getConnexion();
    try{
    $evennement=$db->query($sql);
    return $evennement;
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }



}



function chercherlivraison($search_value){
        $db = config::getConnexion();
            $sql="select * from livraison where lieuLivraison like '%$search_value%' ";

        try{
        $req=$db->prepare($sql);
        $req->execute();
        $livraison= $req->fetchALL(PDO::FETCH_OBJ);
        return $livraison;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }}



        function trier(){
        //$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
        
       $db = config::getConnexion();
            $sql="SElECT * From livraison ORDER BY lieuLivraison";

        try{
        $req=$db->prepare($sql);
        $req->execute();
        $livraison= $req->fetchALL(PDO::FETCH_OBJ);
        return $livraison;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }    
}






}
?>