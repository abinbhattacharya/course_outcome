function validateText(inputField,errorMessage,fieldLength)
{
	if(inputField.value.length<fieldLength)
	{
		if(errorMessage !==null)
		{
			errorMessage.innerHTML="Please enter a value having minimum "+fieldLength+" characters.";
			return false;
		}
	}
	else
	{
		if(errorMessage !==null)
		{
			var regex=/^[-\w_.]+$/;
			if(!regex.test(inputField.value))
			{
				errorMessage.innerHTML="Only alphanumeric, '.', '_' and '-' characters are allowed.";
				return false;
			}
			errorMessage.innerHTML="";
			return true;
		}
	}
};
function passwordMatch(password1,password2,errorMessage)
{
	if(password1.value===password2.value)
	{
		errorMessage.innerHTML="Passwords match.";
		return true;
	}
	else
	{
		if(errorMessage!=null)
		{
			errorMessage.innerHTML="Passwords do not match.";
			return false;
		}
	}
};
function validateForm()
{
	if(validateText(username,errorUsername,5) && validateText(password1,errorPassword1,8) && validateText(password2,errorPassword2,8) && passwordMatch(password1,password2,errorPassword2))
		document.getElementById("signup_form").submit();
	else
		alert("One or more errors have occured. Refer to the error messages.");
};
function start()
{
	username=document.getElementById("username");
	errorUsername=document.getElementById("error_username");
	password1=document.getElementById("password_1");
	errorPassword1=document.getElementById("error_password_1");
	password2=document.getElementById("password_2");
	errorPassword2=document.getElementById("error_password_2");	
	username.onblur=function(evt)
	{
		if(errorUsername!==null)
			validateText(username,errorUsername,5);
	};
	password1.onblur=function(evt)
	{
		if(errorPassword1!==null)
			validateText(password1,errorPassword1,8);
	};
	password2.onblur=function(evt)
	{
		if(errorPassword2!==null)
			validateText(password2,errorPassword2,8);
	};
	document.getElementById("sign_up").onclick=function(evt)
	{
		validateForm();
	};	
	password2.onkeyup=function(evt)
	{
		passwordMatch(password1,password2,errorPassword2);
	};
}
window.onload=start;