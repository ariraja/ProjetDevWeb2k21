

<script type="text/javascript">
    
//ajout au panier 
function add_panier(numero){
    var xmlhttp = new XMLHttpRequest();
    let pic=document.getElementById("pic"+numero).getAttribute("src");
    let ref=document.getElementById("ref"+numero);
    let nom=document.getElementById("nom_produit"+numero);
    let prix=document.getElementById("prix"+numero);
    console.log(pic,ref.innerHTML,prix.innerHTML,nom.innerHTML);
        
    let quantite = document.getElementById("qte"+numero);
    console.log(quantite.value);
    
    if(quantite.value==0){return false;}
    
    let url="commander.php?pic="+pic+"&ref="+ref.innerHTML+"&nom="+nom.innerHTML+"&prix="+prix.innerHTML+"&qte="+quantite.value;
    console.log(url);
    xmlhttp.open("GET",url,true);
    xmlhttp.send();
}
    
function delete_panier(numero){
    var xmlhttp = new XMLHttpRequest();
    let ref=document.getElementById("ref"+numero);
    let url="commander.php?ref="+ref.innerHTML;
    xmlhttp.open("GET",url,true);
    xmlhttp.send();
}
    
    
</script>


<?php
    function ajout_panier($pic,$ref,$nom,$prix,$qte){
        $article=['photo' => $pic,'ref' => $ref, 'nom' =>$nom, 'prix'=>$prix, 'qte' => $qte];
        array_push($_SESSION['panier'],$article);
    }

    function supp_panier($ref){
        echo "je vais supp";
        foreach($_SESSION['panier'] as $art){
            if(in_array($ref,$art)){
                unset($art['photo']);
                unset($art['ref']);
                unset($art['nom']);
                unset($art['prix']);
                unset($art['qte']);
            }
        }
    }


    var_dump($_SESSION['panier']);
?>