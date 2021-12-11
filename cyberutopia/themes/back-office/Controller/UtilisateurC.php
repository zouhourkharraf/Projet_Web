<?php
include '../config.php';
include_once '../Model/Utilisateur.php';

class UtilisateurC{

    //Ajout :
    function ajouterutilisateur($utilisateur){
        $sql="INSERT INTO utilisateur(IdUtilisateur, NomUtilisateur, PrenomUtilisateur,PseudoUtilisateur ,AdresseUtilisateur ,Tel1Utilisateur,Tel2Utilisateur,GenreUtilisateur,DatenaissUtilisateur,EmailUtilisateur,MpUtilisateur,RoleUtilisateur ) 
        VALUES (:IdUtilisateur,:NomUtilisateur,:PrenomUtilisateur,:PseudoUtilisateur,:AdresseUtilisateur,:Tel1Utilisateur,:Tel2Utilisateur,:GenreUtilisateur,:DatenaissUtilisateur,:EmailUtilisateur,:MpUtilisateur,:RoleUtilisateur)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->execute([
                'IdUtilisateur' => '',
                'NomUtilisateur' => $utilisateur->getNom(),
                'PrenomUtilisateur' => $utilisateur->getPrenom(),
                'PseudoUtilisateur' => $utilisateur->getPseudo(),
                'AdresseUtilisateur' => $utilisateur->getAdresse(),
                'Tel1Utilisateur' => $utilisateur->getTel1(),
                'Tel2Utilisateur' => $utilisateur->getTel2(),
                'GenreUtilisateur' => $utilisateur->getGenre(),
                'DatenaissUtilisateur' => $utilisateur->getDatenaissance(),
                'EmailUtilisateur' => $utilisateur->getEmail(),
                'MpUtilisateur' => $utilisateur->getMotdepasse(),
                'RoleUtilisateur' => $utilisateur->getRole()           
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }			
    }

// Affichage simple :

function afficherutilisateurs(){
    $sql="SELECT * FROM utilisateur ORDER BY NomUtilisateur"; //triées par les noms des utilisateurs
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur:'. $e->getMeesage());
    }
}
////////////////

// Affichage par mot clé (effectuer un recherche) :

function afficherutilisateurs_seloncritere($mc){
    $sql="SELECT * FROM utilisateur WHERE PseudoUtilisateur like '%$mc%' ORDER BY NomUtilisateur"; 
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur:'. $e->getMeesage());
    }
}
////////////////




function recupererutilisateur($IdUtilisateur){

    $sql="SELECT * from utilisateur where IdUtilisateur=$IdUtilisateur";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute();

        $utilisateur=$query->fetch();
        return $utilisateur;
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
} // ---> cette fonction permet de récupérer un utilisateur via son 'IdUtilisateur'

   
 
function modifierutilisateur($utilisateur, $idutilisateur){
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE utilisateur SET 
                NomUtilisateur= :NomUtilisateur, 
                PrenomUtilisateur= :PrenomUtilisateur, 
                PseudoUtilisateur= :PseudoUtilisateur, 
                AdresseUtilisateur= :AdresseUtilisateur,
                Tel1Utilisateur= :Tel1Utilisateur,
                Tel2Utilisateur= :Tel2Utilisateur,
                GenreUtilisateur= :GenreUtilisateur,
                DatenaissUtilisateur= :DatenaissUtilisateur,
                EmailUtilisateur= :EmailUtilisateur,
                MpUtilisateur= :MpUtilisateur,
                RoleUtilisateur= :RoleUtilisateur
            WHERE IdUtilisateur= :IdUtilisateur'
        );
        $query->execute([
            'NomUtilisateur' => $utilisateur->getNom(),
            'PrenomUtilisateur' => $utilisateur->getPrenom(),
            'PseudoUtilisateur' => $utilisateur->getPseudo(),
            'AdresseUtilisateur' => $utilisateur->getAdresse(),
            'Tel1Utilisateur' => $utilisateur->getTel1(),
            'Tel2Utilisateur' => $utilisateur->getTel2(),
            'GenreUtilisateur' => $utilisateur->getGenre(),
            'DatenaissUtilisateur' => $utilisateur->getDatenaissance(),
            'EmailUtilisateur' => $utilisateur->getEmail(),
            'MpUtilisateur' => $utilisateur->getMotdepasse(),
            'RoleUtilisateur' => $utilisateur->getRole(),
            'IdUtilisateur' => $idutilisateur
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        $e->getMessage();
    }
}


function supprimerutilisateur($idutilisateur){
    $sql="DELETE FROM utilisateur WHERE IdUtilisateur=:IdUtilisateur";
    $db = config::getConnexion();
    $req=$db->prepare($sql);
    $req->bindValue(':IdUtilisateur', $idutilisateur);
    try{
        $req->execute();
    }
    catch(Exception $e){
        die('Erreur:'. $e->getMeesage());
    }
}

// Une fonction qui permet de modifier l'attribut role d'un utilisateur via son ID en 'administrateur'
function definir_comme_administrateur($idutilisateur){
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE utilisateur SET 
                RoleUtilisateur= :RoleUtilisateur
            WHERE IdUtilisateur= :IdUtilisateur'
        );
        $query->execute([
            'RoleUtilisateur' => "administrateur",
            'IdUtilisateur' => $idutilisateur
    
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        $e->getMessage();
    }
}

// Une fonction qui permet de modifier l'attribut role d'un utilisateur via son ID en 'client'
function definir_comme_client($idutilisateur){
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE utilisateur SET 
                RoleUtilisateur= :RoleUtilisateur
            WHERE IdUtilisateur= :IdUtilisateur'
        );
        $query->execute([
            'RoleUtilisateur' => "client",
            'IdUtilisateur' => $idutilisateur
    
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        $e->getMessage();
    }
}


    function connexionUser($email,$password){
        $sql="SELECT * FROM utilisateur WHERE EmailUtilisateur='" . $email . "' and MpUtilisateur = '". $password."'";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();
            $count=$query->rowCount();
            if($count==0) {
                $message = "E-mail ou mot de passe incorrects";
            } else {
                $x=$query->fetch();
                $message = $x['role'];
            }
        }
        catch (Exception $e){
                $message= " ".$e->getMessage();
        }
      return $message;
    }

    function verif_admin($email,$password){
        $sql="SELECT * FROM utilisateur WHERE EmailUtilisateur='" . $email . "' and MpUtilisateur = '". $password."' and RoleUtilisateur = 'administrateur'";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();
            $count=$query->rowCount();
            if($count==0) // si il n'est pas administrateur
             { 
                $message = "Accès refusé, vous n'êtes pas administrateur"; 
             } 
            else 
            {
                $x=$query->fetch();
                $message = $x['role'];
            }
        }
        catch (Exception $e){
                $message= " ".$e->getMessage();
        }
      return $message;
    }

    function recupererutilisateur_via_email($email_utilisateur){

        $sql="SELECT * from utilisateur where EmailUtilisateur='" . $email_utilisateur . "'";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();
    
            $utilisateur=$query->fetch();
            return $utilisateur;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    } // ---> cette fonction permet de récupérer un utilisateur via son 'EmailUtilisateur'




}





?>


