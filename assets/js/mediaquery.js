

  let fullScreen = document.querySelector('.pcMain')
  let homePc = document.querySelector('.box-apli');
  let homeMobile = document.querySelector('.mainAccueil')
  let register = document.querySelector('.mainRegister')
  let login = document.querySelector('.mainLogin')
  let confirmation = document.querySelector('.mainConfirmation')
  let search = document.querySelector('.mainSearch')
  let add = document.querySelector('.mainAdd')
  let reservation = document.querySelector('.mainReservation')
  let messagerie = document.querySelector('.bookVadilateMain')
  let bookSeatMain = document.querySelector('.bookSeatMain')
  let list = document.querySelector('.listMain')
  let del = document.querySelector('.deleteMain')
  let delRide = document.querySelector('.deleteRideMain')
  let resetpw = document.querySelector('.mainReset')
  let cancel = document.querySelector('.cancelMain')
  
  
  function append(element, element2) {
 
      
    
      fullScreen.style = "display:flex;"
      if(document.body.contains(element2) != false){
      element.appendChild(element2)
      fullScreen.classList.remove('none')
    }
  
   
  }
  
  function childRemover(){
    document.body.appendChild(homePc.lastChild)
  }


var mediaqueryList = window.matchMedia("(max-width: 1024px)")

function handler(event) {
  if(event.matches) {
    if(document.body.contains(homeMobile) != false){
      homeMobile.classList.remove('none')
      
      
  }
  document.body.appendChild(homePc.lastChild)
  fullScreen.classList.add('none')
  } else {
    append(homePc, homeMobile)
    append(homePc, register)
    append(homePc, login)
    append(homePc, confirmation)
    append(homePc, search)
    append(homePc, add)
    append(homePc, reservation)
    append(homePc, messagerie)
    append(homePc, list)
    append(homePc, del)
    append(homePc, delRide)
    append(homePc, resetpw)
    append(homePc, cancel)
    append(homePc, bookSeatMain)
    if(document.body.contains(homeMobile) != false){
    homeMobile.classList.add('none')}
  }
}

handler(mediaqueryList)

// asociamos el manejador de evento
mediaqueryList.addEventListener('change', handler);