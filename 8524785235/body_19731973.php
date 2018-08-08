<?php
if(!isset($in_index))
{
	header('location:../index.php');
	exit ;
}

?>

<span class="background"><img class="background_image" src="bg.jpg" /></span>

<div id="header">
	You Cracked the previous level.<br />
	But, This Doesn't have any vulnerabilities like previous one.<br />
	How you gonna log-in now? Using the wordlist or something else???
</div>

<form action="" method="post" id="main_form">
Name: <input type="text" name="name" id="ip_name" required autocomplete="off" /><br /><br />
Password: <input type="text" name="pass" id="ip_pass" required autocomplete="off" /><br /><br />
<input type="submit" id="login_btn" value="log-in" />
</form>

<?php
	echo '<div id="score"><a id="cur_sc">Your Score ';
	$varsql='SELECT score FROM players WHERE ip_info="'.$_SERVER['REMOTE_ADDR'].'"';
	$res=$pdo->query($varsql)->fetch();
	echo $res['score'];
	echo '</a><br /><a id="in_sc">score of this ';
	echo $lvl_2_score;
	echo '</a></div>';
?>