<p class="background"></p>

<div id="header">
	You cracked the previous level too.<br /><br />
	I took you lightly, But I must say, You have some potential.<br />
	Lets see:- can you crack this one? I think you need chocolate biscuits!
</div>

<form method="post" action="" id="mainform">
Name : 
<input type="text" name="name" id="ip_name" placeholder="Enter Name Here" autocomplete="off" /><br /><br />
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
	echo $lvl_3_score;
	echo '</a></div>';
?>