function checkPass()
{
//Store the password field objects into variables ...
	//alert('test');
	var pass1 = document.getElementById('password');
	var pass2 = document.getElementById('cpassword');
//Store the Confimation Message Object ...
//Set the colors we will be using ...
	var goodColor = "#66cc66";
	var badColor = "#ff6666";
//Compare the values in the password field
//and the confirmation field
	if(pass1.value == pass2.value){
//The passwords match.
//Set the color to the good color and inform
//the user that they have entered the correct password
		pass2.style.backgroundColor = goodColor;
	}else{
//The passwords do not match.
//Set the color to the bad color and
//notify the user.
		pass2.style.backgroundColor = badColor;
	}
}

function password(){
	alert('password');
	var pass1 = document.getElementById('password');
	var pass2 = document.getElementById('cpassword');

	if(pass1.value == pass2.value){
		return true;
	}
	else{
		alert("Passwords do not match!");
		return false;
	}
}

function pincode(){
	var pin = document.getElementById('p_code');
	var reg = /^([1-9])([0-9]){5}$/;
	if(reg.test(pin.value) == false){
		alert('Please enter a valid pincode!');
		pin.focus();	
		return false;
	}
	else{
		return true;
	}
}

function ValidateEmail() 
{
 var mail = document.getElementById('email');
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail.value))
  {
    return (true);
  }
    alert("Please enter a valid email address!");
    mail.focus();
    return (false);
}

function phonenumber()  
{  
  var mob = document.getElementById('Contact_no');
  var phoneno = /^\d{10}$/;  
  if(mob.value.match(phoneno))  
        {  
      return true;  
        }  
      else  
        {  
        alert("Please enter a valid mobile number!");  
        return false;  
        }  
}

function unifinal(){
	var check = pincode();
	if(check){
		if(password()){
			alert('all ok');
			return true;
		}
		else{
			alert('nopass');
			return false;
		}
	}
	else{
		alert(check);
		alert('nook');
		return false;
	}
}

function  stufinal() {
	if(phonenumber()){
		if(pincode()){
			if(ValidateEmail()){
				if(password()){
					return true;
				}
				else{
					return false;
				}
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	else{
		return false;
	}
}

function trnsfinal(){
	if(phonenumber()){
		if(pincode()){
			return true;
		}
		else{
			return false;
		}
	}
	else{
		return false;
	}
}


//to fill the no of transcripts and calculate total cost automatically
function autofill(){
			var transcriptsno = document.getElementById('transcriptsno');
			var transcriptscheck = document.getElementById('transcriptscheck');
			var marksheetno = document.getElementById('marksheetno');
			var marksheetcheck = document.getElementById('marksheetcheck');
			var dmarksheetno = document.getElementById('dmarksheetno');
			var dmarksheetcheck = document.getElementById('dmarksheetcheck');
			var dcertino = document.getElementById('dcertino');
			var dcerticheck = document.getElementById('dcerticheck');

			if(transcriptscheck.checked == true){
				transcriptsno.disabled = false;
			}
			else{
				transcriptsno.value = "";
				transcriptsno.disabled = true;
				transcriptsno.placeholder = "No of Transcript";
			}
			if(marksheetcheck.checked == true){
				marksheetno.disabled = false;
			}
			else{
				marksheetno.value = "";
				marksheetno.disabled = true;
				marksheetno.placeholder = "No of Marksheet";
			}
			if(dmarksheetcheck.checked == true){
				dmarksheetno.disabled = false;
			}
			else{
				dmarksheetno.value = ""
				dmarksheetno.disabled = true;
				dmarksheetno.placeholder = "No of Duplicate Marksheet";
			}
			if(dcerticheck.checked == true){
				dcertino.disabled = false;
			}
			else{
				dcertino.value = "";
				dcertino.disabled = true;
				dcertino.placeholder = "No of Degree Certificate";
			}


		}