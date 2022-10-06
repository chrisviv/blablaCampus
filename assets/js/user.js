let userBtn = document.getElementById('userBtn');
let userPanel = document.getElementById('userPanel');

userBtn.addEventListener('click', ()=>{
    userPanel.classList.toggle('none')
})

let front = document.querySelector('.front')
let back = document.querySelector('.back')
setInterval(() => {
    console.log('ANIMATION');
    
    setTimeout(()=>{
        front.classList.remove('front-animation')
        back.classList.remove('back-animation')
        front.classList.add('front-reverse')
        back.classList.add('back-reverse')
    }, 1000)
    setTimeout(()=>{
        front.classList.add('front-animation')
        back.classList.add('back-animation')
        front.classList.remove('front-reverse')
        back.classList.remove('back-reverse')
    }, 2500)

}, 6000);
