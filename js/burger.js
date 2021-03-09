function plus1(){
    n = document.getElementById("qte1");
    if(n.value < 11){
    n.value++;
    }

}

function plus2(){
    if(n.value != 10){
    n = document.getElementById("qte2");
    n.value = parseInt(n.value)+1;
    }
}

function plus3(){
 
    n = document.getElementById("qte3");
    n.value = parseInt(n.value)+1;
    
}

function plus4(){
    if(n.value != 10){
    n = document.getElementById("qte4");
    n.value = parseInt(n.value)+1;
    }
}

function plus5(){
    n = document.getElementById("qte5");
    n.value = parseInt(n.value)+1;
}

function moins1(){
    if(n.value != 0){
    n = document.getElementById("qte1");
    n.value = parseInt(n.value)-1;
    }
}

function moins2(){
    if(n.value != 0){
    n = document.getElementById("qte2");
    n.value = parseInt(n.value)-1;
    }
}

function moins3(){
    if(n.value != 0){
    n = document.getElementById("qte3");
    n.value = parseInt(n.value)-1;
    }
}

function moins4(){
    if(n.value != 0){
    n = document.getElementById("qte4");
    n.value = parseInt(n.value)-1;
    }
}

function moins5(){
    if(n.value != 0){
    n = document.getElementById("qte5");
    n.value = parseInt(n.value)-1;
    }
}

function suppStock(){
    for(var i=0;i<5;i++){
        st=document.getElementsByClassName("stock")[i];
        st.style.display='none';
    }
}