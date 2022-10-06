let btn = document.querySelector('.info-legales')
let modal = document.querySelector('.legales')
let xmark = document.querySelector('.xmark')

btn.addEventListener('click', ()=>{
    modal.classList.remove('none')
} )

xmark.addEventListener('click', ()=>{
    modal.classList.add('none')
} )
