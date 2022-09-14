let editDel = document.querySelectorAll('.edit-delete-form');
let infoTrajet  = document.querySelectorAll('.infoTrajet ');

function c(){
    
for (let i = 0; i < infoTrajet.length; i++) {
    infoTrajet[i].addEventListener('click', ()=>{   
        editDel[i].classList.remove('none');
    
    })}
}

c()