function verif(){
if(f.id_produit.value==""){
alert ('ajouter l id svp !! ');
return false;
}
if(f.nom.value==""){
    alert ('ajouter nom svp !! ');
    return false;
    }

    if(f.descr.value==""){
        alert ('description !!!');
        return false;
        }
      
            if(f.code_categ.value==""){
                alert ('code de categorie !!!');
                return false;
                }
                if(f.id_scateg.value==""){
                    alert ('code de famille');
                    return false;
                    }
                 
                        if(f.pu_achat.value==""){
                            alert ('prix achat !!!');
                            return false;
                            }
                            if(f.pu_vente.value==""){
                                alert ('prix vente !!');
                                return false;
                                }
                                if(f.qte_stock.value==""&&f.qte_stock.value>0){
                                    alert ('qte doit etre sup 0 et non null !!');
                                    return false;
                                    }
                                    
                                
                                                    
                    
                            
        
    




    return true ;
}