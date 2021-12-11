
function verification(){

//les éléments de la formulaire
var nom= document.forms["form1"]["nom1"].value;
var prenom= document.forms["form1"]["prenom"].value;
var ps= document.forms["form1"]["pseudo"];

var adresse= document.forms["form1"]["adresse"].value;
var tel1= document.forms["form1"]["tel1"].value;
var tel2= document.forms["form1"]["tel2"].value;

var sexe= document.forms["form1"]["sexe"];

var date= document.forms["form1"]["date_naiss"].value;

var mail1= document.forms["form1"]["mail1"].value;
var mail2= document.forms["form1"]["mail2"].value;
var mp1= document.forms["form1"]["mp1"].value;
var mp2= document.forms["form1"]["mp2"].value;


//l'emplacement des erreur
var erreur_nom=document.getElementById("erreur1");
var erreur_prenom=document.getElementById("erreur2");

var erreur_adresse=document.getElementById("erreur4");
var erreur_tel1=document.getElementById("erreur5");
var erreur_tel2=document.getElementById("erreur6");
var erreur_sexe=document.getElementById("erreur7");
var erreur_date=document.getElementById("erreur8");
var erreur_mail1=document.getElementById("erreur9");
var erreur_mail2=document.getElementById("erreur10");
var erreur_mp1=document.getElementById("erreur11");
var erreur_mp2=document.getElementById("erreur12");



if(nom=="")
{ erreur_nom.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Veuillez saisir votre nom</div></p>'; }
else if(!(nom.match(/^[A-Za-z]+$/) ))
{ erreur_nom.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Veuillez saisir un nom valid</div></p>'; }
else
{ erreur_nom.innerHTML=""; }


if(prenom=="")
{ erreur_prenom.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Veuillez saisir votre prénom</div></p>'; }
else if(!(prenom.match(/^[A-Za-z]+$/) ))
{ erreur_prenom.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Veuillez saisir un prénom valid</div></p>'; }
else
{ erreur_prenom.innerHTML=""; }


if( (nom!="") && (prenom!="") )
{ ps.value=nom+" "+prenom; }


if(adresse=="")
{ erreur_adresse.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Veuillez saisir votre adresse</div></p>'; }
else
{ erreur_adresse.innerHTML=""; }


if(tel1=="")
{ erreur_tel1.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Veuillez saisir votre numéro</div></p>'; }
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


if(sexe.value=="")
{ erreur_sexe.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Veuillez cocher une option</div></p>'; }
else
{ erreur_sexe.innerHTML=""; }


if(mail1=="")
{ erreur_mail1.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Veuillez saisir votre adresse mail</div></p>'; }
else
{ erreur_mail1.innerHTML=""; }


if(mail2=="")
{ erreur_mail2.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Veuillez confirmer votre adresse mail</div></p>'; }
else if(mail1 != mail2)
{ erreur_mail2.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Les adresses mails ne sont pas identiques</div></p>'; }
else
{ erreur_mail2.innerHTML=""; }


if(mp1=="")
{ erreur_mp1.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Veuillez taper votre mot de passe</div></p>'; }
else if( !(mp1.match(/[0-9]/g)) || (mp1.length<6)|| (mp1.length>20)    )
{ erreur_mp1.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Le mot de passe est invalid</div></p>'; }
else
{ erreur_mp1.innerHTML=""; }


if(mp2=="")
{ erreur_mp2.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Veuillez confirmer votre mot de passe</div></p>'; }
else if(mp1 != mp2)
{ erreur_mp2.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Les deux mots de passe ne correspondent pas</div></p>'; }
else
{ erreur_mp2.innerHTML=""; }





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







