$(document).ready(function() {
    function clearFields(){
       $("#user_email").val("");
       $("#user_name").val("");
       $("#user_password").val("");
       $("#confirm_password").val("");
   }
    function isValidEmail(email){
       const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/igm;
       return re.test(email);
   }
    $('#registerButton').click(function (event) {
       event.preventDefault();
       let username = $("#user_name").val();
       let email = $("#user_email").val()
       let password = $("#user_password").val();
       let confirm_password = $("#confirm_password").val();
        if(username && password && email && confirm_password){
           let validForm = true;
           let size = password.length
           const isEmailValid = isValidEmail(email);
           if(!isEmailValid){
               alert("Please Enter Valid Email");
               validForm = false;
               clearFields();
           }
           if(size < 6 || size > 20){
               validForm = false;
               alert("Password must contains at 6 characters and cannot exceeed 20 characters");
               clearFields()
           }
           else{
               if(confirm_password !== password){
                   alert("Password don't match");
                   validForm = false;
                   clearFields();
               }
           }
           if(validForm) {
                let data = {
                   username: username,
                   email: email,
                   password: password
               };
                $.ajax({
                   url: "users/user_signup.php",
                   method:"POST",
                   data: data,
                   success: (data) => {
                        console.log(data);
                       if(data.includes("User Already Exists")){
                           alert("User Already Exists");
                       }
                       else if(data.includes("New record")){
                          alert("User Registration Successful");
                          window.location = "http://usproductmart.com/login.php";
                       }
                       else if(data.includes("Error")){
                          alert("Error");
                       }
                     }
               });
               clearFields();
           }
           
       }
       else {
           alert("All Fields are required");
           clearFields();
       }
   });
});
