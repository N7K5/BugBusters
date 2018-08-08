
<?php
	include 'common/ev_details_aka.php';

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
		echo 'Unable to connect to the database...';
		exit();
	}

	$varsql='SELECT * FROM ip_data WHERE uid="'.$_REQUEST['uid'].'"';
	$res=$pdo->query($varsql);
	if($res->fetch())
	{
		echo '1';
	}
	else
	{
		echo '0';
	}

	exit ;
?>