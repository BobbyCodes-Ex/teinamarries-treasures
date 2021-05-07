/*function showAlert(){
    $("#alertBox").addClass("show");  
   }
   function hideAlert(){
     $ ("#alertBox").removeClass("show"); 
   }

   /*function validateForm(){
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
   document.forms["form"].submit();}*/

   function validateContact() {
    for (i = 0; i < document.forms["contactForm"].getElementsByTagName("input").length; i++) {
        if (document.forms["contactForm"][i].type === "text" || document.forms["contactForm"][i].type === "date") {
            if (document.forms["contactForm"][i].value === "") {
                $('.alert').removeClass('d-none').addClass('show');
                document.forms["contactForm"][i].classList.add("required-input");
            } else {
                document.forms["contactForm"][i].classList.remove("required-input");
            }
        }
            
    }

    document.forms["contactForm"].submit();
}

