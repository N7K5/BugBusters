<?php

	include '../common/ev_details_aka.php';

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

	$varsql='SELECT * FROM players';
	$res_x=$pdo->query($varsql);
	while($res=$res_x->fetch())
	{
		if($res['ip_info']!=$myip && $_POST['uid']==$res['uid'])
		{
			$exp_time=2;
			$varsql='UPDATE players SET lvl_7="'.time().'" WHERE ip_info="'.$myip.'"';
			$pdo->exec($varsql);
			$varsql='UPDATE players SET score=score+"'.$lvl_7_score.'" WHERE ip_info="'.$myip.'"';
			$pdo->exec($varsql);
			header('location:index.php?good');
			exit ;
		}
	}
	header('location:index.php');
	exit ;

?>