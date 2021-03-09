function plus1(){
    n = document.getElementById("qte1");
    if(n.value < 11){
    n.value++;
    }
}

function plus2(){
    n = document.getElementById("qte2");
    if(n.value < 11){
    n.value++;
    }
}

function plus3(){
    n = document.getElementById("qte3");
    if(n.value < 11){
    n.value++;
    }
}

function plus4(){
    n = document.getElementById("qte4");
    if(n.value < 11){
    n.value++;
    }
}

function plus5(){
    n = document.getElementById("qte5");
    if(n.value < 11){
    n.value++;
    }
}

function moins1(){
    n = document.getElementById("qte1");
    if(n.value > 0){
    n.value--;
    }
//moins = document.getElementsByClassName("moins1");
//if(n.value == 0){
//    moins.disabled = true;
//    console.log('*');
//}
}

function moins2(){
n = document.getElementById("qte2");
if(n.value > 0){
n.value--;
}
}

function moins3(){
n = document.getElementById("qte3");
if(n.value > 0){
n.value--;
}
}

function moins4(){
n = document.getElementById("qte4");
if(n.value > 0){
n.value--;
}
}

function moins5(){
    n = document.getElementById("qte5");
    if(n.value > 0){
    n.value--;
    }
}

function suppStock(){
    for(var i=0;i<5;i++){
        st=document.getElementsByClassName("stock")[i];
        st.style.display='none';
    }
}

function commande(){
    prompt('wsh');
}




























