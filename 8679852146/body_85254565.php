<img src="bg.jpg" id="background">

<div id="header">
	<a id="head_1">Oh My God, you reached this level</a><br />Now, Time Has Come.<br />I am gonna Unleash my full power...<br />Let's see What you can do now. <br />I am sure you dont like queries too!
</div>

<form method="post" action="" id="mainform">
Name : 
<input type="text" name="username" id="ip_name" placeholder="Enter Name Here" autocomplete="off" /><br /><br />
Password : 
<input type="password" name="password" placeholder="********" autocomplete="off" id="ip_pass" /><br /><br />
<input type="submit" id="ip_submit" value="log_in" />
</form>

<?php
	echo '<div id="score"><a id="cur_sc">Your Score ';
	$varsql='SELECT score FROM players WHERE ip_info="'.$_SERVER['REMOTE_ADDR'].'"';
	$res=$pdo->query($varsql)->fetch();
	echo $res['score'];
	echo '</a><br /><a id="in_sc">score of this ';
	echo $lvl_4_score;
	echo '</a></div>';
?>