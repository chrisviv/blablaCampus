var uploadField = document.getElementById("addPic");

uploadField.onchange = function() {
    var FileList = uploadField.files;

    console.log('width: '+ uploadField.width);
    
    if(this.files[0].size > 10485760){
       alert("File is too big!");
       this.value = "";
    }else{
        
    };
};


