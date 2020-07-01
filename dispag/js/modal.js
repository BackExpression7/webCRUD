
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

function opciones(){
    let modal2 = document.getElementById('modal2');
    if(modal2.style.display =='none'){
    modal2.style.display ='block';
    }else{
        modal2.style.display='none'
    }
}

function modalactual(){
    let modalactual= document.getElementById('modalactual');
    modalactual.style.display ='block';
}