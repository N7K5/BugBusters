var username="ajay";
var password="gcelt";



function validateLogin()
{
	var myName = document.getElementById("ip_userId").value;
	var myPass = document.getElementById("ip_password").value;

	if(myName=="" || myPass=="")
	{
		alert("Filds are mandatory...");
	}
	else
	{
		if(myName == username && myPass == password)
		{
			alert("\n  You Have Successfully Loged In...\n");
			window.location.assign("loged_in_4865864573.php");
		}
		else
		{
			alert("Wrong username or password...");
			document.getElementById("ip_userId").value='';
			document.getElementById("ip_password").value='';
		}
	}
	return false;
}


document.getElementById("login_btn").addEventListener("click", validateLogin, false);