<?php
if(!isset($in_index))
{
	header('location:../index.php');
	exit ;
}
?>

<span id="background"><img id="background_img" src="bg.jpeg" /></span>

<div class="header">
	So now that you have decided to come and try yourself, so here you go!<br />
	lets see what you got?
</div>

<form method="get" action="" id="login_form">
	<span id="l_name">User ID : </span>
	<input type="text" id="ip_userId" placeholder="Enter User Id..." autocomplete="off" /><br /><br />
	<span id="l_pass">Password : </span>
	<input type="password" id="ip_password" placeholder="Enter Password..." /><br /><br />
	<a id="login_btn"> log-in </a>
</form>



<!-- ****   Javascript To Cheak User Input   ****-->




<script type="text/javascript">

var username = "ajay";
var password = "gcelt";



function validateLogin()
{
	var myName = document.getElementById("ip_userId").value;
	var myPass = document.getElementById("ip_password").value;

	if(myName== "" || myPass== "") // If Name or Password is NULL
	{
		alert("Filds are mandatory...");
	}
	else
	{
		if(myName == username && myPass == password) // If Correct Name and Password
		{
			alert("\n  You Have Successfully Loged In...\n");
			window.location.assign("loged_in_4865864573.php");
		}
		else // If Wrong Name or Password
		{
			alert("Wrong username or password...");
			document.getElementById("ip_userId").value='';
			document.getElementById("ip_password").value='';
		}
	}
	return false;
}


document.getElementById("login_btn").addEventListener("click", validateLogin, false); // Trigger when Login is clicked

</script>

<?php
	echo '<div id="score"><a id="cur_sc">Your Score ';
	$varsql='SELECT score FROM players WHERE ip_info="'.$_SERVER['REMOTE_ADDR'].'"';
	$res=$pdo->query($varsql)->fetch();
	echo $res['score'];
	echo '</a><br /><a id="in_sc">score of this ';
	echo $lvl_1_score;
	echo '</a></div>';
?>