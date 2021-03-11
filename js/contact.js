//Vérification du formulaire
function Maj_Date() {
    var ajd=new Date();
    document.getElementById("contact_date").valueAsDate=ajd;//on met par défaut la date du contact 
}

function Verif_Vide(){//vérirfie les autres champs vides
    var obj=document.getElementById("objet");
    var cont=document.getElementById("contenu");
    var date_naiss=document.getElementById("naissance_date");

    if(date_naiss.valueAsDate==null){
        alert("Remplir le champ Date de naissance svp");
        return false;
    }
    if(objet.value.length==0){
        alert("Remplir le champ Objet svp");
        return false;
    }  
    if(contenu.value.length==0){
        alert("Remplir le champ Contenu svp");
        return false;
    }  
    return true;//si aucun champ vide   
}



function valider() {//on va vérifier les champs nom, prénom et email  
    var Ok = true;
    
    //Validation du nom
    let nom = document.getElementById("nom");
    let missNom = document.getElementById("nom_manquant");
    let nomValid = /^[a-zA-ZéèîïÉÈÎÏ-\s]+$/;
    if(nom.value.length==0){//si champ nom vide
		missNom.textContent = 'Entrez votre nom !';
        missNom.style.color = 'red';
        Ok = false;
	}
    else if (nomValid.test(nom.value) == false) { //Si le format de données est incorrect
        missNom.textContent = "Le nom ne doit pas contenir de chiffres ou de caractères spéciaux !";
        missNom.style.color = "red";
        Ok = false;
    }
    else{
        missNom.style.display = 'none';
    }

    //Validation du prénom
    let prenom = document.getElementById("prenom");
    let missPrenom = document.getElementById("prenom_manquant");
    let prenomValid = /^[a-zA-ZéèîïÉ-\s]+$/;
    if (prenom.value.length==0) { 
        missPrenom.textContent = 'Entrez votre prénom !';
        missPrenom.style.color = 'red';
        Ok = false;
    }
    else if (prenomValid.test(prenom.value) == false) { 
        missPrenom.textContent = "Le prénom ne doit pas contenir de chiffres ou de caractères spéciaux !";
        missPrenom.style.color = "red";
        Ok = false;
    }
    else{missPrenom.style.display = 'none';}

    //Validation du mail
    let mail = document.getElementById("email");
    let missMail = document.getElementById("email_manquant");
    let mailValid = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
    if (mail.value.length==0) { //si champ nom vide
        missMail.textContent = 'Entrez votre mail !';
        missMail.style.color = 'red';
        Ok = false;
    }
    else if (mailValid.test(mail.value) == false) { 
        missMail.textContent = "Le mail doit s'écrire comme sous cette forme : monmail@mail.com";
        missMail.style.color = "red";
        Ok = false;
    }
    else{
        missMail.style.display = 'none';
    }
    
    //Validation de la date
    let d= document.getElementById("naissance_date");
    let missd = document.getElementById("date_manquant");
    if(d.valueAsDate==null){
        missd.textContent = 'Entrez votre date de naissance !';
        missd.style.color = 'red';
        Ok = false;
    }
    else{
        missd.style.display = 'none';
    }
    
    //Validation de l'objet
    let o= document.getElementById("objet");
    let misso = document.getElementById("objet_manquant");
    if(o.value.length==0){
        misso.textContent = 'Entrez un objet !';
        misso.style.color = 'red';
        Ok = false;
    }
    else{
        misso.style.display = 'none';
    }
    
    
    //Validation de la date
    let c= document.getElementById("contenu");
    let missc = document.getElementById("contenu_manquant");
    if(c.value.length==0){
        missc.textContent = 'Entrez du contenu !';
        missc.style.color = 'red';
        Ok = false;
    }
    else{
        missc.style.display = 'none';
    }
    
    
    if (Ok) {//champs Nom,prenom et mail validés
        let Validnom=nom.value;
        let Validprenom=prenom.value;
        let Validmail=mail.value;
        let contact = {
            Validnom,
            Validprenom,
            Validmail
        };
        console.log(contact); 
        return Ok;
    }
    
    
    
    return Ok;
}



function Verif(){
    Maj_Date();
    if(!valider()){
        return false;
    }
    if(!Verif_Vide()){
        return false;
    }
    console.log("end");
    return true;
}