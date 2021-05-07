function showAlert(){
    $("#alertBox").addClass("show");  
   }
   function hideAlert(){
     $ ("#alertBox").removeClass("show"); 
   }

   function validateForm(){
       var isValid = true;
   var inputList = document.getElementById("form").getElementsByTagName("input");
   for (element of inputList){
       if(element.value == ""){
           showAlert();
       isValid = false;
       }
   }
   if(isValid){
       hideAlert();
   } else{
       showAlert();
   }
   }
   if(isValid){
   document.forms["form"].submit();}