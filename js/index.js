function openForm() {
document.getElementById("popupForm").style.display = "block";
document.getElementsByClassName("overlay")[0].style.display = "block";
bg = document.getElementsByClassName("main-content")[0].style;
}

function closeForm() {
document.getElementById("popupForm").style.display = "none";
document.getElementsByClassName("overlay")[0].style.display = "none";
}


function Verif_login(){
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
        missMail.textContent = "L'email doit s'écrire comme sous cette forme : monmail@mail.com";
        missMail.style.color = "red";
        Ok = false;
    }
    else{
        missMail.style.display = 'none';
    }
    
    
    return true;
}
