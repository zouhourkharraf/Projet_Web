<?php
	class Utilisateur{
		private $idutilisateur=null;
		private $nom=null;
		private $prenom=null;
        private $pseudo=null;
		private $adresse=null;
		private $tel1=null;
		private $tel2=null;
		private $genre=null;
		private $datenaissance;
		private $email=null;
		private $motdepasse=null;
		private $role=null;

		
		function __construct( $idutilisateur,$nom, $prenom,$pseudo , $adresse,$tel1,$tel2,$genre,$datenaissance , $email, $motdepasse,$role)
        {
		    $this->idutilisateur=$idutilisateur;
			$this->nom=$nom;
			$this->prenom=$prenom;
            $this->pseudo=$pseudo;
            $this->adresse=$adresse;
            $this->tel1=$tel1;
            $this->tel2=$tel2;
            $this->genre=$genre;
            $this->datenaissance=$datenaissance;
			$this->email=$email;
            $this->motdepasse=$motdepasse;
            $this->role=$role;
			
		}

//Getters
		function getIdUtilisateur(){
			return $this->idutilisateur;
		}

		function getNom(){
			return $this->nom;
		}
		function getPrenom(){
			return $this->prenom;
		}
        function getPseudo(){
			return $this->pseudo;
		}
        function getAdresse(){
			return $this->adresse;
		}
        function getTel1(){
			return $this->tel1;
		}
        function getTel2(){
			return $this->tel2;
		}
        function getGenre(){
			return $this->genre;
		}
        function getDatenaissance(){
			return $this->datenaissance;
		}
		function getEmail(){
			return $this->email;
		}
        function getMotdepasse(){
			return $this->motdepasse;
		}
        function getRole(){
			return $this->role;
		}
	
//Setters


		function setIdUtilisateur(string $idutilisateur){
			$this->idutilisateur=$idutilisateur;
		}

		function setNom(string $nom){
			$this->nom=$nom;
		}
		function setPrenom(string $prenom){
			$this->prenom=$prenom;
		}
        function setPseudo(string $pseudo){
			$this->pseudo=$pseudo;
		}
        function setAdresse(string $adresse){
			$this->adresse=$adresse;
		}
        function setTel1(string $tel1){
			$this->tel1=$tel1;
		}
        function setTel2(string $tel2){
			$this->tel2=$tel2;
		}
        function setGenre(string $genre){
			$this->genre=$genre;
		}
        function setDatenaissance(string $datenaissance){
			$this->datenaissance=$datenaissance;
		}
		function setEmail(string $email){
			$this->email=$email;
		}
        function setMotdepasse(string $motdepasse){
			$this->motdepasse=$motdepasse;
		}
        function setRole(string $role){
			$this->role=$role;
		}

		
	}


?>