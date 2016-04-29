function validateEmpty(fld) {
    var error = "";
 
    if (fld.value.length == 0) {
        fld.style.background = '#ffb3b3'; 
        error = "The required field has not been filled in.\n"
    } else {
        fld.style.background = 'White';
    }
    return error;  
}


function trim(s)
{
  return s.replace(/^\s+|\s+$/, '');
}

function validateEmail(fld) {
    var error="";
    var tfld = trim(fld.value);                        // value of field with whitespace trimmed off
    var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/ ;
    var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/ ;
   
    if (fld.value == "") {
        fld.style.background = '#ffb3b3';
        error = "You didn't enter an email address.\n";
    } else if (!emailFilter.test(tfld)) {              //test email for illegal characters
        fld.style.background = '#ffb3b3' ;
        error = "Please enter a valid email address.\n";
    } else if (fld.value.match(illegalChars)) {
        fld.style.background = '#ffb3b3';
        error = "The email address contains illegal characters.\n";
    } else {
        fld.style.background = 'White';
    }
    return error;
}

function validateFormOnSubmit(theForm) {
var reason = "";

  reason += validateEmail(theForm.email);
  reason += validatePassword(theForm.pwd);
  reason += validateEmpty(theForm.from);
      
  if (reason != "") {
    alert("Some fields need correction:\n" + reason);
    return false;
  }

  alert("All fields are filled correctly");
  return false;
}






function validatePassword(fld) {
    var error = "";
    var illegalChars = /[\W_]/; // allow only letters and numbers 
 
    if (fld.value == "") {
        fld.style.background = '#ffb3b3';
        error = "You didn't enter a password.\n";
    } else if ((fld.value.length < 5) || (fld.value.length > 15)) {
        error = "The password is the wrong length. \n";
        fld.style.background = '#ffb3b3';
    } else if (illegalChars.test(fld.value)) {
        error = "The password contains illegal characters.\n";
        fld.style.background = '#ffb3b3';
    } else if (!((fld.value.search(/(a-z)+/)) && (fld.value.search(/(0-9)+/)))) {
        error = "The password must contain at least one numeral.\n";
        fld.style.background = '#ffb3b3';
    } else {
        fld.style.background = 'White';
    }
   return error;
} 



