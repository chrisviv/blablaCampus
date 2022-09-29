var uploadField = document.getElementById("addPic");
let dropContainer = document.querySelector('.labelPic')
let labelContent = document.querySelector('.labelContent')
let hiddenContent = document.querySelector('.hiddenContent')
let hiddenContent2 = document.querySelector('.hiddenContent2')
let check_false = document.querySelector('.check-false')
let nameImg = document.querySelector('.nameImg')



labelContent.ondragover = labelContent.ondragenter = function(evt) {
    evt.preventDefault();
   
    labelContent.classList.add('none')
    hiddenContent.classList.remove('none') 
   
  };
  dropContainer.ondragover = dropContainer.ondragenter = function(evt) {
    evt.preventDefault();
   
  };
  
  hiddenContent.ondragleave  = function(evt) {
    evt.preventDefault();
   
    labelContent.classList.remove('none')
    hiddenContent.classList.add('none') 
   
  };
  
  
  dropContainer.ondrop = function(evt) {
   
    uploadField.files = evt.dataTransfer.files;
    
    if( uploadField.files[0].size > 1048576){
        hiddenContent2.classList.remove('none')
        hiddenContent.classList.add('none')
        uploadField.value = "";
        check_false.src = "assets/img/fileX.svg"
        nameImg.textContent = "VOTRE FICHIER EST TRÈS LOURD"
        setTimeout(() => {
          labelContent.classList.remove('none')
          hiddenContent2.classList.add('none')
        }, "2000")
      }else{
        hiddenContent2.classList.remove('none')
        hiddenContent.classList.add('none')
        check_false.src = "assets/img/check.svg"
        nameImg.textContent = uploadField.files[0].name
       
     };
    
    console.log(uploadField.files);
    evt.preventDefault();
  };




  uploadField.onchange = function() {

    console.log(uploadField);
    
    if(this.files[0].size > 1048576){
       alert("File is too big!");
       this.value = "";
    }else{
        alert('ok')
    };
};
