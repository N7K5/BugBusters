<img src="bg.jpg" id="background" />

<div id="header">
	<br /><br /><br /><br />
	So you are just a step away from being on the top of world!<br />
	Just know that brutal force is not the ultimate force! 
</div>

<form method="post" action="" id="mainform">
Name : 
<input type="text" name="name" value="admin" id="ip_name" placeholder="Enter Name Here" autocomplete="off" required disabled="disabled" /><br /><br />
4-Digit PIN : 
<input type="number" name="pin" placeholder="****" autocomplete="off" id="ip_pass" required max="9999" min="0000" /><br /><br />
<input type="submit" id="ip_submit" value="log_in" />
</form>

<?php
	echo '<div id="score"><a id="cur_sc">Your Score ';
	$varsql='SELECT score FROM players WHERE ip_info="'.$_SERVER['REMOTE_ADDR'].'"';
	$res=$pdo->query($varsql)->fetch();
	echo $res['score'];
	echo '</a><br /><a id="in_sc">score of this ';
	echo $lvl_6_score;
	echo '</a></div>';
?>
