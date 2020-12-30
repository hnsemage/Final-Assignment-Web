
function validate()
{

	var name=document.getElementById("username").value;
	var pw=document.getElementById("pword").value;
	
	if(name=="")
	{
		alert("User name should not be empty");
	}

	if(pw=="")
	{
		alert("Please enter your password");
	}
}