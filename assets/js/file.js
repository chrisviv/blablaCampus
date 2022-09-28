var uploadField = document.getElementById("addPic");
let dropContainer = document.querySelector('.labelPic')
let labelContent = document.querySelector('.labelContent')
let hiddenContent = document.querySelector('.hiddenContent')



dropContainer.ondragover = dropContainer.ondragenter = function(evt) {
    evt.preventDefault();
   
    labelContent.classList.add('none')
    hiddenContent.classList.remove('none') 
   
  };
  
dropContainer.ondragleave  = function(evt) {
    evt.preventDefault();
   
    labelContent.classList.remove('none')
    hiddenContent.classList.add('none') 
   
  };
  
  
  dropContainer.ondrop = function(evt) {
   
    uploadField.files = evt.dataTransfer.files;
    
    if( uploadField.files[0].size > 1048576){
        alert("File is too big!");
        uploadField.value = "";
     }else{
         alert('ok')
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
