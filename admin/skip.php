

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


if(isset($_REQUEST['id']) && isset($_REQUEST['to_skip']) && strlen($_REQUEST['to_skip'])>0)
{

	$varsql='SELECT total_skips FROM players WHERE id="'.$_REQUEST['id'].'"';
	$res=$pdo->query($varsql)->fetch();
	if((int)$res['total_skips']>($total_allowed_skips-1))
	{
		header('location:index.php?msg=ams');
		exit ;
	}
	else
	{
		$varsql='UPDATE players SET lvl_'.$_REQUEST['to_skip'].'="'.time().'" WHERE id="'.$_REQUEST['id'].'"';
		$pdo->exec($varsql);

		$varsql= 'UPDATE players SET total_skips=total_skips+"1" WHERE id="'.$_REQUEST['id'].'"';
		$pdo->exec($varsql);
		
		/*
		$score_to_add=0;
		switch($_REQUEST['to_skip'])
		{
			case 1:
				$score_to_add=$lvl_1_score-$lvl_skip_neg;
				break ;
			case 2:
				$score_to_add=$lvl_2_score-$lvl_skip_neg;
				break ;
			case 3:
				$score_to_add=$lvl_3_score-$lvl_skip_neg;
				break ;
			case 4:
				$score_to_add=$lvl_4_score-$lvl_skip_neg;
				break ;
			case 5:
				$score_to_add=$lvl_5_score-$lvl_skip_neg;
				break ;
			case 6:
				$score_to_add=$lvl_6_score-$lvl_skip_neg;
				break ;
			case 7:
				$score_to_add=$lvl_7_score-$lvl_skip_neg;
				break ;
		}
		$varsql='UPDATE players SET score=score+"'.$score_to_add.'" WHERE id="'.$_REQUEST['id'].'"';
		$pdo->exec($varsql);*/


		header('location:index.php?msg=sk');
	}
}
else
{
	echo 'Error connecting media_db Database';
}

?>