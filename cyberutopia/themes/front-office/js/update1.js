
function verif_formulaire(e){

//les éléments de la formulaire
var nom= document.forms["form1"]["nom1"].value;
var prenom= document.forms["form1"]["prenom"].value;
var ps= document.forms["form1"]["pseudo"];
var adresse= document.forms["form1"]["adresse"].value;
var tel1= document.forms["form1"]["tel1"].value;
var tel2= document.forms["form1"]["tel2"].value;

var date= document.forms["form1"]["date_naiss"].value;



//l'emplacement des erreur
var erreur_nom=document.getElementById("erreur1");
var erreur_prenom=document.getElementById("erreur2");
var erreur_adresse=document.getElementById("erreur4");
var erreur_tel1=document.getElementById("erreur5");
var erreur_tel2=document.getElementById("erreur6");
var erreur_date=document.getElementById("erreur8");



if(nom=="")
{ erreur_nom.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Veuillez saisir votre nom</div></p>'; 
e.preventDefault();
}
else if(!(nom.match(/^[A-Za-z]+$/) ))
{ erreur_nom.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Veuillez saisir un nom valid</div></p>'; 
e.preventDefault();
}
else
{ erreur_nom.innerHTML=""; }


if(prenom=="")
{ erreur_prenom.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Veuillez saisir votre prénom</div></p>'; 
e.preventDefault();
}
else if(!(prenom.match(/^[A-Za-z]+$/) ))
{ erreur_prenom.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Veuillez saisir un prénom valid</div></p>';
e.preventDefault();
}
else
{ erreur_prenom.innerHTML="";  }


if( (nom!="") && (prenom!="") )
{ ps.value=nom+" "+prenom; }

if(adresse=="") 
{ erreur_adresse.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Veuillez saisir votre adresse</div></p>';
e.preventDefault();
}
else
{ erreur_adresse.innerHTML=""; }


if(tel1=="")
{ erreur_tel1.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Veuillez saisir votre numéro</div></p>';
e.preventDefault();
}
else if( !(est_un_nombre(tel1) ) ||( tel1.length>8) )
{ erreur_tel1.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Veuillez saisir un numéro valid</div></p>';
e.preventDefault();
}
else
{ erreur_tel1.innerHTML=""; }


if(tel2=="")
{ erreur_tel2.innerHTML=""; }
else if( !(est_un_nombre(tel2) ) ||( tel2.length>8) )
{ erreur_tel2.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Veuillez saisir un numéro valid</div></p>';
e.preventDefault();
}
else
{ erreur_tel2.innerHTML=""; }





}

//permet de générer automatiquement le pseudo à partir du nom et du prénom si on clique sur le champs ou lors de la vérification de la formulaire
function generer_pseudo()
{
    var nom= document.forms["form1"]["nom1"].value;
    var prenom= document.forms["form1"]["prenom"].value;
    var ps= document.forms["form1"]["pseudo"];

    if( (nom!="") && (prenom!="") )
{ ps.value=nom+" "+prenom; }
}



 // permet de vérifier si une chaine de caractères passée en paramères est composée uniquement des chiffres
 function est_un_nombre(value) 
 {  var i=0;
      while( ( i<value.length )&&( value.charAt(i).match(/[0-9]/g) ) )
      {
          i++;
      }
      if((i == value.length)&&( value.charAt(i-1).match(/[0-9]/g) ) )
      {
          return true;
      }
      else
      {
          return false;
      }
 

 }
 
 
 











