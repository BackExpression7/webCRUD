
function modale(){
    let modal1 = document.getElementById('modal1');
        modal1.style.display ='block';

}

function cerrar(){
    let modal1 = document.getElementById('modal1');
    let modalactual= document.getElementById('modalactual');
    let modalbiblioteca= document.getElementById('modalbiblioteca');
        modal1.style.display ='none';
        modalactual.style.display ='none';
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