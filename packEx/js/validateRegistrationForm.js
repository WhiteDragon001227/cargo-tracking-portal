// JavaScript Document

function formValidation()  
{  
var username = registration.elements["username"].value;
var passid = registration.elements["password"].value;
var cpassid = registration.elements["cpassword"].value;
var uname = registration.elements["name"].value;
var uemail = registration.elements["mail"].value;
alert(uid+passid+cpassid+uname+uemail);
if(!userid_validation(username,7,20))return false;

document.registration.action = "./registerUserInDatabase.php";
document.registration.submit(); 
}

function userid_validation(uid,mx,my)  
{  
var uid_len = uid.length;  
if (uid_len == 0 || uid_len >= my || uid_len < mx)  
{  
alert("User Id should not be empty / length be between "+mx+" to "+my);  
uid.focus();  
return false;  
}  
return true;  
} 
function passid_validation(passid,mx,my)  
{  
var passid_len = passid.length;  
if (passid_len == 0 ||passid_len >= my || passid_len < mx)  
{  
alert("Password should not be empty / length be between "+mx+" to "+my);  
passid.focus();  
return false;  
}  
return true;  
}  

function allLetter(uname)  
{   
var letters = /^[A-Za-z]+$/;  
if(uname.value.match(letters))  
{  
return true;  
}  
else  
{  
alert('Username must have alphabet characters only');  
uname.focus();  
return false;  
}  
}
function ValidateEmail(uemail)  
{  
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
if(uemail.value.match(mailformat))  
{  
return true;  
}  
else  
{  
alert("You have entered an invalid email address!");  
uemail.focus();  
return false;  
}  
}  
