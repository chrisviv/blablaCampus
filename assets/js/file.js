var uploadField = document.getElementById("addPic");

uploadField.onchange = function() {
    var FileList = uploadField.files;

    console.log(FileList);
    
    if(this.files[0].size > 1048576){
       alert("File is too big!");
       this.value = "";
    }else{
        alert('ok')
    };
};


