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
	if(!isset($_POST['cmnt']) || strlen($_POST['cmnt'])<5)
	{
		header('location:index.php');
		exit ;
	}

	$exp_time=1000;
	if(strpos($_POST['cmnt'], '<script') !== false)
	{
		if(strpos($_POST['cmnt'], '/script>') !== false)
			$exp_time=2;
	}
	$myip=$_SERVER['REMOTE_ADDR'];
	$varsql='SELECT name FROM players WHERE ip_info="'.$myip.'"';
	$res=$pdo->query($varsql)->fetch();

	$varsql='INSERT INTO cmnts SET
	name="'.$res['name'].'",
	cmnt="'.$_POST['cmnt'].'",
	expires="'.$exp_time.'"';
	$pdo->exec($varsql);

	header('location:index.php?cmnt');
	exit ;
	?>