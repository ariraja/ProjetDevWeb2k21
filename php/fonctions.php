<script type="text/javascript">
    
//ajout au panier 
function add_panier(numero){
    var xmlhttp = new XMLHttpRequest();
    let pic=document.getElementById("pic"+numero).getAttribute("src");
    let ref=document.getElementById("ref"+numero);
    let nom=document.getElementById("nom_produit"+numero);
    let prix=document.getElementById("prix"+numero);
    let quantite_max=document.getElementById("qte_max"+numero);
    console.log(pic,ref.innerHTML,prix.innerHTML,nom.innerHTML,quantite_max.innerHTML);
        
    let quantite = document.getElementById("qte"+numero);
    console.log(quantite.value);
    
    if(quantite.value==0){return false;}
    
    let url="panier.php?pic="+pic+"&ref="+ref.innerHTML+"&nom="+nom.innerHTML+"&prix="+prix.innerHTML+"&qte_max="+quantite_max.innerHTML+"&qte="+quantite.value;
    console.log(url);
    xmlhttp.open("GET",url,true);
    xmlhttp.send();
    
}
    
function delete_panier(numero){
    var xmlhttp = new XMLHttpRequest();
    let ref=document.getElementById("ref"+numero);
    let url="deletePanier.php?ref="+ref.innerHTML;
    xmlhttp.open("GET",url,true);
    xmlhttp.send();
}
    
function maj_panier(vide){
    var xmlhttp = new XMLHttpRequest();
    let url="majPanier&Stock.php?ok="+true;
    xmlhttp.open("GET",url,true);
    xmlhttp.send();
    console.log(url);
    if(vide==true){
         window.location = "panier.php";
    }
    else{
        window.location = "commander.php";// changer de page
    }
}
    
    
</script>
