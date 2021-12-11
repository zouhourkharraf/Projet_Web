
function verification(){

    //les éléments de la formulaire
    var ancien_mp = document.forms["form1"]["old_password"].value;
    var nouveau_mp1 = document.forms["form1"]["new_password1"].value;
    var nouveau_mp2 = document.forms["form1"]["new_password2"].value;
    
    
    //l'emplacement des erreur
    var erreur_ancien_mp = document.getElementById("erreur1");
    var erreur_nouveau_mp1 = document.getElementById("erreur2");
    var erreur_nouveau_mp2 = document.getElementById("erreur3");    
    


   // le contrôle de saisie :
    if(ancien_mp=="")
    { erreur_ancien_mp.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Veuillez saisir votre ancien mot de passe</div></p>'; }
    else
    { erreur_ancien_mp.innerHTML=""; }
    
    
    if(nouveau_mp1=="")
    { erreur_nouveau_mp1.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Veuillez saisir votre nouveau mot de passe</div></p>'; }
    else if( !(nouveau_mp1.match(/[0-9]/g)) || (nouveau_mp1.length<6)|| (nouveau_mp1.length>20)    )
    { erreur_nouveau_mp1.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Le mot de passe est invalid</div></p>'; }
    else
    { erreur_nouveau_mp1.innerHTML=""; }
    
    
    if(nouveau_mp2=="")
    { erreur_nouveau_mp2.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Veuillez confirmer votre nouveau mot de passe</div></p>'; }
    else if(nouveau_mp1 != nouveau_mp2)
    { erreur_nouveau_mp2.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Les deux mots de passe ne correspondent pas</div></p>'; }
    else
    { erreur_nouveau_mp2.innerHTML=""; }
    
    
    }
    
    
    function verif_formulaire(e){ 
        e.preventDefault(); 
        verification();
    }
     

    
    
    