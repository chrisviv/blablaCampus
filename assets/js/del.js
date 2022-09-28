let editDel = document.querySelectorAll('.edit-delete-form');

let infoTrajet  = document.querySelectorAll('.infoTrajet ');

function editDelTravel(){
    
for (let i = 0; i < infoTrajet.length; i++) {
    infoTrajet[i].addEventListener('click', ()=>{   
        timeout(editDel[i])
        
    
    })}

    function timeout(e){
       
        e.className = e.className.replace("none", "");

        if(e.classList.contains("none") === false){
            setTimeout(()=>{
                e.classList.add('none')
            }, 3000)
        }
        
    }
}



let annulerbox = document.querySelectorAll('.annulerbox')
let deleteRideBtn = document.querySelectorAll('.deleteRideBtn')

function annulerReservation(){
for (let i = 0; i < annulerbox.length; i++) {
    annulerbox[i].addEventListener('click', ()=>{   
        timeout(deleteRideBtn[i])
        
    
    })}

    function timeout(e){
       
        e.className = e.className.replace("none", "");

        if(e.classList.contains("none") === false){
            setTimeout(()=>{
                e.classList.add('none')
            }, 3000)
        }
        
    }
}


    annulerReservation()
editDelTravel()
