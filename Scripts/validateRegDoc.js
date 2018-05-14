function valName() {
    var valid = true;
    var firstName = document.getElementById("firstname").value;
    var lastName = document.getElementById("lastname").value;

    var fError = document.getElementById("firstnameError");
    if (!firstName.match(/^[a-zA-Z]+\-*[a-zA-Z]+$/)) {
        fError.innerHTML = "Invalid First Name";
        valid = false;
    }
    else {
        fError.innerHTML = "";
    }
    var lError = document.getElementById("lastnameError");
    if (!lastName.match(/^[a-zA-Z]+\-*[a-zA-Z]+$/)) {
        lError.innerHTML = "Invalid Last Name";
        valid = false;
    }
    else {
        lError.innerHTML = "";
    }
    return valid;
}

function valPass() {
    var pw = document.getElementById("pw").value;
    var valid = true;
    var pError = document.getElementById("pwError");
    if (pw.length < 8) {
        pError.innerHTML = "Enter password with at least 8 characters.";
        valid = false;
    }
    if (!pw.match(/[a-zA-Z]/)) {
        pError.innerHTML = pError.innerHTML + " <br> Enter password with at least one letter.";
        valid = false;
    }
    if (!pw.match(/\d/)) {
        pError.innerHTML = pError.innerHTML + " <br> Enter password with at least one digit.";
        valid = false;
    }
    if (valid) {
        pError.innerHTML = "";
    }
    return valid;
}

function confPass() {
    var pw = document.getElementById("pw").value;
    var confpw = document.getElementById("confpw").value;
    var confError = document.getElementById("confpwError");
    var valid = true;
    if (pw != confpw) {
        confError.innerHTML = "Passwords do not match";
        valid = false;
    }
    else {
        confError.innerHTML = "";
    }
    return valid;
}

function valEmail() {
    var email = document.getElementById("mail").value;
    var mailError = document.getElementById("mailError");
    var valid = true;
    if (!email.match(/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)) {
        mailError.innerHTML = "Invalid Email";
        valid = false;
    }
    else {
        mailError.innerHTML = "";
    }
    return valid;
}

function valBirth() {
    var birth = document.getElementById("birthday").value;
    var bError = document.getElementById("birthdayError");
    var valid = true;
    if (!birth.match(/^(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d$/)) {
        bError.innerHTML = "Invalid Birthday";
        valid = false;
    }
    else {
        bError.innerHTML = "";
    }
    return valid;
}

function valPhone() {
    var phone = document.getElementById("phone").value;
    var phoneError = document.getElementById("phoneError");
    var valid = true;
    if (!phone.match(/^\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})$/)) {
        phoneError.innerHTML = "Invalid Phone Number";
        valid = false;
    }
    else{
        phoneError.innerHTML = "";
    }
    return valid;
}

/*function changeAlert(){
    var topAlert = document.getElementById("alert");
    topAlert.style.color="Red";
    return false;
}*/

function validateForm() {
    var validArray = new Array(6);
    validArray[0]=valName();
    validArray[1]=valPass();
    validArray[2]=confPass();
    validArray[3]=valEmail();
    validArray[4]=valBirth();
    validArray[5]=valPhone();
    for(var i=0;i<6;i++){
        if(!validArray[i]){
            //var a = changeAlert();
            return false;
        }
    }
    return true;
}