function validate()
{  
    
    //validate user name
	if(document.getElementById("uname").value=="")
	{
		alert("User name should not be empty.");
	}

    //validate email
    var email=document.getElementById("email").value;
    const emailFormat=/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if(email=="")
   {
      alert("Please enter your email");
    }
    else
    {
       if(email.match(emailFormat))
        {
             alert("You have entered a valid email address");
        }
      else
        {
             alert("Error!Invalid email address");
        }
    }
	//validate password
	var pword=document.form1.pword.value;
	const pwordFormat="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$";
	if(pword=="")
	{
		alert("Please create your password");
	}
	else
	{
		if(pword.match(pwordFormat))
		{
          alert("You have entered a valid password"); 
		}
		else
		{
			alert("Password must contain minimum 8 characters,at least one uppercase letter,one lowercase letter,one number and one special character");
		}
	}
      //checking the password match
      var cpword= document.getElementById("cpass").value;
      if(pword!==cpword)
      {
      	alert("Passwords doesn't match");
      }

      

}