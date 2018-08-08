<img src="bg.jpg" id="background" />

<div id="header">

	<br /><br />
	Looks like you are here for winning only!<br /><br />
	Not all that gitters is gold and not all that seems, is actually important!
</div>

<form method="post" action="" id="mainform">
Name : 
<input type="text" name="name" id="ip_name" placeholder="Enter Name Here" autocomplete="off" required /><br /><br />
Password : 
<input type="password" name="password" placeholder="********" autocomplete="off" id="ip_pass" required /><br /><br />
<input type="submit" id="ip_submit" value="log_in" />
</form>

<?php
	echo '<div id="score"><a id="cur_sc">Your Score ';
	$varsql='SELECT score FROM players WHERE ip_info="'.$_SERVER['REMOTE_ADDR'].'"';
	$res=$pdo->query($varsql)->fetch();
	echo $res['score'];
	echo '</a><br /><a id="in_sc">score of this ';
	echo $lvl_5_score;
	echo '</a></div>';
?>
