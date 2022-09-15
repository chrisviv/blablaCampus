let editDel = document.querySelectorAll('.edit-delete-form');

let infoTrajet  = document.querySelectorAll('.infoTrajet ');

function c(){
    
for (let i = 0; i < infoTrajet.length; i++) {
    infoTrajet[i].addEventListener('click', ()=>{   
        coco(editDel[i])
        
    
    })}

    function coco(e){
       
        e.className = e.className.replace("none", "");

        if(e.classList.contains("none") === false){
            setTimeout(()=>{
                e.classList.add('none')
            }, 3000)
        }
        console.log(e);
        
    }
}

c()