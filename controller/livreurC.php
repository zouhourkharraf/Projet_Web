<?php
include "C:/xampp/htdocs/projetlivraison/configuration.php";
/**
 * 
 */

 class livreurC 
{
	
function ajouterLivreur($livreur)
	{ 
 	$sql="INSERT INTO livreur (login,nom,prenom,dispo,secteur,tel,date_naiss,mail,mdp,num_permis,note) VALUES(:login,:nom,:prenom,:dispo,:secteur,:tel,:date_naiss,:mail,:mdp,:num_permis,:note)";
 	$db = config::getConnexion();
 		try{

        $req=$db->prepare($sql);		
        $login=$livreur->getLogin();
        $nom=$livreur->getNom();
        $prenom=$livreur->getPrenom();
        $dispo=$livreur->getDispo();
        $secteur=$livreur->getSecteur();
        $tel=$livreur->getTel();
        $date_naiss=$livreur->getDate_naiss();
        $mail=$livreur->getMail();
        $mdp=$livreur->getMdp();

         $num_permis=$livreur->getNum_permis();
                 $note=$livreur->getNote();
		$req->bindValue(':login',$login);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':dispo',$dispo);
		$req->bindValue(':secteur',$secteur);
	    $req->bindValue(':tel',$tel);
		$req->bindValue(':date_naiss',$date_naiss);
		$req->bindValue(':mail',$mail);
		$req->bindValue(':mdp',$mdp);
        $req->bindValue(':num_permis',$num_permis);
             $req->bindValue(':note',$note);


            $req->execute();
            
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
	}

   function afficherlivreur()
    {
        $db = config::getConnexion();
            $sql="SELECT *FROM livreur";

        try{
        $req=$db->prepare($sql);
        $req->execute();
        $livreur= $req->fetchALL(PDO::FETCH_OBJ);
        return $livreur;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }   
    }
    
    function Supprimerlivreur($login){
        $sql="DELETE  from livreur where login=:login";
        $db = config::getConnexion();
        
        try{
        $req=$db->prepare($sql);
                $req->bindValue(':login',$login);

        $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


function modif($livreur,$login)
    {
        $db = config::getConnexion();
         $sql="UPDATE livreur SET  nom=:nom, prenom=:prenom, dispo=:dispo, secteur=:secteur, tel=:tel, date_naiss=:date_naiss, mail=:mail, mdp=:mdp, num_permis=:num_permis where login=$login";

      
        try{

        $req=$db->prepare($sql); 
        
        $nom=$livreur->getNom();
        $prenom=$livreur->getPrenom();
        $dispo=$livreur->getDispo();

        $secteur=$livreur->getSecteur();
        $tel=$livreur->getTel();
        $date_naiss=$livreur->getDate_naiss();
        $mail=$livreur->getMail();

         $mdp=$livreur->getMdp();
        $num_permis=$livreur->getNum_permis();
        
        

        //$req->bindValue(':login',$login);
        $req->bindValue(':nom',$nom);
        $req->bindValue(':prenom',$prenom);
        $req->bindValue(':dispo',$dispo);

        $req->bindValue(':dispo',$dispo);
        $req->bindValue(':secteur',$secteur);
        $req->bindValue(':tel',$tel);
        $req->bindValue(':date_naiss',$date_naiss); 
        $req->bindValue(':mail',$mail);
        $req->bindValue(':mdp',$mdp);
        $req->bindValue(':num_permis',$num_permis);        
        

      

           if( $req->execute())
           {

           //header('Location: livreur.php');  
            //var_dump($sql);
             echo  '<meta http-equiv="refresh" content="0;url=livreur.php" />';
           }
           else
           //header('Location: livreur.php');
            //var_dump($sql);
             echo  '<meta http-equiv="refresh" content="0;url=livreur.php" />';
        }

        catch (Exception $e)
        {

            echo 'Erreur: '.$e->getMessage();
        }





    }




    /*
function recherche($search_value){
        $db = config::getConnexion();
            $sql="select * from livreur where secteur like '%$search_value%'";

        try{
        $req=$db->prepare($sql);
        $req->execute();
        $livreur= $req->fetchALL(PDO::FETCH_OBJ);
        return $livreur;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }    
}*/
/*
function trier(){
        //$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
        
       $db = config::getConnexion();
            $sql="SElECT * From livreur ORDER BY nom";

        try{
        $req=$db->prepare($sql);
        $req->execute();
        $livreur= $req->fetchALL(PDO::FETCH_OBJ);
        return $livreur;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }    
}*/


function trier(){
        //$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
        
       $db = config::getConnexion();
            $sql="SElECT * From livreur ORDER BY nom";

        try{
        $req=$db->prepare($sql);
        $req->execute();
        $livreur= $req->fetchALL(PDO::FETCH_OBJ);
        return $livreur;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }    
}

function livreur_details($login){

    $sql="SELECT *  FROM livreur  where login = $login";
    $db = config::getConnexion();
    try{
    $evennement=$db->query($sql);
    return $evennement;
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }



} 

function chercherlivreur($search_value){
        $db = config::getConnexion();
            $sql="select * from livreur where nom like '%$search_value%' or prenom like '%$search_value%' or secteur like '%$search_value%' ";

        try{
        $req=$db->prepare($sql);
        $req->execute();
        $livreur= $req->fetchALL(PDO::FETCH_OBJ);
        return $livreur;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }}

    function note($idLivreur,$note)
    {
        $sql="UPDATE livreur SET note = $note where login=$idLivreur";
        $db = config::getConnexion();
        try{
        $req=$db->prepare($sql);
        $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

}
?>