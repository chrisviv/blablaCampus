let editDel = document.querySelectorAll('.edit-delete-form');
let infoTrajet  = document.querySelectorAll('.infoTrajet ');

function c(){
    
for (let i = 0; i < infoTrajet.length; i++) {
    infoTrajet[i].addEventListener('click', ()=>{

        var current = document.getElementsByClassName("dactive");
        current[0].className = current[0].className.replace("none", "");
        editDel[i].className += " none";
        }
           
    
)}

}

c()