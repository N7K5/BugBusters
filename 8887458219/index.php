
<?php
	include '../common/ev_details_aka.php';
	$in_index=1;
?>


<!DOCTYPE html>
<html>
<head>
	<title>
		BugBusters
	</title>
	<link href="../script/common.css" type="text/css" rel="stylesheet" />
	<link href="index.css" type="text/css" rel="stylesheet" />
	<link rel="icon" href="../res/icon.png">
</head>

<body>

<?php

	try
	{
		//total 3 places to change...
		$pdo = new PDO('mysql:host=localhost;dbname='.$db_name,$db_username,$db_password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->exec('SET NAMES "utf8"');
	}
	catch(Excepton $e)
	{
		//include 'error.php';
		echo 'Unable to connect the database...';
		exit();
	}

	$myip=$_SERVER['REMOTE_ADDR'];
?>
<div class="header">Leader Board</div>

<table>
	<tr>
		<th class="th_id"> ID </th>
		<th class="th_name"> Name </th>
		<th class="th_sc"> Current Score </th>
	</tr>

<?php

	$varsql='SELECT * FROM players WHERE ip_info="'.$myip.'"';
	$res=$pdo->query($varsql)->fetch();
	$my_score=$res['score'];
	$my_time=$res['lvl_6'];
	$my_rank=1;
	if($res['lvl_7']>5000)
	{
		$lvl_7_passed=true;
	}
	else
	{
		$lvl_7_passed=false;
	}
	$myid=$res['uid'];


	$varsql='SELECT * FROM players';
	$res_x=$pdo->query($varsql);
	$curpos=0; $curid=1;
	while($res=$res_x->fetch())
	{
		if($myip==$res['ip_info'])
			echo '<tr class="tr_me">';
		else if($curpos)
			echo '<tr class="tr_even">';
		else
			echo '<tr class="tr_odd">';
		$curpos=1-$curpos;

		echo '<td> '.$curid.' </td>';
		echo '<td> '.$res['name'].' </td>';
		echo '<td> '.$res['score'].' </td>';
		echo '</tr>';
		$curid++;
		if($res['score']>$my_score)
			$my_rank++;
		if($res['score']==$my_score && $res['lvl_6']>5000 && $res['lvl_6']<$my_time)
			$my_rank++;
	}
	echo '</table>';
	echo '<br /><br /><a id="m_rank"> Your Current Rank is : '.$my_rank.' ...</a>';

if($lvl_7_passed)
{
	echo '<br />Well Done...You Guessed The UId Correctly <br />But Your Rank remains the Same...</body></html>';
	exit ;
}


echo '<br /><br /><div id="extra_cont">
	Fealing Bored ...!! Well, Here is an Extra Challenge For You ';
	echo '<span>'.$myid.'</span>';
	echo '...<br />
	<a class="small"> You Know, Every Other Player Has an Unique ID...<br />
	Can You Hack Through Other player\'s PC and Ghess one other player\'s UId...</a>
	<form action="cheak_uid.php" method="POST">
		<input type="text" name="uid" id="ip_uid" placeholder="Enter Other UId..." />
		<input type="submit" id="ip_btn" value="go" />
	</form>
</div>


<div id="cmnt">
	<table>
		<tr class="tr_cmnt">
			<th class="cmnt_name"> Name </th>
			<th> Comment </th>
		</tr>
<br /><br />';
	$total_cmnts=0;
	$varsql='SELECT * FROM cmnts';
	$res_x=$pdo->query($varsql);
	while($res=$res_x->fetch())
	{
		if($res['expires']==0)
		{
			$varsql='DELETE FROM cmnts WHERE id="'.$res['id'].'"';
			$pdo->exec($varsql);
			continue ;
		}
		else
		{
			echo '<tr class="tr">';
			echo '<td > '.$res['name'].' </td>';
			echo '<td > '.$res['cmnt'].' </td>';
			echo '</tr>';
			$total_cmnts++;

			$varsql='UPDATE cmnts SET expires=expires-"1" WHERE id="'.$res['id'].'"';
			$pdo->exec($varsql);
		}
	}

	if($total_cmnts==0)
	{
		echo '<tr class="tr"><td></td><td>No Coments</td></tr>';
	}
		echo '</table>';
echo '<br /><form action="cmnt.php" method="post">
	<input type="text" name="cmnt" id="ip_cmnt" placeholder="Comment How Was The Game..!!" />
	<input type="submit" id="ip_btn" value="Submit" />
</form><br /><br />..END..
</body>
</html>';
?>
