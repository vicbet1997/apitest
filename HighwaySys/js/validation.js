function validateLogIn(){
    var email= document.getElementById('email').value;
    var pass= document.getElementById('password').value;
    var mess = document.getElementById('messagelogin');

    if(email.length == 0){
        mess.innerHTML = "Enter a valid email Address!";
        return false;
    }else if(pass.length == 0){
        mess.innerHTML = "You have not entered password";
        return false;
    }
    return true;
}

function validateRegister(){
    var name = document.getElementById('name').value;
    var lname = document.getElementById('lname').value;
    var phone = document.getElementById('phone').value;
    var mess = document.getElementById('messagesignup');
    if(name.length == 0 || lname.length == 0){
        mess.innerHTML = "* Fill in all values";
        return false;
    }
    if(name.length < 3){
        // alert("here now ");
        mess.innerHTML = "Enter a correct First Name";
        return false;
    }
    // alert("here1");
    if(lname.length < 3){
        mess.innerHTML = "Enter a correct second name";
        return false;
    }
    // alert("here1");
     var phoneRegEx = /^\d{10}$/;
    
    if(!phone.match(phoneRegEx)){
        mess.innerHTML = "Enter a correct phone number";
        return false;
    }
    // alert("here1");
    return true;
}
