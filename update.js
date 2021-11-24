
function verification(){

//les éléments de la formulaire
var nom= document.forms["form1"]["nom1"].value;
var prenom= document.forms["form1"]["prenom"].value;

var adresse= document.forms["form1"]["adresse"].value;
var tel1= document.forms["form1"]["tel1"].value;
var tel2= document.forms["form1"]["tel2"].value;

var genre= document.forms["form1"]["genre"];

var date= document.forms["form1"]["date_naiss"].value;



//l'emplacement des erreur
var erreur_nom=document.getElementById("erreur1");
var erreur_prenom=document.getElementById("erreur2");
var erreur_adresse=document.getElementById("erreur4");
var erreur_tel1=document.getElementById("erreur5");
var erreur_tel2=document.getElementById("erreur6");
var erreur_genre=document.getElementById("erreur7");
var erreur_date=document.getElementById("erreur8");



if(nom=="")
{ erreur_nom.innerHTML=""; }
else if(!(nom.match(/^[A-Za-z]+$/) ))
{ erreur_nom.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Veuillez saisir un nom valid</div></p>'; }
else
{ erreur_nom.innerHTML=""; }


if(prenom=="")
{ erreur_prenom.innerHTML=""; }
else if(!(prenom.match(/^[A-Za-z]+$/) ))
{ erreur_prenom.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Veuillez saisir un prénom valid</div></p>'; }
else
{ erreur_prenom.innerHTML=""; }


//le pseudo sera modifié automatiquement

if(adresse=="")
{ erreur_adresse.innerHTML=""; }


if(tel1=="")
{ erreur_tel1.innerHTML=""; }
else if( !(tel1.match(/[0-9]/g))||( tel1.length>8) )
{ erreur_tel1.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Veuillez saisir un numéro valid</div></p>'; }
else
{ erreur_tel1.innerHTML=""; }


if(tel2=="")
{ erreur_tel2.innerHTML=""; }
else if( !(tel2.match(/[0-9]/g))||( tel2.length>8) )
{ erreur_tel2.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Veuillez saisir un numéro valid</div></p>'; }
else
{ erreur_tel2.innerHTML=""; }


if(genre.value=="")
{ erreur_genre.innerHTML=""; }



}


function verif_formulaire(e){ 
    e.preventDefault(); 
    verification();
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







