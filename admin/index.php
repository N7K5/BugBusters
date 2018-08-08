
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


?>


<!DOCTYPE html>
<html>
<head>
	<title>
		Console
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
<div class="header">Bugbusters Admin Console</div>

<table>
	<tr>
		<th class="th_id"> ID </th>
		<th class="th_name"> Name </th>
		<th class="th_id"> unique ID </th>
		<th class="th_ip"> IP_Addr </th>
		<th class="th_start"> Started </th>
		<th class="th_1"> LVL_1 </th>
		<th class="th_2"> LVL_2 </th>
		<th class="th_3"> LVL_3 </th>
		<th class="th_4"> LVL_4 </th>
		<th class="th_5"> LVL_5 </th>
		<th class="th_6"> LVL_6 </th>
		<th class="th_7"> LVL_7 </th>
		<th class="th_scr"> SCORE </th>
		<th class="th_skip"> skip </th>
		<th class="tr_tot_skip"> Skipped </th>
	</tr>

<?php
	$varsql='SELECT * FROM players';
	$res_x=$pdo->query($varsql);
	$in_odd_pos=1; $total_players=0; $high_score=0; $high_name='';; $high_time=0;
	while($res=$res_x->fetch())
	{
		//echo '<tr></tr>';
		$to_skip=1; $cur_in=1;
		if($in_odd_pos)
		{
			echo '<tr class="tr_odd">';
		}
		else
		{
			echo '<tr class="tr_even">';
		}
		echo '<td class="td_id">'.$res['id'].'</td>';
		echo '<td class="td_name">'.$res['name'].'</td>';
		echo '<td class="td_id">'.$res['uid'].'</td>';
		echo '<td class="td_ip">'.$res['ip_info'].'</td>';
		echo '<td class="td_start">'.(int)((time()-$res['start_time'])/60).'</td>';
		
		if($res['lvl_1']!='' && $res['lvl_1']!=0)
		{
			echo '<td class="td_1">'.(int)((time()-$res['lvl_1'])/60).'</td>';
			$to_skip=2;
		}
		else
		{
			if($cur_in)
			{
				echo '<td class="td_1_r"> C </td>';
				$cur_in=0;
			}
			else
			{
				echo '<td class="td_1_x"> </td>';
			}
		}
		if($res['lvl_2']!='' && $res['lvl_2']!=0)
		{
			echo '<td class="td_2">'.(int)((time()-$res['lvl_2'])/60).'</td>';
			$to_skip=3;
		}
		else
		{
			if($cur_in)
			{
				echo '<td class="td_2_r"> C </td>';
				$cur_in=0;
			}
			else
			{
				echo '<td class="td_2_x"> </td>';
			}
		}
		if($res['lvl_3']!='' && $res['lvl_3']!=0)
		{
			echo '<td class="td_3">'.(int)((time()-$res['lvl_3'])/60).'</td>';
			$to_skip=4;
		}
		else
		{
			if($cur_in)
			{
				echo '<td class="td_3_r"> C </td>';
				$cur_in=0;
			}
			else
			{
				echo '<td class="td_3_x"> </td>';
			}
		}
		if($res['lvl_4']!='' && $res['lvl_4']!=0)
		{
			echo '<td class="td_4">'.(int)((time()-$res['lvl_4'])/60).'</td>';
			$to_skip=5;
		}
		else
		{
			if($cur_in)
			{
				echo '<td class="td_4_r"> C </td>';
				$cur_in=0;
			}
			else
			{
				echo '<td class="td_4_x"> </td>';
			}
		}
		if($res['lvl_5']!='' && $res['lvl_5']!=0)
		{
			echo '<td class="td_5">'.(int)((time()-$res['lvl_5'])/60).'</td>';
			$to_skip=6;
		}
		else
		{
			if($cur_in)
			{
				echo '<td class="td_5_r"> C </td>';
				$cur_in=0;
			}
			else
			{
				echo '<td class="td_5_x"> </td>';
			}
		}
		if($res['lvl_6']!='' && $res['lvl_6']!=0)
		{
			echo '<td class="td_6">'.(int)((time()-$res['lvl_6'])/60).'</td>';
			$to_skip=7;
		}
		else
		{
			if($cur_in)
			{
				echo '<td class="td_6_r"> C </td>';
				$cur_in=0;
			}
			else
			{
				echo '<td class="td_6_x"> </td>';
			}
		}
		if($res['lvl_7']!='' && $res['lvl_7']!=0)
		{
			echo '<td class="td_7">'.(int)((time()-$res['lvl_7'])/60).'</td>';
			$to_skip=8;
		}
		else
		{
			if($cur_in)
			{
				echo '<td class="td_7_r"> C </td>';
				$cur_in=0;
			}
			else
			{
				echo '<td class="td_7_x"> </td>';
			}
		}

		echo '<td class="td_scr">'.$res['score'].'</td>';
		if($to_skip==7)
		{
			echo '<td class="td_skip">Cleared</td>';
		}
		else
		{
			echo '<td class="td_skip"><a class="skip_link" href="skip.php?id='.$res['id'].'&to_skip='.$to_skip.'">skip Level '.$to_skip.'</a></td>';
		}

		echo '<td id="td_tot_skip">'.$res['total_skips'].'</td>';

		echo '</tr>';

		$in_odd_pos=1-$in_odd_pos;
		$total_players++;
		if($res['score']>$high_score && $to_skip>1)
		{
			$high_score=$res['score'];
			$high_name=$res['name'];
			$high_time=$res['lvl_'.($to_skip-1)];
		}
		else if($res['score']==$high_score && $res['score']>0)
		{
			if($res['lvl_'.($to_skip-1)]<$high_time )
			{
				$high_score=$res['score'];
				$high_name=$res['name'];
				$high_time=$res['lvl_'.($to_skip-1)];
			}
		}
	}
	echo '</table>';
	

	echo '<br /><div class="hi_div">Current Total Players : <span class="tot_pl">'.$total_players.'</span> ...<br />';
	if($high_score>0)
	{
		echo '<span class="high_sc"> Current High Score By <a class="hi_name">'.$high_name.'</a> At a Score of <a class="hi_pt">'.$high_score.'</a> Points...</span></div>';
	}

	if(isset($_REQUEST['msg']))
	{
		if($_REQUEST['msg']=='ams')
		{
			echo '<a id="msg"> Already Skipped Maximum Times </a>';
		}
		else
			if($_REQUEST['msg']=='sk')
			{
				echo '<a id="msg"> Level Skipped Successfully </a>';
			}
	}


?>

<a href="set_up_uid_12547852.php" id="set_uid"> Set UId </a>

</body>
</html>
