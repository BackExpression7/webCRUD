
function modale(){
    let modal1 = document.getElementById('modal1');
        modal1.style.display ='block';

}

function cerrar(){
    let modal1 = document.getElementById('modal1');
    let modalactual= document.getElementById('modalactual');
        modal1.style.display ='none';
        modalactual.style.display ='none';
       
}
function cerrar2(){
    let modalbiblioteca= document.getElementById('modalbiblioteca');
    modalbiblioteca.style.display ='none';
}

function modalactual(){
    let modalactual= document.getElementById('modalactual');
    modalactual.style.display ='block';
}
function modalbiblioteca(){
    let modalbiblioteca= document.getElementById('modalbiblioteca');
    modalbiblioteca.style.display ='block';
    
}
function modal3(){
    let modal3= document.getElementById('modal3');
    if (modal3.style.display =='block') {
        modal3.style.display ='none';
    }else{
    modal3.style.display ='block';
    }
}
