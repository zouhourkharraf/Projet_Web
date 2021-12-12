
function verif_formulaire(e){

    //les éléments de la formulaire
   
    var nouveau_mp1 = document.forms["form1"]["new_password1"].value;
    var nouveau_mp2 = document.forms["form1"]["new_password2"].value;
    
    
    //l'emplacement des erreur
   
    var erreur_nouveau_mp1 = document.getElementById("erreur2");
    var erreur_nouveau_mp2 = document.getElementById("erreur3");    
    


   // le contrôle de saisie :
  
    
    if(nouveau_mp1=="")
    { erreur_nouveau_mp1.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Veuillez saisir votre nouveau mot de passe</div></p>'; 
    e.preventDefault(); 
     }
    else if( !(est_un_nombre(nouveau_mp1) ) || (nouveau_mp1.length<6)|| (nouveau_mp1.length>20)    )
    { erreur_nouveau_mp1.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Le mot de passe est invalid</div></p>'; 
    e.preventDefault(); 
    }
    else
    { erreur_nouveau_mp1.innerHTML=""; }
    
    
    if(nouveau_mp2=="")
    { erreur_nouveau_mp2.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Veuillez confirmer votre nouveau mot de passe</div></p>'; 
    e.preventDefault(); 
    }
    else if(nouveau_mp1 != nouveau_mp2)
    { erreur_nouveau_mp2.innerHTML='<p><div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Erreur!</span> Les deux mots de passe ne correspondent pas</div></p>'; 
    e.preventDefault(); 
    }
    else
    { erreur_nouveau_mp2.innerHTML=""; }
    
    
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
        