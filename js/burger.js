function plus1(){
    n = document.getElementById("qte1");
    st=document.getElementsByClassName("stock")[0];
    p = document.getElementById("plus1");
    m = document.getElementById("moins1");
    if(n.value < parseInt(st.textContent)){
        n.value++;
        m.disabled=false;
    }
    if(n.value == parseInt(st.textContent)){
        p.disabled = true;
    }
}

function plus2(){
    n = document.getElementById("qte2");
    st=document.getElementsByClassName("stock")[1];
    p = document.getElementById("plus2");
    m = document.getElementById("moins2");
    if(n.value < parseInt(st.textContent)){
        n.value++;
        m.disabled=false;
    }
    if(n.value == parseInt(st.textContent)){
        p.disabled = true;
    }
}

function plus3(){
    n = document.getElementById("qte3");
    st=document.getElementsByClassName("stock")[2];
    p = document.getElementById("plus3");
    m = document.getElementById("moins3");
    if(n.value < parseInt(st.textContent)){
        n.value++;
        m.disabled=false;
    }
    if(n.value == parseInt(st.textContent)){
        p.disabled = true;
    }
}

function plus4(){
    n = document.getElementById("qte4");
    st=document.getElementsByClassName("stock")[3];
    p = document.getElementById("plus4");
    m = document.getElementById("moins4");
    if(n.value < parseInt(st.textContent)){
        n.value++;
        m.disabled=false;
    }
    if(n.value == parseInt(st.textContent)){
        p.disabled = true;
    }
}

function plus5(){
    n = document.getElementById("qte5");
    st=document.getElementsByClassName("stock")[4];
    p = document.getElementById("plus5");
    m = document.getElementById("moins5");
    if(n.value < parseInt(st.textContent)){
        n.value++;
        m.disabled=false;
    }
    if(n.value == parseInt(st.textContent)){
        p.disabled = true;
    }
}

function moins1(){
    n = document.getElementById("qte1");
    p = document.getElementById("plus1");
    m = document.getElementById("moins1");
    if(n.value > 0){
        p.disabled = false;
        n.value--;
    }
    if(n.value == 0){
        m.disabled = true;
    }

}

function moins2(){
    n = document.getElementById("qte2");
    p = document.getElementById("plus2");
    m = document.getElementById("moins2");
    if(n.value > 0){
        p.disabled = false;
        n.value--;
    }
    if(n.value == 0){
        m.disabled = true;
    }
}

function moins3(){
    n = document.getElementById("qte3");
    p = document.getElementById("plus3");
    m = document.getElementById("moins3");
    if(n.value > 0){
        p.disabled = false;
        n.value--;
    }
    if(n.value == 0){
        m.disabled = true;
    }
}

function moins4(){
    n = document.getElementById("qte4");
    p = document.getElementById("plus4");
    m = document.getElementById("moins4");
    if(n.value > 0){
        p.disabled = false;
        n.value--;
    }
    if(n.value == 0){
        m.disabled = true;
    }
}

function moins5(){
    n = document.getElementById("qte5");
    p = document.getElementById("plus5");
    m = document.getElementById("moins5");
    if(n.value > 0){
        p.disabled = false;
        n.value--;
    }
    if(n.value == 0){
        m.disabled = true;
    }
}

function suppStock(){
    for(var i=0;i<5;i++){
        st=document.getElementsByClassName("stock")[i];
        st.style.display='none';
    }
}

function openForm() {
document.getElementById("popupForm").style.display = "block";
document.getElementsByClassName("overlay")[0].style.display = "block";
bg = document.getElementsByClassName("main-content")[0].style;
}

function closeForm() {
document.getElementById("popupForm").style.display = "none";
document.getElementsByClassName("overlay")[0].style.display = "none";
}




























