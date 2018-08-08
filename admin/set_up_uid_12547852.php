<?php
if(isset($_COOKIE['admin_id']) && $_COOKIE['admin_id']=='h67te5gcelt2015b15b19')
{
	include '../common/ev_details_aka.php';
	$in_index=1;
}
else
{
	echo 'You Are Not Admin...<br /> no admin_id IP Adress...';
	exit ;
}

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

	if(isset($_POST['uid']))
	{
		if(strlen($_POST['uid'])>=$uid_length)
		{
			$varsql='SELECT id FROM ip_data WHERE uid="'.$_REQUEST['uid'].'" ';
			$res=$pdo->query($varsql);
			if($res->fetch())
			{
				$update_status=2;
			}
			else
			{
				$varsql='INSERT INTO ip_data SET uid="'.$_REQUEST['uid'].'", i_score="'.$_REQUEST['i_sc'].'" ';
				$pdo->exec($varsql);
				$update_status=1;
			}
		}
		else
		{
			$update_status=3;
		}
	}

?>



<!DOCTYPE html>
<html>
<head>
	<title>
		Console
	</title>
	<link href="../script/common.css" type="text/css" rel="stylesheet" />
	<link href="uid.css" type="text/css" rel="stylesheet" />
	<link rel="icon" href="../res/icon.png">
</head>

<body>

	<div class="header"> set up UIds </div>
	<div id="table_holder">
	<table id="current_uid">
		<tr>
			<th> No. </th>
			<th> UId </th>
		</tr>

<?php
	$tr_even=false;
	$varsql= 'SELECT * FROM ip_data';
	$res_x=$pdo->query($varsql);
	while($res=$res_x->fetch())
	{
		if($tr_even)
		{
			echo '<tr class="tr_even">';
			$tr_even=false;
		}
		else
		{
			echo '<tr class="tr_odd">';
			$tr_even=true;
		}

		echo '<td> '.$res['id'].' </td>';
		echo '<td> '.$res['uid'].' </td>';

		echo '</tr>';
	}
	echo '</table>';

?>
</div>
 <form class="set_new" method="POST" action="">
 	<a id="new_text"> Add A new UId :- </a>
 	<input type="text" name="uid" id="ip_new" autocomplete="off" placeholder="New UId" />
 	<input type="number" name="i_sc" id="i_sc" placeholder="Score" required />
 	<button id="random"> Random </button>
 	<input type="submit" value="set" id="ip_submit" />
 </form>

 <?php

 	if(isset($update_status))
 	{
 		if((int)$update_status==1)
 		{
 			echo '<div class="msg_s"> INSERTED SUCCESSFULLY...</div>';
 		}
 		else if((int)$update_status==2)
 		{
 			echo '<div class="msg_f"> UID Already Exist...</div>';
 		}
 		else if((int)$update_status==3)
 		{
 			echo '<div class="msg_f"> String TOO Short...</div>';
 		}
 	}
 ?>

 <a id="back" href="index.php"> Console </a>

</body>
<script type="text/javascript" src="uid.js"></script>
</html>
